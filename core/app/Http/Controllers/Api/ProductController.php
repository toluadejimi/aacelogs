<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class ProductController extends Controller
{
    public static function get_all_products(request $request)
    {

        $cat = Product::latest()->where('status', 1)->paginate(12);

        return response()->json([
            'status' => true,
            'data' => $cat
        ]);

    }


    public static function get_products_by_category(request $request)
    {

        $cat = Product::latest()->where('status', 1)->where('category_id', $request->category_id)->get()->makeHidden(['created_at', 'updated_at', 'productDetails', 'status']);

        return response()->json([
            'status' => true,
            'data' => $cat
        ]);

    }

    public static function buy_product(request $request)
    {

        $last_order = Order::latest()->where('user_id', Auth::id())->first()->created_at ?? null;
        if ($last_order != null) {
            $createdAt = strtotime($last_order);
            $currentTime = time();
            $timeDifference = $currentTime - $createdAt;

            if ($timeDifference < 50) {

                return response()->json([
                    'status' => false,
                    'message' => "Please wait for 10sec and try again"
                ]);

            }

        }


        $qty = $request->qty;

        $get_product = Product::where('id', $request->product_id)->first() ?? null;
        if ($get_product == null) {
            return response()->json([
                'status' => false,
                'message' => "Product not found, Check the product ID and try again"
            ]);
        }

        $product = Product::active()->whereHas('category', function ($category) {
            return $category->active();
        })->findOrFail($request->product_id);


        if ($product->in_stock < $qty) {
            return response()->json([
                'status' => false,
                'message' => "Not enough stock available. Only $product->in_stock quantity left"
            ]);

        }

        $amount = ($product->price * $qty);


        $balance2 = number_format(Auth::user()->balance ?? 0, 2);
        $balance = Auth::user()->balance ?? 0;

        if ($balance < $amount) {
            return response()->json([
                'status' => false,
                'message' => "Insufficient Funds, Fund your wallet | Your Balance NGN $balance2"
            ]);
        }


        User::where('id', Auth::id())->decrement('balance', $amount);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->total_amount = $amount;
        $order->status = 1;
        $order->save();

        $unsoldProductDetails = $product->unsoldProductDetails;


        for ($i = 0; $i < $qty; $i++) {
            if (@!$unsoldProductDetails[$i]) {
                continue;
            }
            $item = new OrderItem();
            $item->order_id = $order->id;
            $item->product_id = $product->id;
            $item->product_detail_id = $unsoldProductDetails[$i]->id;
            $item->price = $product->price;
            $item->save();
        }


        $products = [];
        $productDetailIds = OrderItem::where('order_id', $order->id)->pluck('product_detail_id')->toArray();
        if (!empty($productDetailIds)) {
            ProductDetail::whereIn('id', $productDetailIds)->update(['is_sold' => 1]);
            $products = ProductDetail::whereIn('id', $productDetailIds)->get()->makeHidden(['created_at', 'updated_at']);

        }


        $message = "Log Market Place API |" . Auth::user()->email . "| just bought | $qty | $order->id  | " . number_format($amount, 2) . "\n\n IP ====> " . $request->ip();
        // send_notification_2($message);


        return response()->json([
            'status' => true,
            'message' => "Order Purchased Successfully",
            'data' => $products
        ]);


    }


}

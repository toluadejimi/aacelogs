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


    public static function get_product_details(request $request)
    {

        $cat = Product::latest()->where('id', $request->id)->first();

        $data['id'] = $cat->id;
        $data['name'] = $cat->name;
        $data['description'] = $cat->description;
        $data['price'] = $cat->price;
        $data['image'] = url('')."/assets/images/product/".$cat->image;
        $data['in_stock'] = $cat->in_stock;


        return response()->json([
            'status' => true,
            'data' => $data
        ]);

    }

    public static function buy_product(request $request)
    {

        $data = json_encode($request->all());


        if($request->key == null){
            return response()->json([
                'status' => false,
                'message' => "Key can not be null | $data "
            ]);

        }


        $usr = User::where('api_key', $request->key)->first() ?? null;
        if($usr == null){
            return response()->json([
                'status' => false,
                'message' => "Key not found on our system | $data "
            ]);

        }

       

        $user_id = $usr->id;
        $last_order = Order::latest()->where('user_id', $user_id)->first()->created_at ?? null;
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
                'message' => "Product not found, Check the product ID and try again | $data | $request->product_id"
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
        $balance2 = number_format($usr->balance ?? 0, 2);
        $balance = $usr->balance ?? 0;

        if ($balance < $amount) {
            return response()->json([
                'status' => false,
                'message' => "Insufficient Funds, Fund your wallet | Your Balance NGN $balance2"
            ]);
        }


        User::where('id', $usr->id)->decrement('balance', $amount);

        $order = new Order();
        $order->user_id = $usr->id;
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


        $message = "Log Market Place API |" . $usr->email . "| just bought | $qty | $order->id  | " . number_format($amount, 2) . "\n\n IP ====> " . $request->ip();
        // send_notification_2($message);


        return response()->json([
            'status' => true,
            'message' => "Order Purchased Successfully",
            'data' => $products
        ]);


    }


}

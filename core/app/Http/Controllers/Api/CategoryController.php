<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public static function get_categories(request $request)
    {

        $cat =  Category::latest()
        ->where('status', 1)
        ->withCount('products')
        ->get()
        ->makeHidden(['created_at', 'updated_at', 'status', 'image']);

        return response()->json([
            'status' => true,
            'data' => $cat
        ]);

    }


}

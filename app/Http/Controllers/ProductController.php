<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(2);

        return ProductResource::collection($products);
    }

    public function store(Request $request)
    {
        $dataCreated = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'slug' => Str::slug($request->name),
        ]);

        return response()->json([
            'message'=> 'Product created',
            'expense' => $dataCreated,
            'status' => 200
        ], 200);
    }
}

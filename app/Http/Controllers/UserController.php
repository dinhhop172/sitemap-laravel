<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::paginate(2);

        return view('users.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('users.show', compact('product'));
    }
}

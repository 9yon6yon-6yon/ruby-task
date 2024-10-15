<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductImage;

class DefaultController extends Controller
{
    public function index()
    {
        $latestproducts = Product::with('images')->limit(8)->get();
        return view('user.index', compact('latestproducts'));
    }
    public function cartpage()
    {
        return response()->json(['route' => 'cart page', 'method' => 'get']);
    }
}

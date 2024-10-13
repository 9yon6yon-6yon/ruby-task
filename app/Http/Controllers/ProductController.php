<?php

namespace App\Http\Controllers;


use App\Models\Product;



class ProductController extends Controller
{
  
    //listing all products
    public function viewAllProducts()
    {
        $products = Product::with('inventory', 'stockHistories', 'images')->get();
        return view('products.view', compact('products'));
    }
    // Show details of a single product
    public function show($id)
    {
        $product = Product::with('inventory', 'stockHistories', 'images')->findOrFail($id);
        return view('products.show', compact('product'));
    }

  
}

<?php

namespace App\Http\Controllers;


use App\Models\Product;



class ProductController extends Controller
{
  
    //listing all products
    public function viewAllProducts()
    {
        $products = Product::with('inventory', 'images')->get();
        return view('user.viewproducts', compact('products'));
    }
    // Show details of a single product
    public function show($id)
    {
        $product = Product::with('inventory', 'stockHistories', 'images', 'category')->findOrFail($id);
        return view('user.viewproductdetails', compact('product'));
    }

  
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index()
    {
        $latestproducts = Product::with('images')->limit(8)->get();
        return view('user.index', compact('latestproducts'));
    }
    public function cartpage()
    {
        return view('user.cart');
    }
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        // Retrieve the current cart or create a new one
        $cart = Cart::firstOrCreate(
            ['session_id' => session()->getId()],  // Use session ID for the cart
        );

        // Check if the product is already in the cart
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $id)
            ->first();

        if ($cartItem) {
            // If the product already exists, just increase the quantity
            $cartItem->quantity += 1;
        } else {
            // Otherwise, create a new CartItem
            $cartItem = new CartItem();
            $cartItem->cart_id = $cart->id;
            $cartItem->product_id = $product->_pid;
            $cartItem->quantity = 1;
        }

        $cartItem->save();

        // Optionally, return a response or redirect
        return response()->json(['message' => 'Item added to cart!']);
    }
}

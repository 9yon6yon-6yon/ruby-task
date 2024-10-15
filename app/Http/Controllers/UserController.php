<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $latestproducts = Product::with('images')->limit(6)->get();
        return view('user.layouts.latestproducts', compact('latestproducts'));
    }
    public function UserLogin()
    {
        return view('user.login');
    }
    public function profile()
    {
        return response()->json(['route' => 'profile page', 'method' => 'get']);
    }

    public function checkout()
    {
        return response()->json(['route' => 'checkout page', 'method' => 'get']);
    }
}

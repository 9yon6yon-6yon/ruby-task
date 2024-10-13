<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(['route' => 'dashboard page', 'method' => 'get']);
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

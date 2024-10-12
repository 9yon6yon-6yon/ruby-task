<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index()
    {
        return response()->json(['route' => 'home page', 'method' => 'get']);
    }
    public function cartpage()
    {
        return response()->json(['route' => 'cart page', 'method' => 'get']);
    }

}

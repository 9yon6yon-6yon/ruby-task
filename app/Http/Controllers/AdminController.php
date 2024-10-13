<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        // return response()->json(User::all());
        return view('admin.index');
    }
    public function AdminLogin(){
        return view('admin.login');
    }
    public function add(){
        return  response()->json(['route'=> 'add']);
    }
    public function edit(){
        return  response()->json(['route'=> 'patch']);
    }
    public function delete(){
        return  response()->json(['route'=> 'delete']);
    }
    public function listProducts(){
        return view('admin.products');
    }
    public function productAdd(){
        return view('admin.addproduct');
    }

}

<?php

namespace App\Http\Controllers;
use App\Product;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = Product::orderBy('id','DESC')->paginate(8);
        return view('home',compact('data'));
    }
}

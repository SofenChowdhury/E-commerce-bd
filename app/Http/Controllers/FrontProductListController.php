<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class FrontProductListController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('product',compact('products'));
    }
    public function show($id){
        $product = Product::find($id);
        return view('show',compact('product'));
    }
}

<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class FrontProductListController extends Controller
{
    public function index(){
        $products = Product::latest()->limit(9)->get();
        $randomActiveProducts = Product::inRandomOrder()->limit(3)->get();
        $randomActiveProductIds = [];
        foreach ($randomActiveProducts as $product){
            array_push($randomActiveProductIds, $product->id);
        }
        $randomItemProducts = Product::whereNotIn('id',$randomActiveProductIds)->limit(3)->get();
        return view('product',compact('products','randomActiveProducts','randomItemProducts'));
    }
    public function show($id){
        $product = Product::find($id);
        return view('show',compact('product'));
    }
}

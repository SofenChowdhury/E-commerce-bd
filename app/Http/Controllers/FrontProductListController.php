<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Subcategory;
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
        $productFromSameCategories = Product::inRandomOrder()
            ->where('category_id',$product->category_id)
            ->where('id','!=',$product->id)
            ->limit(3)
            ->get();
        return view('show',compact('product','productFromSameCategories'));
    }
    public function allProduct($name){
        $category = Category::where('slug',$name)->first();
        $products = Product::where('category_id',$category->id)->get();
        $subcategories = Subcategory::where('category_id',$category->id)->get();
        return view('category',compact('products','subcategories'));
    }
}

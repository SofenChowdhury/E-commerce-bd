<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>'required|min:3',
            'image'=>'required|mimes:jpg,jpeg,png',
            'description'=>'required',
            'price'=>'required',
            'category'=>'required'
        ]);
        $image = $request->file('image')->store('public/product');
        Product::create([
           'name'=>$request->name,
           'image'=>$image,
            'description'=>$request->description,
            'price'=>$request->price,
            'additional_info'=>$request->additional_info,
            'category_id'=>$request->category,
            'subcategory_id'=>$request->subcategory
        ]);
        notify()->success('Product created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|min:3',
            'description'=>'required',
            'price'=>'required',
            'category'=>'required'
        ]);
        $product = Product::find($id);
        $filename = $product->image;
        if ($request->file('image')){
            $image = $request->file('image')->store('public/files');
            \Storage::delete($filename);
            $product->name = $request->name;
            $product->image = $image;
            $product->description = $request->description;
            $product->additional_info = $request->additional_info;
            $product->price = $request->price;
            $product->category_id = $request->category;
            $product->subcategory_id = $request->subcategory;
            $product->save();
        }else{
            $product->name = $request->name;
            $product->description = $request->description;
            $product->additional_info = $request->additional_info;
            $product->price = $request->price;
            $product->category_id = $request->category;
            $product->subcategory_id = $request->subcategory;
            $product->save();
        }
        notify()->success('Product updated successfully');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $filename = $product->image;
        $product->delete();
        \Storage::delete($filename);
        notify()->success('Product deleted successfully');
        return redirect()->route('product.index');
    }
    public function loadSubcategories(Request $request,$id){
        $subcategory = Subcategory::where('category_id',$id)->pluck('name','id');
        return response()->json($subcategory);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Product $product){
        if (session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = new Cart();
        }
        $cart->add($product);
//        dd($cart);
        session()->put('cart',$cart);
        notify()->success('Product added to cart successfully');
        return redirect()->back()->with('message','added successfully');
    }
    
    public function showCart(){
        if (session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = null;
        }
//        dd($cart->items);
        return view('cart',compact('cart'));
    }
    
    public function updateCart(Request $request, Product $product){
        $request->validate([
           'qty'=>'required|numeric|min:1'
        ]);
        
        $cart = new Cart(session()->get('cart'));
        $cart->updateQty($product->id,$request->qty);
        session()->put('cart',$cart);
        notify()->success('Cart Updated');
        return redirect()->back();
    }
    
    public function removeCart(Product $product){
        $cart = new Cart(session()->get('cart'));
        $cart->remove($product->id);
        if ($cart->totalQty <= 0){
            session()->forget('cart');
        }else{
            session()->put('cart',$cart);
        }
        notify()->success('Cart Removed');
        return redirect()->back();
    }
    
    public function checkout($amount){
        return view('checkout',compact('amount'));
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}

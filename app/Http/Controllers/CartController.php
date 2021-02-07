<?php

namespace App\Http\Controllers;

use Cartalyst\Stripe\Exception\CardErrorException;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use App\Mail\Sendmail;
use App\Order;


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
        if (session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = null;
        }
        return view('checkout',compact('amount','cart'));
    }
    
    public function charge(Request $request){
//        return $request->stripeToken;

//        $charge = Stripe::charges()->create([
//            'currency'=>"BDT",
//            'source'=>$request->stripeToken,
//            'amount'=>$request->amount,
//            'description'=>'Test'
//        ]);
//        $chargeId = $charge['id'];
    
        if (session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = null;
        }
        \Mail::to(auth()->user()->email)->send(new Sendmail($cart));
        
//        if ($chargeId){
        if ($request){
            auth()->user()->orders()->create([
               'cart'=>serialize(session()->get('cart'))
            ]);
            session()->forget('cart');
            notify()->success('Transaction Completed');
            return redirect()->to('/');
        }else{
            return redirect()->back();
        }
    }
    //For Order LoggedIn User
    public function order(){
        $orders = auth()->user()->orders;
        $carts = $orders->transform(function($cart,$key){
            return unserialize($cart->cart);
        });
        return view('order',compact('carts'));
    }
    
    //For Admin
    public function userOrder(){
        $orders = Order::latest()->get();
        return view('admin.order.index',compact('orders'));
    }
    
    public function viewUserOrder($userId, $orderId){
        $user = \App\User::find($userId);
        $orders = $user->orders->where('id', $orderId);
        $carts = $orders->transform(function($cart,$key){
            return unserialize($cart->cart);
        });
        return view('admin.order.show',compact('carts'));
    }
}

<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class FrontProductListController extends Controller
{
    public function index(){
        return view('product');
    }
}

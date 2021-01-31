@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">QTY</th>
                <th scope="col">Remove</th>
            </tr>
            </thead>
            <tbody>
    @if($cart)
            @php
                $i = 1;
            @endphp
            @foreach($cart->items as $product)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td><img src="{{Storage::url($product['image'])}}" width="100"></td>
                <td>{{$product['name']}}</td>
                <td>TK {{$product['price']}}</td>
                <td>
                    <input type="number" name="qty" placeholder="   Input Qty" value="{{$product['qty']}}">
                    <button class="btn btn-secondary btn-sm">
                        <i class="fas fa-sync"></i> update
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger">Remove</button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
        <div class="card-footer">
            <button class="btn btn-primary">Continue Shopping</button>
            <span style="margin-left: 300px;">Total Price: TK {{$cart->totalPrice}}</span>
            <button class="btn btn-info float-right">Check-Out</button>
        </div>
    @else
        <td>No items in the cart</td>
    @endif
    </div>
@endsection

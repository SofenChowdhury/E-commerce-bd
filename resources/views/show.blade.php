@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="row">
                <aside class="col-sm-5 border-right">
                    <section class="gallery-wrap">
                        <a href="#">
                            <img src="{{Storage::url($product->image)}}" width="100%" height="100%">
                        </a>
                    </section>
                </aside>
                <aside class="col-sm-7">
                    <section class="card-body p-5">
                        <h3 class="title mb-3">
                            {{$product->name}}
                        </h3>
                        <p class="price-detail-wrap">
                            <span class="price h3 text-danger">
                                <span class="currency">
                                    BD<span>{{$product->price}}</span>TK
                                </span>
                            </span>
                        </p>
                        <h3>Description</h3>
                        {!! $product->description !!}
                        <h3>Additional Information</h3>
                        {!! $product->additional_info !!}
                        <hr>
                        <a href="{{route('add.cart',[$product->id])}}" class="btn btn-lg btn-outline-primary text-uppercase">
                            Add to card
                        </a>
                    </section>
                </aside>
            </div>
        </div>
        <div>

        </div>
        @if(count($productFromSameCategories) > 0)
        <div class="jumbotron">
            <h3>You may like</h3>
            <div class="row">
                @foreach($productFromSameCategories as $product)
                    <div class="col-4">
                        <div class="card shadow-sm">
                            <img src="{{Storage::url($product->image)}}" width="100%" height="100%">
                            <div class="card-body">
                                <p><b>{{$product->name}}</b></p>
                                <p class="card-text">
                                    {{Str::limit($product->description, 120)}}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{route('product.view',[$product->id])}}">
                                            <button type="button" class="btn btn-sm btn-outline-success">View</button>
                                        </a>
                                        <a href="{{route('add.cart',[$product->id])}}">
                                            <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
                                        </a>
                                    </div>
                                    <small class="text-muted">{{$product->price}}TK</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @else
            <div class="jumbotron">
                <div class="row">
                    <h3>No Product From Same Category</h3>
                </div>
            </div>
        @endif
    </div>
@endsection

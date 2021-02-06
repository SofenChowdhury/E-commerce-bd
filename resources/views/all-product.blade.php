@extends('layouts.app')

@section('content')

    <div class="container">

        <form>
            <div class="form-row">
                <div class="col-md-8">
                    <input type="text" name="search" class="form-control" placeholder="search...">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-secondary">
                        Search
                    </button>
                </div>
            </div>
        </form>
        <br>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @if(count($products) > 0)
                @foreach($products as $product)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{Storage::url($product->image)}}" width="100%" height="80%">
                            <div class="card-body">
                                <p><b>{{$product->name}}</b></p>
                                <p class="card-text">
                                    {{Str::limit($product->description, 120)}}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="product/{{$product->id}}">
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
            @else
                <h2>Product not yet ready</h2>
            @endif
        </div>
        {{$products->links()}}
    </div>
@endsection

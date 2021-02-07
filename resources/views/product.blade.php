@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
{{--            <section class="jumbotron text-center container">--}}
            <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @foreach($sliders as $key => $slider)
                        <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                            <img class="d-block w-100" src="{{Storage::url($slider->image)}}">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

{{--            </section>--}}
            <br>
{{--            <section class="jumbotron text-center container">--}}
{{--                <div class="row py-lg-5">--}}
{{--                    <div class="col-lg-6 col-md-8 mx-auto">--}}
{{--                        <h1 class="fw-light">Album example</h1>--}}
{{--                        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>--}}
{{--                        <p>--}}
{{--                            <a href="#" class="btn btn-primary my-2">Main call to action</a>--}}
{{--                            <a href="#" class="btn btn-secondary my-2">Secondary action</a>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
            <h2>Categories</h2>
            <br>
            @foreach(App\Category::all() as $category)
                <a href="{{route('product.list',[$category->slug])}}">
                    <button class="btn btn-outline-secondary">{{$category->name}}</button>
                </a>
            @endforeach
            <div class="album py-5 bg-light">
                <div class="container">
                    <h2>Products</h2>
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
                        @else
                            <h2>Product not yet ready</h2>
                        @endif
                    </div>
                </div>
            </div>

            <div>
                <center>
                    <a href="{{route('more.product')}}">
                        <button class="btn btn-success">
                            More Product
                        </button>
                    </a>
                </center>
            </div>
            <br>
            <div class="jumbotron">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                @foreach($randomActiveProducts as $product)
                                <div class="col-4">
                                    <div class="card shadow-sm">
                                        <img src="{{Storage::url($product->image)}}" width="100%" height="100%">
                                        <div class="card-body">
                                            <p><b>{{$product->name}}</b></p>
                                            <p class="card-text">
                                                {!! Str::limit($product->description, 120) !!}
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
                        <div class="carousel-item">
                            <div class="row">
                                @foreach($randomItemProducts as $product)
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
                                        {{--                                    <img class="img-thumbnail" src="images/gaming.jpg">--}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </main>

{{--        <footer class="text-muted py-5">--}}
{{--            <div class="container">--}}
{{--                <p class="float-end mb-1">--}}
{{--                    <a href="#">Back to top</a>--}}
{{--                </p>--}}
{{--                <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>--}}
{{--                <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.0/getting-started/introduction/">getting started guide</a>.</p>--}}
{{--            </div>--}}
{{--        </footer>--}}

    </div>
@endsection

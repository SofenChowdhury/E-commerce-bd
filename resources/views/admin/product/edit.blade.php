@extends('admin.layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 ml-4 text-gray-800">Product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product</li>
        </ol>
    </div>

    <div class="row justify-content-center">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif

        <div class="col-lg-10">
            <form action="{{route('product.update',[$product->id])}}" method="POST" enctype="multipart/form-data">@csrf
                {{method_field('PUT')}}
                <div class="card mb-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Update Product</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="" aria-describedby=""
                                   placeholder="Enter name of product" value="{{$product->name}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <label class="custom-file-label" for="customFile">Choose image file (png or jpg or jpeg only)</label><br><br>
                                <center><img src="{{Storage::url($product->image)}}" width="100"></center>
                                <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" >
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea id="summernote" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter description of product">
                                {!! $product->description !!}
                            </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="" aria-describedby=""
                                   placeholder="Enter price of product" value="{{$product->price}}">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Additional Information</label>
                            <textarea id="summernote1" name="additional_info" class="form-control @error('additional_info') is-invalid @enderror" placeholder="Enter additional_info of product">
                                {!! $product->additional_info !!}
                            </textarea>
                            @error('additional_info')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" class="form-control @error('category') is-invalid @enderror">
                                <option value="">Select Category</option>
                                @foreach(App\Category::all() as $category)
                                    <option value="{{$category->id}}">
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Subcategory</label>
                            <select name="subcategory" class="form-control @error('subcategory') is-invalid @enderror">
                                <option value="">Select Subcategory</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous">

    </script>
    <script type="text/javascript">
        $("document").ready(function () {
            $('select[name="category"]').on('change',function () {
                var categoryId = $(this).val();
                if(categoryId){
                    $.ajax({
                        url:'/subcategories/'+categoryId,
                        type:'GET',
                        dataType:'json',
                        success:function (data) {
                            $('select[name="subcategory"]').empty();
                            $.each(data,function (key,value) {
                                $('select[name="subcategory"]').append(
                                    '<option value=" '+key+' ">'+value+'</option>'
                                )
                            })
                        }
                    })
                }else{
                    $('select[name="subcategory"]').empty();
                }
            });
        });
    </script>

@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header fw-bold fs-4">{{__('Product Detail')}} </div>

                    <div class="card-body">
                        <div class="d-xl-flex justify-content-around d-lg-block">
                            <div class="">
                                <img src="{{url('storage/'.$product->image)}}" alt="" class="w-100 p-2">
                            </div>
                            <div class="">
                                <h1>{{$product->name}}</h1>
                                <h6>{{$product->description}}</h6>
                                <h3 class="fw-bolder fs-2">@money($product->price)</h3>
                                <hr>
                                <p>{{$product->stock}} left</p>
                                @if (!Auth::user()->is_admin)
                                    <form action="{{route('add_to_cart', $product)}}" method="post">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" aria-describedby="basic-addon2" name="amount" value="1">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">Add to cart</button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <div class="col d-grid gap-2 d-flex justify-content-end">
                                        <form action="{{route('edit_product', $product)}}" method="get">
                                            <button type="submit" class="btn btn-primary btn-md">Edit Product</button>
                                        </form>
                                        <form action="{{route('index_product')}}" method="get">
                                            <button type="submit" class="btn btn-danger btn-md">Cancel</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header fs-2 fw-bold">{{__('Products')}}</div>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @foreach ($products as $product)
                            <div class="col">
                                <div class="card-group m-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                                    <img class="card-img-top h-100" src="{{url('storage/'.$product->image)}}" alt="product-image">
                                    <div class="card-body">
                                        <p class="card-text fs-3 fw-bolder">{{$product->name}}</p>
                                        <div class=" d-grid gap-5 d-flex justify-content-between">
                                            <form action="{{route('show_product', $product)}}" method="get">
                                                <button type="submit" class="btn btn-primary">Details</button>
                                            </form>
                                            @if (Auth::check() && Auth::user()->is_admin)
                                                <form action="{{route('delete_product', $product)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
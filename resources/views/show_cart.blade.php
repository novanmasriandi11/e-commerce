@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold fs-4">
                        <div class="d-flex justify-content-between">
                            {{__('Cart')}}
                            <a href="{{route('index_product')}}">
                            <i class="bi bi-arrow-left-circle-fill"></i></a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        @endif

                        @php
                            $total_price = 0;
                        @endphp

                        <div class="card-group m-auto">
                            @foreach ($carts as $cart)
                                <div class="card m-3 shadow p-3 mb-5 bg-body-tertiary rounded" style="width: 14rem">
                                    <img class="card-img-top" src="{{url('storage/'. $cart->product->image)}}">
                                    <div class="card-body ">
                                        <h5 class="card-title">{{$cart->product->name}}</h5>
                                        <form action="{{route('update_cart',$cart)}}" method="post">
                                            @method('patch')
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input class="form-control" aria-describedby="basic-addon2" type="number" name="amount" value="{{$cart->amount}}">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit">Update Amount</button>
                                                </div>
                                            </div>
                                        </form>
                                        <form action="{{route('delete_cart', $cart)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                @php
                                    $total_price += $cart->product->price * $cart->amount;
                                @endphp
                            @endforeach
                        </div>
                        <div class="d-flex flex-column justify-content-end align-items-end">
                            <p class="fw-bolder fs-5">Total: @money($total_price)</p>
                            <form action="{{route('checkout')}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary" @if ($carts->isEmpty()) disabled @endif>Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
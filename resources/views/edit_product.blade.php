@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card m-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header fw-bold fs-4">{{__('Update Product')}}</div>

                    <div class="card-body">
                        <form action="{{route('update_product', $product)}}" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{$product->name}}" placeholder="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" value="{{$product->description}}" placeholder="Description" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <div class="input-group">
                                    <div class="input-group-text fw-bolder">Rp.</div>
                                    <input type="number" name="price" value="{{$product->price}}" placeholder="#.###.###" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" name="stock" value="{{$product->stock}}" placeholder="Stock" class="form-control">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">   
                            </div>
                                <button type="submit" class="btn btn-primary">Submit Data</button>
                                <button type="submit" class="btn btn-danger">
                                    <a href="{{route('index_product')}}" class="text-decoration-none text-white">Cancel</a>
                                </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
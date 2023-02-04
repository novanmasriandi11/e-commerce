@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card m-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header fw-bold fs-4">{{__('Create Product')}}</div>

                    <div class="card-body">
                        <form action="{{route("store_product")}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" placeholder="description" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <div class="input-group">
                                    <span class="input-group-text fw-bolder">Rp.</span>
                                    <input type="number" name="price" placeholder="price" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" name="stock" placeholder="stock" class="form-control">
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
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold fs-4">{{__('Profile')}}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        @endif

                        <form action="{{route('edit_profile')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label><br>
                                <input type="text" name="name" placeholder="name" value="{{$user->name}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{$user->email}}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <input type="role" name="role" class="form-control" value="{{$user->is_admin ? 'Admin':'Member'}}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Change Profile Details</button>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
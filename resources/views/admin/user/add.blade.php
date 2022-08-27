@extends('admin.master')

@section('title')
    Add User
@endsection

@section('body')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize text-center">add user</h4>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <ul class="bg-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{route('users.store')}}" method="post">
                        @csrf
                        <div class="row mt-3">
                            <label for="" class="col-md-4">Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control">
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4">Email</label>
                            <div class="col-md-8">
                                <input type="email" name="email" class="form-control">
                                <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4">Password</label>
                            <div class="col-md-8">
                                <input type="text" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4">Role</label>
                            <div class="col-md-8">
                                <select name="access_label" id="" class="form-control">
                                    <option value="2">Admin</option>
                                    <option value="1" selected>Teacher</option>
                                    <option value="0">Student</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success" value="Add User">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

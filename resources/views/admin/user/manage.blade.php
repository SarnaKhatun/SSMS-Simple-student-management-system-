@extends('admin.master')
@section('title')
    Manage User
@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center text-capitalize">manage user</h4>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-bordered">
                        <thead>
                        <tr>
                            <th>Sl. No:</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>image</th>
                            <th>Role</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->userDetail->phone}}</td>
                                <td><img src="{{asset($user->userDetail->image)}}" alt="" style="height: 100px; width: 100px;"></td>
                                <td>
                                    {{$user->access_label == 2 ? 'Admin' : ''}}
                                    {{$user->access_label == 1 ? 'Teacher' : ''}}
                                    {{$user->access_label == 0 ? 'Student' : ''}}
                                </td>
                                <td>{{$user->userDetail->address}}</td>
                                <td>{{$user->userDetail->status == 0 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    <a href="{{route('users.change-status', ['id' => $user->id])}}" @if($user->userDetail->status == 0) class="btn btn-primary" @endif @if($user->userDetail->status == 1) class="btn btn-warning" @endif>
                                        <i class="fa fa-egg">status</i>
                                    </a>
                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-secondary">
                                        <i class="fa fa-edit">edit</i>
                                    </a>
                                    <form action="{{route('users.destroy', $user->id)}}" method="post" onsubmit="return confirm('Are u sure want to delete this user account????')" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger" value="delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

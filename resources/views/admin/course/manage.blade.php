@extends('admin.master')

@section('title')
    Manage Course
@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center text-capitalize">manage course</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>Sl. No:</th>
                            <th>Title</th>
                            <th>Starting Date</th>
                            <th>Ending Date</th>
                            <th>Fee</th>
                            <th>Short Description</th>
                            <th>Long Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$course->title}}</td>
                                <td>{{$course->starting_date}}</td>
                                <td>{{$course->ending_date}}</td>
                                <td>{{$course->fee}}</td>
                                <td>{{$course->short_description}}</td>
                                <td>{{$course->long_description}}</td>
                                <td><img src="{{asset($course->image)}}" alt="" style="height: 100px; width: 100px;"></td>
                                <td>{{$course->status == 1 ? 'Active' : 'Inactive'}}</td>
                                <td>
                                    <a href="{{route('courses.change-status', ['id' => $course->id])}}" @if($course->status == 0) class="btn btn-warning" @endif @if($course->status == 1) class="btn btn-success" @endif>
                                        <i class="fa fa-egg">status</i>
                                    </a>
                                    <a href="{{route('courses.edit', $course->id)}}" class="btn btn-secondary">
                                        <i class="fa fa-edit">edit</i>
                                    </a>
                                    <form action="{{route('courses.destroy', $course->id)}}" method="post" onsubmit="return confirm('Are u sure want to delete this??????')" style="display: inline-block">
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

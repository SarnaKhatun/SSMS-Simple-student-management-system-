@extends('admin.master')
@section('title')
    Manage Enroll
@endsection
@section('body')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize text-center">manage enroll</h4>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-bordered">
                        <thead>
                        <tr>
                            <th>Sl. No:</th>
                            <th>Course Name</th>
                            <th>Student Name</th>
                            <th>Enroll Date</th>
                            <th>Course Fee</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($enrolls as $enroll)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$enroll->course->title}}</td>
                                <td>{{$enroll->user->name}}</td>
                                <td>{{$enroll->enroll_date}}</td>
                                <td>{{$enroll->course->fee}}</td>
                                <td>{{$enroll->payment_method == 1 ? 'Cash' : 'SSLComss'}}</td>
                                <td>{{$enroll->payment_status}}</td>
                                <td>
                                    <a href="{{route('enroll.change-status', ['id' => $enroll->id])}}" @if($enroll->payment_status == 'pending') class="btn btn-warning" @endif @if($enroll->payment_status == 'complete') class="btn btn-success" @endif>
                                        <i class="fa fa-egg">status</i>
                                    </a>
                                    <a href="{{route('delete.enroll', ['id' => $enroll->id])}}" class="btn btn-danger" onclick="return confirm('R u sure want 2 dlt this enrolled???')">
                                        <i class="fa fa-trash">delete</i>
                                    </a>
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

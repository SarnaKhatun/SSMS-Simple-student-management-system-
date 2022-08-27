@extends('front.master')
@section('title')
    Details
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset($course->image)}}" alt="" style="height: 250px;" class="img-fluid w-100">
                </div>
                <div class="col-md-6">
                    <div class="card card-body">
                        <h4 class="text-capitalize">title: {{$course->title}}</h4>
                        <p>Fee: {{$course->fee}}</p>
                        <p>Starting Date: {{$course->starting_date}}</p>
                        <p>{{$course->short_description}}</p>
                        <form action="{{route('course.enroll')}}" method="post">
                            @csrf
                            <input type="hidden" name="course_id" value="{{$course->id}}">
                            <input type="submit" class="btn btn-primary" value="Enroll" {{$hasEnroll == true ? 'disabled' : ''}}>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <h5 class="text-capitalize">{!! $course->long_description !!}</h5>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('front.master')

@section('title')
    Home
@endsection

@section('body')
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('/')}}front-assets/img/1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('/')}}front-assets/img/2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('/')}}front-assets/img/2.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center text-capitalize">all courses</h4>
                </div>
            </div>
            <div class="row">
               @foreach($courses as $course)
                    <div class="col-md-4">
                        <a href="{{route('course-details', ['id' => $course->id])}}" class="nav-link text-dark">
                            <div class="card">
                                <img src="{{asset($course->image)}}" alt="" style="height: 300px;" class="card-img-top w-100">
                                <div class="card-body">
                                    <h5 class="text-capitalize">Title: {{$course->title}}</h5>
                                    <p class="text-capitalize">course fee: {{$course->fee}} </p>
                                    <p class="text-capitalize">starting from: {{$course->starting_date}} </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

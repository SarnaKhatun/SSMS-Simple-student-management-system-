<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Front | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('/')}}front-assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}front-assets/css/icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a href="" class="navbar-brand">LOGO</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="{{route('/')}}" class="nav-link">Course</a></li>
            <li class="nav-item"><a href="{{route('/')}}" class="nav-link">About us</a></li>
            <li class="nav-item"><a href="{{route('/')}}" class="nav-link">Contact</a></li>
        </ul>
    </div>
</nav>

@yield('body')

<section class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-white">
                <a href="" class="navbar-brand text-white fw-bolder">LOGO</a>
                <p style="text-align: justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid asperiores commodi cupiditate deleniti deserunt dicta, ea eos et nam nobis odio omnis placeat quis sed. Cumque facere praesentium velit.</p>
            </div>
            <div class="col-md-6">
                <ul class="nav flex-column">
                    <li><a href="{{route('login')}}" class="nav-link text-white">Home</a></li>
                    <li><a href="" class="nav-link text-white">Course</a></li>
                    <li><a href="" class="nav-link text-white">About us</a></li>
                    <li><a href="" class="nav-link text-white">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('/')}}front-assets/js/jquery-3.6.0.min.js"></script>
<script src="{{asset('/')}}front-assets/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if(Session::has('message'))
    <script>
        toastr.success('{{Session::get('message')}}');
    </script>
@endif


@if(Session::has('error'))
    <script>
        toastr.error('{{Session::get('error')}}');
    </script>
@endif
</body>
</html>

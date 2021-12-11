<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>@yield('title')</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->

<link rel="shortcut icon" href="{{ asset("/markedia/images/favicon.ico") }}" type="image/x-icon"/>
<link rel="apple-touch-icon" href="{{ asset("/markedia/images/apple-touch-icon.png") }}">
<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="{{ asset("/markedia/css/bootstrap.css") }}">

<!-- FontAwesome Icons core CSS -->
<link rel="stylesheet" href="{{ asset("/markedia/css/font-awesome.min.css") }}">

<!-- Custom styles for this template -->
<link rel="stylesheet" href="{{ asset("/markedia/style.css") }}">

<!-- Animate styles for this template -->
<link rel="stylesheet" href="{{ asset("/markedia/css/animate.css") }}">

<!-- Responsive styles for this template -->
<link rel="stylesheet" href="{{ asset("/markedia/css/responsive.css") }}">

<!-- Colors for this template -->
<link rel="stylesheet" href="{{ asset("/markedia/css/colors.css") }}">


<!-- Version Marketing CSS for this template -->
<link rel="stylesheet" href="{{ asset("/markedia/css/version/marketing.css") }}">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>

<div id="wrapper">
    @include('layouts.navbar')

    @yield('header')

    <section class="section lb @if (!Request::is('/')) m3rem @endif">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    @yield('content')
                </div><!-- end col -->

                <!-- end col -->
            </div><!-- end row -->
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                @include('layouts.sidebar')
            </div>
        </div><!-- end container -->
    </section>

@include('layouts.footer')

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>@yield('title')</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<meta name="_token" content="{!! csrf_token() !!}" />

<link rel="shortcut icon" href="{{ asset("/markedia/images/favicon.ico") }}" type="image/x-icon"/>
<link rel="apple-touch-icon" href="{{ asset("/markedia/images/apple-touch-icon.png") }}">
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
<link rel="stylesheet" href="{{ asset("/markedia/css/bootstrap.css") }}">
<link rel="stylesheet" href="{{ asset("/markedia/css/font-awesome.min.css") }}">
<link rel="stylesheet" href="{{ asset("/markedia/style.css") }}">
<link rel="stylesheet" href="{{ asset("/markedia/css/animate.css") }}">
<link rel="stylesheet" href="{{ asset("/markedia/css/responsive.css") }}">
<link rel="stylesheet" href="{{ asset("/markedia/css/colors.css") }}">
<link rel="stylesheet" href="{{ asset("/markedia/css/version/marketing.css") }}">
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

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
                </div>


            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                @include('layouts.sidebar')
            </div>
        </div>
    </section>

@include('layouts.footer')
    <script src="{{ asset("/assets/admin/plugins/jquery/jquery.min.js") }}"></script>

</body>
</html>

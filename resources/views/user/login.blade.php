<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Login Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset("/assets/admin/plugins/fontawesome-free/css/all.min.css") }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset("/assets/admin/css/adminlte.min.css") }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <b>Авторизация</b>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif

            <form action="{{route('login')}}" method="post">
                @csrf


                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email"
                           value="{{old('email')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Пароль">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>


                <!-- /.col -->
                <div class="col-4 offset-9">
                    <button type="submit" class="btn btn-primary">Войти</button>
                </div>
                <!-- /.col -->

            </form>

            <a href="{{route('register.create')}}" class="text-center">Зарегестрироваться</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<script src="{{ asset("/assets/admin/plugins/jquery/jquery.min.js") }}"></script>
<script src="{{ asset("/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("/assets/admin/js/adminlte.min.js") }}"></script>
<script src="{{ asset("/assets/admin/js/demo.js") }}"></script>
<script src="{{ asset("/assets/admin/plugins/select2/js/select2.full.min.js") }}"></script>

</body>
</html>

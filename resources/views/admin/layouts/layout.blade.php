<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Blank Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset("/assets/admin/plugins/fontawesome-free/css/all.min.css") }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset("/assets/admin/css/adminlte.min.css") }}">
    <link rel="stylesheet" href="{{ asset("/assets/admin/plugins/select2/css/select2.min.css") }}">
    <link rel="stylesheet"
          href="{{ asset("/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css") }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .ck-editor__editable_inline {
            min-height: 300px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{url('/')}}" target="_blank" class="brand-link">
            <img src="{{ asset("assets/admin/img/AdminLTELogo.png") }}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">На сайт</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset("assets/admin/img/user2-160x160.jpg") }}" class="img-circle elevation-2"
                         alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Aleksey Banha</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('admin.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Главная</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-archive"></i>
                            <p>
                                Категории
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('categories.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список категорий</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categories.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Новая категория</p>
                                </a>
                            </li>

                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Теги
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('tag.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список тегов</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('tag.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Новый тег</p>
                                </a>
                            </li>

                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Статьи
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('posts.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список статей</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('posts.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Новая статья</p>
                                </a>
                            </li>

                            </li>
                        </ul>
                    </li>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container mt-2">
            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            <ul class="list-unstyled">
                                {{session('success')}}
                            </ul>
                        </div>
                    @endif
                        @if (session()->has('danger'))
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    {{session('danger')}}
                                </ul>
                            </div>
                        @endif
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.5
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="{{ asset("/assets/admin/plugins/jquery/jquery.min.js") }}"></script>
<script src="{{ asset("/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("/assets/admin/js/adminlte.min.js") }}"></script>
<script src="{{ asset("/assets/admin/js/demo.js") }}"></script>
<script src="{{ asset("/assets/admin/plugins/select2/js/select2.full.min.js") }}"></script>
<script src="{{ asset("/assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js") }}"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
<script>
    $('.nav-sidebar a').each(function () {
        let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
        let link = this.href;
        if (link == location) {
            $(this).addClass('active');
            $(this).closest('.has-treeview').addClass('menu-open');
        }
    });
    $('.select2').select2()
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
<script src="{{asset('/assets/admin/ckeditor5/build/ckeditor.js')}}"></script>
<script src="{{asset('/assets/admin/ckfinder/ckfinder/ckfinder.js')}}"></script>


<script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            image: {
                // You need to configure the image toolbar, too, so it uses the new style buttons.
                toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight'],

                styles: [
                    // This option is equal to a situation where no style is applied.
                    'full',

                    // This represents an image aligned to the left.
                    'alignLeft',

                    // This represents an image aligned to the right.
                    'alignRight'
                ]
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    'alignment',
                    '|',
                    'blockQuote',
                    'insertTable',
                    'undo',
                    'redo',

                ]
            },
            language: 'ru',
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
        })
        .catch(function (error) {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#description'), {
            toolbar: ['heading', '|', 'bold', 'italic', '|', 'undo', 'redo']
        })
        .catch(function (error) {
            console.error(error);
        });
</script>
</body>
</html>

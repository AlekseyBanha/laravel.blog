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

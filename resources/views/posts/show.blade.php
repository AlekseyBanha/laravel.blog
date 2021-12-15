@extends('layouts.layout')

@section('title','Markedia ::' . $post->title)

@section('content')


    <div class="page-wrapper">
        <div class="blog-title-area">
            <ol class="breadcrumb hidden-xs-down">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a
                        href="{{route('categories.single',$post->category->slug)}}">{{$post->category->slug}}</a></li>
                <li class="breadcrumb-item active">{{$post->title}}</li>
            </ol>

            <span class="color-yellow"><a href="{{route('categories.single',$post->category->slug)}}"
                                          title="">{{$post->category->title}}</a></span>

            <h3>{{$post->title}}</h3>

            <div class="blog-meta big-meta">
                <small>{{$post->getPostDate()}}</small>
                <small><i class="fa fa-eye"></i> {{$post->view}}</small>
            </div><!-- end meta -->

            <div class="post-sharing">
                <ul class="list-inline">
                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                class="down-mobile">Share on Facebook</span></a></li>
                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                class="down-mobile">Tweet on Twitter</span></a></li>
                    <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div><!-- end post-sharing -->
        </div><!-- end title -->

        <div class="single-post-media">
            <img src="{{$post->getImage()}}" alt="" class="img-fluid">
        </div><!-- end media -->

        <div class="blog-content">
            {!! $post->content !!}
        </div><!-- end content -->

        <div class="blog-title-area">
            <div class="blog-content">

                <div class="tag-cloud-single">
                    <span>Tags</span>
                    @if($post->tags->count())
                        @foreach($post->tags as $tag)
                            <small><a href="{{route('tags.single',$tag->slug)}}" title="">{{$tag->title}}</a></small>
                        @endforeach @else Post has no tags

                    @endif
                </div><!-- end meta -->

                <div class="post-sharing">
                    <ul class="list-inline">
                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                    class="down-mobile">Share on Facebook</span></a></li>
                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                    class="down-mobile">Tweet on Twitter</span></a></li>
                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div><!-- end post-sharing -->
            </div><!-- end title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-spot clearfix">
                        <div class="banner-img">
                            <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                        </div><!-- end banner-img -->
                    </div><!-- end banner -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis1">


            <div class="custombox clearfix">
                <h4 class="small-title">{{count($post->comments)}} Comments</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="comments-list ">
                            @foreach($post->comments as $comment)

                                <div class="media ">

                                    <div class="media-body">
                                        <h4 class="media-heading user_name">{{$comment->Name}}
                                            <small>{{$comment->email}}</small>
                                            <small>{{$comment->getPostDate()}}</small></h4>
                                        <p>{!! $comment->text !!}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end custom-box -->
            <hr class="invis1">

            <div class="custombox clearfix">
                <h4 class="small-title">Leave a Reply</h4>
                <div class="row">

                    @if(Auth::user())
                        <div class="col-lg-12">
                            <form class="form-wrapper" method="post" action="{{route('comment')}}">
                                @csrf
                                <input hidden name="post_id" value="{{$post->id}}">
                                <textarea name="text" rows="5" id="text" class="form-control"
                                          placeholder="Your comment"></textarea>
                                <button type="submit" class="btn btn-primary mt-2">Submit Comment</button>
                            </form>
                        </div>
                    @else
                        <h5 class="mt-2 offset-lg-2 p-2">To leave a comment you need to log in</h5>

                        <div class="container"> @if ($errors->any())
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
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 offset-9">
                                    <button type="submit" class="btn btn-primary mt-2">Login</button>
                                </div>

                            </form>
                            <div class="col-4">
                                <button type="submit" onclick="disp(document.getElementById('form1'))"
                                        class="btn btn-primary mt-2">I am not registered
                                </button>
                            </div>

                            <form action="{{route('register.store')}}" class="mt-2" id="form1" style="display: none;"
                                  method="post">
                                @csrf
                                <h6 class="mt-2 offset-lg-2 p-2">Enter your registration data</h6>
                                <div class="input-group mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Name"
                                           value="{{old('name')}}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                           value="{{old('email')}}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="password_confirmation" class="form-control"
                                           placeholder="Repeat password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 offset-7">
                                    <button type="submit" class="btn btn-primary">Registration</button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>

            </div>
        </div>

        <script src="{{asset('/assets/admin/ckeditor5/build/ckeditor.js')}}"></script>
        <script src="{{asset('/assets/admin/ckfinder/ckfinder/ckfinder.js')}}"></script>
        <script> ClassicEditor
                .create(document.querySelector('#text'), {
                    toolbar: ['heading', '|', 'bold', 'italic', '|', 'undo', 'redo']
                })
                .catch(function (error) {
                    console.error(error);
                });</script>
        <script>
            function disp(form) {
                if (form.style.display == "none") {
                    form.style.display = "block";
                } else {
                    form.style.display = "none";
                }
            }
        </script>
@endsection

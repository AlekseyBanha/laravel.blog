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
                @auth()

                    <ul class="list-inline">
                        <li><a href="https://uk-ua.facebook.com/" target="_blank"
                               class="fb-button btn btn-primary"><i
                                    class="fa fa-facebook"></i> <span
                                    class="down-mobile">Share on Facebook</span></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/" target="_blank"
                               class="tw-button btn btn-primary"><i
                                    class="fa fa-twitter"></i> <span
                                    class="down-mobile">Tweet on Twitter</span></a>
                        </li>

                        <li>
                            <form action="{{route('mail')}}" method="post">
                                @csrf
                                <input hidden name="slug" value="{{$post->slug}}">
                                <button onclick="myFunction()" class=" sec gp-button btn btn-primary"
                                        type="submit">
                                    <div class="repair1"><i
                                            class="fa fa-google-plus"></i><span
                                            class="down-mobile">  Email</span></div>
                                </button>
                            </form>
                        </li>

                    </ul>
                @endauth

            </div>
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
                    @auth()

                        <ul class="list-inline">
                            <li><a href="https://uk-ua.facebook.com/" target="_blank"
                                   class="fb-button btn btn-primary"><i
                                        class="fa fa-facebook"></i> <span
                                        class="down-mobile">Share on Facebook</span></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/" target="_blank"
                                   class="tw-button btn btn-primary"><i
                                        class="fa fa-twitter"></i> <span
                                        class="down-mobile">Tweet on Twitter</span></a>
                            </li>

                            <li>
                                <form action="{{route('mail')}}" method="post">
                                    @csrf
                                    <input hidden name="slug" value="{{$post->slug}}">
                                    <button onclick="myFunction()" class=" sec gp-button btn btn-primary"
                                            type="submit">
                                        <div class="repair1"><i
                                                class="fa fa-google-plus"></i><span
                                                class="down-mobile">  Email</span></div>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    @endauth

                </div>
            </div><!-- end title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-spot clearfix">
                        <div class="banner-img">
                            <img src="{{ asset("/markedia/images/footer.png")}}" alt="" class="img-fluid">
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
                            @foreach($pagine as $comment)
                                <div class="media ">
                                    <div class="media-body">
                                        <h4 class="media-heading user_name">
                                            <strong class="element-name-media">
                                                {{$comment->Name}}
                                            </strong>
                                            <small class="element-name-email">
                                                {{$comment->email}}
                                            </small>
                                            <small class="element-name-date">
                                                {{$comment->getPostDate()}}
                                            </small></h4>
                                        <p class="element-name-text"><strong>Message:</strong> {!! $comment->text !!}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="align-content-center col-md-12">
                            <nav aria-label="Page navigation" class="pagination  pagination-sm">
                                {{$pagine->links("pagination::bootstrap-4")}}
                            </nav>
                        </div>

                    </div><!-- end col -->
                </div><!-- end row -->

            </div><!-- end custom-box -->

            <div class="row">
                <!-- end col -->
            </div>
            <hr class="invis1">

            <div class="custombox clearfix">
                <h4 class="small-title">Leave a Reply</h4>
                <div class="row">

                    @if(Auth::user())
                        <div class="col-lg-12">
                            <form class="form-wrapper" id="message">
                                @csrf
                                <input hidden name="post_id" value="{{$post->id}}">
                                <textarea name="text" rows="5" id="text" class="form-control"
                                          placeholder="Your comment"></textarea>
                                <button type="submit" id="save" class="btn btn-primary mt-2">Submit Comment</button>
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
        <div class="media media-for-clone " hidden>
            <div class="media-body">
                <h4 class="media-heading user_name">
                    <strong class="element-name-media">
                    </strong>
                    <small class="element-name-email">
                    </small>
                    <small class="element-name-date">
                    </small></h4>
                <p class="element-name-text"></p>
            </div>
        </div>
        {{--    <script src="{{asset('/assets/admin/ckeditor5/build/ckeditor.js')}}"></script>
            <script src="{{asset('/assets/admin/ckfinder/ckfinder/ckfinder.js')}}"></script>--}}
        <script src="{{ asset("/assets/admin/plugins/jquery/jquery.min.js") }}"></script>
        <script>
            $('#message').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url: '{{route('comment')}}',
                    type: 'post',
                    data: $('#message').serialize(),
                    success: function (data) {
                        data = JSON.parse(data)
                        var newMedia = $(".media-for-clone").last().clone();
                        newMedia.removeAttr('hidden');
                        newMedia.appendTo(".comments-list");
                        console.log(newMedia)
                        console.log(data)
                        newMedia.find(".element-name-text").text(data.text);
                        newMedia.find(".element-name-media").text(data.name);
                        newMedia.find(".element-name-email").text(data.email);
                        newMedia.find(".element-name-date").text(data.date);
                    }
                });
            });
        </script>

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
        <script>
            function myFunction() {
                alert("The post has been sent to your mail");
            }
        </script>

@endsection

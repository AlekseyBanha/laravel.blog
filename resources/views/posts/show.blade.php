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
                                <textarea  name="text" rows="5" id="text" class="form-control"
                                          placeholder="Your comment"></textarea>
                                <button type="submit" class="btn btn-primary mt-2">Submit Comment</button>
                            </form>
                        </div>
                    @else To send a comment you need to  <h3><a href="{{route('register.create')}}">log</a></h3>  in.
                    @endif
                </div>

            </div>
        </div><!-- end page-wrapper -->

        <script src="{{asset('/assets/admin/ckeditor5/build/ckeditor.js')}}"></script>
        <script src="{{asset('/assets/admin/ckfinder/ckfinder/ckfinder.js')}}"></script>
        <script> ClassicEditor
                .create(document.querySelector('#text'), {
                    toolbar: ['heading', '|', 'bold', 'italic', '|', 'undo', 'redo']
                })
                .catch(function (error) {
                    console.error(error);
                });</script>

@endsection

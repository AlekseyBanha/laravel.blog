@extends('layouts.category_layout')

@section('title','Markedia ::' . $category->title)

@section('page-title')
    <div class="page-title db">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2> {{$category->title}} <small class="hidden-xs-down hidden-sm-down">in this
                            category {{count($category->posts)}} articles
                        </small></h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">{{$category->title}}</li>
                    </ol>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="blog-custom-build">
            @foreach($posts as $post)
                <div class="blog-box wow fadeIn">
                    <div class="post-media">
                        <a href="{{route('posts.single',[$post->slug])}}" title="">
                            <img src="{{$post->getImage()}}" alt="" class="img-fluid">
                            <div class="hovereffect">
                                <span></span>
                            </div>
                            <!-- end hover -->
                        </a>
                    </div>
                    <!-- end media -->
                    <div class="blog-meta big-meta text-center">
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
                                            <button onclick="myFunction()" class=" gp-button btn btn-primary"
                                                    type="submit"><i
                                                    class="fa fa-google-plus"></i><span
                                                    class="down-mobile">  Email</span></button>
                                        </form>
                                    </li>
                                </ul>
                            @endauth                        </div><!-- end post-sharing -->
                        <h4><a href="{{route('posts.single',[$post->slug])}}" title="">{{$post->title}}</a></h4>
                        <p>{!! $post->description!!}</p>
                        <small><a href="{{route('categories.single',$category->slug)}}"
                                  title="">{{$category->title}}</a></small>
                        <small>{{$post->getPostDate()}}</small>
                        <small><i class="fa fa-eye"></i> {{$post->view}}</small>
                    </div><!-- end meta -->
                </div><!-- end blog-box -->

                <hr class="invis">
            @endforeach
        </div>

        <hr class="invis">

        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Page navigation" class="pagination justify-content-center">
                    {{$posts->links("pagination::bootstrap-4")}}
                </nav>
            </div><!-- end col -->
        </div>
        <script>
            function myFunction() {
                alert("The post has been sent to your mail");
            }
        </script>

@endsection



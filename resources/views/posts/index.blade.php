@extends('layouts.layout')

@section('title','Markedia :: Home')

@include('layouts.header')



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
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i
                                            class="fa fa-facebook"></i> <span
                                            class="down-mobile">Share on Facebook</span></a>
                                </li>
                                <li><a href="#" class="tw-button btn btn-primary"><i
                                            class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a>
                                </li>
                                <li><a href="#" class="gp-button btn btn-primary"><i
                                            class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div><!-- end post-sharing -->
                        <h4><a href="{{route('posts.single',[$post->slug])}}" title="">{{$post->title}}</a></h4>
                        <p>{!! $post->description!!}</p>
                        <small><a href="{{route('categories.single',$post->category->slug)}}"
                                  title="">{{$post->category->title}}</a></small>
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

        @endsection



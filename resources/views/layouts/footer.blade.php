<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Lasts Posts</h2>
                    <div class="blog-list-widget">
                        <div class="list-group">
                            @if(count($news_post))
                                @foreach($news_post as $new_post)
                                    <a href="{{route('posts.single',$new_post->slug)}}"
                                       class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="{{$new_post->getImage()}}" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">{{$new_post->title}}</h5>
                                            <small>{{$new_post->getPostDate()}}</small>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                            @endif


                        </div>
                    </div><!-- end blog-list -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Popular Posts</h2>
                    <div class="blog-list-widget">
                        <div class="list-group">

                            @if(count($popular_post))
                                @foreach($popular_post as $top_post)
                                    <a href="{{route('posts.single',$top_post->slug)}}"
                                       class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="{{$top_post->getImage()}}" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">{{$top_post->title}}</h5>
                                            <small>{{$top_post->getPostDate()}}</small>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                            @endif


                        </div>
                    </div><!-- end blog-list -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Popular Categories</h2>
                    <div class="link-widget">
                        <ul>@foreach($categories as $category)
                                <li><a href="{{route('categories.single',$category->slug)}}">{{$category->title}} <span>({{count($category->posts)}})</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div><!-- end link-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <br>
                <div class="copyright">&copy; Markedia. Design: <a
                        href="https://www.linkedin.com/in/oleksii-banha-466379227/" target="_blank">Aleksey Banha</a>.
                </div>
            </div>
        </div>
    </div><!-- end container -->
</footer><!-- end footer -->

<div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->

<!-- Core JavaScript
================================================== -->
<script src="{{ asset("/markedia/js/jquery.min.js") }}"></script>
<script src="{{ asset("/markedia/js/tether.min.js") }}"></script>
<script src="{{ asset("/markedia/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("/markedia/js/animate.js") }}"></script>
<script src="{{ asset("/markedia/js/custom.js") }}"></script>

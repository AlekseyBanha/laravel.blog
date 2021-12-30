<div class="sidebar">
    <div class="widget">
        <h2 class="widget-title">Popular Posts</h2>
        <div class="blog-list-widget">
            <div class="list-group">
                @foreach($popular_posts as $top_posts)
                    <a href="{{route('posts.single',$top_posts->slug)}}"
                       class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="{{$top_posts->getImage()}}" alt="" class="img-fluid float-left">
                            <h5 class="mb-2">{{$top_posts->title}}</h5>
                            <small>{{$top_posts->getPostDate()}}</small>
                            <small><i class="fa fa-eye"></i>{{$top_posts->view}}</small>

                        </div>
                    </a>
                @endforeach

            </div>
        </div><!-- end blog-list -->
    </div><!-- end widget -->

    <div class="widget">
        <h2 class="widget-title"> Categories</h2>
        <div class="link-widget">
            <ul>@foreach($categories as $category)
                    <li><a href="{{route('categories.single',$category->slug)}}">{{$category->title}}
                            <span>({{count($category->posts)}})</span></a>
                    </li>
                @endforeach
            </ul>
        </div><!-- end link-widget -->
    </div><!-- end widget -->
</div><!-- end sidebar -->

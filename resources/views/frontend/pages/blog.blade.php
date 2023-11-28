@extends('layout.frontend')
@section('content')
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach($blog_list as $blog)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{$blog->image_banner}}" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3>{{formatDate($blog->created_at, 'd')}}</h3>
                                    <p>{{formatDate($blog->created_at, 'D')}}</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="{{route('single_blog', $blog->id)}}">
                                    <h2>{{$blog->title}}</h2>
                                </a>
                                <p>{{$blog->description}}</p>
                                <ul class="blog-info-link">
                                    <li>
                                        @foreach($categories as $category)
                                            @if($category->id == $blog->category_id)
                                                <a href="{{route('category', $category->id)}}"><i class="fa fa-user"></i>{{$category->name}}</a>
                                            @endif
                                        @endforeach
                                    </li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-comments"></i> {{$list_count_comment[$blog->id]}} Comments</a></li>
                                </ul>
                            </div>
                        </article>
                        @endforeach
                        {{$blog_list->appends($_GET)->links('frontend.paginations.blog')}}
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('frontend.elements.blog_right_sidebar')
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@stop
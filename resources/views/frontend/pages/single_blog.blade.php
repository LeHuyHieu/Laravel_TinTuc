@extends('layout.frontend')
@section('content')
    @php
        $id = $blog[0]->id ?? null;

        $arrBlogNext = [];
        $arrBlogPrev = [];
        if ($id !== null) {
            foreach($blogs as $key => $item) {
                if ($item->id == $id) {
                    if (isset($blogs[$key + 1])) {
                        $arrBlogNext = $blogs[$key + 1];
                    }
                    if ($key > 0) {
                        $arrBlogPrev = $blogs[$key - 1];
                    }
                    break;
                }
            }
        }
        $linkFormComment = (!Auth::check() || Auth::user()->email_verified_at == '')?'login':'single_blog.messageloadform';
    @endphp
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        @foreach($blog as $item)
                        <div class="feature-img">
                            <img class="img-fluid" width="100%" src="{{$item->image_banner}}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>{{$item->title}}</h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li>
                                    @foreach($categories as $category)
                                        @if($category->id == $item->category_id)
                                            <a href="{{route('category', $category->id)}}"><i class="fa fa-user"></i>{{$category->name}}</a>
                                        @endif
                                    @endforeach
                                </li>
                                <li><a href="#comments-area"><i class="fa fa-comments"></i> {{$list_count_comment[$id]}} Comments</a></li>
                            </ul>
                            <p class="excert">{{$item->description}}</p>
                            <div class="quote-wrapper">
                                <div class="quotes">{{$item->main_content}}</div>
                            </div>
                            <p class="excert">{{$item->content}}</p>
                        </div>
                        @endforeach
                    </div>
                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                        <div class="navigation-area" style="border-bottom: 0;">
                            <div class="row">
                                @if ($arrBlogPrev)
                                    <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                        <div class="thumb">
                                            <a href="{{ route('single_blog', ($arrBlogPrev->id)) }}">
                                                <img class="img-fluid" src="{{$arrBlogPrev->image}}" width="100px" alt="">
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="{{ route('single_blog', ($arrBlogPrev->id)) }}">
                                                <span class="lnr text-white ti-arrow-left"></span>
                                            </a>
                                        </div>
                                        <div class="detials">
                                            <p>Prev Post</p>
                                            <a href="{{ route('single_blog', ($arrBlogPrev->id)) }}">
                                                <h4 style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width: 100px;">{{$arrBlogPrev->title}}</h4>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                @if ($arrBlogNext)
                                    <div class="col-lg-6 col-md-6 col-12 ml-auto nav-right flex-row d-flex justify-content-end align-items-center">
                                        <div class="detials">
                                            <p>Next Post</p>
                                            <a href="{{ route('single_blog', ($arrBlogNext->id)) }}">
                                                <h4 style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width: 100px;">{{$arrBlogNext->title}}</h4>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="{{ route('single_blog', ($arrBlogNext->id)) }}">
                                                <span class="lnr text-white ti-arrow-right"></span>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="{{ route('single_blog', ($arrBlogNext->id)) }}">
                                                <img class="img-fluid" src="{{$arrBlogNext->image}}" width="100px" alt="">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @include('frontend.elements.coment_blog')
                </div>
                <div class="col-lg-4">
                    @include('frontend.elements.blog_right_sidebar')
                </div>
            </div>
            <hr>
            <div class="whats-news-area details">
                <div class="whats-news-caption">
                    <div class="section-tittle mb-30">
                        <h3>Blog liên quan</h3>
                    </div>
                    @if(count($related_blog) == 0)
                        <p>Không có bài viết nào</p>
                    @else
                        <div class="row">
                            @foreach($related_blog as $item)
                                <div class="col-lg-4">
                                    <div class="single-what-news mb-100">
                                        <div class="what-img">
                                            <img src="{{$item->image}}" alt="">
                                        </div>
                                        <div class="what-cap">
                                            <span class="color1">{{$item->tag}}</span>
                                            <h4><a href="{{route('single_blog', $item->id)}}">{{$item->title}}</a></h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--================ Blog Area end =================-->
@stop

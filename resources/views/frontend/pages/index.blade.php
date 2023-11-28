@extends('layout.frontend')

@section('content')
    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <strong>Xu Hướng</strong>
                                <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                                <div class="trending-animated">
                                    <ul id="js-news" class="js-hidden">
                                        <li class="news-item">Đây là nhũng tin hot nhất trong tuần</li>
                                        <li class="news-item">Là những tin được chọn lọc kỹ lưỡng hữu ích cho người đọc</li>
                                        <li class="news-item">Đa dạng hóa chủ đề...</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Top -->
                            @foreach($trending_now as $key => $trending)
                                @if($key == 0)
                                    <div class="trending-top mb-30">
                                        <div class="trend-top-img">
                                            <img src="{{$trending->image}}" alt="">
                                            <div class="trend-top-cap">
                                                <span>{{$trending->tag}}</span>
                                                <h2><a href="{{route('details', $trending->id)}}">{{$trending->title}}</a></h2>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <!-- Trending Bottom -->
                            <div class="trending-bottom">
                                <div class="row">
                                    @foreach($trending_now as $key => $trending)
                                        @if($key > 0 && $key < 4)
                                            <div class="col-lg-4">
                                                <div class="single-bottom mb-35">
                                                    <div class="trend-bottom-img mb-30">
                                                        <img src="{{$trending->image}}" alt="">
                                                    </div>
                                                    <div class="trend-bottom-cap">
                                                        <span class="color1">{{$trending->tag}}</span>
                                                        <h4><a href="{{route('details', $trending->id)}}">{{$trending->title}}</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Riht content -->
                        <div class="col-lg-4">
                            @foreach($trending_now as $key => $trending)
                                @if($key > 3)
                                    <div class="trand-right-single d-flex">
                                        <div class="trand-right-img">
                                            <img src="{{$trending->image}}" alt="">
                                        </div>
                                        <div class="trand-right-cap">
                                            <span class="color1">{{$trending->tag}}</span>
                                            <h4><a href="{{route('details', $trending->id)}}">{{$trending->title}}</a></h4>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->
        <!--   Weekly-News start -->
        <div class="weekly-news-area pt-50">
            <div class="container">
                <div class="weekly-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Tin Tức Được Quan Tâm</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="weekly-news-active news_of_interest dot-style d-flex dot-style">
                                @foreach($news_of_interest as $key => $item)
                                <div class="weekly-single {{($key == 1)?'active':''}}">
                                    <div class="weekly-img">
                                        <img src="{{$item->image}}" alt="">
                                    </div>
                                    <div class="weekly-caption">
                                        <span class="color1">{{$item->tag}}</span>
                                        <h4><a href="{{route('details', $item->id)}}">{{$item->title}}</a></h4>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->
        <!-- Whats New Start -->
        <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-3 col-md-3">
                                <div class="section-tittle mb-30">
                                    <h3>Có Gì Mới</h3>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            @foreach($categories as $key => $category)
                                                @if($category->parent_id == 0)
                                                   <a class="nav-item nav-link {{($key == 0)?'active':''}}" id="nav-{{$category->id}}-tab" data-toggle="tab" href="#nav-{{$category->id}}" role="tab" aria-controls="nav-{{$category->id}}" aria-selected="false">{{$category->name}}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    @foreach($categories as $key => $category)
                                        @if($category->parent_id == 0)
                                            <div class="tab-pane fade {{($key == 0)?'show active':''}}" id="nav-{{$category->id}}" role="tabpanel" aria-labelledby="nav-{{$category->id}}-tab">
                                                <div class="whats-news-caption">
                                                    <div class="row">
                                                        @foreach($category_news[$category->id] as $item)
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="single-what-news mb-100">
                                                                    <div class="what-img">
                                                                        <img src="{{$item->image}}" alt="">
                                                                    </div>
                                                                    <div class="what-cap">
                                                                        <span class="color1">{{$item->tag}}</span>
                                                                        <h4><a href="{{route('details', $item->id)}}">{{$item->title}}</a></h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @include('frontend.elements.menu_left_flow_socail')
                    </div>
                </div>
            </div>
        </section>
        <!-- Whats New End -->
        <!--   Weekly2-News start -->
        <div class="weekly2-news-area weekly2-pading gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Tin Tức Hàng Tuần</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="weekly2-news-active dot-style d-flex dot-style">
                                @foreach($weekly_top_news as $item)
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="{{$item->image}}" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">{{$item->tag}}</span>
                                        <p>{{formatDate($item->created_at, 'd')}} {{formatDate($item->created_at, 'D')}} {{formatDate($item->created_at, 'y')}}</p>
                                        <h4><a href="{{route('details', $item->id)}}">{{$item->title}}</a></h4>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->
        <!-- Start Youtube -->
        <div class="youtube-area video-padding">
            <div class="container">
                <div class="section-tittle mb-30">
                    <h3>Âm Nhạc</h3>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="video-items-active">
                            @foreach($youtube as $item)
                            <div class="video-items text-center">
                                <iframe data-loader="youtube" data-src="{{formatYoutubeLink($item->link)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="video-info">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="video-items-active">
                                @foreach($youtube as $item)
                                <div class="video-caption video-items">
                                    <div class="top-caption">
                                        <span class="color1">{{$item->tag}}</span>
                                    </div>
                                    <div class="bottom-caption">
                                        <h2>{{$item->title}}</h2>
                                        <p>{{$item->description}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="testmonial-nav text-center">
                                @foreach($youtube as $item)
                                <div class="single-video">
                                    <iframe data-loader="youtube" data-src="{{formatYoutubeLink($item->link)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    <div class="video-intro">
                                        <h4>{{$item->title}}</h4>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Start youtube -->
        <!--  Recent Articles start -->
        <div class="recent-articles">
            <div class="container">
                <div class="recent-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Bài Viết Gần Đây</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="recent-active dot-style d-flex dot-style">
                                @foreach($blog as $item)
                                <div class="single-recent mb-100">
                                    <div class="what-img">
                                        <img src="{{$item->image}}" alt="">
                                    </div>
                                    <div class="what-cap">
                                        <span class="color1">{{$item->tag}}</span>
                                        <h4><a href="{{route('single_blog', $item->id)}}">{{$item->title}}</a></h4>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Recent Articles End -->
        <!--Start pagination -->
        {{--<div class="pagination-area pb-45 text-center">--}}
            {{--<div class="container">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-xl-12">--}}
                        {{--<div class="single-wrap d-flex justify-content-center">--}}
                            {{--<nav aria-label="Page navigation example">--}}
                                {{--<ul class="pagination justify-content-start">--}}
                                    {{--<li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow roted"></span></a></li>--}}
                                    {{--<li class="page-item active"><a class="page-link" href="#">01</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">02</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#">03</a></li>--}}
                                    {{--<li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow right-arrow"></span></a></li>--}}
                                {{--</ul>--}}
                            {{--</nav>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <!-- End pagination  -->
    </main>
@stop
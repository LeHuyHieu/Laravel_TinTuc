@extends('layout.frontend')
@section('content')
    <main class="trending-area">
        <!-- About US Start -->
        <div class="about-area">
            <div class="container">
                <div class="trending-main" style="margin-bottom: 23px;">
                    <!-- Hot Aimated News Tittle-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <strong>Tin hot</strong>
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
                            @foreach($news as $new)
                                <div class="trand-right-single d-flex">
                                    <div class="trand-right-img" style="max-width: 200px; min-width: 180px;">
                                        <img src="{{$new->image}}" width="100%" alt="">
                                    </div>
                                    <div class="trand-right-cap">
                                        <span class="color1">{{$new->tag}}</span>
                                        <h4 class="mb-0"><a href="{{route('details', $new->id)}}">{{$new->title}}</a></h4>
                                        <p style="font-size: .85rem;" class="mb-0">{{$new->description}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-lg-4">
                            @include('frontend.elements.menu_left_flow_socail')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{$news->appends($_GET)->links('frontend.paginations.category')}}
        <!-- About US End -->
        <!-- Start Youtube -->
        {{--<div class="youtube-area">--}}
            {{--<div class="container">--}}
                {{--<!-- Hot Aimated News Tittle-->--}}
                {{--<div class="row">--}}
                    {{--<div class="col-lg-12">--}}
                        {{--<div class="trending-tittle">--}}
                            {{--<strong>Trending now</strong>--}}
                            {{--<!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->--}}
                            {{--<div class="trending-animated">--}}
                                {{--<ul id="js-news" class="js-hidden">--}}
                                    {{--<li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.</li>--}}
                                    {{--<li class="news-item">Spondon IT sit amet, consectetur.......</li>--}}
                                    {{--<li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="row">--}}
                    {{--<div class="col-12">--}}
                        {{--<div class="video-items-active">--}}
                            {{--<div class="video-items text-center">--}}
                                {{--<iframe src="https://www.youtube.com/embed/CicQIuG8hBo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                            {{--</div>--}}
                            {{--<div class="video-items text-center">--}}
                                {{--<iframe  src="https://www.youtube.com/embed/rIz00N40bag" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                            {{--</div>--}}
                            {{--<div class="video-items text-center">--}}
                                {{--<iframe src="https://www.youtube.com/embed/CONfhrASy44" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                            {{--</div>--}}
                            {{--<div class="video-items text-center">--}}
                                {{--<iframe src="https://www.youtube.com/embed/lq6fL2ROWf8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                            {{--</div>--}}
                            {{--<div class="video-items text-center">--}}
                                {{--<iframe src="https://www.youtube.com/embed/0VxlQlacWV4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="video-info">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-lg-6">--}}
                            {{--<div class="video-caption">--}}
                                {{--<div class="top-caption">--}}
                                    {{--<span class="color1">Politics</span>--}}
                                {{--</div>--}}
                                {{--<div class="bottom-caption">--}}
                                    {{--<h2>Welcome To The Best Model Winner Contest At Look of the year</h2>--}}
                                    {{--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit lorem ipsum dolor sit.</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-6">--}}
                            {{--<div class="testmonial-nav text-center">--}}
                                {{--<div class="single-video">--}}
                                    {{--<iframe  src="https://www.youtube.com/embed/CicQIuG8hBo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                                    {{--<div class="video-intro">--}}
                                        {{--<h4>Welcotme To The Best Model Winner Contest</h4>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="single-video">--}}
                                    {{--<iframe  src="https://www.youtube.com/embed/rIz00N40bag" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                                    {{--<div class="video-intro">--}}
                                        {{--<h4>Welcotme To The Best Model Winner Contest</h4>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="single-video">--}}
                                    {{--<iframe src="https://www.youtube.com/embed/CONfhrASy44" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                                    {{--<div class="video-intro">--}}
                                        {{--<h4>Welcotme To The Best Model Winner Contest</h4>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="single-video">--}}
                                    {{--<iframe src="https://www.youtube.com/embed/lq6fL2ROWf8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                                    {{--<div class="video-intro">--}}
                                        {{--<h4>Welcotme To The Best Model Winner Contest</h4>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="single-video">--}}
                                    {{--<iframe src="https://www.youtube.com/embed/0VxlQlacWV4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                                    {{--<div class="video-intro">--}}
                                        {{--<h4>Welcotme To The Best Model Winner Contest</h4>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <!-- End Start youtube -->
    </main>
@stop
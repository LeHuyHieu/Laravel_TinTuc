@extends('layout.frontend')
@section('content')
    @php
        $id = $news[0]->id ?? null;
        $linkFormComment = (!Auth::check())?'login':'details.detailsmessageLoadForm';
    @endphp
    <main>
        <!-- About US Start -->
        <div class="about-area">
            <div class="container">
                <!-- Hot Aimated News Tittle-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.</li>
                                    <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                    <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Tittle -->
                        <div class="about-right mb-90">
                            @foreach($news as $item)
                                <div class="about-img">
                                    <img src="{{$item->image}}" alt="">
                                </div>
                                <div class="section-tittle mb-30 pt-30">
                                    <h3>{{$item->title}}</h3>
                                </div>
                                <div class="about-prea">
                                    <p class="about-pera1 mb-25">{{$item->description}}</p>
                                </div>
                                <div class="quote-wrapper">
                                    <div class="quotes">{{$item->main_content}}</div>
                                </div>
                                <div class="about-prea">
                                    <p class="about-pera1 mb-25">{{$item->content}}</p>
                                </div>
                            @endforeach
                            <div class="social-share pt-30">
                                <div class="section-tittle">
                                    <h3 class="mr-20">Share:</h3>
                                    <ul>
                                        <li><a href="#"><img src="/frontend/template/assets/img/news/icon-ins.png" alt=""></a></li>
                                        <li><a href="#"><img src="/frontend/template/assets/img/news/icon-fb.png" alt=""></a></li>
                                        <li><a href="#"><img src="/frontend/template/assets/img/news/icon-tw.png" alt=""></a></li>
                                        <li><a href="#"><img src="/frontend/template/assets/img/news/icon-yo.png" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @include('frontend.elements.coment_new')
                    </div>
                    <div class="col-lg-4">
                        @include('frontend.elements.menu_left_flow_socail')
                    </div>
                </div>
                <hr>
                <div class="whats-news-area details">
                    <div class="whats-news-caption">
                        <div class="section-tittle mb-30">
                            <h3>Related news</h3>
                        </div>
                        @if(count($related_new) == 0)
                            <p>Không có bài viết nào</p>
                        @else
                            <div class="row">
                                @foreach($related_new as $item)
                                    <div class="col-lg-4">
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- About US End -->
    </main>    
@stop
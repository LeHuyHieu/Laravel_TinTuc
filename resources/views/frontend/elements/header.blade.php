@php
    $date= new DateTime();
    $dateString = $date->format('Y/F/D');
    $dateDay = date_format($date, 'd');
    $dateWeed = date_format($date, 'D');
    $dateMonth = date_format($date, 'F');
    $dateYear = date_format($date, 'Y');

    $apiKey = '147e4c7425d128433bc60e4acf2a568c';
    $city = 'Ho Chi Minh';

    $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q={$city}&units=metric&appid={$apiKey}";
    $response = file_get_contents($apiUrl);
    $weatherData = json_decode($response);
    if ($weatherData) {
        $temperatureCelsius = $weatherData->main->temp;
        $weatherDescription = $weatherData->weather[0]->description;
    }
@endphp
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-md-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li><img src="/frontend/template/assets/img/icon/header_icon1.png" alt="">{{round($temperatureCelsius,0)}}ºc, {{ucfirst($weatherDescription)}} </li>
                                    <li><img src="/frontend/template/assets/img/icon/header_icon1.png" alt="">{{$dateWeed}}, {{$dateDay}}th {{$dateMonth}}, {{$dateYear}}</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social d-inline-block mr-5">
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                                <ul class="navbar-nav header-social d-inline-block">
                                    @guest
                                        @if (Route::has('login'))
                                            <li><a href="{{ route('login') }}"><i class="fas fa-lock mr-1"></i> Đăng nhập</a></li>
                                        @endif
                                        @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}"><i class="fas fa-key mr-1"></i>Đăng ký</a></li>
                                        @endif
                                    @else
                                        <li>
                                            <a href="{{route('user.show', Auth::user()->id)}}">
                                                <i class="fas fa-user mr-1"></i>{{ Auth::user()->name }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt mr-1"></i>{{ __('Đăng xuất') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid d-none d-md-block">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="{{route('index')}}"><img src="/frontend/template/assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                                <img src="/frontend/template/assets/img/hero/header_card.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="{{route('index')}}"><img src="/frontend/template/assets/img/logo/logo.png" alt=""></a>
                            </div>
                            @php
                            use App\Models\Categories;
                            $categories = Categories::all();
                            $categories2 = Categories::all();
                            @endphp
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{route('index')}}">Trang chủ</a></li>
                                        @foreach($categories as $category)
                                            @if($category->parent_id == 0)
                                                <li>
                                                    <a href="{{route('category', $category->id)}}">{{$category->name}}</a>
                                                    <ul class="submenu">
                                                        @foreach($categories2 as $category2)
                                                            @if($category2->parent_id != 0)
                                                                @if($category2->parent_id == $category->id)
                                                                    <li><a class="px-4 py-2" href="{{route('category', $category2->id)}}">{{$category2->name}}</a></li>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                        @endforeach
                                        <li><a href="{{route('latest_news')}}">Tin mới nhất</a></li>
                                        <li><a href="javascript:void(0)">Pages</a>
                                            <ul class="submenu">
                                                <li><a href="/elements">Element</a></li>
                                                <li><a href="{{route('fe_blog')}}">Blog</a></li>
                                                <li><a href="{{route('contact')}}">Liên hệ</a></li>
                                                <li><a href="{{route('about')}}">Về chúng tôi</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <i class="fas fa-search special-tag"></i>
                                <div class="search-box">
                                    <form action="#">
                                        <input type="text" placeholder="Search">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

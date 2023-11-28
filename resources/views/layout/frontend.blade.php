<!doctype html>
<html class="no-js" lang="zxx">
  @include('frontend.elements.head')
  <body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="/frontend/template/assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    @include('frontend.elements.header')
        @yield('content')
    @include('frontend.elements.footer')
    @include('frontend.elements.js')
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
@include('backend.elements.head')
<body class="fix-header fix-sidebar card-no-border">
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<div id="main-wrapper">
    @include('backend.elements.header')
    @include('backend.elements.menu_left')
    <div class="page-wrapper">
        @yield('content')
        @include('backend.elements.footer')
    </div>
    @include('backend.elements.js')
    @show
</div>
</body>

</html>


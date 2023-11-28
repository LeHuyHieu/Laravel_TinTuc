@extends('layout.frontend')
@section('content')
    <main class="py-5">
        <div class="container">
            @foreach($user as $item)
                <form method="post" action="{{route('user.update', $item->id)}}" id="formEditAccount" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-header">
                                    <h5>Hồ sơ hình ảnh</h5>
                                </div>
                                <div class="card-body text-center">
                                    <img src="{{($item->avatar != '')?$item->avatar:'/frontend/template/assets/img/about/user.png'}}" alt="Image profile" id="img-avatar" width="30%">
                                    <p>JPG hoặc PNG không lớn hơn 5 MB</p>
                                    <input type="file" class="d-none" name="avatar" id="avatar" value="{{($item->avatar != '')?$item->avatar:''}}" accept="" onchange="document.getElementById('img-avatar').src = window.URL.createObjectURL(this.files[0])">
                                    <label class="genric-btn success circle arrow" for="avatar">Tải ảnh đại diện</label>
                                </div>
                                <div class="card-body text-center">
                                    <img src="{{($item->banner != '')?$item->banner:'/frontend/template/assets/img/banner/img.png'}}" alt="Image profile" id="img-banner" width="90%">
                                    <p>JPG hoặc PNG không lớn hơn 5 MB</p>
                                    <input type="file" class="d-none" name="banner" id="banner" value="{{($item->banner != '')?$item->banner:''}}" accept="" onchange="document.getElementById('img-banner').src = window.URL.createObjectURL(this.files[0])">
                                    <label class="genric-btn success circle arrow" for="banner">Tải Ảnh nền</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-header">
                                    <h5>Chi tiết tài khoản</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="form-group col-sm-6 pl-sm-0">
                                            <label for="name">Họ và tên</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="User name" value="{{$item->name}}">
                                        </div>
                                        <div class="form-group col-6 pr-sm-0">
                                            <label for="address">Địa chỉ</label>
                                            <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{$item->address}}">
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="form-group col-sm-6 pl-sm-0">
                                            <label for="phone">Số điện thoại</label>
                                            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone" value="{{$item->phone}}">
                                        </div>
                                        <div class="form-group col-6 pr-sm-0">
                                            <label for="email">Email</label>
                                            <input type="email" disabled name="email" id="email" class="form-control" placeholder="Email" value="{{$item->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="about">Về tôi</label>
                                        <textarea type="about" name="about" id="about" rows="5" class="form-control" placeholder="About">{{$item->about}}</textarea>
                                    </div>
                                    <div class="text-center"><button class="genric-btn success circle arrow">Lưu thông tin</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form method="post" action="{{route('user.re_password', $item->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-7 ml-auto">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-header"><h5>Đổi mật khẩu</h5></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="password">Mật khẩu hiện tại</label>
                                        <input type="text" id="password" name="password" class="form-control" placeholder="Mật khẩu hiện tại">
                                    </div>
                                    <div class="form-group">
                                        <label for="re-password">Mật khẩu muốn thay đổi</label>
                                        <input type="text" id="re-password" name="re_password" class="form-control" placeholder="Mật khẩu muốn thay đổi">
                                    </div>
                                    <div class="text-center"><button class="genric-btn success circle arrow">Đổi mật khẩu</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </main>
@stop
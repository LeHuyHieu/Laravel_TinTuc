@extends('layout.backend')

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
            <div class="col-md-7 col-4 align-self-center">
                {{--<a href="javascript:void(0)" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down">Download Now</a>--}}
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">

                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-block">
                            <center class="m-t-30" id="loadFormAvatar">
                                @foreach($user as $item)
                                <form method="post" action="{{route('be_profile.update_avt', $item->id)}}" enctype="multipart/form-data" id="uploadAvatar">
                                    @csrf
                                    @method('PUT')
                                    <label for="avatar" class="" style="cursor: pointer;">
                                        <img src="{{($item->avatar)?$item->avatar:'/frontend/template/assets/img/about/user.png'}}" id="img-avatar" class="img-circle" width="150" />
                                    </label>
                                    <input type="file" id="avatar" name="avatar" value="{{($item->avatar)?$item->avatar:''}}" class="d-none" onchange="document.getElementById('img-avatar').src = window.URL.createObjectURL(this.files[0])">
                                    <h4 class="card-title m-t-10">{{$item->name}}</h4>
                                    <h6 class="card-subtitle">Chức vụ: Admin</h6>
                                    <div class="row text-center justify-content-md-center">
                                        <button class="btn btn-success">Lưu ảnh</button>
                                    </div>
                                </form>
                                @endforeach
                            </center>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <div class="card-block" id="loadFormDetailContent">
                            @foreach($user as $item)
                            <form class="form-horizontal form-material" method="post" action="{{route('be_profile.update', $item->id)}}" id="updateContentProfile">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="float-right btn btn-success" id="editProfile">Sửa thông tin</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="name" disabled value="{{$item->name}}" placeholder="Nhập tên" class="form-control form-control-line remove-disabled">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Address</label>
                                    <div class="col-md-12">
                                        <input type="text" name="address" disabled value="{{$item->address}}" placeholder="Nhập địa chỉ" class="form-control form-control-line remove-disabled">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" name="email" disabled value="{{$item->email}}" placeholder="Nhập email" class="form-control form-control-line remove-disabled">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" name="password" disabled value="{{$item->password}}" placeholder="Password" class="form-control form-control-line remove-disabled">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone</label>
                                    <div class="col-md-12">
                                        <input type="text" name="phone" disabled value="{{$item->phone}}" placeholder="Nhập số điện thoại" class="form-control form-control-line remove-disabled">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Về tôi</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" name="about" disabled class="form-control form-control-line remove-disabled">{{$item->about}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button disabled type="submit" class="btn btn-success remove-disabled">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
@stop
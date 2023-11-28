@extends('layout.frontend')
@section('content')
    <main class="app__user py-5">
        <div class="container">
            <div class="section-tittle mb-30">
                <h3>User</h3>
            </div>
            <div class="main mb-5">
                @foreach($user as $item)
                    <div class="banner mb-4">
                        <img src="{{($item->banner)?$item->banner:'/frontend/template/assets/img/banner/img.png'}}" class="w-100" alt="">
                    </div>
                    <div class="profile">
                        <div class="row py-4 align-items-end">
                            <div class="col-md-4">
                                <div class="image__profile">
                                    <div class="img"><img src="{{($item->avatar)?$item->avatar:'/frontend/template/assets/img/about/user.png'}}" alt=""></div>
                                    <a href="{{route('user.edit', $item->id)}}" class="btn btn-outline-profile">Edit Profile</a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="desc__profile">
                                    <h3 class="name">{{$item->name}}</h3>
                                    <ul>
                                        <li><span>Address:</span> {{($item->address != '')?$item->address:'Không có thông tin'}}</li>
                                        <li><span>Email:</span> {{($item->email != '')?$item->email:'Không có thông tin'}}</li>
                                        <li><span>Phone:</span> {{($item->phone != '')?$item->phone:'Không có thông tin'}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="section-tittle mb-30">
                                <h2>About</h2>
                                <div class="about">
                                    <p>{{($item->about != '')?$item->about:'Không có thông tin'}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@stop

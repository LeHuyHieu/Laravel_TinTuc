@extends('layout.backend')
@section('content')
    <div class="container-fluid">
        @if(Session::has('success'))
            <div class="alert alert-success d-none"></div>
        @endif
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Table</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active">Contacts</li>
                </ol>
            </div>
            <div class="col-md-7 col-4 align-self-center">
                {{--<a href="{{route('categories.create')}}" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down"><i class="mdi mdi-plus mr-1"></i> Create category</a>--}}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title d-flex align-items-center">
                            <span class="d-inline-block">List Contacts</span>
                            <form method="get" action="{{route('contacts.search')}}" class="d-inline-flex align-items-center ml-auto">
                                <input class="form-control mr-2" name="key" value="{{isset($key)?$key:''}}" placeholder="Tìm kiếm liên hệ"/>
                                <button class="btn btn-primary"><i class="mdi mdi-search-web mr-1"></i> Tìm kiếm</button>
                            </form>
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="">#</th>
                                    <th class="col-3">Name</th>
                                    <th class="col-3">Email</th>
                                    <th class="col-3">Subject</th>
                                    <th class="col-2">Status</th>
                                    <th class="col-1">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->subject}}</td>
                                        <td>{{($contact->is_read == 1)?'Đã đọc':'Chưa đọc'}}</td>
                                        <td>
                                            <form action="{{route('contacts.destroy', $contact->id)}}" method="post">
                                                <a href="{{route('contacts.show', $contact->id)}}" class="btn btn-primary w-100 mb-3"><i class="mdi mdi-eye mr-1"></i> View</a>
                                                @csrf
                                                @method('DELETE')
                                                <button id="delete" type="submit" class="btn deleted btn-danger w-100"><i class="mdi mdi-delete-empty mr-1"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-right">
                                {{$contacts->appends($_GET)->links('backend.paginations.admin')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
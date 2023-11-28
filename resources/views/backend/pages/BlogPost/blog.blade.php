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
                    <li class="breadcrumb-item active">Blog</li>
                </ol>
            </div>
            <div class="col-md-7 col-4 align-self-center">
                <a href="{{route('blog.create')}}" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down"><i class="mdi mdi-plus mr-1"></i> Create blog</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title d-flex align-items-center">
                            <span class="d-inline-block">List Contacts</span>
                            <form method="get" action="{{route('blog.search')}}" class="d-inline-flex align-items-center ml-auto">
                                <select name="category_id" class="form-select mr-2">
                                    <option value="">Vui lòng chọn</option>
                                    @foreach($categories as $category)
                                        <option {{(isset($category_id) && $category_id == $category->id)?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <input class="form-control mr-2" name="title" value="{{(isset($title))?$title:''}}" placeholder="Tìm kiếm tin tức"/>
                                <button class="btn btn-primary"><i class="mdi mdi-search-web mr-1"></i> Tìm kiếm</button>
                            </form>
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="">#</th>
                                    <th class="col-3">Title</th>
                                    <th class="col-2">Show Hide</th>
                                    <th class="col-2">Category</th>
                                    <th class="col-2">Tag</th>
                                    <th class="col-2">Image</th>
                                    <th class="col-1">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blog as $item)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{($item->is_read == 1)?'Hiện':'Ẩn'}}</td>
                                        <td>
                                            @foreach($categories as $category)
                                                @if($category->id == $item->category_id)
                                                    {{$category->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{$item->tag}}</td>
                                        <td>
                                            <img src="{{$item->image}}" width="100px">
                                        </td>
                                        <td>
                                            <form action="{{route('blog.destroy', $item->id)}}" method="post">
                                                <a href="{{route('blog.edit', $item->id)}}" class="btn btn-primary mb-3 w-100"><i class="mdi mdi-lead-pencil mr-1"></i> Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button id="delete" type="submit" class="btn deleted btn-danger"><i class="mdi mdi-delete-empty mr-1"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-right">
                                {{$blog->appends($_GET)->links('backend.paginations.admin')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
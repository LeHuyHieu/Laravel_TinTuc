@extends('layout.backend')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Table</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('categories')}}">Categories</a></li>
                    <li class="breadcrumb-item active">Update Categories</li>
                </ol>
            </div>
            <div class="col-md-7 col-4 align-self-center">
                <a href="{{route('categories.create')}}" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down"><i class="mdi mdi-plus mr-1"></i> Create category</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title">
                            <h3>Thêm Category</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('categories.update', $category_item->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="d-flex align-items-center">
                                    <div class="form-group mr-2 w-50">
                                        <label for="name">Name</label>
                                        <input name="name" type="text" id="name" value="{{$category_item->name}}" class="form-control" placeholder="Nhập tên category" />
                                    </div>
                                    <div class="form-group ml-2 w-50">
                                        <label for="parent_id">Categories</label>
                                        <select name="parent_id" id="parent_id" class="form-select">
                                            <option value="0">Vui lòng chọn</option>
                                            @foreach($categories as $category)
                                                <option {{($category_item->parent_id === $category->id) ?'selected':''}} value="{{$category->id}}">{{($category->parent_id != 0) ? '-- '.$category->name : $category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center"><button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-all mr-1"></i> Cập nhật</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

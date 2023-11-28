@extends('layout.backend')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Table</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('youtube.index')}}">Youtube</a></li>
                    <li class="breadcrumb-item active">Create Youtube</li>
                </ol>
            </div>
            <div class="col-md-7 col-4 align-self-center">
                <a href="{{route('youtube.create')}}" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down"><i class="mdi mdi-plus mr-1"></i> Create Youtube</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title">
                            <h3>Create Youtube</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('youtube.store')}}">
                                @csrf
                                <div class="d-flex align-items-center">
                                    <div class="form-group mr-2 w-50">
                                        <label for="title">Title</label>
                                        <input name="title" type="text" id="title" class="form-control" placeholder="Nhập tiêu đề" />
                                    </div>
                                    <div class="form-group ml-2 w-50">
                                        <label for="category_id">Categories</label>
                                        <select name="category_id" id="category_id" class="form-select">
                                            <option value="0">Vui lòng chọn</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{($category->parent_id != 0) ? '-- '.$category->name : $category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="form-group mr-2 w-50">
                                        <label for="tag">Tag</label>
                                        <input name="tag" type="text" id="tag" class="form-control" placeholder="Nhập tag" />
                                    </div>
                                    <div class="form-group ml-2 w-50">
                                        <label for="link">Link</label>
                                        <input name="link" type="text" id="link" class="form-control" placeholder="Nhập link" />
                                    </div>
                                </div>
                                <div class="form-group position-relative">
                                    <div class="form-group mb-0 d-inline-block ml-2">
                                        <input name="type_new" id="is_often" value="0" checked class="form-check d-inline-block ml-2" type="radio" />
                                        <label for="is_often"><span>Tin thường</span></label>
                                    </div>
                                    <div class="form-group mb-0 ml-2 d-inline-block mr-2">
                                        <input name="type_new" value="1" id="is_hot" class="form-check d-inline-block ml-2" type="radio" />
                                        <label for="is_hot">
                                            <span>Tin nóng</span>
                                        </label>
                                    </div>
                                    <div class="form-group mb-0 d-inline-block ml-2">
                                        <input name="type_new" id="is_paid" value="2" class="form-check d-inline-block ml-2" type="radio" />
                                        <label for="is_paid"><span>Tin được tài trợ</span></label>
                                    </div>
                                    <div class="form-group mb-0 d-inline-block ml-2">
                                        <input name="type_new" id="is_interest" value="3" class="form-check d-inline-block ml-2" type="radio" />
                                        <label for="is_interest"><span>Tin quan tâm nhiều</span></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô tả</label>
                                    <textarea name="description" id="description" rows="3" placeholder="Mô tả" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content">Nội dung</label>
                                    <textarea name="content" id="content" rows="6" placeholder="Nội dung" class="form-control"></textarea>
                                </div>
                                <div class="text-center"><button type="submit" class="btn btn-primary"><i class="mdi mdi-plus mr-1"></i> Thêm mới</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
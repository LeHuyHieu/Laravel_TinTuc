@extends('layout.backend')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Table</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('blog.index')}}">Blog</a></li>
                    <li class="breadcrumb-item active">Edit Blog</li>
                </ol>
            </div>
            <div class="col-md-7 col-4 align-self-center">
                <a href="{{route('blog.create')}}" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down"><i class="mdi mdi-plus mr-1"></i> Create Blog</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title">
                            <h3>Đăng bài Post</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('blog.update', $blog->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="d-flex align-items-center">
                                    <div class="form-group mr-2 w-50">
                                        <label for="title">Tiêu đề</label>
                                        <input name="title" type="text" value="{{$blog->title}}" id="title" class="form-control" placeholder="Nhập tiêu đề" />
                                    </div>
                                    <div class="form-group ml-2 w-50">
                                        <label for="parent_id">Categories</label>
                                        <select name="category_id" id="category_id" class="form-select">
                                            <option value="">Vui lòng chọn</option>
                                            @foreach($categories as $category)
                                                <option {{($blog->category_id == $category->id)?'selected':''}} value="{{$category->id}}">{{($category->parent_id != 0) ? '-- '.$category->name : $category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end">
                                    <div class="form-group mr-2 w-50">
                                        <div class="form-group mb-0 mr-3 d-inline-block">
                                            <label for="image_banner">Image Banner</label>
                                            <input name="image_banner" accept="image/*" value="{{$blog->image_banner}}" type="file" id="image_banner" class="form-control-file" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])" />
                                        </div>
                                        <img id="blah2" class="d-inline-block" src="{{$blog->image_banner}}" alt="your image" style="max-width: 100px;" />
                                    </div>
                                    <div class="form-group ms-2 w-50">
                                        <label for="tag">Tag</label>
                                        <input type="text" name="tag" class="form-control" value="{{$blog->tag}}" placeholder="Vui lòng nhập thẻ" />
                                    </div>
                                </div>
                                <div class="d-flex align-items-end">
                                    <div class="form-group mr-2 w-50">
                                        <div class="form-group mb-0 mr-3 d-inline-block">
                                            <label for="image">Image</label>
                                            <input name="image" accept="image/*" value="{{$blog->image}}" type="file" id="image" class="form-control-file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" />
                                        </div>
                                        <img id="blah" class="d-inline-block" src="{{$blog->image}}" alt="your image" style="max-width: 100px;" />
                                    </div>
                                    <div class="form-group ml-2 w-50 position-relative">
                                        <div class="form-group mb-0 ml-2 d-inline-block mr-2">
                                            <div class="d-flex align-items-center">
                                                <div class="d-inline-block">
                                                    <input type="checkbox" name="is_read" value="1" {{($blog->is_read == 1)?'checked':''}} id="is_read" />
                                                    <label for="is_read" class="mb-0"><span class="d-inline-block ml-3">Ẩn hiện</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô tả</label>
                                    <textarea name="description" id="description" rows="3" placeholder="Mô tả" class="form-control">{{$blog->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="main_content">Nội dung chính</label>
                                    <textarea name="main_content" id="main_content" rows="3" placeholder="Nội dung chính" class="form-control">{{$blog->main_content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content">Nội dung</label>
                                    <textarea name="content" id="content" rows="6" placeholder="Nội dung" class="form-control">{{$blog->content}}</textarea>
                                </div>
                                <div class="text-center"><button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-all mr-1"></i> Lưu</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
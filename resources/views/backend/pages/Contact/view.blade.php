@extends('layout.backend')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Table</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('contacts.index')}}">Contacts</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
            <div class="col-md-7 col-4 align-self-center">
                <form method="post" action="{{route('contacts.update', $contacts->id)}}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="is_read" value="1">
                    <button type="submit" class="btn waves-effect waves-light btn-primary pull-right hidden-sm-down"><i class="mdi mdi-eye mr-1"></i> Đã đọc</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h2>{{$contacts->subject}}</h2>
                <h5>Tôi tên: {{$contacts->name}}</h5>
                <h5>Email: {{$contacts->email}}</h5>
            </div>
            <div class="card-body px-4 py-3">
                <p>{{$contacts->message}}</p>
            </div>
            <div class="card-footer">
                <p>Ngày gửi: {{formatDate($contacts->created_at, 'd / m / Y')}}</p>
            </div>
        </div>
    </div>
@stop
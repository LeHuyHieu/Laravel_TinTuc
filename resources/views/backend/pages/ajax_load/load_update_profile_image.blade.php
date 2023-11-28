@if(is_object($user) || is_array($user))
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
@endif

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
            <label class="col-md-12">Phone No</label>
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
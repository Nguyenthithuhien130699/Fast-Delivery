@extends('layouts.admin')
@section('js')
<!-- <script>
        function changeRole() {
            var role = $('#role').val();
            var url_default = '{{route("register")}}';
            if (role){
                url = url_default+'?role='+role;
            }else {
                url = url_default;
            }
            window.location.href = url;
        }
    </script> -->
@endsection
@section('content')
<div class="section-body">
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-4">
            <div class="card author-box">
                <div class="card-body">
                    <div class="author-box-center">
                        <img alt="image" src="{{asset('images')}}/{{$info['avatar']}}" class="rounded-circle author-box-picture">
                        <div class="clearfix"></div>
                        <div class="author-box-name">
                            <a href="#">{{$info['name']}}</a>
                        </div>
                        <div class="author-box-job">
                            @if($info['role'] == 'admin')
                            Admin
                            @elseif($info['role'] == 'staff')
                            Shipper
                            @elseif($info['role'] == 'customer')
                            Người nhận hàng
                            @elseif($info['role'] == 'seller')
                            Người bán hàng
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Info</h4>
                </div>
                <div class="card-body">
                    <div class="py-4">
                        <p class="clearfix">
                            <span class="float-left">
                                Ngày sinh
                            </span>
                            <span class="float-right text-muted">
                                {{$info['birthday']}}
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                Điện thoại
                            </span>
                            <span class="float-right text-muted">
                                {{$info['phone']}}
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                Mail
                            </span>
                            <span class="float-right text-muted">
                                {{$info['email']}}
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                Giới tính
                            </span>
                            <span class="float-right text-muted">
                                <a href="#">
                                    @if($info['gender'] == 'male')
                                    Nam
                                    @elseif($info['gender'] == 'female')
                                    Nữ
                                    @else
                                    Khác
                                    @endif
                                </a>
                            </span>
                        </p>
                        @if(auth()->user()->role == 'staff')
                        <p class="clearfix">
                            <span class="float-left">
                                Đơn vị vận chuyển
                            </span>
                            <span class="float-right text-danger">
                                <a href="#">
                                    {{isset($info->transport->name) ? $info->transport->name : ''}}
                                </a>
                            </span>
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Ghi chú</h4>
                </div>
                <div class="card-body">
                    <p>
                        {{$info['description']}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-8">
            <div class="card">
                <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab" aria-selected="true">Đổi thông tin cá nhân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#passwords" role="tab" aria-selected="false">Đổi mật khẩu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#avatars" role="tab" aria-selected="false">Đổi Avatar</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                        <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                            <form method="post" class="needs-validation" action="{{route('admin.user.postUpdate',$info['id'])}}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Tên</label>
                                            <input type="text" class="form-control" value="{{$info['name']}}" name="name" required>
                                            <div class="invalid-feedback">
                                                Vui lòng điền đầy đủ tên
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Điện thoại</label>
                                            <input type="number" class="form-control" value="{{$info['phone']}}" name="phone" maxlength="10" minlength="10">
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="{{$info['email']}}" name="email" required>
                                            <div class="invalid-feedback">
                                                Vui lòng điền đầy đủ Email
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Ngày sinh</label>
                                            <input type="date" class="form-control" value="{{$info['birthday']}}" name="birthday">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Giới tính</label>
                                            <select class="form-control" name="gender">
                                                <option value="male" {{$info['gender'] == 'male' ? 'selected' : ''}}>Nam</option>
                                                <option value="female" {{$info['gender'] == 'female' ? 'selected' : ''}}>Nữ</option>
                                                <option value="other" {{$info['gender'] == 'other' ? 'selected' : ''}}>Khác</option>
                                            </select>
                                        </div>
                                    </div>
                                    @if(Auth::user()->role =='admin')
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Quyền</label>
                                            <select class="form-control" name="role" id="role" disabled>
                                                <option value="admin" {{$info['role'] == 'admin' ? 'selected' : ''}}>Admin</option>
                                                <option value="staff" {{$info['role'] == 'staff' ? 'selected' : ''}}>Shipper</option>
                                                <option value="customer" {{$info['role'] == 'customer' ? 'selected' : ''}}>Người nhận hàng</option>
                                                <option value="seller" {{$info['role'] == 'seller' ? 'selected' : ''}}>Người bán hàng</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Trạng thái</label>
                                            <select class="form-control" name="status">
                                                <option value="disable" {{$info['status'] == 'disable' ? 'selected' : ''}}>Vô hiệu hóa</option>
                                                <option value="enable" {{$info['status'] == 'enable' ? 'selected' : ''}}>Hoạt động</option>
                                            </select>
                                        </div>
                                        @if($info['role'] == 'staff')
                                        <div class="form-group col-md-12">
                                            <label>Đơn vị vận chuyển</label>
                                            <select class="form-control" name="transport_id">
                                                @foreach($transports as $item)
                                                <option value="{{$item->id}}" @if($item->id == $info['transport_id']) selected @endif>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                    </div>
                                    @endif
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Ghi chú</label>
                                            <textarea class="form-control summernote-simple" name="description">{{$info['description']}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Địa chỉ</label>
                                            <textarea class="form-control summernote-simple" name="address">{{$info['address']}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">

                                    @if(Auth::user()->role == 'admin')
                                    <button class="btn btn-primary">Cập nhật</button>
                                    @elseif(Auth::user()->role == 'staff' && Auth::user()->id == $info['id'] )
                                    <button class="btn btn-primary">Cập nhật</button>
                                    @else
                                    <button class="btn btn-primary" disabled>Bạn không có quyền Cập nhật</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="passwords" role="tabpanel" aria-labelledby="profile-tab2">
                            <form method="post" class="needs-validation" action="{{route('admin.user.updatePassword',$info['id'])}}">
                                @csrf

                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Mật khẩu</label>
                                            <input type="password" class="form-control" name="password">
                                            <div class="invalid-feedback">
                                                Vui lòng điền đầy đủ mật khẩu
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Xác thực mật khẩu</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    @if(Auth::user()->role == 'admin')
                                    <button class="btn btn-primary">Cập nhật mật khẩu</button>
                                    @elseif(Auth::user()->role == 'staff' && Auth::user()->id == $info['id'] )
                                    <button class="btn btn-primary">Cập nhật mật khẩu</button>
                                    @else
                                    <button class="btn btn-primary" disabled>Bạn không có quyền Cập nhật mật khẩu</button>
                                    @endif

                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="avatars" role="tabpanel" aria-labelledby="profile-tab3">
                            <form method="post" class="needs-validation" enctype="multipart/form-data" action="">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Avatar</label>
                                            <input type="file" class="form-control" name="avatar">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
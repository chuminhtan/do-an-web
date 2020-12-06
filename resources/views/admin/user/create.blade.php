<!-- Khai báo sử dụng layout admin -->
@extends('admin.layout.index')

<!-- Khai báo định nghĩa phần main-container trong layout admin-->
@section('main-container')
<!-- Page Heading -->
<div class="mb-3">
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tạo Người Dùng</h1>
    <a href="{{ URL::previous() }}" class="btn btn-warning" style="color:white">Quay lại</a>
</div>
<!-- Page Body -->
<div class="card">
    <div class="card-body">
        <!-- Content Row -->
        <div class="row mb-4">
            <form class="col-md-12" action="{{ asset('admin/user/create') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <h5 class="mb-3">Thông tin chung</h5>
                <div class="form-row mb-3">
                    <!-- tên -->
                    <div class="col-md-3 mb-4">
                        <label for="user_name">Tên</label>
                        <input type="text" name="user_name" class="form-control" id="user_name" placeholder="Nhập tên"
                            minlength="5" required/>
                    </div>
                    <!-- điện thoại -->
                    <div class="col-md-3 mb-4">
                        <label for="user_phone">Điện thoại</label>
                        <input type="number" name="user_phone" class="form-control" id="user_phone"
                            placeholder="Nhập điện thoại" required/>
                    </div>
                    <!-- loại người dùng -->
                    <div class="col-md-3 mb-4">
                        <label for="user_permission">Quyền người dùng</label>
                        <select class="form-control" name="user_permission" id="user_permission">
                            <option value="1">Nhân viên</option>
                            <option value="2">Quản trị</option>
                        </select>
                    </div>
                </div>
                <!-- thông tin tài khoản -->
                <h5 class="mb-3">Thông tin tài khoản</h5>
                <div class="form-row">
                    <!-- email -->
                    <div class="col-md-3 mb-3">
                        <label for="user_email">Email</label>
                        <input type="email" name="user_email" class="form-control" id="user_email"
                            placeholder="Nhập email" required/>
                    </div>
                    <!-- mật khẩu -->
                    <div class="col-md-3 mb-3">
                        <label for="user_password">Mật khẩu<span class="text-danger">*</span></label>
                        <input type="password" name="user_password" class="form-control" id="user_password"
                            placeholder="Nhập mật khẩu" required/>
                    </div>
                    <!-- ảnh -->
                    <div class="col-md-3 mb-4 ml-4">
                        <label for="user_image">Ảnh đại diện</label>
                        <input type="file" name="user_image" accept="image/*" id="user_image">
                        <img id="output" src="{{ asset('images/default.png')}}" width="100" />
                    </div>
                </div>
                <!-- submit -->
                <div class="form-row d-flex justify-content-center">
                    <button class="btn btn-success " type="submit">Lưu</button>
                </div>
                <!-- errors -->
                <div class="form-row">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        {{$error}}<br>
                        @endforeach
                    </div>
                    @endif
                </div>
            </form>
        </div>
        <!-- end card body -->
    </div>
    <!-- kết thúc main-container -->
    @endsection @section('script')
    <script>
        // Kiểm tra biến errors từ server gửi về. Nếu có lỗi xuất popup thông báo
        @if (count($errors) > 0)
        Swal.fire({
            title: 'Thất Bại',
            text: 'Vui lòng kiểm tra lại thông tin',
            icon: 'error',
            confirmButtonText: 'OK'
        })
        @endif

        // Kiểm tra biến result từ server gửi về. 
        @if (isset($result))
            Swal.fire({
                icon: 'success',
                title: 'Tạo Người Dùng Thành Công',
                showConfirmButton: false,
                timer: 1500
            }).then((result) => {
                location.assign('{{ url('admin/user/list') }}')
            })
        @endif

        // Hiển thị ảnh upload
        let image_input_DOM = document.querySelector("#user_image");
        image_input_DOM.addEventListener("input", () => {
            let reader = new FileReader();
            let output = document.querySelector("#output");

            reader.onload = (e) => {
                console.log(e.target);
                console.log(output);
                output.src = e.target.result;
            };

            reader.readAsDataURL(image_input_DOM.files[0]);
        });
    </script>
    @endsection
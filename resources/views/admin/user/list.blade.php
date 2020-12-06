<!-- Khai báo sử dụng layout admin -->
@extends('admin.layout.index')

<!-- Khai báo định nghĩa phần main-container trong layout admin-->
@section('main-container')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Người Dùng</h1>
</div>

<!-- Page Body -->
<div class="card">
    <div class="card-body">

        <!-- Content Row -->
        <div class="row mb-4">
            <div class="col-md-2">
                <a href="{{ url('admin/user/create') }}" class="btn btn-success">Tạo Mới</a>
            </div>
        </div>

        <h4>Danh Sách</h4>
        <!-- Content Row -->
        <div class="row">
            <!-- Table -->
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã</th>
                            <th>Ảnh</th>
                            <th>Họ Tên</th>
                            <th>Điện Thoại</th>
                            <th>Email</th>
                            <th>Quyền</th>
                            <th>Đăng Nhập Gần Nhất</th>
                            <th>Thời gian tạo</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $number = 1
                        @endphp

                        @if ( isset($userList) )
                        @foreach($userList as $user)
                        <tr>
                            <td>{{ $number }}</td>
                            <td>{{ $user->ma_nguoi_dung }}</td>
                            <td>
                                <image src="{{ asset("upload/user/$user->anh_dai_dien") }}" alt="img" width="80">
                            </td>
                            <td>{{ $user->ten }}</td>
                            <td>{{ $user->dien_thoai }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->loai_nguoi_dung == 1)
                                Nhân viên
                                @elseif ($user->loai_nguoi_dung == 2)
                                Quản lý
                                @endif
                            </td>
                            <td>{{ $user->dang_nhap_gan_nhat }}</td>
                            <td>{{ $user->thoi_gian_tao }}</td>
                            <td>
                                <a href="{{ url("admin/user/edit/$user->ma_nguoi_dung") }}" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ url("admin/user/delete/$user->ma_nguoi_dung ") }}" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @php
                        $number++
                        @endphp
                        @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $userList->links() }}
            </div>
        </div>
    </div>
</div>
<!-- kết thúc main-container -->
@endsection
<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{

    /**
     * Danh sách
     * method: get
     */
    public function viewList()
    {
        $userList = DB::table('nguoi_dung')->paginate(5);
        return view('admin.user.list', ['userList' => $userList]);
    }

    /**
     * view Tạo
     * method: get
     */
    public function viewCreate()
    {
        return view('admin.user.create');
    }

    /**
     * Tạo
     * method: post
     */
    public function create(Request $request)
    {
        // kiểm tra dữ liệu đầu vào
        $this->validate($request, [
            'user_name' => 'required',
            'user_phone' => 'required',
            'user_image' => 'required',
            'user_email' => 'required',
            'user_password' => 'required',
        ], [
            'required' => ':attribute không để trống'
        ], [
            'user_name' => 'Tên',
            'user_phone' => 'Điện thoại',
            'user_image' => 'Ảnh đại diện',
            'user_email' => 'Email',
            'user_password' => 'Mật khẩu',
        ]);

        try {
            $userImageComplete = "";
            // Lưu ảnh vô thư mục public/images

            if ($request->hasFile('user_image')) {
                $imageFile = $request->user_image;

                // Đổi tên file trước khi lưu, tránh trùng file sau này
                $fileName = $imageFile->getClientOriginalName(); // lấy tên file 
                $fileExtension = $imageFile->getClientOriginalExtension(); // lấy đuôi mở rộng như jpg hoặc png
                $userImageComplete = 'user-' . str_replace(' ', '_', $fileName) . '-' . rand() . '_' . time() . '.' . $fileExtension; // ghép tên + random + đuôi mở rộng
                $request->file('user_image')->move('upload/user', $userImageComplete);
            }

            // Lưu vào DB
            DB::table('nguoi_dung')->insert([
                'ten' => $request->user_name,
                'dien_thoai' => $request->user_phone,
                'email' => $request->user_email,
                'mat_khau' => bcrypt($request->user_password),
                'loai_nguoi_dung' => $request->user_permission,
                'anh_dai_dien' => $userImageComplete
            ]);
        } catch (Exception $ex) {
            return view('admin.user.create')->withErrors($ex->getMessage());
        }

        return view('admin.user.create', ['result' => 'success']);
    }
}

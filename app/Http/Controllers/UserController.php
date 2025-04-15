<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\UploadFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles', 'uploadFile')->paginate(5);

        return view('admin.users.index')->with([
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        $roles = Role::get();

        return view('admin.users.create')->with([
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {


        $req->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string:max:50',
            'email' => 'required|string:max:255',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|numeric|min:0',
            'address' => 'nullable|string',
            'role_id' => 'in:1,2,3',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'in:active,inactive',
        ]);

        $imageId = null;
        if ($req->hasFile('avatar')) {
            $file = $req->file('avatar');
            $fileName = $file->getClientOriginalName(); // Lấy tên file gốc
            $filePath = $file->store('images', 'public'); // Lưu vào storage/app/public/images
            $fileType = $file->getClientMimeType(); // Lấy loại file (e.g., image/jpeg)

            // Lưu thông tin file vào bảng upload_files
            $uploadFile = UploadFile::create([
                'file_name' => $fileName,
                'file_path' => $filePath,
                'file_type' => $fileType,
                'uploaded_by' => Auth::id(), // ID của user đang đăng nhập (nếu có)
            ]);

            $imageId = $uploadFile->id; // Lấy ID của bản ghi vừa tạo
        }

        User::create([
            'name' => $req->name,
            'username' => $req->username,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'phone' => $req->phone,
            'address' => $req->address,
            'role_id' => $req->role_id,
            'avatar' => $imageId,
            'status' => $req->status,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Thêm mới tài khoản thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function detail(string $id)
    {
        $user = User::find($id);

        return view('admin.users.detail')->with([
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::get();

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string:max:50',
            'email' => 'required|string:max:255',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|numeric|min:0',
            'address' => 'nullable|string',
            'role_id' => 'in:1,2,3',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'in:active,inactive',
        ]);

        $user = User::find($req->id);

        if (!Hash::check($req->password, $user->password)) {
            return redirect()->route('admin.users.edit', $req->id)->with('error', 'Mật khẩu không đúng.');
        }

        $imageId = null;
        if ($req->hasFile('avatar')) {

            // Xóa file cũ
            if ($user->uploadFile) {
                $file = UploadFile::find($user->avatar);
                if ($file) {
                    Storage::disk('public')->delete($file->file_path);
                }

                UploadFile::withTrashed()
                    ->where('id', $user->avatar)
                    ->forceDelete();
            }

            $file = $req->file('avatar');
            $fileName = $file->getClientOriginalName(); // Lấy tên file gốc
            $filePath = $file->store('images', 'public'); // Lưu vào storage/app/public/images
            $fileType = $file->getClientMimeType(); // Lấy loại file (e.g., image/jpeg)

            // Lưu thông tin file vào bảng upload_files
            $uploadFile = UploadFile::create([
                'file_name' => $fileName,
                'file_path' => $filePath,
                'file_type' => $fileType,
                'uploaded_by' => Auth::id(), // ID của user đang đăng nhập (nếu có)
            ]);

            $imageId = $uploadFile->id; // Lấy ID của bản ghi vừa tạo
        } else {
            $imageId = $user->avatar;
        }

        User::where('id', '=', $req->id)->update([
            'name' => $req->name,
            'username' => $req->username,
            'email' => $req->email,
            'phone' => $req->phone,
            'address' => $req->address,
            'role_id' => $req->role_id,
            'avatar' => $imageId,
            'status' => $req->status,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Update tài khoản thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $req)
    {
        $user = User::findOrFail($req->id);

        if ($user->id == Auth::id()) {
            return redirect()->route('admin.users.index')->with('error', 'Không thể xóa tài khoản đang đăng nhập.');
        }

        if ($user->role_id == 1) {
            return redirect()->route('admin.users.index')->with('error', 'Không thể xóa tài khoản có role là admin.');
        }

        if ($user->avatar) {
            $file = UploadFile::find($user->avatar);
            if ($file) {
                Storage::disk('public')->delete($file->file_path);
            }

            UploadFile::withTrashed()
                ->where('id', $user->avatar)
                ->forceDelete();
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Xóa sản phẩm thành công.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::with(['uploadFile'])->paginate(5);
        return view('admin.brands.index')->with([
            'brands' => $brands
        ]);
    }

    public function create(){
        return view('admin.brands.create');
    }

    public function store(Request $req){
        // Xác thực dữ liệu
        $req->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageId = null;
        if ($req->hasFile('logo')) {
            $file = $req->file('logo');
            $fileName = $file->getClientOriginalName(); // Lấy tên file gốc
            $filePath = $file->store('images', 'public'); // Lưu vào storage/app/public/images
            $fileType = $file->getClientMimeType(); // Lấy loại file (e.g., image/jpeg)

            // Lưu thông tin file vào bảng upload_files
            $uploadFile = UploadFile::create([
                'file_name' => $fileName,
                'file_path' => $filePath,
                'file_type' => $fileType,
                'uploaded_by' => Auth::id(),
            ]);

            $imageId = $uploadFile->id;
        }

        Brand::create([
            'name' => $req->name,
            'description' => $req->description,
            'logo' => $imageId,
        ]);

        return redirect()->route('admin.brands.index')->with('success', 'Thêm thương hiệu thành công');
    }

    public function destroy(Request $req){
        $products = Product::where('brand_id', $req->id)->get();
        if ($products->count() > 0) {
            return redirect()->route('admin.brands.index')->with('error', 'Không thể xóa thương hiệu này vì có sản phẩm thuộc thương hiệu này.');
        }
        
        $brand = Brand::find($req->id);

        if ($brand->logo) {
            $brand->uploadFile()->delete();
        }

        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Xóa thương hiệu thành công.');
    }

    public function detail(Request $req)
    {
        $brands = Brand::find($req->id);

        return view('admin.brands.detail')->with([
            'brands' => $brands
        ]);
    }

    public function edit(Request $req)
    {
        $brands = Brand::where('id', '=', $req->id)->first();

        return view('admin.brands.edit')->with([
            'brands' => $brands
        ]);
    }
    public function update(Request $req){
        // Xác thực dữ liệu
        $req->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $brand = Brand::find($req->id);

        $imageId = null;
        if ($req->hasFile('logo')) {

            // Xóa file cũ
            if ($brand->uploadFile) {
                File::delete(storage_path('app/public/' . $brand->uploadFile->file_path));
                $oldFile = UploadFile::find($brand->logo);
                $oldFile->delete();
            }

            $file = $req->file('logo');
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
            $imageId = $brand->logo;
        }

        Brand::where('id', '=', $req->id)->update([
            'name' => $req->name,
            'description' => $req->description,
            'logo' => $imageId,
        ]);

        return redirect()->route('admin.brands.index')->with('success', 'Update thương hiệu thành công');
    }
}

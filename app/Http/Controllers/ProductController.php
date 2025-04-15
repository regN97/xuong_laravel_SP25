<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'brand'])->paginate(5);

        return view('admin.products.index')->with([
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.products.create')->with([
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function store(Request $req)
    {
        // Xác thực dữ liệu
        $req->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0|max:100',
            'stock' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'in:active,inactive',
        ]);

        $imageId = null;
        if ($req->hasFile('image')) {
            $file = $req->file('image');
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

        // Tạo slug từ tên sản phẩm
        $slug = Str::slug($req->name, '-');

        // Lưu sản phẩm vào bảng products
        Product::create([
            'name' => $req->name,
            'slug' => $slug,
            'description' => $req->description,
            'category_id' => $req->category_id,
            'brand_id' => $req->brand_id,
            'price' => $req->price,
            'discount' => $req->discount ?? 0,
            'stock' => $req->stock,
            'image' => $imageId, // Gán ID từ upload_files
            'status' => $req->status ?? 'active',
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Thêm mới sản phẩm thành công.');
    }

    public function destroy(Request $req)
    {
        $product = Product::find($req->id);
        
        if ($product->image) {
            $product->uploadFile()->delete();
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Xóa sản phẩm thành công.');
    }

    public function detail(Request $req)
    {
        $product = Product::find($req->id);

        return view('admin.products.detail')->with([
            'products' => $product
        ]);
    }

    public function edit(Request $req)
    {
        $product = Product::find($req->id);
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.products.edit')->with([
            'products' => $product,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function update(Request $req)
    {

        // Xác thực dữ liệu
        $req->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0|max:100',
            'stock' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'in:active,inactive',
        ]);

        $product = Product::find($req->id);

        $imageId = null;
        if ($req->hasFile('image')) {

            // Xóa file cũ
            if ($product->uploadFile) {
                File::delete(storage_path('app/public/' . $product->uploadFile->file_path));
                $oldFile = UploadFile::find($product->image);
                $oldFile->delete();
            }

            $file = $req->file('image');
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
            $imageId = $product->image;
        }

        // Tạo slug từ tên sản phẩm
        $slug = Str::slug($req->name, '-');

        if (Product::where('slug', $slug)->exists()) {
            Product::where('id', '=', $req->id)->update([
                'name' => $req->name,
                'description' => $req->description,
                'category_id' => $req->category_id,
                'brand_id' => $req->brand_id,
                'price' => $req->price,
                'discount' => $req->discount ?? 0,
                'stock' => $req->stock,
                'image' => $imageId, // Gán ID từ upload_files
                'status' => $req->status ?? 'active',
            ]);
        } else {
            // Lưu sản phẩm vào bảng products
            Product::where('id', '=', $req->id)->update([
                'name' => $req->name,
                'slug' => $slug,
                'description' => $req->description,
                'category_id' => $req->category_id,
                'brand_id' => $req->brand_id,
                'price' => $req->price,
                'discount' => $req->discount ?? 0,
                'stock' => $req->stock,
                'image' => $imageId, // Gán ID từ upload_files
                'status' => $req->status ?? 'active',
            ]);
        }

        return redirect()->route('admin.products.index')->with('success', 'Update sản phẩm thành công.');
    }

    public function trashed()
    {
        $products = Product::onlyTrashed()->get();

        return view('admin.products.trash')->with([
            'products' => $products
        ]);
    }

    public function restore(Request $req)
    {
        $product = Product::withTrashed()->findOrFail($req->id);

        if ($product->image) {
            UploadFile::withTrashed()
            ->where('id', $product->image)
            ->restore();
        }

        $product->restore();

        return redirect()->route('admin.products.trashed')->with('success', 'Khôi phục sản phẩm thành công.');
    }

    public function forceDelete(Request $req)
    {
        $product = Product::withTrashed()->findOrFail($req->id);

        if ($product->image) {
            UploadFile::withTrashed()
            ->where('id', $product->image)
            ->forceDelete();
        }

        $product->forceDelete();

        return redirect()->route('admin.products.trashed')->with('success', 'Xóa vĩnh viễn sản phẩm thành công.');
    }
}
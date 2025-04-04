<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(5);
        return view('admin.categories.index')->with('categories', $categories);
    }

    public function create(){
        $categories = Category::all();
        return view('admin.categories.create')->with('categories', $categories);
    }

    public function store(Request $req){
        
        $req->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
        ]);

        Category::create([
            'name' => $req->name,
            'description' => $req->description ?? null,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Thêm mới danh mục thành công.');
    }

    public function edit(Request $req){
        $category = Category::find($req->id);
        $categories = Category::all();
        return view('admin.categories.edit')->with([
            'category' => $category,
            'categories' => $categories
        ]);
    }

    public function update(Request $req){
        $req->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
        ]);

        Category::where('id', $req->id)->update([
            'name' => $req->name,
            'description' => $req->description ?? null,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật danh mục thành công.');
    }

    public function destroy(Request $req){
        $products = Product::where('category_id', $req->id)->get();
        if($products->count() > 0){
            return redirect()->route('admin.categories.index')->with('error', 'Không thể xóa danh mục này vì có sản phẩm thuộc danh mục này.');
        }

        $category = Category::find($req->id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Xóa danh mục thành công.');
    }

    public function detail(Request $req){
        $category = Category::find($req->id);
        return view('admin.categories.detail')->with('category', $category);
    }
}

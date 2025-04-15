<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category', 'brand', 'uploadFile')->get();
        $categories = Category::get();
        $listCategory = ['Vegetable', 'Fruit', 'Snack', 'Bakery'];

        return view('client.layouts.products.index')->with([
            'products' => $products,
            'categories' => $categories,
            'listCategory' => $listCategory,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        $productsRelate = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id) // Loại trừ sản phẩm hiện tại
            ->get();

        if (!$product) {
            return redirect()->route('home')->with('error', 'Product not found');
        }

        return view('client.layouts.products.show')->with([
            'product' => $product,
            'productsRelate' => $productsRelate
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

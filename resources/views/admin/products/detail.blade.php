@extends('admin.layouts.main')

@section('content')
    <div class="container py-4">
        <h1>Detail Product</h1>

        <div class="table-responsive mt-2">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Trường dữ liệu</th>
                        <th scope="col">Dữ liệu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row">NAME</td>
                        <td>
                            {{$products->name}}
                        </td>
                    </tr>
                    <tr class="">
                        <td scope="row">SLUG</td>
                        <td>
                            {{$products->slug}}
                        </td>
                    </tr>
                    <tr class="">
                        <td scope="row">DESCRIPTION</td>
                        <td>
                            {{Str::limit($products->description, 50)}}
                        </td>
                    </tr>
                    <tr class="">
                        <td scope="row">CATEGORY</td>
                        <td>
                            {{$products->category->name}}
                        </td>
                    </tr>
                    <tr class="">
                        <td scope="row">BRAND</td>
                        <td>
                            {{$products->brand->name}}
                        </td>
                    </tr>
                    <tr class="">
                        <td scope="row">PRICE</td>
                        <td>
                            {{$products->price}}
                        </td>
                    </tr>
                    <tr class="">
                        <td scope="row">DISCOUNT</td>
                        <td>
                            {{$products->discount}}
                        </td>
                    </tr>
                    <tr class="">
                        <td scope="row">STOCK</td>
                        <td>
                            {{$products->stock}}
                        </td>
                    </tr>
                    <tr class="">
                        <td scope="row">IMAGE</td>
                        <td>
                                @if ($products->uploadFile)
                                    <img src="{{ asset('storage/' . $products->uploadFile->file_path) }}"
                                        alt="{{ $products->name }}" style="max-width: 50px;">
                                @else
                                    Không có ảnh
                                @endif
                            </td>
                    </tr>
                    <tr class="">
                        <td scope="row">STATUS</td>
                        <td>
                            {{$products->status}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="{{ route('admin.products.index') }}" class="btn btn-danger my-2 w-25">Back</a>
    </div>
@endsection

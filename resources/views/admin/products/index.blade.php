@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>All Products</h5>
                            <!-- Thông báo thành công (nếu có) -->
                            @if (session('success'))
                                <p class="text-success">
                                    {{ session('success') }}
                                </p>
                            @endif

                            @if (session('error'))
                                <p class="text-danger">
                                    {{ session('error') }}
                                </p>
                            @endif
                            <form class="d-inline-flex">
                                <a href="{{ route('admin.products.create') }}"
                                    class="align-items-center btn btn-theme d-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>Thêm mới
                                </a>
                            </form>
                        </div>

                        <div class="table-responsive">
                            <table class="table theme-table">
                                <thead>
                                    <tr>
                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 187.188px;">Name</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 187.188px;">Category</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 187.188px;">Brand</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 250.913px;">Price</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 250.913px;">Image</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 187.225px;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($products as $key => $product)
                                        <tr class="odd">
                                            <td>
                                                {{ $product->name }}
                                            </td>

                                            <td>{{ $product->category->name }}</td>

                                            <td>{{ $product->brand->name }}</td>

                                            <td>{{ $product->price }}</td>

                                            <td>
                                                <div class="table-image">
                                                    @if ($product->uploadFile)
                                                        <img src="{{ asset('storage/' . $product->uploadFile->file_path) }}"
                                                            alt="{{ $product->name }}" style="max-width: 50px;">
                                                    @else
                                                        None
                                                    @endif
                                                </div>
                                            </td>

                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="{{ route('admin.products.detail', $product->id) }}">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="{{ route('admin.products.edit', $product->id) }}">
                                                            <i class="ri-pencil-line"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Bạn có chắc muốn xóa người dùng này?')">Xóa</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Phân trang (nếu có) -->
    <div class="mt-3">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>

    <a href="{{ route('admin.products.trashed') }}" class="btn btn-sm btn-danger w-25">
        <i class="ri-archive-line"></i>
        <span>Trashed</span>
    </a>
@endsection

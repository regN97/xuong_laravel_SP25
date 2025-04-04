@extends('admin.layouts.main')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Danh sách sản phẩm</h1>
        <!-- Thông báo thành công (nếu có) -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Nút thêm sản phẩm -->
        <div class="mb-3">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Thêm sản phẩm</a>
        </div>

        <!-- Bảng danh sách sản phẩm -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Slug</th>
                        <th>Mô tả</th>
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>
                        <th>Giá</th>
                        <th>Giảm giá (%)</th>
                        <th>Kho</th>
                        <th>Ảnh</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $key => $product)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>{{ Str::limit($product->description, 50) }}</td> <!-- Giới hạn mô tả 50 ký tự -->
                            <td>{{ $product->category->name }}</td> <!-- Có thể thay bằng tên danh mục nếu có quan hệ -->
                            <td>{{ $product->brand->name }}</td> <!-- Có thể thay bằng tên thương hiệu nếu có quan hệ -->
                            <td>{{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->discount }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->uploadFile->file_path) }}"
                                        alt="{{ $product->name }}" style="max-width: 50px;">
                                @else
                                    Không có ảnh
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $product->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $product->status }}
                                </span>
                            </td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('admin.products.detail', $product->id) }}"
                                    class="btn btn-sm btn-info">Chi tiết</a>
                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                    class="btn btn-sm btn-warning">Sửa</a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="14" class="text-center">Không có sản phẩm nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Phân trang (nếu có) -->
        <div class="mt-3">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
    <a href="{{ route('admin.products.trashed') }}" class="btn btn-sm btn-danger w-25">
        <i class="ri-archive-line"></i>
        <span>Trashed</span>
    </a>
@endsection

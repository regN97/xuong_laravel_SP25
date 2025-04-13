@extends('admin.layouts.main')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Danh sách thương hiệu</h1>

        <!-- Thông báo thành công (nếu có) -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Nút thêm thương hiệu -->
        <div class="mb-3">
            <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">Thêm thương hiệu</a>
        </div>

        <!-- Bảng danh sách thương hiệu -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Logo</th>
                        <th>Mô tả</th>
                        <th>Hàng động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($brands as $key => $brand)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>
                                @if ($brand->uploadFile)
                                    <img src="{{ asset('storage/' . $brand->uploadFile->file_path) }}"
                                        alt="{{ $brand->name }}" style="max-width: 50px;">
                                @else
                                    Không có ảnh
                                @endif
                            </td>
                            <td>{{ Str::limit($brand->description, 50) }}</td> <!-- Giới hạn mô tả 50 ký tự -->
                            <td class="d-flex gap-2">
                                <a href="{{ route('admin.brands.detail', $brand->id) }}"
                                    class="btn btn-sm btn-info">Chi tiết</a>
                                <a href="{{ route('admin.brands.edit', $brand->id) }}"
                                    class="btn btn-sm btn-warning">Sửa</a>
                                <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Bạn có chắc muốn xóa thương hiệu này?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Không có thương hiệu nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Phân trang (nếu có) -->
        <div class="mt-3">
            {{ $brands->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
@extends('admin.layouts.main')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Danh sách quyền</h1>

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

        <!-- Nút thêm quyền -->
        <div class="mb-3">
            <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary">Thêm quyền</a>
        </div>

        <!-- Bảng danh sách quyền -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permissions as $key => $per)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $per->name }}</td>
                            <td>{{ Str::limit($per->description, 50) }}</td> <!-- Giới hạn mô tả 50 ký tự -->
                            <td class="d-flex gap-2">
                                <a href="{{ route('admin.permissions.detail', $per->id) }}"
                                    class="btn btn-sm btn-info">Chi tiết</a>
                                <a href="{{ route('admin.permissions.edit', $per->id) }}"
                                    class="btn btn-sm btn-warning">Sửa</a>
                                <form action="{{ route('admin.permissions.destroy', $per->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Bạn có chắc muốn xóa quyền này?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Không có quyền nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

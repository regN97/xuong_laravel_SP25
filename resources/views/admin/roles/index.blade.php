@extends('admin.layouts.main')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Danh sách vai trò</h1>

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

        <!-- Nút thêm vai trò -->
        <div class="mb-3">
            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Thêm vai trò</a>
        </div>

        <!-- Bảng danh sách vai trò -->
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
                    @forelse ($roles as $key => $role)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ Str::limit($role->description, 50) }}</td> <!-- Giới hạn mô tả 50 ký tự -->
                            <td class="d-flex gap-2">
                                <a href="{{ route('admin.roles.detail', $role->id) }}"
                                    class="btn btn-sm btn-info">Chi tiết</a>
                                <a href="{{ route('admin.roles.edit', $role->id) }}"
                                    class="btn btn-sm btn-warning">Sửa</a>
                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Bạn có chắc muốn xóa vai trò này?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Không có vai trò nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

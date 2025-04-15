@extends('admin.layouts.main')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white rounded-2">
                        <h3 class="p-2">Chi tiết người dùng</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center mb-4">
                                @if ($user->avatar)
                                    <img src="{{ asset('storage/' . $user->uploadFile->file_path) }}" alt="Avatar"
                                        class="img-fluid rounded-circle mb-3"
                                        style="width: 200px; height: 200px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/default-avatar.png') }}" alt="Default Avatar"
                                        class="img-fluid rounded-circle mb-3"
                                        style="width: 200px; height: 200px; object-fit: cover;">
                                @endif
                            </div>
                            <div class="col-md-9">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h5 class="text-muted">Họ và tên</h5>
                                        <p class="h4">{{ $user->name }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="text-muted">Tên đăng nhập</h5>
                                        <p class="h4">{{ $user->username }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h5 class="text-muted">Email</h5>
                                        <p class="h4">{{ $user->email }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="text-muted">Số điện thoại</h5>
                                        <p class="h4">{{ $user->phone ?? 'Chưa cập nhật' }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h5 class="text-muted">Địa chỉ</h5>
                                        <p class="h4">{{ $user->address ?? 'Chưa cập nhật' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="text-muted">Vai trò</h5>
                                        <p class="h4">{{ $user->roles->name ?? 'Chưa phân quyền' }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h5 class="text-muted">Trạng thái</h5>
                                        <span
                                            class="badge {{ $user->status == 'active' ? 'bg-success' : 'bg-danger' }} fs-6">
                                            {{ $user->status == 'active' ? 'Hoạt động' : 'Không hoạt động' }}
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="text-muted">Ngày tạo</h5>
                                        <p class="h4">{{ $user->created_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Quay lại
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
@endsection

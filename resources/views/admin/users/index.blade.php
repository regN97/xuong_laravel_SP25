@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>All Users</h5>
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
                                <a href="{{ route('admin.users.create') }}" class="align-items-center btn btn-theme d-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>Thêm mới
                                </a>
                            </form>
                        </div>

                        <div class="table-responsive table-product">
                            <div id="table_id_wrapper" class="dataTables_wrapper no-footer">
                                <table class="table all-package theme-table dataTable no-footer" id="table_id">
                                    <thead>
                                        <tr>
                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 187.188px;">User</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 187.188px;">Name</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 187.188px;">Phone</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 250.913px;">Email</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 187.225px;">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr class="odd">
                                                <td>
                                                    <div class="table-image">
                                                        @if ($user->uploadFile)
                                                            <img src="{{ asset('storage/' . $user->uploadFile->file_path) }}"
                                                                alt="{{ $user->name }}" style="max-width: 50px;">
                                                        @else
                                                            None
                                                        @endif
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="user-name">
                                                        <span>{{ $user->name }}</span>
                                                    </div>
                                                </td>

                                                <td>{{ $user->phone }}</td>

                                                <td>{{ $user->email }}</td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('admin.users.detail', $user->id) }}">
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="{{ route('admin.users.edit', $user->id) }}">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <form action="{{ route('admin.users.destroy', $user->id) }}"
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
    </div>
@endsection

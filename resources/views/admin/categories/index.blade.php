@extends('admin.layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>All Categories</h5>
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
                                <a href="{{ route('admin.categories.create') }}"
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
                                            <th class="sorting_disabled" rowspan="1" colspan="1">Name</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1">Description</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($categories as $key => $category)
                                            <tr>
                                                <td>
                                                    {{ $category->name }}
                                                </td>

                                                <td>{{ $category->description }}</td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('admin.categories.detail', $category->id) }}">
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="{{ route('admin.categories.edit', $category->id) }}">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <form
                                                                action="{{ route('admin.categories.destroy', $category->id) }}"
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
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>
@endsection

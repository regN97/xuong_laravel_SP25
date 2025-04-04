@extends('admin.layouts.main')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Danh sách sản phẩm đã xóa</h1>
        <!-- Thông báo thành công (nếu có) -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td class="d-flex gap-2">
                                <form action="{{ route('admin.products.restore', $product->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-success">Khôi phục</button>
                                </form>

                                <form action="{{ route('admin.products.force-delete', $product->id) }}" method="POST"
                                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Xóa vĩnh viễn</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-danger w-25 my-3">Back</a>

        <!-- Phân trang (nếu có) -->
        <div class="mt-3">
            {{-- {{ $products->links('pagination::bootstrap-5') }} --}}
        </div>

    </div>
@endsection

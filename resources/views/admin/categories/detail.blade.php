@extends('admin.layouts.main')

@section('content')
    <div class="container py-4">
        <h1>Detail Category</h1>

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
                            {{$category->name}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-danger my-2 w-25">Back</a>
    </div>
@endsection

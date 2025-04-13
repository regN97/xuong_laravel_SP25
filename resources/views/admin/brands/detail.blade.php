@extends('admin.layouts.main')

@section('content')
    <div class="container py-4">
        <h1>Detail Brand</h1>

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
                            {{ $brands->name }}
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">DESCRIPTION</td>
                        <td>
                            {{ $brands->description }}
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">LOGO</td>
                        <td>
                            @if ($brands->uploadFile)
                                <img src="{{ asset('storage/' . $brands->uploadFile->file_path) }}" alt="Logo" class="img-fluid"
                                    style="width: 100px; height: 100px;">
                            @else
                                <p>No logo available</p>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="{{ route('admin.brands.index') }}" class="btn btn-danger my-2 w-25">Back</a>
    </div>
@endsection

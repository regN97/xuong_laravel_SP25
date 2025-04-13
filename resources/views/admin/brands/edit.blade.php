@extends('admin.layouts.main')

@section('content')
    <div class="container py-4">
        <h1>Update Brand</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.brands.update', $brands->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $brands->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="3">{{ old('description', $brands->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">Brand Logo</label>

                        @if ($brands->uploadFile)
                            <img src="{{ asset('storage/' . $brands->uploadFile->file_path) }}" alt="{{ $brands->name }}"
                            style="max-width: 50px;">
                        @endif

                        <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo"
                            name="logo" accept="image/*">
                        @error('logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Add New Media')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <h2 class="fw-bold text-primary mb-4">
                <i class="bi bi-file-earmark-plus"></i> Add New Media
            </h2>

            <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Enter description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Type (Dropdown) -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Type</label>
                    <select name="type" class="form-select @error('type') is-invalid @enderror">
                        <option value="" disabled selected>Select type</option>
                        <option value="Commercials">Commercials</option>
                        <option value="General_advertisements">General advertisements</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
{{-- date --}}
                <!-- date -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Date</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}">
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Upload Image -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Upload Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('media') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Save Media
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

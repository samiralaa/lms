@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-primary">Add New Course</h2>

    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf

        <!-- Course Name -->
        <div class="mb-3">
            <label for="course_name" class="form-label">Course Name</label>
            <input type="text" name="course_name" id="course_name" class="form-control" required>
            @error('course_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Instructor -->
        <div class="mb-3">
            <label for="instructor_id" class="form-label">Instructor</label>
            <select name="instructor_id" id="instructor_id" class="form-control" required>
                <option value="" selected disabled>Select Instructor</option>
                @foreach($instructors as $instructor)
                    <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                @endforeach
            </select>
            @error('instructor_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Course Type -->
        <div class="mb-3">
            <label class="form-label">Course Type</label>
            <select name="type" class="form-control" required>
                <option value="Online">Online</option>
                <option value="Offline">Offline</option>
            </select>
            @error('type') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Start Date -->
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control">
            @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- End Date -->
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control">
            @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Duration -->
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="text" name="duration" id="duration" class="form-control">
            @error('duration') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Price -->
        <div class="mb-3">
            <label for="price" class="form-label">Price ($)</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01">
            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Course Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Course Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Create Course</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

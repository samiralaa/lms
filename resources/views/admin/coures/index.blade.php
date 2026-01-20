@extends('layouts.app')

@section('title', 'Courses')

@section('content')
<div class="container mt-4">
    <h1 class="text-primary fw-bold">Courses</h1>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                    <a href="{{ route('courses.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add Course
                    </a>
                    <div class="dropdown">
                        <a class="cursor-pointer text-secondary" id="dropdownTable" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa fa-ellipsis-v"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Export Data</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                        </ul>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-uppercase fw-bold">Course Name</th>
                                    <th class="text-uppercase fw-bold">Description</th>
                                    <th class="text-uppercase fw-bold">Instructor</th>
                                    <th class="text-uppercase fw-bold">Type</th>
                                    <th class="text-uppercase fw-bold">Status</th>
                                    <th class="text-uppercase fw-bold">Start Date</th>
                                    <th class="text-uppercase fw-bold">End Date</th>
                                    <th class="text-uppercase fw-bold">Duration</th>
                                    <th class="text-uppercase fw-bold">Price</th>
                                    <th class="text-uppercase fw-bold">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($courses as $course)
                                <tr>
                                    <td class="d-flex align-items-center">
                                        @foreach($course->images as $image)
                                            <img src="{{ asset('/storage/' . $image->url) }}" class="avatar avatar-sm me-2" alt="Course Image">
                                        @endforeach
                                        <span class="fw-bold">{{ $course->name }}</span>
                                    </td>
                                    <td>{{ $course->description }}</td>
                                    <td><span class="fw-bold">{{ $course->instructor->name }}</span></td>
                                    <td><span class="fw-bold">{{ $course->type }}</span></td>
                                    <td>
                                        <span class="badge {{ $course->status == 'Active' ? 'bg-success' : 'bg-danger' }}">
                                            {{ $course->status }}
                                        </span>
                                    </td>
                                    <td>{{ $course->start_date }}</td>
                                    <td>{{ $course->end_date }}</td>
                                    <td>{{ $course->duration }}</td>
                                    <td>${{ $course->price }}</td>
                                    <td>
                                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this course?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10">No courses available.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div> <!-- End Card Body -->
            </div> <!-- End Card -->
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Media')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-primary">Media List</h2>
                <a href="{{ route('media.create') }}" class="btn btn-success px-4">
                    <i class="bi bi-plus-lg"></i> Add New Media
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle border rounded overflow-hidden">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Image</th>
                            <th>Uploaded At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>1</td>
                            <td class="fw-medium">Title</td>
                            <td class="text-muted">this project to have data </td>
                            <td class="fw-medium text-info">Commercials</td>
                            <td>
                                <img src="{{ asset('images/sample.jpg') }}" class="rounded shadow-sm border" width="50" height="50" alt="Media">
                            </td>
                            <td class="text-muted">2024-08-30</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <button class="btn btn-sm btn-danger" onclick="confirmDelete(1)">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="fw-medium">Title</td>
                            <td class="text-muted">this project to have data </td>
                            <td class="fw-medium text-info">Commercials</td>
                            <td>
                                <img src="{{ asset('images/sample.jpg') }}" class="rounded shadow-sm border" width="50" height="50" alt="Media">
                            </td>
                            <td class="text-muted">2024-08-30</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <button class="btn btn-sm btn-danger" onclick="confirmDelete(1)">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td class="fw-medium">Title</td>
                            <td class="text-muted">this project to have data </td>
                            <td class="fw-medium text-info">Commercials</td>
                            <td>
                                <img src="{{ asset('images/sample.jpg') }}" class="rounded shadow-sm border" width="50" height="50" alt="Media">
                            </td>
                            <td class="text-muted">2024-08-30</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <button class="btn btn-sm btn-danger" onclick="confirmDelete(1)">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this media?')) {
            // Perform delete action, e.g., AJAX request or form submission
            alert('Media deleted successfully!');
        }
    }
</script>
@endsection

@extends('layouts.app')

@section('title', 'Job Applications')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-briefcase"></i> Job Applications
        </h2>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Applicant Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Resume</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>john.doe@example.com</td>
                        <td>+1 234 567 890</td>
                        <td><a href="#" class="btn btn-primary btn-sm"><i class="bi bi-file-earmark-pdf"></i> View Resume</a></td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="confirm('Are you sure you want to delete this application?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td>jane.smith@example.com</td>
                        <td>+44 789 123 456</td>
                        <td><a href="#" class="btn btn-primary btn-sm"><i class="bi bi-file-earmark-pdf"></i> View Resume</a></td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="confirm('Are you sure you want to delete this application?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p class="text-center text-muted mt-3">Showing static job applications.</p>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-envelope"></i> Contact Messages
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>john.doe@example.com</td>
                        <td>Hello, I need assistance with your service.</td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="confirm('Are you sure you want to delete this message?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td>jane.smith@example.com</td>
                        <td>I would like to know more about your pricing.</td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="confirm('Are you sure you want to delete this message?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p class="text-center text-muted mt-3">Showing static contact messages.</p>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="card">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-lg-6 col-7">
                    <h6>Users</h6>
                    <p class="text-sm mb-0">
                        <i class="fa fa-users text-info" aria-hidden="true"></i>
                        <span class="font-weight-bold ms-1">{{ $users->count() }} users</span> registered
                    </p>
                </div>

            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>

                            <td>
                                <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                            </td>
                            <td>
                                <span class="text-xs font-weight-bold">{{ $user->email }}</span>
                            </td>
                            <td class="text-center">
                                <span class="text-xs font-weight-bold">{{ ucfirst($user->role) }}</span>
                            </td>
                            <td class="text-center">
                                @if($user->status === 'active')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                          
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection

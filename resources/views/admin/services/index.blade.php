@extends('layouts.app')

@section('title', 'Maaden Services')

@section('content')
<div class="container-fluid mt-4">
    <h1 class="text-primary fw-bold">services and product</h1>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fw-bold"> <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-secondary"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Export Data</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                            </ul></h6>

                        </div>
                        <div class="d-flex">
                            <a href="{{ route('services.create') }}" class="btn btn-primary me-2">
                                <i class="fa fa-plus"></i> Add serves
                            </a>
                            <div class="dropdown">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Export Data</a></li>
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0 w-100">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th class="text-uppercase text-sm fw-bold">Name</th>
                                    <th class="text-uppercase text-sm fw-bold">Description</th>
                                    <th class="text-uppercase text-sm fw-bold text-center">icone</th>
                                    <th class="text-uppercase text-sm fw-bold text-center">Categort</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-2">
                                            <div>
                                                <h6 class="mb-0 text-sm">Mining Infrastructure Upgrade</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-sm">Enhancing mining operations and facility expansion.</td>
                                    <td class="align-middle text-center">
                                        <img src="{{ asset('assets/img/small-logos/logo-xd.svg') }}" class="avatar avatar-sm me-3" alt="XD Logo">

                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="fw-bold">Product</span>

                                    </td>
                                </tr>


                            </tbody>




                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layout.app')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Contact us</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Contact us</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Contact us</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card-title d-inline-block">Contact us</div>
                                    </div>
                                    <div class="col-lg-3">
                                        <form action="#">
                                            <input type="text" class="form-control" name="term"
                                                placeholder="Search by Phone / Name" value="">
                                        </form>
                                    </div>
                                    <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                                        {{-- <a href="#" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                                            data-target="#createModal"><i class="fas fa-plus"></i> Add Customer</a> --}}
                                        {{-- <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete"
                                            data-href="https://codecanyon8.kreativdev.com/superv/demo/admin/customer/bulk-delete"><i
                                                class="flaticon-interface-5"></i> Delete</button> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped mt-3">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            <input type="checkbox" class="bulk-check" data-val="all">
                                                        </th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Phone</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Message</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($contact as $customer)
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" class="bulk-check"  data-val="{{ $customer->id }}">
                                                            </td>
                                                            <td>{{ $customer->name }}</td>
                                                            <td>{{ $customer->phone }}</td>
                                                            <td>{{ $customer->email }}</td>
                                                            <td>{{ $customer->message }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="d-inline-block mx-auto">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="d-block mx-auto">
                    Copyright © 2025. All rights reserved by <a href="https://orlank.com/" target="_blank">Orlank Technology</a>..
                </div>
            </div>
        </footer>
    </div>
@endsection

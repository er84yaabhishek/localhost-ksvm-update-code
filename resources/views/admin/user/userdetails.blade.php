@extends('admin.layout.app')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Customer Details</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/dashboard">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/register/users">Customers</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Customer Details</a>
                    </li>
                </ul>

                <a href="{{route('registeredcustomer.index')}}" class="btn-md btn btn-primary ml-auto">Back</a>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Customer Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>First Name:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            {{$registerCustomer->customer->name}}
                                        </div>
                                    </div>
                                    {{-- <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>Last Name:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            Pratik
                                        </div>
                                    </div> --}}
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>Username:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            {{$registerCustomer->customer_username }}
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>Email:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            {{$registerCustomer->customer->email}}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>Number:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            +91 {{$registerCustomer->customer->phone}}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>Country:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            IND
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>City:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            Noida
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>Address:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            {{$registerCustomer->customer->address}}
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>



                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Shipping Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>Email:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            {{$registerCustomer->customer->email}}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>Phone:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            {{$registerCustomer->customer->phone}}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>City:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            IND
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>Address:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            {{$registerCustomer->customer->address}}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>Country:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            India
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>



                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Billing Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>Email:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            {{$registerCustomer->customer->email}}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>Phone:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            {{$registerCustomer->customer->phone}}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>City:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            Noida
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>Address:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            {{$registerCustomer->customer->address}}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <strong>Country:</strong>
                                        </div>
                                        <div class="col-lg-6">
                                            India
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Orders of : {{$registerCustomer->customer_username }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive product-list">
                                <h5></h5>
                                <table class="table table-striped mt-3">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Payment Status</th>
                                            <th scope="col">Order Status</th>
                                            <th scope="col">Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                            <div class="text-center d-block">

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
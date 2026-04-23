@extends('admin.layout.app')

@section('content')


<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="mt-2 mb-4">
                <h2 class="text-white pb-2">Welcome back, {{ Auth::user()->name }}!</h2>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-primary card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Admission Inquiry</p>
                                        <h4 class="card-title">{{ $admissionContact }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-info card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Contact Us Inquiry</p>
                                        <h4 class="card-title">{{ $contact }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-warning card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fab fa-blogger-b"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Event's</p>
                                        <h4 class="card-title">{{ $event }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-primary card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fab fa-product-hunt"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Gallery's</p>
                                        <h4 class="card-title">{{ $gallery }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               {{-- <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-info card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Users</p>
                                        <h4 class="card-title">21</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-success card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="far fa-file"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Custom Pages</p>
                                        <h4 class="card-title">3</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

            {{-- <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-primary card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-server"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category"> Life Time Orders </p>
                                        <h4 class="card-title">0</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-info card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-list-ul"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">

                                        <p class="card-category">Today Order</p>
                                        <h4 class="card-title">0</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-warning card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-credit-card"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">

                                    <div class="numbers">
                                        <p class="card-category">Today Sale</p>

                                        <h4 class="card-title">

                                            $

                                            0


                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-primary card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-users"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Customer</p>
                                        <h4 class="card-title">21</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-info card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-check-square"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Lifetime Sale</p>

                                        <h4 class="card-title">$
                                            0
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-success card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-envelope-square"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Reservation</p>
                                        <h4 class="card-title">17</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-6">
                    <div class="row row-card-no-pd">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <h4 class="card-title">Recent Reservation Requests</h4>
                                    </div>
                                    <p class="card-category">
                                        Top 10 latest table reservation requests</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped mt-3">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Details</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Samiul Alim Pratic</td>
                                                            <td>geniustest11@gmail.com</td>
                                                            <td>
                                                                <button class="btn btn-secondary btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#detailsModal33"><i
                                                                        class="fas fa-eye"></i> View</button>
                                                            </td>
                                                        </tr>

                                                        <!-- Details Modal -->
                                                        <div class="modal fade" id="detailsModal33"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Details
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span
                                                                                aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Name:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">Samiul
                                                                                    Alim Pratic</div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Email:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    geniustest11@gmail.com</div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Phone:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    236236
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Number
                                                                                        of Persons:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    3
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Date:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    02/27/2025
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Time:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    07:30 PM
                                                                                </div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong>Status:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    <span
                                                                                        class="badge badge-warning">Pending</span>
                                                                                </div>
                                                                            </div>
                                                                            <hr>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <tr>
                                                            <td>Samiul Alim Pratic</td>
                                                            <td>geniustest11@gmail.com</td>
                                                            <td>
                                                                <button class="btn btn-secondary btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#detailsModal32"><i
                                                                        class="fas fa-eye"></i> View</button>
                                                            </td>
                                                        </tr>

                                                        <!-- Details Modal -->
                                                        <div class="modal fade" id="detailsModal32"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Details
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span
                                                                                aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Name:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">Samiul
                                                                                    Alim Pratic</div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Email:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    geniustest11@gmail.com</div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Phone:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    236236
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Number
                                                                                        of Persons:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    3
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Date:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    02/26/2025
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Time:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    01:30 AM
                                                                                </div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong>Status:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    <span
                                                                                        class="badge badge-warning">Pending</span>
                                                                                </div>
                                                                            </div>
                                                                            <hr>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <tr>
                                                            <td>Yoshi Houston</td>
                                                            <td>majyzymo@mailinator.com</td>
                                                            <td>
                                                                <button class="btn btn-secondary btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#detailsModal31"><i
                                                                        class="fas fa-eye"></i> View</button>
                                                            </td>
                                                        </tr>

                                                        <!-- Details Modal -->
                                                        <div class="modal fade" id="detailsModal31"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Details
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span
                                                                                aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Name:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">Yoshi
                                                                                    Houston</div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Email:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    majyzymo@mailinator.com
                                                                                </div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Phone:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    +1 (385) 518-3457
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Number
                                                                                        of Persons:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    864
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Date:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    12-May-1984
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Time:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    Quae fuga Dolor ill
                                                                                </div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong>Status:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    <span
                                                                                        class="badge badge-warning">Pending</span>
                                                                                </div>
                                                                            </div>
                                                                            <hr>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <tr>
                                                            <td>Randall Hinton</td>
                                                            <td>tuwopimare@mailinator.com</td>
                                                            <td>
                                                                <button class="btn btn-secondary btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#detailsModal30"><i
                                                                        class="fas fa-eye"></i> View</button>
                                                            </td>
                                                        </tr>

                                                        <!-- Details Modal -->
                                                        <div class="modal fade" id="detailsModal30"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Details
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span
                                                                                aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Name:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">Randall
                                                                                    Hinton</div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Email:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    tuwopimare@mailinator.com
                                                                                </div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Phone:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    +1 (635) 895-6164
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Number
                                                                                        of Persons:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    593
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Date:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    28-Apr-2002
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Time:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    Quis in amet delect
                                                                                </div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong>Status:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    <span
                                                                                        class="badge badge-warning">Pending</span>
                                                                                </div>
                                                                            </div>
                                                                            <hr>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <tr>
                                                            <td>Nolan Lynch</td>
                                                            <td>kydod@mailinator.com</td>
                                                            <td>
                                                                <button class="btn btn-secondary btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#detailsModal29"><i
                                                                        class="fas fa-eye"></i> View</button>
                                                            </td>
                                                        </tr>

                                                        <!-- Details Modal -->
                                                        <div class="modal fade" id="detailsModal29"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Details
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span
                                                                                aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Name:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">Nolan
                                                                                    Lynch</div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Email:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    kydod@mailinator.com</div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Phone:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    +1 (557) 477-3754
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Number
                                                                                        of Persons:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    540
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Date:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    09-Nov-1984
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Time:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    Dolorum aut fugiat v
                                                                                </div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong>Status:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    <span
                                                                                        class="badge badge-success">Accepted</span>
                                                                                </div>
                                                                            </div>
                                                                            <hr>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <tr>
                                                            <td>Herrod Nash</td>
                                                            <td>mytevo@mailinator.com</td>
                                                            <td>
                                                                <button class="btn btn-secondary btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#detailsModal28"><i
                                                                        class="fas fa-eye"></i> View</button>
                                                            </td>
                                                        </tr>

                                                        <!-- Details Modal -->
                                                        <div class="modal fade" id="detailsModal28"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Details
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span
                                                                                aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Name:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">Herrod
                                                                                    Nash</div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Email:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    mytevo@mailinator.com</div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Phone:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    +1 (823) 799-6105
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Number
                                                                                        of Persons:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    852
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Date:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    22-Mar-2014
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Time:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    Quia culpa molestiae
                                                                                </div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong>Status:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    <span
                                                                                        class="badge badge-success">Accepted</span>
                                                                                </div>
                                                                            </div>
                                                                            <hr>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <tr>
                                                            <td>Velma Barron</td>
                                                            <td>xyxuseb@mailinator.com</td>
                                                            <td>
                                                                <button class="btn btn-secondary btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#detailsModal27"><i
                                                                        class="fas fa-eye"></i> View</button>
                                                            </td>
                                                        </tr>

                                                        <!-- Details Modal -->
                                                        <div class="modal fade" id="detailsModal27"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Details
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span
                                                                                aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Name:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">Velma
                                                                                    Barron</div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Email:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    xyxuseb@mailinator.com</div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Phone:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    +1 (311) 658-7908
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Number
                                                                                        of Persons:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    894
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Date:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    23-Oct-2002
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Time:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    Qui praesentium cons
                                                                                </div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong>Status:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    <span
                                                                                        class="badge badge-success">Accepted</span>
                                                                                </div>
                                                                            </div>
                                                                            <hr>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <tr>
                                                            <td>Jordan Knapp</td>
                                                            <td>tibala@mailinator.com</td>
                                                            <td>
                                                                <button class="btn btn-secondary btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#detailsModal26"><i
                                                                        class="fas fa-eye"></i> View</button>
                                                            </td>
                                                        </tr>

                                                        <!-- Details Modal -->
                                                        <div class="modal fade" id="detailsModal26"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Details
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span
                                                                                aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Name:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">Jordan
                                                                                    Knapp</div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Email:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    tibala@mailinator.com</div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Phone:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    +1 (741) 169-1304
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Number
                                                                                        of Persons:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    45
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Date:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    17-Dec-2009
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Time:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    Nemo quidem non ulla
                                                                                </div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong>Status:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    <span
                                                                                        class="badge badge-warning">Pending</span>
                                                                                </div>
                                                                            </div>
                                                                            <hr>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <tr>
                                                            <td>Noelani Cash</td>
                                                            <td>vumetinuki@mailinator.com</td>
                                                            <td>
                                                                <button class="btn btn-secondary btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#detailsModal25"><i
                                                                        class="fas fa-eye"></i> View</button>
                                                            </td>
                                                        </tr>

                                                        <!-- Details Modal -->
                                                        <div class="modal fade" id="detailsModal25"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Details
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span
                                                                                aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Name:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">Noelani
                                                                                    Cash</div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Email:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    vumetinuki@mailinator.com
                                                                                </div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Phone:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    +1 (851) 394-4129
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Number
                                                                                        of Persons:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    778
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Date:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    05-Mar-1980
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Time:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    Fuga Aut saepe ipsu
                                                                                </div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong>Status:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    <span
                                                                                        class="badge badge-warning">Pending</span>
                                                                                </div>
                                                                            </div>
                                                                            <hr>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <tr>
                                                            <td>Shop Manager</td>
                                                            <td>saifislamfci@gmail.com</td>
                                                            <td>
                                                                <button class="btn btn-secondary btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#detailsModal24"><i
                                                                        class="fas fa-eye"></i> View</button>
                                                            </td>
                                                        </tr>

                                                        <!-- Details Modal -->
                                                        <div class="modal fade" id="detailsModal24"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Details
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span
                                                                                aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Name:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">Shop
                                                                                    Manager</div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Email:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    saifislamfci@gmail.com</div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Phone:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    +1 (325) 953-9791
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Number
                                                                                        of Persons:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    367
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Date:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    04/18/2023
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong
                                                                                        class="text-capitalize">Check-in
                                                                                        Time:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    12:00 AM
                                                                                </div>
                                                                            </div>
                                                                            <hr>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <strong>Status:</strong>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    <span
                                                                                        class="badge badge-warning">Pending</span>
                                                                                </div>
                                                                            </div>
                                                                            <hr>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row row-card-no-pd">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <h4 class="card-title">Recent Orders</h4>
                                    </div>
                                    <p class="card-category">
                                        Top 10 latest orders</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive table-hover table-sales">
                                                <table class="table table-striped mt-3">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Order Number</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Total</th>
                                                            <th scope="col">Payment Status</th>
                                                            <th scope="col">Details</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>#uZdC-1685187335</td>
                                                            <td>27-05-2023</td>
                                                            <td>$
                                                                10.66

                                                            </td>
                                                            <td>
                                                                <p class="badge badge-danger">
                                                                    Pending</p>
                                                            </td>

                                                            <td>
                                                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/product/orders/detais/162"
                                                                    target="_blank"
                                                                    class="btn btn-primary btn-sm "><i
                                                                        class="fas fa-eye"></i> Details</a>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#6YEV-1685187251</td>
                                                            <td>27-05-2023</td>
                                                            <td>$
                                                                18.64

                                                            </td>
                                                            <td>
                                                                <p class="badge badge-danger">
                                                                    Pending</p>
                                                            </td>

                                                            <td>
                                                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/product/orders/detais/161"
                                                                    target="_blank"
                                                                    class="btn btn-primary btn-sm "><i
                                                                        class="fas fa-eye"></i> Details</a>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#HmG0-1685187127</td>
                                                            <td>27-05-2023</td>
                                                            <td>$
                                                                8.09

                                                            </td>
                                                            <td>
                                                                <p class="badge badge-danger">
                                                                    Pending</p>
                                                            </td>

                                                            <td>
                                                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/product/orders/detais/160"
                                                                    target="_blank"
                                                                    class="btn btn-primary btn-sm "><i
                                                                        class="fas fa-eye"></i> Details</a>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}




        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="d-block mx-auto">
                Copyright © 2025. All rights reserved by <a href="https://analysishms.com/" target="_blank">Analysis Softwere Services</a>..
            </div>
        </div>
    </footer>
</div>

</div>
@endsection
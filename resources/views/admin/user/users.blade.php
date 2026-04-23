@extends('admin.layout.app')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">
                        Registered Users
                    </h4>
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
                            <a href="#">Customers</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Registered Customers</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card-title">
                                            Registered Users
                                        </div>
                                    </div>
                                    <div class="col-6 mt-2 mt-lg-0">
                                        <button class="btn btn-danger float-right btn-sm ml-2 mt-1 d-none bulk-delete"
                                            data-href="bulk-delete"><i class="flaticon-interface-5"></i>
                                            Delete</button>
                                        <form action="" class="float-right">
                                            <input type="text" name="term" class="form-control" value=""
                                                placeholder="Search by Username / Email" style="min-width: 250px;">
                                        </form>
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
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Number</th>
                                                        <th scope="col">Email Status</th>
                                                        <th scope="col">Account</th>
                                                        <td scope="col">Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($registerCustomer->isEmpty())
                                                        <tr>
                                                            <td>No Data Found!</td>
                                                        </tr>
                                                    @else
                                                        @foreach ($registerCustomer as $customer)
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox" class="bulk-check"
                                                                        data-val="{{ $customer->id }}">
                                                                </td>
                                                                <td>{{ $customer->customer->name }}</td>
                                                                <td>{{ $customer->customer->email }}</td>
                                                                <td>+91 {{ $customer->customer->phone }}</td>
                                                                <td>
                                                                    <form id="emailForm1" class="d-inline-block"
                                                                        action="{{ route('email-verify') }}" method="post">
                                                                        <select
                                                                            class="form-control form-control-sm bg-<?= $customer->email_status == 0 ? 'success' : 'danger' ?>"name="email_verified"
                                                                            onchange="emailVerify(this.value,'{{ $customer->id }}');">
                                                                            <option value="0"
                                                                                <?= $customer->email_status == 0 ? 'selected' : '' ?>>
                                                                                Verify</option>
                                                                            <option value="1"
                                                                                <?= $customer->email_status == 1 ? 'selected' : '' ?>>
                                                                                Unverify</option>
                                                                        </select>
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ $customer->id }}">
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <form id="userFrom1"
                                                                        class="d-inline-block"action="{{ route('account-status') }}"
                                                                        method="post">
                                                                        <select
                                                                            class="form-control form-control-sm bg-<?= $customer->account_status == 0 ? 'success' : 'danger' ?>"
                                                                            name="status"
                                                                            onchange="accountActiveOrNot(this.value);">
                                                                            <option value="0"
                                                                                <?= $customer->account_status == 0 ? 'selected' : '' ?>>
                                                                                Active </option>
                                                                            <option value="1"
                                                                                <?= $customer->account_status == 1 ? 'selected' : '' ?>>
                                                                                Deactive</option>
                                                                        </select>
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ $customer->id }}">
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <button
                                                                            class="btn btn-info btn-sm dropdown-toggle"type="button"
                                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                                            aria-haspopup="true"
                                                                            aria-expanded="false">Actions</button>
                                                                        <div
                                                                            class="dropdown-menu"aria-labelledby="dropdownMenuButton">
                                                                            <a
                                                                                class="dropdown-item"href="{{ route('registeredcustomer.show',$customer->id) }}">Details</a>
                                                                            <form class="d-inline-block"
                                                                                action="{{ route('delete-customer') }}"
                                                                                method="post" id="deleteForm">
                                                                                <input type="hidden"
                                                                                    name="user_id"value="{{ $customer->id }}">
                                                                                <button type="button"class="deleteBtn pl-4"
                                                                                    onclick="showConfirmModal();">Delete</button>
                                                                            </form>
                                                                            <style>
                                                                                .deleteBtn {
                                                                                    border: none;
                                                                                    background: transparent;
                                                                                    font-size: 13px;
                                                                                    padding: 0.25rem 1.5rem;
                                                                                    color: #212529;
                                                                                    cursor: pointer;
                                                                                    display: block;
                                                                                    width: 100%;
                                                                                    text-align: left;
                                                                                }
                                                                            </style>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
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
    <!-- Bootstrap Modal for confirmation -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="hideConfirmModal();"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this customer?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        onclick="hideConfirmModal();">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="deleteCustomer();">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function emailVerify(value, id) {
            // Create the form data to send with AJAX
            var formData = $('#emailForm1').serialize(); // Serialize form data
            $.ajax({
                url: $('#emailForm1').attr('action'), // Get the action URL from the form
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        bootnotify('Email Verify Successfully!', 'Email Verify!', 'success');
                        loadWindow();
                    }
                },
                error: function(xhr, status, error) {
                    bootnotify('Falied Email Verify', 'Email Verify!', 'danger')
                }
            });
        }

        function accountActiveOrNot(value) {
            // Create the form data to send with AJAX
            var formData = $('#userFrom1').serialize(); // Serialize form data
            $.ajax({
                url: $('#userFrom1').attr('action'), // Get the action URL from the form
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        bootnotify('Account Status Update Successfully!', 'Account Status!', 'success');
                        loadWindow();
                    }
                },
                error: function(xhr, status, error) {
                    bootnotify('Falied Account Status Update', 'Account Status!', 'danger')
                }
            });
        }

        function showConfirmModal() {
            $('#confirmModal').modal('show');
        }

        function hideConfirmModal() {
            $('#confirmModal').modal('hide');
        }

        function deleteCustomer() {
            // Create the form data to send with AJAX
            var formData = $('#deleteForm').serialize(); // Serialize form data
            $.ajax({
                url: $('#deleteForm').attr('action'), // Get the action URL from the form
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        // Close the modal after deletion
                        hideConfirmModal();
                        bootnotify('Account Status Update Successfully!', 'Account Status!', 'success');
                        loadWindow();
                    }
                },
                error: function(xhr, status, error) {
                    bootnotify('Falied Account Status Update', 'Account Status!', 'danger')
                }
            });
        }


        // $(document).ready(function() {
        //     $('#deletebtncustomer').on('click', function(e) {
        //         // Get form data
        //         var formData = $('#deleteForm').serialize(); // Serialize form data
        //         $.ajax({
        //             url: $(this).attr('action'), // Use the form's action URL
        //             type: 'POST',
        //             data: formData,
        //             processData: false, // Don't process the data
        //             contentType: false, // Set content type to false
        //             success: function(response) {
        //                 if (response.success) {
        //                     bootnotify('Account Delate Successfully!', 'Account Delete!','success');
        //                    // loadWindow();
        //                 }
        //             },
        //             error: function(xhr) {
        //                 // Handle validation errors
        //                 var errors = xhr.responseJSON.errors;
        //                 if (errors) {
        //                     $.each(errors, function(key, value) {
        //                         bootnotify('Account Delate Falied!', 'Account Delete!', 'danger')
        //                     });
        //                 }
        //             }
        //         });
        //     });
        // });
    </script>
@endsection

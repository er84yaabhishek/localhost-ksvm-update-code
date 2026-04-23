@extends('admin.layout.app')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Our Pages</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="{{ url('admin/dashboard') }}">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="fa fa-arrow-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Our Pages</a>
                        </li>
                        <li class="separator">
                            <i class="fa fa-arrow-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Our Pages</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card-title d-inline-block">Our Pages</div>
                                    </div>
                                    {{-- <div class="col-lg-3">
                                        <select name="language" class="form-control"
                                            onchange="window.location='https://codecanyon8.kreativdev.com/superv/demo/admin/category?language='+this.value">
                                            <option value="" selected disabled>Select a Language</option>
                                            <option value="en" selected>English</option>
                                            <option value="ar">عربى</option>
                                        </select>
                                    </div> --}}
                                    <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                                        <a href="#" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                                            data-target="#createModal"><i class="fas fa-plus"></i> Add Page</a>
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
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($policies->isEmpty())
                                                        <tr>
                                                            <td>No Data Found!</td>
                                                        </tr>
                                                    @else
                                                        @foreach ($policies as $value)
                                                                                                    <tr>
                                                                                                        <td>
                                                                                                            <input type="checkbox" class="bulk-check"
                                                                                                                data-val="{{ $value->id }}">
                                                                                                        </td>

                                                                                                        <td>{{ $value->name }}</td>

                                                                                                        <td>
                                                                                                            <?php
                                                                                                                    if ($value->status == 'notice') {
                                                                                                                        echo '<h2 class="d-inline-block"><span class="badge badge-info">Notice</span></h2>';
                                                                                                                    } else if ($value->status == 'page') {
                                                                                                                        echo '<h2 class="d-inline-block"><span class="badge badge-primary">Page</span></h2>';
                                                                                                                    } else if ($value->status == 'active') {

                                                                                                                        echo '<h2 class="d-inline-block"><span class="badge badge-success">Active</span></h2>';
                                                                                                                    } else {
                                                                                                                        echo '<h2 class="d-inline-block"><span class="badge badge-danger">Deactive</span></h2>';
                                                                                                                    }
                                                                                                                ?>                                                            
                                                                                                        </td>
                                                                                                        {{-- <td>
                                                                                                            <form id="featureForm15"
                                                                                                                action="https://codecanyon8.kreativdev.com/superv/demo/admin/pcategory/feature"
                                                                                                                method="POST">
                                                                                                                <input type="hidden" name="pcategory_id" value="15">
                                                                                                                <select name="feature" id=""
                                                                                                                    class="form-control-sm text-white bg-success"
                                                                                                                    onchange="">
                                                                                                                    <option value="1" selected>Yes</option>
                                                                                                                    <option value="0">No</option>
                                                                                                                </select>
                                                                                                            </form>
                                                                                                        </td> --}}
                                                                                                        <td>
                                                                                                            <a class="btn btn-secondary btn-sm editbtn"
                                                                                                                href="{{ route('policy.show', $value->id) }}">
                                                                                                                <span class="btn-label">
                                                                                                                    <i class="fas fa-edit"></i>
                                                                                                                </span>
                                                                                                                Edit
                                                                                                            </a>
                                                                                                            {{-- <form class="d-inline-block"
                                                                                                                action="{{ route('delete-category') }}" method="post"
                                                                                                                id="deleteForm">
                                                                                                                <input type="hidden" name="category_id"
                                                                                                                    value="{{ $value->id }}">
                                                                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                                                                    onclick="showConfirmModal();">
                                                                                                                    <span class="btn-label">
                                                                                                                        <i class="fas fa-trash"></i>
                                                                                                                    </span>
                                                                                                                    Delete</button>
                                                                                                            </form> --}}
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


                <!-- Create Service Category Modal -->
                <div class="modal fade" id="createModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add Policies</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="ajaxForm" class="modal-form" action="{{ route('policy.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Name **</label>
                                        <input type="text" class="form-control" name="name" value=""
                                            placeholder="Enter name">
                                        <p id="errname" class="mb-0 text-danger em"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description **</label>
                                        <textarea class="form-control summernote" name="description"
                                            placeholder="Enter description" data-height="300" id="description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status **</label>
                                        <select class="form-control ltr" name="status">
                                            <option value="" selected disabled>Select a status</option>
                                            <option value="notice">Notice</option>
                                            <option value="page">Page</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Deactive</option>
                                        </select>
                                        <p id="errstatus" class="mb-0 text-danger em"></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="d-block mx-auto">
                    Copyright © 2025. All rights reserved by <a href="https://analysishms.com/" target="_blank">Analysish
                        Software</a>..
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
                    Are you sure you want to delete this Policies?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        onclick="hideConfirmModal();">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="deleteCategory();">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#ajaxForm').submit(function (e) {
                e.preventDefault(); // Prevent the default form submission

                var formData = new FormData(this); // Collect form data

                $.ajax({
                    url: $('#ajaxForm').attr('action'), // Use Laravel's route helper
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        bootnotify('Policies Added Successfully!', 'Policies Add!', 'success');
                        loadWindow();
                    },
                    error: function (xhr) {
                        // Handle validation errors
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            $.each(errors, function (key, value) {
                                // $('#err' + key).text(value[0]);
                                bootnotify(value[0], 'Policies Add!', 'danger')
                            });
                        }
                    }
                });
            });
        });

        function showConfirmModal() {
            $('#confirmModal').modal('show');
        }

        function hideConfirmModal() {
            $('#confirmModal').modal('hide');
        }

        function deleteCategory() {
            // Create the form data to send with AJAX
            var formData = $('#deleteForm').serialize(); // Serialize form data
            $.ajax({
                url: $('#deleteForm').attr('action'), // Get the action URL from the form
                type: 'POST',
                data: formData,
                success: function (response) {
                    if (response.success) {
                        // Close the modal after deletion
                        hideConfirmModal();
                        bootnotify('Category Delete Successfully!', 'Category Delete!', 'success');
                        loadWindow();
                    }
                },
                error: function (xhr, status, error) {
                    bootnotify('Falied Account Status Update', 'Category Delete!', 'danger')
                }
            });
        }
    </script>
@endsection
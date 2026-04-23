@extends('admin.layout.app')

@section('content')

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Edit Page</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="{{url('admin/dashboard')}}">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="fa fa-arrow-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Service Page</a>
                        </li>
                        <li class="separator">
                            <i class="fa fa-arrow-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Edit Page</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title d-inline-block">Edit Page</div>
                                <a class="btn btn-info btn-sm float-right d-inline-block" href="{{ url()->previous() }}">
                                    <span class="btn-label">
                                        <i class="fas fa-backward"></i>
                                    </span>
                                    Back
                                </a>
                            </div>
                            <div class="card-body pt-5 pb-5">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <form id="ajaxForm" action="{{route('policy.update', $policy->id)}}" method="POST"
                                            enctype="multipart/form-data">

                                            @csrf

                                            <div class="form-group">
                                                <label for="">Name **</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{$policy->name}}" placeholder="Enter name">
                                                <p id="errname" class="mb-0 text-danger em"></p>
                                            </div>
                                            <input type="hidden" name="policy_id" value="{{$policy->id}}">
                                            <div class="form-group">
                                                <label for="">Description **</label>
                                                <textarea class="form-control summernote" name="description"
                                                    placeholder="Enter description"
                                                    data-height="300">{{$policy->description}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Status ** </label>
                                                <select class="form-control ltr" name="status">
                                                    <option value="">Select a status</option>
                                                    <option value="notice" <?= $policy->status == 'notice' ? 'selected' : '' ?>>Notice</option>
                                                    <option value="page" <?= $policy->status == 'page' ? 'selected' : '' ?>>
                                                        Page</option>
                                                    <option value="active" <?= $policy->status == 'active' ? 'selected' : '' ?>>Active</option>
                                                    <option value="inactive" <?= $policy->status == 'inactive' ? 'selected' : '' ?>>Deactive</option>
                                                </select>
                                                <p id="errstatus" class="mb-0 text-danger em"></p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="form">
                                                    <div class="form-group from-show-notify row">
                                                        <div class="col-12 text-center">
                                                            <button type="submit" class="btn btn-success">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
                    Copyright © 2025. All rights reserved by <a href="https://analysishms.com/" target="_blank">Analysish
                        Software</a>..
                </div>
            </div>
        </footer>
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
                        bootnotify('Policies Edit Successfully!', 'Policies Edit!', 'success');
                        loadWindowRedirect(response.url);
                    },
                    error: function (xhr) {
                        // Handle validation errors
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            $.each(errors, function (key, value) {
                                // $('#err' + key).text(value[0]);
                                bootnotify(value[0], 'Policies Edit!', 'danger')
                            });
                        }
                    }
                });
            });
        });
    </script>

@endsection
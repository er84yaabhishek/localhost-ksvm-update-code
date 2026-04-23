@extends('admin.layout.app')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Add Event</h4>
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
                            <a href="#">Event Management</a>
                        </li>
                        <li class="separator">
                            <i class="fa fa-arrow-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Add Event</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title d-inline-block">Add Event</div>
                                <a class="btn btn-info btn-sm float-right d-inline-block"
                                    href="{{ route('admin.event') }}">
                                    <span class="btn-label">
                                        <i class="fas fa-backward"></i>
                                    </span>
                                    Back
                                </a>
                            </div>
                            <div class="card-body pt-5 pb-5">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <form id="ajaxForm" class="" action="{{ route('admin.event.store') }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="px-2">
                                                <label for="" class="mb-2"><strong>Images **</strong></label>
                                                <div class="fallback">
                                                    <input name="event_image" type="file" accept="image/*" required />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Title **</label>
                                                        <input type="text" class="form-control" name="title" value=""
                                                            placeholder="Enter title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Description **</label>
                                                        <textarea class="form-control" id="description" name="description"
                                                            placeholder="Enter description" data-height="300"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group from-show-notify row">
                                                <div class="col-12 text-center">
                                                    <button type="submit" class="btn btn-success">Submit</button>
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



    <script src="{{ public_asset('admin/customjs/productadd.js') }}"></script>

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
                        bootnotify('Event Added Successfully!', 'Event Add!', 'success');
                        console.log(response.url);
                        loadWindowRedirect(response.url);
                    },
                    error: function (xhr) {
                        // Handle validation errors
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            $.each(errors, function (key, value) {
                                // $('#err' + key).text(value[0]);
                                bootnotify(value[0], 'Event Add!', 'danger')
                            });
                        }
                    }
                });
            });
        });

        ////////////  Get Subcategory  //////#
    </script>
@endsection
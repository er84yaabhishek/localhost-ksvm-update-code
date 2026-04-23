@extends('admin.layout.app')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Edit Gallery</h4>
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
                            <a href="#">Gallery Management</a>
                        </li>
                        <li class="separator">
                            <i class="fa fa-arrow-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Edit Gallery</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title d-inline-block">Edit Gallery</div>
                                <a class="btn btn-info btn-sm float-right d-inline-block"
                                    href="{{ route('admin.gallery') }}">
                                    <span class="btn-label">
                                        <i class="fas fa-backward"></i>
                                    </span>
                                    Back
                                </a>
                            </div>
                            <div class="card-body pt-5 pb-5">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <form id="ajaxForm" class="" action="{{ route('admin.gallery.update', $gallery->id) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="px-2">
                                                <input type="hidden" name="id" value="{{ $gallery->id }}">
                                                 <label for="" class="mb-2"><strong>Images **</strong></label>
                                                 <img src="{{ public_asset('images/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="img-fluid mb-3" style="max-height: 200px; object-fit: cover;">
                                                <div class="fallback">
                                                    <input name="gallery_image" type="file" accept="image/*" />
                                                </div>
                                            </div>
                                            <div class="px-2 mt-3">
                                                <label for="" class="mb-2"><strong>Video</strong></label>
                                                @if($gallery->video)
                                                    <video width="100%" height="200" controls class="mb-3" style="max-height: 200px;">
                                                        <source src="{{ public_asset('images/' . $gallery->video) }}" type="video/{{ pathinfo($gallery->video, PATHINFO_EXTENSION) }}">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                    <p class="text-muted small">Current video: {{ $gallery->video }}</p>
                                                @else
                                                    <p class="text-muted small">No video uploaded</p>
                                                @endif
                                                <div class="fallback">
                                                    <input name="gallery_video" type="file" accept="video/*" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Title **</label>
                                                        <input type="text" class="form-control" name="title" value=" {{ $gallery->title }} "
                                                            placeholder="Enter title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Description **</label>
                                                        <textarea class="form-control" id="description" name="description"
                                                            placeholder="Enter description" data-height="300">{{ $gallery->description }}</textarea>
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
                        bootnotify('Gallery Update Successfully!', 'Gallery Update!', 'success');
                        console.log(response.url);
                        loadWindowRedirect(response.url);
                    },
                    error: function (xhr) {
                        // Handle validation errors
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            $.each(errors, function (key, value) {
                                // $('#err' + key).text(value[0]);
                                bootnotify(value[0], 'Gallery Update!', 'danger')
                            });
                        }
                    }
                });
            });
        });

        ////////////  Get Subcategory  //////#
    </script>
@endsection
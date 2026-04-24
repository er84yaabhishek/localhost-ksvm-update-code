@extends('admin.layout.app')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Add Gallery</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a>
                    </li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Gallery Management</li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Add Gallery</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Add New Gallery Image</h4>
                            <a href="{{ route('admin.gallery') }}" class="btn btn-info btn-sm">
                                <i class="fas fa-arrow-left"></i> Back to Gallery
                            </a>
                        </div>
                        <div class="card-body">
                            <div id="alertBox"></div>

                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <form id="galleryAddForm" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label class="font-weight-bold">Image <span class="text-danger">*</span></label>
                                            <input type="file" name="gallery_image" class="form-control" accept="image/*" required
                                                onchange="previewImg(this, 'imgPreview')">
                                            <small class="text-muted">Allowed: jpeg, png, jpg, gif, svg | Max: 2MB</small>
                                            <div class="mt-2">
                                                <img id="imgPreview" src="" style="display:none; max-height:200px; border-radius:8px; border:1px solid #ddd; padding:4px;">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">Title <span class="text-danger">*</span></label>
                                            <input type="text" name="title" class="form-control" placeholder="Enter gallery title" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">Description</label>
                                            <textarea name="description" class="form-control" rows="4"
                                                placeholder="Enter description (optional)"></textarea>
                                        </div>

                                        <div class="form-group text-center mt-4">
                                            <button type="submit" class="btn btn-success btn-lg px-5" id="submitBtn">
                                                <i class="fas fa-upload"></i> Upload & Save
                                            </button>
                                            <a href="{{ route('admin.gallery') }}" class="btn btn-secondary btn-lg px-4 ml-2">
                                                Cancel
                                            </a>
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
</div>
@endsection

@push('scripts')
<script>
function previewImg(input, previewId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#' + previewId).attr('src', e.target.result).show();
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function() {
    $('#galleryAddForm').on('submit', function(e) {
        e.preventDefault();

        var btn = $('#submitBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Uploading...');
        $('#alertBox').html('');

        $.ajax({
            url: '{{ route("admin.gallery.store") }}',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(res) {
                bootnotify('Gallery image added successfully!', 'Success', 'success');
                setTimeout(function() {
                    window.location.href = '{{ route("admin.gallery") }}';
                }, 1500);
            },
            error: function(xhr) {
                btn.prop('disabled', false).html('<i class="fas fa-upload"></i> Upload & Save');
                var msg = 'Something went wrong.';
                if (xhr.responseJSON) {
                    if (xhr.responseJSON.errors) {
                        msg = Object.values(xhr.responseJSON.errors).flat().join('<br>');
                    } else if (xhr.responseJSON.message) {
                        msg = xhr.responseJSON.message;
                    }
                }
                $('#alertBox').html('<div class="alert alert-danger alert-dismissible fade show"><strong><i class="fas fa-times-circle"></i> Error!</strong> ' + msg + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                $('html, body').animate({ scrollTop: 0 }, 400);
            }
        });
    });
});
</script>
@endpush

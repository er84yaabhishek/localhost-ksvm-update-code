@extends('admin.layout.app')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit Gallery</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a>
                    </li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Gallery Management</li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Edit Gallery</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Edit Gallery Image</h4>
                            <a href="{{ route('admin.gallery') }}" class="btn btn-info btn-sm">
                                <i class="fas fa-arrow-left"></i> Back to Gallery
                            </a>
                        </div>
                        <div class="card-body">
                            <div id="alertBox"></div>

                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <form id="galleryEditForm" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $gallery->id }}">

                                        <div class="form-group">
                                            <label class="font-weight-bold">Current Image</label>
                                            <div class="mb-2">
                                                <img id="imgPreview"
                                                    src="{{ public_asset('images/'.$gallery->image) }}"
                                                    style="max-height:200px; border-radius:8px; border:1px solid #ddd; padding:4px;">
                                            </div>
                                            <label class="font-weight-bold">Change Image <small class="text-muted">(optional)</small></label>
                                            <input type="file" name="gallery_image" class="form-control" accept="image/*"
                                                onchange="previewImg(this, 'imgPreview')">
                                            <small class="text-muted">Khali chhodo agar image change nahi karni</small>
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">Title <span class="text-danger">*</span></label>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ $gallery->title }}" placeholder="Enter gallery title" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold">Description</label>
                                            <textarea name="description" class="form-control" rows="4"
                                                placeholder="Enter description">{{ $gallery->description }}</textarea>
                                        </div>

                                        <div class="form-group text-center mt-4">
                                            <button type="submit" class="btn btn-success btn-lg px-5" id="submitBtn">
                                                <i class="fas fa-save"></i> Update Gallery
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
        reader.onload = function(e) { $('#' + previewId).attr('src', e.target.result); };
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function() {
    $('#galleryEditForm').on('submit', function(e) {
        e.preventDefault();
        var btn = $('#submitBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Updating...');
        $('#alertBox').html('');

        $.ajax({
            url: '{{ route("admin.gallery.update", $gallery->id) }}',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(res) {
                bootnotify('Gallery updated successfully!', 'Success', 'success');
                setTimeout(function() { window.location.href = '{{ route("admin.gallery") }}'; }, 1500);
            },
            error: function(xhr) {
                btn.prop('disabled', false).html('<i class="fas fa-save"></i> Update Gallery');
                var msg = xhr.responseJSON && xhr.responseJSON.errors
                    ? Object.values(xhr.responseJSON.errors).flat().join('<br>')
                    : (xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Something went wrong.');
                $('#alertBox').html('<div class="alert alert-danger alert-dismissible fade show"><strong><i class="fas fa-times-circle"></i> Error!</strong> ' + msg + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                $('html, body').animate({ scrollTop: 0 }, 400);
            }
        });
    });
});
</script>
@endpush

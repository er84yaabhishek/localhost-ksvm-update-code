@extends('admin.layout.app')

@section('title', 'Banner Management')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Banner Management</h4>
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
                            <a href="#">Banner Management</a>
                        </li>
                        <li class="separator">
                            <i class="fa fa-arrow-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Banner News</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title d-inline-block">All Banners</div>
                                <button class="btn btn-primary btn-sm float-right d-inline-block" id="addBannerBtn">
                                    <span class="btn-label">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    Add Banner </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="bannersTable" class="display table table-striped table-hover"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Subtitle</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($banners as $banner)
                                                <tr>
                                                    <td>{{ $banner->order }}</td>
                                                    <td>
                                                        <img src="{{ public_asset($banner->image) }}" alt="{{ $banner->title }}"
                                                            style="width: 100px; height: auto;">
                                                    </td>
                                                    <td>{{ $banner->title }}</td>
                                                    <td>{{ $banner->subtitle }}</td>
                                                    <td>{{ Str::limit($banner->description, 50) }}</td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input status-toggle"
                                                                id="status{{ $banner->id }}" data-id="{{ $banner->id }}" {{ $banner->status == 'active' ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="status{{ $banner->id }}">
                                                                <span
                                                                    class="badge badge-{{ $banner->status == 'active' ? 'success' : 'danger' }}">
                                                                    {{ ucfirst($banner->status) }}
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm edit-btn"
                                                            data-id="{{ $banner->id }}">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-sm delete-btn"
                                                            data-id="{{ $banner->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
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

    <!-- Add/Edit Banner Modal -->
    <div class="modal fade" id="bannerModal" tabindex="-1" role="dialog" aria-labelledby="bannerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bannerModalLabel">Add Banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="bannerForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="banner_id" name="banner_id">
                    <input type="hidden" id="method" name="_method" value="POST">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                    <span class="text-danger error-text title_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subtitle">Subtitle</label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle">
                                    <span class="text-danger error-text subtitle_error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="mydescription" name="description" rows="3"
                                required></textarea>
                            <span class="text-danger error-text description_error"></span>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Banner Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    <small class="form-text text-muted">Image will be automatically resized to 1920x600
                                        pixels. Max size: 5MB</small>
                                    <span class="text-danger error-text image_error"></span>
                                    <div id="imagePreview" class="mt-2"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="order">Order <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="order" name="order" min="0" required>
                                    <span class="text-danger error-text order_error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    <span class="text-danger error-text status_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveBannerBtn">Save
                            Banner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        $(document).ready(function () {
            // Initialize DataTable
            var table = $('#bannersTable').DataTable({
                "order": [[0, "asc"]],
                "pageLength": 10
            });

            // Add Banner Button Click
            $('#addBannerBtn').click(function () {
                $('#bannerForm')[0].reset();
                $('#banner_id').val('');
                $('#method').val('POST');
                $('#bannerModalLabel').text('Add Banner');
                $('#imagePreview').html('');
                $('.error-text').text('');
                $('#image').prop('required', true);
                $('#bannerModal').modal('show');
            });

            // Edit Banner Button Click
            $(document).on('click', '.edit-btn', function () {
                var bannerId = $(this).data('id');

                $.ajax({
                    url: `/admin/banners/${bannerId}`,
                    type: 'GET',
                    success: function (response) {
                        if (response.success) {
                            var banner = response.data;
                            $('#banner_id').val(banner.id);
                            $('#title').val(banner.title);
                            $('#subtitle').val(banner.subtitle);
                            $('#mydescription').val(banner.description);
                            $('#order').val(banner.order);
                            $('#status').val(banner.status);
                            $('#method').val('PUT');
                            $('#bannerModalLabel').text('Edit Banner');
                            $('#image').prop('required', false);

                            // Show current image
                            $('#imagePreview').html(`
                                <div class="card">
                                    <img src="/${banner.image}" class="card-img-top" alt="Current Image">
                                    <div class="card-body p-2">
                                        <small class="text-muted">Current Image</small>
                                    </div>
                                </div>
                            `);

                            $('.error-text').text('');
                            $('#bannerModal').modal('show');
                        }
                    },
                    error: function (xhr) {
                        swal('Error!', 'Failed to fetch banner details', 'error');
                    }
                });
            });

            // Submit Banner Form
            $('#bannerForm').submit(function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                var bannerId = $('#banner_id').val();
                var url = bannerId ? `/admin/banners/${bannerId}` : '/admin/banners';

                // Clear previous errors
                $('.error-text').text('');
                $('#saveBannerBtn').prop('disabled', true).text('Saving...');

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.success) {
                            $('#bannerModal').modal('hide');
                            swal({
                                title: 'Success!',
                                text: response.message,
                                type: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        }
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function (key, value) {
                                $('.' + key + '_error').text(value[0]);
                            });
                        } else {
                            swal('Error!', xhr.responseJSON.message || 'Something went wrong', 'error');
                        }
                    },
                    complete: function () {
                        $('#saveBannerBtn').prop('disabled', false).text('Save Banner');
                    }
                });
            });

            // Delete Banner
            $(document).on('click', '.delete-btn', function () {
                var bannerId = $(this).data('id');

                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    closeOnConfirm: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: `/admin/banners/${bannerId}`,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                if (response.success) {
                                    swal({
                                        title: 'Deleted!',
                                        text: response.message,
                                        type: 'success',
                                        timer: 2000,
                                        showConfirmButton: false
                                    });
                                    setTimeout(function () {
                                        location.reload();
                                    }, 2000);
                                }
                            },
                            error: function (xhr) {
                                swal('Error!', xhr.responseJSON.message || 'Failed to delete banner', 'error');
                            }
                        });
                    }
                });
            });

            // Toggle Status
            $(document).on('change', '.status-toggle', function () {
                var bannerId = $(this).data('id');
                var status = $(this).is(':checked') ? 'active' : 'inactive';

                $.ajax({
                    url: `/admin/banners/${bannerId}/status`,
                    type: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status
                    },
                    success: function (response) {
                        if (response.success) {
                            swal({
                                title: 'Success!',
                                text: response.message,
                                type: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            });
                            setTimeout(function () {
                                location.reload();
                            }, 1500);
                        }
                    },
                    error: function (xhr) {
                        swal('Error!', xhr.responseJSON.message || 'Failed to update status', 'error');
                        location.reload();
                    }
                });
            });

            // Image Preview
            $('#image').change(function () {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imagePreview').html(`
                            <div class="card">
                                <img src="${e.target.result}" class="card-img-top" alt="Preview">
                                <div class="card-body p-2">
                                    <small class="text-muted">Preview</small>
                                </div>
                            </div>
                        `);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    });
</script>
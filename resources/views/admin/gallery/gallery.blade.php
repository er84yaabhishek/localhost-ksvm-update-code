@extends('admin.layout.app')

@section('content')



    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Gallery</h4>
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
                            <a href="#">Gallery</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card-title d-inline-block">Gallery</div>
                                    </div>
                                    <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                                        <a href="{{ route('admin.gallery.add') }}"
                                            class="btn btn-primary float-right btn-sm"><i class="fas fa-plus"></i> Add
                                            Gallery</a>
                                        <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete"
                                            data-href=""><i class="flaticon-interface-5"></i> Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped mt-3" id="basic-datatables">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            <input type="checkbox" class="bulk-check" data-val="all">
                                                        </th>
                                                        <th scope="col">Image</th>
                                                         <th scope="col">Video</th>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col" width="15%">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($gallery->count() > 0)
                                                        @foreach($gallery as $item)
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox" class="check" data-val="{{ $item->id }}">
                                                                </td>
                                                                <td>
                                                                        <img src="{{ public_asset('images/' . $item->image) }}" alt="" width="100">
                                                                        <small class="d-block text-muted"><i class="fas fa-image"></i> Image</small>
                                                                   
                                                                </td>
                                                                <td>
                                                                    
                                                                        <video width="100" height="60" controls>
                                                                            <source src="{{ public_asset('images/' . $item->video) }}" type="video/{{ pathinfo($item->video, PATHINFO_EXTENSION) }}">
                                                                        </video>
                                                                         <small class="d-block text-muted"><i class="fas fa-video"></i> Video</small>
                                                                  
                                                                </td>
                                                                <td>{{ $item->title }}</td>
                                                                <td>
                                                                    <span class="badge badge-{{ $item->status == 1 ? 'success' : 'danger' }}">{{ $item->status == 1 ? 'Active' : 'Inactive' }}</span>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('admin.gallery.edit', $item->id)}}"
                                                                        class="btn btn-primary btn-sm mr-1">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                   <form class="d-inline-block"
                                                                        action="{{ route('admin.gallery.delete') }}"
                                                                        method="post" id="deleteForm">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $item->id }}">
                                                                        <button type="button" class="btn btn-danger btn-sm"
                                                                            onclick="showConfirmModal();">
                                                                            <span class="btn-label">
                                                                                <i class="fas fa-trash"></i>
                                                                            </span>
                                                                            Delete</button>
                                                                    </form>
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
                    Are you sure you want to delete this Gallery?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        onclick="hideConfirmModal();">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="deleteItem();">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function changeStatus(val, id) {
            $.ajax({
                url: "", // Use Laravel's route helper
                type: 'POST',
                data: {
                    val: val,
                    id: id,
                    _token: "{{ csrf_token() }}" // Ensure CSRF token is included
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}" // CSRF token in headers
                },
                success: function (response) {
                    bootnotify('Item Status Updated Successfully!', 'Item Status!', 'success');
                    loadWindow();
                },
                error: function (xhr) {
                    // Handle validation errors
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            bootnotify(value[0], 'Item Status!', 'danger');
                        });
                    } else {
                        bootnotify('Something went wrong!', 'Error!', 'danger');
                    }
                }
            });
        }

        function showConfirmModal() {
            $('#confirmModal').modal('show');
        }

        function hideConfirmModal() {
            $('#confirmModal').modal('hide');
        }

        function deleteItem() {
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
                        bootnotify('Gallery Delete Successfully!', 'Gallery Delete!', 'success');
                        loadWindow();
                    }
                },
                error: function (xhr, status, error) {
                    bootnotify('Falied Gallery Delete', 'Gallery Delete!', 'danger')
                }
            });
        }
    </script>
@endsection
@extends('admin.layout.app')

@section('content')



    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Admission News</h4>
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
                            <a href="#">Admission News Management</a>
                        </li>
                        <li class="separator">
                            <i class="fa fa-arrow-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Admission News</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card-title d-inline-block">Admission News</div>
                                    </div>
                                    <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                                        <a href="{{ route('admin.admission.add') }}"
                                            class="btn btn-primary float-right btn-sm"><i class="fas fa-plus"></i> Add
                                            Admission News</a>
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
                                                        <th scope="col">Admission For</th>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Priority</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col" width="15%">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(count($admission) > 0)
                                                        @foreach($admission as $news)
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox" class="bulk-check"
                                                                        data-val="{{ $news->id }}">
                                                                </td>
                                                                <td>{{ $news->admission_for }}</td>
                                                                <td>{{ $news->title }}</td>
                                                                <td>{{ $news->priority }}</td>
                                                                <td>
                                                                    <input type="checkbox" data-toggle="toggle"
                                                                        onchange="changeStatus(this.checked, {{ $news->id }})"
                                                                        {{ ($news->status == 'active') ? 'checked data-onstyle="success"  data-on="Active"' : 'data-off="Inactive" data-offstyle="danger"' }}>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-info btn-sm"
                                                                        href="{{ route('admin.admission.edit', $news->id)}}">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <form class="d-inline-block"
                                                                        action="{{ route('admin.admission.delete') }}"
                                                                        method="post" id="deleteForm">
                                                                        @csrf
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $news->id }}">
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm"
                                                                            onclick="showConfirmModal();">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="5" class="text-center">No admission news found.</td>
                                                        </tr>
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
                    Are you sure you want to delete this admission news?
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
                    bootnotify('Admission Status Updated Successfully!', 'Admission Status!', 'success');
                    loadWindow();
                },
                error: function (xhr) {
                    // Handle validation errors
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            bootnotify(value[0], 'Admission Status!', 'danger');
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
                        bootnotify('Admission Delete Successfully!', 'Admission Delete!', 'success');
                        loadWindow();
                    }
                },
                error: function (xhr, status, error) {
                    bootnotify('Falied Admission Delete', 'Admission Delete!', 'danger')
                }
            });
        }
    </script>
@endsection
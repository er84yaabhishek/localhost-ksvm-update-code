@extends('admin.layout.app')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Our Strength</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Home Page</li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Our Strength</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title mb-0">Our Strength Items</h4>
                                <p class="card-category mb-0">Home page par "Our Strength" section ke cards</p>
                            </div>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">
                                <i class="fas fa-plus"></i> Add New Item
                            </button>
                        </div>
                        <div class="card-body">
                            <div id="alertBox"></div>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="25%">Title</th>
                                            <th width="45%">Description</th>
                                            <th width="10%">Order</th>
                                            <th width="10%">Status</th>
                                            <th width="15%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        @forelse($items as $item)
                                        <tr id="row-{{ $item->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong>{{ $item->title }}</strong></td>
                                            <td>{{ Str::limit($item->description, 80) }}</td>
                                            <td><span class="badge badge-secondary">{{ $item->order }}</span></td>
                                            <td>
                                                @if($item->status)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm editBtn" data-id="{{ $item->id }}" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $item->id }}" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr id="emptyRow">
                                            <td colspan="6" class="text-center text-muted py-4">
                                                <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                                Koi item nahi hai. "Add New Item" button se add karo.
                                            </td>
                                        </tr>
                                        @endforelse
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

{{-- Add Modal --}}
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-plus-circle"></i> Add Our Strength Item</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form id="addForm">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="addTitle" class="form-control" placeholder="e.g. Our Excellence">
                        <div class="invalid-feedback" id="addTitleError"></div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="addDescription" class="form-control" rows="3" placeholder="Short description..."></textarea>
                        <div class="invalid-feedback" id="addDescError"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Display Order</label>
                                <input type="number" name="order" id="addOrder" class="form-control" value="0" min="0">
                                <small class="text-muted">Chhota number pehle dikhega</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Status</label>
                                <select name="status" id="addStatus" class="form-control">
                                    <option value="1">Active (Dikhega)</option>
                                    <option value="0">Inactive (Nahi Dikhega)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary" id="addBtn"><i class="fas fa-save"></i> Save Item</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit Modal --}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Item</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form id="editForm">
                @csrf
                <input type="hidden" id="editId">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="editTitle" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="editDescription" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Display Order</label>
                                <input type="number" name="order" id="editOrder" class="form-control" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Status</label>
                                <select name="status" id="editStatus" class="form-control">
                                    <option value="1">Active (Dikhega)</option>
                                    <option value="0">Inactive (Nahi Dikhega)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-info" id="editBtn"><i class="fas fa-save"></i> Update Item</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {

    var STORE_URL  = '{{ route("admin.homepage.strength.store") }}';
    var BASE_URL   = '{{ url("admin/homepage/our-strength") }}';
    var CSRF_TOKEN = '{{ csrf_token() }}';

    // ---- ADD ----
    $('#addForm').on('submit', function(e) {
        e.preventDefault();
        var btn = $('#addBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');

        $.ajax({
            url: STORE_URL,
            type: 'POST',
            data: $(this).serialize(),
            headers: { 'X-CSRF-TOKEN': CSRF_TOKEN },
            success: function(res) {
                if (res.success) {
                    $('#addModal').modal('hide');
                    $('#addForm')[0].reset();
                    showAlert('success', res.message);
                    setTimeout(function(){ location.reload(); }, 800);
                }
            },
            error: function(xhr) {
                showErrors(xhr);
            },
            complete: function() {
                btn.prop('disabled', false).html('<i class="fas fa-save"></i> Save Item');
            }
        });
    });

    // ---- LOAD EDIT ----
    $(document).on('click', '.editBtn', function() {
        var id = $(this).data('id');
        $('#editModal').modal('show');
        $('#editId').val('');
        $('#editTitle').val('Loading...');

        $.ajax({
            url: BASE_URL + '/' + id,
            type: 'GET',
            headers: { 'X-CSRF-TOKEN': CSRF_TOKEN },
            success: function(res) {
                if (res.success) {
                    $('#editId').val(res.data.id);
                    $('#editTitle').val(res.data.title);
                    $('#editDescription').val(res.data.description);
                    $('#editOrder').val(res.data.order);
                    $('#editStatus').val(res.data.status ? '1' : '0');
                }
            },
            error: function() {
                showAlert('danger', 'Failed to load item data.');
                $('#editModal').modal('hide');
            }
        });
    });

    // ---- UPDATE ----
    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        var id  = $('#editId').val();
        var btn = $('#editBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Updating...');

        $.ajax({
            url: BASE_URL + '/' + id,
            type: 'POST',
            data: $(this).serialize(),
            headers: { 'X-CSRF-TOKEN': CSRF_TOKEN },
            success: function(res) {
                if (res.success) {
                    $('#editModal').modal('hide');
                    showAlert('success', res.message);
                    setTimeout(function(){ location.reload(); }, 800);
                }
            },
            error: function(xhr) {
                showErrors(xhr);
            },
            complete: function() {
                btn.prop('disabled', false).html('<i class="fas fa-save"></i> Update Item');
            }
        });
    });

    // ---- DELETE ----
    $(document).on('click', '.deleteBtn', function() {
        var id = $(this).data('id');
        if (!confirm('Kya aap sure hain? Yeh item delete ho jayega.')) return;

        $.ajax({
            url: BASE_URL + '/' + id,
            type: 'POST',
            data: { _token: CSRF_TOKEN, _method: 'DELETE' },
            headers: { 'X-CSRF-TOKEN': CSRF_TOKEN },
            success: function(res) {
                if (res.success) {
                    $('#row-' + id).fadeOut(400, function(){ $(this).remove(); });
                    showAlert('success', res.message);
                }
            },
            error: function() {
                showAlert('danger', 'Delete failed. Please try again.');
            }
        });
    });

    // ---- HELPERS ----
    function showAlert(type, msg) {
        var icon = type === 'success' ? 'fa-check-circle' : 'fa-times-circle';
        var label = type === 'success' ? 'Success!' : 'Error!';
        $('#alertBox').html(
            '<div class="alert alert-' + type + ' alert-dismissible fade show">' +
            '<strong><i class="fas ' + icon + '"></i> ' + label + '</strong> ' + msg +
            ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>'
        );
        $('html, body').animate({ scrollTop: 0 }, 400);
    }

    function showErrors(xhr) {
        var msg = 'Something went wrong.';
        if (xhr.responseJSON) {
            if (xhr.responseJSON.errors) {
                msg = Object.values(xhr.responseJSON.errors).flat().join('<br>');
            } else if (xhr.responseJSON.message) {
                msg = xhr.responseJSON.message;
            }
        }
        showAlert('danger', msg);
    }

});
</script>
@endpush

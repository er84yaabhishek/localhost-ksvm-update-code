@extends('admin.layout.app')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Core Values</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">About Us</li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Core Values</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title mb-0">Core Values Cards</h4>
                                <p class="card-category mb-0">About Us page par "Core Values" section ke cards</p>
                            </div>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">
                                <i class="fas fa-plus"></i> Add New Value
                            </button>
                        </div>
                        <div class="card-body">
                            <div id="alertBox"></div>

                            @if($items->count() === 0)
                            <div class="text-center py-3 mb-3">
                                <button class="btn btn-outline-primary" id="addDefaultBtn">
                                    <i class="fas fa-magic"></i> Default Values Add Karo (One Click)
                                </button>
                            </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="15%">Icon</th>
                                            <th width="20%">Title</th>
                                            <th width="40%">Description</th>
                                            <th width="7%">Order</th>
                                            <th width="8%">Status</th>
                                            <th width="10%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($items as $item)
                                        <tr id="row-{{ $item->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <i class="{{ $item->icon }} fa-lg" style="color:#7a1a58;"></i>
                                                <small class="d-block text-muted">{{ $item->icon }}</small>
                                            </td>
                                            <td><strong>{{ $item->title }}</strong></td>
                                            <td>{{ Str::limit($item->description, 70) }}</td>
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
                                            <td colspan="7" class="text-center text-muted py-4">
                                                <i class="fas fa-star fa-2x mb-2 d-block"></i>
                                                Koi value nahi hai. "Add New Value" se add karo.
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-3">
                                <a href="{{ route('admin.about.settings') }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-arrow-left"></i> Back to About Us Settings
                                </a>
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
                <h5 class="modal-title"><i class="fas fa-plus-circle"></i> Add Core Value</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form id="addForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="font-weight-bold">Font Awesome Icon Class <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="icon" id="addIcon" class="form-control"
                                        placeholder="e.g. fas fa-book-open" value="fas fa-star"
                                        oninput="document.getElementById('iconPreview').className = this.value + ' fa-2x'">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i id="iconPreview" class="fas fa-star fa-2x" style="color:#7a1a58;"></i>
                                        </span>
                                    </div>
                                </div>
                                <small class="text-muted">
                                    Font Awesome icons: fas fa-book-open, fas fa-hands, fas fa-shield-alt, fas fa-star, fas fa-heart, fas fa-users, fas fa-graduation-cap, fas fa-trophy
                                </small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Quick Icons</label>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach(['fas fa-book-open','fas fa-hands','fas fa-shield-alt','fas fa-star','fas fa-heart','fas fa-users','fas fa-graduation-cap','fas fa-trophy','fas fa-lightbulb','fas fa-leaf'] as $ic)
                                    <button type="button" class="btn btn-sm btn-outline-secondary icon-pick-btn"
                                        data-icon="{{ $ic }}" title="{{ $ic }}"
                                        style="padding:6px 10px;">
                                        <i class="{{ $ic }}"></i>
                                    </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="e.g. Education">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control" rows="3"
                                    placeholder="Short description..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Order</label>
                                <input type="number" name="order" class="form-control" value="{{ $items->count() + 1 }}" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Active (Dikhega)</option>
                                    <option value="0">Inactive (Nahi Dikhega)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="addBtn"><i class="fas fa-save"></i> Save</button>
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
                <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Core Value</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form id="editForm">
                @csrf
                <input type="hidden" id="editId">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="font-weight-bold">Icon Class <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="icon" id="editIcon" class="form-control"
                                        oninput="document.getElementById('editIconPreview').className = this.value + ' fa-2x'">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i id="editIconPreview" class="fas fa-star fa-2x" style="color:#7a1a58;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Quick Icons</label>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach(['fas fa-book-open','fas fa-hands','fas fa-shield-alt','fas fa-star','fas fa-heart','fas fa-users','fas fa-graduation-cap','fas fa-trophy','fas fa-lightbulb','fas fa-leaf'] as $ic)
                                    <button type="button" class="btn btn-sm btn-outline-secondary edit-icon-pick-btn"
                                        data-icon="{{ $ic }}" title="{{ $ic }}"
                                        style="padding:6px 10px;">
                                        <i class="{{ $ic }}"></i>
                                    </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="editTitle" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="editDescription" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Order</label>
                                <input type="number" name="order" id="editOrder" class="form-control" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Status</label>
                                <select name="status" id="editStatus" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info" id="editBtn"><i class="fas fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    var STORE_URL = '{{ route("admin.about.values.store") }}';
    var BASE_URL  = '{{ url("admin/about-us/core-values") }}';
    var CSRF      = '{{ csrf_token() }}';

    // Default values
    var defaults = [
        { icon:'fas fa-book-open', title:'Education',   description:'Building strong academic understanding and learning habits for lifelong success.', order:1, status:1 },
        { icon:'fas fa-hands',     title:'Manners',     description:'Developing positive behaviour, respect, and values in every student.',            order:2, status:1 },
        { icon:'fas fa-shield-alt',title:'Discipline',  description:'Creating self-control, focus and responsibility in students.',                    order:3, status:1 },
        { icon:'fas fa-star',      title:'Excellence',  description:'Striving for the highest standard in academics and behaviour.',                   order:4, status:1 },
    ];

    // One-click defaults
    $('#addDefaultBtn').on('click', function() {
        if (!confirm('4 default core values add karein?')) return;
        var btn = $(this);
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Adding...');
        var promises = defaults.map(function(d) {
            return $.ajax({ url: STORE_URL, type: 'POST', data: $.extend({ _token: CSRF }, d), headers: { 'X-CSRF-TOKEN': CSRF } });
        });
        $.when.apply($, promises).then(function() {
            showAlert('success', 'Default values add ho gaye!');
            setTimeout(function() { location.reload(); }, 800);
        }).fail(function() {
            btn.prop('disabled', false).html('<i class="fas fa-magic"></i> Default Values Add Karo');
            showAlert('danger', 'Kuch error aaya. Try again.');
        });
    });

    // Icon quick pick (add modal)
    $(document).on('click', '.icon-pick-btn', function() {
        var ic = $(this).data('icon');
        $('#addIcon').val(ic);
        $('#iconPreview').attr('class', ic + ' fa-2x');
    });

    // Icon quick pick (edit modal)
    $(document).on('click', '.edit-icon-pick-btn', function() {
        var ic = $(this).data('icon');
        $('#editIcon').val(ic);
        $('#editIconPreview').attr('class', ic + ' fa-2x');
    });

    // ADD
    $('#addForm').on('submit', function(e) {
        e.preventDefault();
        var btn = $('#addBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');
        $.ajax({
            url: STORE_URL, type: 'POST', data: $(this).serialize(),
            headers: { 'X-CSRF-TOKEN': CSRF },
            success: function(res) {
                if (res.success) { $('#addModal').modal('hide'); $('#addForm')[0].reset(); showAlert('success', res.message); setTimeout(function() { location.reload(); }, 800); }
            },
            error: function(xhr) { showErrors(xhr); },
            complete: function() { btn.prop('disabled', false).html('<i class="fas fa-save"></i> Save'); }
        });
    });

    // LOAD EDIT
    $(document).on('click', '.editBtn', function() {
        var id = $(this).data('id');
        $('#editModal').modal('show');
        $.ajax({
            url: BASE_URL + '/' + id, type: 'GET', headers: { 'X-CSRF-TOKEN': CSRF },
            success: function(res) {
                if (res.success) {
                    $('#editId').val(res.data.id);
                    $('#editIcon').val(res.data.icon);
                    $('#editIconPreview').attr('class', res.data.icon + ' fa-2x');
                    $('#editTitle').val(res.data.title);
                    $('#editDescription').val(res.data.description);
                    $('#editOrder').val(res.data.order);
                    $('#editStatus').val(res.data.status ? '1' : '0');
                }
            }
        });
    });

    // UPDATE
    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        var id = $('#editId').val();
        var btn = $('#editBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Updating...');
        $.ajax({
            url: BASE_URL + '/' + id, type: 'POST', data: $(this).serialize(),
            headers: { 'X-CSRF-TOKEN': CSRF },
            success: function(res) {
                if (res.success) { $('#editModal').modal('hide'); showAlert('success', res.message); setTimeout(function() { location.reload(); }, 800); }
            },
            error: function(xhr) { showErrors(xhr); },
            complete: function() { btn.prop('disabled', false).html('<i class="fas fa-save"></i> Update'); }
        });
    });

    // DELETE
    $(document).on('click', '.deleteBtn', function() {
        var id = $(this).data('id');
        if (!confirm('Kya aap sure hain? Yeh value delete ho jayegi.')) return;
        $.ajax({
            url: BASE_URL + '/' + id, type: 'POST',
            data: { _token: CSRF, _method: 'DELETE' },
            headers: { 'X-CSRF-TOKEN': CSRF },
            success: function(res) {
                if (res.success) { $('#row-' + id).fadeOut(400, function() { $(this).remove(); }); showAlert('success', res.message); }
            },
            error: function() { showAlert('danger', 'Delete failed.'); }
        });
    });

    function showAlert(type, msg) {
        var icon = type === 'success' ? 'fa-check-circle' : 'fa-times-circle';
        $('#alertBox').html('<div class="alert alert-' + type + ' alert-dismissible fade show"><strong><i class="fas ' + icon + '"></i></strong> ' + msg + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
        $('html, body').animate({ scrollTop: 0 }, 400);
    }
    function showErrors(xhr) {
        var msg = xhr.responseJSON && xhr.responseJSON.errors
            ? Object.values(xhr.responseJSON.errors).flat().join('<br>')
            : (xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Something went wrong.');
        showAlert('danger', msg);
    }
});
</script>
@endpush

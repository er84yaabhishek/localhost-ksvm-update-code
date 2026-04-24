@extends('admin.layout.app')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Courses — Discipline Rules</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Courses</li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Discipline Rules</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title mb-0">Code of Discipline Rules</h4>
                                <p class="card-category mb-0">Courses page par discipline rules manage karo</p>
                            </div>
                            <div>
                                <button class="btn btn-success btn-sm mr-2" id="addDefaultBtn">
                                    <i class="fas fa-magic"></i> Default Rules Add
                                </button>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">
                                    <i class="fas fa-plus"></i> Add Rule
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="alertBox"></div>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="65%">Rule</th>
                                            <th width="10%">Order</th>
                                            <th width="10%">Status</th>
                                            <th width="10%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($rules as $rule)
                                        <tr id="row-{{ $rule->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ Str::limit($rule->rule, 100) }}</td>
                                            <td><span class="badge badge-secondary">{{ $rule->order }}</span></td>
                                            <td>
                                                @if($rule->status)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm editBtn" data-id="{{ $rule->id }}"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $rule->id }}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr id="emptyRow">
                                            <td colspan="5" class="text-center text-muted py-4">
                                                <i class="fas fa-shield-alt fa-2x mb-2 d-block"></i>
                                                Koi rule nahi hai. Add karo.
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('admin.courses.classes') }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-arrow-left"></i> Back to Classes
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
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Add Discipline Rule</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form id="addForm">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Rule <span class="text-danger">*</span></label>
                        <textarea name="rule" class="form-control" rows="3" placeholder="Enter discipline rule..."></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Order</label>
                                <input type="number" name="order" class="form-control" value="{{ $rules->count() + 1 }}" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
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
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title">Edit Rule</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form id="editForm">
                @csrf
                <input type="hidden" id="editId">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Rule <span class="text-danger">*</span></label>
                        <textarea name="rule" id="editRule" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="row">
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
    var STORE_URL = '{{ route("admin.courses.discipline.store") }}';
    var BASE_URL  = '{{ url("admin/courses-manage/discipline") }}';
    var CSRF      = '{{ csrf_token() }}';

    var defaultRules = [
        'Students are expected to come in proper school uniform. Neatness and cleanliness will be encouraged.',
        'Regularity in attendance is must. A student must get permission of the Class Teacher or Principal in case of leave.',
        'If a student is absent for more than ten consecutive days without permission, his/her name is liable to be struck off.',
        'Students suffering from contagious disease are not allowed to attend school without medical fitness.',
        'Misbehavior with teachers or abusive conduct will be dealt with severity.',
        'Damage to school property will be charged to parents.',
        'If a student is called for an extra class or activity, he/she must be present without fail.',
    ];

    $('#addDefaultBtn').on('click', function() {
        if (!confirm('7 default discipline rules add karein?')) return;
        var btn = $(this);
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Adding...');
        var i = 0;
        function addNext() {
            if (i >= defaultRules.length) { showAlert('success', 'Default rules add ho gaye!'); setTimeout(function() { location.reload(); }, 800); return; }
            $.ajax({ url: STORE_URL, type: 'POST', data: { _token: CSRF, rule: defaultRules[i], order: i + 1, status: 1 }, headers: { 'X-CSRF-TOKEN': CSRF },
                success: function() { i++; addNext(); },
                error: function() { btn.prop('disabled', false).html('<i class="fas fa-magic"></i> Default Rules Add'); showAlert('danger', 'Error occurred.'); }
            });
        }
        addNext();
    });

    $('#addForm').on('submit', function(e) {
        e.preventDefault();
        var btn = $('#addBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');
        $.ajax({
            url: STORE_URL, type: 'POST', data: $(this).serialize(), headers: { 'X-CSRF-TOKEN': CSRF },
            success: function(res) { if (res.success) { $('#addModal').modal('hide'); $('#addForm')[0].reset(); showAlert('success', res.message); setTimeout(function() { location.reload(); }, 800); } },
            error: function(xhr) { showErrors(xhr); },
            complete: function() { btn.prop('disabled', false).html('<i class="fas fa-save"></i> Save'); }
        });
    });

    $(document).on('click', '.editBtn', function() {
        var id = $(this).data('id');
        $('#editModal').modal('show');
        $.ajax({ url: BASE_URL + '/' + id, type: 'GET', headers: { 'X-CSRF-TOKEN': CSRF },
            success: function(res) {
                if (res.success) { $('#editId').val(res.data.id); $('#editRule').val(res.data.rule); $('#editOrder').val(res.data.order); $('#editStatus').val(res.data.status ? '1' : '0'); }
            }
        });
    });

    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        var id = $('#editId').val();
        var btn = $('#editBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Updating...');
        $.ajax({
            url: BASE_URL + '/' + id, type: 'POST', data: $(this).serialize(), headers: { 'X-CSRF-TOKEN': CSRF },
            success: function(res) { if (res.success) { $('#editModal').modal('hide'); showAlert('success', res.message); setTimeout(function() { location.reload(); }, 800); } },
            error: function(xhr) { showErrors(xhr); },
            complete: function() { btn.prop('disabled', false).html('<i class="fas fa-save"></i> Update'); }
        });
    });

    $(document).on('click', '.deleteBtn', function() {
        var id = $(this).data('id');
        if (!confirm('Kya aap sure hain?')) return;
        $.ajax({
            url: BASE_URL + '/' + id, type: 'POST', data: { _token: CSRF, _method: 'DELETE' }, headers: { 'X-CSRF-TOKEN': CSRF },
            success: function(res) { if (res.success) { $('#row-' + id).fadeOut(400, function() { $(this).remove(); }); showAlert('success', res.message); } },
            error: function() { showAlert('danger', 'Delete failed.'); }
        });
    });

    function showAlert(type, msg) {
        var icon = type === 'success' ? 'fa-check-circle' : 'fa-times-circle';
        $('#alertBox').html('<div class="alert alert-' + type + ' alert-dismissible fade show"><strong><i class="fas ' + icon + '"></i></strong> ' + msg + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
        $('html, body').animate({ scrollTop: 0 }, 400);
    }
    function showErrors(xhr) {
        var msg = xhr.responseJSON && xhr.responseJSON.errors ? Object.values(xhr.responseJSON.errors).flat().join('<br>') : 'Something went wrong.';
        showAlert('danger', msg);
    }
});
</script>
@endpush

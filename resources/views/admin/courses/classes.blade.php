@extends('admin.layout.app')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Courses — Class Groups</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Courses</li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Class Groups</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title mb-0">Class Groups & Subjects</h4>
                                <p class="card-category mb-0">Courses page par curriculum cards manage karo</p>
                            </div>
                            <div>
                                <button class="btn btn-success btn-sm mr-2" id="addDefaultBtn">
                                    <i class="fas fa-magic"></i> Default Classes Add
                                </button>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">
                                    <i class="fas fa-plus"></i> Add New Class
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
                                            <th width="5%">Color</th>
                                            <th width="10%">Icon</th>
                                            <th width="20%">Class Label</th>
                                            <th width="35%">Subjects</th>
                                            <th width="7%">Order</th>
                                            <th width="8%">Status</th>
                                            <th width="10%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($classes as $cls)
                                        <tr id="row-{{ $cls->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div style="width:28px;height:28px;border-radius:6px;background:{{ $cls->color }};"></div>
                                            </td>
                                            <td>
                                                <i class="{{ $cls->icon }}" style="color:{{ $cls->color }};font-size:18px;"></i>
                                            </td>
                                            <td><strong>{{ $cls->label }}</strong></td>
                                            <td>
                                                <div style="max-height:60px;overflow:hidden;">
                                                    @foreach($cls->allSubjects as $sub)
                                                    <span class="badge badge-light border mr-1 mb-1">{{ $sub->subject_name }}</span>
                                                    @endforeach
                                                </div>
                                                <small class="text-muted">{{ $cls->allSubjects->count() }} subjects</small>
                                            </td>
                                            <td><span class="badge badge-secondary">{{ $cls->order }}</span></td>
                                            <td>
                                                @if($cls->status)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm editBtn" data-id="{{ $cls->id }}" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $cls->id }}" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr id="emptyRow">
                                            <td colspan="8" class="text-center text-muted py-4">
                                                <i class="fas fa-book fa-2x mb-2 d-block"></i>
                                                Koi class nahi hai. "Default Classes Add" ya "Add New Class" se add karo.
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
                <h5 class="modal-title"><i class="fas fa-plus-circle"></i> Add Class Group</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form id="addForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Class Label <span class="text-danger">*</span></label>
                                <input type="text" name="label" class="form-control" placeholder="e.g. Class I – III">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold">Icon Class</label>
                                <input type="text" name="icon" id="addIcon" class="form-control" value="fas fa-book"
                                    oninput="$('#addIconPreview').attr('class', this.value)">
                                <div class="mt-1"><i id="addIconPreview" class="fas fa-book fa-lg" style="color:#7a1a58;"></i></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold">Card Color</label>
                                <input type="color" name="color" class="form-control" value="#7a1a58" style="height:42px;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Order</label>
                                <input type="number" name="order" class="form-control" value="{{ $classes->count() + 1 }}" min="0">
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Subjects <small class="text-muted">(ek line mein ek subject)</small></label>
                                <div id="addSubjectsList">
                                    <div class="input-group mb-2">
                                        <input type="text" name="subjects[]" class="form-control" placeholder="Subject name">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-success add-subject-btn"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
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
                <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Class Group</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form id="editForm">
                @csrf
                <input type="hidden" id="editId">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Class Label <span class="text-danger">*</span></label>
                                <input type="text" name="label" id="editLabel" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold">Icon Class</label>
                                <input type="text" name="icon" id="editIcon" class="form-control"
                                    oninput="$('#editIconPreview').attr('class', this.value)">
                                <div class="mt-1"><i id="editIconPreview" class="fas fa-book fa-lg" style="color:#7a1a58;"></i></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold">Card Color</label>
                                <input type="color" name="color" id="editColor" class="form-control" style="height:42px;">
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Subjects</label>
                                <div id="editSubjectsList"></div>
                                <button type="button" class="btn btn-sm btn-outline-success mt-2" id="addEditSubjectBtn">
                                    <i class="fas fa-plus"></i> Add Subject
                                </button>
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
    var STORE_URL = '{{ route("admin.courses.classes.store") }}';
    var BASE_URL  = '{{ url("admin/courses-manage/classes") }}';
    var CSRF      = '{{ csrf_token() }}';

    // Default classes data
    var defaults = [
        { label:'P.G. / L.K.G. / U.K.G.', icon:'fas fa-child',      color:'#4A90D9', order:1, status:1, subjects:['English','Hindi','Maths','E.V.S','Poem Recitation','Computer'] },
        { label:'Class I – III',           icon:'fas fa-pencil-alt', color:'#E67E22', order:2, status:1, subjects:['English','Hindi','Maths','E.V.S','Computer','G.K.'] },
        { label:'Class IV – VIII',         icon:'fas fa-book',       color:'#27AE60', order:3, status:1, subjects:['English','Hindi','Maths','Science','Social Science','Computer','Sanskrit','G.K.'] },
        { label:'Class IX – X',            icon:'fas fa-flask',      color:'#8E44AD', order:4, status:1, subjects:['English','Hindi','Maths','Science','Social Science','Computer / Geometrical Art'] },
        { label:'Class XI – XII',          icon:'fas fa-atom',       color:'#C0392B', order:5, status:1, subjects:['English','Hindi','Physics','Chemistry','Maths / Biology'] },
        { label:'Co-Curricular Skills',    icon:'fas fa-palette',    color:'#16A085', order:6, status:1, subjects:['Art & Craft','Music','Dance','Physical Education','Value Education'] },
    ];

    // Add subject row (add modal)
    $(document).on('click', '.add-subject-btn', function() {
        $('#addSubjectsList').append('<div class="input-group mb-2"><input type="text" name="subjects[]" class="form-control" placeholder="Subject name"><div class="input-group-append"><button type="button" class="btn btn-danger remove-subject-btn"><i class="fas fa-times"></i></button></div></div>');
    });
    $(document).on('click', '.remove-subject-btn', function() { $(this).closest('.input-group').remove(); });

    // Add subject row (edit modal)
    $('#addEditSubjectBtn').on('click', function() {
        $('#editSubjectsList').append('<div class="input-group mb-2"><input type="text" name="subjects[]" class="form-control" placeholder="Subject name"><div class="input-group-append"><button type="button" class="btn btn-danger remove-subject-btn"><i class="fas fa-times"></i></button></div></div>');
    });

    // One-click defaults
    $('#addDefaultBtn').on('click', function() {
        if (!confirm('6 default class groups add karein?')) return;
        var btn = $(this);
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Adding...');
        var i = 0;
        function addNext() {
            if (i >= defaults.length) { showAlert('success', 'Default classes add ho gaye!'); setTimeout(function() { location.reload(); }, 800); return; }
            var d = defaults[i++];
            var data = { _token: CSRF, label: d.label, icon: d.icon, color: d.color, order: d.order, status: d.status };
            d.subjects.forEach(function(s, idx) { data['subjects[' + idx + ']'] = s; });
            $.ajax({ url: STORE_URL, type: 'POST', data: data, headers: { 'X-CSRF-TOKEN': CSRF },
                success: function() { addNext(); },
                error: function() { showAlert('danger', 'Error adding ' + d.label); btn.prop('disabled', false).html('<i class="fas fa-magic"></i> Default Classes Add'); }
            });
        }
        addNext();
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
                    var d = res.data;
                    $('#editId').val(d.id);
                    $('#editLabel').val(d.label);
                    $('#editIcon').val(d.icon);
                    $('#editIconPreview').attr('class', d.icon + ' fa-lg');
                    $('#editColor').val(d.color);
                    $('#editOrder').val(d.order);
                    $('#editStatus').val(d.status ? '1' : '0');
                    // Load subjects
                    $('#editSubjectsList').empty();
                    if (d.all_subjects && d.all_subjects.length) {
                        d.all_subjects.forEach(function(s) {
                            $('#editSubjectsList').append('<div class="input-group mb-2"><input type="text" name="subjects[]" class="form-control" value="' + s.subject_name + '"><div class="input-group-append"><button type="button" class="btn btn-danger remove-subject-btn"><i class="fas fa-times"></i></button></div></div>');
                        });
                    }
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
        if (!confirm('Kya aap sure hain? Class aur uske saare subjects delete ho jayenge.')) return;
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
        var msg = xhr.responseJSON && xhr.responseJSON.errors ? Object.values(xhr.responseJSON.errors).flat().join('<br>') : (xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Something went wrong.');
        showAlert('danger', msg);
    }
});
</script>
@endpush

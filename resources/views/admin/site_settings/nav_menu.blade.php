@extends('admin.layout.app')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Navigation Menu</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Site Settings</li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Navigation Menu</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title mb-0">Header Navigation Menu Items</h4>
                                <p class="card-category mb-0">Website ke upar wale menu ke links manage karo</p>
                            </div>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">
                                <i class="fas fa-plus"></i> Add Menu Item
                            </button>
                        </div>
                        <div class="card-body">
                            <div id="alertBox"></div>

                            <div class="alert alert-info">
                                <i class="fas fa-info-circle"></i>
                                <strong>Note:</strong> Agar yahan koi item nahi hai toh website par default hardcoded menu dikhega.
                                Items add karne ke baad website ka menu yahan se control hoga.
                                <strong>Order</strong> field se sequence set karo (1 = pehle, 2 = baad mein).
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="20%">Label (Text)</th>
                                            <th width="30%">URL</th>
                                            <th width="15%">Route Name</th>
                                            <th width="8%">Target</th>
                                            <th width="7%">Order</th>
                                            <th width="8%">Status</th>
                                            <th width="12%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($items as $item)
                                        <tr id="row-{{ $item->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong>{{ $item->label }}</strong></td>
                                            <td><code>{{ $item->url }}</code></td>
                                            <td><small class="text-muted">{{ $item->route ?? '-' }}</small></td>
                                            <td>
                                                @if($item->target === '_blank')
                                                    <span class="badge badge-info">New Tab</span>
                                                @else
                                                    <span class="badge badge-secondary">Same Tab</span>
                                                @endif
                                            </td>
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
                                            <td colspan="8" class="text-center text-muted py-4">
                                                <i class="fas fa-bars fa-2x mb-2 d-block"></i>
                                                Koi menu item nahi hai. "Add Menu Item" se add karo.
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{-- Quick Add Default Menu --}}
                            @if($items->count() === 0)
                            <div class="text-center mt-3">
                                <button class="btn btn-outline-primary" id="addDefaultMenuBtn">
                                    <i class="fas fa-magic"></i> Default Menu Items Add Karo (One Click)
                                </button>
                            </div>
                            @endif

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
                <h5 class="modal-title"><i class="fas fa-plus-circle"></i> Add Menu Item</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form id="addForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Label (Menu Text) <span class="text-danger">*</span></label>
                                <input type="text" name="label" class="form-control" placeholder="e.g. Home, About Us">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">URL <span class="text-danger">*</span></label>
                                <input type="text" name="url" class="form-control" placeholder="e.g. / or /aboutus or https://...">
                                <small class="text-muted">Internal: /aboutus | External: https://example.com</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Route Name <small class="text-muted">(optional)</small></label>
                                <input type="text" name="route" class="form-control" placeholder="e.g. home.index, home.aboutus">
                                <small class="text-muted">Active highlight ke liye (Laravel route name)</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Open In</label>
                                <select name="target" class="form-control">
                                    <option value="_self">Same Tab</option>
                                    <option value="_blank">New Tab</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Order</label>
                                <input type="number" name="order" class="form-control" value="{{ $items->count() + 1 }}" min="0">
                                <small class="text-muted">Chhota number = pehle dikhega</small>
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
                <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Menu Item</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form id="editForm">
                @csrf
                <input type="hidden" id="editId">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Label <span class="text-danger">*</span></label>
                                <input type="text" name="label" id="editLabel" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">URL <span class="text-danger">*</span></label>
                                <input type="text" name="url" id="editUrl" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Route Name</label>
                                <input type="text" name="route" id="editRoute" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Open In</label>
                                <select name="target" id="editTarget" class="form-control">
                                    <option value="_self">Same Tab</option>
                                    <option value="_blank">New Tab</option>
                                </select>
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
$(document).ready(function () {

    var STORE_URL  = '{{ route("admin.site.nav.store") }}';
    var BASE_URL   = '{{ url("admin/site-settings/nav-menu") }}';
    var CSRF_TOKEN = '{{ csrf_token() }}';

    // Default menu items
    var defaultItems = [
        { label: 'Home',       url: '/',            route: 'home.index',      target: '_self', order: 1, status: 1 },
        { label: 'About Us',   url: '/aboutus',     route: 'home.aboutus',    target: '_self', order: 2, status: 1 },
        { label: 'Courses',    url: '/courses',     route: 'home.courses',    target: '_self', order: 3, status: 1 },
        { label: 'Exam',       url: '/exam',        route: 'home.exam',       target: '_self', order: 4, status: 1 },
        { label: 'Admissions', url: '/admissions',  route: 'home.admissions', target: '_self', order: 5, status: 1 },
        { label: 'Gallery',    url: '/gallery',     route: 'home.gallery',    target: '_self', order: 6, status: 1 },
        { label: 'Events',     url: '/events',      route: 'home.events',     target: '_self', order: 7, status: 1 },
        { label: 'Contact',    url: '/contact',     route: 'home.contact',    target: '_self', order: 8, status: 1 },
    ];

    // One-click default menu
    $('#addDefaultMenuBtn').on('click', function () {
        if (!confirm('Yeh 8 default menu items add karega. Continue?')) return;
        var btn = $(this);
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Adding...');
        var promises = defaultItems.map(function (item) {
            return $.ajax({
                url: STORE_URL, type: 'POST',
                data: $.extend({ _token: CSRF_TOKEN }, item),
                headers: { 'X-CSRF-TOKEN': CSRF_TOKEN }
            });
        });
        $.when.apply($, promises).then(function () {
            showAlert('success', 'Default menu items add ho gaye!');
            setTimeout(function () { location.reload(); }, 800);
        }).fail(function () {
            showAlert('danger', 'Kuch items add nahi ho sake. Page reload karo.');
            btn.prop('disabled', false).html('<i class="fas fa-magic"></i> Default Menu Items Add Karo');
        });
    });

    // ADD
    $('#addForm').on('submit', function (e) {
        e.preventDefault();
        var btn = $('#addBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');
        $.ajax({
            url: STORE_URL, type: 'POST', data: $(this).serialize(),
            headers: { 'X-CSRF-TOKEN': CSRF_TOKEN },
            success: function (res) {
                if (res.success) {
                    $('#addModal').modal('hide');
                    $('#addForm')[0].reset();
                    showAlert('success', res.message);
                    setTimeout(function () { location.reload(); }, 800);
                }
            },
            error: function (xhr) { showErrors(xhr); },
            complete: function () { btn.prop('disabled', false).html('<i class="fas fa-save"></i> Save'); }
        });
    });

    // LOAD EDIT
    $(document).on('click', '.editBtn', function () {
        var id = $(this).data('id');
        $('#editModal').modal('show');
        $.ajax({
            url: BASE_URL + '/' + id, type: 'GET',
            headers: { 'X-CSRF-TOKEN': CSRF_TOKEN },
            success: function (res) {
                if (res.success) {
                    $('#editId').val(res.data.id);
                    $('#editLabel').val(res.data.label);
                    $('#editUrl').val(res.data.url);
                    $('#editRoute').val(res.data.route || '');
                    $('#editTarget').val(res.data.target || '_self');
                    $('#editOrder').val(res.data.order);
                    $('#editStatus').val(res.data.status ? '1' : '0');
                }
            }
        });
    });

    // UPDATE
    $('#editForm').on('submit', function (e) {
        e.preventDefault();
        var id = $('#editId').val();
        var btn = $('#editBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Updating...');
        $.ajax({
            url: BASE_URL + '/' + id, type: 'POST', data: $(this).serialize(),
            headers: { 'X-CSRF-TOKEN': CSRF_TOKEN },
            success: function (res) {
                if (res.success) {
                    $('#editModal').modal('hide');
                    showAlert('success', res.message);
                    setTimeout(function () { location.reload(); }, 800);
                }
            },
            error: function (xhr) { showErrors(xhr); },
            complete: function () { btn.prop('disabled', false).html('<i class="fas fa-save"></i> Update'); }
        });
    });

    // DELETE
    $(document).on('click', '.deleteBtn', function () {
        var id = $(this).data('id');
        if (!confirm('Kya aap sure hain? Yeh menu item delete ho jayega.')) return;
        $.ajax({
            url: BASE_URL + '/' + id, type: 'POST',
            data: { _token: CSRF_TOKEN, _method: 'DELETE' },
            headers: { 'X-CSRF-TOKEN': CSRF_TOKEN },
            success: function (res) {
                if (res.success) {
                    $('#row-' + id).fadeOut(400, function () { $(this).remove(); });
                    showAlert('success', res.message);
                }
            },
            error: function () { showAlert('danger', 'Delete failed.'); }
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

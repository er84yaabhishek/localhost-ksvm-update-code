@extends('admin.layout.app')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Banner Management</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Site Settings</li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Home Banners</li>
                </ul>
            </div>

            {{-- Alert Box --}}
            <div id="alertBox"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title mb-0">
                                    <i class="fas fa-images text-primary"></i> Home Page Banners
                                </h4>
                                <p class="card-category mb-0">
                                    Total: <strong>{{ count($banners) }}</strong> banners |
                                    Active: <strong>{{ $banners->where('status','active')->count() }}</strong>
                                </p>
                            </div>
                            <button class="btn btn-primary" id="addBannerBtn">
                                <i class="fas fa-plus"></i> Add New Banner
                            </button>
                        </div>
                        <div class="card-body">

                            @if(count($banners) > 0)
                            <div class="row g-3" id="bannerCards">
                                @foreach($banners as $banner)
                                <div class="col-lg-4 col-md-6" id="bannerCard-{{ $banner->id }}">
                                    <div class="banner-card {{ $banner->status == 'active' ? 'active' : 'inactive' }}">
                                        {{-- Image --}}
                                        <div class="banner-img-wrap">
                                            <img src="{{ public_asset($banner->image) }}" alt="{{ $banner->title }}">
                                            <div class="banner-order-badge">#{{ $banner->order }}</div>
                                            <div class="banner-status-badge {{ $banner->status == 'active' ? 'badge-success' : 'badge-danger' }}">
                                                {{ ucfirst($banner->status) }}
                                            </div>
                                        </div>
                                        {{-- Info --}}
                                        <div class="banner-body">
                                            <h6 class="banner-title">{{ $banner->title }}</h6>
                                            @if($banner->subtitle)
                                            <p class="banner-subtitle">{{ $banner->subtitle }}</p>
                                            @endif
                                            @if($banner->description)
                                            <p class="banner-desc">{{ Str::limit($banner->description, 80) }}</p>
                                            @endif
                                        </div>
                                        {{-- Actions --}}
                                        <div class="banner-footer">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input status-toggle"
                                                        id="st{{ $banner->id }}" data-id="{{ $banner->id }}"
                                                        {{ $banner->status == 'active' ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="st{{ $banner->id }}">
                                                        {{ $banner->status == 'active' ? 'Active' : 'Inactive' }}
                                                    </label>
                                                </div>
                                                <div>
                                                    <button class="btn btn-info btn-sm edit-btn" data-id="{{ $banner->id }}" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $banner->id }}" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="text-center py-5" id="emptyState">
                                <i class="fas fa-images fa-4x text-muted mb-3 d-block"></i>
                                <h5 class="text-muted">Koi banner nahi hai.</h5>
                                <p class="text-muted">Pehla banner add karo — home page par slider mein dikhega.</p>
                                <button class="btn btn-primary" id="addBannerBtn2">
                                    <i class="fas fa-plus"></i> Add First Banner
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

{{-- Add/Edit Modal --}}
<div class="modal fade" id="bannerModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" id="modalHeader" style="background:linear-gradient(135deg,#7a1a58,#5a1240);">
                <h5 class="modal-title text-white" id="bannerModalLabel">
                    <i class="fas fa-plus-circle me-2"></i> Add New Banner
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form id="bannerForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="banner_id" name="banner_id">
                <input type="hidden" id="formMethod" name="_method" value="POST">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="e.g. Welcome to KSVM" required>
                                <span class="text-danger small title_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Subtitle</label>
                                <input type="text" class="form-control" id="subtitle" name="subtitle"
                                    placeholder="e.g. Quality Education">
                                <span class="text-danger small subtitle_error"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="mydescription" name="description" rows="3"
                                    placeholder="Banner par dikhne wala text..." required></textarea>
                                <span class="text-danger small description_error"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Banner Image <span class="text-danger" id="imgRequired">*</span></label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i>
                                    Recommended size: 1920×800px | Allowed: jpg, png, gif | Max: 5MB
                                </small>
                                <span class="text-danger small image_error"></span>
                                <div id="imagePreview" class="mt-2"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Display Order <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="order" name="order"
                                    min="0" value="1" required>
                                <small class="text-muted">Chhota number = pehle dikhega</small>
                                <span class="text-danger small order_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Status <span class="text-danger">*</span></label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="active">Active (Dikhega)</option>
                                    <option value="inactive">Inactive (Nahi Dikhega)</option>
                                </select>
                                <span class="text-danger small status_error"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary" id="saveBannerBtn">
                        <i class="fas fa-save"></i> Save Banner
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.banner-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    transition: transform 0.3s, box-shadow 0.3s;
    border: 2px solid transparent;
    margin-bottom: 20px;
}
.banner-card.active { border-color: #28a745; }
.banner-card.inactive { border-color: #dc3545; opacity: 0.75; }
.banner-card:hover { transform: translateY(-4px); box-shadow: 0 10px 30px rgba(0,0,0,0.12); }

.banner-img-wrap { position: relative; overflow: hidden; aspect-ratio: 16/6; background: #f0f0f0; }
.banner-img-wrap img { width: 100%; height: 100%; object-fit: cover; }
.banner-order-badge {
    position: absolute; top: 10px; left: 10px;
    background: rgba(0,0,0,0.6); color: #fff;
    padding: 3px 10px; border-radius: 20px; font-size: 12px; font-weight: 700;
}
.banner-status-badge {
    position: absolute; top: 10px; right: 10px;
    padding: 3px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; color: #fff;
}
.badge-success { background: #28a745; }
.badge-danger { background: #dc3545; }

.banner-body { padding: 14px 16px 8px; }
.banner-title { font-weight: 700; color: #1a1a2e; font-size: 15px; margin-bottom: 4px; }
.banner-subtitle { font-size: 13px; color: #7a1a58; font-weight: 600; margin-bottom: 4px; }
.banner-desc { font-size: 12px; color: #888; margin: 0; }

.banner-footer { padding: 10px 16px 14px; border-top: 1px solid #f0f0f0; }
</style>
@endsection

@push('scripts')
<script>
$(document).ready(function() {

    var CSRF = '{{ csrf_token() }}';

    // Open Add Modal
    $('#addBannerBtn, #addBannerBtn2').on('click', function() {
        $('#bannerForm')[0].reset();
        $('#banner_id').val('');
        $('#formMethod').val('POST');
        $('#bannerModalLabel').html('<i class="fas fa-plus-circle me-2"></i> Add New Banner');
        $('#imagePreview').html('');
        $('#imgRequired').show();
        $('#image').prop('required', true);
        $('#order').val({{ count($banners) + 1 }});
        $('.error-text, .text-danger.small').text('');
        $('#bannerModal').modal('show');
    });

    // Image Preview
    $('#image').on('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').html(
                    '<img src="' + e.target.result + '" style="max-height:150px; border-radius:8px; border:2px solid #7a1a58; padding:3px; margin-top:6px;">' +
                    '<small class="text-muted d-block mt-1">Preview</small>'
                );
            };
            reader.readAsDataURL(file);
        }
    });

    // Edit Banner
    $(document).on('click', '.edit-btn', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '/admin/banners/' + id,
            type: 'GET',
            headers: { 'X-CSRF-TOKEN': CSRF },
            success: function(res) {
                if (res.success) {
                    var b = res.data;
                    $('#banner_id').val(b.id);
                    $('#title').val(b.title);
                    $('#subtitle').val(b.subtitle || '');
                    $('#mydescription').val(b.description);
                    $('#order').val(b.order);
                    $('#status').val(b.status);
                    $('#formMethod').val('PUT');
                    $('#bannerModalLabel').html('<i class="fas fa-edit me-2"></i> Edit Banner');
                    $('#imgRequired').hide();
                    $('#image').prop('required', false);
                    $('#imagePreview').html(
                        '<img src="/' + b.image + '" style="max-height:120px; border-radius:8px; border:2px solid #7a1a58; padding:3px;">' +
                        '<small class="text-muted d-block mt-1">Current image (change karna ho toh naya select karo)</small>'
                    );
                    $('.text-danger.small').text('');
                    $('#bannerModal').modal('show');
                }
            },
            error: function() {
                bootnotify('Failed to load banner details.', 'Error', 'danger');
            }
        });
    });

    // Save Banner (Add/Edit)
    $('#bannerForm').on('submit', function(e) {
        e.preventDefault();

        var btn = $('#saveBannerBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');
        $('.text-danger.small').text('');
        $('#alertBox').html('');

        var bannerId = $('#banner_id').val();
        var url = bannerId ? '/admin/banners/' + bannerId : '/admin/banners';

        $.ajax({
            url: url,
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': CSRF },
            success: function(res) {
                if (res.success) {
                    $('#bannerModal').modal('hide');
                    bootnotify(res.message || 'Banner saved successfully!', 'Success', 'success');
                    setTimeout(function() { location.reload(); }, 1500);
                }
            },
            error: function(xhr) {
                if (xhr.status === 422 && xhr.responseJSON) {
                    if (xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(key, val) {
                            $('.' + key + '_error').text(val[0]);
                        });
                    } else if (xhr.responseJSON.message) {
                        bootnotify(xhr.responseJSON.message, 'Error', 'danger');
                    }
                } else {
                    var msg = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Something went wrong.';
                    bootnotify(msg, 'Error', 'danger');
                }
            },
            complete: function() {
                btn.prop('disabled', false).html('<i class="fas fa-save"></i> Save Banner');
            }
        });
    });

    // Delete Banner
    $(document).on('click', '.delete-btn', function() {
        var id = $(this).data('id');
        if (!confirm('Kya aap sure hain? Yeh banner delete ho jayega.')) return;

        $.ajax({
            url: '/admin/banners/' + id,
            type: 'DELETE',
            data: { _token: CSRF },
            headers: { 'X-CSRF-TOKEN': CSRF },
            success: function(res) {
                if (res.success) {
                    $('#bannerCard-' + id).fadeOut(400, function() { $(this).remove(); });
                    bootnotify(res.message || 'Banner deleted!', 'Success', 'success');
                }
            },
            error: function() {
                bootnotify('Delete failed. Please try again.', 'Error', 'danger');
            }
        });
    });

    // Toggle Status
    $(document).on('change', '.status-toggle', function() {
        var id   = $(this).data('id');
        var stat = $(this).is(':checked') ? 'active' : 'inactive';
        var self = $(this);

        $.ajax({
            url: '/admin/banners/' + id + '/status',
            type: 'PUT',
            data: { _token: CSRF, status: stat },
            headers: { 'X-CSRF-TOKEN': CSRF },
            success: function(res) {
                if (res.success) {
                    bootnotify('Status updated to ' + stat + '!', 'Success', 'success');
                    // Update card border
                    var card = self.closest('.banner-card');
                    card.removeClass('active inactive').addClass(stat);
                    // Update badge
                    var badge = card.find('.banner-status-badge');
                    badge.removeClass('badge-success badge-danger')
                         .addClass(stat === 'active' ? 'badge-success' : 'badge-danger')
                         .text(stat.charAt(0).toUpperCase() + stat.slice(1));
                    // Update label
                    self.closest('.custom-control').find('.custom-control-label')
                        .text(stat.charAt(0).toUpperCase() + stat.slice(1));
                }
            },
            error: function() {
                bootnotify('Status update failed.', 'Error', 'danger');
                self.prop('checked', !self.is(':checked')); // revert
            }
        });
    });

});
</script>
@endpush

@extends('admin.layout.app')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Site Settings</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Site Settings</li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">General</li>
                </ul>
            </div>

            <div id="alertBox"></div>

            <form id="settingsForm" enctype="multipart/form-data">
                @csrf

                {{-- ===== BASIC INFO ===== --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title mb-0"><i class="fas fa-info-circle text-primary"></i> Basic Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Site Name <span class="text-danger">*</span></label>
                                    <input type="text" name="site_name" class="form-control"
                                        value="{{ $settings['site_name'] ?? '' }}"
                                        placeholder="e.g. K.S.V.M. Education Centre">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Site Tagline</label>
                                    <input type="text" name="site_tagline" class="form-control"
                                        value="{{ $settings['site_tagline'] ?? '' }}"
                                        placeholder="e.g. Quality Education for Every Child">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Logo</label>
                                    <input type="file" name="logo" class="form-control" accept="image/*">
                                    @if(!empty($settings['logo']))
                                        <div class="mt-2">
                                            <img src="{{ public_asset($settings['logo']) }}" height="60"
                                                style="border:1px solid #ddd; padding:4px; border-radius:4px;"
                                                alt="Current Logo">
                                            <small class="text-muted d-block">Current logo</small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ===== HEADER SETTINGS ===== --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title mb-0"><i class="fas fa-heading text-info"></i> Header Settings</h4>
                        <p class="card-category mb-0">Website ke upar wali strip mein dikhne wali info</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Header Phone Number</label>
                                    <input type="text" name="header_phone" class="form-control"
                                        value="{{ $settings['header_phone'] ?? '' }}"
                                        placeholder="e.g. +91-7084183114, 0512-3531047">
                                    <small class="text-muted">Multiple numbers comma se separate karo</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Header Email</label>
                                    <input type="email" name="header_email" class="form-control"
                                        value="{{ $settings['header_email'] ?? '' }}"
                                        placeholder="e.g. info@school.com">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ===== FOOTER SETTINGS ===== --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title mb-0"><i class="fas fa-shoe-prints text-warning"></i> Footer Settings</h4>
                        <p class="card-category mb-0">Website ke neeche wale footer ki info</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Footer Description</label>
                                    <textarea name="footer_description" class="form-control" rows="3"
                                        placeholder="School ke baare mein short description...">{{ $settings['footer_description'] ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Address</label>
                                    <textarea name="footer_address" class="form-control" rows="2"
                                        placeholder="School ka poora address...">{{ $settings['footer_address'] ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Footer Phone</label>
                                    <input type="text" name="footer_phone" class="form-control"
                                        value="{{ $settings['footer_phone'] ?? '' }}"
                                        placeholder="e.g. +91-7084183114">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Footer Email</label>
                                    <input type="email" name="footer_email" class="form-control"
                                        value="{{ $settings['footer_email'] ?? '' }}"
                                        placeholder="e.g. info@school.com">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Copyright Text</label>
                                    <input type="text" name="footer_copyright" class="form-control"
                                        value="{{ $settings['footer_copyright'] ?? '' }}"
                                        placeholder="e.g. KSVM Education Center. All rights reserved.">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ===== SOCIAL MEDIA ===== --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title mb-0"><i class="fas fa-share-alt text-success"></i> Social Media Links</h4>
                        <p class="card-category mb-0">Khali chhod do agar use nahi karna</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fab fa-facebook text-primary"></i> Facebook URL</label>
                                    <input type="url" name="social_facebook" class="form-control"
                                        value="{{ $settings['social_facebook'] ?? '' }}"
                                        placeholder="https://facebook.com/yourpage">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fab fa-instagram text-danger"></i> Instagram URL</label>
                                    <input type="url" name="social_instagram" class="form-control"
                                        value="{{ $settings['social_instagram'] ?? '' }}"
                                        placeholder="https://instagram.com/yourpage">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fab fa-youtube text-danger"></i> YouTube URL</label>
                                    <input type="url" name="social_youtube" class="form-control"
                                        value="{{ $settings['social_youtube'] ?? '' }}"
                                        placeholder="https://youtube.com/yourchannel">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fab fa-twitter text-info"></i> Twitter URL</label>
                                    <input type="url" name="social_twitter" class="form-control"
                                        value="{{ $settings['social_twitter'] ?? '' }}"
                                        placeholder="https://twitter.com/yourhandle">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fab fa-whatsapp text-success"></i> WhatsApp Number</label>
                                    <input type="text" name="social_whatsapp" class="form-control"
                                        value="{{ $settings['social_whatsapp'] ?? '' }}"
                                        placeholder="e.g. 917084183114 (country code ke saath, no +)">
                                    <small class="text-muted">Sirf numbers, no spaces or +</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg" id="saveBtn">
                    <i class="fas fa-save"></i> Save All Settings
                </button>
                <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-info btn-lg ml-2">
                    <i class="fas fa-eye"></i> Preview Website
                </a>

            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {

    $('#settingsForm').on('submit', function (e) {
        e.preventDefault();
        var btn = $('#saveBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');

        var formData = new FormData(this);

        $.ajax({
            url: '{{ route("admin.site.settings.update") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function (res) {
                if (res.success) {
                    $('#alertBox').html(
                        '<div class="alert alert-success alert-dismissible fade show">' +
                        '<strong><i class="fas fa-check-circle"></i> Success!</strong> ' + res.message +
                        ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>'
                    );
                    $('html, body').animate({ scrollTop: 0 }, 400);
                    // Reload after 1.5s to show updated logo
                    setTimeout(function () { location.reload(); }, 1500);
                }
            },
            error: function (xhr) {
                var msg = 'Something went wrong.';
                if (xhr.responseJSON) {
                    if (xhr.responseJSON.errors) msg = Object.values(xhr.responseJSON.errors).flat().join('<br>');
                    else if (xhr.responseJSON.message) msg = xhr.responseJSON.message;
                }
                $('#alertBox').html(
                    '<div class="alert alert-danger alert-dismissible fade show">' +
                    '<strong><i class="fas fa-times-circle"></i> Error!</strong> ' + msg +
                    ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>'
                );
                $('html, body').animate({ scrollTop: 0 }, 400);
            },
            complete: function () {
                btn.prop('disabled', false).html('<i class="fas fa-save"></i> Save All Settings');
            }
        });
    });

});
</script>
@endpush

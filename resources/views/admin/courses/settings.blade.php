@extends('admin.layout.app')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Courses — Page Settings</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Courses</li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Page Settings</li>
                </ul>
            </div>

            <div id="alertBox"></div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0"><i class="fas fa-cog text-primary"></i> Courses Page Settings</h4>
                    <a href="{{ route('home.courses') }}" target="_blank" class="btn btn-sm btn-outline-info">
                        <i class="fas fa-eye"></i> Preview
                    </a>
                </div>
                <div class="card-body">
                    <form id="settingsForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Page Heading <span class="text-danger">*</span></label>
                                    <input type="text" name="page_heading" class="form-control"
                                        value="{{ $settings['page_heading'] ?? 'Our Curriculum' }}"
                                        placeholder="e.g. Our Curriculum">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Page Subtitle</label>
                                    <input type="text" name="page_subtitle" class="form-control"
                                        value="{{ $settings['page_subtitle'] ?? '' }}"
                                        placeholder="e.g. Well structured curriculum...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Discipline Section Heading</label>
                                    <input type="text" name="discipline_heading" class="form-control"
                                        value="{{ $settings['discipline_heading'] ?? 'Code of Discipline' }}"
                                        placeholder="e.g. Code of Discipline">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="saveBtn">
                            <i class="fas fa-save"></i> Save Settings
                        </button>
                    </form>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <a href="{{ route('admin.courses.classes') }}" class="card text-decoration-none" style="display:block;">
                        <div class="card-body d-flex align-items-center gap-3">
                            <div style="width:50px;height:50px;border-radius:12px;background:linear-gradient(135deg,#7a1a58,#5a1240);display:flex;align-items:center;justify-content:center;color:#fff;font-size:22px;flex-shrink:0;">
                                <i class="fas fa-book"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 font-weight-bold">Class Groups & Subjects</h6>
                                <small class="text-muted">Curriculum cards add/edit/delete karo</small>
                            </div>
                            <i class="fas fa-chevron-right ml-auto text-muted"></i>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('admin.courses.discipline') }}" class="card text-decoration-none" style="display:block;">
                        <div class="card-body d-flex align-items-center gap-3">
                            <div style="width:50px;height:50px;border-radius:12px;background:linear-gradient(135deg,#e74c3c,#c0392b);display:flex;align-items:center;justify-content:center;color:#fff;font-size:22px;flex-shrink:0;">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 font-weight-bold">Discipline Rules</h6>
                                <small class="text-muted">Code of discipline rules manage karo</small>
                            </div>
                            <i class="fas fa-chevron-right ml-auto text-muted"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#settingsForm').on('submit', function(e) {
        e.preventDefault();
        var btn = $('#saveBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');
        $.ajax({
            url: '{{ route("admin.courses.settings.update") }}',
            type: 'POST', data: $(this).serialize(),
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function(res) {
                if (res.success) {
                    $('#alertBox').html('<div class="alert alert-success alert-dismissible fade show"><strong><i class="fas fa-check-circle"></i> Success!</strong> ' + res.message + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    $('html, body').animate({ scrollTop: 0 }, 400);
                }
            },
            error: function(xhr) {
                var msg = xhr.responseJSON && xhr.responseJSON.errors ? Object.values(xhr.responseJSON.errors).flat().join('<br>') : 'Something went wrong.';
                $('#alertBox').html('<div class="alert alert-danger alert-dismissible fade show"><strong><i class="fas fa-times-circle"></i> Error!</strong> ' + msg + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                $('html, body').animate({ scrollTop: 0 }, 400);
            },
            complete: function() { btn.prop('disabled', false).html('<i class="fas fa-save"></i> Save Settings'); }
        });
    });
});
</script>
@endpush

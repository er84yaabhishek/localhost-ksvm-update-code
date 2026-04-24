@extends('admin.layout.app')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Hero Section</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a>
                    </li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Home Page</li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Hero Section</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="card-title">Edit Hero Section</h4>
                                    <p class="card-category">Home page ke welcome section ka content yahan se manage karo</p>
                                </div>
                                <a href="{{ url('/') }}" target="_blank" class="btn btn-sm btn-outline-info">
                                    <i class="fas fa-eye"></i> Preview Home Page
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            {{-- Alert Box --}}
                            <div id="alertBox"></div>

                            <form id="heroForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Main Title <span class="text-danger">*</span></label>
                                            <input type="text" name="hero_title" id="hero_title" class="form-control"
                                                value="{{ $settings['hero_title'] ?? 'Welcome to K.S.V.M. Education Centre' }}"
                                                placeholder="e.g. Welcome to K.S.V.M. Education Centre">
                                            <small class="text-muted">Home page par bada heading text</small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Tagline <span class="text-danger">*</span></label>
                                            <textarea name="hero_tagline" id="hero_tagline" class="form-control" rows="3"
                                                placeholder="Short tagline below the title">{{ $settings['hero_tagline'] ?? 'We at K.S.V.M. provide a happy, caring and safe environment for your child with a priority given to develop high standards of education.' }}</textarea>
                                            <small class="text-muted">Title ke neeche wala bold text</small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Description <span class="text-danger">*</span></label>
                                            <textarea name="hero_description" id="hero_description" class="form-control" rows="4"
                                                placeholder="Main description paragraph">{{ $settings['hero_description'] ?? 'Our work is supported by a good level of resources and additional staffing to meet the individual needs of the children.' }}</textarea>
                                            <small class="text-muted">Main paragraph text</small>
                                        </div>
                                    </div>

                                    <div class="col-md-12"><hr><h6 class="font-weight-bold text-muted mb-3">Buttons</h6></div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Button 1 Text</label>
                                            <input type="text" name="hero_btn1_text" class="form-control"
                                                value="{{ $settings['hero_btn1_text'] ?? 'Learn More' }}"
                                                placeholder="e.g. Learn More">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Button 1 URL</label>
                                            <input type="text" name="hero_btn1_url" class="form-control"
                                                value="{{ $settings['hero_btn1_url'] ?? '/aboutus' }}"
                                                placeholder="e.g. /aboutus">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Button 2 Text</label>
                                            <input type="text" name="hero_btn2_text" class="form-control"
                                                value="{{ $settings['hero_btn2_text'] ?? 'Contact Us' }}"
                                                placeholder="e.g. Contact Us">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Button 2 URL</label>
                                            <input type="text" name="hero_btn2_url" class="form-control"
                                                value="{{ $settings['hero_btn2_url'] ?? '/contact' }}"
                                                placeholder="e.g. /contact">
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <button type="submit" class="btn btn-primary" id="saveBtn">
                                    <i class="fas fa-save"></i> Save Changes
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#heroForm').on('submit', function(e) {
        e.preventDefault();

        var btn = $('#saveBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');

        $.ajax({
            url: '{{ route("admin.homepage.hero.update") }}',
            type: 'POST',
            data: $(this).serialize(),
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(res) {
                if (res.success) {
                    $('#alertBox').html(
                        '<div class="alert alert-success alert-dismissible fade show">' +
                        '<strong><i class="fas fa-check-circle"></i> Success!</strong> ' + res.message +
                        ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>'
                    );
                    $('html, body').animate({ scrollTop: 0 }, 400);
                }
            },
            error: function(xhr) {
                var errors = xhr.responseJSON && xhr.responseJSON.errors
                    ? Object.values(xhr.responseJSON.errors).flat().join('<br>')
                    : (xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Something went wrong.');
                $('#alertBox').html(
                    '<div class="alert alert-danger alert-dismissible fade show">' +
                    '<strong><i class="fas fa-times-circle"></i> Error!</strong> ' + errors +
                    ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>'
                );
            },
            complete: function() {
                btn.prop('disabled', false).html('<i class="fas fa-save"></i> Save Changes');
            }
        });
    });
});
</script>
@endpush

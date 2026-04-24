@extends('admin.layout.app')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">About Us — Main Settings</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">About Us</li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Settings</li>
                </ul>
            </div>

            <div id="alertBox"></div>

            <form id="aboutForm" enctype="multipart/form-data">
                @csrf

                {{-- ===== MAIN SECTION ===== --}}
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0"><i class="fas fa-info-circle text-primary"></i> Main Section</h4>
                        <a href="{{ route('home.aboutus') }}" target="_blank" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-eye"></i> Preview
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tag / Badge Text</label>
                                    <input type="text" name="tag" class="form-control"
                                        value="{{ $settings['tag'] ?? 'Est. 2009' }}"
                                        placeholder="e.g. Est. 2009">
                                    <small class="text-muted">Heading ke upar chhota badge</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Image Badge Text</label>
                                    <input type="text" name="image_badge" class="form-control"
                                        value="{{ $settings['image_badge'] ?? 'Quality Education' }}"
                                        placeholder="e.g. Quality Education">
                                    <small class="text-muted">Image ke upar overlay text</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Main Heading <span class="text-danger">*</span></label>
                                    <input type="text" name="heading" class="form-control"
                                        value="{{ $settings['heading'] ?? '' }}"
                                        placeholder="e.g. About K.S.V.M. Education Centre">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Paragraph 1 <span class="text-danger">*</span></label>
                                    <textarea name="para1" class="form-control" rows="4"
                                        placeholder="First paragraph...">{{ $settings['para1'] ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Paragraph 2</label>
                                    <textarea name="para2" class="form-control" rows="4"
                                        placeholder="Second paragraph...">{{ $settings['para2'] ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Paragraph 3</label>
                                    <textarea name="para3" class="form-control" rows="3"
                                        placeholder="Third paragraph...">{{ $settings['para3'] ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">About Image</label>
                                    <input type="file" name="image" class="form-control" accept="image/*"
                                        onchange="previewImage(this)">
                                    @if(!empty($settings['image']))
                                    <div class="mt-2">
                                        <img id="imgPreview" src="{{ public_asset($settings['image']) }}"
                                            height="100" style="border-radius:8px; border:1px solid #ddd; padding:4px;">
                                        <small class="text-muted d-block">Current image</small>
                                    </div>
                                    @else
                                    <img id="imgPreview" src="" height="100" style="display:none; border-radius:8px; margin-top:8px;">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ===== STATS ===== --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title mb-0"><i class="fas fa-chart-bar text-success"></i> Stats / Numbers</h4>
                        <p class="card-category mb-0">Heading ke neeche 3 numbers dikhte hain</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Stat 1 — Number</label>
                                    <input type="text" name="stat1_num" class="form-control"
                                        value="{{ $settings['stat1_num'] ?? '15+' }}" placeholder="e.g. 15+">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Stat 1 — Label</label>
                                    <input type="text" name="stat1_label" class="form-control"
                                        value="{{ $settings['stat1_label'] ?? 'Years of Excellence' }}"
                                        placeholder="e.g. Years of Excellence">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Stat 2 — Number</label>
                                    <input type="text" name="stat2_num" class="form-control"
                                        value="{{ $settings['stat2_num'] ?? '1000+' }}" placeholder="e.g. 1000+">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Stat 2 — Label</label>
                                    <input type="text" name="stat2_label" class="form-control"
                                        value="{{ $settings['stat2_label'] ?? 'Students Enrolled' }}"
                                        placeholder="e.g. Students Enrolled">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Stat 3 — Number</label>
                                    <input type="text" name="stat3_num" class="form-control"
                                        value="{{ $settings['stat3_num'] ?? '50+' }}" placeholder="e.g. 50+">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Stat 3 — Label</label>
                                    <input type="text" name="stat3_label" class="form-control"
                                        value="{{ $settings['stat3_label'] ?? 'Expert Teachers' }}"
                                        placeholder="e.g. Expert Teachers">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ===== CORE VALUES SECTION HEADING ===== --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title mb-0"><i class="fas fa-star text-warning"></i> Core Values Section</h4>
                        <p class="card-category mb-0">Core Values section ka heading aur subtitle</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Section Heading</label>
                                    <input type="text" name="values_heading" class="form-control"
                                        value="{{ $settings['values_heading'] ?? 'Our Core Values' }}"
                                        placeholder="e.g. Our Core Values">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Section Subtitle</label>
                                    <input type="text" name="values_subtitle" class="form-control"
                                        value="{{ $settings['values_subtitle'] ?? 'Laying the foundation of Excellence' }}"
                                        placeholder="e.g. Laying the foundation of Excellence">
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-info mb-0">
                            <i class="fas fa-info-circle"></i>
                            Core Values ke cards manage karne ke liye
                            <a href="{{ route('admin.about.values') }}" class="font-weight-bold">Core Values CRUD</a>
                            page par jaao.
                        </div>
                    </div>
                </div>

                {{-- ===== CTA SECTION ===== --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title mb-0"><i class="fas fa-bullhorn text-danger"></i> CTA Section (Bottom Banner)</h4>
                        <p class="card-category mb-0">Page ke neeche purple banner</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">CTA Heading</label>
                                    <input type="text" name="cta_heading" class="form-control"
                                        value="{{ $settings['cta_heading'] ?? 'Ready to Join KSVM Family?' }}"
                                        placeholder="e.g. Ready to Join KSVM Family?">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">CTA Text</label>
                                    <input type="text" name="cta_text" class="form-control"
                                        value="{{ $settings['cta_text'] ?? 'Admissions are open.' }}"
                                        placeholder="e.g. Admissions are open.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Button Text</label>
                                    <input type="text" name="cta_btn_text" class="form-control"
                                        value="{{ $settings['cta_btn_text'] ?? 'Apply for Admission' }}"
                                        placeholder="e.g. Apply for Admission">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Button URL</label>
                                    <input type="text" name="cta_btn_url" class="form-control"
                                        value="{{ $settings['cta_btn_url'] ?? '/admissions' }}"
                                        placeholder="e.g. /admissions">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg" id="saveBtn">
                    <i class="fas fa-save"></i> Save All Settings
                </button>
                <a href="{{ route('home.aboutus') }}" target="_blank" class="btn btn-outline-info btn-lg ml-2">
                    <i class="fas fa-eye"></i> Preview About Us Page
                </a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imgPreview').attr('src', e.target.result).show();
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function() {
    $('#aboutForm').on('submit', function(e) {
        e.preventDefault();
        var btn = $('#saveBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');

        $.ajax({
            url: '{{ route("admin.about.settings.update") }}',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function(res) {
                if (res.success) {
                    $('#alertBox').html('<div class="alert alert-success alert-dismissible fade show"><strong><i class="fas fa-check-circle"></i> Success!</strong> ' + res.message + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    $('html, body').animate({ scrollTop: 0 }, 400);
                    setTimeout(function() { location.reload(); }, 1500);
                }
            },
            error: function(xhr) {
                var msg = xhr.responseJSON && xhr.responseJSON.errors
                    ? Object.values(xhr.responseJSON.errors).flat().join('<br>')
                    : (xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Something went wrong.');
                $('#alertBox').html('<div class="alert alert-danger alert-dismissible fade show"><strong><i class="fas fa-times-circle"></i> Error!</strong> ' + msg + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                $('html, body').animate({ scrollTop: 0 }, 400);
            },
            complete: function() {
                btn.prop('disabled', false).html('<i class="fas fa-save"></i> Save All Settings');
            }
        });
    });
});
</script>
@endpush

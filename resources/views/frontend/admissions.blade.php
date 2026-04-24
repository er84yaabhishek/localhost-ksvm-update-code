@extends('frontend.layout.app')
@section('content')

@include('frontend.partials.page_banner', ['title' => 'Admissions', 'breadcrumb' => 'Admissions'])

<section class="py-5" style="background:#f8f4f8;">
    <div class="container">

        {{-- Admission News Ticker --}}
        @if(count($admissions) > 0)
        <div class="row mb-5">
            <div class="col-12">
                <div class="news-ticker-box">
                    <div class="ticker-label"><i class="fas fa-bell me-2"></i>Admission News</div>
                    <div class="ticker-content">
                        <div class="news-container">
                            <div class="news-list">
                                @foreach($admissions as $news)
                                <div class="news-item">
                                    <a href="{{ route('home.admission.details', $news->slug) }}">
                                        <i class="fas fa-chevron-right me-2" style="color:#7a1a58;"></i>
                                        {{ $news->title }}
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row g-4">

            {{-- Left: Process + Documents --}}
            <div class="col-lg-5">
                <div class="content-card mb-4">
                    <h4 class="content-card-title"><i class="fas fa-list-ol me-2"></i>Admission Process</h4>
                    <div class="process-step">
                        <div class="step-num">1</div>
                        <div><h6>Submit Application</h6><p>Fill out the admission form online or visit our campus</p></div>
                    </div>
                    <div class="process-step">
                        <div class="step-num">2</div>
                        <div><h6>Document Verification</h6><p>Submit required documents for verification</p></div>
                    </div>
                    <div class="process-step">
                        <div class="step-num">3</div>
                        <div><h6>Interaction / Test</h6><p>Student interaction and assessment (if required)</p></div>
                    </div>
                    <div class="process-step last">
                        <div class="step-num">4</div>
                        <div><h6>Admission Confirmation</h6><p>Fee payment and seat confirmation</p></div>
                    </div>
                </div>

                <div class="content-card">
                    <h4 class="content-card-title"><i class="fas fa-folder-open me-2"></i>Required Documents</h4>
                    <div class="row">
                        <div class="col-6">
                            <ul class="ksvm-list">
                                <li>Birth Certificate</li>
                                <li>Previous School Certificate</li>
                                <li>Transfer Certificate</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="ksvm-list">
                                <li>Passport Size Photos</li>
                                <li>Aadhar Card Copy</li>
                                <li>Character Certificate</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: Quick Inquiry Form --}}
            <div class="col-lg-7">
                <div class="content-card">
                    <h4 class="content-card-title"><i class="fas fa-paper-plane me-2"></i>Quick Admission Inquiry</h4>
                    <form id="admissionForm" method="POST" action="{{ route('home.admission.store') }}">
                        @csrf
                        <input type="hidden" name="form_type" value="admission_from">
                        <input type="hidden" name="subject" value="Admission Inquiry">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-500">Student Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control ksvm-input" placeholder="Student's full name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-500">Parent Name <span class="text-danger">*</span></label>
                                <input type="text" name="pname" class="form-control ksvm-input" placeholder="Parent's full name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-500">Email Address</label>
                                <input type="email" name="email" class="form-control ksvm-input" placeholder="Email address">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-500">Phone Number <span class="text-danger">*</span></label>
                                <input type="number" name="phone" class="form-control ksvm-input" placeholder="Mobile number" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-500">Class for Admission <span class="text-danger">*</span></label>
                                <select name="classadmit" class="form-control ksvm-input" required>
                                    <option value="" disabled selected>Select Class</option>
                                    @foreach(['1st','2nd','3rd','4th','5th','6th','7th','8th','9th','10th','11th','12th'] as $cls)
                                    <option value="{{ $cls }}">Class {{ $cls }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-500">Message</label>
                                <textarea name="message" class="form-control ksvm-input" rows="4" placeholder="Any specific query or message..."></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-ksvm-primary w-100" id="submitBtn">
                                    <i class="fas fa-paper-plane me-2"></i> Submit Inquiry
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Admission Rules Summary --}}
                <div class="content-card mt-4">
                    <h4 class="content-card-title"><i class="fas fa-info-circle me-2"></i>Key Admission Rules</h4>
                    <ul class="ksvm-list">
                        <li>Class 6: Students who passed 5th standard are eligible. Age: 9–11 years.</li>
                        <li>Class 9 & 11: Entrance test is mandatory. T.C. submission compulsory.</li>
                        <li>Fees must be paid between 1st–10th of each month. Fine: Rs. 10/day after due date.</li>
                        <li>Board examination fee is not included in college fee.</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
.news-ticker-box { background:#fff; border-radius:10px; overflow:hidden; box-shadow:0 3px 15px rgba(0,0,0,0.07); display:flex; align-items:stretch; }
.ticker-label { background:linear-gradient(135deg,#7a1a58,#5a1240); color:#fff; padding:14px 20px; font-weight:600; font-size:14px; white-space:nowrap; display:flex; align-items:center; }
.ticker-content { flex:1; padding:0 16px; overflow:hidden; height:50px; }
.news-container { height:50px; overflow:hidden; position:relative; }
.news-list { animation:scrollUp 15s linear infinite; }
.news-item { padding:14px 0; font-size:14px; }
.news-item a { color:#333; text-decoration:none; }
.news-item a:hover { color:#7a1a58; }
.news-container:hover .news-list { animation-play-state:paused; }
@keyframes scrollUp { 0%{transform:translateY(100%)} 100%{transform:translateY(-100%)} }

.content-card { background:#fff; border-radius:12px; padding:28px; box-shadow:0 4px 20px rgba(0,0,0,0.07); }
.content-card-title { font-size:18px; font-weight:700; color:#7a1a58; margin-bottom:20px; padding-bottom:12px; border-bottom:2px solid #f0e8f0; }

.process-step { display:flex; gap:16px; align-items:flex-start; padding-bottom:20px; position:relative; }
.process-step:not(.last)::before { content:''; position:absolute; left:18px; top:40px; bottom:0; width:2px; background:#f0e8f0; }
.step-num { width:36px; height:36px; border-radius:50%; background:linear-gradient(135deg,#7a1a58,#5a1240); color:#fff; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:14px; flex-shrink:0; }
.process-step h6 { font-weight:600; color:#1a1a2e; margin-bottom:4px; }
.process-step p { font-size:13px; color:#666; margin:0; }

.ksvm-list { padding-left:0; list-style:none; }
.ksvm-list li { padding:7px 0 7px 22px; position:relative; font-size:14px; color:#444; border-bottom:1px solid #f5f5f5; }
.ksvm-list li::before { content:'›'; position:absolute; left:0; color:#7a1a58; font-size:18px; line-height:1.3; font-weight:bold; }

.ksvm-input { border:2px solid #e8e0e8; border-radius:8px; padding:10px 14px; font-size:14px; transition:border-color 0.3s,box-shadow 0.3s; }
.ksvm-input:focus { border-color:#7a1a58; box-shadow:0 0 0 3px rgba(122,26,88,0.1); outline:none; }
.btn-ksvm-primary { background:linear-gradient(135deg,#7a1a58,#5a1240); color:#fff; border:none; padding:13px 24px; border-radius:8px; font-weight:600; font-size:15px; cursor:pointer; transition:all 0.3s; box-shadow:0 4px 15px rgba(122,26,88,0.3); }
.btn-ksvm-primary:hover { transform:translateY(-2px); box-shadow:0 6px 20px rgba(122,26,88,0.4); }
.btn-ksvm-primary:disabled { opacity:0.7; cursor:not-allowed; transform:none; }
</style>

<script>
$(document).ready(function() {
    $('#admissionForm').on('submit', function(e) {
        e.preventDefault();
        var btn = $('#submitBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i> Submitting...');
        $.ajax({
            url: "{{ route('home.admission.store') }}",
            type: 'POST',
            data: new FormData(this),
            contentType: false, processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(res) {
                $('#admissionForm')[0].reset();
                btn.prop('disabled', false).html('<i class="fas fa-paper-plane me-2"></i> Submit Inquiry');
                bootnotify(res.success || 'Inquiry submitted successfully!', 'Admission Form', 'success');
            },
            error: function(xhr) {
                btn.prop('disabled', false).html('<i class="fas fa-paper-plane me-2"></i> Submit Inquiry');
                if (xhr.status === 422 && xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function(k, v) { bootnotify(v[0], 'Error', 'danger'); });
                } else {
                    bootnotify('An error occurred. Please try again.', 'Error', 'danger');
                }
            }
        });
    });
});
</script>
@endsection

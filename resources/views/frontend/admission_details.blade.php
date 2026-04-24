@extends('frontend.layout.app')
@section('content')

@include('frontend.partials.page_banner', ['title' => 'Admissions '.$admission->admission_for, 'breadcrumb' => 'Admission Details'])

<section class="py-5" style="background:#f8f4f8;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="detail-card">
                    <div class="detail-badge">Admissions Open — {{ $admission->admission_for }}</div>
                    <h1 class="detail-title">{{ $admission->title }}</h1>
                    <hr style="border-color:#f0e8f0; margin:24px 0;">
                    <div class="detail-content">
                        {!! $admission->description !!}
                    </div>
                    <div class="mt-4 d-flex gap-3 flex-wrap">
                        <a href="{{ route('home.admissions') }}" class="btn-ksvm-outline">
                            <i class="fas fa-arrow-left me-2"></i> Back to Admissions
                        </a>
                        <a href="{{ route('home.contact') }}" class="btn-ksvm-primary">
                            <i class="fas fa-paper-plane me-2"></i> Enquire Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.detail-card { background:#fff; border-radius:16px; padding:40px; box-shadow:0 6px 30px rgba(0,0,0,0.08); }
.detail-badge { display:inline-block; background:#f0e8f0; color:#7a1a58; padding:6px 16px; border-radius:20px; font-size:13px; font-weight:600; margin-bottom:16px; }
.detail-title { font-size:28px; font-weight:700; color:#1a1a2e; line-height:1.3; }
.detail-content { font-size:15px; line-height:1.8; color:#444; }
.detail-content h2, .detail-content h3 { color:#7a1a58; margin-top:24px; }
.detail-content ul { padding-left:20px; }
.detail-content ul li { margin-bottom:8px; }
.btn-ksvm-primary { background:linear-gradient(135deg,#7a1a58,#5a1240); color:#fff; border:none; padding:11px 22px; border-radius:8px; font-weight:600; font-size:14px; cursor:pointer; transition:all 0.3s; text-decoration:none; display:inline-flex; align-items:center; }
.btn-ksvm-primary:hover { transform:translateY(-2px); box-shadow:0 6px 20px rgba(122,26,88,0.3); color:#fff; }
.btn-ksvm-outline { background:transparent; color:#7a1a58; border:2px solid #7a1a58; padding:11px 22px; border-radius:8px; font-weight:600; font-size:14px; cursor:pointer; transition:all 0.3s; text-decoration:none; display:inline-flex; align-items:center; }
.btn-ksvm-outline:hover { background:#7a1a58; color:#fff; }
</style>
@endsection

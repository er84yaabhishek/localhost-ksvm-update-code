@extends('frontend.layout.app')
@section('content')

@include('frontend.partials.page_banner', ['title' => $page->name, 'breadcrumb' => $page->name])

<section class="py-5" style="background:#f8f4f8;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="detail-card">
                    <h1 class="detail-title">{{ $page->name }}</h1>
                    <hr style="border-color:#f0e8f0; margin:20px 0;">
                    <div class="detail-content">
                        {!! $page->description !!}
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('home.index') }}" class="btn-ksvm-outline">
                            <i class="fas fa-home me-2"></i> Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.detail-card { background:#fff; border-radius:16px; padding:40px; box-shadow:0 6px 30px rgba(0,0,0,0.08); }
.detail-title { font-size:28px; font-weight:700; color:#1a1a2e; }
.detail-content { font-size:15px; line-height:1.8; color:#444; }
.detail-content h2, .detail-content h3 { color:#7a1a58; margin-top:24px; }
.btn-ksvm-outline { background:transparent; color:#7a1a58; border:2px solid #7a1a58; padding:11px 22px; border-radius:8px; font-weight:600; font-size:14px; cursor:pointer; transition:all 0.3s; text-decoration:none; display:inline-flex; align-items:center; }
.btn-ksvm-outline:hover { background:#7a1a58; color:#fff; }
</style>
@endsection

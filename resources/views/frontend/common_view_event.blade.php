@extends('frontend.layout.app')
@section('content')

@include('frontend.partials.page_banner', ['title' => $page->title, 'breadcrumb' => 'Event Details'])

<section class="py-5" style="background:#f8f4f8;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="detail-card">
                    <div class="event-img-hero">
                        <img src="{{ public_asset('event/'.$page->image) }}" alt="{{ $page->title }}" class="img-fluid">
                    </div>
                    <div class="mt-4">
                        <h1 class="detail-title">{{ $page->title }}</h1>
                        <hr style="border-color:#f0e8f0; margin:20px 0;">
                        <div class="detail-content">
                            {!! $page->description !!}
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('home.events') }}" class="btn-ksvm-outline">
                                <i class="fas fa-arrow-left me-2"></i> Back to Events
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.detail-card { background:#fff; border-radius:16px; padding:30px; box-shadow:0 6px 30px rgba(0,0,0,0.08); }
.event-img-hero { border-radius:12px; overflow:hidden; max-height:450px; }
.event-img-hero img { width:100%; height:100%; object-fit:cover; }
.detail-title { font-size:28px; font-weight:700; color:#1a1a2e; }
.detail-content { font-size:15px; line-height:1.8; color:#444; }
.btn-ksvm-outline { background:transparent; color:#7a1a58; border:2px solid #7a1a58; padding:11px 22px; border-radius:8px; font-weight:600; font-size:14px; cursor:pointer; transition:all 0.3s; text-decoration:none; display:inline-flex; align-items:center; }
.btn-ksvm-outline:hover { background:#7a1a58; color:#fff; }
</style>
@endsection

@extends('frontend.layout.app')
@section('content')

@include('frontend.partials.page_banner', ['title' => "Events", 'breadcrumb' => 'Events'])

<section class="py-5" style="background:#f8f4f8;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Our Events</h2>
            <p class="section-subtitle mt-3">Celebrating learning, culture and achievement at KSVM</p>
        </div>

        @if(count($event) > 0)
        <div class="row g-4">
            @foreach($event as $ev)
            <div class="col-lg-4 col-md-6">
                <div class="event-card">
                    <div class="event-img-wrap">
                        <img src="{{ public_asset('event/'.$ev->image) }}" alt="{{ $ev->title }}" loading="lazy">
                        <div class="event-badge">Event</div>
                    </div>
                    <div class="event-body">
                        <h5 class="event-title">{{ $ev->title }}</h5>
                        @if($ev->description)
                        <p class="event-desc">{{ Str::limit(strip_tags($ev->description), 100) }}</p>
                        @endif
                        <a href="{{ route('home.events.detalies', $ev->slug) }}" class="event-btn">
                            View Details <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-calendar-times fa-4x text-muted mb-3 d-block"></i>
            <h5 class="text-muted">No events at the moment. Check back soon!</h5>
        </div>
        @endif
    </div>
</section>

<style>
.event-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.07);
    transition: transform 0.3s, box-shadow 0.3s;
    height: 100%;
    display: flex; flex-direction: column;
}
.event-card:hover { transform: translateY(-6px); box-shadow: 0 15px 40px rgba(122,26,88,0.15); }
.event-img-wrap { position: relative; overflow: hidden; aspect-ratio: 16/9; }
.event-img-wrap img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s; }
.event-card:hover .event-img-wrap img { transform: scale(1.06); }
.event-badge {
    position: absolute; top: 14px; left: 14px;
    background: linear-gradient(135deg, #7a1a58, #5a1240);
    color: #fff; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;
}
.event-body { padding: 20px; flex: 1; display: flex; flex-direction: column; }
.event-title { font-size: 17px; font-weight: 600; color: #1a1a2e; margin-bottom: 10px; line-height: 1.4; }
.event-desc { font-size: 14px; color: #666; flex: 1; margin-bottom: 16px; }
.event-btn {
    display: inline-flex; align-items: center;
    color: #7a1a58; font-weight: 600; font-size: 14px;
    text-decoration: none; transition: gap 0.3s;
    border-top: 1px solid #f0e8f0; padding-top: 14px; margin-top: auto;
}
.event-btn:hover { color: #5a1240; gap: 8px; }
</style>
@endsection

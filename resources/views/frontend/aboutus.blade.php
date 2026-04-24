@extends('frontend.layout.app')
@section('content')

@include('frontend.partials.page_banner', ['title' => 'About Us', 'breadcrumb' => 'About Us'])

{{-- ===== MAIN ABOUT SECTION ===== --}}
<section class="py-5" style="background:#fff;">
    <div class="container">
        <div class="row align-items-center g-5">

            {{-- Left: Text Content --}}
            <div class="col-lg-6">
                @if(!empty($aboutSettings['tag']))
                <span class="about-tag">{{ $aboutSettings['tag'] }}</span>
                @endif

                <h2 class="about-heading">{{ $aboutSettings['heading'] ?? 'About K.S.V.M. Education Centre' }}</h2>

                @if(!empty($aboutSettings['para1']))
                <p class="about-text">{!! nl2br(e($aboutSettings['para1'])) !!}</p>
                @endif

                @if(!empty($aboutSettings['para2']))
                <p class="about-text">{!! nl2br(e($aboutSettings['para2'])) !!}</p>
                @endif

                @if(!empty($aboutSettings['para3']))
                <p class="about-text">{!! nl2br(e($aboutSettings['para3'])) !!}</p>
                @endif

                {{-- Stats --}}
                @php
                    $hasStats = !empty($aboutSettings['stat1_num']) || !empty($aboutSettings['stat2_num']) || !empty($aboutSettings['stat3_num']);
                @endphp
                @if($hasStats)
                <div class="about-stats">
                    @if(!empty($aboutSettings['stat1_num']))
                    <div class="stat-item">
                        <span class="stat-num">{{ $aboutSettings['stat1_num'] }}</span>
                        <span class="stat-label">{{ $aboutSettings['stat1_label'] ?? '' }}</span>
                    </div>
                    @endif
                    @if(!empty($aboutSettings['stat2_num']))
                    <div class="stat-item">
                        <span class="stat-num">{{ $aboutSettings['stat2_num'] }}</span>
                        <span class="stat-label">{{ $aboutSettings['stat2_label'] ?? '' }}</span>
                    </div>
                    @endif
                    @if(!empty($aboutSettings['stat3_num']))
                    <div class="stat-item">
                        <span class="stat-num">{{ $aboutSettings['stat3_num'] }}</span>
                        <span class="stat-label">{{ $aboutSettings['stat3_label'] ?? '' }}</span>
                    </div>
                    @endif
                </div>
                @endif
            </div>

            {{-- Right: Image --}}
            <div class="col-lg-6">
                <div class="about-img-wrap">
                    <img src="{{ public_asset($aboutSettings['image'] ?? 'front/img/ksvmabout.webp') }}"
                         alt="{{ $aboutSettings['heading'] ?? 'About KSVM' }}"
                         class="img-fluid">
                    @if(!empty($aboutSettings['image_badge']))
                    <div class="about-img-badge">
                        <i class="fas fa-graduation-cap"></i>
                        <span>{{ $aboutSettings['image_badge'] }}</span>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ===== CORE VALUES SECTION ===== --}}
@if($coreValues->count() > 0 || !empty($aboutSettings['values_heading']))
<section class="py-5" style="background:#f8f4f8;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">{{ $aboutSettings['values_heading'] ?? 'Our Core Values' }}</h2>
            @if(!empty($aboutSettings['values_subtitle']))
            <p class="section-subtitle mt-3">{{ $aboutSettings['values_subtitle'] }}</p>
            @endif
        </div>

        @if($coreValues->count() > 0)
        <div class="row g-4">
            @foreach($coreValues as $val)
            <div class="col-md-6 col-lg-3">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="{{ $val->icon }}"></i>
                    </div>
                    <h5>{{ $val->title }}</h5>
                    <p>{{ $val->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        {{-- Fallback --}}
        <div class="row g-4">
            @foreach([
                ['icon'=>'fas fa-book-open','title'=>'Education','desc'=>'Building strong academic understanding and learning habits for lifelong success.'],
                ['icon'=>'fas fa-hands','title'=>'Manners','desc'=>'Developing positive behaviour, respect, and values in every student.'],
                ['icon'=>'fas fa-shield-alt','title'=>'Discipline','desc'=>'Creating self-control, focus and responsibility in students.'],
                ['icon'=>'fas fa-star','title'=>'Excellence','desc'=>'Striving for the highest standard in academics and behaviour.'],
            ] as $val)
            <div class="col-md-6 col-lg-3">
                <div class="value-card">
                    <div class="value-icon"><i class="{{ $val['icon'] }}"></i></div>
                    <h5>{{ $val['title'] }}</h5>
                    <p>{{ $val['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endif

{{-- ===== CTA SECTION ===== --}}
@if(!empty($aboutSettings['cta_heading']))
<section class="py-5" style="background:linear-gradient(135deg,#7a1a58,#5a1240);">
    <div class="container text-center">
        <h3 style="color:#fff; font-weight:700; margin-bottom:12px;">
            {{ $aboutSettings['cta_heading'] }}
        </h3>
        @if(!empty($aboutSettings['cta_text']))
        <p style="color:rgba(255,255,255,0.8); margin-bottom:24px;">
            {{ $aboutSettings['cta_text'] }}
        </p>
        @endif
        @if(!empty($aboutSettings['cta_btn_text']))
        <a href="{{ $aboutSettings['cta_btn_url'] ?? route('home.admissions') }}"
           style="background:#FFD700; color:#1a1a2e; padding:14px 32px; border-radius:30px; font-weight:700; text-decoration:none; font-size:15px; display:inline-block; transition:all 0.3s;">
            <i class="fas fa-graduation-cap me-2"></i>
            {{ $aboutSettings['cta_btn_text'] }}
        </a>
        @endif
    </div>
</section>
@endif

<style>
.about-tag { background:#f0e8f0; color:#7a1a58; padding:6px 16px; border-radius:20px; font-size:13px; font-weight:600; display:inline-block; margin-bottom:16px; }
.about-heading { font-size:34px; font-weight:700; color:#1a1a2e; line-height:1.3; margin-bottom:20px; }
.about-text { font-size:15px; color:#555; line-height:1.8; margin-bottom:14px; }
.about-stats { display:flex; gap:30px; margin-top:28px; flex-wrap:wrap; }
.stat-item { text-align:center; }
.stat-num { display:block; font-size:32px; font-weight:800; color:#7a1a58; line-height:1; }
.stat-label { font-size:12px; color:#888; font-weight:500; }
.about-img-wrap { position:relative; border-radius:16px; overflow:hidden; box-shadow:0 20px 60px rgba(0,0,0,0.15); }
.about-img-wrap img { width:100%; display:block; }
.about-img-badge { position:absolute; bottom:20px; left:20px; background:linear-gradient(135deg,#7a1a58,#5a1240); color:#fff; padding:12px 20px; border-radius:10px; display:flex; align-items:center; gap:10px; font-weight:600; font-size:14px; }
.about-img-badge i { font-size:20px; color:#FFD700; }
.value-card { background:#fff; border-radius:14px; padding:28px 22px; text-align:center; box-shadow:0 4px 20px rgba(0,0,0,0.06); transition:all 0.3s; height:100%; }
.value-card:hover { transform:translateY(-6px); box-shadow:0 12px 35px rgba(122,26,88,0.15); }
.value-icon { width:64px; height:64px; border-radius:16px; background:linear-gradient(135deg,#7a1a58,#5a1240); display:flex; align-items:center; justify-content:center; margin:0 auto 16px; color:#fff; font-size:26px; }
.value-card h5 { font-weight:700; color:#1a1a2e; margin-bottom:10px; }
.value-card p { font-size:14px; color:#666; margin:0; line-height:1.6; }
</style>
@endsection

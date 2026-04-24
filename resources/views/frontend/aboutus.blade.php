@extends('frontend.layout.app')
@section('content')

@include('frontend.partials.page_banner', ['title' => 'About Us', 'breadcrumb' => 'About Us'])

{{-- About School --}}
<section class="py-5" style="background:#fff;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="about-tag">Est. 2009</span>
                <h2 class="about-heading">About <span style="color:#7a1a58;">K.S.V.M.</span> Education Centre</h2>
                <p class="about-text">K.S.V.M is a Private English Medium Co-educational institute, established and managed by <strong>"Late Pt. Parmeshwar Deen Educational Society."</strong> It was started in 2009 with the name <strong>"Kailas Public School"</strong> from classes playgroup to 5th.</p>
                <p class="about-text">In the period of 10 years, the planted tree K.P.S. spread its branches and in 2019, the management committee received affiliation from <strong>U.P. Board Prayagraj</strong> for senior secondary classes and started <strong>K.S.V.M. Education Centre (6th to 12th standard)</strong> with science stream.</p>
                <p class="about-text">Now the school has a three-storeyed building, with magnificent infrastructure and the best teachers to enhance the abilities of the students.</p>
                <div class="about-stats">
                    <div class="stat-item"><span class="stat-num">15+</span><span class="stat-label">Years of Excellence</span></div>
                    <div class="stat-item"><span class="stat-num">1000+</span><span class="stat-label">Students Enrolled</span></div>
                    <div class="stat-item"><span class="stat-num">50+</span><span class="stat-label">Expert Teachers</span></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-img-wrap">
                    <img src="{{ public_asset('front/img/ksvmabout.webp') }}" alt="About KSVM" class="img-fluid">
                    <div class="about-img-badge">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Quality Education</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Core Values --}}
<section class="py-5" style="background:#f8f4f8;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Our Core Values</h2>
            <p class="section-subtitle mt-3">Laying the foundation of Excellence</p>
        </div>
        <div class="row g-4">
            @php
            $values = [
                ['icon'=>'fas fa-book-open', 'title'=>'Education', 'desc'=>'Building strong academic understanding and learning habits for lifelong success.'],
                ['icon'=>'fas fa-hands', 'title'=>'Manners', 'desc'=>'Developing positive behaviour, respect, and values in every student.'],
                ['icon'=>'fas fa-shield-alt', 'title'=>'Discipline', 'desc'=>'Creating self-control, focus and responsibility in students.'],
                ['icon'=>'fas fa-star', 'title'=>'Excellence', 'desc'=>'Striving for the highest standard in academics and behaviour.'],
            ];
            @endphp
            @foreach($values as $val)
            <div class="col-md-6 col-lg-3">
                <div class="value-card">
                    <div class="value-icon"><i class="{{ $val['icon'] }}"></i></div>
                    <h5>{{ $val['title'] }}</h5>
                    <p>{{ $val['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-5" style="background:linear-gradient(135deg,#7a1a58,#5a1240);">
    <div class="container text-center">
        <h3 style="color:#fff; font-weight:700; margin-bottom:12px;">Ready to Join KSVM Family?</h3>
        <p style="color:rgba(255,255,255,0.8); margin-bottom:24px;">Admissions are open. Give your child the best start in life.</p>
        <a href="{{ route('home.admissions') }}" style="background:#FFD700; color:#1a1a2e; padding:14px 32px; border-radius:30px; font-weight:700; text-decoration:none; font-size:15px; transition:all 0.3s; display:inline-block;">
            <i class="fas fa-graduation-cap me-2"></i> Apply for Admission
        </a>
    </div>
</section>

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

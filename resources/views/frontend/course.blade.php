@extends('frontend.layout.app')
@section('content')

@include('frontend.partials.page_banner', ['title' => 'Courses & Subjects', 'breadcrumb' => 'Courses'])

<section class="py-5" style="background:#f8f4f8;">
    <div class="container">

        {{-- Section Heading --}}
        <div class="text-center mb-5">
            <h2 class="section-title">{{ $courseSettings['page_heading'] ?? 'Our Curriculum' }}</h2>
            @if(!empty($courseSettings['page_subtitle']))
            <p class="section-subtitle mt-3">{{ $courseSettings['page_subtitle'] }}</p>
            @endif
        </div>

        {{-- Curriculum Cards --}}
        @if($courseClasses->count() > 0)
        <div class="row g-4 mb-5">
            @foreach($courseClasses as $cls)
            <div class="col-lg-4 col-md-6">
                <div class="curriculum-card" style="--card-color:{{ $cls->color }};">
                    <div class="curriculum-header">
                        <div class="curriculum-icon">
                            <i class="{{ $cls->icon }}"></i>
                        </div>
                        <h5>{{ $cls->label }}</h5>
                    </div>
                    <ul class="curriculum-subjects">
                        @foreach($cls->subjects as $sub)
                        <li>
                            <i class="fas fa-check-circle"></i>
                            {{ $sub->subject_name }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
        @else
        {{-- Fallback --}}
        <div class="row g-4 mb-5">
            @php
            $fallback = [
                ['label'=>'P.G. / L.K.G. / U.K.G.','color'=>'#4A90D9','icon'=>'fas fa-child','subjects'=>['English','Hindi','Maths','E.V.S','Poem Recitation','Computer']],
                ['label'=>'Class I – III','color'=>'#E67E22','icon'=>'fas fa-pencil-alt','subjects'=>['English','Hindi','Maths','E.V.S','Computer','G.K.']],
                ['label'=>'Class IV – VIII','color'=>'#27AE60','icon'=>'fas fa-book','subjects'=>['English','Hindi','Maths','Science','Social Science','Computer','Sanskrit','G.K.']],
                ['label'=>'Class IX – X','color'=>'#8E44AD','icon'=>'fas fa-flask','subjects'=>['English','Hindi','Maths','Science','Social Science','Computer / Geometrical Art']],
                ['label'=>'Class XI – XII','color'=>'#C0392B','icon'=>'fas fa-atom','subjects'=>['English','Hindi','Physics','Chemistry','Maths / Biology']],
                ['label'=>'Co-Curricular Skills','color'=>'#16A085','icon'=>'fas fa-palette','subjects'=>['Art & Craft','Music','Dance','Physical Education','Value Education']],
            ];
            @endphp
            @foreach($fallback as $cls)
            <div class="col-lg-4 col-md-6">
                <div class="curriculum-card" style="--card-color:{{ $cls['color'] }};">
                    <div class="curriculum-header">
                        <div class="curriculum-icon"><i class="{{ $cls['icon'] }}"></i></div>
                        <h5>{{ $cls['label'] }}</h5>
                    </div>
                    <ul class="curriculum-subjects">
                        @foreach($cls['subjects'] as $sub)
                        <li><i class="fas fa-check-circle"></i> {{ $sub }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        {{-- Discipline Rules --}}
        <div class="content-card">
            <h4 class="content-card-title">
                <i class="fas fa-shield-alt me-2"></i>
                {{ $courseSettings['discipline_heading'] ?? 'Code of Discipline' }}
            </h4>

            @if($disciplineRules->count() > 0)
            <ul class="ksvm-list">
                @foreach($disciplineRules as $rule)
                <li>{{ $rule->rule }}</li>
                @endforeach
            </ul>
            @else
            {{-- Fallback --}}
            <ul class="ksvm-list">
                <li>Students are expected to come in proper school uniform. Neatness and cleanliness will be encouraged.</li>
                <li>Regularity in attendance is must. A student must get permission of the Class Teacher or Principal in case of leave.</li>
                <li>If a student is absent for more than ten consecutive days without permission, his/her name is liable to be struck off.</li>
                <li>Students suffering from contagious disease are not allowed to attend school without medical fitness.</li>
                <li>Misbehavior with teachers or abusive conduct will be dealt with severity.</li>
                <li>Damage to school property will be charged to parents.</li>
                <li>If a student is called for an extra class or activity, he/she must be present without fail.</li>
            </ul>
            @endif
        </div>

    </div>
</section>

<style>
.curriculum-card { background:#fff; border-radius:14px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.07); height:100%; transition:transform 0.3s,box-shadow 0.3s; border-top:4px solid var(--card-color); }
.curriculum-card:hover { transform:translateY(-5px); box-shadow:0 12px 35px rgba(0,0,0,0.12); }
.curriculum-header { padding:20px 20px 14px; display:flex; align-items:center; gap:14px; border-bottom:1px solid #f5f5f5; }
.curriculum-icon { width:44px; height:44px; border-radius:10px; background:var(--card-color); display:flex; align-items:center; justify-content:center; color:#fff; font-size:18px; flex-shrink:0; }
.curriculum-header h5 { margin:0; font-weight:700; color:#1a1a2e; font-size:15px; }
.curriculum-subjects { list-style:none; padding:16px 20px; margin:0; }
.curriculum-subjects li { padding:6px 0; font-size:14px; color:#555; display:flex; align-items:center; gap:8px; border-bottom:1px solid #f9f9f9; }
.curriculum-subjects li i { color:var(--card-color); font-size:12px; flex-shrink:0; }
.content-card { background:#fff; border-radius:12px; padding:28px; box-shadow:0 4px 20px rgba(0,0,0,0.07); }
.content-card-title { font-size:18px; font-weight:700; color:#7a1a58; margin-bottom:20px; padding-bottom:12px; border-bottom:2px solid #f0e8f0; }
.ksvm-list { padding-left:0; list-style:none; }
.ksvm-list li { padding:8px 0 8px 22px; position:relative; font-size:14px; color:#444; border-bottom:1px solid #f5f5f5; }
.ksvm-list li::before { content:'›'; position:absolute; left:0; color:#7a1a58; font-size:18px; line-height:1.3; font-weight:bold; }
</style>
@endsection

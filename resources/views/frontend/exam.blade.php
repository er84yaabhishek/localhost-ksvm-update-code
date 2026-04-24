@extends('frontend.layout.app')
@section('content')

@include('frontend.partials.page_banner', ['title' => 'Examination', 'breadcrumb' => 'Exam'])

<section class="py-5" style="background:#f8f4f8;">
    <div class="container">

        {{-- Exam News Ticker --}}
        @if(count($exam) > 0)
        <div class="row mb-5">
            <div class="col-12">
                <div class="news-ticker-box">
                    <div class="ticker-label"><i class="fas fa-bell me-2"></i>Exam News</div>
                    <div class="ticker-content">
                        <div class="news-container">
                            <div class="news-list">
                                @foreach($exam as $news)
                                <div class="news-item">
                                    <a href="{{ route('home.exam.details', $news->slug) }}">
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
            {{-- Left: Exam Info --}}
            <div class="col-lg-8">
                <div class="content-card">
                    <h3 class="content-card-title"><i class="fas fa-clipboard-list me-2"></i>Examination System</h3>
                    <p>K.S.V.M. makes strenuous effort to make the students aware of the swift changing competitive world by inculcating the values of <strong style="color:#7a1a58;">SHIKSHA. SANSKAR. ANUSHASAN</strong></p>

                    <ul class="ksvm-list">
                        <li>Modern Examination and evaluation system is used for development of the students.</li>
                        <li>Two unit tests, half yearly and Annual examination will be held in a year.</li>
                        <li>Extra curriculum activities will be evaluated in annual examination.</li>
                    </ul>

                    <h5 class="mt-4 mb-3" style="color:#7a1a58;"><i class="fas fa-users me-2"></i>Teacher-Parent Meeting</h5>
                    <p>After each examination, parents meeting is organized in college. Guardians may get the information related to parents meeting from their ward.</p>

                    <h5 class="mt-4 mb-3" style="color:#7a1a58;"><i class="fas fa-trophy me-2"></i>Prize & Report Card Distribution</h5>
                    <p>Prize and Report card distribution ceremony is celebrated to encourage talented students. K.S.I.C. provides scholarship for the best performance of the students.</p>

                    <h5 class="mt-4 mb-3" style="color:#7a1a58;"><i class="fas fa-book me-2"></i>General Rules for Examination</h5>
                    <ul class="ksvm-list">
                        <li>No student will be permitted to appear in the examination unless all dues are paid.</li>
                        <li>The student must give at least <strong>75% attendance</strong> in one session.</li>
                        <li>Students absent during exam due to medical reasons must submit certificate before last day.</li>
                        <li>Students who missed any test/examination will not be awarded a rank in the class.</li>
                    </ul>
                </div>
            </div>

            {{-- Right: Exam Cards --}}
            <div class="col-lg-4">
                @if(count($exam) > 0)
                <h5 class="mb-3 fw-bold" style="color:#7a1a58;">Latest Exam Updates</h5>
                @foreach($exam as $news)
                <a href="{{ route('home.exam.details', $news->slug) }}" class="exam-card-link">
                    <div class="exam-mini-card">
                        <div class="exam-mini-icon"><i class="fas fa-file-alt"></i></div>
                        <div class="exam-mini-content">
                            <span class="exam-for-badge">{{ $news->exam_for }}</span>
                            <h6>{{ $news->title }}</h6>
                        </div>
                        <i class="fas fa-chevron-right exam-arrow"></i>
                    </div>
                </a>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

<style>
.news-ticker-box {
    background: #fff; border-radius: 10px; overflow: hidden;
    box-shadow: 0 3px 15px rgba(0,0,0,0.07);
    display: flex; align-items: stretch;
}
.ticker-label {
    background: linear-gradient(135deg, #7a1a58, #5a1240);
    color: #fff; padding: 14px 20px; font-weight: 600; font-size: 14px;
    white-space: nowrap; display: flex; align-items: center;
}
.ticker-content { flex: 1; padding: 0 16px; overflow: hidden; height: 50px; }
.news-container { height: 50px; overflow: hidden; position: relative; }
.news-list { animation: scrollUp 15s linear infinite; }
.news-item { padding: 14px 0; font-size: 14px; }
.news-item a { color: #333; text-decoration: none; }
.news-item a:hover { color: #7a1a58; }
.news-container:hover .news-list { animation-play-state: paused; }
@keyframes scrollUp { 0% { transform: translateY(100%); } 100% { transform: translateY(-100%); } }

.content-card { background: #fff; border-radius: 12px; padding: 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.07); }
.content-card-title { font-size: 20px; font-weight: 700; color: #7a1a58; margin-bottom: 16px; padding-bottom: 12px; border-bottom: 2px solid #f0e8f0; }
.ksvm-list { padding-left: 0; list-style: none; }
.ksvm-list li { padding: 8px 0 8px 24px; position: relative; font-size: 14px; color: #444; border-bottom: 1px solid #f5f5f5; }
.ksvm-list li::before { content: '›'; position: absolute; left: 0; color: #7a1a58; font-size: 20px; line-height: 1.2; font-weight: bold; }

.exam-card-link { text-decoration: none; display: block; margin-bottom: 12px; }
.exam-mini-card {
    background: #fff; border-radius: 10px; padding: 14px 16px;
    display: flex; align-items: center; gap: 12px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.06);
    transition: all 0.3s; border-left: 3px solid #7a1a58;
}
.exam-mini-card:hover { transform: translateX(4px); box-shadow: 0 6px 20px rgba(122,26,88,0.15); }
.exam-mini-icon { width: 38px; height: 38px; border-radius: 8px; background: #f0e8f0; display: flex; align-items: center; justify-content: center; color: #7a1a58; flex-shrink: 0; }
.exam-mini-content { flex: 1; }
.exam-for-badge { font-size: 11px; background: #f0e8f0; color: #7a1a58; padding: 2px 8px; border-radius: 10px; font-weight: 600; }
.exam-mini-content h6 { margin: 4px 0 0; font-size: 13px; color: #333; line-height: 1.4; }
.exam-arrow { color: #ccc; font-size: 12px; }
</style>
@endsection

@extends('frontend.layout.app')
@section('content')


    

    
    <style>
        .bg-img {
            background: url(watermarkingd008.html?image=&amp;maxim_size=8000) 0 36% no-repeat;
            background-size: auto;
            -webkit-background-size: cover;
            background-size: cover;
        }
    </style>


    <section class="inner-intro bg-img light-color overlay-before parallax-background">
        <div class="container">
            <div class="row title">
                <h2><span>Examination</span></h2>
            </div>
        </div>
    </section>


    <!-- Gallery Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="title">Examination Evalution</h6>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="mb-4 text-center text-white py-2" style="background-color: #7c1f82;">
                        <h4 class="m-0">Examination News</h4>
                    </div>

                    <div class="news-container" style="height: 250px; overflow: hidden; position: relative;">
                        <div class="news-list">
                            @if(count($exam) > 0)
                                @foreach($exam as $news)
                                    <div class="news-item mb-2">
                                        <div class="card border-0 shadow-sm">
                                            <div class="card-body py-2 px-3">
                                                <h6 class="card-title mb-0">
                                                    <a href="{{ route('home.exam.details', $news->slug) }}"
                                                        class="text-decoration-none text-dark">
                                                        {{ $news->title }}
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center text-muted mt-3">No Exam news available.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <style>
                    /* Scroll animation */
                    @keyframes scrollUp {
                        0% {
                            transform: translateY(100%);
                        }

                        100% {
                            transform: translateY(-100%);
                        }
                    }

                    .news-list {
                        display: flex;
                        flex-direction: column;
                        animation: scrollUp linear infinite;
                        animation-duration: 20s;
                        /* adjust speed */
                    }

                    /* Pause scroll on hover */
                    .news-container:hover .news-list {
                        animation-play-state: paused;
                    }

                    .news-item {
                        flex-shrink: 0;
                    }
                </style>
            </div>
            <div class="row g-4">
                <p>K.S.V.M. makes strenuous effort to make the students aware of the swift changing competitive world by
                    inculcating the values of <span style="color: red;">SHIKSHA. SANSKAR. ANUSHASAN</span></p>
                <div class="col-lg-12 col-mb-12">
                    <ul>
                        <li>Modern Examination and evaluation system is used for development of the students. Mental
                            progress evaluation will be based on overall activities in school throughout the year.</li>
                        <li>Two unit tests, half yearly and Annual examination will be held in a year. First and second unit
                            tests will be held before half yearly examination.</li>
                        <li>Extra curriculum activities will be evaluated in annual examination.</li>
                    </ul>
                </div>
                <div class="col-lg-12 col-mb-12">
                    <h5>Teacher, Parents meeting :-</h5>
                    <p>After each examination, parents meeting is organized in college, Guardians may get the information
                        related to parents meeting from their ward. Parents are expected to co-operate with the school
                        authorities and their advice & proposals are invited.</p>
                </div>
                <div class="col-lg-12 col-mb-12">
                    <h5>Prize and Report card distribution ceremony :- </h5>
                    <p>Prize and Report card distribution ceremony is celebrated to encourage talented students. K.S.I.C.
                        provides scholarship for the best performance of the students. The brilliant students are rewarded
                        and honoured in the Prize Distribution Ceremony.</p>
                </div>
                <div class="col-lg-12 col-mb-12">
                    <h5>General Rules for Examination and Promotion :- </h5>
                    <ul>
                        <li>No student will be permitted to appear in the examination unless all the dues are paid up to
                            date.</li>
                        <li>The student must give at least 75% attendance in one session to be eligible for the annual
                            examination.</li>
                        <li>Students who remain absent during the test/examination due to medical reasons, need to submit
                            their certificate before the last day of the test/examination.</li>
                        <li>Students who have missed any test/examination will not be awarded a
                            rank in the class.</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- Gallery End -->

@endsection
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
                <h2><span>Admissions {{ $admission->admission_for }}</span></h2>
            </div>
        </div>
    </section>


    <!-- Admissions Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="title">Admissions Open
                    {{ $admission->admission_for }}</h6>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-5">{{ $admission->title }}</h1>
                    {!! $admission->description !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Admissions End -->
@endsection
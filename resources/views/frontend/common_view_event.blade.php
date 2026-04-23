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
                <h2><span>{{ $page->title }}</span></h2>
            </div>
        </div>
    </section>


    <!-- Page Content Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="title">{{ $page->title }}</h5>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid w-100 mb-5" src="{{ public_asset('event/' . $page->image) }}" alt="">
                    {!! $page->description !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End -->
@endsection
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
                <h2><span>Gallery</span></h2>
            </div>
        </div>
    </section>


    <!-- Gallery Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="title">Gallery</h6>
                <h1 class="mb-5">Check Our Gallery</h1>
            </div>
            <div class="row g-4">
                <!-- Gallery items would go here -->
                @foreach ($gallery as $gallery)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ public_asset('images/'.$gallery->image) }}" alt="">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">{{ $gallery->title }}</h5>
                            <p> {{ $gallery->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Gallery End -->

    @endsection
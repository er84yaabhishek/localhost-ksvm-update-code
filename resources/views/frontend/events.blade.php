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
                <h2><span>Event's</span></h2>
            </div>
        </div>
    </section>


    <!-- event Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="title">Event's</h6>
                <h1 class="mb-5">Check Our Event's</h1>
            </div>
            <div class="row g-4">
                <!-- event items would go here -->
                @foreach ($event as $event)
                    {{-- <a href="{{ route('home.events.detalies', $event->slug) }}" title="{{ $event->title }}"> --}}
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item bg-light">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="{{ public_asset('event/' . $event->image) }}" alt="">
                                </div>
                                <a href="{{ route('home.events.detalies', $event->slug) }}" title="{{ $event->title }}">
                                    <div class="text-center p-4">
                                        <h5 class="mb-0">{{ $event->title }}</h5>
                                        {{-- <p> {{ $event->description }}</p> --}}
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{--
                    </a> --}}
                @endforeach
            </div>
        </div>
    </div>
    <!-- Gallery End -->

@endsection
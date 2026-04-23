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
                <h2><span>About US</span></h2>
            </div>
        </div>
    </section>




    <!-- ABOUT SCHOOL SECTION -->
    <section class="py-5 about-section">
        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT CONTENT -->
                <div class="col-md-7">
                    <h2 class="fw-bold mb-3">About School</h2>

                    <p class="text-muted">
                        K.S.V.M is a Private English Medium Co-educational institute, established and managed by
                        <strong>"Late Pt. Parmeshwar Deen Educational Society."</strong> It was started in 2009
                        with the name <strong>"Kailas Public School"</strong> from classes playgroup to 5th.
                    </p>

                    <p class="text-muted">
                        In the period of 10 years, the planted tree K.P.S. spread its branches and in 2019,
                        the management committee received affiliation from <strong>U.P. Board Prayagraj</strong>
                        for senior secondary classes and started
                        <strong>K.S.V.M. Education Centre (6th to 12th standard)</strong> with science stream.
                    </p>

                    <p class="text-muted">
                        Now the school has a three-storeyed building, with magnificent infrastructure and the best
                        teachers to enhance the abilities of the students.
                    </p>
<!-- 
                    <h5 class="fw-bold mt-4">
                        KSVM • ASYM
                    </h5> -->
                </div>

                <!-- RIGHT IMAGE -->
                <div class="col-md-5 text-center">
                    <img src="{{ public_asset('front/img/ksvmabout.webp') }}" alt="About School" class="img-fluid rounded shadow">
                </div>

            </div>
        </div>
    </section>
    <section class="py-5" id="core-values">
        <div class="container">

            <h2 class="text-center fw-bold mb-4">Core Values</h2>

            <!-- Gradient Heading Line -->
            <h4 class="fw-bold text-center gradient-title px-4 py-2 mb-5">
                Laying the foundation of Excellence
            </h4>

            <div class="row g-4">

                <!-- Box 1 -->
                <div class="col-md-3">
                    <div class="core-box">
                        <h5 class="fw-bold">Education</h5>
                        <p>Building strong academic understanding and learning habits.</p>
                    </div>
                </div>

                <!-- Box 2 -->
                <div class="col-md-3">
                    <div class="core-box">
                        <h5 class="fw-bold">Manners</h5>
                        <p>Developing positive behaviour, respect, and values.</p>
                    </div>
                </div>

                <!-- Box 3 -->
                <div class="col-md-3">
                    <div class="core-box">
                        <h5 class="fw-bold">Discipline</h5>
                        <p>Creating self-control, focus and responsibility in students.</p>
                    </div>
                </div>

               
                

            </div>

        </div>
    </section>

    <style>
        /* Gradient top title */
        #core-values .gradient-title {
            background: linear-gradient(90deg, #9b1caa, #d14a8c);
            color: #fff;
            border-radius: 40px;
            display: inline-block;
        }

        /* Core Value Boxes */
        #core-values .core-box {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #eee;
            text-align: center;
            transition: 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        #core-values .core-box:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border-color: #d14a8c;
        }

        #core-values .core-box h5 {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: #2c2c2c;
        }

        #core-values .core-box p {
            font-size: 0.95rem;
            color: #555;
            margin: 0;
        }
    </style>


    <!-- CUSTOM CSS -->
    <style>
        .about-section p {
            font-size: 16px;
            line-height: 1.7;
        }

        .about-section h2 {
            color: #0d1b2a;
            font-size: 32px;
        }

        .about-section img {
            border-radius: 12px;
            transition: 0.3s ease;
        }

        .about-section img:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
    </style>


@endsection
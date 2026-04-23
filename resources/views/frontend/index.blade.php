@extends('frontend.layout.app')
@section('content')

	<div class="main-banner banner_up">
		<div id="rev_slider_34_1_wrapper" class="rev_slider_wrapper" data-alias="news-gallery34">

			<div id="rev_slider_34_1" class="rev_slider" data-version="5.0.7">
				{{-- <ul>
					<li>
						<img src="{{ public_asset('forntend/banner_image/banner19.jpg') }}" alt="" class="">
					</li>
					<li>
						<img src="{{ public_asset('forntend/banner_image/banner15.jpg') }}" alt="" class="">
					</li>
					<li>
						<img src="{{ public_asset('forntend/banner_image/banner3.jpg') }}" alt="" class="">
					</li>
					<li>
						<img src="{{ public_asset('forntend/banner_image/banner4.jpg') }}" alt="" class="">
					</li>
					<li>
						<img src="{{ public_asset('forntend/banner_image/banner5.jpg') }}" alt="" class="">
					</li>
				</ul> --}}
				<ul>
					@forelse($banners ?? [] as $banner)
						<li data-transition="fade">
							<img src="{{ public_asset($banner['image']) }}" alt="{{ $banner['title'] ?? '' }}">

							@if(isset($banner['title']) || isset($banner['subtitle']) || isset($banner['description']))
								@if(isset($banner['title']) || isset($banner['subtitle']) || isset($banner['description']))
									<div class="tp-caption banner-content-left" data-x="left" data-hoffset="50" data-y="center"
										data-transform_in="x:-50px;opacity:0;s:1200;e:Power3.easeOut;" data-start="800">

										@if(isset($banner['subtitle']))
											<h3 class="banner-subtitle-left">{{ $banner['subtitle'] }}</h3>
										@endif

										@if(isset($banner['title']))
											<h1 class="banner-title-left">{{ $banner['title'] }}</h1>
										@endif

										@if(isset($banner['description']))
											<p class="banner-description-left">{{ $banner['description'] }}</p>
										@endif
									</div>
								@endif
							@endif
						</li>
					@empty
						{{-- Default banner agar koi banner nahi hai --}}
						<li>
							<img src="{{ public_asset('forntend/banner_image/banner19.jpg') }}" alt="Default Banner">
						</li>
					@endforelse
				</ul>
				<div class="tp-bannertimer tp-bottom"></div>
			</div>
		</div>
	</div>
	<style>
		/* Banner Content Left Aligned Styles */
		.banner-content-left {
			background: linear-gradient(135deg, rgba(122, 26, 88, 0.90) 0%, rgba(60, 20, 50, 0.85) 100%) !important;
			padding: 50px 60px 50px 45px !important;
			border-radius: 0 30px 30px 0 !important;
			backdrop-filter: blur(18px) !important;
			max-width: 700px !important;
			text-align: left !important;
			position: absolute !important;
			z-index: 999 !important;
			border-left: 6px solid #FFD700 !important;
			box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5) !important;
		}

		.banner-subtitle-left {
			color: #FFD700 !important;
			font-size: 18px !important;
			font-weight: 700 !important;
			text-transform: uppercase !important;
			letter-spacing: 4px !important;
			margin-bottom: 18px !important;
			text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7) !important;
			display: inline-block !important;
			padding-bottom: 10px !important;
			border-bottom: 3px solid #FFD700 !important;
		}

		.banner-title-left {
			color: #FFFFFF !important;
			font-size: 52px !important;
			font-weight: 900 !important;
			line-height: 1.3 !important;
			margin-bottom: 22px !important;
			text-shadow: 4px 4px 10px rgba(0, 0, 0, 0.9) !important;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
		}

		.banner-description-left {
			color: #FFFFFF !important;
			font-size: 18px !important;
			line-height: 1.8 !important;
			margin-bottom: 0 !important;
			text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.8) !important;
			font-weight: 400 !important;
			opacity: 0.95 !important;
		}

		/* Responsive Design */
		@media (max-width: 992px) {
			.banner-content-left {
				padding: 40px 35px !important;
				max-width: 600px !important;
				border-radius: 0 25px 25px 0 !important;
			}

			.banner-subtitle-left {
				font-size: 15px !important;
				letter-spacing: 3px !important;
			}

			.banner-title-left {
				font-size: 40px !important;
			}

			.banner-description-left {
				font-size: 16px !important;
			}
		}

		@media (max-width: 768px) {
			.banner-content-left {
				padding: 30px 25px !important;
				max-width: 90% !important;
				margin-left: 10px !important;
				border-radius: 0 20px 20px 0 !important;
			}

			.banner-subtitle-left {
				font-size: 13px !important;
				letter-spacing: 2px !important;
			}

			.banner-title-left {
				font-size: 30px !important;
			}

			.banner-description-left {
				font-size: 15px !important;
			}
		}

		@media (max-width: 480px) {
			.banner-content-left {
				padding: 25px 20px !important;
				border-left: 4px solid #FFD700 !important;
			}

			.banner-subtitle-left {
				font-size: 11px !important;
			}

			.banner-title-left {
				font-size: 24px !important;
			}

			.banner-description-left {
				font-size: 13px !important;
			}
		}
	</style>
	<!--  Main Banner End Here-->

	<main class="container my-5">
		<section class="hero p-5 mb-4">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<h1 class="display-6 fw-bold" style="color:#7a1a58;">Welcome to K.S.V.M. Education Centre</h1>
					<p class="tagline mb-3">
						We at <strong>K.S.V.M.</strong> provide a happy, caring and safe environment for your child with a
						priority
						given to develop high standards of education.
					</p>

					<p>
						Our work is supported by a good level of resources and additional staffing to meet the individual
						needs
						of the children. We work hard to ensure that each child has acquired the study skills necessary for
						them
						to continue their development at the next stage of education.
					</p>

					<div class="mt-4">
						<a href="{{ route('home.aboutus') }}" class="btn btn-primary me-2">Learn More</a>
						<a href="{{ route('home.contact') }}" class="btn btn-outline-secondary">Contact Us</a>
					</div>
				</div>
			</div>
		</section>
		<!-- WHY CHOOSE US SECTION -->
		<section class="py-5" style="background:#f2eff2;">
			<div class="container">
				<h2 class="text-center fw-bold mb-4 heading">Why Choose Us?</h2>

				<div class="row g-4">

					<!-- Box 1 -->
					<div class="col-md-3">
						<div class="choose-box p-4 bg-white rounded shadow-sm text-center">
							<h5 class="fw-bold mb-2 box-title">Safe Environment</h5>
							<p class="small text-muted">We ensure a secure, caring and happy atmosphere for all children.
							</p>
						</div>
					</div>

					<!-- Box 2 -->
					<div class="col-md-3">
						<div class="choose-box p-4 bg-white rounded shadow-sm text-center">
							<h5 class="fw-bold mb-2 box-title">Individual Attention</h5>
							<p class="small text-muted">Special care & support for each child's unique learning needs.</p>
						</div>
					</div>

					<!-- Box 3 -->
					<div class="col-md-3">
						<div class="choose-box p-4 bg-white rounded shadow-sm text-center">
							<h5 class="fw-bold mb-2 box-title">Experienced Staff</h5>
							<p class="small text-muted">Highly trained teachers providing quality education.</p>
						</div>
					</div>

					<!-- Box 4 -->
					<div class="col-md-3">
						<div class="choose-box p-4 bg-white rounded shadow-sm text-center">
							<h5 class="fw-bold mb-2 box-title">Modern Facilities</h5>
							<p class="small text-muted">Well-equipped classrooms and learning resources.</p>
						</div>
					</div>

				</div>
			</div>
		</section>

		<!-- HOVER EFFECT CSS -->
		<style>
			.choose-box {
				transition: 0.3s ease-in-out;
				border: 2px solid transparent;
			}

			.choose-box:hover {
				transform: translateY(-8px);
				border-color: #7a1a58;
				box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
			}
		</style>
		<!-- INFO CARDS SECTION -->
		<div class="section">
			<div class="container">
				<h2 class="text-center fw-bold mb-4 heading">What We Provide</h2>

				<div class="row g-4">

					<!-- Card 1 -->
					<div class="col-md-4">
						<div class="info-card p-4 text-center bg-white rounded shadow-sm">

							<div class="fw-bold box-title">Our Mission</div>
							<p class="small text-muted mt-2">
								To nurture confident, independent learners ready for the next stage of education.
							</p>
						</div>
					</div>

					<!-- Card 2 -->
					<div class="col-md-4">
						<div class="info-card p-4 text-center bg-white rounded shadow-sm">

							<div class="fw-bold box-title">Facilities</div>
							<p class="small text-muted mt-2">
								Well-equipped classrooms, trained staff, and additional support resources.
							</p>
						</div>
					</div>

					<!-- Card 3 -->
					<div class="col-md-4">
						<div class="info-card p-4 text-center bg-white rounded shadow-sm">

							<div class="fw-bold box-title">Admissions</div>
							<p class="small text-muted mt-2">
								Admissions are open — Contact us to schedule a visit or get more details.
							</p>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="section">
			<div class="heading">OUR STRENGTH</div>
			<hr class="heading-hr">

			<div class="row g-4">

				<div class="col-md-6 col-lg-4">
					<div class="box text-center">
						{{-- <div class="box-icon">🏆</div> --}}
						<div class="box-title">Our Excellence</div>
						<div class="box-text">We guide each child to unlock his/her true potential and inspire them to reach
							greater heights of glory.</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-4">
					<div class="box text-center">
						{{-- <div class="box-icon">🌱</div> --}}
						<div class="box-title">Holistic Development</div>
						<div class="box-text">An efficient and effective education system is incorporated for the complete
							development of the child.</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-4">
					<div class="box text-center">
						{{-- <div class="box-icon">👤</div> --}}
						<div class="box-title">Personal Attention</div>
						<div class="box-text">Each student’s progress is monitored and guided to build confidence and skills
							for life challenges.</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-4">
					<div class="box text-center">
						{{-- <div class="box-icon">🏫</div> --}}
						<div class="box-title">Best – In – Class Infrastructure</div>
						<div class="box-text">State‑of‑the‑art facilities ensure smooth and effective learning for all
							students.</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-4">
					<div class="box text-center">
						{{-- <div class="box-icon">🛡️</div> --}}
						<div class="box-title">Safe Campus</div>
						<div class="box-text">CCTV‑monitored, eco‑friendly campus ensuring complete safety and comfort for
							students.</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-4">
					<div class="box text-center">
						{{-- <div class="box-icon">🤝</div> --}}
						<div class="box-title">Supportive Environment</div>
						<div class="box-text">A positive and encouraging atmosphere helps children grow emotionally and
							academically.</div>
					</div>
				</div>

			</div>
		</div>

		<style>
			.section {
				/* max-width: 1000px; */
				margin: 40px auto;
				background: #f2eff2;
				padding: 30px;
				border-radius: 10px;
				box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
			}

			.heading {
				text-align: center;
				font-size: 30px;
				font-weight: bold;
				color: #7a1a58;
				margin-bottom: 15px;
			}

			/* Styled HR */
			.heading-hr {
				width: 80px;
				height: 3px;
				background: #7a1a58;
				border: none;
				margin: 0 auto 30px auto;
				border-radius: 2px;
			}

			.box {
				background: #fff;
				border: 2px solid #d4bdd0;
				border-radius: 10px;
				padding: 18px 20px;
				height: 100%;
				transition: 0.3s;
			}

			.box:hover {
				transform: translateY(-4px);
				box-shadow: 0 6px 15px rgba(0, 0, 0, 0.12);
			}

			.box-icon {
				width: 60px;
				height: 60px;
				background: #7a1a58;
				color: #fff;
				border-radius: 50%;
				display: flex;
				align-items: center;
				justify-content: center;
				font-size: 26px;
				margin-bottom: 12px;
			}

			.box-title {
				font-weight: bold;
				color: #7a1a58;
				margin-bottom: 8px;
				font-size: 17px;
			}

			.box-text {
				font-size: 14px;
				color: #333;
			}

			/* ICON PROPER CENTER */
			.icon-box {
				width: 75px;
				height: 75px;
				background: #e8f0ff;
				border-radius: 50%;
				display: flex;
				align-items: center;
				justify-content: center;
				font-size: 32px;
				color: #7a1a58;

				position: absolute;
				top: -35px;
				left: 50%;
				transform: translateX(-50%);
				/* 👈 PERFECT CENTER */

				transition: 0.3s ease-in-out;
				box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
			}

			/* CARD CONTAINER MUST BE RELATIVE */
			.info-card {
				position: relative;
				/* 👈 Important */
				border: 1px solid #eee;
				padding-top: 50px;
				padding-bottom: 30px;
				transition: 0.3s ease;
				border-radius: 15px;
			}

			/* HOVER EFFECTS */
			.info-card:hover {
				transform: translateY(-8px);
				border-color: #7a1a58;
				box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
			}

			.info-card:hover .icon-box {
				background: #7a1a58;
				color: white;
				transform: translateX(-50%) scale(1.1);
			}


			/* HEADING STYLE */
			.info-card h5 {
				margin-top: 15px;
				font-weight: 700;
				color: #1f1f1f;
			}

			.info-card p {
				margin-top: 10px;
				padding: 0 10px;
			}
		</style>

	</main>

	<!-- our_team -->
	<section id="team_about" class="ptb-40 pb-0 ptb-xs-40   mb-sm-30 mb-xs-30">
		<div class="container">

			<div class="row">
				<div class="col-lg-8">
					<div class="col-md-12 pb-40 pb-xs-40">
						<div class="sec-title">
							<h2>Photogallery</h2>
						</div>
					</div>
					<div class="team-pagination owl-carousel" data-pagination="false" data-items="3" data-loop="true"
						data-margin="10" data-center="false" data-navigation="true" data-desktop="3" data-desktopsmall="3"
						data-tablet="2" data-mobile="1" data-autoplay="true" data-autotime="2000"
						data-autoplayHoverPause="true" data-prev="fa fa-angle-left" data-next="fa fa-angle-right">
						@foreach ($gallery as $gallery)
							<div class="team-member col-lg-3 col-md-6 mb-xs-30">
								<div class="box-hover img-scale">
									<figure>
										<a href="photo-category.html">
											<img src="{{ public_asset('images/' . $gallery->image) }}" alt="">
										</a>
									</figure>
								</div>
							</div>
						@endforeach

					</div>
				</div><!--col-lg-8-->

				<div class="col-lg-4">
					<div class="col-md-12 pb-40 pb-xs-40">
						<div class="sec-title">
							<h2>Latest News</h2>
						</div>
					</div>
					<div class="holder">
						<ul class="course__details_block scroll-up">
							@if(count($admissions) > 0)
								@foreach($admissions as $admissions)
									<li>
										<a href="{{ route('home.admission.details', $admissions->slug) }}">
											Admissions : {{ $admissions->title }}
										</a>
									</li>
								@endforeach
							@endif
							@if(count($exam) > 0)
								@foreach($exam as $news)
									<li>
										<a href="{{ route('home.exam.details', $news->slug) }}">
											Exam : {{ $news->title }}
										</a>
									</li>
								@endforeach
							@endif
							@if(count($notices) > 0)
								@foreach($notices as $notices)
									<li>
										<a href="{{ route('home.exam.details', $notices->slug) }}">
											Notice : {{ $notices->name }} 
										</a>
									</li>
								@endforeach
							@endif
						</ul>
					</div>
				</div><!--col-lg-4-->



			</div>
		</div>
	</section>
	<!-- our_team End-->

	<style>
		.holder {
			height: 200px;
			/* box ki height */
			overflow: hidden;
			/* bahar na nikle */
			position: relative;
		}

		.course__details_block {
			list-style: none;
			padding: 0;
			margin: 0;
		}

		.scroll-up {
			animation: scrollUp 12s linear infinite;
		}

		@keyframes scrollUp {
			0% {
				transform: translateY(100%);
				/* bottom se start */
			}

			100% {
				transform: translateY(-100%);
				/* top se bahar chala jaye */
			}
		}

		.holder li {
			padding: 8px 0;
		}

		.holder {
			border: 1px solid #ccc;
			width: 100%;
			height: 190px;
			overflow: hidden;
			padding: 10px;
			font-family: Helvetica;
		}

		.holder .mask {
			position: relative;
			left: 0px;
			top: 10px;
			width: 100%;
			height: 180px;
			overflow: hidden;
		}

		.holder ul {
			list-style: none;
			margin: 0;
			padding: 0;
			position: relative;
		}

		.holder ul li {
			padding: 10px 0px;
			font-size: 12px;
		}

		.holder ul li a {
			color: darkred;
			text-decoration: none;
		}
	</style>
@endsection
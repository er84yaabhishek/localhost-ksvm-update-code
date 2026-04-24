<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $siteSettings['site_name'] ?? 'KSVM - Education Center' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ public_asset($siteSettings['logo'] ?? 'front/img/ksvm.jpeg') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Existing CSS (keep all) -->
    <link href="{{ public_asset('forntend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ public_asset('forntend/css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ public_asset('forntend/css/settings.css') }}" rel="stylesheet" media="screen">
    <link href="{{ public_asset('forntend/css/layers.css') }}" rel="stylesheet" media="screen">
    <link href="{{ public_asset('forntend/css/owl.carousel.css') }}" rel="stylesheet" media="screen">
    <link href="{{ public_asset('forntend/css/style.css') }}" rel="stylesheet">
    <link href="{{ public_asset('forntend/css/header.css') }}" rel="stylesheet">
    <link href="{{ public_asset('forntend/css/footer.css') }}" rel="stylesheet">
    <link href="{{ public_asset('forntend/css/index.css') }}" rel="stylesheet">
    <link href="{{ public_asset('forntend/css/default.css') }}" rel="stylesheet" id="theme-color">

    <!-- Icons & Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #7a1a58;
            --primary-dark: #5a1240;
            --primary-light: #b17eb1;
            --gold: #FFD700;
            --text-dark: #1a1a2e;
            --text-muted: #6c757d;
            --bg-light: #f8f4f8;
        }

        * { font-family: 'Poppins', sans-serif; }

        /* ===== TOP BAR ===== */
        .ksvm-topbar {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            padding: 8px 0;
            font-size: 13px;
        }
        .ksvm-topbar a { color: #ccc; text-decoration: none; transition: color 0.3s; }
        .ksvm-topbar a:hover { color: var(--gold); }
        .ksvm-topbar .contact-item { color: #ccc; display: flex; align-items: center; gap: 6px; }
        .ksvm-topbar .contact-item i { color: var(--gold); }
        .ksvm-topbar .social-links a {
            width: 28px; height: 28px; border-radius: 50%;
            background: rgba(255,255,255,0.1);
            display: inline-flex; align-items: center; justify-content: center;
            color: #ccc; font-size: 12px; transition: all 0.3s;
        }
        .ksvm-topbar .social-links a:hover { background: var(--primary); color: #fff; }

        /* ===== NAVBAR ===== */
        .ksvm-navbar {
            background: #fff;
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.3s;
        }
        .ksvm-navbar.scrolled {
            box-shadow: 0 4px 30px rgba(122,26,88,0.15);
        }
        .ksvm-navbar .logo img {
            height: 70px;
            width: auto;
            transition: height 0.3s;
        }
        .ksvm-navbar.scrolled .logo img { height: 55px; }

        /* Nav Links */
        .ksvm-nav { list-style: none; margin: 0; padding: 0; display: flex; align-items: center; gap: 4px; }
        .ksvm-nav > li > a {
            display: block;
            padding: 28px 14px;
            color: var(--text-dark);
            font-weight: 500;
            font-size: 14px;
            text-decoration: none;
            position: relative;
            transition: color 0.3s;
            white-space: nowrap;
        }
        .ksvm-nav > li > a::after {
            content: '';
            position: absolute;
            bottom: 0; left: 50%; right: 50%;
            height: 3px;
            background: var(--primary);
            transition: all 0.3s;
            border-radius: 3px 3px 0 0;
        }
        .ksvm-nav > li > a:hover,
        .ksvm-nav > li > a.active {
            color: var(--primary);
        }
        .ksvm-nav > li > a:hover::after,
        .ksvm-nav > li > a.active::after {
            left: 10px; right: 10px;
        }

        /* Dropdown */
        .ksvm-nav .has-dropdown { position: relative; }
        .ksvm-nav .dropdown-menu-custom {
            display: none;
            position: absolute;
            top: 100%; left: 0;
            background: #fff;
            min-width: 200px;
            border-radius: 8px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.12);
            border-top: 3px solid var(--primary);
            padding: 8px 0;
            z-index: 999;
        }
        .ksvm-nav .has-dropdown:hover .dropdown-menu-custom { display: block; }
        .ksvm-nav .dropdown-menu-custom a {
            display: block;
            padding: 10px 20px;
            color: var(--text-dark);
            font-size: 14px;
            text-decoration: none;
            transition: all 0.2s;
        }
        .ksvm-nav .dropdown-menu-custom a:hover {
            background: var(--bg-light);
            color: var(--primary);
            padding-left: 26px;
        }

        /* Admission Button */
        .btn-admission {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff !important;
            padding: 10px 22px !important;
            border-radius: 25px !important;
            font-weight: 600 !important;
            font-size: 13px !important;
            transition: all 0.3s !important;
            box-shadow: 0 4px 15px rgba(122,26,88,0.3);
        }
        .btn-admission::after { display: none !important; }
        .btn-admission:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(122,26,88,0.4) !important;
            color: #fff !important;
        }

        /* Mobile Toggle */
        .mobile-toggle {
            display: none;
            background: none;
            border: 2px solid var(--primary);
            border-radius: 6px;
            padding: 6px 10px;
            cursor: pointer;
            color: var(--primary);
            font-size: 18px;
        }

        /* Mobile Menu */
        @media (max-width: 991px) {
            .mobile-toggle { display: block; }
            .ksvm-nav-wrapper {
                display: none;
                position: absolute;
                top: 100%; left: 0; right: 0;
                background: #fff;
                box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                padding: 10px 0;
                z-index: 999;
            }
            .ksvm-nav-wrapper.open { display: block; }
            .ksvm-nav { flex-direction: column; align-items: stretch; gap: 0; }
            .ksvm-nav > li > a { padding: 12px 20px; border-bottom: 1px solid #f0f0f0; }
            .ksvm-nav > li > a::after { display: none; }
            .ksvm-nav .dropdown-menu-custom {
                position: static;
                box-shadow: none;
                border-top: none;
                border-left: 3px solid var(--primary);
                margin-left: 20px;
                display: block;
                background: #fafafa;
            }
            .ksvm-topbar .d-flex { flex-wrap: wrap; gap: 8px !important; }
        }

        /* Page Banner */
        .page-banner {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 60px 0 40px;
            position: relative;
            overflow: hidden;
        }
        .page-banner::before {
            content: '';
            position: absolute;
            top: -50%; right: -10%;
            width: 400px; height: 400px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
        }
        .page-banner h1 {
            color: #fff;
            font-size: 36px;
            font-weight: 700;
            margin: 0;
        }
        .page-banner .breadcrumb-nav { margin-top: 10px; }
        .page-banner .breadcrumb-nav a { color: rgba(255,255,255,0.7); text-decoration: none; font-size: 14px; }
        .page-banner .breadcrumb-nav a:hover { color: var(--gold); }
        .page-banner .breadcrumb-nav span { color: rgba(255,255,255,0.5); font-size: 14px; }

        /* Global Styles */
        .section-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--primary);
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 10px;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0; left: 50%;
            transform: translateX(-50%);
            width: 60px; height: 3px;
            background: var(--gold);
            border-radius: 2px;
        }
        .section-title.left::after { left: 0; transform: none; }
        .section-subtitle { color: var(--text-muted); font-size: 16px; }

        .hero { background: var(--bg-light); border-radius: 16px; }
        .tagline { font-size: 1.05rem; color: #555; }
        .title { text-align: center; font-size: 32px; font-weight: bold; color: var(--primary); margin-bottom: 10px; }

        /* WhatsApp Float Button */
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 9999;
        }
        .whatsapp-float a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 58px; height: 58px;
            background: #25D366;
            border-radius: 50%;
            color: #fff;
            font-size: 28px;
            text-decoration: none;
            box-shadow: 0 6px 20px rgba(37,211,102,0.4);
            transition: all 0.3s;
            animation: pulse-wa 2s infinite;
        }
        .whatsapp-float a:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 25px rgba(37,211,102,0.6);
            color: #fff;
        }
        .whatsapp-float .wa-tooltip {
            position: absolute;
            right: 70px; top: 50%;
            transform: translateY(-50%);
            background: #1a1a2e;
            color: #fff;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
        }
        .whatsapp-float:hover .wa-tooltip { opacity: 1; }
        @keyframes pulse-wa {
            0% { box-shadow: 0 0 0 0 rgba(37,211,102,0.5); }
            70% { box-shadow: 0 0 0 12px rgba(37,211,102,0); }
            100% { box-shadow: 0 0 0 0 rgba(37,211,102,0); }
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="sk-circle">
            <div class="sk-circle1 sk-child"></div><div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div><div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div><div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div><div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div><div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div><div class="sk-circle12 sk-child"></div>
        </div>
    </div>

    <!-- WhatsApp Float Button -->
    @php $waNumber = preg_replace('/[^0-9]/', '', $siteSettings['social_whatsapp'] ?? '917084183114'); @endphp
    @if(!empty($waNumber))
    <div class="whatsapp-float">
        <span class="wa-tooltip"><i class="fab fa-whatsapp"></i> Chat on WhatsApp</span>
        <a href="https://wa.me/{{ $waNumber }}?text=Hello%2C%20I%20have%20a%20query%20about%20KSVM%20Education%20Centre"
           target="_blank" rel="noopener noreferrer" title="Chat on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
    @else
    <div class="whatsapp-float">
        <span class="wa-tooltip"><i class="fab fa-whatsapp"></i> Chat on WhatsApp</span>
        <a href="https://wa.me/917084183114?text=Hello%2C%20I%20have%20a%20query%20about%20KSVM%20Education%20Centre"
           target="_blank" rel="noopener noreferrer" title="Chat on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
    @endif

    <!-- Top Bar -->
    <div class="ksvm-topbar">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div class="d-flex gap-4 flex-wrap">
                    @if(!empty($siteSettings['header_phone']))
                    <span class="contact-item">
                        <i class="fas fa-phone-alt"></i>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', explode(',', $siteSettings['header_phone'])[0]) }}">
                            {{ $siteSettings['header_phone'] }}
                        </a>
                    </span>
                    @endif
                    @if(!empty($siteSettings['header_email']))
                    <span class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:{{ $siteSettings['header_email'] }}">{{ $siteSettings['header_email'] }}</a>
                    </span>
                    @endif
                </div>
                <div class="social-links d-flex gap-2">
                    @if(!empty($siteSettings['social_facebook']))
                        <a href="{{ $siteSettings['social_facebook'] }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if(!empty($siteSettings['social_instagram']))
                        <a href="{{ $siteSettings['social_instagram'] }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if(!empty($siteSettings['social_youtube']))
                        <a href="{{ $siteSettings['social_youtube'] }}" target="_blank"><i class="fab fa-youtube"></i></a>
                    @endif
                    @if(!empty($siteSettings['social_twitter']))
                        <a href="{{ $siteSettings['social_twitter'] }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if(!empty($waNumber))
                        <a href="https://wa.me/{{ $waNumber }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navbar -->
    <nav class="ksvm-navbar" id="mainNav">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between py-1">
                <!-- Logo -->
                <a href="{{ route('home.index') }}" class="logo">
                    <img src="{{ public_asset($siteSettings['logo'] ?? 'front/img/ksvm.jpeg') }}"
                         alt="{{ $siteSettings['site_name'] ?? 'KSVM' }}">
                </a>

                <!-- Mobile Toggle -->
                <button class="mobile-toggle" id="mobileToggle">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Nav Links -->
                <div class="ksvm-nav-wrapper" id="navWrapper">
                    <ul class="ksvm-nav">
                        @if($navMenuItems->count() > 0)
                            @foreach($navMenuItems as $menuItem)
                                @php
                                    $isActive = false;
                                    if (!empty($menuItem->route)) {
                                        try { $isActive = Route::is($menuItem->route); } catch(\Exception $e) {}
                                    }
                                @endphp
                                <li>
                                    <a href="{{ $menuItem->url }}"
                                       target="{{ $menuItem->target ?? '_self' }}"
                                       class="{{ $isActive ? 'active' : '' }}">
                                        {{ $menuItem->label }}
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <li><a href="{{ route('home.index') }}" class="{{ Route::is('home.index') ? 'active' : '' }}">Home</a></li>
                            <li><a href="{{ route('home.aboutus') }}" class="{{ Route::is('home.aboutus') ? 'active' : '' }}">About Us</a></li>
                            <li><a href="{{ route('home.courses') }}" class="{{ Route::is('home.courses') ? 'active' : '' }}">Courses</a></li>
                            <li><a href="{{ route('home.exam') }}" class="{{ Route::is('home.exam') ? 'active' : '' }}">Exam</a></li>
                            <li><a href="{{ route('home.admissions') }}" class="{{ Route::is('home.admissions') ? 'active' : '' }}">Admissions</a></li>
                            <li class="has-dropdown">
                                <a href="javascript:void(0);">Activities <i class="fas fa-chevron-down" style="font-size:10px;"></i></a>
                                <div class="dropdown-menu-custom">
                                    <a href="{{ route('home.gallery') }}"><i class="fas fa-images me-2"></i>Gallery</a>
                                    <a href="{{ route('home.events') }}"><i class="fas fa-calendar-alt me-2"></i>Events</a>
                                </div>
                            </li>
                            <li><a href="{{ route('home.contact') }}" class="{{ Route::is('home.contact') ? 'active' : '' }}">Contact</a></li>
                        @endif
                        <li><a href="{{ route('home.admissions') }}" class="btn-admission">Apply Now</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <script>
        // Mobile toggle
        document.getElementById('mobileToggle').addEventListener('click', function() {
            document.getElementById('navWrapper').classList.toggle('open');
        });
        // Sticky navbar
        window.addEventListener('scroll', function() {
            var nav = document.getElementById('mainNav');
            if (window.scrollY > 50) nav.classList.add('scrolled');
            else nav.classList.remove('scrolled');
        });
    </script>

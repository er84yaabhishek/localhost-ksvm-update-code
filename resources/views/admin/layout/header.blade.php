<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <title>Admin - KSVM - Education Center</title>
    {{--
    <link rel="icon" href="{{ public_asset('admin/assets/front/img/5f4b444b9e646.png') }}"> --}}
    <link rel="icon" type="image/png" href="{{ public_asset('front/img/ksvm.jpeg') }}">
    <!-- Fonts and icons -->
    <script src="{{ public_asset('admin/assets/admin/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        "use strict";
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: [
                    '{{ public_asset('
                                                                                                                                                                                                                                            admin / assets / admin / css / fonts.min.css ') }}'
                ]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- CSS Files -->
    <link href="{{ public_asset('admin/assets/front/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/fontawesome-iconpicker.min.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/jquery.dm-uploader.min.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/front/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/jquery.timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/mdtimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/atlantis.min.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/custom.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/login.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script> --}}


</head>

<body data-background-color="dark">
    <div class="wrapper ">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark2">
                <a href="" class="logo" target="_blank">
                    <img src="{{ public_asset('front/img/ksvm.jpeg') }}" alt="navbar brand" class="navbar-brand" width="120">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                      <i class="fa fa-bars"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->
            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ public_asset('admin/assets/admin/img/propics/5f5797dbc520b.png') }}" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg">
                                                <img src="{{ public_asset('admin/assets/admin/img/propics/5f5797dbc520b.png') }}"
                                                    alt="..." class="avatar-img rounded">
                                            </div>
                                            <div class="u-text">
                                                <h4>
                                                    @if (Auth::check())
                                                        {{ Auth::user()->name }}
                                                    @endif
                                                </h4>
                                                <p class="text-muted">
                                                    @if (Auth::check())
                                                        {{ Auth::user()->email }}
                                                    @endif
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        {{-- <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ url('/edit') }}">Edit
                                            Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ url('/changepass') }}">Change
                                            Password</a> --}}
                                        <div class="dropdown-divider"></div>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item" type="submit">Logout</button>
                                        </form>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
        <div class="sidebar sidebar-style-2" data-background-color="dark2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="{{ public_asset('admin/assets/admin/img/propics/5f5797dbc520b.png') }}" alt="..."
                                class="avatar-img rounded">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    @if (Auth::check())
                                        {{ Auth::user()->name }}
                                    @endif
                                    <span class="user-level">
                                        @if (Auth::check())
                                            {{ Auth::user()->role }}
                                        @endif
                                    </span>
                                    <span class="caret"></span>
                                </span>
                            </a>
                            <style>
                                .sideMenuLogout {
                                    all: unset;
                                    /* Resets all styles */
                                    background: none;
                                    /* Removes background */
                                    border: none;
                                    /* Removes border */
                                    padding: 0;
                                    /* Removes padding */
                                    font: inherit;
                                    /* Inherits font styles from parent */
                                    cursor: pointer;
                                    /* Adds pointer cursor on hover */
                                }
                            </style>
                            <div class="clearfix"></div>
                            <div class="collapse in" id="collapseExample">
                                <ul class="nav">
                                    {{-- <li>
                                        <a href="{{ url('/edit') }}">
                                            <span class="link-collapse">Edit Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/changepass') }}">
                                            <span class="link-collapse">Change Password</span>
                                        </a>
                                    </li> --}}
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="link-collapse sideMenuLogout" type="submit">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        <div class="row mb-2">
                            <div class="col-12">
                                <form action="">
                                    <div class="form-group py-0">
                                        <input name="term" type="text" class="form-control sidebar-search" value=""
                                            placeholder="Search Menu Here...">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <li class="nav-item  {{ Route::is('admin.dashboard') ? 'active' : '' }} ">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-box "></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        {{-- Home Page Management --}}
                        <li class="nav-item {{ Route::is('admin.homepage.*') ? 'active' : '' }}">
                            <a data-toggle="collapse" href="#homepageManage"
                                aria-expanded="{{ Route::is('admin.homepage.*') ? 'true' : 'false' }}">
                                <i class="fas fa-home"></i>
                                <p>Home Page</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse {{ Route::is('admin.homepage.*') ? 'show' : '' }}" id="homepageManage">
                                <ul class="nav nav-collapse">
                                    <li class="{{ Route::is('admin.homepage.hero') ? 'active' : '' }}">
                                        <a href="{{ route('admin.homepage.hero') }}">
                                            <span class="sub-item">Hero Section</span>
                                        </a>
                                    </li>
                                    <li class="{{ Route::is('admin.homepage.why') ? 'active' : '' }}">
                                        <a href="{{ route('admin.homepage.why') }}">
                                            <span class="sub-item">Why Choose Us</span>
                                        </a>
                                    </li>
                                    <li class="{{ Route::is('admin.homepage.provide') ? 'active' : '' }}">
                                        <a href="{{ route('admin.homepage.provide') }}">
                                            <span class="sub-item">What We Provide</span>
                                        </a>
                                    </li>
                                    <li class="{{ Route::is('admin.homepage.strength') ? 'active' : '' }}">
                                        <a href="{{ route('admin.homepage.strength') }}">
                                            <span class="sub-item">Our Strength</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li
                            class="nav-item {{ Route::is('admin.event') || Route::is('admin.exam') || Route::is('admin.gallery') || Route::is('admin.admission') || Route::is('admin.updates.news') || Route::is('admin.policy') ? 'active' : '' }}">
                            <a data-toggle="collapse" href="#orderManagement"
                                aria-expanded="{{ Route::is('admin.event') || Route::is('admin.exam') || Route::is('admin.gallery') || Route::is('admin.admission') || Route::is('admin.updates.news') || Route::is('admin.policy') ? 'true' : 'false' }}">
                                <i class="fas fa-box"></i>
                                <p>Site Setting</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse {{ Route::is('admin.event') || Route::is('admin.exam') || Route::is('admin.gallery') || Route::is('admin.admission') || Route::is('admin.updates.news') || Route::is('admin.policy') ? 'show' : '' }}"
                                id="orderManagement">
                                <ul class="nav nav-collapse">
                                    <li class="{{ Route::is('admin.gallery') ? 'active' : '' }}">
                                        <a href="{{ route('admin.gallery') }}">
                                            <span class="sub-item">Gallery</span>
                                        </a>
                                    </li>
                                     <li class="{{ Route::is('admin.event') ? 'active' : '' }}">
                                        <a href="{{ route('admin.event') }}">
                                            <span class="sub-item">Event</span>
                                        </a>
                                    </li>
                                    <li class="{{ Route::is('admin.admission') ? 'active' : '' }}">
                                        <a href="{{ route('admin.admission') }}">
                                            <span class="sub-item">Admission </span>
                                        </a>
                                    </li>
                                    <li class="{{ Route::is('admin.exam') ? 'active' : '' }}">
                                        <a href="{{ route('admin.exam') }}">
                                            <span class="sub-item">Exam</span>
                                        </a>
                                    </li>
                                    <li class="{{ Route::is('admin.policy') ? 'active' : '' }}">
                                        <a href="{{ route('admin.policy') }}">
                                            <span class="sub-item">Our page's</span>
                                        </a>
                                    </li>
                                    <li class="{{ Route::is('admin.banners.index') ? 'active' : '' }}">
                                        <a href="{{ route('admin.banners.index') }}">
                                            <span class="sub-item">Home Banners</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item  {{ Route::is('admin.admission.contact') ? 'active' : '' }} ">
                            <a href="{{ route('admin.admission.contact') }}">
                               <i class="fas fa-box"></i>
                                <p>Admission Inquiry</p>
                            </a>
                        </li>
                        <li class="nav-item  {{ Route::is('admin.contact') ? 'active' : '' }} ">
                            <a href="{{ route('admin.contact') }}">
                                <i class="fas fa-box"></i>
                                <p>Contact Us Inquiry</p>
                            </a>
                        </li>
                         <li class="nav-item  {{ Route::is('admin.registrations') ? 'active' : '' }} ">
                            <a href="{{ route('admin.registrations') }}">
                                <i class="fas fa-box"></i>
                                <p>Registration Inquiry</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
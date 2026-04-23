<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">
    <div class="container-fluid">
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
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
                                    <img src="{{ public_asset('admin/assets/admin/img/propics/5f5797dbc520b.png') }}" alt="..."
                                        class="avatar-img rounded">
                                </div>
                                <div class="u-text">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <p class="text-muted">{{ Auth::user()->email }}</p><a href="{{ url('edit') }}"
                                        class="btn btn-xs btn-secondary btn-sm">Edit Profile</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('/edit') }}">Edit
                                Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('/changepass') }}">Change
                                Password</a>
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
                            {{ Auth::user()->name }}
                            <span class="user-level">{{ Auth::user()->role }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{ url('/edit') }}">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/changepass') }}">
                                    <span class="link-collapse">Change Password</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}">
                                    <span class="link-collapse">Logout</span>
                                </a>
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
                <li class="nav-item  active ">
                    <a href="{{ url('/admin/dashboard') }}">
                        <i class="la flaticon-paint-palette"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#pos">
                        <i class="fas fa-cart-plus"></i>
                        <p>POS</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="pos">
                        <ul class="nav nav-collapse">
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/pos">
                                    <span class="sub-item">POS</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/pos/payment-methods">
                                    <span class="sub-item">Payment Methods</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item
">
                    <a data-toggle="collapse" href="#orderManagement">
                        <i class="fas fa-box"></i>
                        <p>Order Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse
" id="orderManagement">
                        <ul class="nav nav-collapse">
                            <li class="
    ">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/order/settings">
                                    <span class="sub-item">Settings</span>
                                </a>
                            </li>
                            <li class="
    ">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/product/orders">
                                    <span class="sub-item">Orders</span>
                                </a>
                            </li>
                            <li class="
            ">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/orders/sales-report">
                                    <span class="sub-item">Sales Reports</span>
                                </a>
                            </li>
                            <li class="
    ">
                                <a
                                    href="https://codecanyon8.kreativdev.com/superv/demo/admin/product/order/serving-methods">
                                    <span class="sub-item">Serving Methods</span>
                                </a>
                            </li>
                            <li class="
    ">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/postalcodes?language=en">
                                    <span class="sub-item">Postal Codes</span>
                                </a>
                            </li>
                            <li class="
    ">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/shipping?language=en">
                                    <span class="sub-item">Shipping Charges</span>
                                </a>
                            </li>
                            <li class="
    ">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/coupon">
                                    <span class="sub-item">Coupons</span>
                                </a>
                            </li>
                            <li class="
    ">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/ordertime">
                                    <span class="sub-item">Order Time Management</span>
                                </a>
                            </li>
                            <li class="
    ">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/deliverytime">
                                    <span class="sub-item">Delivery Time Frames Management</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item
">
                    <a data-toggle="collapse" href="#customers">
                        <i class="la flaticon-users"></i>
                        <p>Customers</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse
" id="customers">
                        <ul class="nav nav-collapse">
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/register/users">
                                    <span class="sub-item">Registered Customers</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/customers">
                                    <span class="sub-item">Customers</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item
            ">
                    <a data-toggle="collapse" href="#category">
                        <i class="fas fa-hamburger"></i>
                        <p>Items Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse
            " id="category">
                        <ul class="nav nav-collapse">
                            <li class="
    ">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/category?language=en">
                                    <span class="sub-item">Category & Tax</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/subcategory?language=en">
                                    <span class="sub-item">Subcategories</span>
                                </a>
                            </li>
                            <li class="
    ">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/product?language=en">
                                    <span class="sub-item">Items</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item
">
                    <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/qr-code">
                        <i class="fas fa-qrcode"></i>
                        <p>QR Code Builder</p>
                    </a>
                </li>
                <li class="nav-item
">
                    <a data-toggle="collapse" href="#gateways">
                        <i class="la flaticon-paypal"></i>
                        <p>Payment Gateways</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse
" id="gateways">
                        <ul class="nav nav-collapse">
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/gateways">
                                    <span class="sub-item">Online Gateways</span>
                                </a>
                            </li>
                            <li class="">
                                <a
                                    href="https://codecanyon8.kreativdev.com/superv/demo/admin/offline/gateways?language=en">
                                    <span class="sub-item">Offline Gateways</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item
">
                    <a data-toggle="collapse" href="#reservSet">
                        <i class="fas fa-utensils"></i>
                        <p>Reservation Settings</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse
" id="reservSet">
                        <ul class="nav nav-collapse">
                            <li class="
    ">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/reservations/visibility">
                                    <span class="sub-item">Visibility</span>
                                </a>
                            </li>
                            <li class="
    ">
                                <a
                                    href="https://codecanyon8.kreativdev.com/superv/demo/admin/table/section?language=en">
                                    <span class="sub-item">Text & Image</span>
                                </a>
                            </li>
                            <li class="
    ">
                                <a
                                    href="https://codecanyon8.kreativdev.com/superv/demo/admin/reservation/form?language=en">
                                    <span class="sub-item">Form Builder</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item  ">
                    <a data-toggle="collapse" href="#table">
                        <i class="fas fa-utensils"></i>
                        <p>Table Reservations</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse  " id="table">
                        <ul class="nav nav-collapse">
                            <li class="">
                                <a
                                    href="https://codecanyon8.kreativdev.com/superv/demo/admin/table/resevations/create?language=en">
                                    <span class="sub-item">New Reservation</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/table/resevations/all">
                                    <span class="sub-item">All Resevations</span>
                                </a>
                            </li>
                            <li class="">
                                <a
                                    href="https://codecanyon8.kreativdev.com/superv/demo/admin/table/resevations/pending">
                                    <span class="sub-item">Pending Resevations</span>
                                </a>
                            </li>
                            <li class="">
                                <a
                                    href="https://codecanyon8.kreativdev.com/superv/demo/admin/table/resevations/accepted">
                                    <span class="sub-item">Accepted Resevations</span>
                                </a>
                            </li>
                            <li class="">
                                <a
                                    href="https://codecanyon8.kreativdev.com/superv/demo/admin/table/resevations/rejected">
                                    <span class="sub-item">Rejected Resevations</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item
">
                    <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/tables">
                        <i class="fas fa-table"></i>
                        <p>Tables & QR Builder</p>
                    </a>
                </li>
                <li class="nav-item
">
                    <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/menu-builder?language=en">
                        <i class="fas fa-bars"></i>
                        <p>Drag & Drop Menu Builder</p>
                    </a>
                </li>
                <li class="nav-item
">
                    <a data-toggle="collapse" href="#webContents">
                        <i class="la flaticon-imac"></i>
                        <p>Website Pages</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse
" id="webContents">
                        <ul class="nav nav-collapse">
                            <li class="
">
                                <a data-toggle="collapse" href="#home">
                                    <span class="sub-item">Home Page Sections</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse
    " id="home">
                                    <ul class="nav nav-collapse subnav">
                                        <li class="
            ">
                                            <a data-toggle="collapse" href="#herosection">
                                                <span class="sub-item">Hero Section</span>
                                                <span class="caret"></span>
                                            </a>
                                            <div class="collapse
            " id="herosection">
                                                <ul class="nav nav-collapse subnav">
                                                    <li class="">
                                                        <a
                                                            href="https://codecanyon8.kreativdev.com/superv/demo/admin/herosection/imgtext?language=en">
                                                            <span class="sub-item">Image & Text</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <!---Background Image --->
                                        <li>
                                            <ul class="nav nav-collapse subnav">
                                                <li class="
        ">
                                                    <a data-toggle="collapse" href="#backgroundImage">
                                                        <span class="sub-item">Background Image</span>
                                                        <span class="caret"></span>
                                                    </a>
                                                    <div class="collapse
        " id="backgroundImage">
                                                        <ul class="nav nav-collapse subnav">
                                                            <li class="">
                                                                <a
                                                                    href="https://codecanyon8.kreativdev.com/superv/demo/admin/intro-section/background-image?language=en&amp;section=intro_bg_image">
                                                                    <span class="sub-item">Intro Section
                                                                        Image</span>
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a
                                                                    href="https://codecanyon8.kreativdev.com/superv/demo/admin/special-section/background-image?language=en&amp;section=special_section_bg_image">
                                                                    <span class="sub-item">Special Food Section
                                                                        Image</span>
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a
                                                                    href="https://codecanyon8.kreativdev.com/superv/demo/admin/testimonial-section/background-image?language=en&amp;section=testimonial_bg_img">
                                                                    <span class="sub-item">Testimonial Section
                                                                        Image</span>
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a
                                                                    href="https://codecanyon8.kreativdev.com/superv/demo/admin/footer-section/background-image?language=en&amp;section=footer_section_bg_image">
                                                                    <span class="sub-item">Footer Section
                                                                        Image</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                </li>
                                                <!---Background Image --->
                                                <li>
                                                    <ul class="nav nav-collapse subnav">
                                                        <li class="
            ">
                                                            <a data-toggle="collapse" href="#introSection">
                                                                <span class="sub-item">Intro Section</span>
                                                                <span class="caret"></span>
                                                            </a>
                                                            <div class="collapse
            " id="introSection">
                                                                <ul class="nav nav-collapse subnav">
                                                                    <li class="">
                                                                        <a
                                                                            href="https://codecanyon8.kreativdev.com/superv/demo/admin/introsection?language=en">
                                                                            <span class="sub-item">Intro</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="
                                    ">
                                                                        <a
                                                                            href="https://codecanyon8.kreativdev.com/superv/demo/admin/intro/points?language=en">
                                                                            <span class="sub-item">Intro
                                                                                Points</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                        </li>
                                                        <li class="
       ">
                                                            <a
                                                                href="https://codecanyon8.kreativdev.com/superv/demo/admin/features?language=en">
                                                                <span class="sub-item">Features</span>
                                                            </a>
                                                        </li>
                                                        <li class="
        ">
                                                            <a
                                                                href="https://codecanyon8.kreativdev.com/superv/demo/admin/menu/section?language=en">
                                                                <span class="sub-item">Menu Section</span>
                                                            </a>
                                                        </li>
                                                        <li class="
        ">
                                                            <a
                                                                href="https://codecanyon8.kreativdev.com/superv/demo/admin/special/section?language=en">
                                                                <span class="sub-item">Special Section</span>
                                                            </a>
                                                        </li>
                                                        <li class="
        ">
                                                            <a
                                                                href="https://codecanyon8.kreativdev.com/superv/demo/admin/testimonials?language=en">
                                                                <span class="sub-item">Testimonials</span>
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a
                                                                href="https://codecanyon8.kreativdev.com/superv/demo/admin/blogsection?language=en">
                                                                <span class="sub-item">Blog Section</span>
                                                            </a>
                                                        </li>
                                                        <li class="
        ">
                                                            <a
                                                                href="https://codecanyon8.kreativdev.com/superv/demo/admin/sections?language=en">
                                                                <span class="sub-item">Section
                                                                    Customization</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                </div>
                            </li>
                            <li class="
">
                                <a data-toggle="collapse" href="#footer">
                                    <span class="sub-item">Footer</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse
    " id="footer">
                                    <ul class="nav nav-collapse subnav">
                                        <li class="">
                                            <a
                                                href="https://codecanyon8.kreativdev.com/superv/demo/admin/footers?language=en">
                                                <span class="sub-item">Image & Text</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a
                                                href="https://codecanyon8.kreativdev.com/superv/demo/admin/ulinks?language=en">
                                                <span class="sub-item">Useful Links</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="
        ">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/members?language=en">
                                    <span class="sub-item">Team Members</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/gallery?language=en">
                                    <span class="sub-item">Gallery</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/faqs?language=en">
                                    <span class="sub-item">FAQs</span>
                                </a>
                            </li>
                            <li class="
">
                                <a data-toggle="collapse" href="#blogs">
                                    <span class="sub-item">Blogs</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse
    " id="blogs">
                                    <ul class="nav nav-collapse subnav">
                                        <li class="">
                                            <a
                                                href="https://codecanyon8.kreativdev.com/superv/demo/admin/bcategorys?language=en">
                                                <span class="sub-item">Category</span>
                                            </a>
                                        </li>
                                        <li class="
                ">
                                            <a
                                                href="https://codecanyon8.kreativdev.com/superv/demo/admin/blogs?language=en">
                                                <span class="sub-item">Blogs</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="
">
                                <a data-toggle="collapse" href="#career">
                                    <span class="sub-item">Career</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse
    " id="career">
                                    <ul class="nav nav-collapse subnav">
                                        <li class="
                ">
                                            <a
                                                href="https://codecanyon8.kreativdev.com/superv/demo/admin/jcategorys?language=en">
                                                <span class="sub-item">Category</span>
                                            </a>
                                        </li>
                                        <li class="
            ">
                                            <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/job/create">
                                                <span class="sub-item">Post Job</span>
                                            </a>
                                        </li>
                                        <li class="
            ">
                                            <a
                                                href="https://codecanyon8.kreativdev.com/superv/demo/admin/jobs?language=en">
                                                <span class="sub-item">Job Management</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="
">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/contact?language=en">
                                    <span class="sub-item">Contact Page</span>
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="collapse" href="#pages">
                                    <span class="sub-item">Custom Pages</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse
  " id="pages">
                                    <ul class="nav nav-collapse subnav">
                                        <li class="">
                                            <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/page/create">
                                                <span class="sub-item">Create Page</span>
                                            </a>
                                        </li>
                                        <li class="
      ">
                                            <a
                                                href="https://codecanyon8.kreativdev.com/superv/demo/admin/pages?language=en">
                                                <span class="sub-item">Pages</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item
">
                    <a data-toggle="collapse" href="#announcementPopup">
                        <i class="fas fa-bullhorn"></i>
                        <p>Announcement Popup</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse
" id="announcementPopup">
                        <ul class="nav nav-collapse">
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/popup/types">
                                    <span class="sub-item">Add Popup</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/popups?language=en">
                                    <span class="sub-item">Popups</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item
">
                    <a data-toggle="collapse" href="#pushNotification">
                        <i class="far fa-bell"></i>
                        <p>Push Notification</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse
" id="pushNotification">
                        <ul class="nav nav-collapse">
                            <li class="">
                                <a
                                    href="https://codecanyon8.kreativdev.com/superv/demo/admin/pushnotification/settings">
                                    <span class="sub-item">Settings</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/pushnotification/send">
                                    <span class="sub-item">Send Notification</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item
">
                    <a data-toggle="collapse" href="#subscribers">
                        <i class="la flaticon-envelope"></i>
                        <p>Subscribers</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse
" id="subscribers">
                        <ul class="nav nav-collapse">
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/subscribers">
                                    <span class="sub-item">Subscribers</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/mailsubscriber">
                                    <span class="sub-item">Mail to Subscribers</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item
">
                    <a data-toggle="collapse" href="#basic">
                        <i class="la flaticon-settings"></i>
                        <p>Settings</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse
" id="basic">
                        <ul class="nav nav-collapse">
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/themes?language=en">
                                    <span class="sub-item">Themes</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/favicon">
                                    <span class="sub-item">Favicon</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/logo">
                                    <span class="sub-item">Logo</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/preloader">
                                    <span class="sub-item">Preloader</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/basicinfo?language=en">
                                    <span class="sub-item">General Settings</span>
                                </a>
                            </li>
                            <li class="submenu">
                                <a data-toggle="collapse" href="#emailset" aria-expanded="false">
                                    <span class="sub-item">Email Settings</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse " id="emailset">
                                    <ul class="nav nav-collapse subnav">
                                        <li class="">
                                            <a
                                                href="https://codecanyon8.kreativdev.com/superv/demo/admin/mail-from-admin">
                                                <span class="sub-item">Mail from Admin</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a
                                                href="https://codecanyon8.kreativdev.com/superv/demo/admin/mail-to-admin">
                                                <span class="sub-item">Mail to Admin</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a
                                                href="https://codecanyon8.kreativdev.com/superv/demo/admin/email-templates">
                                                <span class="sub-item">Email Templates</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/callwaiter">
                                    <span class="sub-item">Call Waiter</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/support?language=en">
                                    <span class="sub-item">Support Informations</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/social">
                                    <span class="sub-item">Social Links</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/breadcrumb">
                                    <span class="sub-item">Breadcrumb</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/heading?language=en">
                                    <span class="sub-item">Page Headings</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/pwa">
                                    <span class="sub-item">PWA Settings</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/script">
                                    <span class="sub-item">Plugins</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/maintenance">
                                    <span class="sub-item">Maintenance Mode</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/cookie-alert?language=en">
                                    <span class="sub-item">Cookie Alert</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item
">
                    <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/languages">
                        <i class="la flaticon-chat-8"></i>
                        <p>Language Management</p>
                    </a>
                </li>
                <li class="nav-item
">
                    <a data-toggle="collapse" href="#adminsManagement">
                        <i class="fas fa-users-cog"></i>
                        <p>Admins Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse
" id="adminsManagement">
                        <ul class="nav nav-collapse">
                            <li class="
    ">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/roles">
                                    <span class="sub-item">Role Management</span>
                                </a>
                            </li>
                            <li class="
    ">
                                <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/users">
                                    <span class="sub-item">Admins</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item
">
                    <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/sitemap?language=en">
                        <i class="fa fa-sitemap"></i>
                        <p>Sitemap</p>
                    </a>
                </li>
                <li class="nav-item
">
                    <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/backup">
                        <i class="la flaticon-down-arrow-3"></i>
                        <p>Database Backup</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://codecanyon8.kreativdev.com/superv/demo/admin/cache-clear">
                        <i class="la flaticon-close"></i>
                        <p>Clear Cache</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
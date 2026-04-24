<style>
    /* ===== FOOTER ===== */
    .ksvm-footer {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 60%, #0f3460 100%);
        color: #ccc;
        padding-top: 60px;
    }
    .ksvm-footer .footer-logo img { height: 70px; width: auto; margin-bottom: 16px; }
    .ksvm-footer .footer-desc { font-size: 14px; line-height: 1.8; color: #aaa; margin-bottom: 20px; }
    .ksvm-footer .footer-social a {
        display: inline-flex; align-items: center; justify-content: center;
        width: 36px; height: 36px; border-radius: 50%;
        background: rgba(255,255,255,0.08);
        color: #ccc; font-size: 14px;
        text-decoration: none; transition: all 0.3s; margin-right: 6px;
    }
    .ksvm-footer .footer-social a:hover { background: var(--primary, #7a1a58); color: #fff; transform: translateY(-3px); }
    .ksvm-footer .footer-social .wa-btn:hover { background: #25D366; }

    .ksvm-footer h5 {
        color: #fff; font-size: 16px; font-weight: 600;
        margin-bottom: 20px; padding-bottom: 10px;
        border-bottom: 2px solid rgba(255,215,0,0.3);
        position: relative;
    }
    .ksvm-footer h5::after {
        content: ''; position: absolute; bottom: -2px; left: 0;
        width: 40px; height: 2px; background: #FFD700;
    }

    .ksvm-footer .footer-links { list-style: none; padding: 0; margin: 0; }
    .ksvm-footer .footer-links li { margin-bottom: 10px; }
    .ksvm-footer .footer-links a {
        color: #aaa; text-decoration: none; font-size: 14px;
        transition: all 0.3s; display: flex; align-items: center; gap: 8px;
    }
    .ksvm-footer .footer-links a::before {
        content: '›'; color: #FFD700; font-size: 18px; line-height: 1;
    }
    .ksvm-footer .footer-links a:hover { color: #FFD700; padding-left: 5px; }

    .ksvm-footer .contact-item {
        display: flex; gap: 12px; margin-bottom: 16px; align-items: flex-start;
    }
    .ksvm-footer .contact-item .icon {
        width: 36px; height: 36px; border-radius: 8px;
        background: rgba(122,26,88,0.4);
        display: flex; align-items: center; justify-content: center;
        color: #FFD700; font-size: 14px; flex-shrink: 0;
    }
    .ksvm-footer .contact-item .info { font-size: 13px; color: #aaa; line-height: 1.6; }
    .ksvm-footer .contact-item .info strong { color: #fff; display: block; font-size: 13px; margin-bottom: 2px; }

    .ksvm-footer .footer-bottom {
        border-top: 1px solid rgba(255,255,255,0.08);
        padding: 18px 0; margin-top: 40px;
        display: flex; justify-content: space-between; align-items: center;
        flex-wrap: wrap; gap: 10px;
    }
    .ksvm-footer .footer-bottom p { margin: 0; font-size: 13px; color: #888; }
    .ksvm-footer .footer-bottom a { color: #FFD700; text-decoration: none; }
    .ksvm-footer .footer-bottom a:hover { text-decoration: underline; }
</style>

<footer class="ksvm-footer">
    <div class="container">
        <div class="row g-5">

            {{-- Column 1: Logo + About --}}
            <div class="col-lg-4 col-md-6">
                <div class="footer-logo">
                    <img src="{{ public_asset($siteSettings['logo'] ?? 'front/img/ksvm.jpeg') }}"
                         alt="{{ $siteSettings['site_name'] ?? 'KSVM' }}">
                </div>
                <p class="footer-desc">
                    {{ $siteSettings['footer_description'] ?? 'We at K.S.V.M. provide a happy, caring and safe environment for your child with a priority given to develop high standards of education.' }}
                </p>
                <div class="footer-social">
                    @if(!empty($siteSettings['social_facebook']))
                        <a href="{{ $siteSettings['social_facebook'] }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if(!empty($siteSettings['social_instagram']))
                        <a href="{{ $siteSettings['social_instagram'] }}" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if(!empty($siteSettings['social_youtube']))
                        <a href="{{ $siteSettings['social_youtube'] }}" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
                    @endif
                    @if(!empty($siteSettings['social_twitter']))
                        <a href="{{ $siteSettings['social_twitter'] }}" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                    @endif
                    @php $waNum = preg_replace('/[^0-9]/', '', $siteSettings['social_whatsapp'] ?? '917084183114'); @endphp
                    <a href="https://wa.me/{{ $waNum }}?text=Hello%2C%20I%20have%20a%20query" target="_blank" title="WhatsApp" class="wa-btn">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            {{-- Column 2: Quick Links --}}
            <div class="col-lg-2 col-md-6">
                <h5>Quick Links</h5>
                <ul class="footer-links">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li><a href="{{ route('home.aboutus') }}">About Us</a></li>
                    <li><a href="{{ route('home.courses') }}">Courses</a></li>
                    <li><a href="{{ route('home.exam') }}">Examination</a></li>
                    <li><a href="{{ route('home.admissions') }}">Admissions</a></li>
                    <li><a href="{{ route('home.gallery') }}">Gallery</a></li>
                    <li><a href="{{ route('home.events') }}">Events</a></li>
                    <li><a href="{{ route('home.contact') }}">Contact Us</a></li>
                    @php $policys = App\Models\Policy::where('status', 'page')->get(); @endphp
                    @foreach ($policys as $policy)
                        <li><a href="{{ route('policy.show-slug', $policy->slug) }}">{{ $policy->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            {{-- Column 3: Contact Info --}}
            <div class="col-lg-3 col-md-6">
                <h5>Contact Info</h5>
                @if(!empty($siteSettings['footer_address']))
                <div class="contact-item">
                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="info">
                        <strong>Address</strong>
                        {{ $siteSettings['footer_address'] }}
                    </div>
                </div>
                @endif
                @if(!empty($siteSettings['footer_phone']))
                <div class="contact-item">
                    <div class="icon"><i class="fas fa-phone-alt"></i></div>
                    <div class="info">
                        <strong>Phone</strong>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', explode(',', $siteSettings['footer_phone'])[0]) }}"
                           style="color:#aaa; text-decoration:none;">
                            {{ $siteSettings['footer_phone'] }}
                        </a>
                    </div>
                </div>
                @endif
                @if(!empty($siteSettings['footer_email']))
                <div class="contact-item">
                    <div class="icon"><i class="fas fa-envelope"></i></div>
                    <div class="info">
                        <strong>Email</strong>
                        <a href="mailto:{{ $siteSettings['footer_email'] }}" style="color:#aaa; text-decoration:none;">
                            {{ $siteSettings['footer_email'] }}
                        </a>
                    </div>
                </div>
                @endif
            </div>

            {{-- Column 4: Map --}}
            <div class="col-lg-3 col-md-6">
                <h5>Find Us</h5>
                <div style="border-radius:10px; overflow:hidden; border:2px solid rgba(255,255,255,0.1);">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3570.95774941126!2d80.24852862!3d26.4893052!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c37240be0a20b%3A0xf5c417c179ce7833!2sKSVM%20Education%20Centre!5e0!3m2!1sen!2sin!4v1766995897203!5m2!1sen!2sin"
                        width="100%" height="180" style="border:0; display:block;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="mt-3">
                    <a href="{{ route('home.admissions') }}"
                       style="display:block; text-align:center; background:linear-gradient(135deg,#7a1a58,#5a1240); color:#fff; padding:12px; border-radius:8px; text-decoration:none; font-weight:600; font-size:14px; transition:all 0.3s;">
                        <i class="fas fa-graduation-cap me-2"></i> Apply for Admission
                    </a>
                </div>
            </div>

        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>
                &copy; {{ date('Y') }}
                <a href="{{ route('home.index') }}">{{ $siteSettings['site_name'] ?? 'KSVM Education Centre' }}</a>.
                {{ $siteSettings['footer_copyright'] ?? 'All rights reserved.' }}
            </p>
            <p>
                <a href="{{ route('login') }}" style="color:#888; font-size:12px;">Admin Login</a>
            </p>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script type="text/javascript" src="{{ public_asset('forntend/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/tether.min.js') }}"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/bootstrap.min.js') }}"></script>
<script src="{{ public_asset('forntend/js/jquery.easing.js') }}"></script>
<script src="{{ public_asset('forntend/js/jquery.mousewheel-3.0.6.pack.js') }}"></script>
<script src="{{ public_asset('forntend/js/jquery.fancybox.pack.js') }}"></script>
<script src="{{ public_asset('forntend/js/owl.carousel.js') }}"></script>
<script src="{{ public_asset('forntend/js/jquery.stellar.js') }}"></script>
<script src="{{ public_asset('forntend/js/jquery.matchHeight-min.js') }}"></script>
<script src="{{ public_asset('forntend/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ public_asset('forntend/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ public_asset('forntend/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ public_asset('forntend/js/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ public_asset('forntend/js/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ public_asset('forntend/js/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ public_asset('forntend/js/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ public_asset('forntend/js/jquery.revolution.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ public_asset('forntend/js/custom.js') }}"></script>

<script>
    jQuery.fn.liScroll = function(settings) {
        settings = jQuery.extend({ travelocity: 0.03 }, settings);
        return this.each(function() {
            var $strip = jQuery(this);
            $strip.addClass("newsticker");
            var stripHeight = 0.7;
            $strip.find("li").each(function(i) { stripHeight += jQuery(this, i).outerHeight(true); });
            $strip.wrap("<div class='mask'></div>");
            $strip.parent().wrap("<div class='tickercontainer'></div>");
            var containerHeight = $strip.parent().parent().height();
            $strip.height(stripHeight);
            var totalTravel = stripHeight;
            var defTiming = totalTravel / settings.travelocity;
            function scrollnews(spazio, tempo) {
                $strip.animate({ top: '-=' + spazio }, tempo, "linear", function() {
                    $strip.css("top", containerHeight);
                    scrollnews(totalTravel, defTiming);
                });
            }
            scrollnews(totalTravel, defTiming);
            $strip.hover(function() { jQuery(this).stop(); }, function() {
                var offset = jQuery(this).offset();
                var residualSpace = offset.top + stripHeight;
                scrollnews(residualSpace, residualSpace / settings.travelocity);
            });
        });
    };
    $(function() { $("ul#ticker01").liScroll(); });
</script>

<!-- Toast / bootnotify -->
<style>
    #toastContainer { position: fixed; bottom: 1rem; right: 1rem; z-index: 10800; display: flex; flex-direction: column; gap: 0.5rem; align-items: flex-end; pointer-events: none; }
    .custom-toast { pointer-events: auto; min-width: 280px; max-width: 380px; box-shadow: 0 6px 18px rgba(0,0,0,0.12); }
</style>
<div id="toastContainer" aria-live="polite" aria-atomic="true"></div>
<script>
    function bootnotify(message, title, type) {
        try {
            var toastId = 'toast-' + Date.now();
            var bgClass = 'bg-info text-white', closeClass = 'btn-close btn-close-white';
            if (type === 'success') bgClass = 'bg-success text-white';
            else if (type === 'danger' || type === 'error') bgClass = 'bg-danger text-white';
            else if (type === 'warning') { bgClass = 'bg-warning text-dark'; closeClass = 'btn-close'; }
            var titleHtml = title ? '<div class="fw-bold mb-1">' + title + '</div>' : '';
            var html = "<div id='" + toastId + "' class='toast custom-toast " + bgClass + "' data-bs-autohide='true' data-bs-delay='4000'><div class='d-flex'><div class='toast-body'>" + titleHtml + message + "</div><button type='button' class='" + closeClass + " me-2 m-auto' data-bs-dismiss='toast'></button></div></div>";
            document.getElementById('toastContainer').insertAdjacentHTML('beforeend', html);
            var el = document.getElementById(toastId);
            new bootstrap.Toast(el).show();
            el.addEventListener('hidden.bs.toast', function() { if (el.parentNode) el.parentNode.removeChild(el); });
        } catch(e) { console.error(e); }
    }
</script>
</body>
</html>

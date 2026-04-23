<footer id="footer" class="footer_img" style="background-color: #b17eb1;">

	<div id="footer-widgets" class="container style-1">
		<div class="row">
			<div class="col-lg-5  mb-sm-30 mb-xs-30">
				<div class="widget textwidget">
					<img src="{{ public_asset('front/img/ksvm.jpeg') }}" style="width: 35%">
					<p> We at K.S.V.M. provide a happy, caring and safe environment for your child with a priority given
						to develop high standards of education. </p>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="widget widget_links">
					<h2 class="widget-title"><span>Quick Links</span></h2>
					<ul class="wprt-links clearfix col2">
						<li>
							<a href="{{ route('home.index') }}">Home</a>
						</li>
						<li>
							<a href="{{ route('home.aboutus') }}">About</a>
						</li>
						<li>
							<a href="{{ route('home.courses') }}">Courses</a>
						</li>
						<li>
							<a href="{{ route('home.exam') }}">Exam</a>
						</li>
						<li>
							<a href="{{ route('home.admissions') }}">Admissions</a>
						</li>
						@php
							$policys = App\Models\Policy::where('status', 'page')->get();
						@endphp
						@foreach ($policys as $policy)
							<li>
								<a href="{{ route('policy.show-slug', $policy->slug) }}"
									title="{{ $policy->name }}">{{ $policy->name }}</a>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="col-lg-3 mt-sm-30 mt-xs-30">
				<div class="widget widget_information">
					<h2 class="widget-title"><span>Contact Info</span></h2>
					<ul>
						<li class="address clearfix">
							<span class="hl"><i class="fa fa-map-marker"></i></span><span class="text">Sector E-Krishna
								Vihar, Panki Road, Kalyanpur, Kanpur-208017</span>
						</li>
						<li class="phone clearfix">
							<span class="hl"><i class="fa fa-phone"></i></span><span class="text">+91-7084183114,
								0512-3531047</span>
						</li>
						<li class="email clearfix">
							<span class="hl"><i class="fa fa-envelope"></i></span><span
								class="text">ksvmeducationcenter@gmail.com</span>
						</li>
					</ul>
				</div>
				<div class="widget widget_socials">
					<div class="socials">
						<a target="_blank" href=""><i class="fa fa-facebook"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="bottom" class="clearfix style-1">
		<div id="bottom-bar-inner" class="wprt-container">
			<div class="bottom-bar-inner-wrap">
				<div class="bottom-bar-content">
					<div id="copyright">
						<a class="border-bottom footerP" href="{{ route('login')  }}" target="_blank" rel="noopener noreferrer">
                        KSVM Education Center
                    </a>. All rights reserved.
					</div>
					<!-- /#copyright -->
				</div>

			</div>
		</div>
	</div>
</footer>
<!-- Site Wraper End -->
<!-- Site Wraper End -->
<script type="text/javascript" src="{{ public_asset('forntend/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/tether.min.js') }}"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/bootstrap.min.js') }}"></script>

<!-- Easing Effect Js -->
<script src="{{ public_asset('forntend/js/jquery.easing.js') }}" type="text/javascript"></script>

<!-- fancybox Js -->
<script src="{{ public_asset('forntend/js/jquery.mousewheel-3.0.6.pack.js') }}" type="text/javascript"></script>
<script src="{{ public_asset('forntend/js/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
<!-- carousel Js -->
<script src="{{ public_asset('forntend/js/owl.carousel.js') }}" type="text/javascript"></script>
<!-- parallax Js -->
<script src="{{ public_asset('forntend/js/jquery.stellar.js') }}" type="text/javascript"></script>
<!-- Height Js -->
<script src="{{ public_asset('forntend/js/jquery.matchHeight-min.js') }}" type="text/javascript"></script>

<!-- imagesloaded Js -->
<script src="{{ public_asset('forntend/js/imagesloaded.pkgd.min.js') }}" type="text/javascript"></script>

<!--<script src="{{ public_asset('forntend/js/imagesloaded.pkgd.min.js') }}" type="text/javascript"></script>
		<script src="{{ public_asset('forntend/js/isotope.pkgd.min.js') }}" type="text/javascript"></script>
		<script src="{{ public_asset('forntend/js/masonry.pkgd.min.js') }}" type="text/javascript"></script>
		<script src="{{ public_asset('forntend/js/jquery.appear.js') }}" type="text/javascript"></script>-->

<!-- revolution Js -->
<script type="text/javascript" src="{{ public_asset('forntend/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript"
	src="{{ public_asset('forntend/js/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/jquery.revolution.js') }}"></script>
<!-- Counter Js -->
<script type="text/javascript" src="{{ public_asset('forntend/assets/js/jquery.countdown.min.html') }}"></script>
<!-- Bootstrap JS (bundle includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

<!-- custom Js -->
<script src="{{ public_asset('forntend/js/custom.js') }}" type="text/javascript"></script>
<script>
	jQuery.fn.liScroll = function (settings) {
		settings = jQuery.extend({
			travelocity: 0.03
		}, settings);
		return this.each(function () {
			var $strip = jQuery(this);
			$strip.addClass("newsticker")
			var stripHeight = 0.7;
			$strip.find("li").each(function (i) {
				stripHeight += jQuery(this, i).outerHeight(true); // thanks to Michael Haszprunar and Fabien Volpi
			});
			var $mask = $strip.wrap("<div class='mask'></div>");
			var $tickercontainer = $strip.parent().wrap("<div class='tickercontainer'></div>");
			var containerHeight = $strip.parent().parent().height();	//a.k.a. 'mask' width 	
			$strip.height(stripHeight);
			var totalTravel = stripHeight;
			var defTiming = totalTravel / settings.travelocity;	// thanks to Scott Waye		
			function scrollnews(spazio, tempo) {
				$strip.animate({ top: '-=' + spazio }, tempo, "linear", function () { $strip.css("top", containerHeight); scrollnews(totalTravel, defTiming); });
			}
			scrollnews(totalTravel, defTiming);
			$strip.hover(function () {
				jQuery(this).stop();
			},
				function () {
					var offset = jQuery(this).offset();
					var residualSpace = offset.top + stripHeight;
					var residualTime = residualSpace / settings.travelocity;
					scrollnews(residualSpace, residualTime);
				});
		});
	};

	$(function () {
		$("ul#ticker01").liScroll();
	});


	
</script>
<!-- Toast container + bootnotify -->
<style>
    #toastContainer {
        position: fixed;
        bottom: 1rem;
        right: 1rem;
        z-index: 10800;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        align-items: flex-end;
        pointer-events: none;
    }

    .custom-toast {
        pointer-events: auto;
        min-width: 280px;
        max-width: 380px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
    }
</style>

<div id="toastContainer" aria-live="polite" aria-atomic="true"></div>

<script>
    // bootnotify(message, title, type)
    // type: 'success' | 'info' | 'warning' | 'danger' (or 'error')
    function bootnotify(message, title = '', type = 'info') {
        try {
            var toastId = 'toast-' + Date.now();

            // Map type to bootstrap bg/text classes
            var bgClass = 'bg-info text-white';
            var closeClass = 'btn-close btn-close-white';
            if (type === 'success') { bgClass = 'bg-success text-white'; closeClass = 'btn-close btn-close-white'; }
            else if (type === 'danger' || type === 'error') { bgClass = 'bg-danger text-white'; closeClass = 'btn-close btn-close-white'; }
            else if (type === 'warning') { bgClass = 'bg-warning text-dark'; closeClass = 'btn-close'; }
            else if (type === 'info') { bgClass = 'bg-info text-white'; closeClass = 'btn-close btn-close-white'; }

            var titleHtml = title ? '<div class="fw-bold mb-1">' + title + '</div>' : '';

            var toastHtml = "<div id='" + toastId + "' class='toast custom-toast " + bgClass + "' role='alert' aria-live='assertive' aria-atomic='true' data-bs-autohide='true' data-bs-delay='4000'>" +
                "<div class='d-flex'>" +
                "<div class='toast-body' style='white-space: pre-line;'>" +
                titleHtml + message +
                "</div>" +
                "<button type='button' class='" + closeClass + " me-2 m-auto' data-bs-dismiss='toast' aria-label='Close'></button>" +
                "</div>" +
                "</div>";

            var container = document.getElementById('toastContainer');
            container.insertAdjacentHTML('beforeend', toastHtml);

            var toastEl = document.getElementById(toastId);
            var bsToast = new bootstrap.Toast(toastEl);
            bsToast.show();

            // Remove from DOM after hidden to keep document clean
            toastEl.addEventListener('hidden.bs.toast', function () {
                if (toastEl && toastEl.parentNode) toastEl.parentNode.removeChild(toastEl);
            });
        } catch (err) {
            console.error('bootnotify error:', err);
        }
    }
</script>
</body>

<!-- Mirrored from sriramedu.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Nov 2025 06:37:54 GMT -->

</html>
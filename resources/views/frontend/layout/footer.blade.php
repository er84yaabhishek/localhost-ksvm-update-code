<footer id="footer" class="footer_img" style="background-color: #b17eb1;">

	<div id="footer-widgets" class="container style-1">
		<div class="row">

			{{-- Column 1: Logo + Description --}}
			<div class="col-lg-5 mb-sm-30 mb-xs-30">
				<div class="widget textwidget">
					<img src="{{ public_asset($siteSettings['logo'] ?? 'front/img/ksvm.jpeg') }}" style="width: 35%"
						alt="{{ $siteSettings['site_name'] ?? 'KSVM' }}">
					<p>{{ $siteSettings['footer_description'] ?? 'We at K.S.V.M. provide a happy, caring and safe environment for your child.' }}</p>

					{{-- Social Media Icons --}}
					<div class="widget widget_socials mt-3">
						<div class="socials" style="display:flex; gap:10px;">
							@if(!empty($siteSettings['social_facebook']))
								<a target="_blank" href="{{ $siteSettings['social_facebook'] }}">
									<i class="fa fa-facebook"></i>
								</a>
							@endif
							@if(!empty($siteSettings['social_instagram']))
								<a target="_blank" href="{{ $siteSettings['social_instagram'] }}">
									<i class="fa fa-instagram"></i>
								</a>
							@endif
							@if(!empty($siteSettings['social_youtube']))
								<a target="_blank" href="{{ $siteSettings['social_youtube'] }}">
									<i class="fa fa-youtube"></i>
								</a>
							@endif
							@if(!empty($siteSettings['social_twitter']))
								<a target="_blank" href="{{ $siteSettings['social_twitter'] }}">
									<i class="fa fa-twitter"></i>
								</a>
							@endif
							@if(!empty($siteSettings['social_whatsapp']))
								<a target="_blank" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteSettings['social_whatsapp']) }}">
									<i class="fa fa-whatsapp"></i>
								</a>
							@endif
						</div>
					</div>
				</div>
			</div>

			{{-- Column 2: Quick Links --}}
			<div class="col-lg-4">
				<div class="widget widget_links">
					<h2 class="widget-title"><span>Quick Links</span></h2>
					<ul class="wprt-links clearfix col2">
						<li><a href="{{ route('home.index') }}">Home</a></li>
						<li><a href="{{ route('home.aboutus') }}">About</a></li>
						<li><a href="{{ route('home.courses') }}">Courses</a></li>
						<li><a href="{{ route('home.exam') }}">Exam</a></li>
						<li><a href="{{ route('home.admissions') }}">Admissions</a></li>
						@php
							$policys = App\Models\Policy::where('status', 'page')->get();
						@endphp
						@foreach ($policys as $policy)
							<li>
								<a href="{{ route('policy.show-slug', $policy->slug) }}" title="{{ $policy->name }}">
									{{ $policy->name }}
								</a>
							</li>
						@endforeach
					</ul>
				</div>
			</div>

			{{-- Column 3: Contact Info --}}
			<div class="col-lg-3 mt-sm-30 mt-xs-30">
				<div class="widget widget_information">
					<h2 class="widget-title"><span>Contact Info</span></h2>
					<ul>
						@if(!empty($siteSettings['footer_address']))
						<li class="address clearfix">
							<span class="hl"><i class="fa fa-map-marker"></i></span>
							<span class="text">{{ $siteSettings['footer_address'] }}</span>
						</li>
						@endif
						@if(!empty($siteSettings['footer_phone']))
						<li class="phone clearfix">
							<span class="hl"><i class="fa fa-phone"></i></span>
							<span class="text">{{ $siteSettings['footer_phone'] }}</span>
						</li>
						@endif
						@if(!empty($siteSettings['footer_email']))
						<li class="email clearfix">
							<span class="hl"><i class="fa fa-envelope"></i></span>
							<span class="text">{{ $siteSettings['footer_email'] }}</span>
						</li>
						@endif
					</ul>
				</div>
			</div>

		</div>
	</div>

	{{-- Bottom Bar --}}
	<div id="bottom" class="clearfix style-1">
		<div id="bottom-bar-inner" class="wprt-container">
			<div class="bottom-bar-inner-wrap">
				<div class="bottom-bar-content">
					<div id="copyright">
						<a class="border-bottom footerP" href="{{ route('login') }}" target="_blank" rel="noopener noreferrer">
							{{ $siteSettings['footer_copyright'] ?? 'KSVM Education Center. All rights reserved.' }}
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<!-- Scripts -->
<script type="text/javascript" src="{{ public_asset('forntend/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/tether.min.js') }}"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/bootstrap.min.js') }}"></script>
<script src="{{ public_asset('forntend/js/jquery.easing.js') }}" type="text/javascript"></script>
<script src="{{ public_asset('forntend/js/jquery.mousewheel-3.0.6.pack.js') }}" type="text/javascript"></script>
<script src="{{ public_asset('forntend/js/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
<script src="{{ public_asset('forntend/js/owl.carousel.js') }}" type="text/javascript"></script>
<script src="{{ public_asset('forntend/js/jquery.stellar.js') }}" type="text/javascript"></script>
<script src="{{ public_asset('forntend/js/jquery.matchHeight-min.js') }}" type="text/javascript"></script>
<script src="{{ public_asset('forntend/js/imagesloaded.pkgd.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ public_asset('forntend/js/jquery.revolution.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ public_asset('forntend/js/custom.js') }}" type="text/javascript"></script>

<script>
	jQuery.fn.liScroll = function (settings) {
		settings = jQuery.extend({ travelocity: 0.03 }, settings);
		return this.each(function () {
			var $strip = jQuery(this);
			$strip.addClass("newsticker");
			var stripHeight = 0.7;
			$strip.find("li").each(function (i) { stripHeight += jQuery(this, i).outerHeight(true); });
			var $mask = $strip.wrap("<div class='mask'></div>");
			var $tickercontainer = $strip.parent().wrap("<div class='tickercontainer'></div>");
			var containerHeight = $strip.parent().parent().height();
			$strip.height(stripHeight);
			var totalTravel = stripHeight;
			var defTiming = totalTravel / settings.travelocity;
			function scrollnews(spazio, tempo) {
				$strip.animate({ top: '-=' + spazio }, tempo, "linear", function () {
					$strip.css("top", containerHeight);
					scrollnews(totalTravel, defTiming);
				});
			}
			scrollnews(totalTravel, defTiming);
			$strip.hover(function () { jQuery(this).stop(); }, function () {
				var offset = jQuery(this).offset();
				var residualSpace = offset.top + stripHeight;
				var residualTime = residualSpace / settings.travelocity;
				scrollnews(residualSpace, residualTime);
			});
		});
	};
	$(function () { $("ul#ticker01").liScroll(); });
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
			var toastHtml = "<div id='" + toastId + "' class='toast custom-toast " + bgClass + "' data-bs-autohide='true' data-bs-delay='4000'><div class='d-flex'><div class='toast-body'>" + titleHtml + message + "</div><button type='button' class='" + closeClass + " me-2 m-auto' data-bs-dismiss='toast'></button></div></div>";
			document.getElementById('toastContainer').insertAdjacentHTML('beforeend', toastHtml);
			var toastEl = document.getElementById(toastId);
			new bootstrap.Toast(toastEl).show();
			toastEl.addEventListener('hidden.bs.toast', function () { if (toastEl.parentNode) toastEl.parentNode.removeChild(toastEl); });
		} catch (err) { console.error('bootnotify error:', err); }
	}
</script>
</body>
</html>

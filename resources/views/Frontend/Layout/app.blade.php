<!DOCTYPE html>
<html lang="en">
	<head>
		<title>test</title>
		<!-- meta tags -->

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<meta name="keywords" content="" />
		<meta name="description" content="" />    
		<meta name="type" CONTENT="universal-call.com" />
		<meta name="copyright" content="Copyright 2006 Calling Cards" />
		<meta name="robots" content="index,follow" />
		<meta name="revisit-after" content="5 days" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta name="rating" content="general" />
		<meta name="resource-type" content="document" />
		<meta name="distribution" content="global" />
		<meta name="abstract" content="}" />

		<!-- social media tags -->
		<meta property="fb:pages" content="https://www.facebook.com/UniversalCallPinless/"/>
		<meta property="og:type" content="website"/>
		<meta property="og:url" content="https://www.universal-call.com"/>                
		<meta property="og:title" content=""/>
		<meta property="og:site_name" content=""/>
		<meta property="og:description" content="" /> 
		<meta property="og:image" content="http://new.universal.allwebsitedemo.site/img/universal/logo2.png" />
		
		<!-- End social media tags -->
		<!-- Favicon -->
		<link rel="shortcut icon" href="" type="image/x-icon" />
		<link rel="apple-touch-icon" href="{{asset('frontend/img/apple-touch-icon.png')}}">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/fontawesome-free/css/all.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/animate/animate.compat.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/owl.carousel/assets/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/owl.carousel/assets/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/magnific-popup/magnific-popup.min.css')}}">

		<!-- Data table css -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
		

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset('frontend/css/theme.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/css/theme-elements.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/css/theme-blog.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/css/theme-shop.css')}}">

		<!-- Demo CSS -->
		<link rel="stylesheet" href="{{asset('frontend/css/demos/demo-auto-services.css')}}">


		<!-- Current Page CSS -->
		<link rel="stylesheet" href="{{asset('frontend/vendor/circle-flip-slideshow/css/component.css')}}">

		<!-- Skin CSS -->
		<link id="skinCSS" rel="stylesheet" href="{{asset('frontend/css/skins/default.css')}}">

		<!-- Head Libs -->
		<script src="{{asset('frontend/vendor/modernizr/modernizr.min.js')}}"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">


	</head>

	<body>		
		<div class="body">
			<!-- HEADER-SECTION -->
            @include('Frontend.Layout.header')
			<div role="main" class="main">
                @yield('content')
			</div>

			@include('Frontend.Layout.footer')
		</div>

		<!-- Vendor -->
		<script src="{{asset('frontend/js/jquery1-3.4.1.min.js')}}"></script>
		<script src="{{asset('frontend/vendor/plugins/js/plugins.min.js')}}"></script>
		<!-- Bootstrap Js -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="{{asset('frontend/js/theme.js')}}"></script>

		<!-- Circle Flip Slideshow Script -->
		<script src="{{asset('frontend/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js')}}"></script>
		<!-- Current Page Views -->
		<script src="{{asset('frontend/js/views/view.home.js')}}"></script>
		<!-- Theme Initialization Files -->
		<script src="{{asset('frontend/js/theme.init.js')}}"></script>
		<!-- <script src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=myMap"></script> -->
		

		<!-- DataTable js -->
		<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
		<!-- Theme Custom -->
		<script src="{{asset('frontend/js/custom.js')}}"></script>
		<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
		@yield('js_connect')
	</body>
</html>
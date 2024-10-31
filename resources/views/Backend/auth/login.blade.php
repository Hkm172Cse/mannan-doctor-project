<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Khanabana</title>

	<!-- Global stylesheets -->
	<link href="{{asset('backend/assets/fonts/inter/inter.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('backend/assets/icons/phosphor/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('backend/assets/css/all.min.css')}}" id="stylesheet" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!--Custome style-->
	<link href="{{ asset('backend/css/admin_panel/customestyle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/css/admin_panel/custome.responsive.css') }}" rel="stylesheet" type="text/css">
    <!--Custome style-->

	<!-- Core JS files -->
	<script src="{{asset('backend/assets/demo/demo_configurator.js')}}"></script>
	<script src="{{asset('backend/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('backend/assets/js/app.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body class="bg-dark">

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Content area -->
				<div class="content d-flex justify-content-center align-items-center">

					<!-- Login card -->
					<form class="login-form" action="{{route('admin.loggedin')}}" method="POST">
                        @csrf
						<div class="card mb-0">
							<div class="card-body">
							<a class="login-back-button text-dark" href="{{url('/')}}">x</a>
								<div class="text-center mb-3">
									<div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
										<a href="{{url('/')}}"><img src="{{asset('images/site-logo-blue.png')}}" class="h-48px" alt=""></a>	
									</div>
									<h5 class="mb-0">Login to your bb account</h5>
									<span class="d-block text-muted">Enter your credentials below</span>
								</div>

								<div class="mb-3">
									<label class="form-label">Email</label>
									<div class="form-control-feedback form-control-feedback-start">
										<input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="john@doe.com">
										<div class="form-control-feedback-icon">
											<i class="ph-user-circle text-muted"></i>
										</div>
									</div>
                                    @if ($errors->has('email'))
                                     <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
								</div>

								<div class="mb-3">
									<label class="form-label">Password</label>
									<div class="form-control-feedback form-control-feedback-start">
										<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="•••••••••••">
										<div class="form-control-feedback-icon">
											<i class="ph-lock text-muted"></i>
										</div>
									</div>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
								</div>

								<div class="d-flex align-items-center mb-3">
									<label class="form-check">
										<input type="checkbox" name="remember" class="form-check-input" checked>
										<span class="form-check-label">Remember</span>
									</label>

									{{-- <a href="login_password_recover.html" class="ms-auto">Forgot password?</a> --}}
								</div>

								<div class="mb-3">
									<button type="submit" class="btn btn_marun w-100">Sign in</button>
								</div>
								{{-- <div class="text-center text-muted content-divider mb-3">
									<span class="px-2">Don't have an account?</span>
								</div>

								<div class="mb-3">
									<a href="#" class="btn btn-light w-100">Sign up</a>
								</div>

								<span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span> --}}
							</div>
						</div>
					</form>
					<!-- /login card -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>

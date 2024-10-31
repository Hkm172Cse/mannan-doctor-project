@extends('Frontend.Layout.app')
@section('content')
            <section class="page-header page-header-modern bg-primary page-header-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 align-self-center p-static order-2 text-center">
                            <h1 class="font-weight-bold text-white">Login</h1>
                        </div>
                        <div class="col-md-12 align-self-center order-1">
                            <ul class="breadcrumb d-block text-center">
                                <li><a class="banner-btn" href="{{route('home')}}">Home</a></li>
                                <li class="active text-white">Pages</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

			<section class="row iframe-section">
				<iframe src="http://old.universal-call.com/customer/loginpage?no-header-footer" class="dynamic_iframe col-lg-12 col-md-12"></iframe>
			</section>

            <!-- <div class="container py-4">
                    <div class="row justify-content-center ">
						<div class="col-md-6 col-lg-5 mb-5 mb-lg-0 login-form-border">
							<form id="frmSignIn" method="post" class="needs-validation">
								<div class="row">
									<div class="form-group col">
										<label class="form-label text-color-dark text-3">Email address <span class="text-color-danger">*</span></label>
										<input type="text" value="" class="form-control form-control-lg text-4" required>
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<label class="form-label text-color-dark text-3">Password <span class="text-color-danger">*</span></label>
										<input type="password" value="" class="form-control form-control-lg text-4" required>
									</div>
								</div>
								<div class="row justify-content-between">
									<div class="form-group col-md-auto">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="rememberme">
											<label class="form-label custom-control-label cur-pointer text-2" for="rememberme">Remember Me</label>
										</div>
									</div>
									<div class="form-group col-md-auto">
										<a class="text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2" href="#">Forgot Password?</a>
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
									 <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">Login</button> -->
                                        <!-- <button type="submit" class="btn btn-primary-scale-2 btn-modern w-100 text-transform-none rounded-0 font-weight-bold align-items-center d-inline-flex justify-content-center text-3 py-3" data-loading-text="Loading...">Login</button>
										<div class="divider">
											<span class="bg-light px-4 position-absolute left-50pct top-50pct transform3dxy-n50">***</span>
										</div>
										
									</div>
								</div>
							</form>
						</div>
						
					</div> 

            </div> --> 
@endsection
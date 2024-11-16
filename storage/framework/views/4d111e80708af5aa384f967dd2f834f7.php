<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Doctors login</title>

	<!-- Global stylesheets -->
	<link href="<?php echo e(asset('backend/assets/fonts/inter/inter.css')); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo e(asset('backend/assets/icons/phosphor/styles.min.css')); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo e(asset('backend/css/all.min.css')); ?>" id="stylesheet" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!--Custome style-->
	<link href="<?php echo e(asset('backend/css/admin_panel/customestyle.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('backend/css/admin_panel/custome.responsive.css')); ?>" rel="stylesheet" type="text/css">
    <!--Custome style-->

	<!-- Core JS files -->
	<script src="<?php echo e(asset('backend/assets/demo/demo_configurator.js')); ?>"></script>
	<script src="<?php echo e(asset('backend/assets/js/bootstrap/bootstrap.bundle.min.js')); ?>"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo e(asset('backend/assets/js/app.js')); ?>"></script>
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
					<form class="login-form" action="<?php echo e(route('admin.loggedin')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
						<div class="card mb-0">
							<div class="card-body">
							<a class="login-back-button text-dark" href="<?php echo e(url('/')); ?>">x</a>
								<div class="text-center mb-3">
									<div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
										<a href="<?php echo e(url('/')); ?>"><img src="" class="h-48px" alt=""></a>	
									</div>
									<h5 class="mb-0">Login to your account</h5>
									<span class="d-block text-muted">Enter your credentials below</span>
								</div>

								<div class="mb-3">
									<label class="form-label">Email</label>
									<div class="form-control-feedback form-control-feedback-start">
										<input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"  placeholder="john@doe.com">
										<div class="form-control-feedback-icon">
											<i class="ph-user-circle text-muted"></i>
										</div>
									</div>
                                    <?php if($errors->has('email')): ?>
                                     <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                    <?php endif; ?>
								</div>

								<div class="mb-3">
									<label class="form-label">Password</label>
									<div class="form-control-feedback form-control-feedback-start">
										<input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="•••••••••••">
										<div class="form-control-feedback-icon">
											<i class="ph-lock text-muted"></i>
										</div>
									</div>
                                    <?php if($errors->has('password')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                    <?php endif; ?>
								</div>

								<div class="d-flex align-items-center mb-3">
									<label class="form-check">
										<input type="checkbox" name="remember" class="form-check-input" checked>
										<span class="form-check-label">Remember</span>
									</label>

									
								</div>

								<div class="mb-3">
									<button type="submit" class="btn btn_marun w-100">Sign in</button>
								</div>
								
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
<?php /**PATH D:\Me\Doctor_Admin\resources\views/Backend/admin/auth/login.blade.php ENDPATH**/ ?>
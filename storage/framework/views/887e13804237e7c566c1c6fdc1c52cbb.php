
<?php $__env->startSection('content'); ?>
<div role="main" class="main">

<section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
                <h1 class="font-weight-bold text-dark">Login</h1>
            </div>
            <div class="col-md-12 align-self-center order-1">
                <ul class="breadcrumb d-block text-center">
                    <li><a href="#">Home</a></li>
                    <li class="active">Pages</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container py-4">

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
            <h2 class="font-weight-bold text-5 mb-0">Login</h2>
            <form action="<?php echo e(route('doc.loggedin')); ?>" method="POST" id="frmSignIn" class="needs-validation">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3">Email address <span class="text-color-danger">*</span></label>
                        <input type="email" name="email" class="form-control form-control-lg text-4" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3">Password <span class="text-color-danger">*</span></label>
                        <input type="password" name="password" class="form-control form-control-lg text-4" required>
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
                        <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">Login</button>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_connect'); ?>
<script>
        let siteUrl = "<?php echo e(config('app.url')); ?>";
        console.log({siteUrl:siteUrl});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.Layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Me\Mannan_vai_project\resources\views/Frontend/Pages/doctor/auth/login.blade.php ENDPATH**/ ?>
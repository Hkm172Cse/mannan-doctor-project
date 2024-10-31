
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">

    <div class="col-xl-4">
    <!-- Start Quotation Section -->
    <a href="#">
    <div class="card">

        <div class="card-body pb-0">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="bg-success bg-opacity-10 text-success lh-1 rounded-pill p-2 me-3">
                            <i class="ph-clipboard-text"></i>
                        </span>
                        <div>
                            <div class="fw-semibold">Profile</div>
                        </div>
                    </div>
                    <div class="w-75 mx-auto mb-3" id="new-visitors"></div>
                </div>
            </div>
        </div>

        <div class="chart position-relative" id="traffic-sources"></div>
    </div>
    </a>
    <!-- /End Quotation Section -->
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Backend.layouts.doctor.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Me\Mannan_vai_project\resources\views/Backend/doctor/dashboard.blade.php ENDPATH**/ ?>
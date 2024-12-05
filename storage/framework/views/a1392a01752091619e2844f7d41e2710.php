
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $totalPatients = \App\Helpers\Helper::ChamberWisePatientCount($data->chember)
    ?> 
   
    <div class="col-xl-4">
    <!-- Start Quotation Section -->
    <a href="<?php echo e(route('doctor.chembers.patients', $data->chember)); ?>">
    <div class="card">

        <div class="card-body pb-0">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="bg-success bg-opacity-10 text-success lh-1 rounded-pill p-2 me-3">
                         <?php echo e($totalPatients); ?>

                        </span>
                        <div>
                            <div class="fw-semibold"><?php echo e($data->name); ?></div>
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
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Backend.layouts.doctor.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Me\Doctor_Admin\resources\views/Backend/doctor/serials.blade.php ENDPATH**/ ?>
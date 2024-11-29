
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
    <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $date = \App\Helpers\Helper::DayOfDate($data);
    $count_patients = \App\Helpers\Helper::CountPatients($date, $doctor_id, $chamber_id);
    ?>
    <div class="col-xl-4">
    <!-- Start Quotation Section -->
    <a href="<?php echo e(route('doctor.chembers.day.patients', ['doctor'=>$doctor_id, 'date'=>$date, 'chamber'=>$chamber_id])); ?>">
    <div class="card">

        <div class="card-body pb-0">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="bg-success bg-opacity-10 text-success lh-1 rounded-pill p-2 me-3 patients_count">
                            <?php echo e($count_patients); ?>

                        </p>
                        <div>
                            <div class="fw-semibold custom_flex">
                                <p>
                                    <?php echo e($data=='0'? "রবিবার":""); ?>

                                    <?php echo e($data=='1'? "সোমবার":""); ?>

                                    <?php echo e($data=='2'? "মঙ্গলবার":""); ?>

                                    <?php echo e($data=='3'? "বুধবার":""); ?>

                                    <?php echo e($data=='4'? "বৃহস্পতিবার,":""); ?>

                                    <?php echo e($data=='5'? "শুক্রবার":""); ?>

                                    <?php echo e($data=='6'? "শনিবার":""); ?>

                                    
                                </p>   
                                <p> <?php echo e($date); ?></p>
                            </div>
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

<?php echo $__env->make('Backend.layouts.doctor.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Me\Doctor_Admin\resources\views/Backend/doctor/chamber/chamber_days.blade.php ENDPATH**/ ?>
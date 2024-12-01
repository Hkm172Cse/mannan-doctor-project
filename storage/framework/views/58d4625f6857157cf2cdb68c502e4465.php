
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xl-12 col-lg-12">
    <!-- Start Quotation Section -->
    <div class="card d-flex flex-derection-row justify-content-center align-items-center" style="height: 400px;">
        
          <h3>নাম: <?php echo e($currentPatient->name); ?></h3>
          <p>জন্ম তারিখ: <?php echo e($currentPatient->birth_date); ?></p>
          <p>সিরিয়াল নাম্বার: <?php echo e($currentPatient->serial_number); ?></p>
        
        <div class="d-flex justify-content-center gap-2">
            <a href="<?php echo e(route('doctor.patient.status.skip', ['doctor'=>$doctor_id, 'date'=>$date, 'chamber'=>$chamber_id, 'patient_id'=>$currentPatient->id, 'serial'=>$currentPatient->serial_number])); ?>">
                <button class="btn btn-danger btn-sm">Skip</button>
            </a>
            <a href="<?php echo e(route('doctor.patient.status.completed', ['doctor'=>$doctor_id, 'date'=>$date, 'chamber'=>$chamber_id, 'patient_id'=>$currentPatient->id])); ?>">
            <button class="btn btn-primary btn-sm">Completed</button>
            </a>
            
        </div>
    </div>
    <!-- /End Quotation Section -->
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Backend.layouts.doctor.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Me\Doctor_Admin\resources\views/Backend/doctor/chamber/current_patient.blade.php ENDPATH**/ ?>
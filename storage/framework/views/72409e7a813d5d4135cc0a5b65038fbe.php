
<?php $__env->startSection('content'); ?>

<div class="container pt-5">
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <div class="row py-4 mb-2">
        <div class="col-md-7 order-2">
            <div class="overflow-hidden">
                <h2 class="text-color-dark font-weight-bold text-12 mb-2 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300"><?php echo e($info->name); ?></h2>
            </div>
            <div class="overflow-hidden mb-3">
                <p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500"><?php echo e($info->bangla_title); ?></p>
            </div>
            <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">এমবিবিএস (ঢাকা), এফসিপিএস (সার্জারি), এমএস (ইউরোলজি), সহকারী অধ্যাপক (ইউরোলজি বিভাগ) -শের-ই-বাংলা মেডিকেল কলেজ হাসপাতাল, বরিশাল।</p>  
            <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
            <div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
               
            </div>
        </div>
        <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
            <img src="<?php echo e(asset('frontend/images/profile_images/profile_image.png')); ?>" class="img-fluid mb-2" alt="">
        </div>
    </div>

    <section id="elements" class="section section-height-2 border-0 mt-5 mb-0 pt-5">

<div class="container py-2">
    <div class="row mt-3 pb-4">
        <div class="col text-center">
            <h2 class="font-weight-bold mb-0">চেম্বারের সময়সূচী</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        
        <?php $__currentLoopData = $chamberData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="featured-boxes featured-boxes-modern-style-2 featured-boxes-modern-style-2-hover-only featured-boxes-modern-style-primary m-0 mb-4 pb-3">
                <div class="featured-box featured-box-no-borders featured-box-box-shadow">
                    <a href="<?php echo e(route('get.serial', ['chember'=>$chember->id, 'id'=>$info->id])); ?>" class="text-decoration-none">
                        <span class="box-content px-1 py-4 text-center d-block">
                            <span class="font-weight-bold text-uppercase text-1 negative-ls-1 d-block text-dark pt-2"><?php echo e($chember->name); ?></span>
                            <span class="font-weight-bold text-uppercase text-1 negative-ls-1 d-block text-dark pt-2"><?php echo e($chember->address); ?></span>
                            <span class="font-weight-bold text-uppercase text-1 negative-ls-1 d-block text-dark pt-2"><?php echo e($chember->start_time); ?>-<?php echo e($chember->end_time); ?></span>

                            <span class="font-weight-bold text-uppercase text-1 negative-ls-1 d-block text-dark pt-2">
                            <?php if($chember->active_days!= null): ?>
                                    <?php
                                    $activeDays = json_decode($chember->active_days);
                                    ?>
                                    <?php echo e(in_array("0", $activeDays)? "শনি,":""); ?>

                                <?php echo e(in_array("1", $activeDays)? "রবি,":""); ?>

                                <?php echo e(in_array("2", $activeDays)? "সোম,":""); ?>

                                <?php echo e(in_array("3", $activeDays)? "মঙ্গল,":""); ?>

                                <?php echo e(in_array("4", $activeDays)? "বুধ,":""); ?>

                                <?php echo e(in_array("5", $activeDays)? "বৃহস্পতি,":""); ?>

                                <?php echo e(in_array("6", $activeDays)? "শুক্র":""); ?>

                                <?php endif; ?>
                            </span>

                        </span>
                    </a>
                </div>
            </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>

</section>
    

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


    <!-- Modal sectoin start -->
    <!-- Modal section end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_connect'); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.Layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Me\Doctor_Admin\resources\views/Frontend/Pages/doctor/details.blade.php ENDPATH**/ ?>
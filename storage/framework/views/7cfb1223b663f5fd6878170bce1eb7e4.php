
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
<!-- Content area -->
<div class="content">

    <!-- Inner container -->
    <div class="d-lg-flex align-items-lg-start">

        <!-- Left sidebar component -->
        <div class="sidebar sidebar-component sidebar-expand-lg bg-transparent shadow-none me-lg-3">

            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- Left content -->
                <div class="card">
                    <div class="sidebar-section-body text-center">
                        <div class="card-img-actions d-inline-block mb-3">
                            <img class="img-fluid rounded-circle" src="<?php echo e(asset(Auth::guard('doctor')->user()->image)); ?>"
                                width="150" height="150" alt="">
                            <div class="card-img-actions-overlay card-img rounded-circle">
                                <a href="#" class="btn btn-outline-white btn-icon rounded-pill">
                                    <i class="ph-pencil"></i>
                                </a>
                            </div>
                        </div>

                        <h6 class="mb-0">Dr. <?php echo e(Auth::guard('doctor')->user()->name); ?>

                            <?php echo e(Auth::guard('doctor')->user()->last_name); ?>

                        </h6>
                        <span class="text-muted">Head of ....</span>
                    </div>

                    <ul class="nav nav-sidebar">
                        <li class="nav-item-divider"></li>
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active" data-bs-toggle="tab">
                                <i class="ph-user me-2"></i>
                                Description coming soon ...
                            </a>
                        </li>

                    </ul>
                </div>

                
                <!-- /Left content -->

            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /left sidebar component -->


        <!-- Right content -->
        <div class="tab-content flex-fill">
            <div class="tab-pane fade active show" id="profile">
                <!-- Profile info -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Profile information</h5>
                    </div>

                    <div class="card-body">
                        <form action="<?php echo e(route('doctor.profile.update')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="edit_id" value="<?php echo e(Auth::guard('doctor')->user()->id); ?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> Name</label>
                                        <input type="text" name="name" value="<?php echo e(Auth::guard('doctor')->user()->name); ?>"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email"
                                            value="<?php echo e(Auth::guard('doctor')->user()->email); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" value="<?php echo e(Auth::guard('doctor')->user()->phone); ?>"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Specialist</label>
                                        <select class="form-control" name="specialist">
                                            <?php $__currentLoopData = $specialist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($s_list->id); ?>"><?php echo e($s_list->bangla_title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Degree</label>
                                        <input type="text" name="degree"
                                            value="<?php echo e(Auth::guard('doctor')->user()->degree); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Present work place</label>
                                        <input type="text" name="present_w_p"
                                            value="<?php echo e(Auth::guard('doctor')->user()->present_w_p); ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Previous work place</label>
                                        <input type="text" name="previous_w_p"
                                            value="<?php echo e(Auth::guard('doctor')->user()->previous_w_p); ?>"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Visit fee</label>
                                        <input type="text" name="visit_fee"
                                            value="<?php echo e(Auth::guard('doctor')->user()->visit_fee); ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">BMDC</label>
                                        <input type="text" name="bmdc" value="<?php echo e(Auth::guard('doctor')->user()->bmdc); ?>"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Details</label>
                                        <textarea type="text" name="details" class="form-control">
                                        <?php echo e(Auth::guard('doctor')->user()->details); ?>

                                        </textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Special traing </label>
                                        <input type="text" name="special_trainig"
                                            value="<?php echo e(Auth::guard('doctor')->user()->special_trainig); ?>"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /profile info -->

            </div>

        </div>
        <!-- /right content -->

    </div>
    <!-- /inner container -->

</div>
<!-- /content area -->

<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('backend/assets/js/chember.js')); ?>"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('Backend.layouts.doctor.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Me\Doctor_Admin\resources\views/Backend/doctor/profile.blade.php ENDPATH**/ ?>
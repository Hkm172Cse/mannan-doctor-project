
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
<div class="card">
						<div class="card-header">
							<h6 class="mb-0">Edit Chembar</h6>
						</div>

	                	<form class="wizard-form steps-basic p-3" action="<?php echo e(route('doctor.chembar.update')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php if(session('success')): ?>
                            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                            <?php endif; ?>

                            <?php if(session('fail')): ?>
                            <div class="alert alert-danger"><?php echo e(session('fail')); ?></div>
                            <?php endif; ?>
							<fieldset>
								<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<div class="row">
                                    <input type="hidden" name="edit_id" value="<?php echo e($data->id); ?>">
                                    <div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label">Name:</label>
											<input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo e($data->name); ?>">
										</div>
									</div>

									<div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label">address:</label>
											<input type="text" name="address" class="form-control" placeholder="address" value="<?php echo e($data->address); ?>">
										</div>
									</div>

									<div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label">start_time:</label>
											<input type="text" name="start_time" class="form-control" placeholder="start_time" value="<?php echo e($data->start_time); ?>">
										</div>
									</div>

                                    <div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label">end_time:</label>
											<input type="text" name="end_time" class="form-control" placeholder="end_time" value="<?php echo e($data->end_time); ?>">
										</div>
									</div>

                                    <div class="col-lg-6">
										<div class="mb-3">
											<p class="fw-semibold d-flex">Active days</p>
                                            <div class="d-flex gap-3">
												<div class="form-check form-switch mb-2">
													<input type="checkbox" class="form-check-input" id="sc_ls_c" name="active_days[]" value="0" <?php echo e(in_array("0", $activeDays)? "checked":""); ?>>
													<label class="form-check-label" for="sc_ls_c">Sat</label>
												</div>

												<div class="form-check form-switch mb-3">
													<input type="checkbox" class="form-check-input" id="sc_ls_u" name="active_days[]" value="1" <?php echo e(in_array("1", $activeDays)? "checked":""); ?>>
													<label class="form-check-label" for="sc_ls_u">Sun</label>
												</div>
                                                <div class="form-check form-switch mb-2">
													<input type="checkbox" class="form-check-input" id="sc_ls_c" name="active_days[]" value="2" <?php echo e(in_array("2", $activeDays)? "checked":""); ?>>
													<label class="form-check-label" for="sc_ls_c">Mon</label>
												</div>

												<div class="form-check form-switch mb-3">
													<input type="checkbox" class="form-check-input" id="sc_ls_u" name="active_days[]" value="3" <?php echo e(in_array("3", $activeDays)? "checked":""); ?>>
													<label class="form-check-label" for="sc_ls_u">Tue</label>
												</div>
                                                <div class="form-check form-switch mb-2">
													<input type="checkbox" class="form-check-input" id="sc_ls_c" name="active_days[]" value="4" <?php echo e(in_array("4", $activeDays)? "checked":""); ?>>
													<label class="form-check-label" for="sc_ls_c">Wed</label>
												</div>

												<div class="form-check form-switch mb-3">
													<input type="checkbox" class="form-check-input" id="sc_ls_u" name="active_days[]" value="5" <?php echo e(in_array("5", $activeDays)? "checked":""); ?>>
													<label class="form-check-label" for="sc_ls_u">Thu</label>
												</div>
                                                <div class="form-check form-switch mb-2">
													<input type="checkbox" class="form-check-input" id="sc_ls_c" name="active_days[]" value="6" <?php echo e(in_array("6", $activeDays)? "checked":""); ?>>
													<label class="form-check-label" for="sc_ls_c">Fri</label>
												</div>
                                            </div>
										</div>
									</div>
								</div>
							</fieldset>

                            <div class="text-end">
									<button type="submit" class="btn btn_marun">Submit form <i class="ph-paper-plane-tilt ms-2"></i></button>
								</div>
						</form>
		            </div>     
<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('ul.pagination li a').on('click', function(e) {
                e.preventDefault();
                openLink($(this).attr('href'));
            })
        });

        function openLink(link) {
            $.ajax({
                url: link,
                type: 'GET',
            }).done(function(res) {
                console.log(res);
                $('.store_list').html(res);
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Backend.layouts.doctor.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Me\Doctor_Admin\resources\views/Backend/doctor/chamber/edit.blade.php ENDPATH**/ ?>
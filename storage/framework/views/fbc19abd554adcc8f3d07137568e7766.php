
<?php $__env->startSection('content'); ?>

<div style="width: 80%; margin:auto">
									<div class="card-body">
										<div class="row">
											<div class="col">
											  	<form class="contact-form form-with-icons" action="<?php echo e(route('booking.submit')); ?>" method="POST">
												  <?php echo csrf_field(); ?>
													<?php if(session('success')): ?>
													<div class="alert alert-success"><?php echo e(session('success')); ?></div>
													<?php endif; ?>

													<?php if(session('fail')): ?>
													<div class="alert alert-danger"><?php echo e(session('fail')); ?></div>
													<?php endif; ?>
													<div class="contact-form-success alert alert-success d-none mt-4">
														<strong>Success!</strong> Your message has been sent to us.
													</div>

													<div class="contact-form-error alert alert-danger d-none mt-4">
														<strong>Error!</strong> There was an error sending your message.
														<span class="mail-error-message text-1 d-block"></span>
													</div>

													<div class="row">
														<div class="form-group col-lg-6">
															<label class="form-label mb-1 text-2">আপনার নাম লিখুন:</label>
															<div class="position-relative">
																<i class="icons icon-user text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
																<input type="text" data-msg-required="Please enter your name." maxlength="100" class="form-control text-3 h-auto py-2" name="name" required>
															</div>
														</div>
														<div class="form-group col-lg-6">
															<label class="form-label mb-1 text-2">এনআইডি নম্বার:</label>
															<div class="position-relative">
																<i class="icons icon-envelope text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
																<input type="text" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 h-auto py-2" name="nid" required>
															</div>
														</div>

														<div class="form-group col-lg-6">
															<label class="form-label mb-1 text-2" for="dateDropdown">তারিখ নির্বাচন করুন:
																<span>
																<?php
																$active_Days = json_decode($activeDays);
																?>
																<?php echo e(in_array("6", $active_Days)? "শনি,":""); ?>

																<?php echo e(in_array("0", $active_Days)? "রবি,":""); ?>

																<?php echo e(in_array("1", $active_Days)? "সোম,":""); ?>

																<?php echo e(in_array("2", $active_Days)? "মঙ্গল,":""); ?>

																<?php echo e(in_array("3", $active_Days)? "বুধ,":""); ?>

																<?php echo e(in_array("4", $active_Days)? "বৃহস্পতি,":""); ?>

																<?php echo e(in_array("5", $active_Days)? "শুক্র":""); ?>

																</span>
																(<span class="day-limit-text">সর্বোচ্চ ৫ দিন আগ পর্যন্ত তারিখ নির্বাচন করতে পারবেন </span>)
															</label>
															<select id="dateDropdown" class="form-control py-2" name="date">
																<option value="">-- Select a Date --</option>
															</select>
														</div>

														<div class="form-group col-lg-6">
															<label class="form-label mb-1 text-2">জন্ম তারিখ:</label>
															<div class="position-relative">
																<i class="icons icon-envelope text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
																<input type="date" class="form-control text-3 h-auto py-2" name="birth_date" required>
															</div>
														</div>

													</div>
													
													<div class="row">
														<div class="form-group col">
															<label class="form-label mb-1 text-2">যোগাযোগ নাম্বার</label>
															<div class="position-relative">
																<i class="icons icon-note text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
																<input type="text" data-msg-required="Please enter the subject." maxlength="100" class="form-control text-3 h-auto py-2" name="phone" required>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group col">
															<label class="form-label mb-1 text-2">আপনার রোগ সম্পর্কে সংক্ষিপ্ত রিবরণ দিন (অপশনাল)</label>
															<div class="position-relative">
																<i class="icons icon-bubble text-color-primary text-3 position-absolute left-15 top-15"></i>
																<textarea maxlength="5000" data-msg-required="Please enter your message." rows="8" class="form-control text-3 h-auto py-2" name="message" required></textarea>
															</div>
														</div>
													</div>
													<div>
														<input type="hidden" name="doctor_id" value="<?php echo e($id); ?>">
														<input type="hidden" name="chember" value="<?php echo e(json_encode($chember)); ?>"> 
													</div>
													<div class="row">
												  		<div class="form-group col">
													    	<div class="form-check">
													      		<input class="form-check-input" type="checkbox" value="" name="agree" id="tabContent13Checkbox" data-msg-required="You must agree before submiting." required>
													      		<label class="form-check-label" for="tabContent13Checkbox">
													        		Agree to terms and conditions
													      		</label>
													   		</div>
													  	</div>
											  		</div>
													<div class="row">
														<div class="form-group col">
															<input type="submit" value="সিরিয়াল নিন" class="btn btn-primary" data-loading-text="Loading...">
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
    <!-- Modal sectoin start -->
    <!-- Modal section end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_connect'); ?>
<script>
	const allowedDays = <?php echo json_encode($activeDays, 15, 512) ?>;

    document.addEventListener("DOMContentLoaded", function () {
	const maxDaysAhead = 4; 
	const dropdown = document.getElementById("dateDropdown");
	const today = new Date();

	for (let i = 0; i <= maxDaysAhead; i++) {
		const futureDate = new Date();
		futureDate.setDate(today.getDate() + i);

		const dayOfWeek = futureDate.getDay();

		// Check if the day is allowed
		if (allowedDays.includes(dayOfWeek)) {
		// const formattedDate = futureDate.toISOString().split("T")[0]; // Format as YYYY-MM-DD
		const formattedDate = `${String(futureDate.getDate()).padStart(2, '0')}-${String(futureDate.getMonth() + 1).padStart(2, '0')}-${futureDate.getFullYear()}`;
		const dayName = futureDate.toLocaleDateString("en-US", { weekday: "long" }); // Get day name

		// Add the date as an option in the dropdown
		const option = document.createElement("option");
		option.value = formattedDate;
		option.textContent = `${formattedDate} (${dayName})`;
		dropdown.appendChild(option);
		}
	}
	});


</script>
   <!-- <script>
			const calendar = flatpickr("#calendar", {
			dateFormat: "Y-m-d", 
			locale: {
				firstDayOfWeek: 1
			}
			});

			function dateFunction(allowedDays) {
			calendar.set("disable", [
				function (date) {
				const day = date.getDay();
				return !allowedDays.includes(day);
				}
			]);
			calendar.open();
			}
   </script> -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.Layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Me\Doctor_Admin\resources\views/Frontend/Pages/doctor/booking.blade.php ENDPATH**/ ?>
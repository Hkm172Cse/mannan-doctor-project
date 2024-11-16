	<!-- Main navbar -->
	<div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
		<div class="container-fluid">
			<div class="d-flex d-lg-none me-2">
				<button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
					<i class="ph-list"></i>
				</button>
			</div>

			<div class="navbar-brand flex-1 flex-lg-0" style="width: 250px">
				<a href="<?php echo e(route('admin.dashboard')); ?>" class="d-inline-flex align-items-center">
					<img src="<?php echo e(asset('images/site-logo-blue.png')); ?>" style="width:100%;height:60px" alt="">
					
				</a>
			</div>

			

			<ul class="nav flex-row justify-content-end order-1 order-lg-2">
				

				<li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
					<a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
						
						<p class="user-info">
							<span class="mx-lg-2"></span>
							<small>Admin Account</small>
						</p>
					</a>

					<div class="dropdown-menu dropdown-menu-end">
						<a href="#" class="dropdown-item">
							<i class="ph-user-circle me-2"></i>
							My profile
						</a>
						
						<button type="button" data-bs-toggle="modal" data-bs-target="#password_change" class="dropdown-item">
							<i class="ph-gear me-2"></i>
							Change Password
						</button>
						<a href="<?php echo e(route('admin.logout')); ?>" class="dropdown-item">
							<i class="ph-sign-out me-2"></i>
							Logout
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	 <!-- Danger modal -->
	 <div id="password_change" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white border-0">
                    <h6 class="modal-title">Change Password</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
				<form id="change_password_form" action="#" method="POST">
					<?php echo csrf_field(); ?>
					<div class="modal-body">
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" id="new_password" placeholder="Password">
						  </div>
						  <div class="form-group">
							<label for="confirm_password">Confirm Password</label>
							<input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
						  </div>
					</div>
	
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-bs-dismiss="modal">No</button>
						<button type="button" onclick="submitChangePassword()" class="btn btn-primary">Change</button>
					</div>
				</form>
            </div>
        </div>
    </div>
    <!-- /default modal -->
<?php /**PATH D:\Me\Doctor_Admin\resources\views/Backend/layouts/admin/top.blade.php ENDPATH**/ ?>
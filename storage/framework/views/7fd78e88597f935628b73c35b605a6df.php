<div class="sidebar-content">
 <!-- Sidebar header -->
 <div class="sidebar-section">
		<div class="sidebar-section-body d-flex justify-content-center">
			<h5 class="sidebar-resize-hide flex-grow-1 my-auto"></h5>

			<div>
			<!-- <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
				<i class="ph-arrows-left-right"></i>
			</button> -->

			<button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
				<i class="ph-x"></i>
			</button>
			</div>
		</div>
	</div>
	<!-- /sidebar header -->
    <!-- Main navigation -->
    <div class="sidebar-section">
        <ul class="nav nav-sidebar" data-nav-type="accordion">

            <!-- Main -->

            <li class="nav-item">
                <a href="<?php echo e(route('doctor.dashboard')); ?>" class="nav-link">
                    <i class="ph-house"></i>
                    <span>
                        ডেসবোর্ড
                        
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?php echo e(route('doctor.serial.list')); ?>" class="nav-link">
                    <i class="ph-users"></i>
                    <span>সিরিয়াল লিস্ট</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?php echo e(route('doctor.old.patients')); ?>" class="nav-link">
                    <i class="ph-users"></i>
                    <span>Old Patients</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?php echo e(route('doctor.chamber.list')); ?>" class="nav-link">
                    <i class="ph-users"></i>
                    <span>চেম্বার</span>
                </a>
            </li>
           
            <li class="nav-item">
                <a href="<?php echo e(route('doc.logout')); ?>" class="nav-link">
                    <i class="ph-sign-out"></i>
                    <span>
                        লগআউট
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <!-- /main navigation -->

</div>
<?php /**PATH D:\Me\Doctor_Admin\resources\views/Backend/layouts/doctor/left-sidebar.blade.php ENDPATH**/ ?>
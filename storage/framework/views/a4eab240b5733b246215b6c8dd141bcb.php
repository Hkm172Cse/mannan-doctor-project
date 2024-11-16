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
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link">
                    <i class="ph-house"></i>
                    <span>
                        Dashboard
                        
                    </span>
                </a>
            </li>

           
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="ph-users"></i>
                    <span>Doctors</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="ph-users"></i>
                    <span>List</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.spacialist')); ?>" class="nav-link">
                    <i class="ph-users"></i>
                    <span>Specialist</span>
                </a>
            </li>
           
            <li class="nav-item">
                <a href="<?php echo e(route('admin.logout')); ?>" class="nav-link">
                    <i class="ph-sign-out"></i>
                    <span>
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <!-- /main navigation -->

</div>
<?php /**PATH D:\Me\Doctor_Admin\resources\views/Backend/layouts/admin/left-sidebar.blade.php ENDPATH**/ ?>
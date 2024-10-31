<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?> Admin | Doctor</title>

    <!-- Global stylesheets -->
    <link href="<?php echo e(asset('backend/assets/fonts/inter/inter.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('backend/assets/icons/phosphor/styles.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('backend/css/all.min.css')); ?>" id="stylesheet" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!--Custome style-->
	<link href="<?php echo e(asset('backend/css/admin_panel/customestyle.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('backend/css/admin_panel/custome.responsive.css')); ?>" rel="stylesheet" type="text/css">
    <!--Custome style-->

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/css/style.css')); ?>">

    <!--Multi select css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
    <?php echo $__env->yieldPushContent('css'); ?>

</head>

<body>

    <!-- Main navbar -->
    <?php echo $__env->make('Backend.layouts.doctor.top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

            <!-- Sidebar content -->
            <?php echo $__env->make('Backend.layouts.doctor.left-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <?php echo $__env->make('Backend.layouts.doctor.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- /page header -->


            <!-- Inner content -->
            <div class="content-inner">

                <!-- Content area -->
                <div class="content">

                    <?php echo $__env->yieldContent('content'); ?>

                </div>
                <!-- /content area -->

            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>



    <!-- Danger modal -->
    <div id="delete_modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white border-0">
                    <h6 class="modal-title">Delete</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <h4>Are You sure, You want to Delete?</h4>
                    <h5 id="custom-body"></h5>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                    <a href="#" class="btn btn-danger" id="delete-btn">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /default modal -->

    <!-- /page content -->

    <!-- Core JS files -->
    <script src="<?php echo e(asset('backend/assets/demo/demo_configurator.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/js/bootstrap/bootstrap.bundle.min.js')); ?>"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="<?php echo e(asset('backend/assets/js/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/js/vendor/tables/datatables/datatables.min.js')); ?>"></script>

    
    

    <script src="<?php echo e(asset('backend/assets/js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/demo/pages/datatables_basic.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/js/custom.js')); ?>"></script>
    <!-- /theme JS files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('mlt_select');  // id
        new MultiSelectTag('mlt_select_channel');
        new MultiSelectTag('ingredients_select');
    </script>

    <script>
        <?php if(Session::has('success')): ?>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("<?php echo e(session('success')); ?>");
        <?php endif; ?>

        <?php if(Session::has('error')): ?>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>
    </script>

    
    <script>
        function deleteModal(e) {
            $('#delete_modal').modal('show')
            var header = $(e).attr("data-header");
            var body = $(e).attr("data-body");
            var url = $(e).attr("data-url");
            $('#delete-btn').attr('href', url);
            if (!header == '') {
                $('.modal-title').text(header);
            }
            if (!body == '') {
                $('#custom-body').text(body);
            }
        }
        $('.delete_modal').on('click', function() {
            $('#delete_modal').modal('show')
            var header = $(this).attr("data-header");
            var body = $(this).attr("data-body");
            var url = $(this).attr("data-url");
            $('#delete-btn').attr('href', url);
            if (!header == '') {
                $('.modal-title').text(header);
            }
            if (!body == '') {
                $('#custom-body').text(body);
            }
        })
    </script>


    <?php echo $__env->yieldPushContent('js'); ?>
</body>

</html>
<?php /**PATH D:\Me\Mannan_vai_project\resources\views/Backend/layouts/doctor/master.blade.php ENDPATH**/ ?>
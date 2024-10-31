<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') Admin | Doctor</title>

    <!-- Global stylesheets -->
    <link href="{{ asset('backend/assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/css/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!--Custome style-->
	<link href="{{ asset('backend/css/admin_panel/customestyle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/css/admin_panel/custome.responsive.css') }}" rel="stylesheet" type="text/css">
    <!--Custome style-->

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">

    <!--Multi select css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
    @stack('css')

</head>

<body>

    <!-- Main navbar -->
    @include('Backend.layouts.doctor.top')
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

            <!-- Sidebar content -->
            @include('Backend.layouts.doctor.left-sidebar')
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            @include('Backend.layouts.doctor.breadcrumb')
            <!-- /page header -->


            <!-- Inner content -->
            <div class="content-inner">

                <!-- Content area -->
                <div class="content">

                    @yield('content')

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
    <script src="{{ asset('backend/assets/demo/demo_configurator.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('backend/assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>

    
    

    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <script src="{{ asset('backend/assets/demo/pages/datatables_basic.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
    <!-- /theme JS files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('mlt_select');  // id
        new MultiSelectTag('mlt_select_channel');
        new MultiSelectTag('ingredients_select');
    </script>

    <script>
        @if (Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif
    </script>

    {{-- dynamic delete --}}
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


    @stack('js')
</body>

</html>

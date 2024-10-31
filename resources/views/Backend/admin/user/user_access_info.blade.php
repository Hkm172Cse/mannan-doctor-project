@extends('layouts.admin.master')
@push('css')
@endpush


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">User Access Information List</h5>
                    </div>
                </div>
                <div class="row mx-3 my-3">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <input type="text" id="product_search" placeholder="search" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="store_list table-responsive">
                    @include('admin.user.tables.user_acces_info_table')
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('ul.pagination li a').on('click', function(e) {
                e.preventDefault();
                openLink($(this).attr('href'));
            })
        });

        // $('#product_search').on('input', function() {
        //     var search = $('#product_search').val();
        //     console.log({
        //         search
        //     })
        //     if (search.length > 2) {
        //         var url = '/store/search/' + search;
        //         openLink(url)
        //     }
        // });

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
@endpush

@extends('Backend.layouts.admin.master')
@push('css')
@endpush


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Doctors specialists</h5>
                </div>
            </div>
            <div class="row mx-3 my-3">
                <a href="{{route('admin.add.spacial')}}"><button class="btn btn-primary">Add</button></a>
                
            </div>
            <div class="store_list table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Specialist</th>
                            <th>Bangla title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($specialists as $key => $spacial)
                                                <tr>
                                                    <td>{{$key}}</td>
                                                    <td>{{$spacial->title}}</td>
                                                    <td>{{$spacial->bangla_title}}</td>
                                                    <td>
                                                        <a href="{{route('admin.edit.spacialist', $spacial->id)}}">Edit</a>
                                                        
                                                    </td>
                                                    </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection


@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('ul.pagination li a').on('click', function (e) {
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
            }).done(function (res) {
                console.log(res);
                $('.store_list').html(res);
            });
        }
    </script>
@endpush
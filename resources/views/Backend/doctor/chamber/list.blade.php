@extends('Backend.layouts.doctor.master')
@push('css')
@endpush


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Chamber list</h5>
                    </div>
                </div>
                
                <div class="store_list table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Start time</th>
                            <th>End time</th>
                            <th>Active days</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key=>$data)
                        
                        <tr> 
                            <td>{{++$key}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->address}}</td>
                            <td>{{$data->start_time}}</td>
                            <td>{{$data->end_time}}</td>
                            <td>{{$data->active_days}}</td>
                            <td class="text-center">
                                <div class="d-inline-flex">
                                    <div class="dropdown">
                                        <a href="#" class="text-body" data-bs-toggle="dropdown">
                                            <i class="ph-list"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="{{route('doctor.chamber.edit', $data->id)}}" class="dropdown-item text-primary">
                                                <i class="ph-pen me-2"></i>
                                                Edit
                                            </a>
                                            
                                            <button type="button" 
                                                data-url="/admin/store/delete/{{$data->id}}" 
                                                data-header="{{$data->id}}"
                                                data-body="{{$data->id}}"
                                            class="dropdown-item text-danger delete_modal ">
                                                <i class="ph-trash me-2"></i>
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
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
@endpush

@extends('Backend.layouts.doctor.master')
@push('css')
@endpush


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Patients</h5>
                        <a href="{{route('doctor.add.chamber')}}"><button class="btn btn-sm btn-primary">Add</button></a>
                    </div>
                    @if (session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                            @endif

                            @if (session('fail'))
                            <div class="alert alert-danger">{{session('fail')}}</div>
                            @endif
                </div>
                
                <div class="store_list table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key=>$data)
                        <tr> 
                            <td>{{++$key}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->phone}}</td>
                            <td>   
                            </td>
                            <td class="text-center">
                                <div class="d-flex align-items-center gap-1">
                                    <button class="customEditBtn">
                                    <a href="{{route('doctor.chamber.edit', $data->id)}}" class="dropdown-item text-primary">
                                                <i class="ph-pen"></i>
                                            </a>
                                    </button>
                                    <button type="button" 
                                                data-url="/admin/store/delete/{{$data->id}}" 
                                                data-header="{{$data->id}}"
                                                data-body="{{$data->id}}"
                                            class="customDeleteBtn delete_modal ">
                                                <i class="ph-trash"></i>
                                            </button>
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

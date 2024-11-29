@extends('Backend.layouts.doctor.master')
@push('css')
@endpush


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">চেম্বার তালিকা</h5>
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
                            <td>
                                @if ($data->active_days!= null)
                                    @php
                                    $activeDays = json_decode($data->active_days);
                                    @endphp
                                    {{in_array("6", $activeDays)? "শনি,":""}}
                                    {{in_array("0", $activeDays)? "রবি,":""}}
                                    {{in_array("1", $activeDays)? "সোম,":""}}
                                    {{in_array("2", $activeDays)? "মঙ্গল,":""}}
                                    {{in_array("3", $activeDays)? "বুধ,":""}}
                                    {{in_array("4", $activeDays)? "বৃহস্পতি,":""}}
                                    {{in_array("5", $activeDays)? "শুক্র":""}}
                                @endif
                                
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

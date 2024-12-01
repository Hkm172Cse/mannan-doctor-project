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
                        <a href="{{route('doctor.start', ['doctor'=>$doctor_id, 'date'=>$date, 'chamber'=>$chamber_id])}}"><button class="btn btn-sm btn-primary">Start</button></a>
                    </div>
                            @if (session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                            @endif

                            @if (session('fail'))
                            <div class="alert alert-danger">{{session('fail')}}</div>
                            @endif

                            @if (session('completed'))
                            <div class="alert alert-success mt-3">{{session('completed')}}</div>
                            @endif
                </div>
                
                <div class="store_list table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key=>$data)
                        <tr> 
                            <td>{{$data->serial_number}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->phone}}</td>
                            <td>
                                @if ($data->status == "completed")
                                   <button style="border:none; padding:0 5px; background:green; border-radius: 10px; color:#fff; font-size:10px">{{$data->status}}</button> 
                                @else
                                    <button style="border:none; padding:0 5px; background:red; border-radius: 10px; color:#fff; font-size:10px">{{$data->status}}</button> 
                                @endif
                                
                            </td>
                            
                            <td>   
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

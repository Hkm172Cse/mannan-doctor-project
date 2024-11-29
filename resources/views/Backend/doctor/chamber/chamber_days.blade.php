@extends('Backend.layouts.doctor.master')
@push('css')
@endpush


@section('content')
<div class="row">
    @foreach ($days as $data)
    @php
    $date = \App\Helpers\Helper::DayOfDate($data);
    $count_patients = \App\Helpers\Helper::CountPatients($date, $doctor_id, $chamber_id);
    @endphp
    <div class="col-xl-4">
    <!-- Start Quotation Section -->
    <a href="{{route('doctor.chembers.day.patients', ['doctor'=>$doctor_id, 'date'=>$date, 'chamber'=>$chamber_id])}}">
    <div class="card">

        <div class="card-body pb-0">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="bg-success bg-opacity-10 text-success lh-1 rounded-pill p-2 me-3 patients_count">
                            {{$count_patients}}
                        </p>
                        <div>
                            <div class="fw-semibold custom_flex">
                                <p>
                                    {{$data=='0'? "রবিবার":""}}
                                    {{$data=='1'? "সোমবার":""}}
                                    {{$data=='2'? "মঙ্গলবার":""}}
                                    {{$data=='3'? "বুধবার":""}}
                                    {{$data=='4'? "বৃহস্পতিবার,":""}}
                                    {{$data=='5'? "শুক্রবার":""}}
                                    {{$data=='6'? "শনিবার":""}}
                                    
                                </p>   
                                <p> {{$date}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-75 mx-auto mb-3" id="new-visitors"></div>
                </div>
            </div>
        </div>

        <div class="chart position-relative" id="traffic-sources"></div>
    </div>
    </a>
    <!-- /End Quotation Section -->
    </div>
    @endforeach
</div>

@endsection


@push('js')
@endpush

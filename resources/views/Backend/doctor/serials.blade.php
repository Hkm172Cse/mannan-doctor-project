@extends('Backend.layouts.doctor.master')
@push('css')
@endpush


@section('content')
<div class="row">
    @foreach ($data as $data)
    @php
    $totalPatients = \App\Helpers\Helper::ChamberWisePatientCount($data->chember)
    @endphp 
   
    <div class="col-xl-4">
    <!-- Start Quotation Section -->
    <a href="{{route('doctor.chembers.patients', $data->chember)}}">
    <div class="card">

        <div class="card-body pb-0">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="bg-success bg-opacity-10 text-success lh-1 rounded-pill p-2 me-3">
                         {{$totalPatients}}
                        </span>
                        <div>
                            <div class="fw-semibold">{{$data->name}}</div>
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

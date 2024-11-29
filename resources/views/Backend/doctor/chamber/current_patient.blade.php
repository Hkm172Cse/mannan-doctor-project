@extends('Backend.layouts.doctor.master')
@push('css')
@endpush


@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
    <!-- Start Quotation Section -->
    <div class="card d-flex flex-derection-row justify-content-center align-items-center" style="height: 400px;">
        
          <h3>নাম: {{$currentPatient->name}}</h3>
          <p>জন্ম তারিখ: {{$currentPatient->birth_date}}</p>
          <p>সিরিয়াল নাম্বার: {{$currentPatient->serial_number}}</p>
        
        <div class="d-flex justify-content-center gap-2">
            <a href="{{route('doctor.patient.status.skip', ['doctor'=>$doctor_id, 'date'=>$date, 'chamber'=>$chamber_id, 'patient_id'=>$currentPatient->id, 'serial'=>$currentPatient->serial_number])}}">
                <button class="btn btn-danger btn-sm">Skip</button>
            </a>
            <a href="{{route('doctor.patient.status.completed', ['doctor'=>$doctor_id, 'date'=>$date, 'chamber'=>$chamber_id, 'patient_id'=>$currentPatient->id])}}">
            <button class="btn btn-primary btn-sm">Completed</button>
            </a>
            
        </div>
    </div>
    <!-- /End Quotation Section -->
    </div>
</div>

@endsection


@push('js')
@endpush

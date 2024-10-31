@extends('Backend.layouts.admin.master')
@push('css')
@endpush


@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="mb-0">New specialist</h6>
        </div>

        <form class="wizard-form steps-basic p-3" action="{{route('admin.insert.special')}}" method="post"
            enctype="multipart/form-data">
            @csrf

            <fieldset>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Title:</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label class="form-label">Bangla title:</label>
                        <div class="mb-3 input-group">
                            <input type="text" name="bangla_title" class="form-control"
                                placeholder="Bangla title">
                        </div>
                    </div>
                </div>
            </fieldset>

            <div class="text-end">
                <button type="submit" class="btn btn_marun">Submit form <i
                        class="ph-paper-plane-tilt ms-2"></i></button>
            </div>
        </form>
    </div>
@endsection
@push('js')
@endpush

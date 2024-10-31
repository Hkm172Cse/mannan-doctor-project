@extends('Frontend.Layout.app')
@section('content')
<div role="main" class="main">

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark" style="word-spacing: 6px;">আপনার সিরিয়াল নিন</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="#">Home</a></li>
                        <li class="active">Pages</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
                <h2 class="font-weight-bold text-5 mb-0" style="word-spacing: 6px;">আপনার তথ্য লিখুন</h2>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{route('patient.insert.serial')}}" method="POST" id="frmSignIn" class="needs-validation">
                    @csrf
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3">এন আইডি নম্বর <span
                                    class="text-color-danger">*</span></label>
                            <input type="text" name="nid" class="form-control form-control-lg text-4" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3">নাম <span
                                    class="text-color-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-lg text-4" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label text-color-dark text-3">মোবাইল নম্বর <span
                                    class="text-color-danger">*</span></label>
                            <input type="text" name="phone" class="form-control form-control-lg text-4" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <button type="submit"
                                class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3"
                                data-loading-text="Loading...">সাবমিট করুন</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection

@section('js_connect')
<script>
    let siteUrl = "{{ config('app.url') }}";
    console.log({ siteUrl: siteUrl });
</script>
@endsection
@extends('Backend.layouts.doctor.master')
@push('css')
@endpush


@section('content')
<!-- Content area -->
<div class="content">

    <!-- Inner container -->
    <div class="d-lg-flex align-items-lg-start">

        <!-- Left sidebar component -->
        <div class="sidebar sidebar-component sidebar-expand-lg bg-transparent shadow-none me-lg-3">

            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- Left content -->
                <div class="card">
                    <div class="sidebar-section-body text-center">
                        <div class="card-img-actions d-inline-block mb-3">
                            <img class="img-fluid rounded-circle" src="{{asset(Auth::guard('doctor')->user()->image)}}"
                                width="150" height="150" alt="">
                            <div class="card-img-actions-overlay card-img rounded-circle">
                                <a href="#" class="btn btn-outline-white btn-icon rounded-pill">
                                    <i class="ph-pencil"></i>
                                </a>
                            </div>
                        </div>

                        <h6 class="mb-0">Dr. {{Auth::guard('doctor')->user()->name}}
                            {{Auth::guard('doctor')->user()->last_name}}
                        </h6>
                        <span class="text-muted">Head of ....</span>
                    </div>

                    <ul class="nav nav-sidebar">
                        <li class="nav-item-divider"></li>
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active" data-bs-toggle="tab">
                                <i class="ph-user me-2"></i>
                                Description coming soon ...
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="card">
                    <div class="card-header">Chember information</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                            
                                @php
                                    $chembersArr = Auth::guard('doctor')->user()->chembar;
                                    $chambers = json_decode($chembersArr);
                                @endphp
                               @if(is_array($chambers))
                                    @foreach ($chambers as $cham)
                                        <ul id="cham_list">
                                            <li><strong>{{$cham->name}}</strong> <p>{{$cham->address}}, {{$cham->time}}</p></li>
                                        </ul>
                                    @endforeach
                                @endif
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <a class="cursor-pointer text-decoration-underline" id="chemberAddBtn"><i class="ph-plus border rounded-circle border-primary"></i>  Add chamber</a>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="ChemberContainer">

                        </div>
                    </div>
                </div>
                <!-- /Left content -->

            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /left sidebar component -->


        <!-- Right content -->
        <div class="tab-content flex-fill">
            <div class="tab-pane fade active show" id="profile">
                <!-- Profile info -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Profile information</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{route('doctor.profile.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="edit_id" value="{{Auth::guard('doctor')->user()->id}}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> Name</label>
                                        <input type="text" name="name" value="{{Auth::guard('doctor')->user()->name}}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email"
                                            value="{{Auth::guard('doctor')->user()->email}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" value="{{Auth::guard('doctor')->user()->phone}}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Specialist</label>
                                        <select class="form-control" name="specialist">
                                            @foreach ($specialist as $s_list)
                                            <option value="{{$s_list->id}}">{{$s_list->bangla_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Degree</label>
                                        <input type="text" name="degree"
                                            value="{{Auth::guard('doctor')->user()->degree}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Present work place</label>
                                        <input type="text" name="present_w_p"
                                            value="{{Auth::guard('doctor')->user()->present_w_p}}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Previous work place</label>
                                        <input type="text" name="previous_w_p"
                                            value="{{Auth::guard('doctor')->user()->previous_w_p}}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Visit fee</label>
                                        <input type="text" name="visit_fee"
                                            value="{{Auth::guard('doctor')->user()->visit_fee}}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">BMDC</label>
                                        <input type="text" name="bmdc" value="{{Auth::guard('doctor')->user()->bmdc}}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Details</label>
                                        <textarea type="text" name="details" class="form-control">
                                        {{Auth::guard('doctor')->user()->details}}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Special traing </label>
                                        <input type="text" name="special_trainig"
                                            value="{{Auth::guard('doctor')->user()->special_trainig}}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /profile info -->

            </div>

        </div>
        <!-- /right content -->

    </div>
    <!-- /inner container -->

</div>
<!-- /content area -->

@endsection


@push('js')
    <script src="{{ asset('backend/assets/js/chember.js') }}"></script>

@endpush
@extends('Backend.layouts.doctor.master')
@push('css')
@endpush


@section('content')
<div class="card">
						<div class="card-header">
							<h6 class="mb-0">Edit Chembar</h6>
						</div>

	                	<form class="wizard-form steps-basic p-3" action="{{route('doctor.chembar.insert')}}" method="post" enctype="multipart/form-data">
                            @csrf
							<fieldset>
							
								<div class="row">
                                    <input type="hidden" name="edit_id" >
                                    <div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label">Name:</label>
											<input type="text" name="name" class="form-control" placeholder="Name" >
										</div>
									</div>

									<div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label">address:</label>
											<input type="text" name="address" class="form-control" placeholder="address">
										</div>
									</div>

									<div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label">start_time:</label>
											<input type="text" name="start_time" class="form-control" placeholder="start_time">
										</div>
									</div>

                                    <div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label">end_time:</label>
											<input type="text" name="end_time" class="form-control" placeholder="end_time" >
										</div>
									</div>

                                    <div class="col-lg-6">
										<div class="mb-3">
											<p class="fw-semibold d-flex">Active days</p>
                                            <div class="d-flex gap-3">
												<div class="form-check form-switch mb-2">
													<input type="checkbox" class="form-check-input" id="sc_ls_c" name="active_days[]" value="6">
													<label class="form-check-label" for="sc_ls_c">Sat</label>
												</div>

												<div class="form-check form-switch mb-3">
													<input type="checkbox" class="form-check-input" id="sc_ls_u" name="active_days[]" value="0">
													<label class="form-check-label" for="sc_ls_u">Sun</label>
												</div>
                                                <div class="form-check form-switch mb-2">
													<input type="checkbox" class="form-check-input" id="sc_ls_c" name="active_days[]" value="1">
													<label class="form-check-label" for="sc_ls_c">Mon</label>
												</div>

												<div class="form-check form-switch mb-3">
													<input type="checkbox" class="form-check-input" id="sc_ls_u" name="active_days[]" value="2">
													<label class="form-check-label" for="sc_ls_u">Tue</label>
												</div>
                                                <div class="form-check form-switch mb-2">
													<input type="checkbox" class="form-check-input" id="sc_ls_c" name="active_days[]" value="3">
													<label class="form-check-label" for="sc_ls_c">Wed</label>
												</div>

												<div class="form-check form-switch mb-3">
													<input type="checkbox" class="form-check-input" id="sc_ls_u" name="active_days[]" value="4">
													<label class="form-check-label" for="sc_ls_u">Thu</label>
												</div>
                                                <div class="form-check form-switch mb-2">
													<input type="checkbox" class="form-check-input" id="sc_ls_c" name="active_days[]" value="5">
													<label class="form-check-label" for="sc_ls_c">Fri</label>
												</div>
                                            </div>
										</div>
									</div>
								</div>
							</fieldset>

                            <div class="text-end">
									<button type="submit" class="btn btn_marun">Submit form <i class="ph-paper-plane-tilt ms-2"></i></button>
								</div>
						</form>
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

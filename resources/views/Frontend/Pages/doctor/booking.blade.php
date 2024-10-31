@extends('Frontend.Layout.app')
@section('content')

<div style="width: 60%; margin:auto">
									<div class="card-body">
										<div class="row">
											<div class="col">
											  	<form class="contact-form form-with-icons" action="{{route('booking.submit')}}" method="POST">
												  @csrf
													@if (session('success'))
													<div class="alert alert-success">{{session('success')}}</div>
													@endif

													@if (session('fail'))
													<div class="alert alert-danger">{{session('fail')}}</div>
													@endif
													<div class="contact-form-success alert alert-success d-none mt-4">
														<strong>Success!</strong> Your message has been sent to us.
													</div>

													<div class="contact-form-error alert alert-danger d-none mt-4">
														<strong>Error!</strong> There was an error sending your message.
														<span class="mail-error-message text-1 d-block"></span>
													</div>

													<div class="row">
														<div class="form-group col-lg-6">
															<label class="form-label mb-1 text-2">আপনার নাম লিখুন:</label>
															<div class="position-relative">
																<i class="icons icon-user text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
																<input type="text" data-msg-required="Please enter your name." maxlength="100" class="form-control text-3 h-auto py-2" name="name" required>
															</div>
														</div>
														<div class="form-group col-lg-6">
															<label class="form-label mb-1 text-2">এনআইডি নম্বার:</label>
															<div class="position-relative">
																<i class="icons icon-envelope text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
																<input type="text" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 h-auto py-2" name="nid" required>
															</div>
														</div>
													</div>
													
													<div class="row">
														<div class="form-group col">
															<label class="form-label mb-1 text-2">যোগাযোগ নাম্বার</label>
															<div class="position-relative">
																<i class="icons icon-note text-color-primary text-3 position-absolute left-15 top-50pct transform3dy-n50"></i>
																<input type="text" data-msg-required="Please enter the subject." maxlength="100" class="form-control text-3 h-auto py-2" name="phone" required>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group col">
															<label class="form-label mb-1 text-2">আপনার রোগ সম্পর্কে সংক্ষিপ্ত রিবরণ দিন (অপশনাল)</label>
															<div class="position-relative">
																<i class="icons icon-bubble text-color-primary text-3 position-absolute left-15 top-15"></i>
																<textarea maxlength="5000" data-msg-required="Please enter your message." rows="8" class="form-control text-3 h-auto py-2" name="message" required></textarea>
															</div>
														</div>
													</div>
													<div>
														<input type="hidden" name="doctor_id" value="{{$id}}">
														<input type="hidden" name="chember" value="{{json_encode($chember)}}"> 
													</div>
													<div class="row">
												  		<div class="form-group col">
													    	<div class="form-check">
													      		<input class="form-check-input" type="checkbox" value="" name="agree" id="tabContent13Checkbox" data-msg-required="You must agree before submiting." required>
													      		<label class="form-check-label" for="tabContent13Checkbox">
													        		Agree to terms and conditions
													      		</label>
													   		</div>
													  	</div>
											  		</div>
													<div class="row">
														<div class="form-group col">
															<input type="submit" value="সিরিয়াল নিন" class="btn btn-primary" data-loading-text="Loading...">
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
    <!-- Modal sectoin start -->
    <!-- Modal section end -->
@endsection

@section('js_connect')
    
@endsection

@extends('layouts.admin.master')

@section('title', 'Settings |')

@push('css')
@endpush

@section('content')
@php
$stripe=App\Helpers\Helper::settings('stripe');
$content=$stripe?json_decode($stripe->content):null;

$mail = App\Helpers\Helper::settings('mail');
$mail_content=$mail?json_decode($mail->content):null;
@endphp
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>Stripe Information <a href="#" data-bs-toggle="modal" data-bs-target="#stripe_modal"><i
                                        class="ph-link-simple-horizontal"></i></a></h5>
                            <div id="stripe_modal" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Stripe access key</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="{{route('admin.settings.save')}}" method="post">
                                            @csrf
                                            <input type="text" name="status" value="stripe" hidden>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <label class="col-lg-4 col-form-label">Publishable key:</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="publishable_key" class="form-control" value="{{isset($content->publishable_key)?$content->publishable_key:''}}" placeholder="key">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-lg-4 col-form-label">Store Product Price ID:</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="store_price_id" value="{{isset($content->store_price_id)?$content->store_price_id:''}}" class="form-control" placeholder="key">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-lg-4 col-form-label">Tradie Product Price ID:</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="tradie_price_id" value="{{isset($content->tradie_price_id)?$content->tradie_price_id:''}}" class="form-control" placeholder="key">
                                                    </div>
                                                </div>
                                                {{-- <div class="row mb-3">
                                                    <label class="col-lg-4 col-form-label">Secret key:</label>
                                                    <div class="col-lg-8">
                                                        <input name="secret_key" type="text" class="form-control" placeholder="key">
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-sm">
                               
                                <tbody>
                                    <tr>
                                        <td>Publishable key</td>
                                        <td>{{isset($content->publishable_key)?$content->publishable_key:''}}</td>
                                    </tr>
                                    <tr>
                                        <td>Store Price ID</td>
                                        <td>{{isset($content->store_price_id)?$content->store_price_id:''}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tradie Price ID</td>
                                        <td>{{isset($content->tradie_price_id)?$content->tradie_price_id:''}}</td>
                                    </tr>
                                    {{-- <tr>
                                        <td>Secret key</td>
                                        <td>{{isset($content->secret_key)?$content->secret_key:''}}</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                            <h5>Email Information <a href="#" data-bs-toggle="modal" data-bs-target="#email_info_modal"><i
                                        class="ph-link-simple-horizontal mt-4"></i></a></h5>
                            <!--Email modal start-->
                            <div id="email_info_modal" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">SMTP Information</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="{{route('admin.settings.email.save')}}" method="post">
                                            @csrf
                                            <input type="text" name="status" value="mail" hidden>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <label class="col-lg-4 col-form-label">MAIL_MAILER:</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="mail_mailer" class="form-control" value="{{isset($mail_content->mail_mailer)?$mail_content->mail_mailer:''}}" placeholder="key">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-lg-4 col-form-label">MAIL_HOST:</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="mail_host" value="{{isset($mail_content->mail_host)?$mail_content->mail_host:''}}" class="form-control" placeholder="key">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-lg-4 col-form-label">MAIL_PORT:</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="mail_port" value="{{isset($mail_content->mail_port)?$mail_content->mail_port:''}}" class="form-control" placeholder="key">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-lg-4 col-form-label">MAIL_USERNAME:</label>
                                                    <div class="col-lg-8">
                                                        <input type="email" name="mail_username" value="{{isset($mail_content->mail_username)?$mail_content->mail_username:''}}" class="form-control" placeholder="key">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-lg-4 col-form-label">MAIL_PASSWORD:</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="mail_password" value="{{isset($mail_content->mail_password)?$mail_content->mail_password:''}}" class="form-control" placeholder="key">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-lg-4 col-form-label">MAIL_ENCRYPTION:</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="mail_encryption" value="{{isset($mail_content->mail_encryption)?$mail_content->mail_encryption:''}}" placeholder="key">
                                                    </div>
                                                </div>
                                                {{-- <div class="row mb-3">
                                                    <label class="col-lg-4 col-form-label">Secret key:</label>
                                                    <div class="col-lg-8">
                                                        <input name="secret_key" type="text" class="form-control" placeholder="key">
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--Email modal End-->

                            <table class="table table-sm">
                               
                                <tbody>
                                    <tr>
                                        <td>MAIL_MAILER</td>
                                        <td>{{isset($mail_content->mail_mailer)?$mail_content->mail_mailer:''}}</td>
                                    </tr>
                                    <tr>
                                        <td>MAIL_HOST</td>
                                        <td>{{isset($mail_content->mail_host)?$mail_content->mail_host:''}}</td>
                                    </tr>
                                    <tr>
                                        <td>MAIL_PORT</td>
                                        <td>{{isset($mail_content->mail_port)?$mail_content->mail_port:''}}</td>
                                    </tr>
                                    <tr>
                                        <td>MAIL_USERNAME</td>
                                        <td>{{isset($mail_content->mail_username)?$mail_content->mail_username:''}}</td>
                                    </tr>

                                    <tr>
                                        <td>MAIL_PASSWORD</td>
                                        <td>{{isset($mail_content->mail_password)?$mail_content->mail_password:''}}</td>
                                    </tr>

                                    <tr>
                                        <td>MAIL_ENCRYPTION</td>
                                        <td>{{isset($mail_content->mail_encryption)?$mail_content->mail_encryption:''}}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('js')
@endpush

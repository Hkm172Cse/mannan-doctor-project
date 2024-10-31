<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SpecialController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\DoctorAuthController;
use App\Http\Controllers\Frontend\LayoutController;
use App\Http\Controllers\Frontend\PatientsController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;


//HOME ROUTE
Route::get('/', [LayoutController::class, 'homePage'])->name('home');
Route::get('doctor-details/{id}/{extra}', [LayoutController::class, 'DoctorDetails'])->name('doctor.details');
Route::get('serial-booking', [LayoutController::class, 'BookSerial'])->name('get.serial');
Route::post('booking-submit', [LayoutController::class, 'SerialBooking'])->name('booking.submit');

// stripe payment
Route::post('stripe/checkout', [SubscriptionController::class, 'subscribe'])->name('stripe.checkout');
Route::get('stripe/checkout/success', [SubscriptionController::class, 'subscribe'])->name('stripe.checkout.success');



// Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loggedin'])->name('loggedin');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('spacialist', [SpecialController::class, 'index'])->name('spacialist');
    Route::get('add-special', [SpecialController::class, 'AddSpecial'])->name('add.spacial');
    Route::get('edit-spacialist/{id}', [SpecialController::class, 'EditSpacialist'])->name('edit.spacialist');
    Route::post('insert-special', [SpecialController::class, 'InsertSpecial'])->name('insert.special');
    
    
    Route::get('settings',[HomeController::class,'settings'])->name('settings');
    Route::post('settings/save',[HomeController::class,'settings_save'])->name('settings.save');
    Route::post('email/settings/save',[HomeController::class,'Email_settings_save'])->name('settings.email.save');

});

Route::group(['prefix' => 'doctor', 'as' => 'doc.'], function () {
    Route::get('/login', [AuthController::class, 'doctorLogin'])->name('login');
    Route::post('login', [DoctorAuthController::class, 'loggedin'])->name('loggedin');
    Route::get('logout', [DoctorAuthController::class, 'Logout'])->name('logout');

});

Route::group(['prefix' => 'patient', 'as' => 'patient.'], function () {
    Route::get('serial', [PatientsController::class, 'GetSerial'])->name('get.serial');
    Route::post('insert-serial', [PatientsController::class, 'InsertSerial'])->name('insert.serial');
});

Route::group(['prefix' => 'doctor', 'as' => 'doctor.', 'middleware' => ['web', 'doctor_auth']], function () {
    Route::get('dashboard', [DoctorAuthController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [DoctorController::class, 'Profile'])->name('profile');
    Route::post('profile-update', [DoctorController::class, 'UpdateProfile'])->name('profile.update');
    Route::get('serial-list', [DoctorController::class, 'SerialList'])->name('serial.list');
    
    Route::get('serial-edit/{id}', [DoctorController::class, 'SerialEdit'])->name('serial.edit');
    Route::get('/doctor/serial/delete/{id}', [DoctorController::class, 'Delete']);
    Route::get('chamber-list', [DoctorController::class, "ChamberList"])->name('chamber.list');
    Route::get('/chamber-edit/{id}', [DoctorController::class, 'ChamberEdit'])->name('chamber.edit');
    Route::post('chember-update', [DoctorController::class, 'ChemberUpdate'])->name('chembar.update');

});

Route::post('doctor/insert-chamber', [DoctorController::class, "AddChamberTest"])->name('insert.chamber');
Route::get('search', [DoctorController::class, 'DoctorSearch'])->name('doctor.search');






//Forgot password routes


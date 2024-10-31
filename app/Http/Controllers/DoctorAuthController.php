<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DoctorAuthController extends Controller
{
    public function loggedin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
           // Helper::InsertUserLocationInformation($request,'store','login',Auth::guard('store')->user()->id,'web');
            return redirect()->route('doctor.dashboard');
           // dd("login success");
        } else {
            return redirect()->route('doc.login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }

    public function dashboard(){
        return view("Backend.doctor.dashboard");
    }

    public function Logout(){
        Auth::guard('doctor')->logout();
        return redirect()->route('doc.login');

    }
}

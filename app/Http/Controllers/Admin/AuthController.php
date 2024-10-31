<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        return view('Backend.admin.auth.login');
    }

    public function doctorLogin(){
        return view('Frontend.Pages.doctor.auth.login');
    }

    public function loggedin(Request $request){
        $input = $request->all();

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if(Auth::attempt(['email' => $input['email'], 'password' => $input['password']]))
        {
                Helper::InsertUserLocationInformation($request,'admin','login',Auth::user()->id,'web');
                return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('admin.login')->with('error','Email-Address And Password Are Wrong.');
        }
    }

    public function logout(Request $request)
    {

        Session::flush();

       Auth::logout();

       return redirect('/');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\BuilderData;
use App\Models\FranchiseeData;
use App\Models\SupplierData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class GlobalController extends Controller
{
    public function welcome(){
        return view('admin.auth.login');
    }

    public function mail_test(){
        $details = [
            'title' => 'Destination missing mail from JAX app',
            'body' => "is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,"
        ];

        Mail::to(
            ['rezaul@supremesupports.com.au','rezaulhoque0101@gmail.com']
        )
        // ->cc($moreUsers)
        // ->bcc($evenMoreUsers)
        ->send(new SendMail($details));

        return 'sended';
    }

    public function contact(){
        return view('frontend.pages.contact');
    }
    public function contact_mail(Request $request){
        $request->validate([
            'customer_name'=>'required',
            'customer_email'=>'required',
            'customer_message'=>'required',
        ]);

        $document_name = '';
        if($_FILES['attach_file']){
            $filename = microtime().'_'.$_FILES["attach_file"]["name"];
            $tempName = $_FILES["attach_file"]["tmp_name"];
            $path = "/images/contact_attached_doc/";
            $upload_path = public_path($path);
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777, true);
            }
            $moved = move_uploaded_file($tempName, $upload_path . $filename);
            if ($moved){
                $document_name = $upload_path.$filename;
            } else {
                $document_name = '';
            }
        }

        $customer_name = $request['customer_name'];
        $customer_phone = $request->customer_phone;
        $customer_message= $request->customer_message;
        $customer_email= $request->customer_email;
        $customer_company = $request->customer_company;
        
        //dd($request->all());
        $site_name = config('app.name');
        $site_url =  Url('/');
        $subject = "Contact from ".$site_name;
        $body    = '<html>

        <head>
            <style>
                body{font-size:15px;}
                body p{font-size:15px;}
                body span{font-size:15px;}
            </style>
        </head>
        
        <body>
            <div style="background: #fff;box-shadow: 0 1px 3px 0 rgb(131 1 11);border-radius: .375rem .375rem .375rem .375rem;padding: 1.125rem;max-width: 600px;margin: 20px auto;width: 100%;">
                <h2 style="color: #0070c0; text-align: center;"><a href="' . $site_url . '" target="_blank">' . $site_name .
                        '</a></h2>
                
                <div><br />
                <span>Hello,</span>
                <p>' . $site_name . '.<br>' . $customer_name . ' has sent a message. Please have a look below and take action accordingly.</p> 
                    <p> <strong>Company: </strong>' . $customer_company . '</p>
                    <p><strong>Mobile: </strong>' . $customer_phone . '</p>
                    <p> <strong>Email: </strong>' . $customer_email . '</p>
                    <p> <strong>Message: </strong>' . $customer_message.'</p>

                    <p>
                    <br/>
                    Kind regards<br/>
                    Admin department<br/>
                    <a href="'.$site_url.'" target="_blank">Quick Trade orders</a>
                    </p>
                </div>
            </div>
        </body>
        
        </html>';
        $details = [
            'subject' => $subject,
            'title' => $subject,
            'body' => $body,
            'attachment' => $document_name,
        ];
        $mail=$customer_email;
        $mailResponse = Mail::to($mail)
            ->cc([config('app.admin_mail_1')])
            ->send(new SendMail($details));
        if($mailResponse){
            return view('frontend.pages.thank_you');
        }else{
            return "Something wrong please try again";
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{
    public function delete($id)
    {
        $isDelete = Subscription::where('id', $id)->delete();
        if ($isDelete) {
            return redirect()->back()->with('success', 'Data Deleted');
        } else {
            return redirect()->back()->with('error', 'Somthing wrong. data not deleted');
        }
    }

    // public function TradieSubscribe(Request $request)
    // {
    //     $input = $request->all();

    //     // Convert price to cents 
    //     $planPriceCents = round(40 * 100);
    //     \Stripe\Stripe::setApiKey(config('app.stripe_api_key'));

    //     try {
    //         $customer = \Stripe\Customer::create([
    //             'name' => Auth::guard('tradie')->user()->name,
    //             'email' => $request->stripeEmail
    //         ]);
    //     } catch (Exception $e) {
    //         $api_error = $e->getMessage();
    //     }

    //     if (empty($api_error) && $customer) {
    //         try {
    //             // Create price with subscription info and interval 
    //             $price = \Stripe\Price::create([
    //                 'unit_amount' => $planPriceCents,
    //                 'currency' => config('app.stripe_curreny'),
    //                 'recurring' => ['interval' => 'month'],
    //                 'product_data' => ['name' => 'Quick Trade Orders - Builder Subscription'],
    //             ]);
    //         } catch (Exception $e) {
    //             $api_error = $e->getMessage();
    //         }
    //     }

    //     if (empty($api_error) && $price) {
    //         try {
    //             $subscription = \Stripe\Subscription::create([
    //                 'customer' => $customer->id,
    //                 'items' => [[
    //                     'price' => $price->id,
    //                 ]],
    //                 'payment_behavior' => 'default_incomplete',
    //                 'expand' => ['latest_invoice.payment_intent'],
    //             ]);
    //         } catch (Exception $e) {
    //             $api_error = $e->getMessage();
    //         }
    //     }

    //     if (empty($api_error) && $subscription) {
    //         $output = [
    //             'subscriptionId' => $subscription->id,
    //             'clientSecret' => $subscription->latest_invoice->payment_intent->client_secret,
    //             'customerId' => $customer->id,
    //             'paymentDateTime' => date("Y-m-d") . " " . date("h:i:sa"),
    //             'subscription' => $subscription
    //         ];
    //     } else {
    //         echo '<pre>';
    //         print_r($api_error);
    //         echo '</pre>';
    //         die();
    //     }
    //     if ($output) {
    //         $stripeObject = $output;
    //     } else {
    //         $stripeObject = '';
    //     }

    //     $time = date("Y-m-d") . " " . date("h:i:sa");

    //     $stripe_json = json_encode($stripeObject);

    //     $subscribed = Subscription::create([
    //         'userid' => Auth::guard('tradie')->user()->id,
    //         'created_at' => $time,
    //         'subscribe_info' => $stripe_json,
    //         'user_type' => 'builder'

    //     ]);
    //     if ($subscribed) {
    //         return redirect()->back()->with('success', 'Subscribed successfully');
    //     } else {
    //         return redirect()->back()->with('error', 'Somthing wrong.');
    //     }
    //     // $charge = \Stripe\Charge::create([
    //     //     'source'=>$request->stripeToken,
    //     //     'description'=>'subscription test laravel',
    //     //     'amount'=>4000,
    //     //     'currency'=>config('app.stripe_curreny'),
    //     // ]);
    //     // dd($charge);

    // }

    // public function storeSubscribe(Request $request)
    // {
    //     $input = $request->all();

    //     // Convert price to cents 
    //     $planPriceCents = round(40 * 100);
    //     \Stripe\Stripe::setApiKey(config('app.stripe_api_key'));

    //     try {
    //         $customer = \Stripe\Customer::create([
    //             'name' => Auth::guard('store')->user()->title,
    //             'email' => $request->stripeEmail
    //         ]);
    //     } catch (Exception $e) {
    //         $api_error = $e->getMessage();
    //     }

    //     if (empty($api_error) && $customer) {
    //         try {
    //             // Create price with subscription info and interval 
    //             $price = \Stripe\Price::create([
    //                 'unit_amount' => $planPriceCents,
    //                 'currency' => config('app.stripe_curreny'),
    //                 'recurring' => ['interval' => 'month'],
    //                 'product_data' => ['name' => 'Quick Trade Orders - Store Subscription'],
    //             ]);
    //         } catch (Exception $e) {
    //             $api_error = $e->getMessage();
    //         }
    //     }

    //     if (empty($api_error) && $price) {
    //         try {
    //             $subscription = \Stripe\Subscription::create([
    //                 'customer' => $customer->id,
    //                 'items' => [[
    //                     'price' => $price->id,
    //                 ]],
    //                 'payment_behavior' => 'default_incomplete',
    //                 'expand' => ['latest_invoice.payment_intent'],
    //             ]);
    //         } catch (Exception $e) {
    //             $api_error = $e->getMessage();
    //         }
    //     }

    //     if (empty($api_error) && $subscription) {
    //         $output = [
    //             'subscriptionId' => $subscription->id,
    //             'clientSecret' => $subscription->latest_invoice->payment_intent->client_secret,
    //             'customerId' => $customer->id,
    //             'paymentDateTime' => date("Y-m-d") . " " . date("h:i:sa"),
    //             'subscription' => $subscription
    //         ];
    //     } else {
    //         echo '<pre>';
    //         print_r($api_error);
    //         echo '</pre>';
    //         die();
    //     }
    //     if ($output) {
    //         $stripeObject = $output;
    //     } else {
    //         $stripeObject = '';
    //     }

    //     $time = date("Y-m-d") . " " . date("h:i:sa");

    //     $stripe_json = json_encode($stripeObject);

    //     $subscribed = Subscription::create([
    //         'userid' => Auth::guard('store')->user()->id,
    //         'created_at' => $time,
    //         'subscribe_info' => $stripe_json,
    //         'user_type' => 'store'

    //     ]);
    //     if ($subscribed) {
    //         return redirect()->back()->with('success', 'Subscribed successfully');
    //     } else {
    //         return redirect()->back()->with('error', 'Somthing wrong.');
    //     }
    //     // $charge = \Stripe\Charge::create([
    //     //     'source'=>$request->stripeToken,
    //     //     'description'=>'subscription test laravel',
    //     //     'amount'=>4000,
    //     //     'currency'=>config('app.stripe_curreny'),
    //     // ]);
    //     // dd($charge);

    // }

    public function contactMail(Request $request)
    {
        $name = $request->name;
        $mobile = $request->mobile;
        $message = $request->message;
        $subject = 'Customer information';
        $body = '
        name :' . $name . '<br>
        phone: ' . $mobile . '<br>
        message:' . $message;
        $details = [
            'subject' => $subject,
            'title' => $subject,
            'body' => $body,
        ];
        Mail::to(config('app.admin_mail_1'))->send(new SendMail($details));
        return redirect()->back()->with('success', 'Mail sent successfully');
    }
    public function store_success(Request $request){
        $stripe = new \Stripe\StripeClient(config('app.stripe_api_key'));
        try {
            $session = $stripe->checkout->sessions->retrieve($request->session_id);
            $customer = $stripe->customers->retrieve($session->customer);
           

            $output = [
                'subscriptionId' => $session->subscription,
                'clientSecret' => $session->invoice,
                'customerId' => $customer->id,
                'paymentDateTime' => date("Y-m-d") . " " . date("h:i:sa"),
                'subscription' => $session
            ];
            if ($output) {
                $stripeObject = $output;
            } else {
                $stripeObject = '';
            }
            $stripe_json = json_encode($stripeObject);
            $time = date("Y-m-d") . " " . date("h:i:sa");
            $subscribed = Subscription::create([
                'userid' => Auth::guard('store')->user()->id,
                'created_at' => $time,
                'subscribe_info' => $stripe_json,
                'user_type' => 'store'
            ]);
            if ($subscribed) {
                return redirect()->route('store.subscriptions')->with('success', 'Subscribed successfully');
            } else {
                return redirect()->back()->with('error', 'Somthing wrong.');
            }
        }catch (Error $e) {
            return redirect()->back()->with('error', 'Somthing wrong.');
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
      
    }  
    
    public function tradie_success(Request $request){
        $stripe = new \Stripe\StripeClient(config('app.stripe_api_key'));
        try {
            $session = $stripe->checkout->sessions->retrieve($request->session_id);
            $customer = $stripe->customers->retrieve($session->customer);
           

            $output = [
                'subscriptionId' => $session->subscription,
                'clientSecret' => $session->invoice,
                'customerId' => $customer->id,
                'paymentDateTime' => date("Y-m-d") . " " . date("h:i:sa"),
                'subscription' => $session
            ];
            if ($output) {
                $stripeObject = $output;
            } else {
                $stripeObject = '';
            }
            $stripe_json = json_encode($stripeObject);
            $time = date("Y-m-d") . " " . date("h:i:sa");
            $subscribed = Subscription::create([
                'userid' => Auth::guard('tradie')->user()->id,
                'created_at' => $time,
                'subscribe_info' => $stripe_json,
                'user_type' => 'builder'
            ]);
            if ($subscribed) {
                return redirect()->route('tradie.subscriptions')->with('success', 'Subscribed successfully');
            } else {
                return redirect()->back()->with('error', 'Somthing wrong.');
            }
        }catch (Error $e) {
            return redirect()->route('tradie.subscriptions')->with('error', 'Somthing wrong.');
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
      
    }
}

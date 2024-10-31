<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\Models\Settings;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Subscription;
use App\Models\UserLocationInformation;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use App\Models\TimeSheet;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Http;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Token\Parser;


class Helper
{
    /**
     * upload image
     * @param dir and file path
     * @return array
     * @author ss yusuf
     */


    public static function deleteFile($link)
    {
        if (File::exists(public_path($link))) {
            File::delete(public_path($link));
        }
    }
    public static function uploadDocument($path, $file, $exist_path = null)
    {
       
        $imageFileType = [
            'JPG', 'PNG', 'GIF', 'BMP', 'WebP', 'JPEG'
        ];
        $extention = $file->getClientOriginalExtension();
        $upload_path = public_path($path);

        //delete old file
        if (File::exists($exist_path)) {
            File::delete($exist_path);
        }

        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }
        $name = microtime() . '_' . $file->getClientOriginalName();
        // space remove in file name
        $filename = preg_replace("/\s+/", "", $name);
        // save to server
        if (in_array($extention, $imageFileType)) {
            $img = Image::make($file)
                // ->resize(800, null, function ($constraint) {
                //     $constraint->aspectRatio();
                // })
                ->save($upload_path . '/' . $filename);
        } else {
            $file->move($upload_path, $filename);
        }

        // and you are ready to go ...
        // $file->move($upload_path, $filename);

        // create thumbnails
        //        $img = Image::make($upload_path.$filename);
        //        $img->save($upload_path.$filename);
        //        $img->fit(200, 120, function ($c) {
        //            $c->aspectRatio();
        //            $c->upsize();
        //        })->save($upload_path.$filename.'.thumb.jpg');

        return [
            'filePath' => $path .'/'. $filename,
            'fileFullPath' => url($path . $filename)
        ];
    }

    static function cleanUp($text)
    {
        $unwanted = array("'"); // add any unwanted char to this array
        return str_ireplace($unwanted, '', $text);
    }

    static function curl_get_file_contents($URL)
    {
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        $contents = curl_exec($c);
        curl_close($c);

        if ($contents) return $contents;
        else return FALSE;
    }

    static function user_to_brokerage_distance($user_lat, $user_lng, $brokarage_lat, $brokarage_lng)
    {
        $pi80 = M_PI / 180;
        $user_lat *= $pi80;
        $user_lng *= $pi80;
        $brokarage_lat *= $pi80;
        $brokarage_lng *= $pi80;
        $r    = 6372.797; // mean radius of Earth in km
        $dlat = $brokarage_lat - $user_lat;
        $dlon = $brokarage_lng - $user_lng;
        $a = sin($dlat / 2) * sin($dlat / 2) + cos($user_lat) * cos($brokarage_lat) * sin($dlon / 2) * sin($dlon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $km = $r * $c;
        return number_format($km, 1, '.', '');
    }

    public static function get_lat_long_by_zip_address($zip = null, $address = null)
    {
        $api_key = config('app.google_place_api_key');
        $target = "";
        if ($zip != '') {
            $target = $zip . ', Australia';
        }
        if ($address != '') {
            $target = $address;
        }
        $target = str_replace(" ", "+", $target);
        //$target=str_replace(" ", "+", $zip!=""? $zip: $address!=""? $address:'') ;
        $latLng = array();
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $target . "&key=" . $api_key;
        $result_string = Helper::curl_get_file_contents($url);
        $result = json_decode($result_string, true);
        if ($result['status']) {
            $latLng = $result['results'][0]['geometry']['location'];
        }
        return $latLng;
    }
   static function array_orderby()
    {
        $args = func_get_args();
        $data = array_shift($args);
        foreach ($args as $n => $field) {
            if (is_string($field)) {
                $tmp = array();
                foreach ($data as $key => $row)
                    $tmp[$key] = $row->$field;
                $args[$n] = $tmp;
            }
        }
        $args[] = &$data;
        call_user_func_array('array_multisort', $args);
        return array_pop($args);
    }

    public static function storeIsSubscribe(){
        $user_id  = Auth::guard('store')->user()->id;
        $subscriptions= Subscription::where('user_type','store')->where('userid',$user_id)->get();
       $isSubscribed = false;
        
        foreach ($subscriptions as $key => $subscription){
            if($subscription->subscribe_info){
                $isSubscribed = true; 
            }else{
                $isSubscribed = false;
            }
        }
        return $isSubscribed;
    }
    public static function traideIsSubscribe(){
        $user_id  = Auth::guard('tradie')->user()->id;
        $subscriptions= Subscription::where('user_type','builder')->where('userid',$user_id)->get();
       $isSubscribed = false;
        
        foreach ($subscriptions as $key => $subscription){
            if($subscription->subscribe_info){
                $isSubscribed = true; 
            }else{
                $isSubscribed = false;
            }
        }
        return $isSubscribed;
    }

    public static function StartTime(){
        $id = Auth::guard('sale_agent')->user()->id;
        $today = Carbon::now('Asia/Dhaka')->format('Y-m-d');
        $checkDate = TimeSheet::where('date',$today)->where('userid',$id)->latest('id')->first();
        if($checkDate){
            if($checkDate->end_time == null){
                return false;
            }
            return true;
        }else{
            return true;
        }
    }

    public static function EndTime(){
        $id = Auth::guard('sale_agent')->user()->id;
        $today = Carbon::now('Asia/Dhaka')->format('Y-m-d');
        $checkDate = TimeSheet::where('date',$today)->where('userid',$id)->latest('id')->first();
        if($checkDate){
           // dd($checkDate->end_time);
            if($checkDate->end_time == null){
                return true;
            }else{
                return false;
            }
        }
    }

    //Api start time
    public static function ApiStartTime(){
        $id = Auth::user()->id;
        $today = Carbon::now('Asia/Dhaka')->format('Y-m-d');
        $checkDate = TimeSheet::where('date',$today)->where('userid',$id)->latest('id')->first();
        if($checkDate){
            if($checkDate->end_time == null){
                return false;
            }
            return true;
        }else{
            return true;
        }
    }

    // Api end time
    public static function ApiEndTime(){
        $id = Auth::user()->id;
        $today = Carbon::now('Asia/Dhaka')->format('Y-m-d');
        $checkDate = TimeSheet::where('date',$today)->where('userid',$id)->latest('id')->first();
        if($checkDate){
           // dd($checkDate->end_time);
            if($checkDate->end_time == null){
                return true;
            }else{
                return false;
            }
        }
    }

    public static function TimeDifference($timeString1,$timeString2){
        $dateTime1 = new DateTime($timeString1);
        $dateTime2 = new DateTime($timeString2);
        $timeDifference = $dateTime1->diff($dateTime2);
        $totalSeconds = $timeDifference->s + $timeDifference->i * 60 + $timeDifference->h * 3600;
        $timeDifferenceFormatted = $timeDifference->format('%H:%I:%S');
        return $timeDifferenceFormatted;
    }

    public  static function InsertUserLocationInformation($request,$role=null,$type=null,$user_id=null,$app_type=null){
        $httpRef = "";
        if(isset($_SERVER['HTTP_REFERER'])){
            $httpRef = $_SERVER['HTTP_REFERER']; 
        }
        $description=[
            'server'=>$_SERVER['REQUEST_URI'],
            'http_ref'=>$httpRef
        ];
        
        $user_location_information=[
            "ip"=>$request->ip(),
            'device'=>$request->header('User-Agent'),
            'user_type'=>$role,
            'type_of_user_id'=>$user_id,
            'access_type'=>$type,
            'app_type'=>$app_type,
            'description'=>json_encode($description)
        ];
       return UserLocationInformation::create($user_location_information);
    }

    public static function ipToGetLocationInforamtion($ip){
        $location=Location::get($ip);
        return $location;
    }

    public static function base64fileUpload($bs64EncodedFile,$fileUploadPath=null,$exist_path=null){

        //delete old file or delete existing file
        if($exist_path){
            if (File::exists($exist_path)){
                File::delete($exist_path);
            }
        }
        $bs64imageSplit = explode(';base64,',$bs64EncodedFile);
        $bs64imageExtentionSplit = explode('/',$bs64imageSplit[0]);
        $bs64imageExtention=$bs64imageExtentionSplit[1];
        $decodedBs64image = base64_decode($bs64imageSplit[1]);
        $fileName= microtime().'.'.$bs64imageExtention;
        $fileNameWithoutSpaces=preg_replace('/\s+/','',$fileName);

        $uploadePath='images/';
        if(!empty($fileUploadPath)){
            $uploadePath=$uploadePath.$fileUploadPath.'/';
        }
        if(!file_exists($uploadePath)){
             mkdir($uploadePath,0777,true);
        }
        file_put_contents($uploadePath.$fileNameWithoutSpaces,$decodedBs64image);

        return $fileNameWithoutSpaces;
    }

    public static function base64VoiceUpload($bs64EncodedFile,$fileUploadPath=null,$exist_path=null){

        //delete old file or delete existing file
        if($exist_path){
            if (File::exists($exist_path)){
                File::delete($exist_path);
            }
        }
        $bs64imageSplit = explode(';base64,',$bs64EncodedFile);
        $bs64imageExtentionSplit = explode('/',$bs64imageSplit[0]);
        $bs64imageExtention=$bs64imageExtentionSplit[1];
        $decodedBs64image = base64_decode($bs64imageSplit[1]);
        $fileName= microtime().'.'.$bs64imageExtention;
        $fileNameWithoutSpaces=preg_replace('/\s+/','',$fileName);

        $uploadePath='recordings/';
        if(!empty($fileUploadPath)){
            $uploadePath=$uploadePath.$fileUploadPath.'/';
        }
        if(!file_exists($uploadePath)){
             mkdir($uploadePath,0777,true);
        }
        file_put_contents($uploadePath.$fileNameWithoutSpaces,$decodedBs64image);

        return $fileNameWithoutSpaces;
    }

    public static function settings($status){
       $settings = Settings::where('status',$status)->first();
       return $settings;
    }


    public static function verifyGoogleToken($token) {
        $res= Http::get('https://www.googleapis.com/oauth2/v3/tokeninfo?id_token='.$token)->json();

        if(isset($res['error_description'])){
            return false;
        }

        return $res;
    }
    public static function verifyAppleToken($client_secret, $code) {
        $res= Http::asForm()->post('https://appleid.apple.com/auth/token',[
            'client_id'=>'com.quicktradeorders',
            'client_secret'=>$client_secret,
            'grant_type'=>'authorization_code',
            'code'=>$code
        ])->json();

        if(isset($res['error'])){
            return false;
        }

        $decoded_res = (new Parser(new JoseEncoder()))->parse($res['id_token'])->claims()->all();

        return $decoded_res;
    }
    public static function sendPushNotification($to, $title, $body, $url, $screen='Dashboard') {
        $res= Http::withHeaders([
            'content-type'=>'application/json',
            'Authorization'=>'key='.env('CLOUD_MSG_KEY')
        ])->post('https://fcm.googleapis.com/fcm/send',[
            'to'=>$to,
            'priority'=>'high',
            'notification'=>[
                'title'=>$title,
                'body'=>$body
            ],
            'data'=>[
                'url'=>$url,
                'screen'=>$screen
            ]
        ])->json();

        return $res;
    }
    
}

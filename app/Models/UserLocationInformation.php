<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserLocationInformation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user($id,$user_type){
        if($user_type=='admin'){
            $user=User::where('id',$id)->first();
            return isset($user->email)?$user->email:'';
        }
        if($user_type=='store'){
            $user=SupplierData::where('id',$id)->first();
            return isset($user->email)?$user->email:'';
        }
        if($user_type=='tradie'){
            $user=BuilderData::where('id',$id)->first();
            return isset($user->email)?$user->email:'';
        }
        if($user_type=='sale_agent'){
            $user= FranchiseeData::where('id',$id)->first();
            return isset($user->email)?$user->email:'';
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\password_reset_mail;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Mail;


class Mail_Controller extends Controller
{

    public function send_mail(Request $R){
        $mail="null";
        $mail=$R->has("email")?$R->get("email"):" ";

        if($mail==null){
return json_encode([
    "success"=>false,
    "response_code"=>404

]);

        }
else{

$password=rand(1000,9999);
    User::Where("email","=",$mail)->update([

        'password'=>$password
    ]);
    $details=[
     'title'=>"new password",
     'body'=>" your new password is ".$password

    ];

    Mail::to($mail)->send(new  password_reset_mail( $details));


    return json_encode([
        'success'=>true,
        'response_code'=>200
    ]);
}

}
}
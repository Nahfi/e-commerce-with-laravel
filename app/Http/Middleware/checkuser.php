<?php

namespace App\Http\Middleware;

use App\Http\Controllers\User_Controller;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class checkuser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if($request->has("reg") && $request->has('uname')){
           $res=User::select("name")->where("name","=",$request->get("uname"))->get()->first();

           if(isset($res) && $res!=null)
           {
               return redirect()->back()->with("error","user name already taken");
           }
           else{
               $user=new User_Controller();
               return $user->store($request);
        }
        }

    }
}
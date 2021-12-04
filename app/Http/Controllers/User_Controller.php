<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class User_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('checkuser')->only('store');
    }
    public function index(Request $r)
    {
         $res=" ";
        $mail=$r->has("email")?$r->get("email"):" ";
        $pass=$r->has("pass")?$r->get("pass"):" ";
        $res=User::select("*")->where("email","=",$mail)->where("password","=",$pass)->first();
  if(isset($res)  && $res!=null){


    if($res->is_admin==1){
    $product_controller=new Product_Controller();
    return $product_controller->add_products();
    }
    else{
        return redirect('/products');
    }
  }
        else{


            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function admin_products(){
        return "hello";
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request->all();
        User::insert([
         'name'=>$request->has("uname")? $request->get('uname') : " ",
         'email'=>$request->has("mail")? $request->get('mail') : " ",
         'mobile'=>$request->has("mobile")? $request->get('mobile') : " ",
         'password'=>$request->has("pass")? $request->get('pass') : " ",


        ]);
        return redirect('/add_products');
        // return redirect('/products');
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
// public function fun(Request $re){

// }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
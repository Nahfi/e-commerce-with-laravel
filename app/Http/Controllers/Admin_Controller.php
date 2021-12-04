<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagoriy;
class Admin_Controller extends Controller
{



public function show(){
    dd(Catagoriy::find(1)->oneto);
}

}
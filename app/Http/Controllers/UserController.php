<?php

namespace App\Http\Controllers;

use Auth;
use Datetime;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function user_edit(){
        $user = Auth::user();
        return view ('user_edit',['user'=>$user]);
    }
}

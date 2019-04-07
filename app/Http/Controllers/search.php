<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class search extends Controller
{
    

    public function searchUser(Request $request){

       $result = $request->input('search');
       $users = User::search($result)->get();
       return view('search')->with('users' , $users);
    }
}

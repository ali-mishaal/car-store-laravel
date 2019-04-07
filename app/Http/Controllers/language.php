<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;

class language extends Controller
{
    
     
     public function setLanguage($locale){

     	if(!\Session::has('locale')){
            \Session::put('locale' , $locale);
        }else{
            App::setlocale('locale' , $locale);
        }
        return redirect()->back();
     }


}

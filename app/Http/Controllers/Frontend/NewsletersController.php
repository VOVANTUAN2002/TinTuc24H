<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletersController extends Controller{


    public function addNewsleters(Request $request){

        
        $email = $request->email;
        $Newsleter = new Newsletter();
        $Newsleter->email = $email;
        $Newsleter->save();
    }
}

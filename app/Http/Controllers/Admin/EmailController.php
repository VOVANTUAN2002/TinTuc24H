<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class EmailController extends Controller{

    public function index(){
        return view('backend.email.index');
    }


}

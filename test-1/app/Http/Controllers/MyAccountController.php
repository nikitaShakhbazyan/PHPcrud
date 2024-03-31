<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function add ($x = null) {
        if($x=null) {
            dd($x);
        }
    }
}

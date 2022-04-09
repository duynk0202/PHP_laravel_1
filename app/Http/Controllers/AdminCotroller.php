<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCotroller extends Controller
{
    public function home(){
        return view ("/home");
    }
}

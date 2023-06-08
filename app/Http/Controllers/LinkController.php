<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function signupFunction() {
        return view('signup');
    }

    public function loginFunction() {
        return view('login');
    }
}

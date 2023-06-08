<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function signupLink() {
        return view('signup');
    }

    public function loginLink() {
        return view('login');
    }
}

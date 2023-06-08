<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signupFunction(Request $request) {

        // generates a unique 7 character alphanumeric code unique to each account
        $account_key = Str::random(10);

        // validate the submitted data
        $validateRegData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $userData = new User;
        $userData->name = $validateRegData['name'];
        $userData->email = $validateRegData['email'];
        $userData->password = bcrypt($validateRegData['password']);
        $userData->account_key = $account_key;
        $userData->save();

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');

    }
}

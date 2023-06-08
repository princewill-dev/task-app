<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function loginFunction(Request $request) {


        $userdata = $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt(['email' => $userdata['email'], 'password' => $userdata['password']])){
            $request->session()->regenerate();
            //return 'login successful';
            return redirect('dashboard')->with('success', 'login successful');
            //return redirect()->intended('/dashboard');
        }else {
            //return 'login failed';
            return redirect('/login')->with('faliure', 'email or password is incorrect');
        }


        // $credentials = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('/dashboard');
        // }
        

    }


    public function logoutFunction()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    





}

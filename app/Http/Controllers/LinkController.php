<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    public function signupLink() {
        return view('signup');
    }

    public function loginLink() {
        return view('login');
    }

    public function dashboardLink () {

        // $user = Auth::user();
        // $noteCount = $user->notes()->count();

        // return view('dashboard')->with('noteCount', $noteCount);

        //return view('dashboard');

        $user = Auth::user();
        $notes = Note::where('user_id', $user->id)->get();
        $noteCount = $notes->count();

        return view('dashboard', compact('notes', 'noteCount'));
    }

    public function savednotes() {
        return view('savednotes');
    }
}

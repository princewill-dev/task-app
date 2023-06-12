<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LinkController extends Controller
{
    public function signupLink() {
        return view('signup');
    }

    public function loginLink() {
        return view('login');
    }

    public function dashboardLink () {

        $user = Auth::user();
        $notes = Note::where('user_id', $user->id)->get();
        $noteCount = $notes->count();

        return view('dashboard', compact('notes', 'noteCount'));
    }

    public function savednotes() {
        // $user = Auth::user();
        // $notes = Note::where('user_id', $user->id)->get();
        // $noteCount = $notes->count();
        // return view('savednotes', compact('notes', 'noteCount'));

        $user = Auth::user();
        $notes = Note::where('user_id', $user->id)->get();

        // Decrypt the notes' title and description
        foreach ($notes as $note) {
            $note->title = Crypt::decryptString($note->title);
            $note->description = Crypt::decryptString($note->description);
        }

        $noteCount = $notes->count();

        return view('savednotes', compact('notes', 'noteCount'));
    }
}

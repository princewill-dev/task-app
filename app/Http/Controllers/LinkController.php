<?php

namespace App\Http\Controllers;

use App\Models\Url;
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

        $url = Url::where('user_id', $user->id)->get();
        $urlCount = $url->count();

        return view('dashboard', compact('notes', 'noteCount', 'url', 'urlCount'));
    }

    public function savednotes() {

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

    public function savedurls() {

        $user = Auth::user();
        $urls = Url::where('user_id', $user->id)->get();

        // Decrypt the urls
        foreach ($urls as $url) {
            $url->tag = Crypt::decryptString($url->tag);
            $url->main_url = Crypt::decryptString($url->main_url);
            //$url->shortcode = $url->shortcode;
        }

        $urlCount = $urls->count();

        return view('savedurls', compact('urls', 'urlCount'));
    }



}

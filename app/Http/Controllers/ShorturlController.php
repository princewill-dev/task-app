<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ShorturlController extends Controller
{
    private function generateRandomString($length = 5)
    {
        $characters = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characterLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $characterLength - 1)];
        }
        return $randomString;
    }
    

    public function saveurlFunction(Request $request)
    {
        $code = $this->generateRandomString();

        $urlData = $request->validate([
            'tag' => 'string|required|max:2000',
            'main_url' => 'string|required|max:5000',
        ]);

        $url = new Url;
        $url->tag = Crypt::encryptString($urlData['tag']);
        $url->main_url = Crypt::encryptString($urlData['main_url']);
        $url->shortcode = $code;
        $url['user_id'] = auth()->id();
        $url->save();
        return redirect("savedurls")->with('success', 'url saved successfully');
    }

    public function deleteUrlFunction(Url $url)
    {
        $url->delete();

        return redirect("savedurls")->with('success', 'URL deleted successfully');
    }

    public function saveUrlFromViews(Request $request)
    {
        $code = $this->generateRandomString();

        $urlData = $request->validate([
            'tag' => 'required|string|max:2000',
            'main_url' => 'required|string|max:5000',
        ]);

        // $encryptedNoteData = $this->encryptNoteData($urlData);

        // $note = new Note;
        // $note->title = $encryptedNoteData['title'];
        // $note->description = $encryptedNoteData['description'];
        // $note->code = $code;
        // $note['user_id'] = auth()->id();
        // $note->save();

        $url = new Url;
        $url->tag = Crypt::encryptString($urlData['tag']);
        $url->main_url = Crypt::encryptString($urlData['main_url']);
        $url->shortcode = $code;
        $url['user_id'] = auth()->id();
        $url->save();
        return redirect("savedurls")->with('success', 'url saved successfully');

    }
}

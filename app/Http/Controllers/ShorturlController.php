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
        return redirect("dashboard")->with('success', 'url saved successfully');
    }
}

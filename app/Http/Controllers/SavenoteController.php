<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SavenoteController extends Controller
{
    public function saveNoteFunction(Request $request) {

        function generateRandomString($length = 5){
            $a = '1234567890';
            $characterLength = strlen($a);
            $randomString = '';
            for($i = 0; $i < $length; $i++){
                $randomString .=$a[rand(0, $characterLength - 1)];
            }
            return $randomString;
        }
        $code = generateRandomString();


        $noteData = $request->validate([
            'title' => 'required|srting|max:2000',
            'description' => 'required|string|max:5000'
        ]);

        $encryptedTitle = Crypt::encryptString($noteData['description']);
        $encryptedDescription = Crypt::encryptString($noteData['description']);

        $noteData = new Note;
        $noteData->title = $encryptedTitle;
        $noteData->description = $encryptedDescription;
        $noteData->code = $code;
        


        
    }
}
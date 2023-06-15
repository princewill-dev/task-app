<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SavenoteController extends Controller
{
    public function saveNoteFunction(Request $request)
    {
        $code = $this->generateRandomString();

        $noteData = $request->validate([
            'title' => 'required|string|max:2000',
            'description' => 'required|string|max:5000',
        ]);

        $encryptedNoteData = $this->encryptNoteData($noteData);

        $note = new Note;
        $note->title = $encryptedNoteData['title'];
        $note->description = $encryptedNoteData['description'];
        $note->code = $code;
        $note['user_id'] = auth()->id();
        $note->save();

        return redirect("dashboard")->with('success', 'Note saved successfully');
    }

    public function saveNoteFromViews(Request $request)
    {
        $code = $this->generateRandomString();

        $noteData = $request->validate([
            'title' => 'required|string|max:2000',
            'description' => 'required|string|max:5000',
        ]);

        $encryptedNoteData = $this->encryptNoteData($noteData);

        $note = new Note;
        $note->title = $encryptedNoteData['title'];
        $note->description = $encryptedNoteData['description'];
        $note->code = $code;
        $note['user_id'] = auth()->id();
        $note->save();

        return redirect("savednotes")->with('success', 'Note saved successfully');
    }

    private function generateRandomString($length = 5)
    {
        $characters = '1234567890';
        $characterLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $characterLength - 1)];
        }
        return $randomString;
    }

    private function encryptNoteData($noteData)
    {
        $encryptedTitle = Crypt::encryptString($noteData['title']);
        $encryptedDescription = Crypt::encryptString($noteData['description']);

        return [
            'title' => $encryptedTitle,
            'description' => $encryptedDescription,
        ];
    }

    public function editNoteFunction(Request $request, Note $note)
    {
        $note->title = Crypt::encryptString($request->input('title'));
        $note->description = Crypt::encryptString($request->input('description'));
        $note->save();

        return redirect("savednotes")->with('success', 'Note editted successfully');
    }

    public function deleteNoteFunction(Note $note)
    {
        $note->delete();

        return redirect("savednotes")->with('success', 'Note deleted successfully');
    }

}

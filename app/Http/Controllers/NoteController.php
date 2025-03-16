<?php

// app/Http/Controllers/NoteController.php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'note' => 'required|string',
        ]);

        Note::create([
            'date' => $request->date,
            'note' => $request->note,
        ]);

        return redirect()->back()->with('success', 'Not kaydedildi!');
    }
}


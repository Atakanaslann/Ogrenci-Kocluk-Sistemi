<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = \DB::table('subjects')->get();
        return view('admin.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function topics($lessonId)
    {
        $lesson = \DB::table('subjects')->where('id', $lessonId)->first();
        $topics = Topic::where('lesson_id', $lessonId)->get();
        return view('admin.lessons.topics', compact('lesson', 'topics'));
    }

    public function addTopic(Request $request, $lessonId)
    {
        $request->validate(['title' => 'required|string|max:255']);
        Topic::create([
            'lesson_id' => $lessonId,
            'title' => $request->title,
        ]);
        return redirect()->route('admin.lessons.topics', $lessonId)->with('success', 'Konu eklendi!');
    }
}

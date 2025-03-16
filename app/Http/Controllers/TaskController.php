<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date'
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'user_id' => Auth::id()
        ]);

        return response()->json([
            'success' => true,
            'task' => $task,
            'message' => 'Görev başarıyla eklendi!'
        ]);
    }

    public function toggle(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Bu görevi değiştirme yetkiniz yok!'
            ], 403);
        }

        $task->completed = !$task->completed;
        $task->save();

        return response()->json([
            'success' => true,
            'message' => $task->completed ? 'Görev tamamlandı!' : 'Görev tekrar açıldı!'
        ]);
    }
}

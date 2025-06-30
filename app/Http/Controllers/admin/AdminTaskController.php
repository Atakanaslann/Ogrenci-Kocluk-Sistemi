<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['student', 'coach'])->latest()->get();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function create()
    {
        $students = User::where('role', 'student')->get();
        $coaches = User::where('role', 'coach')->get();
        return view('admin.tasks.create', compact('students', 'coaches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'student_id' => 'required|exists:users,id',
            'coach_id' => 'required|exists:users,id',
            'due_date' => 'required|date',
        ]);

        Task::create($request->all());

        return redirect()->route('admin.tasks.index')
            ->with('success', 'Görev başarıyla oluşturuldu.');
    }

    public function edit(Task $task)
    {
        $students = User::where('role', 'student')->get();
        $coaches = User::where('role', 'coach')->get();
        return view('admin.tasks.edit', compact('task', 'students', 'coaches'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'student_id' => 'required|exists:users,id',
            'coach_id' => 'required|exists:users,id',
            'due_date' => 'required|date',
        ]);

        $task->update($request->all());

        return redirect()->route('admin.tasks.index')
            ->with('success', 'Görev başarıyla güncellendi.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('admin.tasks.index')
            ->with('success', 'Görev başarıyla silindi.');
    }
} 
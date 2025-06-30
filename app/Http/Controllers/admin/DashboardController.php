<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Task;
use App\Models\Book;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $studentCount = User::where('role', 'student')->count();
        $teacherCount = User::where('role', 'coach')->count();
        $bookCount = Book::count();

        // Son aktiviteleri al (örnek olarak son 5 görevi)
        $recentActivities = Task::latest()->take(5)->get()->map(function($task) {
            return (object)[
                'title' => $task->title,
                'created_at' => $task->created_at
            ];
        });

        // Koçu olmayan öğrencileri al
        $unassignedStudents = \App\Models\User::where('role', 'student')
            ->whereDoesntHave('coaches')
            ->latest()
            ->get();

        return view('admin.dashboard.index', compact('studentCount', 'teacherCount', 'bookCount', 'recentActivities', 'unassignedStudents'));
    }
}

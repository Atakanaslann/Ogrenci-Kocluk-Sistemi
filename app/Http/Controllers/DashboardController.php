<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $tasks = Task::query();

        if ($user->role === 'student') {
            $tasks->where('student_id', $user->id);
        } elseif ($user->role === 'coach') {
            $tasks->where('coach_id', $user->id);
        }

        $tasks = $tasks->orderBy('due_date', 'asc')
                      ->orderBy('created_at', 'desc')
                      ->get();

        return view('dashboard.dashboard', compact('tasks'));
    }

    public function coach()
    {
        if (Auth::user()->role !== 'coach') {
            return redirect()->route('account.dashboard')->with('error', 'Bu sayfaya erişim yetkiniz yok.');
        }

        $coach = Auth::user();
        $students = $coach->students()->get();
        $tasks = Task::where('coach_id', Auth::id())->get();
        $subjects = Subject::all();

        return view('dashboard.coachDashboard', compact('students', 'tasks', 'subjects'));
    }

    public function getStudents() {
        // Koç rolü kontrolü
        if (Auth::user()->role !== 'coach') {
            return redirect()->route('account.dashboard')->with('error', 'Bu sayfaya erişim yetkiniz yok.');
        }

        $students = User::where('role', 'student')->get();
        return view('coach.ogrenciler', compact('students'));
    }
}

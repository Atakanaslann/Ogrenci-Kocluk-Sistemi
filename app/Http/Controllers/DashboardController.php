<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $tasks = Task::where('user_id', Auth::id())
                    ->orderBy('due_date', 'asc')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('dashboard.dashboard', compact('tasks'));
    }

    public function coach(){
        return view("coach.dashboard");
    }

    public function getStudents() {
        // "role" sütununda "student" olan kullanıcıları çekiyoruz
        $students = User::where('role', 'student')->get();
    
        return view('coach.ogrenciler', compact('students'));
    }


}

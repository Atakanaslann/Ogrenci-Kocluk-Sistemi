<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Task;
use App\Models\Book;
use App\Models\CalendarEvent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminDashboardController extends Controller
{
    public function index()
    {
        try {
            // Öğrenci ve koç sayılarını al
            $studentCount = User::where('role', 'student')->count();
            $teacherCount = User::where('role', 'coach')->count();

            // Son eklenen öğrenciler
            $recentStudents = User::where('role', 'student')
                ->latest()
                ->take(5)
                ->get();

            // Son eklenen koçlar
            $recentTeachers = User::where('role', 'coach')
                ->latest()
                ->take(5)
                ->get();

            // Debug için log
            Log::info('Dashboard Data:', [
                'studentCount' => $studentCount,
                'teacherCount' => $teacherCount,
                'recentStudents' => $recentStudents->toArray(),
                'recentTeachers' => $recentTeachers->toArray()
            ]);

            return view('admin.dashboard', compact(
                'studentCount',
                'teacherCount',
                'recentStudents',
                'recentTeachers'
            ));
        } catch (\Exception $e) {
            Log::error('Dashboard Error: ' . $e->getMessage());
            return view('admin.dashboard', [
                'studentCount' => 0,
                'teacherCount' => 0,
                'recentStudents' => collect([]),
                'recentTeachers' => collect([])
            ]);
        }
    }
} 
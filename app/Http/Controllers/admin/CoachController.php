<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function assignStudent(Request $request, User $coach)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id'
        ]);

        if ($coach->students()->where('student_id', $request->student_id)->exists()) {
            return redirect()->route('admin.coaches.index')
                ->with('error', 'Bu öğrenci zaten bu koça atanmış.');
        }

        $coach->students()->attach($request->student_id);
        \Log::info('Öğrenci atandı:', ['coach_id' => $coach->id, 'student_id' => $request->student_id]);

        // Modal'ı açmak için JavaScript kodu
        $script = "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    openCoachStudentsModal('{$coach->id}', '{$coach->name}');
                });
            </script>
        ";

        return redirect()->route('admin.coaches.index')
            ->with('success', 'Öğrenci başarıyla koça atandı.')
            ->with('script', $script);
    }

    public function getStudents(User $coach)
    {
        try {
            $students = $coach->students()->get();
            \Log::info('Koç öğrencileri:', ['coach_id' => $coach->id, 'students' => $students]);
            return response()->json(['students' => $students]);
        } catch (\Exception $e) {
            \Log::error('Koç öğrencileri alınırken hata oluştu:', [
                'coach_id' => $coach->id,
                'error' => $e->getMessage()
            ]);
            return response()->json(['students' => []]);
        }
    }

    public function removeStudent(User $coach, User $student)
    {
        $coach->students()->detach($student->id);
        
        return redirect()->route('admin.coaches.index')
            ->with('success', 'Öğrenci başarıyla koçtan kaldırıldı.');
    }

    public function index()
    {
        $coaches = User::where('role', 'coach')->latest()->get();
        $students = User::where('role', 'student')->latest()->get();
        return view('admin.coaches.index', compact('coaches', 'students'));
    }

    public function create()
    {
        return view('admin.coaches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'coach'
        ]);

        return redirect()->route('admin.coaches.index')
            ->with('success', 'Koç başarıyla oluşturuldu.');
    }

    public function edit(User $coach)
    {
        return view('admin.coaches.edit', compact('coach'));
    }

    public function update(Request $request, User $coach)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $coach->id,
            'password' => 'nullable|string|min:6',
        ]);

        $coach->name = $request->name;
        $coach->email = $request->email;
        
        if ($request->filled('password')) {
            $coach->password = bcrypt($request->password);
        }

        $coach->save();

        return redirect()->route('admin.coaches.index')
            ->with('success', 'Koç bilgileri başarıyla güncellendi.');
    }

    public function destroy(User $coach)
    {
        $coach->delete();
        return redirect()->route('admin.coaches.index')
            ->with('success', 'Koç başarıyla silindi.');
    }
} 
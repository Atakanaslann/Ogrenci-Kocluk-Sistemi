<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'student')->latest()->get();
        $books = Book::all();
        return view('admin.students.index', compact('students', 'books'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'student',
        ]);

        return redirect()->route('admin.students.index')
            ->with('success', 'Öğrenci başarıyla eklendi.');
    }

    public function edit(User $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, User $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $student->id,
        ]);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:8',
            ]);

            $student->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('admin.students.index')
            ->with('success', 'Öğrenci başarıyla güncellendi.');
    }

    public function destroy(User $student)
    {
        $student->delete();

        return redirect()->route('admin.students.index')
            ->with('success', 'Öğrenci başarıyla silindi.');
    }

    public function assignBook(Request $request, User $student)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id'
        ]);

        if ($student->books()->where('book_id', $request->book_id)->exists()) {
            return redirect()->route('admin.students.index')
                ->with('error', 'Bu öğrenci zaten bu kitaba sahip.');
        }

        $student->books()->attach($request->book_id);
        \Log::info('Kitap atandı:', ['student_id' => $student->id, 'book_id' => $request->book_id]);

        // Modal'ı açmak için JavaScript kodu
        $script = "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    openStudentBooksModal('{$student->id}', '{$student->name}');
                });
            </script>
        ";

        return redirect()->route('admin.students.index')
            ->with('success', 'Kitap başarıyla öğrenciye atandı.')
            ->with('script', $script);
    }

    public function getBooks(User $student)
    {
        try {
            $books = $student->books()->get();
            \Log::info('Öğrenci kitapları:', ['student_id' => $student->id, 'books' => $books]);
            return response()->json(['books' => $books]);
        } catch (\Exception $e) {
            \Log::error('Öğrenci kitapları alınırken hata oluştu:', [
                'student_id' => $student->id,
                'error' => $e->getMessage()
            ]);
            return response()->json(['books' => []]);
        }
    }

    public function removeBook(User $student, Book $book)
    {
        $student->books()->detach($book->id);
        
        return redirect()->route('admin.students.index')
            ->with('success', 'Kitap başarıyla öğrenciden kaldırıldı.');
    }
} 
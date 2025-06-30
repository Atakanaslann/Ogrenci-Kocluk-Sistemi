<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class AdminBookController extends Controller
{
    public function index()
    {
        $books = Book::with(['student', 'coach'])->latest()->get();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $students = User::where('role', 'student')->get();
        $coaches = User::where('role', 'coach')->get();
        return view('admin.books.create', compact('students', 'coaches'));
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

        Book::create($request->all());

        return redirect()->route('admin.books.index')
            ->with('success', 'Kitap başarıyla oluşturuldu.');
    }

    public function edit(Book $book)
    {
        $students = User::where('role', 'student')->get();
        $coaches = User::where('role', 'coach')->get();
        return view('admin.books.edit', compact('book', 'students', 'coaches'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'student_id' => 'required|exists:users,id',
            'coach_id' => 'required|exists:users,id',
            'due_date' => 'required|date',
        ]);

        $book->update($request->all());

        return redirect()->route('admin.books.index')
            ->with('success', 'Kitap başarıyla güncellendi.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('admin.books.index')
            ->with('success', 'Kitap başarıyla silindi.');
    }

    public function markAsCompleted(Book $book)
    {
        $book->update(['completed' => true]);

        return redirect()->route('admin.books.index')
            ->with('success', 'Kitap tamamlandı olarak işaretlendi.');
    }
} 
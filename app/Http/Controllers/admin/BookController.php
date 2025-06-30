<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->get();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string|in:' . implode(',', array_keys(Book::TYPES)),
            'publisher' => 'required|string|max:255',
            'subject' => 'required|string|in:' . implode(',', array_keys(Book::SUBJECTS)),
            'grade' => 'required|string|in:' . implode(',', array_keys(Book::GRADES)),
            'description' => 'nullable|string'
        ]);

        // Test kitabı için kaynak adı zorunlu
        if ($validated['type'] === 'test') {
            $request->validate([
                'name' => 'required|string|max:255'
            ]);
            $validated['name'] = $request->name;
        } else {
            // Deneme sınavı için otomatik isim oluştur
            $validated['name'] = $validated['publisher'] . ' ' . Book::SUBJECTS[$validated['subject']] . ' ' . Book::GRADES[$validated['grade']] . ' Deneme Sınavı';
        }

        // Deneme sınavı için özel işlemler
        if ($validated['type'] === 'exam') {
            // Deneme sınavı için ek validasyonlar
            if (!in_array($validated['subject'], ['genel', 'matematik', 'fizik', 'kimya', 'biyoloji', 'turkce', 'edebiyat', 'tarih', 'cografya', 'felsefe', 'din', 'ingilizce'])) {
                return back()->withErrors(['subject' => 'Geçersiz ders seçimi.'])->withInput();
            }
        }

        Book::create($validated);

        return redirect()->route('admin.books.index')->with('success', 'Kaynak başarıyla eklendi.');
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'type' => 'required|string|in:' . implode(',', array_keys(Book::TYPES)),
            'publisher' => 'required|string|max:255',
            'subject' => 'required|string|in:' . implode(',', array_keys(Book::SUBJECTS)),
            'grade' => 'required|string|in:' . implode(',', array_keys(Book::GRADES)),
            'description' => 'nullable|string'
        ]);

        // Test kitabı için kaynak adı zorunlu
        if ($validated['type'] === 'test') {
            $request->validate([
                'name' => 'required|string|max:255'
            ]);
            $validated['name'] = $request->name;
        } else {
            // Deneme sınavı için otomatik isim oluştur
            $validated['name'] = $validated['publisher'] . ' ' . Book::SUBJECTS[$validated['subject']] . ' ' . Book::GRADES[$validated['grade']] . ' Deneme Sınavı';
        }

        // Deneme sınavı için özel işlemler
        if ($validated['type'] === 'exam') {
            // Deneme sınavı için ek validasyonlar
            if (!in_array($validated['subject'], ['genel', 'matematik', 'fizik', 'kimya', 'biyoloji', 'turkce', 'edebiyat', 'tarih', 'cografya', 'felsefe', 'din', 'ingilizce'])) {
                return back()->withErrors(['subject' => 'Geçersiz ders seçimi.'])->withInput();
            }
        }

        $book->update($validated);

        return redirect()->route('admin.books.index')->with('success', 'Kaynak başarıyla güncellendi.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'Kitap başarıyla silindi.');
    }
} 
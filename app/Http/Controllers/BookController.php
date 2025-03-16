<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){

        $books = Book::get();
        return view('books.index', compact('books'));
    }

    public function create(){
        return view ('books.create');
    }

    public function store(Request $request){
        $book = new Book();
        $book->name = $request->name;
        $book->konu = $request->konu;
        $book->sayfasayi = $request->sayfasayi;
        $book->save();

        return redirect()->back();


    }
    public function edit($id){
        $book = Book::findOrFail($id);
        return view('books.edit', compact('books'));

    }

    public function markAsCompleted($id)
{
    $book = Book::findOrFail($id);
    $book->completed = true;
    $book->save();

    return redirect()->back()->with('success', 'Görev tamamlandı olarak işaretlendi.');
}

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request; // Используем модель Book

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('year', 'desc')->get(); // Получаем все книги через Eloquent

        return view('books.index', ['books' => $books]);
    }

    public function create()
    {
        $authors = Author::all();

        return view('books.create', compact('authors'));
    }

    public function store(StoreBookRequest $request)
    {
        $validated = $request->validate();


        Book::create($validated);

        return redirect()->route('books.index');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id); // Находим книгу по ID

        return view('books.show', ['book' => $book]);
    }

    public function edit($id)
    {
        $book = Book::find($id); // Находим книгу для редактирования

        return view('books.edit', ['book' => $book]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id); // Находим книгу
        $book->update([
            'title' => $request->input('title'),
            'year' => $request->input('year'),
        ]);

        return redirect('/books');
    }

    public function destroy($id)
    {
        $book = Book::find($id); // Находим книгу
        $book->delete(); // Удаляем книгу

        return redirect('/books');
    }
}

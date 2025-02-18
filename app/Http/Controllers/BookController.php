<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Используем модель Book

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('year', 'desc')->get(); // Получаем все книги через Eloquent
        return view('books.index', ['books' => $books]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date("Y"),
            'description' => 'required|string'
        ]);

        // Создаем новую книгу через Eloquent
        Book::create($validated);
        return redirect('/books')->with('success', 'Книга успешно создана!');
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

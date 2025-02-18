<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
       return view('books.create');
    }

    public function store(Request $request)
    {
        Book::create($request->all());
        return redirect()->route('books.index');
    }

    public function show($id)
    {
        view('show');
    }

    public function edit($id)
    {
        view('edit');
    }

    public function update(Request $request, $id)
    {
        view('update');
    }

    public function destroy($id)
    {
        view('destroy');
    }
}

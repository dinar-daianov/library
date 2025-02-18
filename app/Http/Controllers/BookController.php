<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $books = DB::table("books")->get();
        return view('books.index', ['books' => $books]);
    }

    public function create()
    {
       return view('books.create');
    }

    public function store(Request $request)
    {
        DB::table("books")->insert([
            'title' => $request->input("title"),
            'year' => $request->input("year"),
        ]);
        return redirect('/books');
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

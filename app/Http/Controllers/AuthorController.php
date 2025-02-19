<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        return view('authors.index', ['authors' => $authors]);
    }

    public function create()
    {
        return view('author.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|in:Мужской,Женский',
        ]);

        Author::create($validated);

        return redirect()->route('authors.index')->with('success', 'Автор успешно добавлен.');
    }
}

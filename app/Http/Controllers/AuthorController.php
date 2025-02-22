<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
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
        return view('authors.create');
    }

    public function store(StoreAuthorRequest $request)
    {
        $validated = $request->validated;

        Author::create($validated);

        return redirect()->route('authors.index')->with('success', 'Автор успешно добавлен.');
    }
}

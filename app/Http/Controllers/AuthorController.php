<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('author.index', ['authors' => $authors]);
    }

    public function create()
    {
        return view('author.create');
    }

    public function store(Request $request)
    {
       $validated = $request->validate([
            'name' => 'string|required|max:255',
            'country' => 'nullable|required|max:255',
            'brithday' => 'date|nullable',
            'gender' => 'nullable|in:male,female',
        ]);

        Author::create($validated);
        return redirect('/authors')->with('success', 'Книга успешно создана!');
    }
}

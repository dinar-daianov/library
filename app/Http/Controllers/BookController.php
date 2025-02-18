<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        view('index');
    }

    public function create()
    {
        view('create');
    }

    public function store(Request $request)
    {
        $request->validate([]);
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

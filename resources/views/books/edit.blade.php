@extends('layouts.app')

@section('content')
    <h1>Редактирование книги</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="author">
                <input type="text" name="author" id="author" value="{{ old('author_id', $book->author) }}">
            </label>
        </div>

        <div>
            <label for="title">Название:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}">
        </div>

        <div>
            <label for="year">Год издания:</label>
            <input type="number" name="year" id="year" value="{{ old('year', $book->year) }}">
        </div>

        <div>
            <label for="description">
                <textarea name="description" id="description"></textarea>
            </label>
        </div>

        <button type="submit">Обновить</button>
    </form>
@endsection

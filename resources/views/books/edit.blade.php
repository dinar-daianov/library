@extends('layouts.app')

@section('content')
    <h1>Редактирование книги</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="author_id">Автор</label>
                <select name="author_id"
                        id="author_id"
                        class="form-control @error('author_id') is-invalid @enderror">
                    <option value="">Выберите автора</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }} {{ $book->author_id == $author->id ? 'selected' : '' }}">
                            {{ $author->name }}
                        </option>
                    @endforeach
                    @error('author_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </select>
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

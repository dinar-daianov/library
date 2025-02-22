@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('books.update', $book->id) }}">
    @csrf
    @method('PUT')
    <input type="text" name="author" id="author">
    <input type="text" name="title" value="{{ old('title'), $book->title }}">
    <input type="number" name="year" value="{{ old('year'), $book->year }}">
    <textarea name="description">{{ old('description'), $book->description }}</textarea>
    <button type="submit">Обновить</button>
</form>
@endsection

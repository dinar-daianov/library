@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>
    <p>Год издания {{ $book->year }}</p>
    <p>Описание: {{ $book->description }}</p>
    <a href="{{ route('books.index') }}" class="btn btn-primary">Назад</a>
@endsection

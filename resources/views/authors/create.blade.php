@extends('layout.app')

@section('content')
<h1>Добавить автора</h1>

<form method="POST" action="{{ route('authors.store') }}">
    @csrf
    <label for="name">Имя автора:</label>
    <input type="text" name="name" id="name" required>
    <br>
    <label for="country">Название страны:</label>
    <input type="text" name="country" id="country" required>
    <br>
    <label for="birthday">День рождение автора:</label>
    <input type="date" name="birthday" id="birthday" required>
    <br>
    <label for="gender">Пол мужской\женский?:</label>
    <br>
    <label>
        <input type="radio" name="gender" value="Мужской" required>Мужской
    </label>
    <label>
        <input type="radio" name="gender" value="Мужской" required>Женский
    </label>
    <br>
    <button type="submit">Сохранить</button>
</form>
@endsection

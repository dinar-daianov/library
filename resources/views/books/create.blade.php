<h1>Добавить книгу</h1>
<form method="POST" action="/books">
    @csrf
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <label for="title">Название:</label>
    <input type="text" name="title" id="title" required>
    <br>
    <label for="year">Год издания:</label>
    <input type="number" name="year" id="year" required>
    <br>
    <button type="submit">Сохранить</button>
</form>

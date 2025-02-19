<h1>Добавить книгу</h1>

<form method="POST" action="/books">
    @csrf
    <label for="title">Название:</label>
    <input type="text" name="title" id="title" required>
    <br>
    <div class="form-group">
        <label for="author">Автор</label>
        <select name="author_id" id="author" class="form-control">
            @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <label for="year">Год издания:</label>
    <input type="number" name="year" id="year" required>
    <br>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea name="description" id="description" class="form-control"> {{ old('description', $book->description ?? '') }} </textarea>
    </div>
    <button type="submit">Сохранить</button>
</form>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1>Добавить книгу</h1>

<form method="POST" action="/books">
    @csrf
    <label for="title">Название:</label>
    <input type="text" name="title" id="title" required>
    <br>
    <div class="form-group">
        <label for="author_id">Автор</label>
        <select name="author_id" id="author_id" class="form-control @error('author_id') is-invalid @enderror">
            @foreach($authors as $author)
                <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
            @endforeach
        </select>
        @error('author_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

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

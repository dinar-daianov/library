<h1>Список книг</h1>
<ul>
    @foreach($books as $book)
        <li>{{ $book->title }} ({{ $book->year }})</li>
        <a href="{{ route('books.show', $book) }}" class="btn btn-info">Подробнее</a>
    @endforeach
</ul>


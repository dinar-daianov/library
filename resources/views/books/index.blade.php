<h1>Список книг</h1>
<ul>
    @foreach($books as $book)
        <li>{{ $book->title }} ({{ $book->year }})</li>
    @endforeach
</ul>

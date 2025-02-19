<h1>Список книг</h1>
<ul>
    @foreach($authors as $author)
        <li>{{ $author->title }} ({{ $author->year }})</li>
        <a href="{{ route('author.show', $author) }}" class="btn btn-info">Подробнее</a>
    @endforeach
</ul>

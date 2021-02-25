@extends('layouts.app')

@section('content')
    @if ($flash)
        <p>{{ $flash }}</p>
    @endif
    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <h2><a href="{{ route('articles.show', ['id' => $article->id]) }}">{{ $article->name }}</a></h2>
        <div><a href="{{ route('articles.edit', ['id' => $article->id]) }}">Редактировать статью</a></div>
        <a href="{{ route('articles.destroy', $article) }}"
            data-confirm="Вы уверены?"
            data-method="delete"
            rel="nofollow">Удалить</a>
        <div>{{ Str::limit($article->body, 200) }}</div>
    @endforeach

   {{ $articles->links() }}
@endsection
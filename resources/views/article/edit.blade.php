@extends('layouts.app')

@section('content')
{{ Form::model($article, ['url' => route('articles.update', ['article' => $article]), 'method' => 'PATCH']) }}
    @include('article.form')
   {{ Form::submit('Обновить') }}
{{ Form::close() }}
@endsection
@extends('layouts.master')

@section('title')
    All Books
@stop

@section('head')
    <link href='/css/foobooks.css' rel='stylesheet'>
@stop

@section('content')
    <h1>Welcome to FooBooks!</h1>

    <div class='book'>
        @foreach($books as $book)
            <h2>{{ $book->title }}</h2>
            <img src='{{ $book->cover }}' alt='Cover for {{$book->title}}'>
            <a href='/book/edit/{{$book->id}}'>Edit</a>
        @endforeach
    </div>

@stop

@section('body')
    <script src="/js/book/show.js"></script>
@stop

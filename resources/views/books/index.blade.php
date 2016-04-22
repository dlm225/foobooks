@extends('layouts.master')

@section('title')
    All Books
@stop

@section('head')
    <link href='/css/books_index.css' rel='stylesheet'>
@stop

@section('content')
    <h1>All the books</h1>

    @foreach($books as $book)
        <section class='book'>
            <h2>{{ $book->title }}</h2>

            <h3>{{ $book->author->first_name }} {{ $book->author->last_name }}</h3>

            <img src='{{ $book->cover }}' alt='Cover for {{$book->title}}'>

            <br><a href='/book/edit/{{$book->id}}'>Edit</a>
        </section>
    @endforeach
    </div>

@stop

@section('body')
    <script src="/js/book/show.js"></script>
@stop

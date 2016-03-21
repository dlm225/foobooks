@extends('layouts.master')

@section('title')
    Add book: {{ $title }}
@stop

@section('head')
    <link href='/css/book/show.css' rel='stylesheet'>
@stop

@section('content')
    @if(isset($title))
        <h1>Add book: {{ $title }}</h1>
    @else
        <h1>No book chosen!</h1>
    @endif
@stop

@section('body')
    <script src="/js/book/show.js"></script>
@stop

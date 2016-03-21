@extends('layouts.master')

@section('title')
    Create book
@stop

@section('head')
    <link href='/css/book/show.css' rel='stylesheet'>
@stop

@section('content')
    <br />
    <form action="{{ url('book/add') }}" method="POST">
        Book title to add:
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input name="title" type="text">
        <input name="submit" type="submit">
    </form>
    <br />
@stop

@section('body')
    <script src="/js/book/show.js"></script>
@stop

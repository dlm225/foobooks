@extends('layouts.master')

@section('title')
    Create book
@stop

@section('head')
    <link href='/css/book/show.css' rel='stylesheet'>
@stop

@section('content')
    <br />
    <h1>Add a new book</h1>
    <form method='POST' action='/book/add'>

        {{ csrf_field() }}

        <div class='form-group'>
            <label>* Title:</label>
            <input type='text' id='title' name='title'>
        </div>
        <button type="submit" class="btn btn-primary">Add book</button>
    </form>
    <br />
@stop

@section('body')
    <script src="/js/book/show.js"></script>
@stop

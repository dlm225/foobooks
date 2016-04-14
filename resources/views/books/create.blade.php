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
            {{ $errors->first('title') }}<br />
            <input type='text' id='title' name='title' value='{{ old('title') }}'>
            <label>* Author:</label>
            {{ $errors->first('author') }}<br />
            <input type='text' id='author' name='author' value='{{ old('author') }}'>
        </div>

        <button type="submit" class="btn btn-primary">Add book</button><br />
        {{-- <ul class=''>
            @foreach($errors->all() as $error)
                <li>{{ $error }}<br /></li>
            @endforeach
        </ul> --}}
        @if(count($errors) > 0)
            Please correct the errors above and try again
        @endif
    </form>
    <br />
@stop

@section('body')
    <script src="/js/book/show.js"></script>
@stop

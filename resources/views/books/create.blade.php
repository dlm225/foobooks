@extends('layouts.master')

@section('title')
    Create book
@stop

@section('head')
    <link href='/css/foobooks.css' rel='stylesheet'>
@stop

@section('content')
    <br />
    <h1>Add a new book</h1>
    <form method='POST' action='/book/add'>

        {{ csrf_field() }}

        <div class='form-group'>
            <label>* Title:</label>
            <input type='text' id='title' name='title' value='{{ old('title') }}'><br />
            <div class='error'>{{ $errors->first('title') }}</div>
            <label>* Author:</label>
            <input type='text' id='author' name='author' value='{{ old('author') }}'><br />
            <div class='error'>{{ $errors->first('author') }}</div>
        </div>

        <button type="submit" class="btn btn-primary">Add book</button><br />
        {{-- <ul class=''>
            @foreach($errors->all() as $error)
                <li>{{ $error }}<br /></li>
            @endforeach
        </ul> --}}
        @if(count($errors) > 0)
            <div class='error'>Please correct the errors above and try again</div>
        @endif
    </form>
    <br />
@stop

@section('body')
    <script src="/js/book/show.js"></script>
@stop

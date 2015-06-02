@extends('master')
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop
@section('title')
    Posts
@stop
@section('content')
    <h2>Add a new post</h2>
    {!! Form::open(['route'=>'posts.store']) !!}
    @include('posts._form')
    <div class="form-group">
        {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('summernoteAdmin')
@stop
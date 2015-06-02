@extends('master')
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop
@section('title')
    Posts
@stop
@section('content')
    <h2>{{$post->title}}</h2>
    {!! Form::model($post, ['route'=> ['posts.update', $post->slug], 'method'=>'PATCH', 'id' => 'postForm']) !!}
        @include('posts._form')
        <span class="form-group" style="margin-right: 10px; float:left;">
            {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
        </span>
    {!! Form::close() !!}

    {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->slug]]) !!}
    <div class="form-group" style="margin-right: 10px; float:left;">
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}
    @include('summernoteAdmin')
@stop
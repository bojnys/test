@extends('master')
@section('title')
    Settings
@stop
@section('content')
    {!! Form::model($settings, ['route'=> ['settings.update'], 'method'=>'PATCH', 'id' => 'postForm']) !!}
    @include('settings._form')
    <span class="form-group" style="margin-right: 10px; float:left;">
        {!! Form::submit('Opslaan', ['class'=>'btn btn-primary']) !!}
    </span>
    {!! Form::close() !!}
@stop

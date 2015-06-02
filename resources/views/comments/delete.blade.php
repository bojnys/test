@extends('master')

<div style="float: left; text-align: left; width: 100%;">
    <a href="/posts/{{ DB::table('posts')->where('id','=',$comment->post_id)->first()->slug }}"  class="btn btn-info" role="button" style="margin-top:10px; margin-left:5px; padding:1px 5px; font-style: normal; ">Terug</a>
    <h2>Comment by: {{DB::table('users')->where('id','=',$comment->user_id)->first()->name}}</h2>
    {!!$comment->message!!}<br/>
    {!! Form::open(['method' => 'DELETE', 'route' => ['comments.destroy', $comment->slug]]) !!}
    <div class="form-group" style="margin-right: 10px; float:left;">
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}

</div>
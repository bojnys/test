@extends('master')
@section('title')
    Tags
@stop
@section('content')
    @if($tags->count()>0)
        <!--Tags-->
        Alle gebruikte tags bij de huidige posts.
        <div id="tagList" style="overflow: hidden;">
            @foreach($tags as $tag)
                <li>
                    <a href="/tags/{{$tag->name}}">{{$tag->name}}</a>
                </li>
            @endforeach
        </div>
    @else
        There are no tags yet.
    @endif
@stop
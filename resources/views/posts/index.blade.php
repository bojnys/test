@extends('master')
@section('title')
    Posts
@stop
@section('content')
    @if(Auth::check())
        @if(auth()->user()->role == 5)
            <a href="/posts/create" class="btn btn-primary" role="button">Create New Post</a><br>
        @endif
    @endif

    @if($posts->count()>0)
        @include('flash::message')

        <script>
            $('div.alert').not('.alert-important').delay(3000).slideUp(300);
        </script>

        <!--pagination -->
        {!! $posts->render() !!}

        <!--Posts-->
        <div id="postList" style="overflow: hidden;">
            @foreach($posts as $post)
                <li>
                    <a href="/posts/{{$post->slug}}">{{$post->title}}</a>
                    <br>
                    {!! $post->shortContent !!}
                </li>
            @endforeach
        </div>
    @else
        There are no posts yet.
    @endif
    <!--pagination-->
    {!! $posts->render() !!}
@stop
@section('tags')
    @if($aantalTags > 0)
        <b>Tags: </b><br>
        @foreach($tags as $index => $tag)
            @if($index +1 == $aantalTags)
                <a href="/tags/{{$tag->name}}">{{ $tag->name }}</a>
            @else
                <a href="/tags/{{$tag->name}}">{{ $tag->name }}</a>,
            @endif
        @endforeach
        <br><br>
    @endif
@stop
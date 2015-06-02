@extends('master')
@section('title')
    {{$user->name}}
@stop
@section('content')
    <span style="font-style: italic;">{{$user->city}}</span>@if(Auth::check())
        @if($user->slug = auth()->user()->slug)
            <a href="/user/{{$user->slug}}" class="btn btn-primary" role="button" style="padding-left: 5px; padding-right: 5px; padding-top: 3px; padding-bottom: 3px;">Terug</a>
        @endif
    @endif<br>(
    @if($user->role == 5)
        {{$user->posts()->count()}} posts,
    @endif
    {{$user->comments()->count()}} comments
    )<br>
    @if($user->extraInfo != '')
        <fieldset><legend style="margin-bottom: 0px;">Extra Info</legend>
            {{$user->extraInfo}}<br>
            @endif
            @if($user->favouriteQuote != '')
                <b>Favourite Quote:</b>
                {{$user->favouriteQuote}}<br>
            @endif
            @if($user->extraInfo != '')
        </fieldset>
    @endif
    @if($user->posts()->count() > 0)
        <hr>
        <h4>Posts</h4>
        @foreach($posts as $post)
            <h3 style="text-decoration: underline;"><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h3>
            <b style="font-style: italic">Datum: </b>({{ $post->created_at }})<br>
            <b style="font-style: italic">Tags: </b>
            @foreach($post->tags as $index => $tag)
                @if($index +1 == $post->tags->count())
                    <a href="/tags/{{$tag->name}}" style="font-style: italic; font-weight: bold;">{{ $tag->name }}</a>
                @else
                    <a href="/tags/{{$tag->name}}" style="font-style: italic; font-weight: bold;">{{ $tag->name }}</a>,
                @endif
            @endforeach
            <br>
            <a href="/posts/{{$post->slug}}">Lees meer...</a>
        @endforeach
        <br>
        <?php echo $posts->render(); ?>
        <hr>
    @endif
    @if($user->comments()->count() > 0)
        @if($user->posts()->count()==0)
            <hr>
        @endif
        <h4>Laatst geplaatste comment</h4>
        @foreach($comments as $comment)
            <h3 style="text-decoration: underline;"><a href="/posts/{{$comment->post->slug}}">{{$comment->post->title}}</a></h3>
            <b style="font-style: italic">Datum: </b>({{ $comment->created_at }})<br>
            {{ \Illuminate\Support\Str::words($comment->message, $settings->profilePostLength) }}<br>
            <a href="/posts/{{$comment->post->slug}}">Lees meer...</a>
        @endforeach
        <br>
        @if($user->comments()->count() > 3)<br>
        <a href="/user/{{$user->slug}}/comments" class="btn btn-info" role="button">Laar meer comments.</a>
        @endif
        <hr>
    @endif

@stop
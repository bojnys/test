@extends('master')
@section('facebookShare')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>window.twttr = (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
                    t = window.twttr || {};
            if (d.getElementById(id)) return t;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);

            t._e = [];
            t.ready = function(f) {
                t._e.push(f);
            };

            return t;
        }(document, "script", "twitter-wjs"));</script>
@stop
@section('title')
    Posts
@stop
@section('content')
    <div class="post">
        <h2>{{$post->title}}</h2>
        @include('flash::message')

        <script>
            $('div.alert').not('.alert-important').delay(3000).slideUp(300);
        </script>
        @if ($post->content)
            <article class="content" style="overflow: hidden;">
                {!! nl2br($post->content) !!}
            </article>
        @endif
        @if($post->tags->count() > 0)
        <div style="font-size: smaller; font-style: italic; font-weight: bold; float:left; display: inline-block;">
            <b>Tags:</b>
            @foreach($post->tags as $index => $tag)
                @if($index +1 == $post->tags->count())
                    <a href="/tags/{{$tag->name}}">{{ $tag->name }}</a>
                @else
                    <a href="/tags/{{$tag->name}}">{{ $tag->name }}</a>,
                @endif
            @endforeach
        </div>
        @endif
        <div style="font-size: smaller; font-style: italic;  float:right; display: inline-block;">
            <b>Written by: </b>
            @if(Auth::check())
                @if(auth()->user()->role == 5 || auth()->user()->role == 1)
                    <a href="/user/{{ $post->user->slug  }}">
                @endif
            @endif
            {{ $post->user->name }}
            @if(Auth::check())
                @if(auth()->user()->role == 5 || auth()->user()->role == 1)
                    </a>
                @endif
            @endif
            ({{$post->timeAgo}})
            @if(Auth::check())
                @if(Auth::user()->id == $post->user->id)
                    <a href="/posts/{{$post->slug}}/edit" class="btn btn-primary" role="button" style="padding:1px 5px; font-style: normal;"><b>Edit</b></a>
                @endif
            @endif
        </div>
        <br/>
    </div>
    <hr style="margin-bottom: 15px; margin-top: 6px;">
    <div style="display: inline; position:relative;top: -10px; height:20px;">
        <div class="fb-like" data-href="{{ URL::current() }}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
    </div>
    <div style="display:inline; position:relative;top:-3px;">
        <div class="g-plusone" data-annotation="none"></div>
    </div>
    <div style="display:inline; position:relative; top:-5px;">
        <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{ $post->title }}" data-size="default">Tweet</a>
    </div>
    <hr style="margin-bottom: 15px; margin-top: 6px;">
    @include('comments.comments')
    @if(Auth::check())
        @if(auth()->user()->role == 5 || auth()->user()->role == 1)
            {!! Form::open(['route'=>'comments.store']) !!}
                @include('comments._form')
                <div class="form-group">
                    {!! Form::submit('Post', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
            @include('summernote')
        @endif
    @endif
@stop
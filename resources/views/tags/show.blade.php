@extends('master')
@section('title')
    Posts with tag '{!! $tag->name !!}'
@stop

@section('content')
    <a href="/posts" class="btn btn-primary" role="button">Terug</a><br><br>
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
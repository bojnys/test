@if(($comments->count() > 0 ))
    @if($comments->count() == 1)
        <h3>Comment</h3>
    @else
        <h3>Comments({!! $post->comments->count() !!})</h3>
    @endif
@else
    Er zijn nog geen comments geplaatst.
@endif
@foreach($comments as $comment)
    <span class="comment">
        @if(Auth::check())
            @if(auth()->user()->role == 1 || auth()->user()->role==5)
                <a href="/user/{{ DB::table('users')->where('id', '=', $comment->user_id)->first()->slug  }}">
            @endif
        @endif
        {!! DB::table('users')->where('id','=',$comment->user_id)->first()->name !!}<br>
        @if(Auth::check())
            @if(auth()->user()->role == 1 || auth()->user()->role==5)
                </a>
            @endif
        @endif
        {!! $comment->message !!}
        @if(Auth::check())
            @if(auth()->user()->role == 5)
                {!! Form::open(['method' => 'DELETE', 'route' => ['comments.destroy', $comment->slug]]) !!}
                <div class="form-group" style="float:right;">
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'style'=>'padding:1px 5px; font-style: normal; float:right;']) !!}
                </div>
                {!! Form::close() !!}
                <br>
            @endif
        @endif
    </span>
    <hr>
@endforeach
{!! $comments->render() !!}
<div class="form-group {{$errors->has('message')?'has-error':'' }}">
    {!! Form::label('content', 'Comment:') !!}
    {!! Form::textarea('message', null, ['class'=>'form-control', 'id'=>'summernote', 'config'=>'options']) !!}
    {!! $errors->first('message', '<span class="help-block">:message</span>') !!}
</div>
{!! Form::hidden('slug', $post->slug, ['class' => 'form-control', 'id' => 'slug'])!!}
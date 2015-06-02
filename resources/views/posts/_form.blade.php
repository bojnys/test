<div class="form-group {{$errors->has('slug')?'has-error':''}}">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
    {!! $errors->first('slug', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {{$errors->has('content')?'has-error':'' }}">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class'=>'form-control', 'id'=>'summernote']) !!}
    {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id'=>'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>
<div class="form-group">
    {!! Form::label('published_at', 'Published On:') !!}
    {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>
    {!! Form::hidden('slug', null, ['class' => 'form-control', 'id' => 'slug'])!!}

@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder: 'Choose a tag',
            tags: true
        });
    </script>
@endsection
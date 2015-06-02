<div class="form-group {{$errors->has('title')?'has-error':''}}">
    {!! Form::label('title', 'Titel:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {{$errors->has('publicPPP')?'has-error':''}}">
    {!! Form::label('publicPPP', 'Posts Per Pagina (Publiek):') !!}
    {!! Form::text('publicPPP', null, ['class'=>'form-control']) !!}
    {!! $errors->first('publicPPP', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {{$errors->has('profilePPP')?'has-error':''}}">
    {!! Form::label('profilePPP', 'Posts Per Pagina (Profiel):') !!}
    {!! Form::text('profilePPP', null, ['class'=>'form-control']) !!}
    {!! $errors->first('profilePPP', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {{$errors->has('publicCPP')?'has-error':''}}">
    {!! Form::label('publicCPP', 'Comments Per Pagina (Publiek):') !!}
    {!! Form::text('publicCPP', null, ['class'=>'form-control']) !!}
    {!! $errors->first('publicCPP', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {{$errors->has('profileCPP')?'has-error':''}}">
    {!! Form::label('profileCPP', 'Comments Per Pagina (Profiel):') !!}
    {!! Form::text('profileCPP', null, ['class'=>'form-control']) !!}
    {!! $errors->first('profileCPP', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {{$errors->has('defaultPostsProfile')?'has-error':''}}">
    {!! Form::label('defaultPostsProfile', 'Aantal Posts (Profiel):') !!}
    {!! Form::text('defaultPostsProfile', null, ['class'=>'form-control']) !!}
    {!! $errors->first('defaultPostsProfile', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {{$errors->has('defaultCommentsProfile')?'has-error':''}}">
    {!! Form::label('defaultCommentsProfile', 'Aantal Comments (Profiel):') !!}
    {!! Form::text('defaultCommentsProfile', null, ['class'=>'form-control']) !!}
    {!! $errors->first('defaultCommentsProfile', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {{$errors->has('publicPostLength')?'has-error':''}}">
    {!! Form::label('publicPostLength', 'Lengte Verkorte Posts (Publiek):') !!}
    {!! Form::text('publicPostLength', null, ['class'=>'form-control']) !!}
    {!! $errors->first('publicPostLength', '<span class="help-block">:message</span>') !!}
</div><div class="form-group {{$errors->has('profilePostLength')?'has-error':''}}">
    {!! Form::label('profilePostLength', 'Lengte Verkorte Comments (Profiel):') !!}
    {!! Form::text('profilePostLength', null, ['class'=>'form-control']) !!}
    {!! $errors->first('profilePostLength', '<span class="help-block">:message</span>') !!}
</div>
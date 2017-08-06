<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
    {!! Form::label('foto', 'Foto', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('foto', null, ['class' => 'form-control']) !!}
        {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('printed') ? 'has-error' : ''}}">
    {!! Form::label('printed', 'Printed', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('printed', null, ['class' => 'form-control']) !!}
        {!! $errors->first('printed', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

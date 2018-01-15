@extends('backLayout.app') @section('title') Editar Encuesta @stop @section('content')
<hr/>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Editar Encuesta</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::model($poll, [ 'method' => 'PATCH', 'url' => ['admin/poll', $poll->id], 'class' => 'form-horizontal' ]) !!}

    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
      {!! Form::label('name', 'Nombre: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control input-lg', 'required' => 'required', 'onkeyup' => 'this.value=this.value.toUpperCase();']) !!} {!! $errors->first('name', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
      {!! Form::label('type', 'Tipo: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::select('type', ['SERVICIOS'=>'SERVICIOS', 'DOCENTE'=>'DOCENTE'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('type', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
      {!! Form::label('description', 'Descripción (Máximo 50 caracteres): ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required', 'onkeyup' => 'this.value=this.value.toUpperCase();']) !!} {!! $errors->first('description', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('initial_message') ? 'has-error' : ''}}">
      {!! Form::label('initial_message', 'Mensaje Inicial: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::textarea('initial_message', null, ['class' => 'form-control', 'required' => 'required', 'onkeyup' => 'this.value=this.value.toUpperCase();']) !!} {!! $errors->first('initial_message', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('final_message') ? 'has-error' : ''}}">
      {!! Form::label('final_message', 'Mensaje Final: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::textarea('final_message', null, ['class' => 'form-control', 'required' => 'required', 'onkeyup' => 'this.value=this.value.toUpperCase();']) !!} {!! $errors->first('final_message', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-3">
        {!! Form::submit('Editar', ['class' => 'btn btn-primary form-control']) !!}
      </div>
    </div>
    {!! Form::close() !!} @if ($errors->any())
    <ul class="alert alert-danger">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
    @endif
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection

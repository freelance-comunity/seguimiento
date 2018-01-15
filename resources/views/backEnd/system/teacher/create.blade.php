@extends('backLayout.app') @section('title') Crear Nuevo Maestro @stop @section('content')
<hr/>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Crear Nuevo Maestro</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url' => 'system/teacher', 'class' => 'form-horizontal']) !!}

    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
      {!! Form::label('name', 'Nombre(s): ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control input-lg', 'required' => 'required', 'onkeyup' => 'this.value=this.value.toUpperCase();']) !!} {!! $errors->first('name', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
      {!! Form::label('last_name', 'Apellidos: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('last_name', null, ['class' => 'form-control input-lg', 'required' => 'required', 'onkeyup' => 'this.value=this.value.toUpperCase();']) !!} {!! $errors->first('last_name', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
      {!! Form::label('email', 'Correo Electrónico: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::email('email', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('email', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
      {!! Form::label('username', 'Nombre de Usuario: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('username', null, ['class' => 'form-control input-lg', 'required' => 'required', 'onkeyup' => 'this.value=this.value.toUpperCase();']) !!} {!! $errors->first('username', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
      {!! Form::label('password', 'Contraseña: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::password('password', ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('password', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('status_id') ? 'has-error' : ''}}">
      {!! Form::label('campus_id', 'Plantel: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        @if ($campuses->isEmpty()) {!! Form::select('campus_nothing',['NO HAY REGISTROS' => 'NO HAY REGISTROS'],null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('campus_id', '
        <p class="help-block">:message</p>') !!} @else {!! Form::select('campus_id',$campuses,null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('campus_id', '
        <p class="help-block">:message</p>') !!} @endif
      </div>
    </div>
    <div class="form-group {{ $errors->has('status_id') ? 'has-error' : ''}}">
      {!! Form::label('status_id', 'Estatus: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        @if ($statuses->isEmpty()) {!! Form::select('status_nothing',['NO HAY REGISTROS'=>'NO HAY REGISTROS'],null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('status_id', '
        <p class="help-block">:message</p>') !!} @else {!! Form::select('status_id',$statuses,null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('status_id', '
        <p class="help-block">:message</p>') !!} @endif
      </div>
    </div>


    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-3">
        {!! Form::submit('Crear', ['class' => 'btn btn-primary form-control']) !!}
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

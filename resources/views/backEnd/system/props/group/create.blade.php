@extends('backLayout.app')
@section('title')
Crear Nuevo Grupo
@stop

@section('content')
    <hr/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Crear Nuevo Grupo</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
    {!! Form::open(['url' => 'system/props/group', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Nombre: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('nomenclature') ? 'has-error' : ''}}">
                {!! Form::label('nomenclature', 'Nomenclatura: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nomenclature', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!}
                    {!! $errors->first('nomenclature', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group">
              {!! Form::label('campus_id', 'Selecciona Plantel: ', ['class' => 'col-sm-3 control-label']) !!}
              <div class="col-sm-6">
                {!! Form::select('campus_id',$campuses, null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('campus_id', '
                <p class="help-block">:message</p>') !!}
              </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Crear', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
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

@extends('backLayout.app') @section('title') Crear nueva Pregunta @stop @section('content')
<style media="screen">
  #number {
    display: none;
  }
</style>
<hr/>
<div class="box">
  <div class="box-header">
      <h3 class="box-title">Agregar nueva pregunta a la encuesta: <strong>{{$poll->name}}</strong></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url' => 'admin/question', 'class' => 'form-horizontal']) !!}
    <input type="hidden" name="poll_id" value="{{$poll->id}}">

    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
      {!! Form::label('name', 'Nombre de la Pregunta: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control input-lg', 'required' => 'required', 'onkeyup' => 'this.value=this.value.toUpperCase();']) !!} {!! $errors->first('name', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('type_of_response') ? 'has-error' : ''}}">
      {!! Form::label('type_of_response', 'Tipo de respuesta: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::select('type_of_response',['0'=>'TEXTO','1'=>'ESCALA DE CALIFICACIONES','2'=>'SI ó NO'], null, ['class' => 'form-control input-lg', 'required' => 'required', 'id' => 'purpose']) !!} {!! $errors->first('type_of_response', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('required') ? 'has-error' : ''}}">
      {!! Form::label('required', 'Requerido: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::select('required',['1'=>'SI', '2'=>'NO'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('required', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div id="number" class="form-group {{ $errors->has('number_of_elements') ? 'has-error' : ''}}">
      {!! Form::label('number_of_elements', 'Número de Elementos: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::number('number_of_elements', null, ['class' => 'form-control input-lg', 'min'=>'0']) !!} {!! $errors->first('number_of_elements', '
        <p class="help-block">:message</p>') !!}
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
@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#purpose').on('change', function() {
      if (this.value === "1") {
        $("#number").show();
      } else {
        $("#number").hide();
      }
    });
  });
</script>
@endsection @endsection

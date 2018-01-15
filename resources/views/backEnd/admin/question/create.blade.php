@extends('backLayout.app') @section('title') Crear nueva Pregunta @stop @section('content')
<style media="screen">
  #number {
    display: none;
  }

  #tags {
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
    <b>Instrucciones:</b>
    <p>
      Escriba la pregunta y seleccione el tipo de respuesta.
    </p>
    {!! Form::open(['url' => 'admin/question', 'class' => 'form-horizontal']) !!}
    <input type="hidden" name="poll_id" value="{{$poll->id}}">

    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
      {!! Form::label('name', 'Título de la Pregunta: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control input-lg', 'required' => 'required', 'placeholder' => 'Escriba aquí la pregunta...', 'onkeyup' => 'this.value=this.value.toUpperCase();']) !!} {!! $errors->first('name', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('type_of_response') ? 'has-error' : ''}}">
      {!! Form::label('type_of_response', 'El tipo de respuesta a esta pregunta es:', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::select('type_of_response',['0'=>'TEXTO','1'=>'ESCALA DE CLASIFICACIÓN','2'=>'SÍ o NO'], null, ['class' => 'form-control input-lg', 'required' => 'required', 'id' => 'purpose']) !!} {!! $errors->first('type_of_response', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('required') ? 'has-error' : ''}}">
      {!! Form::label('required', 'Requerir respuesta a esta pregunta: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::select('required',['1'=>'SI', '2'=>'NO'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('required', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div id="number" class="form-group {{ $errors->has('number_of_elements') ? 'has-error' : ''}}">
      {!! Form::label('number_of_elements', 'Número de Elementos: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::number('number_of_elements', 5, ['class' => 'form-control input-lg', 'min'=>'0']) !!} {!! $errors->first('number_of_elements', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>

    <div class="form-group" id="tags">
      {!! Form::label('tags', 'Especifique opciones detalladas para el tipo de respuesta seleccionada. ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        <div class="table table-responsive">
          <table id="myTable" class="table table-bordered table-striped table-hover table order-list">
            <thead class="bg-primary">
              <tr>
                <th style="width:10px;">Clave</th>
                <th style="width:20px;">Etiqueta</th>
                <th style="width:20px;">Ponderación</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="number" name="" class="form-control" value="1" min="0" readonly></td>
                <td><input type="text" name="" class="form-control" onkeyup="this.value=this.value.toUpperCase();" value=""></td>
                <td><input type="number" name="" class="form-control" value="0" min="0"></td>
                <td class="col-sm-2"><a class="deleteRow"></a>

                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5" style="text-align: left;">
                  <input type="button" class="btn btn-default btn-lg btn-block " id="addrow" value="Agregar opción" />
                </td>
              </tr>
              <tr>
              </tr>
            </tfoot>
          </table>
        </div>
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
        // $("#number").show();
        $('#tags').show();
      } else {
        $("#number").hide();
        $("#tags").hide();
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var counter = 2;

    $("#addrow").on("click", function() {
      var newRow = $("<tr>");
      var cols = "";

      cols += '<td><input type="number" class="form-control" name="' + counter + '" value="'+counter+'" min="0" readonly/></td>';
      cols += '<td><input type="text" class="form-control" name="' + counter + '" onkeyup="this.value=this.value.toUpperCase();"/></td>';
      cols += '<td><input type="text" class="form-control" name="' + counter + '" value="0" min="0"/></td>';

      cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Eliminar"></td>';
      newRow.append(cols);
      $("table.order-list").append(newRow);
      counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function(event) {
      $(this).closest("tr").remove();
      counter -= 1
    });


  });



  function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

  }

  function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function() {
      grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
  }
</script>
@endsection @endsection

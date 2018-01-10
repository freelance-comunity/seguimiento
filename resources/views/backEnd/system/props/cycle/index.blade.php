@extends('backLayout.app') @section('title') Ciclo @stop @section('content')

<h1>Ciclos <a href="{{ url('system/props/cycle/create') }}" class="btn btn-primary pull-right btn-sm">Agregar Nuevo Ciclo</a></h1>
<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table table-responsive">
      <table class="table table-bordered table-striped table-hover" id="cycle">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Detalles</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cycle as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td><a href="{{ url('system/props/cycle', $item->id) }}">{{ $item->name }}</a></td>
            <td>
              <a href="{{ url('system/props/cycle/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a> {!! Form::open([ 'method'=>'DELETE', 'url' => ['system/props/cycle', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Eliminar',
              ['class' => 'btn btn-danger btn-xs']) !!} {!! Form::close() !!}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>

  @endsection @section('js')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#cycle').DataTable({
        columnDefs: [{
          targets: [0],
          visible: false,
          searchable: false
        }, ],
        order: [
          [0, "dsc"]
        ],
      });
    });
  </script>
  @endsection

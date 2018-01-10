@extends('backLayout.app') @section('title') Asignatura @stop @section('content')

<h1>Asignaturas <a href="{{ url('system/subject/create') }}" class="btn btn-primary pull-right btn-sm">Agregar Nueva Asignatura</a></h1>
<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table table-responsive">
      <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="subject">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Nomenclatura</th>
              <th>Detalles</th>
            </tr>
          </thead>
          <tbody>
            @foreach($subject as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td><a href="{{ url('system/subject', $item->id) }}">{{ $item->name }}</a></td>
              <td>{{ $item->nomenclature }}</td>
              <td>
                <a href="{{ url('system/subject/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a> {!! Form::open([ 'method'=>'DELETE', 'url' => ['system/subject', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Eliminar',
                ['class' => 'btn btn-danger btn-xs']) !!} {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>

  @endsection @section('js')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#subject').DataTable({
        columnDefs: [{
          targets: [0],
          visible: false,
          searchable: false
        }, ],
        order: [
          [0, "asc"]
        ],
      });
    });
  </script>
  @endsection

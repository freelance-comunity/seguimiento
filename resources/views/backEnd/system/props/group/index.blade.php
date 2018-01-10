@extends('backLayout.app') @section('title') Grupo @stop @section('content')

<h1>Grupos <a href="{{ url('system/props/group/create') }}" class="btn btn-primary pull-right btn-sm">Agregar Nuevo Grupo</a></h1>
<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table table-responsive">
      <table class="table table-bordered table-striped table-hover" id="group">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Nomenclatura</th>
            <th>Detalles</th>
          </tr>
        </thead>
        <tbody>
          @foreach($group as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td><a href="{{ url('system/props/group', $item->id) }}">{{ $item->name }}</a></td>
            <td>{{ $item->nomenclature }}</td>
            <td>
              <a href="{{ url('system/props/group/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a> {!! Form::open([ 'method'=>'DELETE', 'url' => ['system/props/group', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Eliminar',
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
      $('#group').DataTable({
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

@extends('backLayout.app') @section('title') Maestros @stop @section('content')

<h1>Maestros <a href="{{ url('system/teacher/create') }}" class="btn btn-primary pull-right btn-sm">Agregar Nuevo Maestro</a></h1>
<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table table-responsive">
      <table class="table table-bordered table-striped table-hover" id="teacher">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo Electrónico</th>
            <th>Nombre de Usuario</th>
            <th>Detalles</th>
          </tr>
        </thead>
        <tbody>
          @foreach($teacher as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td><a href="{{ url('system/teacher', $item->id) }}">{{ $item->name }}</a></td>
            <td>{{ $item->last_name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->username }}</td>
            <td>
              <a href="{{ url('system/teacher/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> {!! Form::open([ 'method'=>'DELETE', 'url' => ['system/teacher', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Delete',
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
    $('#teacher').DataTable({
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

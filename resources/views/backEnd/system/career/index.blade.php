@extends('backLayout.app') @section('title') Carrera @stop @section('content')

<h1>Carreras <a href="{{ url('system/career/create') }}" class="btn btn-primary pull-right btn-sm">Agregar Nueva Carrera</a></h1>
<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table table-responsive">
      <table class="table table-bordered table-striped table-hover" id="career">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Detalles</th>
          </tr>
        </thead>
        <tbody>
          @foreach($career as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td><a href="{{ url('system/career', $item->id) }}">{{ $item->name }}</a></td>
            <td>
              <a href="{{ url('system/career/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a> {!! Form::open([ 'method'=>'DELETE', 'url' => ['system/career', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Eliminar',
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
    $('#career').DataTable({
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

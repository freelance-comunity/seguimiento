@extends('backLayout.app') @section('title') Encuestas @stop @section('content')

<h1>Encuestas <a href="{{ url('admin/poll/create') }}" class="btn btn-primary pull-right btn-sm">Agregar Nueva Encuesta</a></h1>
{{-- @if(session()->has('message'))
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session()->get('message') }}
</div>
@endif --}}
<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table table-responsive">
      <table class="table table-bordered table-striped table-hover" id="poll">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Descripción</th>
            <th>Detalles</th>
          </tr>
        </thead>
        <tbody>
          @foreach($poll as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td><a href="{{ url('admin/poll', $item->id) }}">{{ $item->name }}</a></td>
            <td>{{ $item->type }}</td>
            <td>{{ $item->description }}</td>
            <td>
              <a href="{{ url('admin/poll/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Actualizar</a>
              <a href="{{ url('addQuestion')}}/{{$item->id}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Agregar pregunta</a>
              <a href="#" class="btn bg-navy btn-xs"><i class="fa fa-eye"></i> Vista previa</a> {!! Form::open([ 'method'=>'DELETE', 'url' => ['admin/poll', $item->id], 'style' => 'display:inline' ]) !!}
              {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs', 'onclick'=>'return confirm("¿Estas seguro de eliminar esta encuesta?")']) !!} {!! Form::close() !!}
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
    $('#poll').DataTable({
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

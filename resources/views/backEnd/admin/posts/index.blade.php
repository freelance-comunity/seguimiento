@extends('backLayout.app') @section('title') Posts @stop @section('content')

<h1>Posts <a href="{{ url('admin/posts/create') }}" class="btn btn-primary pull-right btn-sm">Agregar Nuevo Post</a></h1>
<div class="table table-responsive">
  <table class="table table-bordered table-striped table-hover" id="posts">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Cuerpo</th>
        <th>Detalles</th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td><a href="{{ url('admin/posts', $item->id) }}">{{ $item->title }}</a></td>
        <td>{{ $item->body }}</td>
        <td>
          <a href="{{ url('admin/posts/' . $item->id . '/edit') }}" class="btn btn-block btn-primary btn-xs">Actualizar</a> {!! Form::open([ 'method'=>'DELETE', 'url' => ['admin/posts', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Eliminar', ['class'
          => 'btn btn-block btn-danger btn-xs']) !!} {!! Form::close() !!}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection @section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#posts').DataTable({
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

@extends('backLayout.app')
@section('title')
Estados
@stop

@section('content')

    <h1>Estados <a href="{{ url('system/props/status/create') }}" class="btn btn-primary pull-right btn-sm">Agregar Nuevo Estado</a></h1>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="status">
            <thead>
                <tr>
                    <th>ID</th><th>Nombre</th><th>Detalles</th>
                </tr>
            </thead>
            <tbody>
            @foreach($status as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('system/props/status', $item->id) }}">{{ $item->name }}</a></td>
                    <td>
                        <a href="{{ url('system/props/status/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['system/props/status', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
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

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('#status').DataTable({
            columnDefs: [{
                targets: [0],
                visible: false,
                searchable: false
                },
            ],
            order: [[0, "asc"]],
        });
    });
</script>
@endsection

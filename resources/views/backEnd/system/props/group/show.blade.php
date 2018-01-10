@extends('backLayout.app')
@section('title')
Group
@stop

@section('content')

    <h1>Group</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Nomenclature</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $group->id }}</td> <td> {{ $group->name }} </td><td> {{ $group->nomenclature }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection
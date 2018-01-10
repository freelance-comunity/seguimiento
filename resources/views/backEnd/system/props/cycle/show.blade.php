@extends('backLayout.app')
@section('title')
Cycle
@stop

@section('content')

    <h1>Cycle</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cycle->id }}</td> <td> {{ $cycle->name }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection
@extends('backLayout.app')
@section('title')
Status
@stop

@section('content')

    <h1>Status</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $status->id }}</td> <td> {{ $status->name }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection
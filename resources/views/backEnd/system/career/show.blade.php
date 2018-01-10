@extends('backLayout.app')
@section('title')
Career
@stop

@section('content')

    <h1>Career</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $career->id }}</td> <td> {{ $career->name }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection
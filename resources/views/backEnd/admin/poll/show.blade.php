@extends('backLayout.app')
@section('title')
Poll
@stop

@section('content')

    <h1>Poll</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Type</th><th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $poll->id }}</td> <td> {{ $poll->name }} </td><td> {{ $poll->type }} </td><td> {{ $poll->description }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection
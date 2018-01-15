@extends('backLayout.app')
@section('title')
Question
@stop

@section('content')

    <h1>Question</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Type Of Response</th><th>Required</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $question->id }}</td> <td> {{ $question->name }} </td><td> {{ $question->type_of_response }} </td><td> {{ $question->required }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection
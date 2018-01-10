@extends('backLayout.app')
@section('title')
Subject
@stop

@section('content')

    <h1>Subject</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Nomenclature</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $subject->id }}</td> <td> {{ $subject->name }} </td><td> {{ $subject->nomenclature }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection
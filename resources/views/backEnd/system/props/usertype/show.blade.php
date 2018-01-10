@extends('backLayout.app')
@section('title')
Usertype
@stop

@section('content')

    <h1>Usertype</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $usertype->id }}</td> <td> {{ $usertype->name }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection
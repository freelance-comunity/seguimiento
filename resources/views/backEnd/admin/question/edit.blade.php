@extends('backLayout.app')
@section('title')
Edit Question
@stop

@section('content')

    <h1>Edit Question</h1>
    <hr/>

    {!! Form::model($question, [
        'method' => 'PATCH',
        'url' => ['admin/question', $question->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('type_of_response') ? 'has-error' : ''}}">
                {!! Form::label('type_of_response', 'Type Of Response: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('type_of_response', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('type_of_response', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('required') ? 'has-error' : ''}}">
                {!! Form::label('required', 'Required: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('required', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('required', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_elements') ? 'has-error' : ''}}">
                {!! Form::label('number_of_elements', 'Number Of Elements: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('number_of_elements', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_elements', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
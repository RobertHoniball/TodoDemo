@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">TODO Create</div>

          <div class="panel-body">
            {!! Form::open(['action' => 'TODOsController@store']) !!}
            @include('todos._form')
            {!! Form::submit('Create') !!}
            {!! Form::close() !!}

            @include('errors.list')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

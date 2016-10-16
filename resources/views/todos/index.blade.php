@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">TODOs Index <a href="{{ action('TODOsController@create') }}" class="btn blue btn-xs btn-outline pull-right">Create <i class="fa fa-plus"></i></a></div>

          <div class="panel-body">
            <ul>
              @forelse($list as $item)
                <li>
                  {!! Form::open(['method'=>'delete','action'=>['TODOsController@destroy', $item], 'style' => 'display:inline']) !!}<button type="submit" class="btn btn-info btn-xs">Mark as Done</button>{!! Form::close() !!}
                  <a href="{{ action('TODOsController@edit', $item) }}">[Edit]</a>
                  {{ $item->todo }} - [{{ $item->updated_at->toDateTimeString() }}]
                </li>
              @empty
                <ul>List is empty</ul>
              @endforelse
            </ul>
            {{ $list->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

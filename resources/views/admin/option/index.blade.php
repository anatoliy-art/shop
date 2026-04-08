@extends('admin.layouts.app') 

@section('title', 'Options list') 


@section('content')

<div class="col-12">

@if($options->count())

<table class="table table-striped my-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th>{{ __('Parent') }}</th>
      <th>{{ __('Title') }}</th>
      <th>{{ __('Value') }}</th>
      <th>{{ __('Action') }}</th>
    </tr>
  </thead>
  <tbody>
    @foreach($options as $option)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $option->parent['title'] ??  __('Independent option') }}</td>
      <td>{{ $option->title}}</td>
      <td>{{ $option->valie }}</td>
      <td><a class="btn btn-primary" href="{{ route('admin.options.show', $option) }}">Show</a>
    </tr>
    @endforeach   
    </tbody>
</table>

    {{ $options->links(data:['scrollTo' => false]) }}

@else
  
  <p>Список Option пуст...</p>

@endif

</div>


@endsection


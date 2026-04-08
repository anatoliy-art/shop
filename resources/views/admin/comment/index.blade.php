@extends('admin.layouts.app') 

@section('title', 'comments list') 


@section('content')

<div class="col-12">

@if($comments->count())

<table class="table table-striped my-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th>{{ __('Product name') }}</th>
      <th>{{ __('Name') }}</th>
      <th>{{ __('Text commenta') }}</th>
      <th>{{ __('Status') }}</th>
      <th>{{ __('Action') }}</th>
    </tr>
  </thead>
  <tbody>
    @foreach($comments as $comment)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $comment->product->title}}</td>
      <td>{{ $comment->name}}</td>
      <td>{{ $comment->comment}}</td>
      <td> @if($comment->is_published) <span class="text-success">Одобрен</span> @else <span class="text-danger">На рассмотрении</span> @endif </td>
      <td class="d-flex">
        <a class="btn btn-primary mr-2" href="{{ route('admin.comments.edit', $comment) }}">Edit</a>
        <form action="{{ route('admin.comments.destroy', $comment) }}" method="post" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit" onclick="return confirm('Вы согласны с confirm?')">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach   
    </tbody>
</table>

    {{ $comments->links(data:['scrollTo' => false]) }}

@else
  
  <p>Список Коментариев пуст...</p>

@endif

</div>


@endsection


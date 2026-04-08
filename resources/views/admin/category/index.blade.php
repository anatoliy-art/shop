@extends('admin.layouts.app') 

@section('title', 'Categories list') 


@section('content')

<div class="col-12">

@if($categories->count())

<table class="table table-striped my-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th>{{ __('Thumbnail') }}</th>
      <th>{{ __('Parent') }}</th>
      <th>{{ __('Title') }}</th>
      <th>{{ __('Slug') }}</th>
      <th>{{ __('Action') }}</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td><img src="{{ $category->thumbnail ? asset('uploads/' . $category->thumbnail) : asset('no-image.jpg') }}" alt="" width="50px"></td>
      <td>{{ $category->parent['title'] ??  __('Independent category') }}</td>
      <td>{{ $category->title}}</td>
      <td>{{ $category->slug }}</td>
      <td><a class="btn btn-primary" href="{{ route('admin.categories.show', $category) }}">Show</a>
    </tr>
    @endforeach   
    </tbody>
</table>

<div class="col-12 d-flex justify-content-between">
    {{ $categories->appends(['search' => request('search')])->links() }}

    <form class="form-inline my-2 my-lg-0" action="{{ route('admin.categories.search') }}" method="GET">
      @csrf
      
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>

@else
  
  <p>Список Категорий пуст...</p>

@endif

</div>


@endsection


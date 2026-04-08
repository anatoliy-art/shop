@extends('admin.layouts.app') 

@section('title', 'products list') 


@section('content')

<div class="col-12">

@if($products->count())

<table class="table table-striped my-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th>{{ __('Thumbnail') }}</th>
      <th>{{ __('Category') }}</th>
      <th>{{ __('Title') }}</th>
      <th>{{ __('Slug') }}</th>
      <th>{{ __('Stars') }}</th>
      <th>{{ __('View') }}</th>
      <th>{{ __('Hit') }}</th>
      <th>{{ __('New') }}</th>
      <th>{{ __('Sale') }}</th>
      <th>{{ __('Action') }}</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td><img src="{{ $product->thumbnail ? asset('uploads/' . $product->thumbnail) : asset('no-image.jpg') }}" alt="" width="50px"></td>
      <td>{{ $product->category->title }}</td>
      <td>{{ $product->title}}</td>
      <td>{{ $product->slug }}</td>
      <td>{{ $product->stars }}</td>
      <td>{{ $product->view }}</td>
      <td> @if($product->hit) <span class="text-success">Да</span> @else <span class="text-danger">Нет</span> @endif </td>
      <td> @if($product->new) <span class="text-success">Да</span> @else <span class="text-danger">Нет</span> @endif </td>
      <td> @if($product->sale) <span class="text-success">Да</span> @else <span class="text-danger">Нет</span> @endif </td>
      <td><a class="btn btn-primary" href="{{ route('admin.products.show', $product) }}">Show</a>
    </tr>
    @endforeach   
    </tbody>
</table>

<div class="col-12 d-flex justify-content-between">
    {{ $products->appends(['search' => request('search')])->links() }}

    <form class="form-inline my-2 my-lg-0" action="{{ route('admin.products.search') }}" method="GET">
      @csrf
      
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="s">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>

@else
  
  <p>Список Продуктов пуст...</p>

@endif

</div>


@endsection


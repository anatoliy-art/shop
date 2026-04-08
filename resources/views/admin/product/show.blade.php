@extends('admin.layouts.app') 

@section('title', 'product show') 

@section('content')

<div class="card mb-3 col-10 offset-1">
    <div class="row">
      <img src="{{ $product->thumbnail ? asset('uploads/' . $product->thumbnail) : asset('no-image.jpg') }}" alt="{{ $product->title }}" class="col-8">
      <div class="col-4">
        <ul class="list-unstyled">
          @if($product->gallery)
            @foreach($product->gallery as $file)
              <li><img src="{{ asset('uploads/' . $file) }}" alt="{{ $product->title }}" width="200" class="mb-3"></li>
            @endforeach
          @endif
        </ul>
      </div>
    </div>
  <div class="card-body">
    <h5 class="card-title">{{ $product->title }}</h5>
    <p class="card-text">{{ $product->description }}</p>
    <p class="card-footer d-flex justify-content-between">
        <span class="data-wrap">
            <small class="text-muted mr-3">Hit: <b>{{ $product->hit }}</b></small>
            <small class="text-muted mr-3">New: <b>{{ $product->new }}</b></small>
            <small class="text-muted mr-3">Sale: <b>{{ $product->sale }}</b></small>
        </span>
        <span class="data-wrap">
            <small class="text-muted mr-3">Stars: <b>{{ $product->stars }}</b></small>
            <small class="text-muted mr-3">View: <b>{{ $product->view }}</b></small>
        </span>
        @if($product->colors)
        <span class="data-wrap">
            <small class="text-muted mr-3">Colors: <b>{{ implode(', ', $product->colors) }}</b></small>
        </span>
        @endif
        @if($product->sizes)
        <span class="data-wrap">
            <small class="text-muted mr-3">Sizes: <b>{{ implode(', ', $product->sizes) }}</b></small>
        </span>
        @endif
        <span class="data-wrap">
            <small class="text-muted mr-3">Created At: <b>{{ $product->created_at->format('Y-m-d') }}</b></small>
            <small class="text-muted mr-3">Updated At: <b>{{ $product->updated_at->format('Y-m-d') }}</b></small>
        </span>
    </p>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back to list products</a>
    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('admin.products.destroy', $product) }}" method="post" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit" onclick="return confirm('Вы согласны с confirm?')">Delete</button>
    </form>
  </div>
</div>

@endsection
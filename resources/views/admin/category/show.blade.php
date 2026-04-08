@extends('admin.layouts.app') 

@section('title', 'Category show') 

@section('content')

<div class="card mb-3 col-10 offset-1">
    <div class="row">
      <img src="{{ $category->thumbnail ? asset('uploads/' . $category->thumbnail) : asset('no-image.jpg') }}" alt="{{ $category->title }}" class="col-8">
    </div>
  <div class="card-body">
    <h5 class="card-title">{{ $category->title }}</h5>
    <p class="card-text">{{ $category->description }}</p>
    <p class="card-footer d-flex justify-content-between">
        <small class="text-muted">{{ $category->created_at->format('Y-m-d') }}</small>
        <small class="text-muted">{{ $category->updated_at->format('Y-m-d') }}</small>
    </p>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back to list categorys</a>
    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('admin.categories.destroy', $category) }}" method="post" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit" onclick="return confirm('Вы согласны с confirm?')">Delete</button>
    </form>
  </div>
</div>

@endsection
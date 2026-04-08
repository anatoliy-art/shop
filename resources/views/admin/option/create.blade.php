@extends('admin.layouts.app') 

@section('title', 'Category create') 

@section('content')

<div class="col-10 offset-1">
<h1>{{ __('Create option') }}</h1>

<form action="{{ route('admin.options.store') }}" method="post" enctype="multipart/form-data">

  @csrf

  <div class="mb-3">
      <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id">
          <option value="0">{{ __('Independent option') }}</option>
          @foreach($options as $option)
              <option value="{{ $option->id }}">@if($option->parent_id) - @endif {{ $option->title }}</option>
          @endforeach
      </select>
      @error('parent_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="mb-3">
    <label for="title" class="form-label">{{ __('Title') }}</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" aria-describedby="title" value="{{ old('title') }}"> 
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror   
  </div>

  <div class="mb-3">
    <label for="value" class="form-label">{{ __('Value') }}</label>
    <input type="text" class="form-control @error('value') is-invalid @enderror" id="value" name="value" aria-describedby="value" value="{{ old('value') }}"> 
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror   
  </div>

  <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">{{ __('Go back') }}</a> 
  <button type="submit" class="btn btn-success">{{ __('Create option') }}</button>
</form>


</div>

@endsection

@extends('admin.layouts.app') 

@section('title', 'Category create') 

@section('content')

<div class="col-10 offset-1">
<h1>{{ __('Create category') }}</h1>

<form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">

  @csrf

  <div class="mb-3">
      <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id">
          <option value="0">{{ __('Independent category') }}</option>
          @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->title }}</option>
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
    <label for="description" class="form-label">{{ __('Description') }}</label>
    <textarea class="form-control" name="description" id="description" rows="5">{{ old('description') }}</textarea>    
  </div>

  <div class="mb-3">
    <label for="formFile" class="form-label">{{ __('Thumbnail') }}</label>
    <input class="form-control" type="file" id="formFile" name="thumbnail" >
  </div>

  <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">{{ __('Go back') }}</a> 
  <button type="submit" class="btn btn-success">{{ __('Create category') }}</button>
</form>


</div>

@endsection

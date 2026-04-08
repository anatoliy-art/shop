@extends('admin.layouts.app') 

@section('title', 'product create') 

@section('content')

<div class="col-10 offset-1">
<h1>{{ __('Create product') }}</h1>

<form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">

  @csrf

  <div class="mb-3">
      <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
          @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->title }}</option>
          @endforeach
      </select>
      @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
    <label for="price" class="form-label">{{ __('Price') }}</label>
    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" aria-describedby="price" value="{{ old('price') }}"> 
    @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror   
  </div>

  <div class="mb-3">
    <label for="old_price" class="form-label">{{ __('Old Price') }}</label>
    <input type="text" class="form-control @error('old_price') is-invalid @enderror" id="old_price" name="old_price" aria-describedby="old_price" value="{{ old('old_price') }}"> 
    @error('old_price')<div class="invalid-feedback">{{ $message }}</div>@enderror   
  </div>

  <div class="mb-3">
    <label for="formFile" class="form-label">{{ __('Thumbnail') }}</label>
    <input class="form-control" type="file" id="formFile" name="thumbnail" >
  </div>

  <div class="mb-3">
    <label for="gallery" class="form-label">Gallery</label>
    <input class="form-control" type="file" name="gallery[]" multiple >
  </div>

<div class="d-flex">
  <div class="form-group form-check mr-3">
    <input type="checkbox" class="form-check-input" id="hit" name="hit" value="1">
    <label class="form-check-label" for="hit">Hit</label>
  </div>
  <div class="form-group form-check mr-3">
    <input type="checkbox" class="form-check-input" id="new" name="new" value="1">
    <label class="form-check-label" for="new">New</label>
  </div>
  <div class="form-group form-check mr-3">
    <input type="checkbox" class="form-check-input" id="sale" name="sale" value="1">
    <label class="form-check-label" for="sale">Sale</label>
  </div>

  @if(!empty($colors))
      <div class="form-group md-3 mr-3" style="width: 200px;">
        <label for="colors" class="form-label">{{ __('Colors') }}</label>
        <select class="form-control" name="colors[]" multiple>
        @foreach($colors as $color)
          <option value="{{ $color->title }}">{{ $color->title }}</option>
        @endforeach
        </select>
      </div>
  @endif

  @if(!empty($sizes))
      <div class="form-group md-3 mr-3" style="width: 200px;">
        <label for="sizes" class="form-label">{{ __('Sizes') }}</label>
        <select class="form-control" name="sizes[]" multiple>
        @foreach($sizes as $size)
          <option value="{{ $size->title }}">{{ $size->title }}</option>
        @endforeach
        </select>
      </div>
  @endif

</div>

  <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">{{ __('Go back') }}</a> 
  <button type="submit" class="btn btn-success">{{ __('Create product') }}</button>
</form>


</div>

@endsection

@extends('admin.layouts.app') 

@section('title', 'Category create') 

@section('content')

<div class="col-10 offset-1">
<h1>{{ __('Create category') }}</h1>

<form action="{{ route('admin.categories.update', $category) }}" method="post" enctype="multipart/form-data">

  @csrf
  @method('PUT')

  <div class="mb-3">
      <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id">
          <option value="0" @if($category->parent_id == 0) selected @endif>{{ __('Independent category') }}</option>
          @foreach($categories as $val)
              <option value="{{ $val->id }}" @if($category->parent_id == $val->id) selected @endif>{{ $val->title }}</option>
          @endforeach
      </select>
      @error('parent_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="mb-3">
    <label for="title" class="form-label">{{ __('Title') }}</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" aria-describedby="title" value="{{ $category->title }}"> 
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror   
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">{{ __('Description') }}</label>
    <textarea class="form-control" name="description" id="description" rows="5">{{ $category->description }}</textarea>    
  </div>

  <div class="mb-3">
    <label for="formFile" class="form-label">{{ __('Thumbnail') }}</label>
    <input class="form-control" type="file" id="formFile" name="thumbnail" >
  </div>
  @if($category->thumbnail)
    <img src="{{ asset('uploads/' . $category->thumbnail) }}" alt="{{ $category->title }}" width="100">
    <label for="clear_img" class="form-label">Remove Thumbnail</label>
    <input type="checkbox" class="form-check-input" id="clear_img" name="clear_img" value="1">
  @else
    <img src="{{ asset('no-image.jpg') }}" alt="{{ $category->title }}" width="100">
  @endif

<div class="button-group">
  <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">{{ __('Go back') }}</a> 
  <button type="submit" class="btn btn-primary">{{ __('Update category') }}</button>
</div>

</form>


</div>

@endsection

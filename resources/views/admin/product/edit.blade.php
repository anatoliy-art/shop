@extends('admin.layouts.app') 

@section('title', 'product create') 

@section('content')

<div class="col-10 offset-1">
<h1>{{ __('Create product') }}</h1>

<form action="{{ route('admin.products.update', $product) }}" method="post" enctype="multipart/form-data">

  @csrf
  @method('PUT')

  <div class="mb-3">
      <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
          @foreach($categories as $key => $val)
              <option value="{{ $val->id }}" @if($product->category_id == $val->id) selected @endif>{{ $val->title }}</option>
          @endforeach
      </select>
      @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>

  <div class="mb-3">
    <label for="title" class="form-label">{{ __('Title') }}</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" aria-describedby="title" value="{{ $product->title }}"> 
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror   
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">{{ __('Description') }}</label>
    <textarea class="form-control" name="description" id="description" rows="5">{{ $product->description }}</textarea>    
  </div>

  <div class="mb-3">
    <label for="price" class="form-label">{{ __('Price') }}</label>
    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" aria-describedby="price" value="{{ $product->price }}"> 
    @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror   
  </div>

  <div class="mb-3">
    <label for="old_price" class="form-label">{{ __('Old Price') }}</label>
    <input type="text" class="form-control @error('old_price') is-invalid @enderror" id="old_price" name="old_price" aria-describedby="old_price" value="{{ $product->old_price }}"> 
    @error('old_price')<div class="invalid-feedback">{{ $message }}</div>@enderror   
  </div>

  <div class="mb-3">
    <label for="formFile" class="form-label">{{ __('Thumbnail') }}</label>
    <input class="form-control" type="file" id="formFile" name="thumbnail" >
  </div>
  @if($product->thumbnail)
    <img src="{{ asset('uploads/' . $product->thumbnail) }}" alt="{{ $product->title }}" width="100">
    <label for="clear_img" class="form-label">Remove Thumbnail</label>
    <input type="checkbox" class="form-check-input" id="clear_img" name="clear_img" value="1">
  @else
    <img src="{{ asset('no-image.jpg') }}" alt="{{ $product->title }}" width="100">
  @endif

  <div class="mb-3">
    <label for="gallery" class="form-label">Gallery</label>
    <input class="form-control" type="file" name="gallery[]" multiple >
  </div>
  @if(!empty($product->gallery))

    @foreach($product->gallery as $file)
      <img src="{{ asset('uploads/' . $file) }}" alt="{{ $product->title }}" width="100">
    @endforeach

    <label for="clear_gallery" class="form-label">Remove Gallery</label>
    <input type="checkbox" class="form-check-input" id="clear_gallery" name="clear_gallery" value="1">
  @else
    <img src="{{ asset('no-image.jpg') }}" alt="{{ $product->title }}" width="100">
  @endif

<div class="d-flex mt-3">
  <div class="form-group form-check mr-3">
    <input type="checkbox" class="form-check-input" id="hit" name="hit" value="1" @if($product->hit) checked @endif>
    <label class="form-check-label" for="hit">Hit</label>
  </div>
  <div class="form-group form-check mr-3">
    <input type="checkbox" class="form-check-input" id="new" name="new" value="1" @if($product->new) checked @endif>
    <label class="form-check-label" for="new">New</label>
  </div>
  <div class="form-group form-check mr-3">
    <input type="checkbox" class="form-check-input" id="sale" name="sale" value="1" @if($product->sale) checked @endif>
    <label class="form-check-label" for="sale">Sale</label>
  </div>

  @if(!empty($colors))
      <div class="form-group md-3 mr-3" style="width: 200px;">
        <label for="colors" class="form-label">{{ __('Colors') }}</label>
        <select class="form-control" name="colors[]" multiple>
          <option value="0">Clear colors</option>
        @foreach($colors as $color)
          @if($product->colors)
            <option value="{{ $color->title }}" @if(in_array($color->title, $product->colors)) selected @endif>{{ $color->title }}</option>
          @else
            <option value="{{ $color->title }}">{{ $color->title }}</option>
          @endif
        @endforeach
        </select>
      </div>
  @endif

  @if(!empty($sizes))
      <div class="form-group md-3 mr-3" style="width: 200px;">
        <label for="sizes" class="form-label">{{ __('Sizes') }}</label>
        <select class="form-control" name="sizes[]" multiple>
          <option value="0">Clear sizes</option>
        @foreach($sizes as $size)
          @if($product->colors)
            <option value="{{ $size->title }}" @if(in_array($size->title, $product->sizes)) selected @endif>{{ $size->title }}</option>
          @else
            <option value="{{ $size->title }}">{{ $size->title }}</option>
          @endif
        @endforeach
        </select>
      </div>
  @endif

</div>

  <a href="{{ route('admin.products.show', $product) }}" class="btn btn-primary">{{ __('Go back') }}</a> 
  <button type="submit" class="btn btn-success">{{ __('Update product') }}</button>
</form>


</div>

@endsection

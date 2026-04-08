@extends('admin.layouts.app') 

@section('title', 'Comment update') 

@section('content')

<div class="col-10 offset-1">
<h1>{{ __('Update comment') }}</h1>

<form action="{{ route('admin.comments.update', $comment) }}" method="post">

  @csrf
  @method('PUT')

<div class="mb-3">
  <div class="form-check">
    <input class="form-check-input" type="radio" name="is_published" id="completed" value="1" @if($comment->is_published == 1) checked @endif>
    <label class="form-check-label" for="completed">
      Одобрен
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="is_published" id="active" value="0" @if($comment->is_published == 0) checked @endif>
    <label class="form-check-label" for="active">
      На рассмотрении
    </label>
  </div>
</div>

<div class="button-group">
  <a href="{{ route('admin.comments.index') }}" class="btn btn-secondary">{{ __('List comments') }}</a> 
  <button type="submit" class="btn btn-primary">{{ __('Update comment') }}</button>
</div>

</form>


</div>

@endsection

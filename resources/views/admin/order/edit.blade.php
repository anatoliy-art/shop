@extends('admin.layouts.app') 

@section('title', 'Order update') 

@section('content')

<div class="col-10 offset-1">
<h1>{{ __('Update order') }}</h1>

<form action="{{ route('admin.orders.update', $order) }}" method="post">

  @csrf
  @method('PUT')

<div class="mb-3">
  <div class="form-check">
    <input class="form-check-input" type="radio" name="status" id="completed" value="1" @if($order->status == 1) checked @endif>
    <label class="form-check-label" for="completed">
      Завершен
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="status" id="active" value="0" @if($order->status == 0) checked @endif>
    <label class="form-check-label" for="active">
      Активен
    </label>
  </div>
</div>

<div class="button-group">
  <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-secondary">{{ __('Go back') }}</a> 
  <button type="submit" class="btn btn-primary">{{ __('Update order') }}</button>
</div>

</form>


</div>

@endsection

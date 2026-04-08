@extends('layouts.app')

@section('title', 'Cart')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><span>Cart</span></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">

        <div class="col-lg-8 mb-3">
            <div class="cart-content p-3 h-100 bg-white">
            	@if(session()->has('cart') && !empty(session()->get('cart')))
                <div class="table-responsive">
                    <table class="table align-middle table-hover">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Photo</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Summ</th>
                                <th><i class="fa-regular fa-trash-can"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach (session('cart') as $key => $product)
                            <tr class="text-center">
                            	<td>{{ $loop->iteration }}</td>
                                <td class="product-img-td">
                                    <a href="{{ route('product.show', $key) }}">
                                        <img src="{{ $product['thumbnail'] ? asset('uploads/' . $product['thumbnail']) : asset('no-image.jpg') }}" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('product.show', $key) }}" class="cart-content-title">{{ $product['title'] }}</a>
                                </td>
                                <td>$ {{ $product['price'] }}</td>
                                <td>&times;{{ $product['quantity'] }}</td>
                                <td>$ {{ $product['summ'] }}</td>
                                <td><a href="{{ route('cart.delete', $key) }}" class="btn btn-danger"><i class="fa-regular fa-circle-xmark"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <th colspan="6" class="text-end">Total Summ:</th>
                                <th class="text-center">$ {{ session()->get('totalSumm') }}</th>
                            </tr>
                            <tr>
                                <th colspan="6" class="text-end">Total Qty:</th>
                                <th class="text-center">шт {{ session()->get('totalQty') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                @else
                    <p>List cart is empty...</p>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Home</a>
                @endif
            </div>
        </div>

        <div class="col-lg-4 mb-3">

        <div class="cart-summary p-3 sidebar">

<form action="{{ route('cart.order') }}" method="post">

  @csrf

  <div class="mb-3">
    <label for="name" class="form-label">{{ __('Name') }}</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="name" value="@if(auth()->check()) {{ auth()->user()->name }} @else {{ old('name') }} @endif"> 
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror   
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">{{ __('E-mail') }}</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="email" value="@if(auth()->check()) {{ auth()->user()->email }} @else {{ old('email') }} @endif"> 
    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror   
  </div>

  <div class="mb-3">
    <label for="phone" class="form-label">{{ __('Phone') }}</label>
    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" aria-describedby="phone" value="{{ old('phone') }}"> 
    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror   
  </div>

  <div class="mb-3">
    <label for="address" class="form-label">{{ __('Address') }}</label>
    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" aria-describedby="address" value="{{ old('address') }}"> 
    @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror   
  </div>

  <div class="d-grid">
    <button type="submit"  class="btn btn-warning">{{ __('Create order') }}</button>
  </div>

</form>

        </div>

    </div>

    </div>
</div>

@endsection
@extends('admin.layouts.app') 

@section('title', 'Order show') 

@section('content')

<div class="card mb-3 col-10 offset-1">
  <div class="card-body">
    <h5 class="card-title">{{ $order->name }}</h5>
    <p class="card-text">{{ $order->email }}</p>
    <p class="card-text">@if($order->status) <span class="text-success">Завершен</span> @else <span class="text-danger">Активен</span> @endif </p>
    <p class="card-footer d-flex justify-content-between">
        <small class="text-muted">Phone: <b>{{ $order->phone }}</b></small>
        <small class="text-muted">Address: <b>{{ $order->address }}</b></small>
        <small class="text-muted">Qty: <b>{{ $order->qty }} шт</b></small>
        <small class="text-muted">Summ: <b>{{ $order->summ }} $</b></small>
    </p>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back to list orders</a>
    <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('admin.orders.destroy', $order) }}" method="post" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit" onclick="return confirm('Вы согласны с confirm?')">Delete</button>
    </form>
  </div>
</div>

<hr>

<div class="col-10 offset-1">
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
            </tr>
        </thead>
        <tbody>
          @php
            $totalSumm = null;
            $totalQty = null;
          @endphp
          @foreach ($order->orderItems as $key => $product)
            <tr class="text-center">
              <td>{{ $loop->iteration }}</td>
                <td class="product-img-td">
                    <a href="{{ route('product.show', $key) }}">
                        <img src="{{ $product->thumbnail ? asset('uploads/' . $product->thumbnail) : asset('no-image.jpg') }}" alt="" width="50">
                    </a>
                </td>
                <td>
                    <a href="{{ route('product.show', $product) }}" class="cart-content-title">{{ $product->title }}</a>
                </td>
                <td>$ {{ $product->price }}</td>
                <td>&times;{{ $product->qty_item }}</td>
                <td>$ {{ $product->summ_item }}</td>
            </tr>

            @php
              $totalQty += $product->qty_item;
              $totalSumm += $product->summ_item;
            @endphp            
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th colspan="5" class="text-end">Total Summ:</th>
                <th class="text-center">$ {{ $totalSumm }}</th>
            </tr>
            <tr>
                <th colspan="5" class="text-end">Total Qty:</th>
                <th class="text-center">шт {{ $totalQty }}</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>

@endsection
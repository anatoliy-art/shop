@extends('admin.layouts.app') 

@section('title', 'Orders list') 


@section('content')

<div class="col-12">

@if($orders->count())

<table class="table table-striped my-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th>{{ __('Name') }}</th>
      <th>{{ __('E-mail') }}</th>
      <th>{{ __('Phone') }}</th>
      <th>{{ __('Address') }}</th>
      <th>{{ __('Status') }}</th>
      <th>{{ __('Action') }}</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $order->name}}</td>
      <td>{{ $order->email}}</td>
      <td>{{ $order->phone}}</td>
      <td>{{ $order->address}}</td>
      <td> @if($order->status) <span class="text-success">Завершен</span> @else <span class="text-danger">Активен</span> @endif </td>
      <td><a class="btn btn-primary" href="{{ route('admin.orders.show', $order) }}">Show</a>
    </tr>
    @endforeach   
    </tbody>
</table>

    {{ $orders->links(data:['scrollTo' => false]) }}

@else
  
  <p>Список Заказов пуст...</p>

@endif

</div>


@endsection


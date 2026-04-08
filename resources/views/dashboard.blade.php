@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section class="featured-products">
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="section-title">
                    <span>Последние заказы</span>
                </h2>
            </div>
        </div>

        <div class="row">

            @foreach($orders as $order)

            <div class="col-12">
                <x-order-card :order="$order" />
            </div>

            @endforeach

        </div>
    </div>
</section>

@endsection

@extends('layouts.app')

@section('title', 'Search')

@section('content')

<section class="featured-products">
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="section-title">
                    <span>Поиск по запросу: {{ $search }}</span>
                </h2>
            </div>
        </div>

        <div class="row">

            @forelse($products as $product)

            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <x-product-card :product="$product" />
            </div>

            @empty
                <p>По данному запросу ничего не найдено...</p>
            @endforelse

        </div>

        <div class="row">
            <div class="col-12">
                
                {{ $products->links(data:['scrollTo' => false]) }}

            </div>
        </div>
            
    </div>
</section>


@endsection
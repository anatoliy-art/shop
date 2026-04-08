@props(['product'])

<div class="product-card">
    <div class="product-card-offer">
        @if($product->hit)
        <div class="offer-hit">Hit</div>
        @endif
        @if($product->new)
        <div class="offer-new">New</div>
        @endif
        @if($product->sale)
        <div class="offer-sale">Sale</div>
        @endif
    </div>
    <div class="product-thumb">
        <a href="{{ route('product.show', $product->id) }}"><img src="{{ $product->thumbnail ? asset('uploads/' . $product->thumbnail) : asset('no-image.jpg') }}" alt=""></a>
    </div>
    <div class="product-details">
        <h4>
            <a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a>
        </h4>
        <p class="product-excerpt">{{ $product->description }}</p>
        <div class="product-bottom-details d-flex justify-content-between">
            <div class="product-price">
                @if($product->old_price)
                    <small>${{ $product->old_price }}</small>
                    ${{ $product->price }}
                @else
                    ${{ $product->price }}
                @endif
            </div>
            <div class="product-links">
                <a href="{{ route('cart.add', $product) }}" class="btn btn-outline-secondary add-to-cart"><i
                        class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
    </div>
</div>

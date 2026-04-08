@props(['order'])

<div class="order-info mb-5">
    <h1>Name: {{ $order->name}}</h1>
    <h3>Summ: {{ $order->summ }} $ | Qty: {{ $order->qty }} шт.</h3>
</div>

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
            @foreach ($order->orderItems as $key => $product)
            <tr class="text-center">
                <td>{{ $loop->iteration }}</td>
                <td class="product-img-td">
                    <a href="{{ route('product.show', $key) }}">
                        <img src="{{ $product['thumbnail'] ? asset('uploads/' . $product['thumbnail']) : asset('no-image.jpg') }}" alt="" width="50">
                    </a>
                </td>
                <td>
                    <a href="{{ route('product.show', $key) }}" class="cart-content-title">{{ $product['title'] }}</a>
                </td>
                <td>$ {{ $product['price'] }}</td>
                <td>{{ $product['qty_item'] }}</td>
                <td>$ {{ $product['summ_item'] }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5" class="text-start">Total Summ:</th>
                <th class="text-end">$ {{ $order->summ }}</th>
            </tr>
            <tr>
                <th colspan="5" class="text-start">Total Qty:</th>
                <th class="text-end">шт {{ $order->qty }}</th>
            </tr>
        </tfoot>
    </table>
</div>

<hr>

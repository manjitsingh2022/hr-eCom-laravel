@extends('layout.app')

@section('content')
<div class="container" style="margin-bottom: 35px; background-color: #f8f8f8;">
    <div class="card" style="padding: 20px;">
        <div class="row">
            
            @forelse($products as $index => $product)
            @php
                $bgColors = ['#f2f2f2', '#e6e6e6', '#d9d9d9', '#cccccc'];
                $bgColor = $bgColors[$index % count($bgColors)];
            @endphp
            <div class="col-md-3">
                <div class="col-content"><div class="product-card" style="background-color: {{ $bgColor }}">
                    <img src="{{ asset('product/' . $product->image) }}" class="card-img product-image" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Price: &#8377; {{ $product->price }}</p>
                        <p class="card-text">Stock: {{ $product->stock }}</p>
                     
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div></div>
                
            </div>
            @empty
            <div class="col-md-12 text-center">
                <p class="card-text">No products available.</p>
            </div>
            @endforelse
        
        </div>
    </div>
</div>

@endsection

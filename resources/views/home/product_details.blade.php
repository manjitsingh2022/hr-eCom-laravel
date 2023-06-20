@extends('layout.app')
 <style>


</style>
 

@section('content')
<div class="container">
    <div class="card">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3">
                <img src="{{asset('product/' .  $product->image) }}" class="card-img " alt="Product Image">
                
                <div class="card-body">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">Price: ${{ $product->price }}</p>
                    <p class="card-text">Stock: {{ $product->stock }}</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>



@endsection

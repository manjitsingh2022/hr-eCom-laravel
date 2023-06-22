@extends('layout.app')

@section('content')

<div class="new-arrival">
    <div class="container">
     
      <div class="row">
        @forelse($products as $index => $product)
            @php
                $bgColors = ['#f2f2f2', '#e6e6e6', '#d9d9d9', '#cccccc'];
                $bgColor = $bgColors[$index % count($bgColors)];
            @endphp
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
            <div class="popular-img" >
                        
                <img src="{{ asset('product/' . $product->image) }}"alt="Product Image">

                <div class="favorit-items" style="display: grid;">
                    <form action="{{ route('wishlist.add', $product->id) }}" method="POST" >
                        @csrf
                        <input type="hidden" name="_method" value="POST"> 
                        <input name="product_id" type="hidden" value="{{ $product->id }}"> 
                        
                        <button type="submit" style=" border: none; background:none; cursor: pointer;" >
                            <img src="{{ asset('public/home/assets/img/gallery/favorit-card.png') }}" alt="Add to Wishlist" />
                        </button>
                        <div style=" align-items: center; gap: 3px; justify-content:flex-end; margin:2px;">
                            {{-- <label for="quantity" style="margin-right: 5px;">Quantity:</label> --}}
                            <input name="quantity" type="number" value="1" min="1" class="small-input">
                        </div>
                    </form>
                </div>
                
                

                
                
            </div>
            <div class="popular-caption">
                <h3>
                    <a href="{{ route('contact') }}">{{ $product->product_name }}</a>
                    <p>{{ $product->description }}</p>
                </h3>
              <div class="rating mb-10">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <span> Rs. {{$product->price}}</span>
            </div>
          </div>
        </div>
        @empty
            <div class="col-md-12 text-center">
                <p class="card-text">No products available.</p>
            </div>
        @endforelse
      </div>
      <!-- Button -->
      {{-- <div class="row justify-content-center">
        <div class="room-btn">
          <a href="catagori.html" class="border-btn">Browse More</a>
        </div>
      </div> --}}
    </div>
  </div>
@endsection


@section('style')
<style type="text/css">
.small-input {
    width: 40px;
    padding: 3px;
    background-color: #f1f1f1;
    border: 1px solid #ccc;
}

</style>

@endsection
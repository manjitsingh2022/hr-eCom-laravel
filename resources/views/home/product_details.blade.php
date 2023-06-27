@extends('layout.app')
@section('title')
Product Details
@endsection
@section('style')
<style>
    .wish {
      position: absolute;
      top: 20px;
      right: 20px;
      background-color: #fff;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
  
  
  
  
 
    .productimage {
    max-height: 350px;
  border-radius: 5px;
}
  </style>

@endsection
@section('content')

@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    {{ session()->get('message') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


  <div class="popular-items pt-50">
    <div class="container-fluid">
        <div class="row">
          @forelse($products as $index => $product)
            @php
            $bgColors = ['#f2f2f2', '#e6e6e6', '#d9d9d9', '#cccccc'];
            $bgColor = $bgColors[$index % count($bgColors)];
            @endphp


                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                        <div class="popular-img">
                            <img src="{{ asset('product/' . $product->image) }}" alt="" class="productimage">
                            <div class="img-cap">
                                <span>{{ $product->product_name }}</span>
                            </div>
                            <div class="favorit-items">
                                <a href="{{ route('contact') }}" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
  
                      <div style="box-shadow: none;">
                        <form action="{{ route('wishlist.add', $product->id) }}" method="POST">
                          @csrf
                          <input type="hidden" name="_method" value="POST"> 
                          <input name="product_id" type="hidden" value="{{ $product->id }}"> 
                          <button type="submit" style="border: none; cursor: pointer;" class="wish ">
                            <i class="fas fa-heart" style="color: {{ $product->selected ? 'red' : 'gray' }}"></i>
                          </button>
                        </form>
                      </div>
                </div>
                @empty
                <div class="col-md-12 text-center" style="padding-bottom: 200px; display: flex; justify-content: center; align-items: center;">
                  <p class="card-text">No products available.</p>
              </div>
              
            @endforelse
        </div>
    </div>
@endsection


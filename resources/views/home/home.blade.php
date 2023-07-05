@extends('layout.app')
@section('title')
The Beverly Hills Luxury Boutique
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

 



  .product_image {
  height: 400px;
  border-radius: 5px;
}



</style>
@endsection
@section('content')



  <div class="popular-items pt-50">
    <div class="container-fluid">
        <div class="row">
          @foreach ($products as $product)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div
                    class="single-popular-items mb-50 text-center wow fadeInUp"
                    data-wow-duration="1s"
                    data-wow-delay=".1s"
                >
                    <div class="popular-img">
                      <img src="{{ asset('product/' . $product->image) }}" alt="" class="product_image">
                        <div class="img-cap">
                          <span>{{$product->product_name}}</span>
                           
                        </div>
                        <div class="favorit-items">
                          <a href="{{ route('contact')}}" class="btn">Shop Now</a>
                        </div>
                    </div>
                </div>

                <div style="box-shadow: none;">
                  <form action="{{ route('wishlist.add', $product->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="POST"> 
                    <input name="product_id" type="hidden" value="{{ $product->id }}"> 
                    <button type="submit" style="border: none; cursor: pointer;" class="wish">
                      <i class="fas fa-heart" style="color: {{ in_array($product->id,$wishlist) ? 'red' : 'gray' }}"></i>
                    </button>
                  </form>
                </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
           
        
<!-- Pagination -->
<nav>
  <ul class="pagination mb-3 mt-3 d-flex justify-content-around  mr-3 ml-3">
    <li>
      @if ($products->onFirstPage())
        <span class="disabled btn btn-sm">&laquo; Previous</span>
      @else
        <a class="btn btn-sm " href="{{ $products->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
      @endif
    </li>

    <li class="d-flex justify-content-center">
      <ul class="pagination m-0">
        @for ($i = 1; $i <= $products->lastPage(); $i++)
          @if ($i == $products->currentPage() || $i == 1 || $i == 2)
            <li class="{{ $i == $products->currentPage() ? 'active' : '' }}">
              <a class="btn btn-sm mr-3" href="{{ $products->url($i) }}">{{ $i }}</a>
            </li>
          @endif
        @endfor
      </ul>
    </li>

    <li>
      @if ($products->hasMorePages())
        <a class="btn btn-sm " href="{{ $products->nextPageUrl() }}" rel="next">Next &raquo;</a>
      @else
        <span class="disabled btn btn-sm ">Next &raquo;</span>
      @endif
    </li>
  </ul>
</nav>










<!-- Collection -->
<section class="collection section-bg2 section-padding30 section-over1 ml-15 mr-15" data-background="{{ asset('public/home/assets/img/gallery/section_bg01.png') }}">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-xl-7 col-lg-9">
        <div class="single-question text-center">
          <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">collection houses our first-ever</h2>
          {{-- <a href="about.html" class="btn class=" wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">About Us</a> --}}
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Collection -->

<!-- Popular Locations Start -->
<div class="popular-product pt-50">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="single-product mb-50">
          <div class="location-img">
            <img src="{{ asset('public/home/assets/img/gallery/popular-imtes1.png') }}" alt="">
          </div>
          <div class="location-details">
            {{-- <p><a href="product_details.html">Established fact that by the<br> readable content</a></p> --}}
            {{-- <a href="product_details.html" class="btn">Read More</a> --}}
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="single-product mb-50">
          <div class="location-img">
            <img src="{{ asset('public/home/assets/img/gallery/popular-imtes2.png') }}" alt="">
          </div>
          <div class="location-details">
            {{-- <p><a href="product_details.html">Established fact that by the<br> readable content</a></p> --}}
            {{-- <a href="product_details.html" class="btn">Read More</a> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




@endsection

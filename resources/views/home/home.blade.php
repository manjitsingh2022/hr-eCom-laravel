@extends('layout.app')
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

  .wish i {
    color: #ff0000;
    font-size: 18px;
  }

  .productimage {
  width: 100%;
  max-height: 320px;
  width: auto;
  border: 1px solid #ddd;
  border-radius: 5px;
}
</style>

@section('content')
<main>
    <!--? Hero Area Start-->
    {{-- <div class="container-fluid">
      <div class="slider-area">
        <!-- Mobile Device Show Menu-->
        <div class="header-right2 d-flex align-items-center">
          <!-- Social -->
          <div class="header-social  d-block d-md-none">
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-pinterest-p"></i></a>
          </div>
          <!-- Search Box -->
          <div class="search d-block d-md-none">
            <ul class="d-flex align-items-center">
              <li class="mr-15">
                <div class="nav-search search-switch">
                  <i class="ti-search"></i>
                </div>
              </li>
              <li>
                <div class="card-stor">
                  <img src="{{asset('public/home/assets/img/gallery/card.svg')}}" alt="">
                  <span>0</span>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <!-- /End mobile  Menu-->
  
        <div class="slider-active dot-style">
          <!-- Single -->
          <div class="single-slider slider-bg1 hero-overly slider-height d-flex align-items-center">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-9">
                  <!-- Hero Caption -->
                  <div class="hero__caption">
                    <h1>fashion<br>changing<br>always</h1>
                    <a href="shop.html" class="btn">Shop Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Single -->
          <div class="single-slider slider-bg2 hero-overly slider-height d-flex align-items-center">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-9">
                  <!-- Hero Caption -->
                  <div class="hero__caption">
                    <h1>fashion<br>changing<br>always</h1>
                    <a href="shop.html" class="btn">Shop Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Single -->
          <div class="single-slider slider-bg3 hero-overly slider-height d-flex align-items-center">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-9">
                  <!-- Hero Caption -->
                  <div class="hero__caption">
                    <h1>fashion<br>changing<br>always</h1>
                    <a href="shop.html" class="btn">Shop Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    <!-- End Hero -->
  
    <!--? Popular Items Start -->
    <div class="popular-items pt-50">
      <div class="small-tittle mb-20 ml-20">
        {{-- <h2>Description</h2> --}}
      </div>
      <div class="container-fluid">
        <div class="row">
            @foreach ($products as $product)
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
              <div class="popular-img">
                <img src="{{asset('product/' . $product->image)}}"  alt="" class="productimage">
                <div class="img-cap">
                  <span>{{$product->product_name}}</span>
                </div>
                <div class="favorit-items">
                  <a href="{{route('contact')}}" class="btn">Shop Now</a>
                </div>
              </div>
            </div>
            <div class="wish">
              <i class="fas fa-heart"></i>
            </div>
          </div>
          @endforeach
         
        </div>
      </div>
    </div>
    <!-- Popular Items End -->
    <!--? New Arrival Start -->
    <div class="new-arrival">
      <div class="container">
        <!-- Section tittle -->
        <div class="row justify-content-center">
          <div class="col-xl-7 col-lg-8 col-md-10">
            <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
              <h2>new<br>arrival</h2>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach ($products as $product)
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
            <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
              <div class="popular-img">
                <img src="{{asset('product/' . $product->image)}}"  alt="" height="240px">
                <div class="favorit-items">
                  <!-- <span class="flaticon-heart"></span> -->
                  <img src="{{asset('public/home/assets/img/gallery/favorit-card.png')}}" alt="">
                </div>
              </div>
              <div class="popular-caption">
                <h3><a href="product_details.html">{{$product->product_name}}</a></h3>
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
          @endforeach
        </div>
        <!-- Button -->
        <div class="row justify-content-center">
          <div class="room-btn">
            <a href="catagori.html" class="border-btn">Browse More</a>
          </div>
        </div>
      </div>
    </div>
    <!--? New Arrival End -->
    <!--? collection -->
    <section class="collection section-bg2 section-padding30 section-over1 ml-15 mr-15"
      data-background="{{asset('public/home/assets/img/gallery/section_bg01.png')}}">
      <div class="container-fluid"></div>
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9">
          <div class="single-question text-center">
            <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">collection houses our first-ever</h2>
            <a href="about.html" class="btn class=" wow fadeInUp" data-wow-duration="2s" data-wow-delay=".4s">About Us</a>
          </div>
        </div>
      </div>
      </div>
    </section>
    <!-- End collection -->
    <!--? Popular Locations Start 01-->
    <div class="popular-product pt-50">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="single-product mb-50">
              <div class="location-img">
                <img src="{{asset('public/home/assets/img/gallery/popular-imtes1.png')}}" alt="">
              </div>
              <div class="location-details">
                <p><a href="product_details.html">Established fact that by the<br> readable content</a></p>
                <a href="product_details.html" class="btn">Read More</a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="single-product mb-50">
              <div class="location-img">
                <img src="{{asset('public/home/assets/img/gallery/popular-imtes2.png')}}" alt="">
              </div>
              <div class="location-details">
                <p><a href="product_details.html">Established fact that by the<br> readable content</a></p>
                <a href="product_details.html" class="btn">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Popular Locations End -->
    <!--? Services Area Start -->
    <div class="categories-area section-padding40 gray-bg">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
              <div class="cat-icon">
                <img src="{{asset('public/home/assets/img/icon/services1.svg')}}" alt="">
              </div>
              <div class="cat-cap">
                <h5>Fast & Free Delivery</h5>
                <p>Free delivery on all orders</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
              <div class="cat-icon">
                <img src="{{asset('public/home/assets/img/icon/services2.svg')}}" alt="">
              </div>
              <div class="cat-cap">
                <h5>Fast & Free Delivery</h5>
                <p>Free delivery on all orders</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-cat mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
              <div class="cat-icon">
                <img src="{{asset('public/home/assets/img/icon/services3.svg')}}" alt="">
              </div>
              <div class="cat-cap">
                <h5>Fast & Free Delivery</h5>
                <p>Free delivery on all orders</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-cat wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
              <div class="cat-icon">
                <img src="{{asset('public/home/assets/img/icon/services4.svg')}}" alt="">
              </div>
              <div class="cat-cap">
                <h5>Fast & Free Delivery</h5>
                <p>Free delivery on all orders</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--? Services Area End -->
  </main>
@endsection

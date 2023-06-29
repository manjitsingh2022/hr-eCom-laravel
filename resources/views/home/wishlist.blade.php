@extends('layout.app')
@section('title')
wishlist
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
  
  
    .wish.selected {
        color: red; 
}


 
.product_image {
  height: 400px;
  border-radius: 5px;
}
  </style>

@endsection

@section('content')
@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
    {{ session()->get('message') }}
</div>
@endif

@if (session()->has('errors'))
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <main>
        <!-- breadcrumb Start-->
        <div class="page-notification page-notification2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('wishlist') }}">Wish List</a></li> 
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb End-->
        <!-- Hero Area End-->
        <!-- Contact Area start  -->
        <div class="popular-items pt-50">
            <div class="container-fluid">
                <div class="row">
                  
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                                <div class="popular-img">
                                    <img src="{{ asset('product/' . $product->image) }}" alt="" class="product_image">
                                    <div class="img-cap">
                                        <span>{{ $product->product_name }}</span>
                                    </div>
                                    <div class="favorit-items">
                                        <a href="{{ route('contact') }}" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
          
                              <div style="box-shadow: none;">
                                <form action="{{ route('wishlist.remove', $product->id) }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="_method" value="POST"> 
                                  <input name="product_id" type="hidden" value="{{ $product->id }}"> 
                                  <button type="submit" style="border: none; cursor: pointer;" class="wish">
                                    <i class="fas fa-times" style="color: {{ in_array($product->id,$wishlist) ? 'red' : 'gray' }}"></i>
                                  </button>
                                </form>
                              </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Contact Area End -->
    </main>
@endsection



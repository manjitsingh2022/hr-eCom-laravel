@extends('layout.app')
@section('title')
Contact-Us
@endsection
@section('content')
        <!-- breadcrumb Start-->
        <div class="page-notification page-notification2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('contact') }}">Contact</a></li> 
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb End-->
        <!-- Hero Area End-->
        <!--?  Contact Area start  -->
        <section class="contact-section">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 ">
                  <h1>Shopping</h1>
                  <img src="https://source.unsplash.com/570x230/?shopping" alt="Contact Image" />
                </div>
                <div class="col-lg-6  mt-5">
                  <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                      <h3>The Beverly Hills</h3>
                      <p>Luxury Boutique.</p>
                    </div>
                  </div>
                  <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                      <h3>+1 253 565 2365</h3>
                      <p>Mon to Fri 9am to 6pm</p>
                    </div>
                  </div>
                  <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                      <h3>support@colorlib.com</h3>
                      <p>Send us your query anytime!</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          
          
          
        <!-- Contact Area End -->
   @endsection
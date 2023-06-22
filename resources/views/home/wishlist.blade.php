@extends('layout.app')
@section('content')
    <main>
        <!-- breadcrumb Start-->
        <div class="page-notification page-notification2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('wishlist') }}">Wish List</a></li> 
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
            {{ ($products)}}
            <div class="container">
                <h1>My Wishlist</h1>
                @foreach ($products as $wishlist)
                    <p>{{ $wishlist->product_name }}</p>
                    <!-- Add more fields or customize the display as needed -->
                @endforeach
                   
            </div>
        </section>
        <!-- Contact Area End -->
    </main>
   @endsection
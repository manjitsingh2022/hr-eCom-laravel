
 <!-- Preloader Start-->
 <header>
    <!-- Header Start -->
    <div class="header-area ">
        <div class="main-header header-sticky" >
            <div class="container-fluid" >
                <div class=" menu-wrapper d-flex align-items-center justify-content-around"  >

                    <div class="header-left d-flex align-items-center">

                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{route('home')}}"><h1>The Beverly Hills Luxury Boutique</h1></a>
                            {{-- <a href="{{route('home')}}"><img src="{{asset('home/assets/img/logo/logo.png')}}" alt=""></a> --}}
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu  d-none d-lg-block " >
                            
                            <nav>

                                <ul id="navigation">
                                    <li><a href="{{route('home')}}">Home</a></li> 
                                    {{-- <li><a href="shop.html">shop</a></li>
                                    <li><a href="about.html">About</a></li> --}}
                                    {{-- <li><a href="blog.html">Blog</a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog_details.html">Blog Details</a></li>
                                            <li><a href="elements.html">Elements</a></li>
                                            <li><a href="product_details.html">Product Details</a></li>
                                        </ul>
                                    </li> --}}
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                    <li><a href="{{route('logout')}}">Logout</a></li>
                                </ul>
                            </nav>
                        </div>   
                    </div>
                    {{-- <div class="header-right1 d-flex align-items-center">
                        <!-- Social -->
                        <div class="header-social d-none d-md-block">
                            
                        </div>

                    </div> --}}

                    
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none">
                            
                            
                        </div>
                    </div>
                    
                </div>
                <div class="menu-wrapper d-flex align-items-center justify-content-between">
                    <div class="header-left d-flex align-items-center">
                        <!-- Main-menu -->
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    @foreach(mainCategory() as $category)
                                        <li>
                                            <a href="{{ route('category.show', ['category' => $category->id]) }}">{{ $category->category_name }}</a>
                                            @if($category->subcategories->count() > 0)
                                            
                                                <ul class="submenu">
                                                    @foreach($category->subcategories as $subcategory)
                                                        <li>
                                                            <a href="{{ route('category.show', ['category' => $subcategory->id]) }}">{{ $subcategory->category_name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </nav>
                            
                            
                        </div>   
                    </div>
                </div>
               
            </div>
            
        </div>
        
        
    </div>
   
    <!-- Header End -->
</header>

<!-- header end -->



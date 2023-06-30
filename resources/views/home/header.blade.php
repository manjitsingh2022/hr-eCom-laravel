
 <!-- Preloader Start-->
 <header>
    <!-- Header Start -->
    <div class="header-area ">
        <div class="main-header header-sticky" >
            <div class="container-fluid" >
                <div class=" menu-wrapper d-flex align-items-center justify-content-around"  >

                    <div class="header-left d-flex align-items-center" style="justify-content: space-between;
                    flex: auto;">

                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{route('home')}}"><img src="{{asset('public/home/assets/img/logo/logo.png')}}" alt="" width="60px"></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu  d-none d-lg-block "  >
                            
                            <nav>

                                <ul id="navigation">
                                    <li><a href="{{route('home')}}">Home</a></li> 
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                    
                                    @if(session('user_id') != "" && session('user_type') != "")
                                    <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                                    <li><a href="#">Profile</a>
                                        <ul class="submenu">
                                            <li><a href="{{route('password.change')}}">Change Password</a></li>
                                            <li><a href="{{ route('logout') }}">Logout</a></li>
                                        </ul>
                                    </li>
                                    @else
                                   
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                       {{-- <li><a href="{{ route('logout') }}">Logout</a></li> --}}

                                    @endif


                                </ul>
                            </nav>
                        </div>   
                    </div>
                   

                    
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none">
                            
                            
                        </div>
                    </div>
                    
                </div>
                <div class="menu-wrapper d-flex align-items-center justify-content-between">
                    <div class="header-left d-flex align-items-center">
                        <!-- Main-menu -->
                        <div class="main-menu  d-none d-lg-block" style="margin-left: -7px">
                            <nav>
                                <ul id="navigation">
                                  
                                    @foreach(mainCategory() as $category)
                                        <li>
                                            <a href="{{ route('category.show', ['category' => $category->id, 'categoryname' => strtolower($category->category_name)]) }}">{{ $category->category_name }}</a>
                                            @if($category->subcategories->count() > 0)
                                                <ul class="submenu">
                                                    @foreach($category->subcategories as $subcategory)
                                                        @php
                                                            $subcategoryStatus = $subcategory->status;
                                                        @endphp
                                                        @if($subcategoryStatus == 1)
                                                            <li>
                                                                <a href="{{ route('category.show', ['category' => $subcategory->id, 'categoryname' => strtolower($subcategory->category_name)]) }}">{{ $subcategory->category_name }}</a>
                                                            </li>
                                                        @elseif($subcategoryStatus == 0)
                                                        @endif
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
<main>



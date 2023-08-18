<?php 
$settings = settings();
?>
 </main>
<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding">
        <div class="container-fluid ">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-8 col-sm-8">
                 <div class="single-footer-caption mb-50">
                   <div class="single-footer-caption mb-30">
                      <!-- logo -->
                      <div class="footer-logo mb-35">
                        {{-- <h1 style="color:white;">The beverly hills luxury boutique</h1> --}}
                       {{-- <a href="{{route('home')}}"><img src="{{asset('public/home/assets/img/logo/logo2_footer.png')}}" alt="" width="180px"></a> --}}
                       <a href="{{ route('home') }}" style="display: inline-block;">
                        <img src="{{ isset($settings['logo']) ? asset('public/logo/' . $settings['logo']) : asset('public/logo/logo.png') }}" alt="" width="180px" style="filter: invert(1);">
                    </a>
                                       </div>
                   <div class="footer-tittle">
                       <div class="footer-pera">
                          <p>{{ isset($settings['description']) ? $settings['description'] : 'description' }}</p>
                        </div>
                   </div>
                   <!-- social -->
                   {{-- <div class="footer-social">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                   </div> --}}
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
        <div class="single-footer-caption mb-50">
            <div class="footer-tittle">
                <h4>Shop Category</h4>
                {{-- <ul>
                    <li><a href="#">Kurta</a></li>
                    <li><a href="#">Suit</a></li>
                    <li><a href="#">Dresses</a></li>
                </ul> --}}
            
                @foreach(mainCategory() as $category)
                <div class="mb-4">
                    <ul>
                        <li>
                            <a href="{{ route('category.show', ['category' => $category->id, 'categoryname' => strtolower($category->category_name)]) }}">
                                {{ ucfirst(strtolower($category->category_name)) }}
                            </a> 
                        </li>
                    </ul>
                </div>
                                    {{-- @if($category->subcategories->count() > 0) --}}
                    
                        {{-- <ul class="submenu">
                            @foreach($category->subcategories as $subcategory)
                                <li>
                                    <a href="{{ route('category.show', ['category' => $subcategory->id]) }}">{{ $subcategory->category_name }}</a>
                                </li>
                            @endforeach
                        </ul> --}}
                    {{-- @endif --}}
            @endforeach



            </div>
        </div>
    </div>
   
   
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4">
        <div class="single-footer-caption mb-50">
            <div class="footer-tittle">
                <h4>Get in touch</h4>
                <ul>
                 
                 
                    <li><a style="text-decoration:none">{{ isset($settings['phone']) ? $settings['phone'] : 'phone' }}</a></li>
                    <li><a href="{{route('home')}}">{{ isset($settings['domain']) ? $settings['domain'] : 'domain' }}</a></li>
                    <li><a style="text-decoration:none" >{{ isset($settings['address']) ? $settings['address'] : 'address' }}</li>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- footer-bottom area -->
<div class="footer-bottom-area">
    <div class="container">
        <div class="footer-border">
           <div class="row d-flex align-items-center">
               <div class="col-xl-12 ">
                   <div class="footer-copy-right text-center">
                       <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Footer End-->
</footer>

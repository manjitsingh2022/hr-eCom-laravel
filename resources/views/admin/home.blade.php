<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    @yield('style')
   <style>
     .div_center {
        text-align: center;
        padding-top: 40px;
    }
   </style>

   
</head>
<body>
    <div class="container-scroller">
        <!-- sidebar -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            {{-- @include('admin.header') --}}
            <!-- partial -->
            <div class="main-panel">

                    <!-- partial:../../partials/_navbar.html -->
                    <nav class="navbar p-0 fixed-top d-flex flex-row">
                      <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo-mini" href="{{route('dashboard')}}"><img src="{{asset('public/admin/assets/images/logo-mini.svg')}}" alt="logo" /></a>
                      </div>
                      <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch" style="justify-content: right;">
                        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                          <span class="mdi mdi-menu"></span>
                        </button>
                        {{-- <ul class="navbar-nav w-100">
                          <li class="nav-item w-100">
                            <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                              <input type="text" class="form-control" placeholder="Search products">
                            </form>
                          </li>
                        </ul> --}}
                        <ul class="navbar-nav navbar-nav-right">
                       
                          <li class="nav-item dropdown d-none d-lg-block create-new-button" >
                            <a class="nav-link" href="{{route('home')}}">
                                    <button type="button" class="btn btn-success btn-rounded btn-fw">View</button>
                            </a>
                          </li>

                          <li class="nav-item dropdown d-none d-lg-block create-new-button" >
                            <a class="nav-link" href="{{route('logout')}}">
                                    <button type="button" class="btn btn-warning btn-rounded btn-fw">Logout</button>
                            </a>
                          </li>
                        
                          <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                              <div class="navbar-profile">
                                <img class="img-xs rounded-circle" src="{{asset('public/admin/assets/images/faces/face15.jpg')}}" alt="">
                                <p class="mb-0 d-none d-sm-block navbar-profile-name">
                                    @auth
                                    {{ Auth::user()->name}}
                                     @endauth
                                  </p>
                                <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                              </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                              {{-- <h6 class="p-3 mb-0 text-aligne-center">Profile</h6> --}}
                              <div class="dropdown-divider"></div>
                              {{-- <a class="dropdown-item preview-item" href="{{route('password.change')}}">
                                <div class="preview-thumbnail">
                                  <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-success"></i>
                                  </div>
                                </div>
                                <div class="preview-item-content">
                                  <p class="preview-subject mb-1">Change password</p>
                                </div>
                              </a> --}}


                              <a class="dropdown-item preview-item" href="{{ route('password.change') }}" data-toggle="modal" data-target="#changePasswordModal">
                                <div class="preview-thumbnail">
                                  <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-success"></i>
                                  </div>
                                </div>
                                <div class="preview-item-content">
                                  <p class="preview-subject mb-1">Change password</p>
                                </div>
                              </a>
                              {{-- <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item" href="{{ route('logout') }}">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Log out</p>
                                    </div>
                                </a> --}}
                                
                              <div class="dropdown-divider"></div>
                             
                            </div>
                          </li>
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                          <span class="mdi mdi-format-line-spacing"></span>
                        </button>
                      </div>
                    </nav>

                    @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                
                @if (session()->has('errors'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="modal" id="changePasswordModal">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Change Password</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ route('password.change.submit') }}" method="POST" class="d-flex flex-column">
                              @csrf
                            
                              <div class="form-group">
                                <label for="current_password">Current Password:</label>
                                <input type="password" id="current_password" name="current_password" class="form-control" required autocomplete="current-password">
                                @error('current_password')
                                  <span class="error">{{ $message }}</span>
                                @enderror
                              </div>
                            
                              <div class="form-group">
                                <label for="new_password">New Password:</label>
                                <input type="password" id="new_password" name="new_password" class="form-control" required autocomplete="new-password">
                                @error('new_password')
                                  <span class="error">{{ $message }}</span>
                                @enderror
                              </div>
                            
                              <div class="form-group">
                                <label for="new_password_confirmation">Confirm New Password:</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required autocomplete="new-password">
                                @error('new_password_confirmation')
                                  <span class="error">{{ $message }}</span>
                                @enderror
                              </div>
                            
                              <button type="submit" class="btn btn-primary">Change Password</button>
                            
                              <p class="sign-up text-center mt-4">
                                Want to go back? 
                                @if(session('user_type') == 1)
                                <a href="{{ route('dashboard') }}">Admin</a>
                              @else
                                <a href="{{ route('home') }}">Home</a>
                              @endif
                              
                              </p>
                            </form>
                            
                          </div>
                        </div>
                      </div>
                    </div>

                <div class="content-wrapper">
                        @yield('content')
                </div>
                <!-- partial:partials/_footer.html -->
                {{-- <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
                    </div>
                </footer> --}}
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>
</html>

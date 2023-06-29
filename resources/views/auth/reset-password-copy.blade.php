<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>The Beverly Hills Luxury Boutique</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/style.css')}}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('public/admin/assets/images/favicon.ico')}}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-center mb-3">Change Password</h3>
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
                        
                        
                    
                       
                            <form action="{{ route('password.change.submit') }}" method="POST" class="d-flex flex-column">
                                @csrf
                            
                                <div class="form-group">
                                    <label for="current_password">Current Password:</label>
                                    <input type="password" id="current_password" name="current_password" class="form-control" required>
                                    @error('current_password')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            
                                <div class="form-group">
                                    <label for="new_password">New Password:</label>
                                    <input type="password" id="new_password" name="new_password" class="form-control" required>
                                    @error('new_password')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            
                                <div class="form-group">
                                    <label for="new_password_confirmation">Confirm New Password:</label>
                                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
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
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- JavaScript -->
    <script src="{{asset('public/admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/misc.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/settings.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/todolist.js')}}"></script>
</body>

</html>

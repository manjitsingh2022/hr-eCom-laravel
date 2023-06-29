<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>The Beverly Hills Luxury Boutique</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('public/admin/assets/images/favicon.ico')}}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5 ">
                            <h3 class="card-title text-center mb-3">Forgot Password</h3>
                            @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                       <!-- auth/forgot.blade.php -->
  

                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" class="form-control p_input"  name="email" required>
                        </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block enter-btn">Send Reset Link</button>
                            </div>
                            <p class="sign-up text-center">Already have an Account? <a href="{{ route('login') }}">Sign In</a></p>
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
    <!-- plugins:js -->
    <script src="{{asset('public/admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('public/admin/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/misc.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/settings.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/todolist.js')}}"></script>
    <!-- endinject -->
</body>

</html>
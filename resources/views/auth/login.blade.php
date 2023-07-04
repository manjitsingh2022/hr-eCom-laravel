<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <link rel="shortcut icon" href="{{asset('public/admin/assets/images/favicon.png')}}" />
    <style>
         .custom-close-btn {
        background-color: #ffffff;
        border: none;
        color: #000000;
        font-size: 16px;
        font-weight: bold;
    }

    .custom-close-btn:hover {
        background-color: #e6e6e6;
    }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title  mb-3 text-left">Login</h3>
                @if (session('verified') === false)
    <div class="alert alert-danger" role="alert">
        Your email is not verified. Please check your email for the verification link or request a new one.
    </div>
@endif


@if (session()->has('errors'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
        {{ session()->get('errors') }}
    </div>
@endif


                <form action="{{route('loginpost')}}" method="get">
                    @csrf
                  <div class="form-group">
                    <label>Username or email *</label>
                    <input type="email" class="form-control p_input" name="email" required>
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" class="form-control p_input" name="password" required>
                  </div>
                  
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="{{route('password.request')}}" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  {{-- <div class="d-flex">
                    <button class="btn btn-facebook mr-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div> --}}
                  <p class="sign-up">Don't have an Account?<a href="{{route('register')}}"> Sign Up</a></p>
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
    <script>
      $(document).ready(function() {
          // Close alert when the close button is clicked
          $('.alert .btn-close').on('click', function() {
              $(this).closest('.alert').alert('close');
          });
      });
  </script>
    <!-- endinject -->
  </body>
</html>
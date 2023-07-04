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
    <link rel="shortcut icon" href="{{asset('public/admin/assets/images/favicon.png')}}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-center mb-3">Change Password</h3>
                       
                    
                        <!-- auth/reset-password.blade.php -->
                        <form action="{{ route('password.update') }}" method="POST" class="d-flex flex-column">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                            <label for="email">Email:</label>
                            <input class="form-control" type="email" id="email" name="email" required>
                           
                            @error('email')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                            <div class="form-group">
                            <label for="password">New Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            @error('password')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                            <div class="form-group">
                            <label for="password_confirmation">Confirm Password:</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            @error('password_confirmation')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                            <button class="btn btn-primary text-center" type="submit">Reset Password</button>
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

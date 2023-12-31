
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="  {{asset('public/admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="  {{asset('public/admin/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="  {{asset('public/admin/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="  {{asset('public/admin/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="  {{asset('public/admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="  {{asset('public/admin/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="  {{asset('public/admin/assets/js/off-canvas.js')}}"></script>
    <script src="  {{asset('public/admin/assets/js/hoverable-collapse.js')}}"></script>
    <script src="  {{asset('public/admin/assets/js/misc.js')}}"></script>
    <script src="  {{asset('public/admin/assets/js/settings.js')}}"></script>
    <script src="  {{asset('public/admin/assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="  {{asset('public/admin/assets/js/dashboard.js')}}"></script>
    
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            // Close alert when the close button is clicked
            $('.alert .btn-close').on('click', function() {
                $(this).closest('.alert').alert('close');
            });
        });
    </script>
    
    <!-- Custom  js to script content -->
    @yield('scriptcontent')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    @if(session('loginId'))
    <?php
        $user = \App\Models\User::find(session('loginId'));
    ?>
    <title>{{$user->level . ' - DELICIOUS'}}</title>
    @endif
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('/be/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('/be/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('/be/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('/be/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('/be/css/style.css')}}" rel="stylesheet">

    <!-- Sweet Alert -->
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css">

    <script>
        function angka(e){
            let keyCode = e.keyCode ? e.keyCode : e.which
            if(!((keyCode > 47 && keyCode < 58) || (keyCode = 8) || (keyCode = 190) || (keyCode = 188))){
                event.preventDefault()
            }
            // alert(keyCode)
        }
    </script>
    <style>
        .cur-pointer{
            cursor: pointer;
        }
    </style>
</head>

<body id="body">
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        @yield('sidebar')
        <!-- Content Start -->
        <div class="content">
            @yield('navbar')
            @yield('content')
            @yield('footer')


        </div>

        <!-- Content End -->
<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/be/lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('/be/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('/be/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('/be/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/be/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('/be/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('/be/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('/be/js/main.js')}}"></script>

    <!-- Tooltip -->
     <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [ ... tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
     </script>
</body>

</html>
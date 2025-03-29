<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DELICIOUS - Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('/be/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('/be/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/be/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/be/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('/be/css/style.css') }}" rel="stylesheet">

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Show validation errors -->
        <!-- @if ($errors->has('email'))
            <div style="color: red;">
                <p>{{ $errors->first('email') }}</p>
            </div>
        @endif

        @if ($errors->has('password'))
            <div style="color: red;">
                <p>{{ $errors->first('password') }}</p>
            </div>
        @endif -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="/" class="">
                                <h3 class="text-primary"><i class="fa fa-utensils me-2"></i>DELICIOUS</h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
                        <form action="{{ route('login-user') }}" method="POST">
                        @csrf 
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" value="{{ old('email') }}" placeholder="name@example.com" name="email" required>
                            <label for="floatingInput">Email address</label>
                        </div>
                        @error('email')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                            <label for="floatingPassword">Password</label>
                        </div>
                        @error('password')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="signup">Forgot Password</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        <p class="text-center mb-0">Don't have an Account? <a href="/signup">Sign Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- SweetAlert2 Script for Login Failure (Only if specific error message is present) -->
    @if ($errors->has('login') && $errors->first('login') == 'The provided credentials do not match our records.')
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'The provided credentials do not match our records.'
            });
        </script>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/be/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('/be/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('/be/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('/be/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/be/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('/be/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('/be/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('/be/js/main.js') }}"></script>
</body>

</html>
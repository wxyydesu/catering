<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DELICIOUS - Sign Up</title>
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


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="/" class="">
                                <h3 class="text-primary"><i class="fa fa-utensils me-2"></i>DELICIOUS</h3>
                            </a>
                            <h3>Sign Up</h3>
                        </div>
                        <!-- Form Start -->
                        <form action="{{ route('register-user') }}" method="POST">
                            @if(Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if(Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingText" name="nama" placeholder="Your Name" value="{{ old('nama') }}">
                                <label for="floatingText">Username</label>
                                <span class="text-danger">@error('nama') {{ $message }} @enderror</span>
                                <!-- @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror -->
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" value="{{ old('email') }}">
                                <label for="floatingInput">Email address</label>
                                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                                <!-- @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror -->
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                                <!-- @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror -->
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingConfirmPassword" name="password_confirmation" placeholder="Confirm Password">
                                <label for="floatingConfirmPassword">Confirm Password</label>
                            </div>
                            <div class="mb-3">
                                <label for="level" class="form-label">Role</label>
                                <select name="level" id="level" class="form-control" required>
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="owner">Owner</option>
                                    <option value="kurir">Kurir</option>
                                </select>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <a href="">Forgot Password</a>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                        </form>
                        <!-- Display Validation Errors -->
                        <!-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif -->
                        <!-- Form End -->

                        <p class="text-center mb-0">Already have an Account? <a href="/login">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

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
<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="
                    @if (str_contains($title, 'Admin'))
                        {{route('admin.index')}}
                    @elseif (str_contains($title, 'Kurir'))
                        {{route('kurir.index')}}
                    @elseif (str_contains($title, 'Owner'))
                        {{route('owner.index')}}
                    @else
                        {{route('home')}}
                    @endif
                " class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-utensils me-2"></i>DELICIOUS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('/be/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                    @if(session('loginId'))
                        <?php
                            // Ambil data pengguna berdasarkan ID yang ada di session
                            $user = \App\Models\User::find(session('loginId'));
                        ?>
                        <h6 class="mb-0">{{$user->nama}}</h6>
                        <span>{{$user->level}}</span>
                    @endif
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="
                     @if (str_contains($title, 'Admin'))
                        {{route('admin.index')}}
                    @elseif (str_contains($title, 'Kurir'))
                        {{route('kurir.index')}}
                    @elseif (str_contains($title, 'Owner'))
                        {{route('owner.index')}}
                    @else
                        {{route('home')}}
                    @endif" class="nav-item nav-link @if (!isset($menu)) active @endif"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <!-- <a href="/{{strtolower($title)}}" class="nav-item nav-link @if(!@isset($menu)) active @endif"><i class="fa fa-home me-2"></i>Dashboard</a> -->
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div> -->
                    <!-- <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Payment Method</a> -->
                    @if (str_contains($title, 'Admin'))
                        <a href="{{route('paket.index')}}" class="nav-item nav-link @if(@isset($menu) and $menu == 'Food Package') active @endif"><i class="fa fa-box-open me-2"></i>Food Package</a>
                        <a href="order" class="nav-item nav-link @if(@isset($menu) and $menu == 'Order') active @endif"><i class="fa fa-cart-arrow-down me-2"></i>Order</a>
                        <a href="payment_method" class="nav-item nav-link @if(@isset($menu) and $menu == 'Payment Method') active @endif"><i class="fa fa-credit-card me-2"></i>Payment Method</a>
                    @elseif(str_contains($title, 'Kurir'))
                        <a href="payment_method" class="nav-item nav-link"><i class="fas fa-shipping-fast me-2"></i>Shipping</a>

                    @else
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-chart-bar me-2"></i>Reports</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="r-order" class="dropdown-item"><i class="fas fa-shopping-cart me-2"></i>Orders</a>
                            <a href="r-shipping" class="dropdown-item"><i class="fa fa-shipping-fast me-2"></i>Shipping</a>
                        </div>
                    </div>
                    @endif 
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div> -->
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

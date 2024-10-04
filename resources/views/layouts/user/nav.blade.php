<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            <div>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none"
                    href="mailto:info@company.com">info@company.com</a>
                <i class="fa fa-phone mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
            </div>
            <div>
                <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i
                        class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.instagram.com/" target="_blank"><i
                        class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://twitter.com/" target="_blank"><i
                        class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i
                        class="fab fa-linkedin fa-sm fa-fw"></i></a>
            </div>
        </div>
    </div>
</nav>

<!-- Main Navbar -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">Zay</a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between"
            id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal"
                    data-bs-target="#templatemo_search">
                    <i class="fa fa-fw fa-search text-dark mr-2"></i>
                </a>
                <a class="nav-icon position-relative text-decoration-none" href="{{ route('cart.show') }}">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                        {{ $cartItemCount ?? 0 }}
                    </span>
                </a>
                

                {{-- Cách 1 login  --}}
                <!-- User Dropdown -->
                {{-- <div class="nav-item dropdown">
                    < a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-fw fa-user text-dark"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown" style="float: right">
                        @if (Route::has('login'))
                            @auth
                                <!-- Logged-in state: display username and logout option -->
                                <li><a class="dropdown-item">Xin chào, {{ Auth::user()->name_user }}</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                                        @csrf
                                        <button type="submit" class="btn btn-link">Đăng xuất</button>
                                    </form>
                                </li>
                            @else
                                <!-- Not logged-in: display login and register links -->
                                <li><a href="{{ route('login') }}" class="dropdown-item">Login</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}" class="dropdown-item">Register</a></li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div> --}}

                {{-- Cách 2  --}}
                <div class="navbar-nav nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-fw fa-user text-dark"></i>
                        {{-- Nếu có ảnh thì dùng  --}}
                        {{-- <div class="avatar-sm">
                            @auth
                                <!-- Nếu đã đăng nhập, hiển thị avatar -->
                                <img src="{{ asset('path_to_avatar/' . Auth::user()->image) }}" alt="Profile Picture" class="avatar-img rounded-circle" />
                            @else
                                <!-- Nếu chưa đăng nhập, hiển thị icon user -->
                                <i class="fa fa-fw fa-user text-dark"></i>
                            @endauth
                        </div> --}}
                        @auth
                            <!-- Hiển thị tên khi đã đăng nhập -->
                            <span class="profile-username">
                                <span class="op-7">Hi,</span>
                                <span class="fw-bold">{{ Auth::user()->name_user }}</span>
                            </span>
                        @endauth
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-user animated fadeIn"
                        aria-labelledby="userDropdown" style="float: right;">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            @if (Route::has('login'))
                                @auth
                                    <!-- Hiển thị thông tin khi đã đăng nhập -->
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg">
                                                <img src="{{ asset('path_to_avatar/' . Auth::user()->avatar) }}"
                                                    alt="Profile Picture" class="avatar-img rounded" />
                                            </div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->name_user }}</h4>
                                                <p style="font-size: 12px;">{{ Auth::user()->email }}</p>
                                                <a href="" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="">My Profile</a>
                                        <a class="dropdown-item" href="">Account Setting</a>

                                        @if (Auth::user()->role_id == \App\Models\User::ADMIN_TYPE || Auth::user()->role_id == \App\Models\User::STAFF_TYPE)
                                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Login Admin</a>
                                        @endif
                                        <div class="dropdown-divider"></div>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                @else
                                    <!-- Hiển thị tùy chọn đăng nhập/đăng ký khi chưa đăng nhập -->
                                    <li><a href="{{ route('login') }}" class="dropdown-item">Login</a></li>
                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}" class="dropdown-item">Register</a></li>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Include Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<style>
    /* Dropdown container */
    .nav-item.dropdown {
        position: relative;
    }

    .nav-item .nav-link {
        display: flex;
        align-items: center;
        padding: 8px;
        color: #333;
        border-radius: 3px;
        transition: background-color 0.3s ease;
    }

    .nav-item .nav-link:hover,
    .nav-item .nav-link:focus {
        background-color: rgba(77, 89, 149, 0.06);
        text-decoration: none;
    }

    .nav-item .fa-user {
        margin-right: 8px;
        font-size: 14px;
        /* Adjusted size of user icon */
    }

    /* Username styling */
    .profile-username {
        display: inline-block;
        margin-left: 8px;
        font-size: 12px;
        /* Reduced font size */
        color: #333;
    }

    .profile-username .fw-bold {
        font-weight: bold;
    }

    /* Dropdown menu */
    .dropdown-menu {
        min-width: 180px;
        /* Adjusted width */
        padding: 0;
        border-radius: 4px;
        border: 1px solid #ddd;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.3s ease;
    }

    /* User box inside dropdown */
    .user-box {
        padding: 10px;
        display: flex;
        align-items: center;
    }

    .avatar-lg {
        width: 40px;
        /* Reduced avatar size */
        height: 40px;
        margin-right: 10px;
    }

    .avatar-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .u-text h4 {
        margin: 0;
        font-size: 14px;
        /* Reduced font size for username */
        font-weight: bold;
        color: #333;
    }

    .u-text p {
        margin: 2px 0;
        font-size: 14px !important;
        /* Forcefully apply the font size */
        color: #888;
    }


    .u-text .btn {
        margin-top: 5px;
        font-size: 11px;
        /* Reduced font size for button */
        padding: 5px 10px;
    }

    /* Divider styling */
    .dropdown-divider {
        height: 1px;
        margin: 0;
        background-color: #ddd;
    }

    /* Scrollable dropdown */
    .dropdown-user-scroll {
        max-height: 250px;
        overflow-y: auto;
    }

    .scrollbar-outer {
        scrollbar-width: thin;
    }

    /* Custom scrollbar */
    .scrollbar-outer::-webkit-scrollbar {
        width: 5px;
    }

    .scrollbar-outer::-webkit-scrollbar-thumb {
        background-color: #ccc;
        border-radius: 10px;
    }

    .scrollbar-outer::-webkit-scrollbar-track {
        background-color: #f1f1f1;
    }

    /* Hover effects for dropdown items */
    .dropdown-item:hover {
        background-color: rgba(77, 89, 149, 0.1);
    }

    /* Animation for dropdown */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

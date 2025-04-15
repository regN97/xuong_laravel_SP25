<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="top-header">
                    <a href="/" class="cr-logo">
                        <img src="{{ asset('client/assets/img/logo/logo.png') }}" alt="logo" class="logo">
                        <img src="{{ asset('client/assets/img/logo/dark-logo.png') }}" alt="logo" class="dark-logo">
                    </a>
                    <form class="cr-search">
                        <input class="search-input" type="text" placeholder="Search For items...">
                        <a href="javascript:void(0)" class="search-btn">
                            <i class="ri-search-line"></i>
                        </a>
                    </form>
                    <div class="cr-right-bar">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle cr-right-bar-item" href="javascript:void(0)">
                                    <i class="ri-user-3-line"></i>
                                    <span>@if (Auth::check())
                                        {{ Auth::user()->name }}
                                    @else
                                        Account
                                    @endif</span>
                                </a>
                                @if (Auth::check())
                                    <ul class="dropdown-menu">
                                        @if (Auth::user()->role_id == 1)
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                            </li>
                                        @endif
                                        <li>
                                            <a class="dropdown-item" href="#">Profile</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">Orders</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                        </li>
                                    </ul>
                                @else
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                        </li>
                                    </ul>
                                    
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cr-fix" id="cr-main-menu-desk">
        <div class="container">
            <div class="cr-menu-list">
                <nav class="navbar navbar-expand-lg">
                    <a href="javascript:void(0)" class="navbar-toggler shadow-none">
                        <i class="ri-menu-3-line"></i>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                    Category
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="shop-left-sidebar.html">Shop Left
                                            sidebar</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="shop-right-sidebar.html">Shop
                                            Right
                                            sidebar</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="shop-full-width.html">Full
                                            Width</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                    Products
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="product-left-sidebar.html">product
                                            Left
                                            sidebar </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="product-right-sidebar.html">product
                                            Right
                                            sidebar </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="product-full-width.html">Product
                                            Full
                                            Width
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                    Pages
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="about.html">About Us</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="contact-us.html">Contact Us</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="cart.html">Cart</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="track-order.html">Track Order</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="wishlist.html">Wishlist</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="faq.html">Faq</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="login.html">Login</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="register.html">Register</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="policy.html">Policy</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                    Blog
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="blog-left-sidebar.html">Left
                                            Sidebar</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="blog-right-sidebar.html">Right
                                            Sidebar</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="blog-full-width.html">Full
                                            Width</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="blog-detail-left-sidebar.html">Detail
                                            Left
                                            Sidebar</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="blog-detail-right-sidebar.html">Detail
                                            Right
                                            Sidebar</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="blog-detail-full-width.html">Detail
                                            Full
                                            Width</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                    Elements
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="elements-products.html">Products</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="elements-typography.html">Typography</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="elements-buttons.html">Buttons</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="cr-calling">
                    <i class="ri-phone-line"></i>
                    <a href="javascript:void(0)">039 518 3309</a>
                </div>
            </div>
        </div>
    </div>
</header>

@extends('client.layouts.main')

@section('content')
    @include('client.layouts.partials.slider')

    <!-- Popular product -->
    <section class="section-popular-product-shape padding-b-100">
        <div class="container" data-aos="fade-up" data-aos-duration="2000">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-30">
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="cr-banner">
                            <h2>All Products</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Chúc bạn mua sắm vui vẻ</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-content row mb-minus-24" id="MixItUpDA2FB7">
                <div class="col-xl-3 col-lg-4 col-12 mb-24">
                    <div class="row mb-minus-24 sticky">
                        <div class="col-lg-12 col-sm-6 col-6 cr-product-box mb-24">
                            <div class="cr-product-tabs">
                                <ul>
                                    <li class="active" data-filter="all">All</li>
                                    @foreach ($categories as $category)
                                        <li
                                            data-filter="@if (in_array($category->name, $listCategory)) {{ '.' . strtolower($category->name) }} @endif">
                                            {{ $category->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-6 col-6 cr-product-box banner-480 mb-24">
                            <div class="cr-ice-cubes">
                                <img src="{{ asset('client/assets/img/product/product-banner.jpg') }}" alt="product banner">
                                <div class="cr-ice-cubes-contain">
                                    <h4 class="title">Juicy </h4>
                                    <h5 class="sub-title">Fruits</h5>
                                    <span>100% Natural</span>
                                    <a href="shop-left-sidebar.html" class="cr-button">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-12 mb-24">
                    <div class="row mb-minus-24">
                        @foreach ($products as $product)
                            <div
                                class="mix @if (in_array($product->category->name, $listCategory)) {{ strtolower($product->category->name) }} @endif col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                                <div class="cr-product-card">
                                    <div class="cr-product-image">
                                        <div class="cr-image-inner zoom-image-hover">
                                            <img src="@if ($product->uploadFile) {{ $product->uploadFile->file_path }} @endif"
                                                alt="product-1" height="200">
                                        </div>
                                        <div class="cr-side-view">
                                            <a href="{{ route('product.show', $product->id) }}" role="button">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="cr-product-details">
                                        <div class="cr-brand">
                                            <a href="shop-left-sidebar.html">{{ $product->category->name }}</a>
                                        </div>
                                        <a href="{{ route('product.show', $product->id) }}"
                                            class="title">{{ $product->name }}</a>
                                        <p class="cr-price"><span class="new-price">${{ $product->discount }}</span>
                                            <span class="old-price">${{ $product->price }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product banner -->
    <section class="section-product-banner padding-b-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-banner-slider swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-product-banner-image">
                                    <img src="{{ asset('client/assets/img/product-banner/1.jpg') }}" alt="product-banner">
                                    <div class="cr-product-banner-contain">
                                        <h5>Healthy <br> Bakery Products</h5>
                                        <p><span class="percent">30%</span> Off <span class="text">on first
                                                order</span>
                                        </p>
                                        <div class="cr-product-banner-buttons">
                                            <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-product-banner-image">
                                    <img src="{{ asset('client/assets/img/product-banner/2.jpg') }}" alt="product-banner">
                                    <div class="cr-product-banner-contain">
                                        <h5>Fresh <br>Snacks & Sweets</h5>
                                        <p><span class="percent">20%</span> Off <span class="text">on first
                                                order</span>
                                        </p>
                                        <div class="cr-product-banner-buttons">
                                            <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-product-banner-image">
                                    <img src="{{ asset('client/assets/img/product-banner/3.jpg') }}" alt="product-banner">
                                    <div class="cr-product-banner-contain">
                                        <h5>Fresh & healthy <br> Organic Fruits</h5>
                                        <p><span class="percent">35%</span> Off <span class="text">on first
                                                order</span>
                                        </p>
                                        <div class="cr-product-banner-buttons">
                                            <a href="shop-left-sidebar.html" class="cr-button">shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="section-services padding-b-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-services-border" data-aos="fade-up" data-aos-duration="2000">
                        <div class="cr-service-slider swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="cr-services">
                                        <div class="cr-services-image">
                                            <i class="ri-red-packet-line"></i>
                                        </div>
                                        <div class="cr-services-contain">
                                            <h4>Product Packing</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="cr-services">
                                        <div class="cr-services-image">
                                            <i class="ri-customer-service-2-line"></i>
                                        </div>
                                        <div class="cr-services-contain">
                                            <h4>24X7 Support</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="cr-services">
                                        <div class="cr-services-image">
                                            <i class="ri-truck-line"></i>
                                        </div>
                                        <div class="cr-services-contain">
                                            <h4>Delivery in 5 Days</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="cr-services">
                                        <div class="cr-services-image">
                                            <i class="ri-money-dollar-box-line"></i>
                                        </div>
                                        <div class="cr-services-contain">
                                            <h4>Payment Secure</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Deal -->
    <section class="section-deal padding-b-100">
        <div class="bg-banner-deal">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cr-deal-rightside">
                            <div class="cr-deal-content" data-aos="fade-up" data-aos-duration="2000">
                                <span><code>35%</code> OFF</span>
                                <h4 class="cr-deal-title">Great deal on organic food.</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do maecenas accumsan
                                    lacus
                                    vel facilisis. </p>
                                <div id="timer" class="cr-counter">
                                    <div class="cr-counter-inner">
                                        <h4>
                                            <span id="days"></span>
                                            Days
                                        </h4>
                                        <h4>
                                            <span id="hours"></span>
                                            Hrs
                                        </h4>
                                        <h4>
                                            <span id="minutes"></span>
                                            Min
                                        </h4>
                                        <h4>
                                            <span id="seconds"></span>
                                            Sec
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular product -->
    <section class="section-popular margin-b-100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-7 col-xl-6 col-lg-6 col-md-12" data-aos="fade-up" data-aos-duration="2000">
                    <div class="cr-twocolumns-product">
                        <div class="slick-slide">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="{{ asset('client/assets/img/product/9.jpg') }}" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Snacks</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                            <p>(4.5)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Best snakes with hazel nut
                                        mix pack 200gm</a>
                                    <p class="cr-price"><span class="new-price">$120.25</span> <span
                                            class="old-price">$123.25</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="{{ asset('client/assets/img/product/10.jpg') }}" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Snacks</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Sweet snakes crunchy nut
                                        mix 250gm
                                        pack</a>
                                    <p class="cr-price"><span class="new-price">$100.00</span> <span
                                            class="old-price">$110.00</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="{{ asset('client/assets/img/product/1.jpg') }}" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Snacks</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                            <p>(4.5)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Best snakes with hazel nut
                                        mix pack 200gm</a>
                                    <p class="cr-price"><span class="new-price">$120.25</span> <span
                                            class="old-price">$123.25</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="{{ asset('client/assets/img/product/2.jpg') }}" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Snacks</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Sweet snakes crunchy nut
                                        mix 250gm
                                        pack</a>
                                    <p class="cr-price"><span class="new-price">$100.00</span> <span
                                            class="old-price">$110.00</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="{{ asset('client/assets/img/product/3.jpg') }}" alt="product-1">
                                    </div>
                                    <div class="cr-side-view">
                                        <a href="javascript:void(0)" class="wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                        <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                            role="button">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </div>
                                    <a class="cr-shopping-bag" href="javascript:void(0)">
                                        <i class="ri-shopping-bag-line"></i>
                                    </a>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Snacks</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <p>(5.0)</p>
                                        </div>
                                    </div>
                                    <a href="product-left-sidebar.html" class="title">Sweet snakes crunchy nut
                                        mix 250gm
                                        pack</a>
                                    <p class="cr-price"><span class="new-price">$100.00</span> <span
                                            class="old-price">$110.00</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-12" data-aos="fade-up" data-aos-duration="2000">
                    <div class="cr-products-rightbar">
                        <img src="{{ asset('client/assets/img/product/products-rightview.jpg') }}"
                            alt="products-rightview">
                        <div class="cr-products-rightbar-content">
                            <h4>Organic & Healthy <br> Vegetables</h4>
                            <div class="cr-off">
                                <span>25% <code>OFF</code></span>
                            </div>
                            <div class="rightbar-buttons">
                                <a href="shop-left-sidebar.html" class="cr-button">
                                    shop now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial -->
    <section class="section-testimonial padding-b-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000">
                        <div class="cr-banner">
                            <h2>Great Words From People</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-testimonial-slider swiper-container">
                        <div class="swiper-wrapper cr-testimonial-pt-50">
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-testimonial">
                                    <div class="cr-testimonial-image">
                                        <img src="{{ asset('client/assets/img/testimonial/1.jpg') }}" alt="businessman">
                                    </div>
                                    <div class="cr-testimonial-inner">
                                        <span>Co Founder</span>
                                        <h4 class="title">Stephen Smith</h4>
                                        <p>“eiusmpsu dolor sit amet, conse cte tur ng elit, sed do eiusmod tem lacus vel
                                            facilisis.”
                                        </p>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-testimonial">
                                    <div class="cr-testimonial-image">
                                        <img src="{{ asset('client/assets/img/testimonial/2.jpg') }}" alt="businessman">
                                    </div>
                                    <div class="cr-testimonial-inner">
                                        <span>Manager</span>
                                        <h4 class="title">Lorem Robinson</h4>
                                        <p>“eiusmpsu dolor sit amet, conse cte tur ng elit, sed do eiusmod tem lacus vel
                                            facilisis.”
                                        </p>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-testimonial">
                                    <div class="cr-testimonial-image">
                                        <img src="{{ asset('client/assets/img/testimonial/3.jpg') }}" alt="businessman">
                                    </div>
                                    <div class="cr-testimonial-inner">
                                        <span>Team Leader</span>
                                        <h4 class="title">Saddika Alard</h4>
                                        <p>“eiusmpsu dolor sit amet, conse cte tur ng elit, sed do eiusmod tem lacus vel
                                            facilisis.”
                                        </p>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog -->
    <section class="section-blog padding-b-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000">
                        <div class="cr-banner">
                            <h2>Latest News</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-blog-slider swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-blog">
                                    <div class="cr-blog-content">
                                        <span><code>By Admin</code> | <a href="blog-left-sidebar.html">Snacks</a></span>
                                        <h5>Urna pretium elit mauris cursus at elit Vestibulum.</h5>
                                        <a class="read" href="blog-detail-left-sidebar.html">Read More</a>
                                    </div>
                                    <div class="cr-blog-image">
                                        <img src="{{ asset('client/assets/img/blog/2.jpg') }}" alt="blog-2">
                                        <div class="cr-blog-date">
                                            <span>
                                                10
                                                <code>oct</code>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-blog">
                                    <div class="cr-blog-content">
                                        <span><code>By Admin</code> | <a href="blog-left-sidebar.html">Food</a></span>
                                        <h5>Best guide to Shopping for organic ingredients.</h5>
                                        <a class="read" href="blog-detail-left-sidebar.html">Read More</a>
                                    </div>
                                    <div class="cr-blog-image">
                                        <img src="{{ asset('client/assets/img/blog/1.jpg') }}" alt="blog-1">
                                        <div class="cr-blog-date">
                                            <span>
                                                09<code>sep</code>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-blog">
                                    <div class="cr-blog-content">
                                        <span><code>By Admin</code> | <a href="blog-left-sidebar.html">Snacks</a></span>
                                        <h5>Cursus at elit vestibulum urna pretium elit mauris.</h5>
                                        <a class="read" href="blog-detail-left-sidebar.html">Read More</a>
                                    </div>
                                    <div class="cr-blog-image">
                                        <img src="{{ asset('client/assets/img/blog/3.jpg') }}" alt="blog-2">
                                        <div class="cr-blog-date">
                                            <span>
                                                12
                                                <code>oct</code>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                <div class="cr-blog">
                                    <div class="cr-blog-content">
                                        <span><code>By Admin</code> | <a href="blog-left-sidebar.html">Vegetable</a></span>
                                        <h5>Condimentum Nam enim bestMorbi odio sodales.</h5>
                                        <a class="read" href="blog-detail-left-sidebar.html">Read More</a>
                                    </div>
                                    <div class="cr-blog-image">
                                        <img src="{{ asset('client/assets/img/blog/2.jpg') }}" alt="blog-3">
                                        <div class="cr-blog-date">
                                            <span>
                                                22
                                                <code>jan</code>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

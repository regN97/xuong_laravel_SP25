@extends('client.layouts.main')

@section('content')
    <!-- Breadcrumb -->
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>Product</h2>
                            <span> <a href="index.html">Home</a> - product</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product -->
    <section class="section-product padding-t-100">
        <div class="container">
            <div class="row mb-minus-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="col-xxl-4 col-xl-5 col-md-6 col-12 mb-24">
                    <div class="vehicle-detail-banner banner-content clearfix">
                        <div class="banner-slider">
                            <div class="slider slider-for">
                                <div class="slider-banner-image">
                                    <div class="zoom-image-hover">
                                        <img src="{{ asset('storage/' . $product->uploadFile->file_path) }}"
                                            alt="product-tab-1" class="product-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-7 col-md-6 col-12 mb-24">
                    <div class="cr-size-and-weight-contain">
                        <h2 class="heading">{{ $product->name }}</h2>
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="cr-size-and-weight">
                        <div class="list">
                            <ul>
                                <li><label>Name <span>:</span></label>{{ $product->name }}</li>
                                <li><label>Slug <span>:</span></label>{{ $product->slug }}</li>
                                <li><label>Description <span>:</span></label>{{ $product->description }}</li>
                                <li><label>Category <span>:</span></label>{{ $product->category->name }}</li>
                                <li><label>Brand <span>:</span></label>{{ $product->brand->name }}</li>
                                <li><label>Price <span>:</span></label>{{ $product->price }}</li>
                                <li><label>Discount <span>:</span></label>{{ $product->discount }}</li>
                                <li><label>Stock <span>:</span></label>{{ $product->stock }}</li>
                                <li><label>Status <span>:</span></label>{{ $product->status }}</li>
                            </ul>
                        </div>
                        <div class="cr-product-price">
                            <span class="new-price">${{ $product->discount }}</span>
                            <span class="old-price">${{ $product->price }}</span>
                        </div>
                        <div class="cr-size-weight">
                            <h5><span>Size</span>/<span>Weight</span> :</h5>
                            <div class="cr-kg">
                                <ul>
                                    <li class="active-color">50kg</li>
                                    <li>80kg</li>
                                    <li>120kg</li>
                                    <li>200kg</li>
                                </ul>
                            </div>
                        </div>
                        <div class="cr-add-card">
                            <div class="cr-qty-main">
                                <input type="text" placeholder="." value="1" minlength="1" maxlength="20"
                                    class="quantity">
                                <button type="button" class="plus">+</button>
                                <button type="button" class="minus">-</button>
                            </div>
                            <div class="cr-add-button">
                                <button type="button" class="cr-button cr-shopping-bag">Add to cart</button>
                            </div>
                            <div class="cr-card-icon">
                                <a href="javascript:void(0)" class="wishlist">
                                    <i class="ri-heart-line"></i>
                                </a>
                                <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview" role="button">
                                    <i class="ri-eye-line"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="col-12">
                    <div class="cr-paking-delivery">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                    aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="additional-tab" data-bs-toggle="tab"
                                    data-bs-target="#additional" type="button" role="tab" aria-controls="additional"
                                    aria-selected="false">Information</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="cr-tab-content">
                                    <div class="cr-description">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-tab">
                                <div class="cr-tab-content">
                                    <div class="cr-description">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                    <div class="list">
                                        <ul>
                                            <li><label>Name <span>:</span></label>{{ $product->name }}</li>
                                            <li><label>Slug <span>:</span></label>{{ $product->slug }}</li>
                                            <li><label>Description <span>:</span></label>{{ $product->description }}</li>
                                            <li><label>Category <span>:</span></label>{{ $product->category->name }}</li>
                                            <li><label>Brand <span>:</span></label>{{ $product->brand->name }}</li>
                                            <li><label>Price <span>:</span></label>{{ $product->price }}</li>
                                            <li><label>Discount <span>:</span></label>{{ $product->discount }}</li>
                                            <li><label>Stock <span>:</span></label>{{ $product->stock }}</li>
                                            <li><label>Status <span>:</span></label>{{ $product->status }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular products -->
    <section class="section-popular-products padding-tb-100" data-aos="fade-up" data-aos-duration="2000"
        data-aos-delay="400">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-30">
                        <div class="cr-banner">
                            <h2>Sản phẩm cùng loại</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Tất cả các sản phẩm liên quan có chung danh mục</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-popular-product">
                        @foreach ($productsRelate as $relate)
                            <div class="slick-slide">
                                <div class="cr-product-card">
                                    <div class="cr-product-image">
                                        <div class="cr-image-inner zoom-image-hover">
                                            <img src="{{ asset('storage/' . $relate->uploadFile->file_path) }}"
                                                alt="product-1">
                                        </div>
                                        <div class="cr-side-view">
                                            <a href="{{ route('product.show', $relate->id) }}" role="button">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="cr-product-details">
                                        <div class="cr-brand">
                                            <a href="#">{{ $relate->category->name }}</a>
                                        </div>
                                        <a href="{{ route('product.show', $relate->id) }}"
                                            class="title">{{ $relate->name }}</a>
                                        <p class="cr-price"><span class="new-price">${{ $relate->discount }}</span> <span
                                                class="old-price">${{ $relate->price }}</span></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

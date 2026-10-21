@extends('layouts.app')

@section('main')
    <!-- :: Breadcrumb Header -->
    {{-- <section class="breadcrumb-header" id="page"
        style="background-image: url({{ asset('assets/images/header/01_breadcrumb-header.jpg') }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="banner">
                        <h1>{{ $product->title }}</h1>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>

                            @foreach ($breadcrumbs as $breadcrumbCategory)
                                <li><i class="fas fa-angle-right"></i></li>
                                <li>
                                    <a href="{{ route('front.product-category', $breadcrumbCategory->slug) }}">
                                        {{ $breadcrumbCategory->title }}
                                    </a>
                                </li>
                            @endforeach

                            <li><i class="fas fa-angle-right"></i></li>
                            <li>{{ $product->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="product-details py-5">
        <div class="container">
            <h2 class = "product-title">{{ $product->title }}</h2>
            <div class="breadcrumb-wrapper overflow-auto">
                <ul class="d-flex flex-wrap align-items-center mb-4 p-0" style="list-style: none;">
                    <li class="me-2"><a href="{{ route('front.home') }}">Home</a></li>

                    @foreach ($breadcrumbs as $breadcrumbCategory)
                        <li class="me-2"><i class="fas fa-angle-right"></i></li>
                        <li class="me-2">
                            <a href="{{ route('front.product-category', $breadcrumbCategory->slug) }}">
                                {{ $breadcrumbCategory->title }}
                            </a>
                        </li>
                    @endforeach

                    <li class="me-2"><i class="fas fa-angle-right"></i></li>
                    <li>{{ $product->title }}</li>
                </ul>
            </div>

            <style>
                .breadcrumb-wrapper {
                    white-space: nowrap;
                    overflow-x: auto;
                    -webkit-overflow-scrolling: touch;
                    scrollbar-width: none;
                    /* Firefox */
                }

                .breadcrumb-wrapper::-webkit-scrollbar {
                    display: none;
                    /* Chrome, Safari, Opera */
                }

                .breadcrumb-wrapper ul {
                    flex-wrap: nowrap;
                }
            </style>

            <div class="row">
                <div class="col-md-5">
                    <div class="product-gallery">
                        <div class="main-slider">
                            @foreach ($product->productImages as $item)
                                <div>
                                    <img src="{{ asset($item->image) }}" alt="product image"
                                        style="width:100%; height:400px; object-fit:contain;">
                                </div>
                            @endforeach
                        </div>
                        <div class="thumb-slider mt-3">
                            @foreach ($product->productImages as $item)
                                <div>
                                    <img src="{{ asset($item->image) }}" alt="thumbnail"
                                        style="width:100px; height:100px; object-fit:contain;">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class = "product-content">
                        <div class="product-detail">
                            {!! $product->description !!}
                        </div>
                        @if (!empty($product->pdf) && file_exists(public_path($product->pdf)))
                            <div class="pdf-box">
                                <a href="{{ asset($product->pdf) }}" class="btn-1 btn-3">
                                    <span>View Catlog </span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- :: Services -->
    <section class="services home-2">
        <div class="bg-section" style="background-image: url({{ asset('assets/images/bg.jpg') }})">
            <div class="overlay overlay-2"></div>
        </div>
        <div class="container">
            <div class="sec-title home-2">
                <div class="row">
                    <div class="col-lg-5">
                        <h2>Products we offer</h2>
                        <h3>Related Products</h3>
                    </div>
                    <div class="col-lg-5 d-flex align-items-center">
                        <p class="sec-explain">At the out set we would like to introduce ourselves as a leading company in
                            the manufacturing of Pipe End Fittings & Assembly.</p>
                    </div>
                </div>
            </div>
            <div class="services-carousel owl-carousel owl-theme">
                @foreach ($relatedProducts as $item)
                    <div class="services-carousel-item item-1">
                        <a href="{{ route('front.product-details', $item->slug) }}" class="services-item-img-box"
                            style="background-image: url({{ asset($item->productImage->image) }})"><span></span></a>
                        <div class="item-box">
                            <div class="content-box">
                                <h4><a href="{{ route('front.product-details', $item->slug) }}">{{ $item->title }}</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

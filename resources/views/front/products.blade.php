@extends('layouts.app')

@section('main')
    <!-- :: Breadcrumb Header -->
    <section class="breadcrumb-header" id="page"
        style="background-image: url(assets/images/header/01_breadcrumb-header.jpg)">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="banner">
                        <h1>All Products</h1>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li><i class="fas fa-angle-right"></i></li>
                            <li>Our Products</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .list-group .active {
            background-color: #145086;
            color: #ffffff;
        }
    </style>

    <section class="about-us home-2 py-100" id="start">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="mb-4">All Categories</h4>
                    <div class="list-group">
                        @foreach ($categories as $item)
                            <a href="{{ route('front.product-category', $item->slug) }}" class="list-group-item ">
                                {{ $item->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-9">
                    @if ($categories->isNotEmpty())
                        <div class="row">
                            @foreach ($categories as $item)
                                <div class="col-md-4">
                                    <div class="blog-item">
                                        <div class="img-box">
                                            <a href="{{ route('front.product-category', $item->slug) }}" class="open-post">
                                                <img class="img-fluid border"
                                                    src="{{ asset('category-images/' . $item->image) }}"
                                                    alt="{{ $item->title }}"
                                                    style="width: 100%;
                                            height: 300px;object-fit: cover;">
                                            </a>
                                        </div>
                                        <div class="text-box text-center border pb-4 p-0 pt-2">
                                            <a href="{{ route('front.product-category', $item->slug) }}"
                                                class="title-blog">
                                                <h5>{{ $item->title }}</h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <!--@if ($products->isNotEmpty())-->
                    <!--    <div class="row">-->
                    <!--        @foreach ($products as $item)-->
                    <!--            <div class="col-md-4">-->
                    <!--                <div class="blog-item">-->
                    <!--                    <div class="img-box">-->
                    <!--                        <a href="{{ route('front.product-details', $item->slug) }}" class="open-post">-->
                    <!--                            <img class="img-fluid border" src="{{ asset($item->productImage->image) }}"-->
                    <!--                                alt="{{ $item->title }}"-->
                    <!--                                style="width: 100%;-->
                    <!--                        height: 300px;object-fit: cover;">-->
                    <!--                        </a>-->
                    <!--                    </div>-->
                    <!--                    <div class="text-box text-center border pb-4 p-0 pt-2">-->
                    <!--                        <a href="{{ route('front.product-details', $item->slug) }}" class="title-blog">-->
                    <!--                            <h5>{{ $item->title }}</h5>-->
                    <!--                        </a>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        @endforeach-->
                    <!--    </div>-->
                    <!--@endif-->
                </div>
            </div>
        </div>
    </section>
@endsection

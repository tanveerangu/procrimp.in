@extends('layouts.app')

@section('main')
    <!-- :: Breadcrumb Header -->
    <section class="breadcrumb-header" id="page"
        style="background-image: url({{ asset('assets/images/header/01_breadcrumb-header.jpg') }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="banner">
                        <h1>{{ $category->title }}</h1>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            @foreach ($breadcrumbs as $breadcrumbCategory)
                                <li><i class="fas fa-angle-right"></i></li>
                                @if (!$loop->last)
                                    <li>
                                        <a href="{{ route('front.product-category', $breadcrumbCategory->slug) }}">
                                            {{ $breadcrumbCategory->title }}
                                        </a>
                                    </li>
                                @else
                                    <li>{{ $breadcrumbCategory->title }}</li> {{-- Current category --}}
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-us home-2 py-100" id="start">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="mb-4">All Categories</h4>


                    <div class="list-group">
                        @foreach ($categories as $item)
                            @php
                                $hasChildren = $item->subcategories->isNotEmpty();
                                $isActive =
                                    $item->slug == $category->slug ||
                                    $item->subcategories->contains('slug', $category->slug);
                            @endphp

                            <div class="list-group-item-wrapper position-relative">
                                <a href="{{ route('front.product-category', $item->slug) }}"
                                    class="list-group-item d-flex justify-content-between align-items-center {{ $item->slug == $category->slug ? 'active' : '' }}">
                                    {{ $item->title }}

                                    @if ($hasChildren)
                                        <span class="toggle-icon btn-toggle" data-toggle-id="toggle-{{ $item->id }}">
                                            {{ $isActive ? '-' : '+' }}
                                        </span>
                                    @endif
                                </a>

                                @if ($hasChildren)
                                    <div id="toggle-{{ $item->id }}" class="sub-categories"
                                        style="display: {{ $isActive ? 'block' : 'none' }}; padding-left: 15px;">
                                        @foreach ($item->subcategories as $child)
                                            <a href="{{ route('front.product-category', $child->slug) }}"
                                                class="list-group-item {{ $child->slug == $category->slug ? 'active' : '' }}">
                                                {{ $child->title }}
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>



                </div>
                <div class="col-md-9">
                    @if ($category->subcategories->isNotEmpty())
                        <div class="row">
                            @foreach ($category->subcategories as $item)
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
                    @if ($products->isNotEmpty())
                        <div class="row">
                            @foreach ($products as $item)
                                <div class="col-md-4">
                                    <div class="blog-item">
                                        <div class="img-box">
                                            <a href="{{ route('front.product-details', $item->slug) }}" class="open-post">
                                                <img class="img-fluid border" src="{{ asset($item->productImage->image) }}"
                                                    alt="{{ $item->title }}"
                                                    style="width: 100%;
                                            height: 300px;object-fit: cover;">
                                            </a>
                                        </div>
                                        <div class="text-box text-center border pb-4 p-0 pt-2">
                                            <a href="{{ route('front.product-details', $item->slug) }}" class="title-blog">
                                                <h5>{{ $item->title }}</h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

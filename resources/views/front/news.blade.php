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
                        <h1>News</h1>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li><i class="fas fa-angle-right"></i></li>
                            <li>News</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog py-100-70">
        <div class="container">
            <div class="sec-title home-2">
                <div class="row">
                    <div class="col-lg-5">
                        <h2>Recent Articles</h2>
                        <h3>Read All News</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="blog-item">
                        <div class="img-box">
                            <a href="{{ route('front.blog-details', $item->id ) }}" class="open-post">
                                <img class="img-fluid" src="{{ asset('blog-images/' . $item->image) }}" alt="01 Blog">
                            </a>
                        </div>
                        <div class="text-box">
                            <a href="{{ route('front.blog-details', $item->id) }}" class="title-blog">
                                <h5>{{ $item->title }}</h5>
                            </a>
                            <span class="blog-date">{{ $item->date }}</span>
                            <p>{!! Str::limit($item->description, 200) !!}</p>
                            <a href="{{ route('front.blog-details', $item->id) }}" class="btn-1 btn-3 link"><span>Read More</span></a>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-lg-12">
                    <div class="pagination-area">
                        <ul class="pagination">
                            <li>Prev</li>
                            <li class="active">1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>Next</li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection

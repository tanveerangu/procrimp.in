@extends('layouts.app')

@section('main')
    <!-- :: Breadcrumb Header -->
    <section class="breadcrumb-header style-2" id="page"
        style="
        background-image: url({{ asset('assets/images/header/02_breadcrumb-header.jpg') }});
      ">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="banner">
                        <h1>{{ $blog->title }}</h1>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li><i class="fas fa-angle-right"></i></li>
                            <li>{{ $blog->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- :: Single Blog -->
    <div class="single-blog-page py-100-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-item">
                        <div class="img-box">
                            <a href="{{ route('front.blog-details', $blog->id ) }}" class="open-post">
                                <img class="img-fluid" src="{{ asset('blog-images/' . $blog->image) }}" alt="01 Blog" />
                            </a>
                        </div>
                        <div class="text-box">
                            <h5>
                                {{ $blog->title }}
                            </h5>
                            <span class="blog-date">{{ $blog->date }}</span>
                            <style>
                            .block-content img{
                                width:48%;
                                margin:5px;
                            }
                            </style>
                            <div class="block-content">
                                {!! $blog->description !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-blog ml-20">
                        <div class="widget">
                            <div class="widget-title">
                                <h3>All Blogs</h3>
                            </div>
                            <div class="news-box">
                                @foreach ($blogdata as $item)
                                    <div class="news-item">
                                        <img class="img-fluid" src="{{ asset('blog-images/' . $item->image) }}" alt="01 Blog" />
                                        <div class="item-content">
                                            <span><a href="{{ route('front.blog-details', $item->id ) }}">{{ $item->date }}</a></span>
                                            <a href="{{ route('front.blog-details', $item->id ) }}" class="title-blog">
                                                <h5>
                                                    {{ $item->title }}
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

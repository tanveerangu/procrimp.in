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
                        <h1>Contact</h1>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li><i class="fas fa-angle-right"></i></li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="contact-us py-100">
        <div class="container">
            <div class="contact-info-content">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-box">
                            <i class="ar-icons-call"></i>
                            <div class="box">
                                <a class="phone" href="tel:+91{{ $setting->phone }}">+91 {{ $setting->phone }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-box">
                            <i class="ar-icons-email"></i>
                            <div class="box">
                                <a class="mail" href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-box">
                            <i class="ar-icons-location"></i>
                            <div class="box">
                                <p>{{ $setting->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <!-- :: Map -->
                    <div class="map-box">
                        {!! $setting->map !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="add-comments">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('front.enquiry') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 inner-add-comments-box">
                                    <input type="text" name="name" placeholder="Name" required>
                                </div>
                                <div class="col-md-6 inner-add-comments-box">
                                    <input type="Email" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-6 inner-add-comments-box">
                                    <input type="tel" name="phone" placeholder="Phone No." required>
                                </div>
                                <div class="col-md-12 inner-add-comments-box">
                                    <textarea name="message" placeholder="Your Message Here" required></textarea>
                                </div>
                                <div class="col-md-12 inner-add-comments-box last">
                                    <button class="btn-1 btn-3 submit" type="submit"><span>Submit</span></button>
                                    <span class="out-message"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

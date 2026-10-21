@extends('layouts.app')

@section('main')
    <div class="banner-video">
        <div class="video">
            <video autoplay muted loop style="width: 100%;object-fit: cover;">
                <source src="{{ asset('assets/images/banner-video.mp4') }}" type="video/mp4">
            </video>
            <div class="video-overlay"></div>
        </div>
        <div class="banner-content text-center" data-aos="fade-down">
            <span class="content">Welcome To <span style="color: #ff7c01">Yuvraj Overseas!</span></span>
        </div>
    </div>




    <!-- :: About US -->
    <section class="about-us home-2 py-100" id="start">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="about-us-text-box">
                        <div class="sec-title home-2">
                            <h2>Welcome to Yuvraj Overseas Pvt. Ltd.</h2>
                            <h3>A Legacy of over 30 Years: Unrivalled Success and Dedication</h3>
                            <p class="sec-explain">Founded in 1993, Yuvraj Overseas Pvt. Ltd. has grown into one
of India's leading manufacturers hydraulic hose-end fittings.
With over three decades of experience and a commitment to
excellence, we have built a strong reputation for precision,
quality, and reliability.<br>
Today, as an IATF 16949 certified manufacturer with a state of
the art production facility, we continue to uphold the highest
standards of production and innovation, ensuring our products
consistently meet the demands of a global market.</p>
                        </div>
                        <div class="features-style-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="item">
                                        <i class="ar-icons-toolbox"></i>
                                        <div class="content-box">
                                            <h5>QUALITATIVE PRODUCTS RANGE</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="item">
                                        <i class="ar-icons-trolley"></i>
                                        <div class="content-box">
                                            <h5>MODERN MACHINERY</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="about-btn">
                            <a href="02_about-us.html" class="btn-1 btn-3"><span>More About Us</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-us-img-box">
                        <div class="img-box" style="background-image: url({{ asset('assets/images/home1.png') }})">
                        </div>
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
                        <h3>Our Products</h3>
                    </div>
                    <div class="col-lg-5 d-flex align-items-center">
                        <p class="sec-explain">At the out set we would like to introduce ourselves as a leading company in
                            the manufacturing of Pipe End Fittings & Assembly.</p>
                    </div>
                </div>
            </div>
            <div class="services-carousel owl-carousel owl-theme">
                @foreach ($products as $item)
                    <div class="services-carousel-item item-1">
                        <a href="{{ route('front.product-details', $item->slug) }}" class="services-item-img-box"
                            style="background-image: url({{ asset($item->productImage->image) }})"><span></span></a>
                        <div class="item-box">
                            <div class="content-box">
                                <h4><a href="{{ route('front.product-details', $item->slug) }}">{{ $item->title }}</a></h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="products-btn text-center pt-4">
                <a class="btn-1 btn-3" href="{{ route('front.products') }}"><span>All Products</span></a>
            </div>
        </div>
    </section>

    <section class="py-100-70">
        <div class="container">
            <div class="sec-title home-2">
                <div class="row">
                    <div class="col-lg-5">
                        <h2>why choose us</h2>
                        <h3>Why Us?</h3>
                    </div>
                </div>
            </div>
            <div class="statistic mb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            <div class="statistic-item">
                                <i class="ar-icons-checklist"></i>
                                <div class="content">
                                    <div class="d-flex">
                                        <div class="counter statistic-counter" data-count="1000">1000</div>
                                        <span style="font-size: 40px">+</span>
                                    </div>

                                    <div class="counter-name">No. Of Satisfied Customers</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="statistic-item">
                                <i class="ar-icons-conveyor-2"></i>
                                <div class="content">
                                    <div class="d-flex">
                                        <div class="counter statistic-counter" data-count="30">30</div>
                                        <span style="font-size: 40px">+</span>
                                    </div>
                                    <div class="counter-name">Years of Experience</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="statistic-item">
                                <i class="ar-icons-conveyor-3"></i>
                                <div class="content">
                                    <div class="d-flex">
                                        <div class="counter statistic-counter" data-count="2500">2500</div>
                                        <span style="font-size: 40px">+</span>
                                    </div>
                                    <div class="counter-name">No. Of SKU's</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul>
                <div class="row mt-3">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <li>• Dedicated Technical Expertise </li>
                        <li>• All fittings available in one-pc, two-pc and three-pc designs </li>
                        <li>• In-house testing and R&D facility </li>
                        <li>•Customized solutions as per drawing or application </li>
                        <li>• In-house cold-forging plant</li>
                        <li>• Lower lead times with excess capacity</li>
                        <li>• In-house electroplating plant, with various options such as zinc and zinc/nickel
                        </li>
                        <li>• Standard fittings and components always in stock</li>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <li>• Ability to dispatch majority of the orders same day</li>
                        <li>• Export standard box packaging for all our products</li>
                        <li>• Barcode integration</li>
                        <li> • 100% Quality control with new parameters being added from time-to-time</li>
                        <li> • Direct & Indirect suppliers for various global OEMs and Tier 1 customers</li>
                        <li> • Faster responses and RFQs answered by our dedicated sales team</li>
                        <li>• Ability to work with low MOQs</li>
                    </div>
                </div>
            </ul>
        </div>
    </section>

    <section class="projects home-2 py-100-70">
        <div class="container">
            <div class="sec-title home-2">
                <div class="row">
                    <div class="col-lg-5">
                        <h2>Industries We Serve!</h2>
                        <h3>We Are Here For You</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid ">
            <div class="row">
                @foreach ($banners as $item)
                    <div class="col-md-6 col-lg-4 p-0">
                        <div class="projects-item mb-0">
                            <span></span>
                            <div class="img-box">
                                <img class="img-fluid projects-item-img w-100"
                                    src="{{ asset('banner-images/' . $item->image) }}" alt="01 projects"
                                    style="
                                    height: 350px;
                                    object-fit: cover;
                                ">
                            </div>
                            <div class="hover-box">
                                <div class="text-box">
                                    <h4><a href="02_projects.html">{{ $item->title }}</a></h4>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- :: Testimonial -->
    {{-- <section class="testimonial home-2 py-100">
        <div class="testimonial-carousel owl-carousel owl-theme">
            <div class="item">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="img-box"
                                style="background-image: url(assets/images/testimonial/01_testimonial.jpg)"></div>
                        </div>
                        <div class="col-lg-7 d-flex align-items-center justify-content-between">
                            <div class="box">
                                <i class="ar-icons-right-quote quote"></i>
                                <div class="text-box">Highly recommended &amp; a great experience. The process was
                                    simple and easy to understand. Trading was straight forward, the entire process was
                                    super smooth, MedDoctors Are A Medical And Health Department Provider Institutions.
                                    Suitable For Healthcare, Medical, Doctor.</div>
                                <div class="item-name text-center">
                                    <h5>Osama Bakri</h5>
                                    <span>NiftyTheme Agency</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="img-box"
                                style="background-image: url(assets/images/testimonial/02_testimonial.jpg)"></div>
                        </div>
                        <div class="col-lg-7 d-flex align-items-center justify-content-between">
                            <div class="box">
                                <i class="ar-icons-right-quote quote"></i>
                                <div class="text-box">Highly recommended &amp; a great experience. The process was
                                    simple and easy to understand. Trading was straight forward, the entire process was
                                    super smooth, MedDoctors Are A Medical And Health Department Provider Institutions.
                                    Suitable For Healthcare, Medical, Doctor.</div>
                                <div class="item-name text-center">
                                    <h5>Nour Ramadan</h5>
                                    <span>AR-Coder Agency</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="img-box"
                                style="background-image: url(assets/images/testimonial/03_testimonial.jpg)"></div>
                        </div>
                        <div class="col-lg-7 d-flex align-items-center justify-content-between">
                            <div class="box">
                                <i class="ar-icons-right-quote quote"></i>
                                <div class="text-box">Highly recommended &amp; a great experience. The process was
                                    simple and easy to understand. Trading was straight forward, the entire process was
                                    super smooth, MedDoctors Are A Medical And Health Department Provider Institutions.
                                    Suitable For Healthcare, Medical, Doctor.</div>
                                <div class="item-name text-center">
                                    <h5>Amina Taha</h5>
                                    <span>Founder &amp; CEO</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection

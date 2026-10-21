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
                        <h1>Quality</h1>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li><i class="fas fa-angle-right"></i></li>
                            <li>Quality</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="certificates pt-5" id="certificate">
        <div class="container">
            <div class="sec-title">
                <h3>Certifications</h3>
            </div>
            <div class="row">
                <div class="col-md-6 order-2 order-md-1">
                    <img src="{{ asset('assets/images/certificate-1.png') }}" alt="certificate" class="img-fluid">
                </div>
                <div class="col-md-6 order-1 order-md-2">
                    <img src="{{ asset('assets/images/certificate-2.png') }}" alt="certificate" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="assurance pt-5 pb-5" id="assurance">
        <div class="container">
            <div class="sec-title">
                <h3>The Assurance</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>At Yuvraj Overseas Pvt. Ltd., we are more than just manufacturers—we are industry pioneers committed to delivering excellence in hydraulic hose-end fittings, adaptors, and cold-forged fittings. Here's why businesses across the globe trust us:<br><br>

                        <b>1. Industry-Leading Expertise :-</b><br>
                        Since 1993, we have grown to become the largest manufacturers and stockists in the industry. Under the visionary leadership of S. Kuldeep Singh and Mr. Yuvraj Singh, who brings innovative strategies from his BBA in Management at the Northern Alberta Institute of Technology, we are setting new benchmarks in product development for the export market.<br><br>
                        
                        <b>2. Certified Quality Assurance :-</b><br>
                        Our dedication to excellence is reflected in our globally recognized certifications:
                        
                        IATF 16949:2016 Certified
                        ISO 9001:2015 Certified
                        These certifications validate our commitment to precision, performance, and consistency.<br><br>
                        
                        <b>3. Advanced In-House Manufacturing :-</b><br>
                        From raw material processing to finished goods, we manage every step of production under one roof. Our cutting-edge facilities include -<br>
                        
                        <b>- Cold Forging</b><br>
                        <b>- Annealing</b><br>
                        <b>- Precision CNC Turning</b><br>
                        <b>- Bending, Crimping, and Zinc Coating Lines (Zinc & Zinc-Nickel options available)</b><br><br>
                        <b>4. Stringent Quality Testing</b><br>
                        Equipped with a state-of-the-art testing laboratory featuring premium equipment from Mitutoyo, we ensure every product meets and exceeds industry standards.<br>
                        
                        3000 Bar Hose Test-Bench: Ensures compatibility across a wide range of hoses.Comprehensive durability and performance tests guarantee reliability.<br><br>
                        <b>5. A Trusted Partner for Your Business Needs</b><br>
                        Whether you require high-quality hydraulic fittings for domestic or export markets, our products are engineered to deliver unparalleled durability and precision. With a focus on innovation and customer satisfaction, we aim to be your reliable partner in success.<br><br>
                        
                        <b>Let us show you the difference in quality and expertise. Contact us today to learn more or schedule a consultation tailored to your specific requirements.</b></p>
                </div>
            </div>
        </div>

    </section>

<section class="lab-equipments pb-5" id="lab">
    <div class="container">

        <div class="sec-title text-center mb-5">
            <h3 style="font-weight:700; color:#1f3c88;">R & D Centre</h3>
        </div>

        <div class="row g-4">
            <!-- Image 3 Full Width -->
            <div class="col-12 mt-4">
                <div style="border-radius:8px; overflow:hidden;">
                    <img src="{{ asset('assets/images/r&d3.jpg') }}" 
                         alt="Advanced Simulation" 
                         class="img-fluid w-100"
                         style="width:100%; height:auto; display:block;">
                </div>
                <h5 style="margin-top:15px; font-weight:600; color:#333; text-align:center;">
                    Advanced Simulation & Designing Capabilities
                </h5>
            </div>
<!-- Image 4 -->
            <div class="col-md-6 col-12">
                <div style="border-radius:8px; overflow:hidden;">
                    <img src="{{ asset('assets/images/r&d4.jpg') }}" 
                         alt="Various Gauges" 
                         class="img-fluid w-100"
                         style="width:100%; height:auto; display:block;">
                </div>
                <h5 style="margin-top:15px; font-weight:600; color:#333; text-align:center;">
                   Solidworks
                </h5>
            </div>

            <!-- Image 5 -->
            <div class="col-md-6 col-12">
                <div style="border-radius:8px; overflow:hidden;">
                    <img src="{{ asset('assets/images/r&d5.jpg') }}" 
                         alt="Profile Projector" 
                         class="img-fluid w-100"
                         style="width:100%; height:auto; display:block;">
                </div>
                <h5 style="margin-top:15px; font-weight:600; color:#333; text-align:center;">
                    Mastercam
                </h5>
            </div>

            <!-- Image 1 -->
            <div class="col-md-6 col-12">
                <div style="border-radius:8px; overflow:hidden;">
                    <img src="{{ asset('assets/images/r&d1.jpg') }}" 
                         alt="Various Gauges" 
                         class="img-fluid w-100"
                         style="width:100%; height:auto; display:block;">
                </div>
                <h5 style="margin-top:15px; font-weight:600; color:#333; text-align:center;">
                    Various Types of Gauges
                </h5>
            </div>

            <!-- Image 2 -->
            <div class="col-md-6 col-12">
                <div style="border-radius:8px; overflow:hidden;">
                    <img src="{{ asset('assets/images/r&d2.jpg') }}" 
                         alt="Profile Projector" 
                         class="img-fluid w-100"
                         style="width:100%; height:auto; display:block;">
                </div>
                <h5 style="margin-top:15px; font-weight:600; color:#333; text-align:center;">
                    Profile Projector
                </h5>
            </div>

        </div>
    </div>
</section>
@endsection

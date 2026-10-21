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
                        <h1>About US</h1>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li><i class="fas fa-angle-right"></i></li>
                            <li>About US</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- :: About US -->
    <section class="about-us home-2 py-100" id="start">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="about-us-text-box">
                        <div class="sec-title home-2">
                            <h2>Welcome to Yuvraj Overseas Pvt. Ltd.</h2>
                            <h3>A Legacy of over 30 Years: Unrivalled Success and Dedication</h3>
                            <p class="sec-explain">At Yuvraj Overseas Pvt Ltd, we take immense pride in being the industry's
                                leading manufacturer of high-quality hydraulic hose-end fittings, adaptors, and cold-forged
                                fittings. With a commitment to excellence, we specialize in producing a wide range of
                                fittings, ranging from 1/8" ID to 4" in carbon steel.<br>
                                With a modest beginning in 1993, we have now become the largest manufacturers and stockists
                                under the dynamic leadership of S. Kuldeep Singh. With the joining our new director Mr.
                                Yuvraj Singh, the company now has a vision stronger than ever. After completing his BBA in
                                Management from the Northern Alberta Institute of Technology (AB, Canada), Mr. Singh is now
                                heading new product developments for the export market. <br> As a testament to our dedication to quality, we are proud to be an IATF 16949:2016 & ISO
                                9001:2015 certified company. What sets us apart is our complete in-house manufacturing
                                process. From the initial processing of raw materials to the dispatch of finished goods,
                                every step is carefully managed under our roof. Our state-of-the-art facilities include a cold-forging facility, annealing, precision CNC
                                turning, bending, crimping, and zinc coating lines with various options such as Zinc &
                                Zinc-Nickel. We leave no stone unturned in ensuring that our products meet the highest
                                standards of durability and performance.<br>Furthermore, our fully equipped testing laboratory, featuring cutting-edge equipment from
                                renowned brands like Mitutoyo, enables us to guarantee the quality of our products. We
                                rigorously test our fittings to ensure they meet and exceed industry standards. Our 3000 bar
                                hose test-bench enables us in testing and validating our fittings across a wide spectrum of
                                hoses available. <br>We are eager to demonstrate the exceptional quality of our hydraulic hose-end fittings and
                                how they can benefit your business. If you're looking for reliability, precision, and
                                unparalleled expertise, you've come to the right place. We would be delighted to discuss how
                                our products can address your specific needs and contribute to your success. Feel free to
                                drop us an email to schedule a meeting or request additional information.
                            </p>


                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-us-img-box">
                        <div class="img-box" style="background-image: url({{ asset('assets/images/about-us/warehouse3.png') }})">
                        </div>
                    </div>
                </div>
            </div>
            <div class="time-line pt-5 pb-5" id="time">
                <div class="container">
                    <div class="sec-title home-2">
                        <h3 class="mt-4" id="mission">Mission & Vision:</h3>
                        <p>
                        <h2>Mission :</h2> We deliver precision-engineered fluid conveyance solutions, empowering industries
                        worldwide with innovative, sustainable, and efficient operations.</p>
                        <p>
                        <h2>Vision :</h2> To lead the global fluid conveyance solutions industry with innovation and
                        sustainability,
                        setting the standard for efficiency and excellence in every operation.</p>
                        <h3 class="mt-4" id="values">Core Values:</h3>
                        <p>
                        <h2>Innovation:</h2> We embrace creativity and engineering excellence to deliver cutting-edge
                        solutions
                        that
                        drive progress.</p>
                        <p>
                        <h2>Quality:</h2> Our commitment to superior craftsmanship ensures reliable and high-performance
                        products
                        for every client.
                        </p>
                        <p>
                        <h2>Sustainability:</h2> We prioritize environmentally conscious practices, fostering a sustainable
                        future for industries worldwide.
                        </p>
                        <p>
                        <h2>Customer-Centricity:</h2> We tailor our solutions to meet the unique needs of our clients,
                        ensuring
                        their success and satisfaction.</p>
                        <p>
                        <h2>Integrity:</h2> We uphold transparency, honesty, and ethical practices in all our operations and
                        partnerships.</p>
                        <p>
                        <h2>Adaptability:</h2> We thrive on flexibility, continuously evolving to meet the changing demands
                        of
                        global markets.</p>
                        <p>
                        <h2>Excellence:</h2> We set and achieve the highest standards in everything we do, inspiring trust
                        and
                        confidence in our solutions.</p>
                        <p>
                    </div>
                    <div class="sec-title">
                        <h3 class="mt-4">History & Timeline</h3>
                    </div>
                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                1993
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <div class="time-line-box right-icon" data-aos="fade-right">
                                <h3>We Started</h3>
                                <p>SK Industries Began Its Journey In Ludhiana, India, Crafting Quality Bicycle Parts.</p>
                                <i class="fa-solid fa-caret-right"></i>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                    </div>
                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                1997
                            </h6>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="time-line-box left-icon" data-aos="fade-left">
                                <h3>Venturing Ahead</h3>
                                <p>Began Manufacturing Diesel Engine Parts Like High And Low-Pressure Banjos.</p>
                                <i class="fa-solid fa-caret-left"></i>
                            </div>
                        </div>
                    </div>


                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                1999
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <div class="time-line-box right-icon" data-aos="fade-right">
                                <h3>Stepping Up</h3>
                                <p>Entered High-Pressure Fluid Conveyance Products Used In Construction Equipment.</p>
                                <i class="fa-solid fa-caret-right"></i>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>

                    </div>
                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2003
                            </h6>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="time-line-box left-icon" data-aos="fade-left">
                                <h3>Yuvraj Overseas Pvt. Ltd.</h3>
                                <p>Yuvraj Overseas Pvt. Ltd. Revolutionizes India’s FCP Industry As A Dedicated Supplier,
                                    Powered By Advanced Lathes And Traub Machines For The Aftermarket.</p>
                                <i class="fa-solid fa-caret-left"></i>
                            </div>
                        </div>
                    </div>


                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2004
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <div class="time-line-box right-icon" data-aos="fade-right">
                                <h3>Achieving Excellence</h3>
                                <p>Proudly ISO 9001 Certified.</p>
                                <i class="fa-solid fa-caret-right"></i>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>

                    </div>
                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2006
                            </h6>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="time-line-box left-icon" data-aos="fade-left">
                                <h3>Meeting Demand</h3>
                                <p>Launched Hose Assembly Setup For OEM And Replacement Customers.</p>
                                <i class="fa-solid fa-caret-left"></i>
                            </div>
                        </div>
                    </div>


                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2007
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <div class="time-line-box right-icon" data-aos="fade-right">
                                <h3>Expanding horizons</h3>
                                <p>Began Hose Assembly Supplies To Tractor And Combine Harvester OEMs.</p>
                                <i class="fa-solid fa-caret-right"></i>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>

                    </div>
                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2008
                            </h6>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="time-line-box left-icon" data-aos="fade-left">
                                <h3>Marking The Beginning Of A Transformative Change</h3>
                                <p>Introduced 4 CNC Machines For Consistent, High-Quality Products!</p>
                                <i class="fa-solid fa-caret-left"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2008
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <div class="time-line-box right-icon" data-aos="fade-right">
                                <!--<h3>Expanding horizons</h3>-->
                                <p>YOPL Expands Into Two-Pc Fittings With The Addition Of Nut-Crimping Machines.</p>
                                <i class="fa-solid fa-caret-right"></i>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>

                    </div>
                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2010
                            </h6>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="time-line-box left-icon" data-aos="fade-left">
                                <h3>Expanding Capabilities</h3>
                                <p>4 More CNC Machines Added To The Fleet</p>
                                <i class="fa-solid fa-caret-left"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2011
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <div class="time-line-box right-icon" data-aos="fade-right">
                                <!--<h3>Process Efficiency</h3>-->
                                <p>7 More CNC Machines Installed To Meet The Soaring Demand For Premium Hose-End Fittings
                                </p>
                                <i class="fa-solid fa-caret-right"></i>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>

                    </div>
                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2012
                            </h6>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="time-line-box left-icon" data-aos="fade-left">
                                <h3>Process Efficiency</h3>
                                <p>Setting Up Of A Cold Forging Plant To Improve Production Capacity And Consistency </p>
                                <i class="fa-solid fa-caret-left"></i>
                            </div>
                        </div>
                    </div>


                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2014
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <div class="time-line-box right-icon" data-aos="fade-right">
                                <!--<h3>Process Efficiency</h3>-->
                                <p>YOPL Exits Hose Assembly Business To Focus Solely On Hose-End Fitting Excellence</p>
                                <i class="fa-solid fa-caret-right"></i>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>

                    </div>
                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2016
                            </h6>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="time-line-box left-icon" data-aos="fade-left">
                                <h3>Boosting capacity: </h3>
                                <p>A 10,000 Sq Ft Warehouse Added To Stock A Wide Variety Of Fittings</p>
                                <i class="fa-solid fa-caret-left"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2018
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <div class="time-line-box right-icon" data-aos="fade-right">
                                <h3>Breaking Geography Barriers</h3>
                                <p>First Export Container Shipped To Russia.</p>
                                <i class="fa-solid fa-caret-right"></i>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>

                    </div>
                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2021
                            </h6>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="time-line-box left-icon" data-aos="fade-left">
                                <!--<h3>Boosting capacity: </h3>-->
                                <p>Introduced 'Shipment On Same Day' For Faster Delivery, A First In The Indian Industry</p>
                                <i class="fa-solid fa-caret-left"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2023
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <div class="time-line-box right-icon" data-aos="fade-right">
                                <h3>YOPL Welcomes Second-Generation</h3>
                                <p>Director Yuvraj Singh (BBA from NAIT, Canada), Ready To Lead OE And Premium Segment
                                    Growth While Heading NPDs</p>
                                <i class="fa-solid fa-caret-right"></i>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>

                    </div>
                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2023
                            </h6>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="time-line-box left-icon" data-aos="fade-left">
                                <h3>Boosting Capacity</h3>
                                <p>Fleet Of 16 New CNC Machines Added To Meet Growing Customer Demand</p>
                                <i class="fa-solid fa-caret-left"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2023
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <div class="time-line-box right-icon" data-aos="fade-right">
                                <h3>Improved R&D</h3>
                                <p>Established A New Engineering Lab To Continuously Improve Quality Of Existing Parts And
                                    Streamline The Design & Development Of New Parts. </p>
                                <i class="fa-solid fa-caret-right"></i>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>

                    </div>
                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2023
                            </h6>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="time-line-box left-icon" data-aos="fade-left">
                                <!--<h3>Boosting Capacity</h3>-->
                                <p>To Cater To Customer Demands, A New 1000 Hr Rust Resistant Electroplating Has Been
                                    Developed.</p>
                                <i class="fa-solid fa-caret-left"></i>
                            </div>
                        </div>
                    </div>


                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2024
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <div class="time-line-box right-icon" data-aos="fade-right">
                                <!--<h3>Improved R&D</h3>-->
                                <p>YOPL Sets A Milestone In The FCP Industry As The First Full-Fledged Hose-End Fitting
                                    Manufacturer To Achieve IATF 16949:2016 Certification. </p>
                                <i class="fa-solid fa-caret-right"></i>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>

                    </div>
                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2024
                            </h6>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="time-line-box left-icon" data-aos="fade-left">
                                <!--<h3>Boosting Capacity</h3>-->
                                <p> Developed – “ProCrimp by Yuvraj” An Innovative Single-Piece Fitting Design Through
                                    Extensive R&D</p>
                                <i class="fa-solid fa-caret-left"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2024
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <div class="time-line-box right-icon" data-aos="fade-right">
                                <!--<h3>Improved R&D</h3>-->
                                <p>A New 25,000 Sq Ft Warehouse Added Out Of A Total Available Area Of 104,000 sq ft. To
                                    Improve Stock And Logistical Operations</p>
                                <i class="fa-solid fa-caret-right"></i>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>

                    </div>
                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2024
                            </h6>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="time-line-box left-icon" data-aos="fade-left">
                                <!--<h3>Boosting Capacity</h3>-->
                                <p>Boosting Productivity With A New Deep-Hole Drilling Machine for Seamless Bores</p>
                                <i class="fa-solid fa-caret-left"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row  time-line-section">
                        <div class="line">
                            <span></span>
                        </div>
                        <div class="year" data-aos="zoom-in">
                            <h6>
                                2025
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <div class="time-line-box right-icon" data-aos="fade-right">
                                <!--<h3>Improved R&D</h3>-->
                                <p>The New Year Begins And YOPL Acquires A New 110,000 sq ft Of Land For Further Expansions
                                </p>
                                <i class="fa-solid fa-caret-right"></i>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>

                    </div>
                    <h3 id="whyus" style="font-size:38px !important;font-weight:700;">Why Us?</h3>
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
            </div>
    </section>
@endsection

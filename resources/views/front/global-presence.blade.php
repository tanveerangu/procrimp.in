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
                        <h1>Global Presence</h1>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li><i class="fas fa-angle-right"></i></li>
                            <li>Global Presence</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- :: GLOBAL PRESENCE FULLSCREEN HERO -->
<section style="
    width:100vw;
    height:100vh;
    margin-left:calc(-50vw + 50%);
    overflow:hidden;
    position:relative;
">

    <img src="{{ asset('assets/images/GLOBAL PRESENCE.png') }}"
        alt="Global Presence"
        style="
            width:100%;
            height:100%;
            object-fit:cover;
            object-position:center;
            display:block;
        ">

</section>

    <!-- :: About US -->
    <!--<section class="about-us home-2 py-100" id="start">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-lg-7">-->
    <!--                <div class="about-us-text-box">-->
    <!--                    <div class="sec-title home-2">-->
    <!--                        <h2>Welcome to Pro Crimp</h2>-->
    <!--                        <h3>We Served 25 Years Of Undefeated Success</h3>-->
    <!--                        <p class="sec-explain">-->
    <!--                            At the out set we would like to introduce ourselves as a leading company-->
    <!--                            in the manufacturing of Pipe End Fittings & Assembly. “Yuvraj Overseas Pvt. Ltd.”,-->
    <!--                            is established in 2005, under the dynamic leadership of S. Kuldeep Singh, our firm has now-->
    <!--                            become the largest Manufacturer, Distributor, Trader and Supplier of Pipe Fitting Part,-->
    <!--                            Hose Pipe, Pressure Nut, Brass Pipe Nipple, Metal Flange, Hydraulic Hose Assembly, etc.-->
    <!--                            Our product range is highly appreciated among our clients owing to unique features like-->
    <!--                            durability, reliability and dimensional accuracy. These are designed accurately and-->
    <!--                            precisely using cutting edge tools. We accept payment via a number of transaction gateways-->
    <!--                            such as cash and cheque.-->

    <!--                            We make shipment via cargo and road so that the consignment may be safely delivered to our-->
    <!--                            clients’ door.-->
    <!--                        </p>-->
    <!--                    </div>-->

    <!--                    <div class="features-style-2">-->
    <!--                        <div class="row">-->
    <!--                            <div class="col-sm-6">-->
    <!--                                <div class="item">-->
    <!--                                    <i class="ar-icons-toolbox"></i>-->
    <!--                                    <div class="content-box">-->
    <!--                                        <h5>QUALITATIVE PRODUCTS RANGE</h5>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-sm-6">-->
    <!--                                <div class="item">-->
    <!--                                    <i class="ar-icons-trolley"></i>-->
    <!--                                    <div class="content-box">-->
    <!--                                        <h5>MODERN MACHINERY</h5>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="col-lg-5">-->
    <!--                <div class="about-us-img-box">-->
    <!--                    <div class="img-box"-->
    <!--                        style="background-image: url({{ asset('assets/images/about-us/about.png') }})">-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
@endsection
<!doctype html>
<html lang="en">

<head>
    <!-- :: Required Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <!-- :: Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- :: Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    <!-- :: Title -->
    <title>PRO CRIMP</title>

    <!-- :: Google Fonts -->
    <link rel="stylesheet"
        href="../../../../fonts.googleapis.com/css232b2.css?family=Barlow:wght@400;500;600;700&amp;family=Heebo:wght@400;500;600;700&amp;display=swap">

    <!-- :: Fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <!-- :: Flaticon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/style.css') }}">

    <!-- :: Animate -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <!-- :: Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">

    <!-- :: Lity -->
    <link rel="stylesheet" href="{{ asset('assets/css/lity.min.css') }}">

    <!-- :: Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">

    <!-- :: Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

    <!-- :: Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- :: Style Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <!-- :: Animation-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


</head>

<body>
    <div class="tsh-icon">
        <span class="minimize-btn ps-3 pe-3" onclick="toggleSticky()" id="toggleArrow">←</span>
        <div class="sticky-contact" id="stickyContact">


            <a href="https://wa.me/91{{ $setting->phone }}" class="contact-item">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
            <a href="tel: +91 {{ $setting->phone }}" class="contact-item">
                <i class="fa-solid fa-square-phone"></i>
            </a>
        </div>
    </div>
    <!-- :: Loading -->

    {{-- @dd($categoriesdata) --}}
    <!-- :: All Navbar -->
    <header class="all-navbar home-2" style="overflow-x: clip;">

        <!-- :: Top Navbar -->
        <div class="top-navbar">
            <div class="container-fluid">
                <div class="content-box d-flex align-items-center justify-content-between">
                    <ul class="website-info">
                        <li>
                            <i class="far fa-envelope"></i>
                            <a href="mailto:{{ $setting->email }}" class="text-light">{{ $setting->email }}</a>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $setting->address }}
                        </li>
                    </ul>
                    <ul class="website-icon-social">
                        <li><a href="#" class="text-light"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="text-light"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" class="text-light"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" class="text-light"><i class="fab fa-youtube"></i></a></li>

                    </ul>
                </div>
            </div>
        </div>

        <!-- :: Navbar -->
        <nav class="nav-bar">
            <div class="container-fluid">
                <div class="content-box d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <a href="{{ route('front.home') }}" class="logo-nav">
                            {{-- <img class="img-fluid one" src="assets/images/logo/01_logo.png" alt="01 Logo"> --}}
                            <img class="img-fluid two" src="{{ asset('setting-images/' . $setting->website_logo) }}"
                                alt="02 Logo">
                        </a>
                        <a href="#open-nav-bar-menu" class="open-nav-bar">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                    <div class="nav-bar-links ms-5" id="open-nav-bar-menu">
                        <ul class="level-1">
                            <li class="item-level-1">
                                <a href="{{ route('front.home') }}" class="link-level-1 color">Home</a>
                            </li>
                            <li class="item-level-1 has-menu">
                                <a href="{{ route('front.about') }}" class="link-level-1"
                                    onclick="window.location.href='{{ route('front.about') }}'">Who We Are</a>
                                <ul class="level-2">
                                    <li class="item-level-2"><a class="link-level-2" href="#time">History &
                                            Timeline</a></li>
                                    <li class="item-level-2"><a class="link-level-2" href="#mission">Mission &
                                            Vision</a></li>
                                    <li class="item-level-2"><a class="link-level-2" href="#values">Core Values</a>
                                    </li>
                                    <li class="item-level-2"><a class="link-level-2" href="#whyus">Why Us?</a></li>
                                </ul>
                            </li>
                            <li class="item-level-1">
                                <a href="{{ route('front.global-presence') }}" class="link-level-1">Global
                                    Presence</a>
                            </li>
                            <li class="item-level-1 has-menu">
                                <a href="{{ route('front.products') }}" class="link-level-1"
                                    onclick="window.location.href='{{ route('front.products') }}'">Our Products</a>
                                <ul class="level-2">
                                    @foreach ($categoriesdata as $category)
                                        <li class="item-level-2 has-menu">
                                            <a class="link-level-2"
                                                href="{{ route('front.product-category', $category->slug) }}"
                                                onclick="window.location.href='{{ route('front.product-category', $category->slug) }}'">
                                                {{ $category->title }}
                                            </a>

                                            <!-- Recursive function for nested categories -->
                                            @if ($category->subcategories->isNotEmpty())
                                                <ul class="level-3">
                                                    @foreach ($category->subcategories as $subcategory)
                                                        <li class="item-level-3 has-menu">
                                                            <a class="link-level-3"
                                                                href="{{ route('front.product-category', $subcategory->slug) }}"
                                                                onclick="window.location.href='{{ route('front.product-category', $subcategory->slug) }}'">
                                                                {{ $subcategory->title }}
                                                            </a>
                                                            {{-- @if ($subcategory->products->isNotEmpty())
                                                                <ul class="level-4 ">
                                                                    @foreach ($subcategory->products as $product)
                                                                        <li class="item-level-4">
                                                                            <a class="link-level-4"
                                                                                href="{{ route('front.product-details', $product->slug) }}">{{ $product->title }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif --}}
                                                            <!-- Sub-sub-categories dropdown -->
                                                            {{-- @if ($subcategory->subcategories->isNotEmpty())
                                                                <ul class="level-4">
                                                                    @foreach ($subcategory->subcategories as $subsubcategory)
                                                                        <li class="item-level-4 has-menu">
                                                                            <a class="link-level-4"
                                                                                href="{{ route('front.product-category', $subsubcategory->slug) }}"
                                                                                onclick="window.location.href='{{ route('front.product-category', $subsubcategory->slug) }}'">
                                                                                {{ $subsubcategory->title }}
                                                                            </a> --}}
                                                            <!-- Products dropdown if available -->
                                                            {{-- @if ($subsubcategory->products->isNotEmpty())
                                                                                <ul class="level-5 ">
                                                                                    @foreach ($subsubcategory->products as $product)
                                                                                        <li class="item-level-5">
                                                                                            <a class="link-level-5"
                                                                                                href="{{ route('front.product-details', $product->slug) }}">{{ $product->title }}</a>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            @endif --}}
                                                            {{-- </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif --}}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="item-level-1">
                                <a href="{{ route('front.infrastructure') }}" class="link-level-1">Infrastructure</a>
                            </li>
                            <li class="item-level-1 has-menu">
                                <a href="{{ route('front.quality') }}" class="link-level-1"
                                    onclick="window.location.href='{{ route('front.quality') }}'">Quality</a>
                                <ul class="level-2">
                                    <li class="item-level-2"><a class="link-level-2"
                                            href="{{ route('front.quality') }}/#certificate">Certifications</a></li>
                                    <li class="item-level-2"><a class="link-level-2"
                                            href="{{ route('front.quality') }}/#assurance">Assurance</a>
                                    </li>
                                    <li class="item-level-2"><a class="link-level-2"
                                            href="{{ route('front.quality') }}/#lab">R & D Centre</a></li>
                                </ul>
                            </li>
                            <li class="item-level-1">
                                <a href="{{ route('front.news') }}" class="link-level-1">News</a>
                            </li>
                            <li class="item-level-1">
                                <a href="{{ route('front.catalog') }}" class="link-level-1">Catalog</a>
                            </li>
                            <li class="item-level-1">
                                <a href="{{ route('front.contact') }}" class="link-level-1">How To Reach Us</a>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav-bar-tools d-flex align-items-center justify-content-between">
                        <li class="item buttons">
                            <a class="btn-1 btn-3" href="{{ route('front.contact') }}"><span>Contact Now</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @section('main')
    @show

    <!-- :: Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="logo">
                        <img class="img-fluid" src="{{ asset('setting-images/' . $setting->website_logo) }}"
                            alt="Footer Logo" style="filter: invert(1)">
                        <p>At the out set we would like to introduce ourselves as a leading company in the manufacturing
                            of Pipe End Fittings & Assembly. “Yuvraj Overseas Pvt. Ltd.”, is established in 2005, under
                            the dynamic leadership of S. Kuldeep Singh</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 text-center">
                    <div class="footer-title">
                        <h4>Quick Link</h4>
                    </div>
                    <ul class="links">
                        <li><a href="{{ route('front.about') }}">Who We Are</a></li>
                        <li><a href="{{ route('front.global-presence') }}">Global Presence</a></li>
                        <li><a href="{{ route('front.infrastructure') }}">Infrastructure</a></li>
                        <li><a href="{{ route('front.quality') }}">Quality</a></li>
                        <li><a href="{{ route('front.news') }}">News</a></li>
                        <li><a href="{{ route('front.catalog') }}">Catalog</a></li>
                        <li><a href="{{ route('front.contact') }}">How To Reach Us</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="footer-title">
                        <h4>Industries</h4>
                    </div>
                    <ul class="links">
                        @foreach ($bannerData as $item)
                            <li><a>{{ $item->title }}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <p>@ 2024 Procrimp by <a class="text-decoration-none" href="https://digitalconnexions.in/">Digital
                        Connexions</a>.</p>
            </div>
        </div>
    </footer>

    <!-- :: Scroll UP -->
    <div class="scroll-up">
        <a class="move-section" href="#page">
            <i class="fas fa-long-arrow-alt-up"></i>
        </a>
    </div>

    {{-- product category page script --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".btn-toggle").forEach(function(btn) {
                btn.addEventListener("click", function(e) {
                    e.stopPropagation(); // prevent triggering parent link
                    e.preventDefault(); // prevent anchor behavior

                    const toggleId = this.getAttribute("data-toggle-id");
                    const subCat = document.getElementById(toggleId);

                    if (subCat.style.display === "none" || subCat.style.display === "") {
                        subCat.style.display = "block";
                        this.textContent = "-";
                    } else {
                        subCat.style.display = "none";
                        this.textContent = "+";
                    }
                });
            });
        });
    </script>

    {{-- product category page script --}}
    <script>
        var app = document.getElementById('app');

        var typewriter = new Typewriter(app, {
            loop: true,
            delay: 75,
        });

        typewriter
            .pauseFor(2500)
            .typeString('A simple yet powerful native javascript')
            .pauseFor(300)
            .deleteChars(10)
            .typeString('<strong>JS</strong> plugin for a cool typewriter effect and ')
            .typeString('<strong>only <span style="color: #27ae60;">5kb</span> Gzipped!</strong>')
            .pauseFor(1000)
            .start();

        function toggleSticky() {
            const stickyContact = document.getElementById('stickyContact');
            const toggleArrow = document.getElementById('toggleArrow');

            // Toggle visibility of contact items by moving the container offscreen
            if (stickyContact.classList.contains('collapsed')) {
                stickyContact.classList.remove('collapsed');
                toggleArrow.textContent = '←';
            } else {
                stickyContact.classList.add('collapsed');
                toggleArrow.textContent = '→';
            }
        }

        const imgs = document.querySelectorAll('.img-select a');
        const imgBtns = [...imgs];
        let imgId = 1;

        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener('click', (event) => {
                event.preventDefault();
                imgId = imgItem.dataset.id;
                slideImage();
            });
        });

        function slideImage() {
            const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

            document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
        }

        window.addEventListener('resize', slideImage);


        document.addEventListener('DOMContentLoaded', function() {
            // Capture the product catalog ID when the modal is opened
            document.querySelectorAll('.open-modal').forEach(button => {
                button.addEventListener('click', function() {
                    const productCatalogId = this.getAttribute('data-id');
                    document.getElementById('productCatalogId').value = productCatalogId;
                });
            });

            // Handle the form submission via AJAX
            document.getElementById('catalogForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);

                fetch('{{ route('front.catalog-submit') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: formData,
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(data => {
                                alert('Error: ' + data.error);
                                throw new Error('Form submission failed');
                            });
                        }
                        return response.blob(); // Get the PDF file blob dynamically
                    })
                    .then(blob => {
                        if (blob) {
                            // Create a temporary download link
                            const link = document.createElement('a');
                            const url = window.URL.createObjectURL(blob);
                            link.href = url;
                            link.download =
                                `product_catalog_${document.getElementById('productCatalogId').value}.pdf`; // Dynamic file name
                            link.click();
                            window.URL.revokeObjectURL(url);

                            // Close the modal
                            const modal = bootstrap.Modal.getInstance(document.getElementById(
                                'exampleModal'));
                            modal.hide();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>

    <!-- :: Animation Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


    <!-- :: JavaScript Files -->
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <!-- :: jQuery JS -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- :: Bootstrap JS Bundle With Popper JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- :: Owl Carousel JS -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    <!-- :: Lity -->
    <script src="{{ asset('assets/js/lity.min.js') }}"></script>

    <!-- :: Nice Select -->
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>

    <!-- :: Waypoints -->
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>

    <!-- :: CounterUp -->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>

    <!-- :: Magnific Popup -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

    <!-- :: MixitUp -->
    <script src="{{ asset('assets/js/mixitup.min.js') }}"></script>

    <!-- :: Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-script.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.main-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.thumb-slider'
            });

            $('.thumb-slider').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                asNavFor: '.main-slider',
                dots: false,
                centerMode: false,
                focusOnSelect: true
            });
        });
    </script>

</body>

</html>

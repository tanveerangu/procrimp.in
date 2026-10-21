<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.0/tinymce.min.js"
        integrity="sha512-E2dqytT185qVoAL0sfqr39BLHEBQtmZze59ChMjYi4vRUW6BzIBLZAqErdQAAAJX8bkFq2kQgQL9Lbpm8Uuw0Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body style="background-color:goldenrod">
    <div id="app">
        <div class="container-fluid main">
            <div class="row">
                <button class="btn d-md-none sidebar-btn" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebar">
                    <i class="fa-solid fa-arrows-to-circle"></i>
                </button>


                <!-- Sidebar -->
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="height: 100vh;">
                    <div class="logo">
                        <h3><a href="{{ route('admin.index') }}">{{ $setting->website_name }}</a></h3>
                    </div>

                    <hr class="text-light">
                    <div class="position-sticky">
                        <ul class="nav flex-column">
                            @if (Auth::check())
                                {{-- <button class="btn width-control-btn">
                                    <i class="fa-solid fa-left-right"></i>
                                </button> --}}
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('admin.enquires.index') }}">
                                        <i class="fa-solid fa-list-check"></i> Enquiry
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('admin.catalog') }}">
                                        <i class="fa-solid fa-list-check"></i> Catalog Form
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('admin.pages.index') }}">
                                        <i class="fa-regular fa-file"></i> Pages
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.categories.index') }}">
                                        <i class="fa-solid fa-table-cells"></i> Categories
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.products.index') }}">
                                        <i class="fa-solid fa-boxes-packing"></i> Products
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.infrastructures.index') }}">
                                        <i class="fa-solid fa-road-bridge"></i> Infrastructure
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.productCatelogs.index') }}">
                                        <i class="fa-solid fa-c"></i> Product Catalog
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.testimonials.index') }}">
                                        <i class="fa-solid fa-newspaper"></i> Testimonials
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.banner.index') }}">
                                        <i class="fa-solid fa-sliders"></i> Banners
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.blogs.index') }}">
                                        <i class="fa-solid fa-blog"></i> Blogs
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.social-links.index') }}">
                                        <i class="fa-solid fa-icons"></i> Social Links
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.setting') }}">
                                        <i class="fa fa-gear"></i> Settings
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.clear-cache') }}">
                                        <i class="fa-solid fa-broom"></i> Cache Clear
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                            class="fa-solid fa-arrow-right-from-bracket"></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('login') }}"><i
                                            class="fa-solid fa-arrow-right-to-bracket"></i> {{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('register') }}"><i
                                            class="fa-solid fa-user-plus"></i> {{ __('Register') }}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>

                <!-- Main content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-2 py-2">
                    @include('flash-message')
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <!-- Include FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://unpkg.com/tiny-editor/dist/bundle.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.25.0/ckeditor.js"></script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const widthControlBtn = document.querySelector('.width-control-btn');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('main');

            widthControlBtn.addEventListener('click', function() {
                // Toggle sidebar width and main content adjustment
                sidebar.classList.toggle('sidebar-minimized');
                mainContent.classList.toggle('main-content-expanded');
            });
        });

        const demoBaseConfig = {
            selector: 'textarea',
            width: "100%",
            height: 300,
            resize: false,
            autosave_ask_before_unload: false,
            powerpaste_allow_local_images: true,
            plugins: [
                'a11ychecker', 'advcode', 'advlist', 'anchor', 'autolink', 'codesample', 'fullscreen', 'help',
                'image', 'editimage', 'tinydrive', 'lists', 'link', 'media', 'powerpaste', 'preview',
                'searchreplace', 'table', 'tinymcespellchecker', 'visualblocks', 'wordcount'
            ],
            toolbar: 'insertfile a11ycheck undo redo | bold italic | forecolor backcolor | codesample | alignleft aligncenter alignright alignjustify | bullist numlist | link image',
            spellchecker_dialog: true,
            spellchecker_ignore_list: ['Ephox', 'Moxiecode'],
            tinydrive_demo_files_url: '../_images/tiny-drive-demo/demo_files.json',
            tinydrive_token_provider: (success, failure) => {
                success({
                    token: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJqb2huZG9lIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.Ks_BdfH4CWilyzLNk8S2gDARFhuxIauLa8PwhdEQhEo'
                });
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        };

        tinymce.init(demoBaseConfig);
    </script>

</body>

</html>

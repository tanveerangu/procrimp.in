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
                        <h1>Infrastructure</h1>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li><i class="fas fa-angle-right"></i></li>
                            <li>Infrastructure</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="projects home-2 py-100-70 infra">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12 col-lg-12">
                    <div class="projects-item">
                        <span></span>
                        <div class="img-box">
                            <img class="img-fluid projects-item-img"
                                src="{{ asset('infrastructure-images/' . $infrastructures[0]->image) }}" alt="01 projects" style="height:400px; object-fit:cover;">
                                <div class="infrastructure-title">
                                    <h4><a>{{ $infrastructures[0]->title }}</a></h4>
                                </div>
                        </div>
                            
                        
                    </div>
                </div>
                
                @foreach ($infrastructures->skip(1) as $item)
                <div class="col-md-6 col-lg-6">
                    <div class="projects-item">
                        <span></span>
                        <div class="img-box">
                            <img class="img-fluid projects-item-img"
                                src="{{ asset('infrastructure-images/' . $item->image) }}" alt="01 projects">
                                <div class="infrastructure-title">
                                    <h4><a>{{ $item->title }}</a></h4>
                                </div>
                        </div>
                            
                       
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

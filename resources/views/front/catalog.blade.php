@extends('layouts.app')

@section('main')

    {{-- Breadcrumb Header --}}
    <section class="breadcrumb-header" id="page"
        style="background-image: url(assets/images/header/01_breadcrumb-header.jpg)">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="banner">
                        <h1>Catalog</h1>
                        <ul>
                            <li><a href="{{ route('front.home') }}">Home</a></li>
                            <li><i class="fas fa-angle-right"></i></li>
                            <li>Catalog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Catalog Section --}}
    <section class="about-us home-2 py-100" id="start">
        <div class="container">
            <div class="row">
                @foreach ($productCatalogs as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item">
                            <div class="img-box">
                                <a href="javascript:void(0);" class="open-post">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" />
                                </a>
                            </div>
                            <div class="text-box text-center border pb-4 p-0">
                                <a href="javascript:void(0);" 
                                   data-id="{{ $item->id }}" 
                                   data-bs-toggle="modal"
                                   data-bs-target="#exampleModal"
                                   class="btn-1 btn-3 link open-modal">
                                    <span>View Catalog</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="add-comments">
                    <form id="catalogForm" 
                          class="inner-add-comments form-contact-2" 
                          method="POST"
                          action="{{ route('front.catalog-submit') }}">
                        @csrf

                        {{-- FIXED: Removed loop variable and will set via JS --}}
                        <input type="hidden" name="product_catalog_id" id="productCatalogId">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Catalog Form</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 inner-add-comments-box">
                                    <input type="text" name="name" placeholder="Name" required>
                                </div>
                                <div class="col-md-12 inner-add-comments-box">
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-12 inner-add-comments-box">
                                    <input type="text" name="phone" placeholder="Phone" required>
                                </div>
                                <div class="col-md-12 inner-add-comments-box">
                                    <input type="text" name="company" placeholder="Company">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById('exampleModal');
            modal.addEventListener('show.bs.modal', function (event) {
                document.getElementById('productCatalogId').value =
                    event.relatedTarget.getAttribute('data-id');
            });
        });
    </script>

@endsection

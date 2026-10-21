<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\InfrastructureController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductCatalogController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes([
    'register' => false
]);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/catalog', [AdminController::class, 'catalogForm'])->name('catalog');
    Route::get('/clear-cache', [AdminController::class, 'clearCache'])->name('clear-cache');
    Route::get('/setting', [SettingController::class, 'settings'])->name('setting');
    Route::post('/setting-store', [SettingController::class, 'settingStore'])->name('setting-store');
    Route::post('/change-password', [SettingController::class, 'changePassword'])->name('change-password');

    Route::prefix('social-links')->name('social-links.')->group(function () {
        Route::get('/', [SocialLinkController::class, 'index'])->name('index');
        Route::get('/create', [SocialLinkController::class, 'create'])->name('create');
        Route::post('/store', [SocialLinkController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SocialLinkController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [SocialLinkController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [SocialLinkController::class, 'delete'])->name('delete');
    });

    Route::prefix('blogs')->name('blogs.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/create', [BlogController::class, 'create'])->name('create');
        Route::post('/store', [BlogController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [BlogController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [BlogController::class, 'delete'])->name('delete');
    });

    Route::prefix('banner')->name('banner.')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('index');
        Route::get('/create', [BannerController::class, 'create'])->name('create');
        Route::post('/store', [BannerController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [BannerController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [BannerController::class, 'delete'])->name('delete');
    });

    Route::prefix('testimonials')->name('testimonials.')->group(function () {
        Route::get('/', [TestimonialController::class, 'index'])->name('index');
        Route::get('/create', [TestimonialController::class, 'create'])->name('create');
        Route::post('/store', [TestimonialController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [TestimonialController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [TestimonialController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [TestimonialController::class, 'delete'])->name('delete');
    });

    Route::prefix('aboutUs')->name('aboutUs.')->group(function () {
        Route::get('/', [AboutUsController::class, 'aboutUs'])->name('edit');
        Route::post('/store', [AboutUsController::class, 'aboutUsStore'])->name('store');
    });

    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
        Route::post('image-destroy', [ProductController::class, 'destroyImage'])->name('image-destroy');
        Route::get('/delete-pdf/{id}', [ProductController::class, 'deletePdf'])->name('delete-pdf');
    });

    Route::prefix('enquires')->name('enquires.')->group(function () {
        Route::get('/', [EnquiryController::class, 'index'])->name('index');
    });

    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });

    Route::prefix(prefix: 'pages')->name('pages.')->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('index');
        Route::get('/create', [PageController::class, 'create'])->name('create');
        Route::post('/store', [PageController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PageController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [PageController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [PageController::class, 'delete'])->name('delete');
    });

    Route::prefix('infrastructures')->name('infrastructures.')->group(function () {
        Route::get('/', [InfrastructureController::class, 'index'])->name('index');
        Route::get('/create', [InfrastructureController::class, 'create'])->name('create');
        Route::post('/store', [InfrastructureController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [InfrastructureController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [InfrastructureController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [InfrastructureController::class, 'delete'])->name('delete');
    });

    Route::prefix('productCatelogs')->name('productCatelogs.')->group(function () {
        Route::get('/', [ProductCatalogController::class, 'index'])->name('index');
        Route::get('/create', [ProductCatalogController::class, 'create'])->name('create');
        Route::post('/store', [ProductCatalogController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductCatalogController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductCatalogController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [ProductCatalogController::class, 'delete'])->name('delete');
    });
});

// fornt Routes

Route::get('/', [HomeController::class, 'homePage'])->name('front.home');
Route::get('/about', [HomeController::class, 'about'])->name('front.about');
Route::get('/products', [HomeController::class, 'products'])->name('front.products');
Route::get('/product-details/{slug}', [HomeController::class, 'productDetails'])->name('front.product-details');

Route::get('/product-category/{slug}', [HomeController::class, 'productCategory'])->name('front.product-category');

Route::get('/global-presence', [HomeController::class, 'globalPresence'])->name('front.global-presence');
Route::get('/infrastructure', [HomeController::class, 'infrastructure'])->name('front.infrastructure');
Route::get('/quality', [HomeController::class, 'quality'])->name('front.quality');
Route::get('/news', [HomeController::class, 'news'])->name('front.news');
Route::get('/blog-details/{id}', [HomeController::class, 'blogDetails'])->name('front.blog-details');
Route::get('/catalog', [HomeController::class, 'catalog'])->name('front.catalog');
Route::get('product-catelogs/download/{id}', [HomeController::class, 'downloadPDF'])->name('front.product-catelog-download');
Route::post('/catalog-submit', [HomeController::class, 'submitCatalogForm'])->name('front.catalog-submit');
Route::get('/contact', [HomeController::class, 'contact'])->name('front.contact');

Route::post('/enquiry', [HomeController::class, 'enquiry'])->name('front.enquiry');

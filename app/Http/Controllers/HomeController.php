<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Support\Facades\URL;
use App\Models\Blog;
use App\Models\CatalogForm;
use App\Models\Product;
use App\Models\Category;
use App\Models\Enquiry;
use App\Models\Infrastructure;
use App\Models\ProductCatalog;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function homePage()
    {
        $banners = Banner::get();
        $products = Product::get();

        return view('front.home', compact('products', 'banners'));
    }
    public function about()
    {
        return view('front.about');
    }
    public function products()
    {
        $products = Product::get();
        $categories = Category::where('parent_id', null)->get();
        return view('front.products', compact('products', 'categories'));
    }
    // public function productDetails($slug)
    // {
    //     $product = Product::with('productImages', 'category')->where('slug', $slug)->firstOrFail();
    //     $relatedProducts = [];

    //     if (isset($product->category->id)) {
    //         $relatedProducts = Product::where('category_id', $product->category->id)
    //             ->where('id', '!=', $product->id) // Exclude the current product
    //             ->with('productImages')
    //             ->get();
    //     }

    //     // dd($relatedProducts);

    //     return view('front.product-details', compact('product', 'relatedProducts'));
    // }

    public function productDetails($slug)
    {
        $product = Product::with('productImages', 'category.parent')->where('slug', $slug)->firstOrFail();

        $relatedProducts = [];

        if (isset($product->category->id)) {
            $relatedProducts = Product::where('category_id', $product->category->id)
                ->where('id', '!=', $product->id)
                ->with('productImages')
                ->get();
        }

        // Generate category breadcrumbs
        $breadcrumbs = collect();
        $category = $product->category;

        while ($category) {
            $breadcrumbs->prepend($category); // add to beginning
            $category = $category->parent;
        }

        return view('front.product-details', compact('product', 'relatedProducts', 'breadcrumbs'));
    }

    public function globalPresence()
    {
        return view('front.global-presence');
    }
    public function infrastructure()
    {
        $infrastructures = Infrastructure::paginate(10);
        return view('front.infrastructure', compact('infrastructures'));
    }
    public function quality()
    {
        return view('front.quality');
    }
    public function news()
    {
        $blogs = Blog::get();
        return view('front.news', compact('blogs'));
    }
    public function blogDetails($id)
    {
        $blog = Blog::where('id', $id)->firstOrFail();
        $blogdata = Blog::get();
        return view('front.blog-details', compact('blog', 'blogdata'));
    }
    public function catalog()
    {
        $productCatalogs = ProductCatalog::latest()->paginate(6);
        return view('front.catalog', compact('productCatalogs'));
    }

    /**
     * Step 1: visitor fills the form. We save it and send them to the
     * secure viewer page (a temporary signed link, valid 30 minutes).
     */
    public function submitCatalogForm(Request $request)
    {
        $data = $request->validate([
            'product_catalog_id' => 'required|exists:product_catalogs,id',
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:30',
            'company' => 'nullable|string|max:150',
            'action' => 'nullable|in:view,download',
        ]);

        $catalog = ProductCatalog::findOrFail($data['product_catalog_id']);
        if (!$catalog->pdfFullPath() || !file_exists($catalog->pdfFullPath())) {
            return redirect()->back()->with('error', 'PDF file not found.');
        }

        $lead = CatalogForm::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'company' => $data['company'] ?? null,
        ]);

        // "Download" button -> straight to the file download
        if (($data['action'] ?? 'view') === 'download') {
            return redirect()->to(
                URL::temporarySignedRoute('front.catalog-download', now()->addMinutes(30), [
                    'id' => $catalog->id,
                    'lead' => $lead->id,
                ])
            );
        }

        // "View" button -> secure viewer page
        return redirect()->to(
            URL::temporarySignedRoute('front.catalog-view', now()->addMinutes(30), [
                'id' => $catalog->id,
                'lead' => $lead->id,
            ])
        );
    }

    /**
     * Step 2: view-only page (PDF.js draws the pages on canvas).
     */
    public function viewCatalog(Request $request, $id, $lead)
    {
        $catalog = ProductCatalog::findOrFail($id);
        $leadRow = CatalogForm::findOrFail($lead);

        $fileUrl = URL::temporarySignedRoute('front.catalog-file', now()->addMinutes(30), [
            'id' => $catalog->id,
            'lead' => $leadRow->id,
        ]);

        // Text that is burned into every page as a watermark
        $downloadUrl = URL::temporarySignedRoute('front.catalog-download', now()->addMinutes(30), [
            'id' => $catalog->id,
            'lead' => $leadRow->id,
        ]);

        $watermark = trim($leadRow->name . ' | ' . $leadRow->phone . ' | ' . $leadRow->email);

        return response()
            ->view('front.catalog-view', compact('catalog', 'fileUrl', 'downloadUrl', 'watermark'))
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('X-Frame-Options', 'SAMEORIGIN');
    }

    /**
     * Download (works on phone and laptop). Needs a valid signed link,
     * which is only given after the form is filled.
     */
    public function downloadCatalog($id, $lead)
    {
        $catalog = ProductCatalog::findOrFail($id);
        $path = $catalog->pdfFullPath();
        abort_unless($path && file_exists($path), 404);

        $name = \Illuminate\Support\Str::slug($catalog->title ?: 'catalog') . '.pdf';

        return response()->download($path, $name, [
            'Content-Type' => 'application/pdf',
            'Cache-Control' => 'no-store',
        ]);
    }

    /**
     * Step 3: the PDF bytes. Only works with a valid signed link and only
     * when requested by the viewer script (not by typing the link in the
     * address bar, not as a download).
     */
    public function catalogFile(Request $request, $id, $lead)
    {
        // Browser navigation / download / new tab => Sec-Fetch-Dest is "document" or "iframe"
        $dest = $request->header('Sec-Fetch-Dest');
        if (in_array($dest, ['document', 'iframe', 'embed', 'object'], true)) {
            abort(403);
        }

        $catalog = ProductCatalog::findOrFail($id);
        $path = $catalog->pdfFullPath();
        if (!$path || !file_exists($path)) {
            abort(404);
        }

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
            'X-Content-Type-Options' => 'nosniff',
        ]);
    }


    public function productCategory($slug)
    {
        // Get category with recursive subcategories
        $category = Category::where('slug', $slug)->with('allSubcategories', 'parent', 'subcategories')->first();
        if (!$category) {
            return abort(404, 'Category not found');
        }

        // Collect category and all its subcategories' IDs
        // $categoryIds = $this->collectCategoryAndSubcategoryIds($category);

        // Get all products with category_id in collected IDs
        // $products = Product::whereIn('category_id', $categoryIds)->with('productImage')->get();

        $products = Product::where('category_id', $category->id)->with('productImage')->get();



        // Top-level categories (optional)
        $categories = Category::where('parent_id', null)->get();

        // Build breadcrumbs (traverse up the category tree)
        $breadcrumbs = collect();
        $current = $category;
        while ($current) {
            $breadcrumbs->prepend($current);
            $current = $current->parent;
        }
        // dd($products);

        return view('front.product-category', compact('products', 'category', 'categories', 'breadcrumbs'));
    }
    /**
     * Recursive helper method to collect IDs of a category and all nested subcategories
     *
     * @param Category $category
     * @return array
     */

    private function collectCategoryAndSubcategoryIds(Category $category)
    {
        $ids = [$category->id];
        if ($category->relationLoaded('allSubcategories')) {
            foreach ($category->allSubcategories as $subcategory) {
                $ids = array_merge($ids, $this->collectCategoryAndSubcategoryIds($subcategory));
            }
        }
        return $ids;
    }


    public function contact()
    {
        return view('front.contact');
    }


    public function enquiry(Request $request)
    {

        Enquiry::create($request->all());

        return redirect()->back()->with('success', 'Thanks For Sending Message.');
    }
}

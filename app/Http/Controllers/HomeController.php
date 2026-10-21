<?php

namespace App\Http\Controllers;

use App\Models\Banner;
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

    public function downloadPDF($id)
    {
        $productCatelog = ProductCatalog::findOrFail($id);
        $pdfPath = public_path($productCatelog->pdf);
        if (file_exists($pdfPath)) {
            return response()->download($pdfPath);
        } else {
            return redirect()->back()->with('error', 'PDF file not found.');
        }
    }

    public function submitCatalogForm(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'company' => 'nullable',
        ]);

        // Save the form data
        CatalogForm::create($request->all());

        // Get the productCatalogId from the request
        $productCatalogId = $request->product_catalog_id;

        // Find the product catalog and retrieve the PDF path
        $productCatalog = ProductCatalog::findOrFail($productCatalogId);
        $pdfPath = public_path($productCatalog->pdf);

        // Return the PDF file dynamically
        if (file_exists($pdfPath)) {
            return response()->file($pdfPath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="product_catalog_' . $productCatalogId . '.pdf"',
            ]);
        } else {
            return response()->json(['error' => 'PDF file not found.'], 404);
        }
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

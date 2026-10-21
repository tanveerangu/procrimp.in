<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MetaTag;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('productImage')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get()->pluck('title', 'id')->toArray();
        $product = new Product();
        return view('admin.products.create', compact('product', 'categories'));
    }

    public function deletePdf($id)
    {
        $product = Product::findOrFail($id);

        if ($product->pdf && File::exists(public_path($product->pdf))) {
            File::delete(public_path($product->pdf));
            $product->pdf = null;
            $product->save();
        }

        return redirect()->route('admin.products.edit', $id)->with('success', 'PDF deleted successfully.');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'required',
            'slug' => 'required|unique:products|string|regex:/^[a-z0-9-]+$/',
            'pdf' => 'nullable|mimes:pdf|max:20480' // Max 20MB
        ]);

        // Create the product
        $product = Product::create($request->all());

        // Handle the image uploads
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $cleanName = Str::slug($originalName);
                $imageName = $cleanName . '_' . time() . '.' . $extension;
                $imagePath = 'product-images/' . $imageName;
                $image->move(public_path('product-images'), $imageName);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $imagePath,
                ]);
            }
        }

        // Handle meta tags
        if ($request->has('meta_tag')) {
            foreach ($request->meta_tag as $item) {
                MetaTag::create([
                    'product_id' => $product->id,
                    'meta_tag' => $item
                ]);
            }
        }

        // Handle PDF upload
        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            $pdfName = 'product_pdf_' . time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfPath = 'product-pdfs/' . $pdfName;
            $pdfFile->move(public_path('product-pdfs'), $pdfName);

            $product->pdf = $pdfPath;
            $product->save();
        }

        return redirect(route('admin.products.index'))->with('success', 'Product successfully added');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::get()->pluck('title', 'id')->toArray();
        $product = Product::with(['productImages', 'metaTags'])->findOrFail($id);
        return view('admin.products.edit', compact('product', 'id', 'categories'));
    }

    public function destroyImage(Request $request)
    {
        $imageId = $request->input('image_id');
        $image = ProductImage::findOrFail($imageId);

        // Delete the image file from the public directory
        if (File::exists(public_path($image->image))) {
            File::delete(public_path($image->image));
        }

        // Delete the image record from the database
        $image->delete();

        return response()->json(['success' => true]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'required|unique:products,slug,' . $id . ',id|string|regex:/^[a-z0-9-]+$/',
            'pdf' => 'nullable|mimes:pdf|max:20480' // Add this line for PDF validation
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        // Handle image uploads
        if ($request->hasFile('image')) {
            $product->load('productImages');

            foreach ($request->file('image') as $image) {
                $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $cleanName = Str::slug($originalName);
                $imageName = $cleanName . '_' . time() . '.' . $extension;
                $imagePath = 'product-images/' . $imageName;
                $image->move(public_path('product-images'), $imageName);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $imagePath,
                ]);
            }
        }

        // Handle meta tags
        if ($request->has('meta_tag')) {
            MetaTag::where('product_id', $id)->delete();
            foreach ($request->meta_tag as $item) {
                MetaTag::create([
                    'product_id' => $product->id,
                    'meta_tag' => $item
                ]);
            }
        }

        // Handle PDF upload
        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            $pdfName = 'product_pdf_' . time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfPath = 'product-pdfs/' . $pdfName;
            $pdfFile->move(public_path('product-pdfs'), $pdfName);

            $product->pdf = $pdfPath;
            $product->save();
        }

        return redirect(route('admin.products.index'))->with('warning', 'Product successfully updated');
    }





    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $product = Product::with('productImages')->findOrFail($id);
        $images = $product->productImages;

        // Delete associated images
        foreach ($images as $image) {
            if ($image->filename) {
                File::delete(public_path('product-images/') . $image->filename);
            }
            $image->delete();
        }

        // Delete single image (if any)
        if ($product->image) {
            File::delete(public_path('product-images/') . $product->image);
        }

        // Delete PDF file if exists
        if ($product->pdf) {
            File::delete(public_path($product->pdf));
        }

        // Delete the product
        $product->delete();

        return redirect(route('admin.products.index'))->with('error', 'Product successfully deleted');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductCatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCatelogs = ProductCatalog::latest()->paginate(10);
        return view('admin.productCatelogs.index', compact('productCatelogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productCatelog = new ProductCatalog();
        return view('admin.productCatelogs.create', compact('productCatelog'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image',
            'pdf' => 'required|mimes:pdf|max:10240', // 10MB max size
        ]);

        // Initialize variables for paths
        $imagePath = null;
        $pdfPath = null;

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = 'productCatelog-images/' . $imageName;
            $request->file(key: 'image')->move(public_path('productCatelog-images'), $imageName);
        }

        // Handle PDF upload
        if ($request->hasFile('pdf')) {
            $fileName = time() . '_' . $request->file('pdf')->getClientOriginalName();
            // PRIVATE folder (not reachable from the browser)
            $destinationPath = storage_path('app/private/product_catalogs');

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $request->file('pdf')->move($destinationPath, $fileName);
            $pdfPath = 'product_catalogs/' . $fileName;
        }

        // Create the product catalog entry
        ProductCatalog::create([
            'title' => $request->title,
            'image' => $imagePath,
            'pdf' => $pdfPath,
        ]);

        return redirect()
            ->route('admin.productCatelogs.index')
            ->with('success', 'Product Catalog successfully added');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $productCatelog = ProductCatalog::findOrFail($id);
        return view('admin.productCatelogs.edit', compact('productCatelog', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $productCatelog = ProductCatalog::findOrFail($id);

        // Validate the inputs
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = 'productCatelog-images/' . $imageName;

            // Move the uploaded image
            $request->file('image')->move(public_path('productCatelog-images'), $imageName);

            // Delete the old image if it exists
            if ($productCatelog->image && file_exists(public_path($productCatelog->image))) {
                unlink(public_path($productCatelog->image));
            }

            // Update the image path in the database
            $productCatelog->image = $imagePath;
        }

        // Handle PDF upload
        if ($request->hasFile('pdf')) {
            $fileName = time() . '_' . $request->file('pdf')->getClientOriginalName();
            $pdfPath = 'product_catalogs/' . $fileName;

            // Ensure the directory exists (PRIVATE folder)
            $destinationPath = storage_path('app/private/product_catalogs');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the uploaded PDF
            $request->file('pdf')->move($destinationPath, $fileName);

            // Delete the old PDF if it exists
            $oldPdf = $productCatelog->pdfFullPath();
            if ($oldPdf && file_exists($oldPdf)) {
                unlink($oldPdf);
            }

            // Update the PDF path in the database
            $productCatelog->pdf = $pdfPath;
        }

        // Update other fields
        $productCatelog->title = $request->title;

        // Save the updated product catalog
        $productCatelog->save();

        return redirect(route('admin.productCatelogs.index'))->with('warning', 'Product Catalog successfully updated');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $productCatelog = ProductCatalog::findOrFail($id);
        $oldPdf = $productCatelog->pdfFullPath();
        if ($oldPdf && file_exists($oldPdf)) {
            unlink($oldPdf);
        }
        $productCatelog->delete();
        return redirect(route('admin.productCatelogs.index'))->with('error', 'ProductCatelog successfully Deleted');
    }

    /**
     * Admin-only preview of the private PDF (used in the edit form).
     */
    public function file($id)
    {
        $productCatelog = ProductCatalog::findOrFail($id);
        $path = $productCatelog->pdfFullPath();
        abort_unless($path && file_exists($path), 404);

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline',
            'Cache-Control' => 'no-store',
        ]);
    }
}

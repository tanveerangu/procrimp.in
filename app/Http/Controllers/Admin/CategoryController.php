<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        $categories = Category::pluck('title','id')->toArray();
        return view('admin.categories.create', compact('category','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:categories|string|regex:/^[a-z0-9-]+$/'
        ]);
        $category = Category::create($request->all());
        if ($request->hasFile('image')) {
            $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('category-images'), $imageName);

            if ($category->image) {
                File::delete(public_path('category-images/') . $category->image);
            }
            $category->image = $imageName;
        }
        $category->update($request->except('image'));
        $category->save();
        return redirect(route('admin.categories.index'))->with('success', 'Categorys successfully Added');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::pluck('title','id')->toArray();
        return view('admin.categories.edit', compact('category', 'id','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:categories,slug,'.$id.',id||string|regex:/^[a-z0-9-]+$/'
        ]);
        $category = Category::findOrFail($id);
        if ($request->hasFile('image')) {
            $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('category-images'), $imageName);

            if ($category->image) {
                File::delete(public_path('category-images/') . $category->image);
            }
            $category->image = $imageName;
        }
        $category->update($request->except('image'));
        $category->save();
        return redirect(route('admin.categories.index'))->with('warning', 'Categories successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        if ($category->image) {
            File::delete(public_path('category-images/') . $category->image);
        }
        $products = Product::where('category_id',$id)->get();
        foreach($products as $item){
            $item->category_id = null;
            $item->save();
        }
        $category->delete();
        return redirect(route('admin.categories.index'))->with('error', 'Categories successfully Deleted');
    }
}

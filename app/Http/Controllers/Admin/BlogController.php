<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blog = new Blog();
        return view('admin.blogs.create', compact('blog'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $blog = Blog::create($request->all());
        if ($request->hasFile('image')) {
            $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('blog-images'), $imageName);

            if ($blog->image) {
                File::delete(public_path('blog-images/') . $blog->image);
            }
            $blog->image = $imageName;
        }
        $blog->update($request->except('image'));
        $blog->save();
        return redirect(route('admin.blogs.index'))->with('success', 'Blogs successfully Added');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $blog = Blog::findOrFail($id);
        if ($request->hasFile('image')) {
            $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('blog-images'), $imageName);

            if ($blog->image) {
                File::delete(public_path('blog-images/') . $blog->image);
            }
            $blog->image = $imageName;
        }
        $blog->update($request->except('image'));
        $blog->save();
        return redirect(route('admin.blogs.index'))->with('warning', 'Blogs successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->image) {
            File::delete(public_path('blog-images/') . $blog->image);
        }
        $blog->delete();
        return redirect(route('admin.blogs.index'))->with('error', 'Blogs successfully Deleted');
    }
}

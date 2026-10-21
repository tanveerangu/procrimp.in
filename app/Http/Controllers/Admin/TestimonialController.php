<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $testimonial = new Testimonial();
        return view('admin.testimonials.create', compact('testimonial'));
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
        $testimonial = Testimonial::create($request->all());
        if ($request->hasFile('image')) {
            $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('testimonial-images'), $imageName);

            if ($testimonial->image) {
                File::delete(public_path('testimonial-images/') . $testimonial->image);
            }
            $testimonial->image = $imageName;
        }
        $testimonial->update($request->except('image'));
        $testimonial->save();
        return redirect(route('admin.testimonials.index'))->with('success', 'Testimonials successfully Added');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial', 'id'));
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
        $testimonial = Testimonial::findOrFail($id);
        if ($request->hasFile('image')) {
            $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('testimonial-images'), $imageName);

            if ($testimonial->image) {
                File::delete(public_path('testimonial-images/') . $testimonial->image);
            }
            $testimonial->image = $imageName;
        }
        $testimonial->update($request->except('image'));
        $testimonial->save();
        return redirect(route('admin.testimonials.index'))->with('warning', 'Testimonials successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->image) {
            File::delete(public_path('testimonial-images/') . $testimonial->image);
        }
        $testimonial->delete();
        return redirect(route('admin.testimonials.index'))->with('error', 'Testimonials successfully Deleted');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::latest()->paginate(10);
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $banner = new Banner();
        return view('admin.banners.create', compact('banner'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required'
        ]);
        $banner = Banner::create($request->all());
        if ($request->hasFile('image')) {
            $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('banner-images'), $imageName);

            if ($banner->image) {
                File::delete(public_path('banner-images/') . $banner->image);
            }
            $banner->image = $imageName;
        }
        $banner->update($request->except('image'));
        $banner->save();
        return redirect(route('admin.banner.index'))->with('success', 'Banners successfully Added');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banner', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        if ($request->hasFile('image')) {
            $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('banner-images'), $imageName);

            if ($banner->image) {
                File::delete(public_path('banner-images/') . $banner->image);
            }
            $banner->image = $imageName;
        }
        $banner->update($request->except('image'));
        $banner->save();
        return redirect(route('admin.banner.index'))->with('warning', 'Banners successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $banner = Banner::findOrFail($id);
        $image = $banner->image;
        $banner->delete();
        if ($image) {
            File::delete(public_path('banner-images/') . $image);
        }
        return redirect(route('admin.banner.index'))->with('error', 'Banners successfully Deleted');
    }
}

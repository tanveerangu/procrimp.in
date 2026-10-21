<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialLinks = SocialLink::latest()->paginate(10);
        return view('admin.social-links.index', compact('socialLinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $socialLink = new SocialLink();
        return view('admin.social-links.create', compact('socialLink'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'url' => 'required'
        ]);
        $socialLink = SocialLink::create($request->all());
        if ($request->hasFile('icon')) {
            $imageName = Str::random(10) . '.' . $request->file('icon')->getClientOriginalExtension();
            $request->file('icon')->move(public_path('socialLink-images'), $imageName);

            if ($socialLink->icon) {
                File::delete(public_path('socialLink-images/') . $socialLink->icon);
            }
            $socialLink->icon = $imageName;
        }
        $socialLink->update($request->except('icon'));
        $socialLink->save();
        return redirect(route('admin.social-links.index'))->with('success', 'SocialLinks successfully Added');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $socialLink = SocialLink::findOrFail($id);
        return view('admin.social-links.edit', compact('socialLink', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        $socialLink = SocialLink::findOrFail($id);
        if ($request->hasFile('icon')) {
            $imageName = Str::random(10) . '.' . $request->file('icon')->getClientOriginalExtension();
            $request->file('icon')->move(public_path('socialLink-images'), $imageName);

            // Delete the old icon if it exists
            if ($socialLink->icon) {
                File::delete(public_path('socialLink-images/') . $socialLink->icon);
            }
            $socialLink->icon = $imageName;
        }

        // Update other fields
        $socialLink->update($request->except('icon'));
        $socialLink->save();
        return redirect(route('admin.social-links.index'))->with('warning', 'SocialLinks successfully updated');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $socialLink = SocialLink::findOrFail($id);
        if ($socialLink->icon) {
            File::delete(public_path('socialLink-images/') . $socialLink->image);
        }
        $socialLink->delete();
        return redirect(route('admin.social-links.index'))->with('error', 'SocialLinks successfully Deleted');
    }
}

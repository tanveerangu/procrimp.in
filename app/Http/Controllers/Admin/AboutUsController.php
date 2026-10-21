<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AboutUsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function aboutUs()
    {
        $aboutUs = AboutUs::first() ?? new AboutUs();
        return view('admin.aboutUs', compact('aboutUs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function aboutUsStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'

        ]);
        $aboutUs = AboutUs::first() ?? new AboutUs();
        if ($request->hasFile('image')) {
            $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('aboutUs-images'), $imageName);

            if ($aboutUs->image) {
                File::delete(public_path('aboutUs-images/') . $aboutUs->image);
            }
            $aboutUs->image = $imageName;
        }
        $aboutUs->update($request->except('image'));
        $aboutUs->save();
        return redirect(route('admin.aboutUs.edit'))->with('success', 'AboutUs successfully updated.');
    }
}

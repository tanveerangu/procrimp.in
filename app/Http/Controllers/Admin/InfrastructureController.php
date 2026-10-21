<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Infrastructure;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class InfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infrastructures = Infrastructure::latest()->paginate(10);
        return view('admin.infrastructures.index', compact('infrastructures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $infrastructure = new Infrastructure();
        return view('admin.infrastructures.create', compact('infrastructure'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required'
        ]);
        $infrastructure = Infrastructure::create($request->all());
        if ($request->hasFile('image')) {
            $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('infrastructure-images'), $imageName);

            if ($infrastructure->image) {
                File::delete(public_path('infrastructure-images/') . $infrastructure->image);
            }
            $infrastructure->image = $imageName;
        }
        $infrastructure->update($request->except('image'));
        $infrastructure->save();
        return redirect(route('admin.infrastructures.index'))->with('success', 'infrastructure successfully Added');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $infrastructure = Infrastructure::findOrFail($id);
        return view('admin.infrastructures.edit', compact('infrastructure', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $infrastructure = Infrastructure::findOrFail($id);
        if ($request->hasFile('image')) {
            $imageName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('infrastructure-images'), $imageName);

            if ($infrastructure->image) {
                File::delete(public_path('infrastructure-images/') . $infrastructure->image);
            }
            $infrastructure->image = $imageName;
        }
        $infrastructure->update($request->except('image'));
        $infrastructure->save();
        return redirect(route('admin.infrastructures.index'))->with('warning', 'infrastructure successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $infrastructure = Infrastructure::findOrFail($id);
        if ($infrastructure->image) {
            File::delete(public_path('infrastructure-images/') . $infrastructure->image);
        }
        $infrastructure->delete();
        return redirect(route('admin.infrastructures.index'))->with('error', 'infrastructure successfully Deleted');
    }
}

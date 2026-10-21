<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MetaTag;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::latest()->paginate(10);
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = new Page();
        return view('admin.pages.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:pages|string|regex:/^[a-z0-9-]+$/',
            'description' => 'required',
        ]);
        $page = Page::create($request->all());

        if($request->has('meta_tag')){
            foreach($request->meta_tag as $item){
                MetaTag::create([
                    'page_id'=> $page->id,
                    'meta_tag'=>$item
                ]);
            }
        }
        return redirect(route('admin.pages.index'))->with('success', 'Page successfully Added');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $page = Page::with('metaTags')->findOrFail($id);
        return view('admin.pages.edit', compact('page', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:products,slug,'.$id.',id||string|regex:/^[a-z0-9-]+$/',
            'description' => 'required',
        ]);
        $page = Page::findOrFail($id);
        $page->update($request->all());

        if($request->has('meta_tag')){
            MetaTag::where('page_id',$id)->delete();
            foreach($request->meta_tag as $item){
                MetaTag::create([
                    'page_id'=> $page->id,
                    'meta_tag'=>$item
                ]);
            }
        }
        return redirect(route('admin.pages.index'))->with('warning', 'Page successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        Page::findOrFail($id)->delete();
        return redirect(route('admin.pages.index'))->with('error', 'Page successfully Deleted');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CatalogForm;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function catalogForm()
    {
        $catalogs = CatalogForm::paginate(10);
        return view('admin.catalog', compact('catalogs'));
    }

    public function clearCache()
    {
        // Clear application cache
        Artisan::call('cache:clear');

        // Clear route cache
        Artisan::call('route:clear');

        // Clear config cache
        Artisan::call('config:clear');

        // Clear view cache
        Artisan::call('view:clear');

        return redirect(route('admin.index'))->with(['success' => 'All caches have been cleared successfully!']);
    }
}

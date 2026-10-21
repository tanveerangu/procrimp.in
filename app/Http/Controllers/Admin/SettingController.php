<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function settings()
    {
        $setting = Setting::first() ?? new Setting();
        return view('admin.setting', compact('setting'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function settingStore(Request $request)
    {
        $request->validate([
            'website_name' => 'required',
            'phone' => 'nullable',
            'email' => 'nullable',
            'address' => 'nullable'
        ]);

        // Fetch or create the setting
        $setting = Setting::first() ?? new Setting();

        // Handle website logo
        if ($request->hasFile('website_logo')) {
            $imageName = Str::random(10) . '.' . $request->file('website_logo')->getClientOriginalExtension();
            $request->file('website_logo')->move(public_path('setting-images'), $imageName);

            if ($setting->website_logo) {
                File::delete(public_path('setting-images/') . $setting->website_logo);
            }
            $setting->website_logo = $imageName;
        }

        // Handle favicon
        if ($request->hasFile('favicon')) {
            $imageName = Str::random(10) . '.' . $request->file('favicon')->getClientOriginalExtension();
            $request->file('favicon')->move(public_path('setting-images'), $imageName);

            if ($setting->favicon) {
                File::delete(public_path('setting-images/') . $setting->favicon);
            }
            $setting->favicon = $imageName;
        }

        // Update the settings with the request data
        $setting->fill($request->except('website_logo', 'favicon'));
        $setting->save();

        return redirect(route('admin.setting'))->with('success', 'Settings successfully updated.');
    }

    public function changePassword(Request $request)
    {
        $validation = $request->validate([
            'old_password' => 'required|max:12',
            'new_password' => 'required|max:12',
            'confirm_password' => 'required|same:new_password',
        ]);
        if ($validation) {
            $user = User::select('id', 'password')->where('id', Auth::user()->id)->first();
            if (!Hash::check($request->old_password, $user->password)) {
                session()->flash('error', 'You entered wrong password!');
            } else {
                session()->flash('warning', 'Password changed successfully');
                User::where('id', $user->id)->update([
                    'password' => Hash::make($request->new_password),
                ]);
            }
        }
        return redirect(route('admin.setting'));
    }

}

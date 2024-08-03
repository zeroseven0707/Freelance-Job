<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::firstOrCreate([
            'id' => 1
        ], [
            'web_name' => 'Default Web Name',
            'meta_description' => 'Default Meta Description',
        ]);

        return view('settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'web_name' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $settings = Setting::firstOrCreate([
            'id' => 1
        ]);

        if ($request->hasFile('logo')) {
            $logoName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('images'), $logoName);
            $settings->logo = $logoName;
        }

        if ($request->hasFile('favicon')) {
            $faviconName = time() . '.' . $request->favicon->extension();
            $request->favicon->move(public_path('images'), $faviconName);
            $settings->favicon = $faviconName;
        }

        $settings->web_name = $request->web_name;
        $settings->meta_description = $request->meta_description;
        $settings->save();

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}

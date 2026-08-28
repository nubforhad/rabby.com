<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            'headline' => ['nullable', 'string'],

            'address' => ['nullable', 'string'],

            'mobile' => ['nullable', 'string', 'max:50'],

            'footer_text' => ['nullable', 'string'],

            'fb_link' => ['nullable', 'url', 'max:500'],

            'email' => ['nullable', 'email', 'max:255'],

            'website_link' => ['nullable', 'url', 'max:500'],
        ]);

        $setting = Setting::first();

        /*
        |--------------------------------------------------------------------------
        | Logo Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {

            // Delete old logo
            if ($setting && $setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }

            $validated['logo'] = $request
                ->file('logo')
                ->store('settings', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Create / Update
        |--------------------------------------------------------------------------
        */

        if ($setting) {

            $setting->update($validated);

        } else {

            Setting::create($validated);
        }

        return redirect()
            ->route('settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}
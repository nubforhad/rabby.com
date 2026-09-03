<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
    public function index()
    {
        $services = Service::with('category')
            ->latest()
            ->get();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        $categories = Category::where('status', 1)
            ->orderBy('title')
            ->get();

        return view('admin.services.create', compact('categories'));
    }

    /**
     * Store a newly created service.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'sub_title'   => 'nullable|string|max:255',
            'paragraph'   => 'nullable|string',
            'link'        => 'nullable|string|max:500',

            // Icon text OR Image
            'icon'        => 'nullable|string|max:255',
            'icon_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',

            'status'      => 'required|boolean',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Icon / Image
        |--------------------------------------------------------------------------
        |
        | icon field:
        |     fa-solid fa-film
        |
        | OR upload image:
        |     services/xxxx.png
        |
        */

        $icon = $request->icon;

        if ($request->hasFile('icon_image')) {
            $icon = $request->file('icon_image')->store(
                'services',
                'public'
            );
        }

        Service::create([
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'sub_title'   => $request->sub_title,
            'paragraph'   => $request->paragraph,
            'link'        => $request->link,
            'icon'        => $icon,
            'status'      => $request->status,
        ]);

        return redirect()
            ->route('services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified service.
     */
    public function show(Service $service)
    {
        $service->load('category');

        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the service.
     */
    public function edit(Service $service)
    {
        $categories = Category::where('status', 1)
            ->orderBy('title')
            ->get();

        return view('admin.services.edit', compact(
            'service',
            'categories'
        ));
    }

    /**
     * Update the specified service.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'sub_title'   => 'nullable|string|max:255',
            'paragraph'   => 'nullable|string',
            'link'        => 'nullable|string|max:500',

            // Icon text OR Image
            'icon'        => 'nullable|string|max:255',
            'icon_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',

            'status'      => 'required|boolean',
        ]);

        $icon = $service->icon;

        /*
        |--------------------------------------------------------------------------
        | New Image Uploaded
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('icon_image')) {

            // Delete previous uploaded image
            if (
                $service->icon &&
                !str_contains($service->icon, ' ') &&
                Storage::disk('public')->exists($service->icon)
            ) {
                Storage::disk('public')->delete($service->icon);
            }

            // Store new image
            $icon = $request->file('icon_image')->store(
                'services',
                'public'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | If user enters icon text manually
        |--------------------------------------------------------------------------
        |
        | Example:
        | fa-solid fa-film
        |
        */

        if ($request->filled('icon')) {

            // If old icon was an uploaded image, delete it
            if (
                $service->icon &&
                !str_contains($service->icon, ' ') &&
                Storage::disk('public')->exists($service->icon)
            ) {
                Storage::disk('public')->delete($service->icon);
            }

            $icon = $request->icon;
        }

        $service->update([
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'sub_title'   => $request->sub_title,
            'paragraph'   => $request->paragraph,
            'link'        => $request->link,
            'icon'        => $icon,
            'status'      => $request->status,
        ]);

        return redirect()
            ->route('services.index')
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified service.
     */
    public function destroy(Service $service)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete uploaded icon image
        |--------------------------------------------------------------------------
        */

        if (
            $service->icon &&
            !str_contains($service->icon, ' ') &&
            Storage::disk('public')->exists($service->icon)
        ) {
            Storage::disk('public')->delete($service->icon);
        }

        $service->delete();

        return redirect()
            ->route('services.index')
            ->with('success', 'Service deleted successfully.');
    }
}

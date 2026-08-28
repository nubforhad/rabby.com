<?php

namespace App\Http\Controllers;

use App\Models\LiveTv;
use Illuminate\Http\Request;

class LiveTvController extends Controller
{
    /**
     * Display a listing of Live TVs.
     */
    public function index()
    {
        $liveTvs = LiveTv::latest()->paginate(10);

        return view('admin.live-tvs.index', compact('liveTvs'));
    }


    /**
     * Show the form for creating a new Live TV.
     */
    public function create()
    {
        return view('admin.live-tvs.create');
    }


    /**
     * Store a newly created Live TV.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'sub_title' => ['nullable', 'string', 'max:255'],
            'link' => ['required', 'url', 'max:2048'],
            'status' => ['nullable', 'boolean'],
        ]);

        $validated['status'] = $request->boolean('status');

        LiveTv::create($validated);

        return redirect()
            ->route('live-tvs.index')
            ->with('success', 'Live TV created successfully.');
    }


    /**
     * Display the specified Live TV.
     */
    public function show(LiveTv $liveTv)
    {
        return view('admin.live-tvs.show', compact('liveTv'));
    }


    /**
     * Show the form for editing the specified Live TV.
     */
    public function edit(LiveTv $liveTv)
    {
        return view('admin.live-tvs.edit', compact('liveTv'));
    }


    /**
     * Update the specified Live TV.
     */
    public function update(Request $request, LiveTv $liveTv)
    {
        $validated = $request->validate([
            'icon' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'sub_title' => ['nullable', 'string', 'max:255'],
            'link' => ['required', 'url', 'max:2048'],
            'status' => ['nullable', 'boolean'],
        ]);

        $validated['status'] = $request->boolean('status');

        $liveTv->update($validated);

        return redirect()
            ->route('live-tvs.index')
            ->with('success', 'Live TV updated successfully.');
    }


    /**
     * Remove the specified Live TV.
     */
    public function destroy(LiveTv $liveTv)
    {
        $liveTv->delete();

        return redirect()
            ->route('live-tvs.index')
            ->with('success', 'Live TV deleted successfully.');
    }
}
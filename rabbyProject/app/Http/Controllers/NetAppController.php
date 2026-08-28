<?php

namespace App\Http\Controllers;

use App\Models\NetApp;
use Illuminate\Http\Request;

class NetAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $netApps = NetApp::latest()->paginate(10);

        return view('admin.net-apps.index', compact('netApps'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.net-apps.create');
    }


    /**
     * Store a newly created resource.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'nullable|string|max:100',
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        $validated['status'] = $request->has('status');

        NetApp::create($validated);

        return redirect()
            ->route('net-apps.index')
            ->with('success', 'NET App created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(NetApp $netApp)
    {
        return view('admin.net-apps.show', compact('netApp'));
    }


    /**
     * Show the form for editing the resource.
     */
    public function edit(NetApp $netApp)
    {
        return view('admin.net-apps.edit', compact('netApp'));
    }


    /**
     * Update the specified resource.
     */
    public function update(Request $request, NetApp $netApp)
    {
        $validated = $request->validate([
            'icon' => 'nullable|string|max:100',
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        $validated['status'] = $request->has('status');

        $netApp->update($validated);

        return redirect()
            ->route('net-apps.index')
            ->with('success', 'NET App updated successfully.');
    }


    /**
     * Remove the specified resource.
     */
    public function destroy(NetApp $netApp)
    {
        $netApp->delete();

        return redirect()
            ->route('net-apps.index')
            ->with('success', 'NET App deleted successfully.');
    }
}
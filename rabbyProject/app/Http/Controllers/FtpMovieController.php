<?php

namespace App\Http\Controllers;

use App\Models\FtpMovie;
use Illuminate\Http\Request;

class FtpMovieController extends Controller
{
    public function index()
    {
        $ftpMovies = FtpMovie::latest()->paginate(10);

        return view('admin.ftp-movies.index', compact('ftpMovies'));
    }

    public function create()
    {
        return view('admin.ftp-movies.create');
    }

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

        FtpMovie::create($validated);

        return redirect()
            ->route('ftp-movies.index')
            ->with('success', 'FTP Movie created successfully.');
    }

    public function show(FtpMovie $ftpMovie)
    {
        return view('admin.ftp-movies.show', compact('ftpMovie'));
    }

    public function edit(FtpMovie $ftpMovie)
    {
        return view('admin.ftp-movies.edit', compact('ftpMovie'));
    }

    public function update(Request $request, FtpMovie $ftpMovie)
    {
        $validated = $request->validate([
            'icon' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'sub_title' => ['nullable', 'string', 'max:255'],
            'link' => ['required', 'url', 'max:2048'],
            'status' => ['nullable', 'boolean'],
        ]);

        $validated['status'] = $request->boolean('status');

        $ftpMovie->update($validated);

        return redirect()
            ->route('ftp-movies.index')
            ->with('success', 'FTP Movie updated successfully.');
    }

    public function destroy(FtpMovie $ftpMovie)
    {
        $ftpMovie->delete();

        return redirect()
            ->route('ftp-movies.index')
            ->with('success', 'FTP Movie deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\LiveTv;
use Illuminate\Http\Request;
use App\Models\NetApp;
use App\Models\FtpMovie;
use App\Models\Setting;
use App\Models\Category;


class DashboardController extends Controller
{



public function index()
{
    $settings = Setting::first();

    $netapp = NetApp::where('status', 1)->get();
    $livetv = LiveTv::where('status', 1)->get();
    $ftpmovie = FtpMovie::where('status', 1)->get();

    $category1 = Category::where('id', 1)
        ->where('status', 1)
        ->first();

    $category2 = Category::where('id', 2)
        ->where('status', 1)
        ->first();

    $category3 = Category::where('id', 3)
        ->where('status', 1)
        ->first();

    return view('index', compact(
        'netapp',
        'ftpmovie',
        'livetv',
        'settings',
        'category1',
        'category2',
        'category3'
    ));
}

}

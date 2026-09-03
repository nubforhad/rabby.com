<?php

namespace App\Http\Controllers;

use App\Models\LiveTv;
use App\Models\NetApp;
use App\Models\FtpMovie;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Notice;

class DashboardController extends Controller
{
    public function index()
    {
        // Website Settings
        $settings = Setting::first();

        $notic = Notice::first();

        // Active Net Apps
        $netapp = NetApp::where('status', 1)
            ->get();

        // Active Live TV
        $livetv = LiveTv::where('status', 1)
            ->get();

        // Active FTP Movies
        $ftpmovie = FtpMovie::where('status', 1)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Active Categories + Active Services
        |--------------------------------------------------------------------------
        |
        | Category:
        |   subtitle = serial/order
        |
        | Service:
        |   sub_title = serial/order
        |
        | Only status = 1 will be displayed.
        |
        */

        $categories = Category::where('status', 1)

            // Active services only
            ->with([
                'services' => function ($query) {
                    $query->where('status', 1)
                        ->orderByRaw('CAST(sub_title AS UNSIGNED) ASC')
                        ->orderBy('id', 'asc');
                }
            ])

            // Category serial/order
            ->orderByRaw('CAST(subtitle AS UNSIGNED) ASC')
            ->orderBy('id', 'asc')

            ->get();

        return view('index', compact(
            'settings',
            'notic',
            'netapp',
            'livetv',
            'ftpmovie',
            'categories'
        ));
    }
}

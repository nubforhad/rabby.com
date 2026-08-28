<?php

namespace App\Http\Controllers;

use App\Models\LiveTv;
use Illuminate\Http\Request;
use App\Models\NetApp;
use App\Models\FtpMovie;


class DashboardController extends Controller
{

    public function index()
    {
        $netapp = NetApp::where('status', 1)->get();
        $livetv = LiveTv::where('status', 1)->get();
        $ftpmovie = FtpMovie::where('status', 1)->get();
        return view('index', compact(
            'netapp',
            'ftpmovie',
            'livetv'
        ));
    }

}

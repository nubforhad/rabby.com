<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NetApp;

class DashboardController extends Controller
{
    public function index(){
        
        $netapp = NetApp::get();
        return view('index', compact('netapp'));
    }
}

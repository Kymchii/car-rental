<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function adminDashboard(): View
    {
        return view('adminLevel.dashboard');
    }

    public function tenantDashboard(): View
    {
        return view('tenantLevel.dashboard');
    }
}

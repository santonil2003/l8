<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardV2Controller extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        return view('dashboard-v2', ['tokens' => $user->tokens]);
    }
}

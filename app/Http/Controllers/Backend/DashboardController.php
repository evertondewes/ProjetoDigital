<?php

namespace ProjetoDigital\Http\Controllers\Backend;

use ProjetoDigital\Http\Controllers\Controller;
use ProjetoDigital\Models\Project;
use ProjetoDigital\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $count = [
            'users' => User::count(),
            'projects' => Project::count(),
            'pending-accounts' => User::pending()->count(),
        ];

        $events = auth()->user()->events()->latest()->limit(5)->get();

        return view('backend.dashboard', compact('count', 'events'));
    }
}

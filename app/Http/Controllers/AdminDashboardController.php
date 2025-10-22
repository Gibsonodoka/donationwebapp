<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProgramSubscription;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total users in the system
        $totalUsers = User::count();

        // All program subscriptions
        $subscriptions = ProgramSubscription::with('user')->latest()->take(10)->get();

        // Total number of subscriptions
        $totalSubscriptions = ProgramSubscription::count();

        // Total distinct support areas (avoid null)
        $totalAreas = ProgramSubscription::select('support_area')
                        ->distinct()
                        ->count('support_area');

        // Pass all variables to the admin view
        return view('Admin.index', compact(
            'totalUsers',
            'subscriptions',
            'totalSubscriptions',
            'totalAreas'
        ));
    }
}

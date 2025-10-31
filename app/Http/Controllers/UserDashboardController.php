<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Donation;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $subscriptions = $user->programSubscriptions ?? collect();
        $donations = Donation::where('user_id', $user->id)->latest()->get();

        return view('User.dashboard', compact('user', 'subscriptions', 'donations'));
    }

    public function support()
    {
        $user = Auth::user();
        $donations = Donation::where('user_id', $user->id)->latest()->get();

        return view('User.support', compact('donations'));
    }
}

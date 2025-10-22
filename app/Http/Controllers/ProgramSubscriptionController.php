<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramSubscription;
use Illuminate\Support\Facades\Auth;

class ProgramSubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'support_area' => 'required|string',
            'contribution_amount' => 'required|string',
        ]);

        ProgramSubscription::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'name' => $request->name,
            'email' => $request->email,
            'support_area' => $request->support_area,
            'contribution_amount' => $request->contribution_amount,
        ]);

        return back()->with('success', 'Thank you for joining the program! Your details have been saved.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'support_area' => 'required|string',
            'amount' => 'required|string',
            'crypto_type' => 'required|string',
            'wallet_address' => 'required|string',
            'receipt' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('receipt')) {
            $path = $request->file('receipt')->store('receipts', 'public');
        }

        Donation::create([
            'user_id' => Auth::id(),
            'support_area' => $validated['support_area'],
            'amount' => $validated['amount'],
            'crypto_type' => $validated['crypto_type'],
            'wallet_address' => $validated['wallet_address'],
            'receipt_path' => $path,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Donation uploaded and awaiting admin confirmation.');
    }

    public function index()
    {
        $donations = Donation::where('user_id', Auth::id())->latest()->get();
        return view('User.donations', compact('donations'));
    }

    public function adminIndex()
    {
        $donations = Donation::with('user')->latest()->get();
        return view('Admin.donations', compact('donations'));
    }

    public function confirm($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->update(['status' => 'confirmed']);
        return back()->with('success', 'Donation confirmed.');
    }

    public function reject($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->update(['status' => 'rejected']);
        return back()->with('success', 'Donation rejected.');
    }
}

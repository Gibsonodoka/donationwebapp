@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Admin Dashboard</h1>

    <!-- Stats Cards -->
    <div class="grid md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h3 class="text-sm text-gray-500 mb-2">Total Users</h3>
            <p class="text-2xl font-bold text-blue-700">{{ $totalUsers }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h3 class="text-sm text-gray-500 mb-2">Active Subscriptions</h3>
            <p class="text-2xl font-bold text-green-700">{{ $totalSubscriptions }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h3 class="text-sm text-gray-500 mb-2">Total Support Areas</h3>
            <p class="text-2xl font-bold text-gray-800">{{ $totalAreas }}</p>
        </div>
    </div>

    <!-- Subscriptions Table -->
    <section id="subscriptions">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Program Subscriptions</h2>

        <div class="overflow-x-auto bg-white rounded-lg shadow-sm border">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">User</th>
                        <th class="px-6 py-3">Support Area</th>
                        <th class="px-6 py-3">Contribution</th>
                        <th class="px-6 py-3">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subscriptions as $sub)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $sub->user->name }}</td>
                            <td class="px-6 py-4">{{ $sub->support_area }}</td>
                            <td class="px-6 py-4">{{ $sub->contribution_amount }}</td>
                            <td class="px-6 py-4">{{ $sub->created_at->format('M d, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center px-6 py-4 text-gray-500">No subscriptions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
@extends('layouts.user')

@section('content')
<div class="space-y-12">
    <!-- Header -->
    <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight">My Supports</h1>
            <p class="text-gray-500 mt-2">View and track all your donation activities in one place.</p>
        </div>
    </header>

    <!-- Donation Summary -->
    <section class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-gradient-to-br from-blue-50 to-white border border-blue-100 rounded-2xl p-6 shadow-sm hover:shadow transition-all duration-200">
            <h3 class="text-sm text-gray-500 mb-1">Total Donations</h3>
            <p class="text-3xl font-extrabold text-blue-700">{{ $donations->count() }}</p>
        </div>

        <div class="bg-gradient-to-br from-green-50 to-white border border-green-100 rounded-2xl p-6 shadow-sm hover:shadow transition-all duration-200">
            <h3 class="text-sm text-gray-500 mb-1">Latest Donation</h3>
            <p class="text-2xl font-bold text-green-700">
                {{ $donations->first()->amount ?? 'N/A' }}
            </p>
        </div>

        <div class="bg-gradient-to-br from-gray-50 to-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow transition-all duration-200">
            <h3 class="text-sm text-gray-500 mb-1">Member Since</h3>
            <p class="text-2xl font-bold text-gray-800">
                {{ Auth::user()->created_at->format('M d, Y') }}
            </p>
        </div>
    </section>

    <!-- Donation Table -->
    <section class="mt-10"
             x-data="{
                 sort: 'date',
                 order: 'desc',
                 filter: 'all',
                 get donations() {
                     let items = {{ $donations->toJson() }};
                     if (this.filter !== 'all') items = items.filter(d => d.status === this.filter);
                     if (this.sort === 'date') {
                         items.sort((a, b) => this.order === 'asc'
                             ? new Date(a.created_at) - new Date(b.created_at)
                             : new Date(b.created_at) - new Date(a.created_at));
                     } else if (this.sort === 'amount') {
                         items.sort((a, b) => {
                             const aVal = parseFloat(a.amount.replace(/[^0-9.]/g, ''));
                             const bVal = parseFloat(b.amount.replace(/[^0-9.]/g, ''));
                             return this.order === 'asc' ? aVal - bVal : bVal - aVal;
                         });
                     }
                     return items;
                 }
             }">

        <div class="flex flex-wrap items-center justify-between mb-6 gap-4">
            <h2 class="text-2xl font-semibold text-gray-900">Donation Records</h2>

            <div class="flex flex-wrap items-center gap-3">
                <label class="text-sm text-gray-600 font-medium">Filter:</label>
                <select x-model="filter" class="border border-gray-300 rounded-lg text-sm px-3 py-2 bg-white focus:ring-2 focus:ring-blue-500">
                    <option value="all">All</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="pending">Pending</option>
                    <option value="rejected">Rejected</option>
                </select>

                <label class="text-sm text-gray-600 font-medium ml-3">Sort:</label>
                <select x-model="sort" class="border border-gray-300 rounded-lg text-sm px-3 py-2 bg-white focus:ring-2 focus:ring-blue-500">
                    <option value="date">Date</option>
                    <option value="amount">Amount</option>
                </select>

                <button @click="order = (order === 'asc' ? 'desc' : 'asc')"
                        class="text-blue-600 text-sm font-semibold hover:underline">
                    <span x-text="order === 'asc' ? '▲ Asc' : '▼ Desc'"></span>
                </button>
            </div>
        </div>

        <!-- Donation Table -->
        <template x-if="donations.length > 0">
            <div class="overflow-x-auto bg-white rounded-2xl border border-gray-200 shadow-sm">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wide">
                        <tr>
                            <th class="px-6 py-3">Support Area</th>
                            <th class="px-6 py-3">Amount</th>
                            <th class="px-6 py-3">Crypto Type</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Receipt</th>
                            <th class="px-6 py-3">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="donation in donations" :key="donation.id">
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium" x-text="donation.support_area"></td>
                                <td class="px-6 py-4" x-text="donation.amount"></td>
                                <td class="px-6 py-4" x-text="donation.crypto_type"></td>
                                <td class="px-6 py-4">
                                    <template x-if="donation.status === 'confirmed'">
                                        <span class="text-green-600 font-semibold">Confirmed</span>
                                    </template>
                                    <template x-if="donation.status === 'pending'">
                                        <span class="text-yellow-600 font-semibold">Pending</span>
                                    </template>
                                    <template x-if="donation.status === 'rejected'">
                                        <span class="text-red-600 font-semibold">Rejected</span>
                                    </template>
                                </td>
                                <td class="px-6 py-4">
                                    <template x-if="donation.receipt_path">
                                        <a :href="`/storage/${donation.receipt_path}`"
                                           target="_blank"
                                           class="text-blue-600 hover:underline">View</a>
                                    </template>
                                    <template x-if="!donation.receipt_path">
                                        <span class="text-gray-500">N/A</span>
                                    </template>
                                </td>
                                <td class="px-6 py-4"
                                    x-text="new Date(donation.created_at).toLocaleDateString()"></td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </template>

        <!-- Empty State -->
        <template x-if="donations.length === 0">
            <p class="text-gray-600 bg-white p-8 rounded-2xl border text-center shadow-sm">
                No donations found for this filter.
            </p>
        </template>
    </section>
</div>
@endsection

@extends('layouts.user')

@section('content')
<div class="space-y-12">
    <!-- Header -->
    <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Welcome back, {{ Auth::user()->name }}</h1>
            <p class="text-gray-500 mt-2">Track your donations, upload receipts, and make a global impact.</p>
        </div>
    </header>

    <!-- Summary Cards -->
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

    <!-- Donation Opportunities -->
    <section>
        <div class="mb-10">
            <h2 class="text-2xl font-semibold text-gray-900">Make a Difference Today</h2>
            <p class="text-gray-600 mt-1">Choose a cause and send your crypto donation to the provided wallet address.</p>
        </div>

        @if (session('success'))
            <div class="bg-green-50 border border-green-400 text-green-700 rounded-xl p-4 mb-6 shadow-sm">
                <strong class="font-semibold">Success:</strong> {{ session('success') }}
            </div>
        @endif

        <div class="space-y-6">
            @foreach([
                [
                    'Medical Supplies Donation',
                    '$25/week',
                    [
                        ['BTC', '1A1zP1eP5QefizMPFtTL5SLmv7DivfNa'],
                        ['ETH', '0x742d35Cc6634C0532925a3b844b5B875a7a7a7a7'],
                        ['USDT (ERC20)', '0x842d35Cc6634C0532925a3b844b5B875a7a7a7a7']
                    ]
                ],
                [
                    'Food Relief Donation',
                    '$35/week',
                    [
                        ['BTC', 'bc1qw508d6qeabcdxyz'],
                        ['ETH', '0x98d35Cc6634C0532925a3b844b5B875a9b7a7a7'],
                        ['USDT (ERC20)', '0x812d35Cc6634C0532925a3b844b5B875a7a7a7b3']
                    ]
                ],
                [
                    'Drone Delivery Donation',
                    '$50/week',
                    [
                        ['BTC', 'bc1qw123abcde987xyz'],
                        ['ETH', '0x742d35Cc6634C0532925a3b844b5B875abcaaabb'],
                        ['USDT (ERC20)', '0x999d35Cc6634C0532925a3b844b5B875a7a7a7a1']
                    ]
                ]
            ] as $donation)
                <details class="group bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden hover:shadow-md transition-all duration-200">
                    <summary class="flex justify-between items-center px-6 py-4 cursor-pointer select-none font-semibold text-gray-800 hover:bg-gray-50">
                        <span class="flex items-center gap-2">
                            <span class="text-blue-600 text-xl transform transition-transform duration-300 group-open:rotate-45">+</span>
                            {{ $donation[0] }}
                        </span>
                        <span class="bg-blue-600 text-white text-xs px-3 py-1.5 rounded-full shadow-sm">{{ $donation[1] }}</span>
                    </summary>

                    <div class="bg-gray-50 border-t p-6 space-y-5">
                        <p class="text-gray-600">Select a crypto wallet to send your donation:</p>

                        @foreach($donation[2] as $wallet)
                            <div x-data="{ copied: false }" class="border border-gray-200 rounded-xl bg-white p-4 hover:shadow-sm transition">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="font-semibold text-gray-700">{{ $wallet[0] }}</span>
                                    <button
                                        @click="navigator.clipboard.writeText('{{ $wallet[1] }}'); copied = true; setTimeout(() => copied = false, 2000)"
                                        class="text-blue-600 hover:underline text-sm font-medium"
                                    >
                                        <span x-show="!copied">Copy</span>
                                        <span x-show="copied" class="text-green-600 font-semibold">Copied!</span>
                                    </button>
                                </div>
                                <p class="text-sm text-gray-600 font-mono truncate">{{ $wallet[1] }}</p>

                                <form action="{{ route('donations.store') }}" method="POST" enctype="multipart/form-data" class="mt-3 space-y-2">
                                    @csrf
                                    <input type="hidden" name="support_area" value="{{ $donation[0] }}">
                                    <input type="hidden" name="amount" value="{{ $donation[1] }}">
                                    <input type="hidden" name="crypto_type" value="{{ $wallet[0] }}">
                                    <input type="hidden" name="wallet_address" value="{{ $wallet[1] }}">

                                    <input type="file" name="receipt" required
                                           class="w-full border border-gray-300 rounded-lg text-sm px-3 py-2 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <button type="submit"
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-semibold w-full md:w-auto transition-all">
                                        Upload Receipt
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </details>
            @endforeach
        </div>
    </section>

    <!-- Donation History -->
    <section class="mt-20"
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
            <h2 class="text-2xl font-semibold text-gray-900">Donation History</h2>

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
                            <th class="px-6 py-3">Crypto</th>
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
                                           target="_blank" class="text-blue-600 hover:underline">View</a>
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

        <!-- No Donations -->
        <template x-if="donations.length === 0">
            <p class="text-gray-600 bg-white p-8 rounded-2xl border text-center shadow-sm">
                No donations found for this filter.
            </p>
        </template>
    </section>
</div>
@endsection
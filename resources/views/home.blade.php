@extends('layouts.app')

@section('content')
    <!-- HERO SECTION -->
    <section class="relative bg-gray-900 text-white">
        <img src="{{ asset('images/hero.jpg') }}" alt="Soldiers"
             class="absolute inset-0 w-full h-full object-cover opacity-60">
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 via-gray-900/60 to-gray-900/80"></div>
        <div class="relative z-10 flex flex-col items-center justify-center text-center py-24 px-6">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Join the Friends of the Battalion</h1>
            <p class="max-w-xl text-lg text-gray-200 mb-6">
                A community of supporters helping keep our defenders supplied, strong, and safe.
            </p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="#join-program"
                   class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-semibold text-sm sm:text-base">Donate Now</a>
                <a href="#how-it-works"
                   class="bg-white text-gray-900 hover:bg-gray-100 px-6 py-3 rounded-lg font-semibold text-sm sm:text-base">See How It Helps</a>
            </div>
        </div>
    </section>

    <!-- STATS SECTION -->
<section class="bg-white shadow-md mx-auto -mt-12 max-w-5xl rounded-2xl relative z-20 px-4 sm:px-6">
    <div class="flex flex-wrap justify-between items-center text-center py-8 sm:py-10 gap-4">

        <!-- Stat 1 -->
        <div class="flex-1 min-w-[100px]">
            <p class="text-2xl sm:text-3xl font-bold text-blue-600">412</p>
            <p class="text-gray-600 text-xs sm:text-sm font-medium">Medical kits delivered</p>
        </div>

        <!-- Divider -->
        <div class="hidden sm:block w-px h-10 bg-gray-200"></div>

        <!-- Stat 2 -->
        <div class="flex-1 min-w-[100px]">
            <p class="text-2xl sm:text-3xl font-bold text-blue-600">1,230</p>
            <p class="text-gray-600 text-xs sm:text-sm font-medium">Meals provided</p>
        </div>

        <!-- Divider -->
        <div class="hidden sm:block w-px h-10 bg-gray-200"></div>

        <!-- Stat 3 -->
        <div class="flex-1 min-w-[100px]">
            <p class="text-2xl sm:text-3xl font-bold text-blue-600">14</p>
            <p class="text-gray-600 text-xs sm:text-sm font-medium">Drones funded</p>
        </div>
    </div>
</section>


    <!-- DONATION ACCORDION SECTION -->
    <section class="max-w-4xl mx-auto mt-20 px-6" id="join-program">
        <h2 class="text-3xl font-semibold mb-3 text-gray-900">Make a Difference Today</h2>
        <p class="text-gray-600 mb-10 text-lg leading-relaxed">
            Choose a donation area and send your crypto contribution to one of the wallet addresses below.
        </p>

        @if (session('success'))
            <div class="bg-green-50 border border-green-300 text-green-700 rounded-lg p-4 mb-6 text-sm sm:text-base">
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-4">
            @foreach([
                [
                    'Medical Supplies Donation',
                    '$200/week',
                    [
                        ['BTC', 'bc1qgxjv84efhsh3736uxp2wrspahnlma7wfz5syd8'],
                        ['ETH', '0xD42E0A61A2096163851C9905aC46a7c24C0B6852'],
                        ['USDT (ERC20)', '0xD42E0A61A2096163851C9905aC46a7c24C0B6852']
                    ]
                ],
                [
                    'Food Relief Donation',
                    '$300/week',
                    [
                        ['BTC', 'bc1qgxjv84efhsh3736uxp2wrspahnlma7wfz5syd8'],
                        ['ETH', '0xD42E0A61A2096163851C9905aC46a7c24C0B6852'],
                        ['USDT (ERC20)', '0xD42E0A61A2096163851C9905aC46a7c24C0B6852']
                    ]
                ],
                [
                    'Drone Delivery Donation',
                    '$450/week',
                    [
                        ['BTC', 'bc1qgxjv84efhsh3736uxp2wrspahnlma7wfz5syd8'],
                        ['ETH', '0xD42E0A61A2096163851C9905aC46a7c24C0B6852'],
                        ['USDT (ERC20)', '0xD42E0A61A2096163851C9905aC46a7c24C0B6852']
                    ]
                ]
            ] as $donation)
                <details class="group bg-white rounded-xl border shadow-sm overflow-hidden">
                    <summary class="flex justify-between items-center px-6 py-4 cursor-pointer font-semibold text-gray-800 hover:bg-gray-50">
                        <span class="flex items-center gap-2">
                            <span class="text-blue-600">+</span> {{ $donation[0] }}
                        </span>
                        <span class="bg-blue-600 text-white text-sm px-4 py-1 rounded-lg">{{ $donation[1] }}</span>
                    </summary>

                    <div class="bg-gray-50 border-t p-6 space-y-5">
                        <p class="text-gray-600 mb-4">Select a crypto wallet to send your donation:</p>

                        @foreach($donation[2] as $wallet)
                            <div x-data="{ copied: false }" class="border rounded-lg bg-gray-100 p-3 mb-3">
                                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2">
                                    <span class="font-semibold text-gray-700">{{ $wallet[0] }}</span>
                                    <button
                                        @click="navigator.clipboard.writeText('{{ $wallet[1] }}'); copied = true; setTimeout(() => copied = false, 2000)"
                                        class="text-blue-600 hover:underline text-sm">
                                        <span x-show="!copied">Copy</span>
                                        <span x-show="copied" class="text-green-600 font-semibold">Copied!</span>
                                    </button>
                                </div>
                                <p class="text-sm text-gray-600 font-mono break-all">{{ $wallet[1] }}</p>

                                <form action="{{ route('donations.store') }}" method="POST" enctype="multipart/form-data"
                                      class="mt-3 space-y-2">
                                    @csrf
                                    <input type="hidden" name="support_area" value="{{ $donation[0] }}">
                                    <input type="hidden" name="amount" value="{{ $donation[1] }}">
                                    <input type="hidden" name="crypto_type" value="{{ $wallet[0] }}">
                                    <input type="hidden" name="wallet_address" value="{{ $wallet[1] }}">

                                    <input type="file" name="receipt" required
                                           class="w-full border border-gray-300 rounded-lg text-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 file:mr-2 file:py-1 file:px-3 file:rounded file:border-0 file:text-sm file:font-medium file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                                    <button type="submit"
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-semibold w-full">
                                        Upload Receipt
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </details>
            @endforeach
        </div>

        <div class="text-center mt-10">
            @auth
                <a href="{{ route('dashboard') }}"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold shadow-md hover:shadow-lg transition w-full sm:w-auto">
                    Go to Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold shadow-md hover:shadow-lg transition w-full sm:w-auto">
                    Join the Program
                </a>
            @endauth
        </div>
    </section>

  <!-- HOW IT WORKS -->
<section id="how-it-works"
         class="relative py-20 md:py-28 bg-gradient-to-br from-blue-50 via-white to-blue-50 overflow-hidden">

    <div class="absolute inset-0 bg-[url('/images/pattern.svg')] opacity-10"></div>

    <div class="max-w-6xl mx-auto px-6 relative z-10 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-5 tracking-tight">
            How It Works
        </h2>
        <p class="text-gray-600 max-w-2xl mx-auto mb-16 md:mb-24 text-base md:text-lg leading-relaxed">
            Simple steps to support the causes you care about — securely and transparently.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 md:gap-12">
            <!-- Step 1 -->
            <div class="group bg-white shadow-md hover:shadow-xl rounded-2xl p-8 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-14 h-14 mx-auto mb-5 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 text-xl font-bold">
                    1
                </div>
                <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors">
                    Choose a Support Area
                </h3>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                    Pick the causes you care about most and view their donation wallets.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="group bg-white shadow-md hover:shadow-xl rounded-2xl p-8 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-14 h-14 mx-auto mb-5 flex items-center justify-center rounded-full bg-green-100 text-green-600 text-xl font-bold">
                    2
                </div>
                <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-3 group-hover:text-green-600 transition-colors">
                    Send Your Crypto Contribution
                </h3>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                    Use any wallet app to send your preferred cryptocurrency safely.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="group bg-white shadow-md hover:shadow-xl rounded-2xl p-8 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-14 h-14 mx-auto mb-5 flex items-center justify-center rounded-full bg-purple-100 text-purple-600 text-xl font-bold">
                    3
                </div>
                <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-3 group-hover:text-purple-600 transition-colors">
                    Upload Your Payment Receipt
                </h3>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                    After payment, upload a screenshot of your transaction for confirmation.
                </p>
            </div>
        </div>
    </div>


</section>

    <!-- OUR PROJECTS SECTION -->
<section class="px-6 md:px-20 py-16 md:py-24 bg-white">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-12 gap-6">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
            Our Projects
        </h2>
        <a href="{{ url('/') }}"
           class="text-gray-700 hover:text-black text-sm md:text-base font-medium underline underline-offset-4">
            See all projects
        </a>
    </div>

    @php
        $projects = [
            [
                'title' => 'Frontline Support Mission',
                'desc' => 'Providing tactical support, logistics, and field equipment to aid soldiers in active zones.',
                'img'  => asset('images/support.jpeg'),
            ],
            [
                'title' => 'Tactical Drone Assistance',
                'desc' => 'Deploying drones to support strategic operations, supply drops, and surveillance to protect our troops.',
                'img'  => asset('images/ukd.jpg'),
            ],
            [
                'title' => 'Relief & Medical Aid',
                'desc' => 'Sending emergency relief materials, medical kits, and protective equipment directly to the battlefield.',
                'img'  => asset('images/rel.jpg'),
            ],
            [
                'title' => 'Military Families Welfare',
                'desc' => 'Supporting the families of soldiers through housing, food aid, and educational support for their children.',
                'img'  => 'https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&w=800&q=60',
            ],
            [
                'title' => 'Rebuilding Military Outposts',
                'desc' => 'Helping reconstruct damaged posts and operational bases to strengthen ground defense and supply lines.',
                'img'  => 'https://images.unsplash.com/photo-1593113598332-cd288d649433?auto=format&fit=crop&w=800&q=60',
            ],
            [
                'title' => 'Logistics & Supply Line',
                'desc' => 'Ensuring steady flow of essential supplies like food, water, and tactical gear to soldiers on the frontlines.',
                'img'  => asset('images/log.jpg'),
            ],
        ];
    @endphp

    <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($projects as $project)
            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                <div class="relative w-full h-56 sm:h-52 md:h-60 overflow-hidden">
                    <img src="{{ $project['img'] }}" alt="{{ $project['title'] }}"
                         class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700">
                </div>
                <div class="p-6 sm:p-5 md:p-6">
                    <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-2">
                        {{ $project['title'] }}
                    </h3>
                    <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                        {{ $project['desc'] }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</section>


@endsection

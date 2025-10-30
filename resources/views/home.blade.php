@extends('layouts.app')

@section('content')
    <!-- HERO SECTION -->
    <section class="relative bg-gray-900 text-white">
        <img src="{{ asset('images/hero.jpg') }}" alt="Soldiers" class="absolute inset-0 w-full h-full object-cover opacity-60">
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 via-gray-900/60 to-gray-900/80"></div>
        <div class="relative z-10 flex flex-col items-center justify-center text-center py-24 px-6">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Join the Friends of the Battalion</h1>
            <p class="max-w-xl text-lg text-gray-200 mb-6">
                A community of supporters helping keep our defenders supplied, strong, and safe.
            </p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="#join-program" class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-semibold">Donate Now</a>
                <a href="#how-it-works" class="bg-white text-gray-900 hover:bg-gray-100 px-6 py-3 rounded-lg font-semibold">See How It Helps</a>
            </div>
        </div>
    </section>

    <!-- STATS SECTION -->
    <section class="bg-white shadow-md mx-auto -mt-12 max-w-5xl rounded-xl relative z-20">
        <div class="grid grid-cols-1 sm:grid-cols-3 text-center divide-x divide-gray-200 py-6">
            <div>
                <p class="text-3xl font-bold text-blue-600">412</p>
                <p class="text-gray-500 text-sm">Medical kits delivered</p>
            </div>
            <div>
                <p class="text-3xl font-bold text-blue-600">1,230</p>
                <p class="text-gray-500 text-sm">Meals provided</p>
            </div>
            <div>
                <p class="text-3xl font-bold text-blue-600">14</p>
                <p class="text-gray-500 text-sm">Drones funded</p>
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
            <div class="bg-green-50 border border-green-300 text-green-700 rounded-lg p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-4">
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
                                <div class="flex items-center justify-between">
                                    <span class="font-semibold text-gray-700">{{ $wallet[0] }}</span>
                                    <button
                                        @click="navigator.clipboard.writeText('{{ $wallet[1] }}'); copied = true; setTimeout(() => copied = false, 2000)"
                                        class="text-blue-600 hover:underline text-sm"
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
                                           class="w-full border border-gray-300 rounded-lg text-sm px-3 py-2 focus:ring-2 focus:ring-blue-500">
                                    <button type="submit"
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-semibold w-full md:w-auto">
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
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold shadow-md hover:shadow-lg transition">
                    Go to Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold shadow-md hover:shadow-lg transition">
                    Join the Program
                </a>
            @endauth
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section id="how-it-works" class="relative py-24 bg-gradient-to-br from-blue-50 via-white to-blue-50 overflow-hidden">
        <div class="absolute inset-0 bg-[url('/images/pattern.svg')] opacity-10"></div>

        <div class="max-w-6xl mx-auto px-6 relative z-10 text-center">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-6 tracking-tight">
                How It Works
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-16 text-lg">
                Simple steps to support the causes you care about — securely and transparently.
            </p>

            <div class="grid md:grid-cols-3 gap-10">
                <div class="group bg-white shadow-md hover:shadow-xl rounded-2xl p-8 transition transform hover:-translate-y-2 duration-300">
                    <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 text-xl font-bold">
                        1
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 group-hover:text-blue-600 transition">
                        Choose a Support Area
                    </h3>
                    <p class="text-gray-600">
                        Pick the causes you care about most and view their donation wallets.
                    </p>
                </div>

                <div class="group bg-white shadow-md hover:shadow-xl rounded-2xl p-8 transition transform hover:-translate-y-2 duration-300">
                    <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center rounded-full bg-green-100 text-green-600 text-xl font-bold">
                        2
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 group-hover:text-green-600 transition">
                        Send Your Crypto Contribution
                    </h3>
                    <p class="text-gray-600">
                        Use any wallet app to send your preferred cryptocurrency safely.
                    </p>
                </div>

                <div class="group bg-white shadow-md hover:shadow-xl rounded-2xl p-8 transition transform hover:-translate-y-2 duration-300">
                    <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center rounded-full bg-purple-100 text-purple-600 text-xl font-bold">
                        3
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 group-hover:text-purple-600 transition">
                        Upload Your Payment Receipt
                    </h3>
                    <p class="text-gray-600">
                        After payment, upload a screenshot of your transaction for confirmation.
                    </p>
                </div>
            </div>
        </div>

        <div class="absolute top-10 left-10 w-24 h-24 bg-blue-200 rounded-full blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-32 h-32 bg-green-200 rounded-full blur-3xl opacity-30 animate-pulse"></div>
    </section>

        <!-- OUR PROJECTS SECTION -->
    <section class="px-6 md:px-20 py-20 bg-white">
        <div class="flex justify-between items-center mb-10">
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

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($projects as $project)
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-shadow overflow-hidden border border-gray-100">
                    <div class="relative w-full h-56 md:h-60">
                        <img src="{{ $project['img'] }}" alt="{{ $project['title'] }}"
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg md:text-xl font-semibold text-gray-900 mb-2">
                            {{ $project['title'] }}
                        </h3>
                        <p class="text-gray-600 text-sm md:text-base">
                            {{ $project['desc'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="ukraine-support" class="relative py-20 bg-gradient-to-br from-blue-50 via-white to-blue-100 dark:from-gray-800 dark:via-gray-900 dark:to-gray-800">
  <div class="max-w-7xl mx-auto px-4">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-12 gap-8">
      <div>
        <h2 class="text-3xl font-bold text-blue-800 dark:text-blue-400">
          Government support to Ukraine: Type of assistance (€ billion)
        </h2>
        <p class="text-gray-700 dark:text-gray-300 mt-1 text-sm">
          Allocations January 24, 2022 to August 31, 2025. Data on 42 donors.
        </p>
      </div>

      <div>
        <h2 class="text-3xl font-bold text-blue-800 dark:text-blue-400">
          Government support to Ukraine: By donor GDP
        </h2>
        <p class="text-gray-700 dark:text-gray-300 mt-1 text-sm">
          Allocations January 24, 2022 to August 31, 2025. Data on 27 EU Member States.
        </p>
      </div>
    </div>

    <!-- Charts Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
      <!-- Left Chart -->
      <div class="bg-white/90 dark:bg-gray-800/90 rounded-2xl shadow-lg p-8 backdrop-blur-sm">
        <div class="flex flex-wrap gap-4 mb-6 text-sm font-medium">
          <div class="flex items-center gap-2"><span class="w-3 h-3 bg-orange-500 rounded-sm"></span>Military</div>
          <div class="flex items-center gap-2"><span class="w-3 h-3 bg-blue-400 rounded-sm"></span>Financial</div>
          <div class="flex items-center gap-2"><span class="w-3 h-3 bg-blue-800 rounded-sm"></span>Humanitarian</div>
        </div>

        @php
          $aidAllocations = [
            ['country' => 'United States', 'military' => 64.6, 'financial' => 46.6, 'humanitarian' => 2.0],
            ['country' => 'EU (Commission and Council)', 'military' => 0, 'financial' => 66.9, 'humanitarian' => 1.0],
            ['country' => 'Germany', 'military' => 17.7, 'financial' => 0.5, 'humanitarian' => 0.2],
          ];
          $maxAid = max(array_map(fn($a) => ($a['military'] ?? 0) + ($a['financial'] ?? 0) + ($a['humanitarian'] ?? 0), $aidAllocations));
        @endphp

        <div class="space-y-6">
          @foreach ($aidAllocations as $item)
            @php
              $militaryPercent = ($item['military'] / $maxAid) * 100;
              $financialPercent = ($item['financial'] / $maxAid) * 100;
              $humanitarianPercent = ($item['humanitarian'] / $maxAid) * 100;
            @endphp
            <div class="aid-bar opacity-0 translate-y-3 transition-all duration-700"
                 data-military="{{ $militaryPercent }}"
                 data-financial="{{ $financialPercent }}"
                 data-humanitarian="{{ $humanitarianPercent }}">
              <div class="flex justify-between mb-1 text-gray-800 dark:text-gray-200 font-medium">
                <span>{{ $item['country'] }}</span>
              </div>
              <div class="flex h-6 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700">
                <div class="bar-military bg-gradient-to-r from-orange-400 to-orange-600 text-xs pr-1 text-white flex items-center justify-end transition-all duration-[1500ms] ease-out" style="width:0%">
                  {{ $item['military'] ?: '' }}
                </div>
                <div class="bar-financial bg-gradient-to-r from-blue-300 to-blue-500 text-xs pr-1 text-white flex items-center justify-end transition-all duration-[1500ms] ease-out" style="width:0%">
                  {{ $item['financial'] ?: '' }}
                </div>
                <div class="bar-humanitarian bg-gradient-to-r from-blue-700 to-blue-900 text-xs pr-1 text-white flex items-center justify-end transition-all duration-[1500ms] ease-out" style="width:0%">
                  {{ $item['humanitarian'] ?: '' }}
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <!-- Right Chart -->
      <div class="bg-white/90 dark:bg-gray-800/90 rounded-2xl shadow-lg p-8 backdrop-blur-sm">
        <div class="flex flex-wrap gap-4 mb-6 text-sm font-medium">
          <div class="flex items-center gap-2"><span class="w-3 h-3 bg-blue-800 rounded-sm"></span>Bilateral aid (% GDP)</div>
          <div class="flex items-center gap-2"><span class="w-3 h-3 bg-blue-400 rounded-sm"></span>EU aid (% GDP)</div>
        </div>

        @php
          $gdpAid = [
            ['country' => 'Denmark', 'bilateral' => 2.9, 'euShare' => 0.5],
            ['country' => 'Estonia', 'bilateral' => 2.8, 'euShare' => 0.5],
            ['country' => 'Lithuania', 'bilateral' => 2.2, 'euShare' => 0.4],
          ];
        @endphp

        <div class="space-y-6">
          @foreach ($gdpAid as $item)
            @php
              $total = $item['bilateral'] + $item['euShare'];
              $bilateralPercent = ($item['bilateral'] / $total) * 100;
              $euPercent = ($item['euShare'] / $total) * 100;
            @endphp
            <div class="gdp-bar opacity-0 translate-y-3 transition-all duration-700"
                 data-bilateral="{{ $bilateralPercent }}"
                 data-eu="{{ $euPercent }}">
              <div class="flex justify-between mb-1 text-gray-800 dark:text-gray-200 font-medium">
                <span>{{ $item['country'] }}</span>
              </div>
              <div class="flex h-6 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700">
                <div class="bar-bilateral bg-gradient-to-r from-blue-700 to-blue-900 text-xs pr-1 text-white flex items-center justify-end transition-all duration-[1500ms] ease-out" style="width:0%">
                  {{ $item['bilateral'] }}%
                </div>
                <div class="bar-eu bg-gradient-to-r from-blue-300 to-blue-500 text-xs pr-1 text-white flex items-center justify-end transition-all duration-[1500ms] ease-out" style="width:0%">
                  {{ $item['euShare'] }}%
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <p class="text-xs text-gray-600 dark:text-gray-400 mt-12 text-center italic">
      Source: Trebesch et al. (2023) “The Ukraine Support Tracker” Kiel WP
    </p>
  </div>
</section>

<!-- Animation Script -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.remove('opacity-0', 'translate-y-3');

          const military = entry.target.dataset.military;
          const financial = entry.target.dataset.financial;
          const humanitarian = entry.target.dataset.humanitarian;
          const bilateral = entry.target.dataset.bilateral;
          const eu = entry.target.dataset.eu;

          if (military) entry.target.querySelector('.bar-military').style.width = military + '%';
          if (financial) entry.target.querySelector('.bar-financial').style.width = financial + '%';
          if (humanitarian) entry.target.querySelector('.bar-humanitarian').style.width = humanitarian + '%';
          if (bilateral) entry.target.querySelector('.bar-bilateral').style.width = bilateral + '%';
          if (eu) entry.target.querySelector('.bar-eu').style.width = eu + '%';
        }
      });
    }, { threshold: 0.3 });

    document.querySelectorAll('.aid-bar, .gdp-bar').forEach(el => observer.observe(el));
  });
</script>

@endsection

<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md border-b border-gray-200 shadow-sm fixed top-0 left-0 right-0 z-40 transition-all duration-300">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-3">
        <div class="flex items-center gap-4">
            <button @click="open = !open" class="md:hidden text-gray-600 hover:text-blue-600 focus:outline-none transition">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <a href="{{ route('home') }}" class="text-xl font-bold text-blue-700 hover:text-blue-800 transition-colors duration-200">
                Friends of the Battalion
            </a>
        </div>
        <div class="flex items-center gap-6 text-sm">
            <span class="text-gray-700 font-medium hidden sm:inline">
                Welcome, <span class="text-blue-600">{{ Auth::user()->name }}</span>
            </span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 active:scale-95 transition-transform duration-200 shadow-md">
                    Logout
                </button>
            </form>
        </div>
    </div>
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-x-full"
         x-transition:enter-end="opacity-100 translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-x-0"
         x-transition:leave-end="opacity-0 -translate-x-full"
         class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg border-r border-gray-200 p-6 md:hidden z-50">
        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-6">Menu</h3>
        <ul class="space-y-3">
            <li>
                <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-blue-600 font-semibold bg-blue-50 hover:bg-blue-100 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m4-8v8m0-8l2 2m-2-2l-7 7-7-7" />
                    </svg>
                    Overview
                </a>
            </li>
            <li>
                <a href="#support" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    My Support
                </a>
            </li>
            <li>
                <a href="#settings" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17a4 4 0 100-8 4 4 0 000 8z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1112.21 3 9.001 9.001 0 0121 12.79z" />
                    </svg>
                    Settings
                </a>
            </li>
        </ul>
    </div>
</nav>
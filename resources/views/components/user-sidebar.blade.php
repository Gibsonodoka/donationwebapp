<aside x-data="{ collapsed: false }" :class="collapsed ? 'w-20' : 'w-64'"
       class="bg-white border-r border-gray-200 h-screen fixed top-16 left-0 hidden md:flex flex-col shadow-sm transition-all duration-300">
    <div class="p-6 flex-1 overflow-y-auto">
        <button @click="collapsed = !collapsed" class="mb-6 w-full flex items-center justify-center text-gray-400 hover:text-blue-600 transition-transform">
            <svg xmlns="http://www.w3.org/2000/svg" :class="collapsed ? 'rotate-180' : ''" class="w-5 h-5 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <h3 x-show="!collapsed" class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-6">Menu</h3>
        <ul class="space-y-3">
            <li>
                <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-blue-600 font-semibold bg-blue-50 hover:bg-blue-100 hover:text-blue-700 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m4-8v8m0-8l2 2m-2-2l-7 7-7-7" />
                    </svg>
                    <span x-show="!collapsed" class="truncate">Overview</span>
                </a>
            </li>
            <li>
                <a href="#support" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span x-show="!collapsed" class="truncate">My Support</span>
                </a>
            </li>
            <li>
                <a href="#settings" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17a4 4 0 100-8 4 4 0 000 8z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1112.21 3 9.001 9.001 0 0121 12.79z" />
                    </svg>
                    <span x-show="!collapsed" class="truncate">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
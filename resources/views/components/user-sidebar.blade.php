<aside x-data="{ collapsed: false }"
       :class="collapsed ? 'w-20' : 'w-64'"
       class="bg-white border-r border-gray-200 h-screen fixed top-16 left-0 hidden md:flex flex-col shadow-sm transition-all duration-300">

    <div class="p-6 flex-1 overflow-y-auto">
        <!-- Collapse Button -->
        <button @click="collapsed = !collapsed"
                class="mb-6 w-full flex items-center justify-center text-gray-400 hover:text-blue-600 transition-transform">
            <svg xmlns="http://www.w3.org/2000/svg"
                 :class="collapsed ? 'rotate-180' : ''"
                 class="w-5 h-5 transform transition-transform duration-300"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <!-- Menu Title -->
        <h3 x-show="!collapsed" class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-6">
            Menu
        </h3>

        <!-- Menu Items -->
        <ul class="space-y-3">

            <!-- Overview -->
            <li>
                <a href="{{ route('user.dashboard') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg transition-all duration-200
                   {{ request()->routeIs('user.dashboard') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m4-8v8m0-8l2 2m-2-2l-7 7-7-7" />
                    </svg>
                    <span x-show="!collapsed" class="truncate">Overview</span>
                </a>
            </li>

            <!-- My Support -->
            <li>
                <a href="{{ route('user.support') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg transition-all duration-200
                   {{ request()->routeIs('user.support') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7" />
                    </svg>
                    <span x-show="!collapsed" class="truncate">My Support</span>
                </a>
            </li>

            <!-- Contact -->
            <li>
                <a href="mailto:support@wingsupportua.com"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg transition-all duration-200 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 12H8m0 0l4 4m-4-4l4-4m8 8V8a2 2 0 00-2-2H6a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2z" />
                    </svg>
                    <span x-show="!collapsed" class="truncate">Contact</span>
                </a>
            </li>

        </ul>
    </div>
</aside>

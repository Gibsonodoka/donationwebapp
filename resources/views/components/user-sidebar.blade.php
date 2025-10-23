<!-- Navbar (for toggle button on mobile) -->
<nav x-data="{ open: false }" class="bg-white border-b shadow-sm fixed top-0 left-0 right-0 z-40">
  <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-3">
    <div class="flex items-center gap-3">
      <!-- Mobile toggle -->
      <button @click="open = !open" class="md:hidden p-2 rounded-lg hover:bg-gray-100 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" x-show="!open" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" x-show="open" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

      <a href="{{ route('home') }}" class="text-xl font-bold text-blue-700">
        Friends of the Battalion
      </a>
    </div>

    <div class="flex items-center gap-6 text-sm">
      <span class="text-gray-700">Welcome, {{ Auth::user()->name }}</span>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all">
          Logout
        </button>
      </form>
    </div>
  </div>

  <!-- Mobile Overlay Sidebar -->
  <div 
    x-show="open" 
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-x-full"
    x-transition:enter-end="opacity-100 translate-x-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 -translate-x-full"
    class="fixed inset-0 bg-black bg-opacity-40 z-30 md:hidden"
    @click="open = false"
  >
    <aside 
      class="w-64 bg-white border-r border-gray-200 h-full p-6 shadow-lg"
      @click.stop
    >
      <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-6">Menu</h3>
      <ul class="space-y-3">
        <li>
          <a href="{{ route('user.dashboard') }}" 
             class="flex items-center gap-3 px-3 py-2 rounded-lg text-blue-600 font-semibold bg-blue-50 hover:bg-blue-100 hover:text-blue-700 transition-all duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m4-8v8m0-8l2 2m-2-2l-7 7-7-7" />
            </svg>
            Overview
          </a>
        </li>
        <li>
          <a href="#support" 
             class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            My Support
          </a>
        </li>
        <li>
          <a href="#settings" 
             class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17a4 4 0 100-8 4 4 0 000 8z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1112.21 3 9.001 9.001 0 0121 12.79z" />
            </svg>
            Settings
          </a>
        </li>
      </ul>
    </aside>
  </div>
</nav>

<!-- Desktop Sidebar (collapsible) -->
<aside 
  x-data="{ collapsed: false }" 
  :class="collapsed ? 'w-20' : 'w-64'"
  class="bg-white border-r border-gray-200 h-screen fixed top-16 left-0 hidden md:flex flex-col shadow-sm transition-all duration-300"
>
  <div class="p-6 flex-1 overflow-y-auto">
    <!-- Collapse Button -->
    <button 
      @click="collapsed = !collapsed" 
      class="mb-6 w-full flex items-center justify-center text-gray-400 hover:text-blue-600 transition-transform"
    >
      <svg xmlns="http://www.w3.org/2000/svg" :class="collapsed ? 'rotate-180' : ''" class="w-5 h-5 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
    </button>

    <h3 x-show="!collapsed" class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-6">Menu</h3>

    <ul class="space-y-3">
      <li>
        <a href="{{ route('user.dashboard') }}" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-blue-600 font-semibold bg-blue-50 hover:bg-blue-100 hover:text-blue-700 transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m4-8v8m0-8l2 2m-2-2l-7 7-7-7" />
          </svg>
          <span x-show="!collapsed" class="truncate">Overview</span>
        </a>
      </li>
      <li>
        <a href="#support" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          <span x-show="!collapsed" class="truncate">My Support</span>
        </a>
      </li>
      <li>
        <a href="#settings" 
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all duration-200">
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

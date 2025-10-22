<aside class="w-64 bg-white border-r h-screen fixed top-16 left-0 hidden md:block">
  <div class="p-6">
    <h3 class="text-sm font-semibold text-gray-600 uppercase mb-4">Admin Menu</h3>
    <ul class="space-y-3">
      <!-- Dashboard Overview -->
      <li>
        <a href="{{ route('admin.index') }}" 
           class="flex items-center gap-2 {{ request()->routeIs('admin.index') ? 'text-blue-600 font-semibold' : 'text-gray-700 hover:text-blue-600' }}">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m4-8v8m0-8l2 2m-2-2l-7 7-7-7" />
          </svg>
          Dashboard Overview
        </a>
      </li>

      <!-- Manage Users -->
      <li>
        <a href="#users" 
           class="flex items-center gap-2 text-gray-700 hover:text-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M17 20h5v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2h5m10 0v-2a4 4 0 00-4-4m0 0a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
          Manage Users
        </a>
      </li>

      <!-- Program Subscriptions -->
      <li>
        <a href="#subscriptions" 
           class="flex items-center gap-2 text-gray-700 hover:text-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M3 7h18M3 12h18M3 17h18" />
          </svg>
          Program Subscriptions
        </a>
      </li>

      <!-- Donations Management -->
      <li>
        <a href="{{ route('admin.donations') }}" 
           class="flex items-center gap-2 {{ request()->routeIs('admin.donations') ? 'text-blue-600 font-semibold' : 'text-gray-700 hover:text-blue-600' }}">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0-6v2m0 16v2m8-8h2M2 12h2m14.243-7.757l1.414 1.414M4.343 19.657l1.414 1.414m0-16.97L4.343 4.343m14.142 14.142l1.414-1.414" />
          </svg>
          Manage Donations
        </a>
      </li>

      <!-- Reports -->
      <li>
        <a href="#reports" 
           class="flex items-center gap-2 text-gray-700 hover:text-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M9 17v-6h13v6M9 17H4v-6h5m13 6v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4" />
          </svg>
          Reports
        </a>
      </li>
    </ul>
  </div>
</aside>

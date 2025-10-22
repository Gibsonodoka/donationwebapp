<aside class="w-64 bg-white border-r h-screen fixed top-16 left-0 hidden md:block">
  <div class="p-6">
    <h3 class="text-sm font-semibold text-gray-600 uppercase mb-4">Menu</h3>
    <ul class="space-y-3">
      <li>
        <a href="{{ route('user.dashboard') }}" 
           class="flex items-center gap-2 text-blue-600 font-semibold hover:text-blue-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m4-8v8m0-8l2 2m-2-2l-7 7-7-7" />
          </svg>
          Overview
        </a>
      </li>
      <li>
        <a href="#support" class="flex items-center gap-2 text-gray-700 hover:text-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          My Support
        </a>
      </li>
      <li>
        <a href="#settings" class="flex items-center gap-2 text-gray-700 hover:text-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17a4 4 0 100-8 4 4 0 000 8z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1112.21 3 9.001 9.001 0 0121 12.79z" />
          </svg>
          Settings
        </a>
      </li>
    </ul>
  </div>
</aside>

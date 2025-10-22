<nav class="bg-white border-b shadow-sm fixed top-0 left-0 right-0 z-40">
  <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-3">
    <a href="{{ route('home') }}" class="text-xl font-bold text-blue-700">
      Friends of the Battalion
    </a>

    <div class="flex items-center gap-6 text-sm">
      <span class="text-gray-700">Welcome, {{ Auth::user()->name }}</span>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
          Logout
        </button>
      </form>
    </div>
  </div>
</nav>

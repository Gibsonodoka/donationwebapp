<nav class="bg-white shadow-sm py-4">
  <div class="max-w-6xl mx-auto flex justify-between items-center px-6">
    <a href="{{ route('home') }}" class="text-xl font-bold text-blue-700">
      Friends of the Battalion
    </a>
    <div class="flex items-center gap-6 text-sm font-medium">
      @auth
        <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600">Dashboard</a>
        <form action="{{ route('logout') }}" method="POST" class="inline">
          @csrf
          <button type="submit" class="text-gray-700 hover:text-blue-600">Logout</button>
        </form>
      @else
        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Login</a>
        <a href="{{ route('register') }}" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg">
          Join Now
        </a>
      @endauth
    </div>
  </div>
</nav>

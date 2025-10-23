<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Confirm Password - Friends of the Battalion</title>
  @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-br from-blue-50 via-white to-blue-100 text-gray-800">

  <!-- NAVBAR COMPONENT -->
  <x-main-navbar />

  <!-- CONFIRM PASSWORD SECTION -->
  <main class="flex-grow flex items-center justify-center py-16 px-4">
    <div class="w-full max-w-md bg-white/90 backdrop-blur-md rounded-2xl shadow-xl p-8">

      <!-- Header -->
      <div class="text-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Confirm Your Password</h1>
        <p class="text-gray-600 mt-2 text-sm">
          This is a secure area of the application. Please confirm your password before continuing.
        </p>
      </div>

      <!-- Display session status (if any) -->
      @if (session('status'))
        <div class="mb-4 p-3 text-sm text-green-700 bg-green-100 border border-green-300 rounded-lg">
          {{ session('status') }}
        </div>
      @endif

      <!-- Confirm Password Form -->
      <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
        @csrf

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <input id="password" name="password" type="password" required autocomplete="current-password"
                 class="w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          @error('password')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="flex items-center justify-end">
          <button type="submit"
                  class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition">
            Confirm
          </button>
        </div>
      </form>
    </div>
  </main>

  <!-- FOOTER COMPONENT -->
  <x-main-footer />

</body>
</html>

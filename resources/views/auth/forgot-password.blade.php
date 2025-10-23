<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Forgot Password - Friends of the Battalion</title>
  @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-br from-blue-50 via-white to-blue-100 text-gray-800">

  <!-- NAVBAR COMPONENT -->
  <x-main-navbar />

  <!-- PASSWORD RESET SECTION -->
  <main class="flex-grow flex items-center justify-center py-16 px-4">
    <div class="w-full max-w-md bg-white/90 backdrop-blur-md rounded-2xl shadow-xl p-8">

      <!-- Header -->
      <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-blue-700">Forgot Password</h1>
        <p class="text-gray-600 mt-2">
          Don’t worry. Enter your email below, and we’ll send you a link to reset your password.
        </p>
      </div>

      <!-- Session Status -->
      @if (session('status'))
        <div class="mb-4 p-3 text-sm text-green-700 bg-green-100 border border-green-300 rounded-lg">
          {{ session('status') }}
        </div>
      @endif

      <!-- Forgot Password Form -->
      <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
          <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                 class="w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          @error('email')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Submit -->
        <div>
          <button type="submit"
                  class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow-md hover:shadow-lg transition">
            Send Password Reset Link
          </button>
        </div>

        <!-- Back to login -->
        <p class="text-center text-gray-600 text-sm mt-4">
          Remember your password?
          <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-semibold">
            Log in
          </a>
        </p>
      </form>
    </div>
  </main>

  <!-- FOOTER COMPONENT -->
  <x-main-footer />

</body>
</html>

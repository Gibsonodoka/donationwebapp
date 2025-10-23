<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Friends of the Battalion</title>
  @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-br from-blue-50 via-white to-blue-100 text-gray-800">

  <!-- NAVBAR COMPONENT -->
  <x-main-navbar />

  <!-- LOGIN SECTION -->
  <main class="flex-grow flex items-center justify-center py-16 px-4">
    <div class="w-full max-w-md bg-white/90 backdrop-blur-md rounded-2xl shadow-xl p-8">
      <!-- Title -->
      <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-blue-700">Welcome Back</h1>
        <p class="text-gray-500 mt-1">Login to continue your support</p>
      </div>

      <!-- Session Message -->
      @if (session('status'))
        <div class="mb-4 p-3 text-sm text-green-700 bg-green-100 border border-green-300 rounded-lg">
          {{ session('status') }}
        </div>
      @endif

      <!-- Login Form -->
      <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
          <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                 class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm px-3 py-2">
          @error('email')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <input id="password" type="password" name="password" required
                 class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm px-3 py-2">
          @error('password')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Remember Me + Forgot Password -->
        <div class="flex items-center justify-between text-sm">
          <label for="remember_me" class="inline-flex items-center text-gray-600">
            <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
            <span class="ml-2">Remember me</span>
          </label>

          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-blue-600 hover:text-blue-700 font-medium">
              Forgot password?
            </a>
          @endif
        </div>

        <!-- Submit Button -->
        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow-md hover:shadow-lg transition">
          Log In
        </button>

        <!-- Divider -->
        <div class="flex items-center justify-center my-4">
          <span class="h-px w-16 bg-gray-300"></span>
          <span class="px-2 text-gray-500 text-sm">or</span>
          <span class="h-px w-16 bg-gray-300"></span>
        </div>

        <!-- Sign Up Link -->
        <p class="text-center text-gray-600 text-sm">
          Don’t have an account?
          <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 font-semibold">Sign up</a>
        </p>
      </form>
    </div>
  </main>

  <!-- FOOTER COMPONENT -->
  <x-main-footer />

</body>
</html>

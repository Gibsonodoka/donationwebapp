<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Register - Friends of the Battalion</title>
  @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-br from-blue-50 via-white to-blue-100 text-gray-800">

  <!-- NAVBAR COMPONENT -->
  <x-main-navbar />

  <!-- REGISTER SECTION -->
  <main class="flex-grow flex items-center justify-center py-16 px-4">
    <div class="w-full max-w-md bg-white/90 backdrop-blur-md rounded-2xl shadow-xl p-8">
      <!-- Header -->
      <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-blue-700">Create an Account</h1>
        <p class="text-gray-500 mt-1">Join Friends of the Battalion and start supporting our mission</p>
      </div>

      <!-- Display session status (if any) -->
      @if (session('status'))
        <div class="mb-4 p-3 text-sm text-green-700 bg-green-100 border border-green-300 rounded-lg">
          {{ session('status') }}
        </div>
      @endif

      <!-- Registration Form -->
      <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
          <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name"
                 class="w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
          <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username"
                 class="w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          @error('email')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <input id="password" name="password" type="password" required autocomplete="new-password"
                 class="w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          @error('password')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Confirm Password -->
        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
          <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                 class="w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          @error('password_confirmation')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Submit -->
        <div>
          <button type="submit"
                  class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow-md hover:shadow-lg transition">
            Register
          </button>
        </div>

        <!-- Divider -->
        <div class="flex items-center justify-center my-4">
          <span class="h-px w-16 bg-gray-300"></span>
          <span class="px-2 text-gray-500 text-sm">or</span>
          <span class="h-px w-16 bg-gray-300"></span>
        </div>

        <!-- Already registered -->
        <p class="text-center text-gray-600 text-sm">
          Already registered?
          <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-semibold">Log in</a>
        </p>
      </form>
    </div>
  </main>

  <!-- FOOTER COMPONENT -->
  <x-main-footer />

</body>
</html>

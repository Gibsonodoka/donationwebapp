<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Verify Email - Friends of the Battalion</title>
  @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-br from-blue-50 via-white to-blue-100 text-gray-800">

  <!-- NAVBAR COMPONENT -->
  <x-main-navbar />

  <!-- VERIFY EMAIL SECTION -->
  <main class="flex-grow flex items-center justify-center py-16 px-4">
    <div class="w-full max-w-md bg-white/90 backdrop-blur-md rounded-2xl shadow-xl p-8">

      <!-- Header -->
      <div class="text-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Verify Your Email</h1>
        <p class="text-gray-600 mt-2 text-sm">
          Thanks for signing up! Before getting started, please verify your email address by clicking on the link we just sent you.
          If you didn’t receive the email, we’ll gladly send you another.
        </p>
      </div>

      <!-- Status message -->
      @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-700 bg-green-100 border border-green-300 rounded-lg p-3">
          A new verification link has been sent to the email address you provided during registration.
        </div>
      @endif

      <!-- Buttons -->
      <div class="mt-6 flex items-center justify-between">
        <!-- Resend Verification -->
        <form method="POST" action="{{ route('verification.send') }}">
          @csrf
          <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition">
            Resend Verification Email
          </button>
        </form>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit"
            class="text-sm text-gray-700 hover:text-red-600 font-medium underline transition">
            Log Out
          </button>
        </form>
      </div>
    </div>
  </main>

  <!-- FOOTER COMPONENT -->
  <x-main-footer />

</body>
</html>

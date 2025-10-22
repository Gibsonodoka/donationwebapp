<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard | Friends of the Battalion</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

  <!-- Navbar -->
  @include('components.user-navbar')

  <div class="flex pt-16">
    <!-- Sidebar -->
    @include('components.user-sidebar')

    <!-- Main content -->
    <main class="flex-1 md:ml-64 p-8 min-h-screen">
      @yield('content')
    </main>
  </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | Friends of the Battalion</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

  <!-- Navbar -->
  @include('components.admin-navbar')

  <div class="flex pt-16">
    <!-- Sidebar -->
    @include('components.admin-sidebar')

    <!-- Main Content -->
    <main class="flex-1 md:ml-64 p-8 min-h-screen">
      @yield('content')
    </main>
  </div>

</body>
</html>

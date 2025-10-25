<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Friends of the Battalion</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 antialiased">
    @include('components.admin-navbar')
    <div class="flex pt-16">
        @include('components.admin-sidebar')
        <main class="flex-1 md:ml-64 p-8 min-h-screen">
            @yield('content')
        </main>
    </div>
</body>
</html>
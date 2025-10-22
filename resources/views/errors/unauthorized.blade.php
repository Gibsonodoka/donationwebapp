<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Unauthorized Access</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col items-center justify-center min-h-screen">

  <div class="bg-white rounded-2xl shadow-lg p-10 text-center max-w-md border">
    <h1 class="text-4xl font-bold text-red-600 mb-4">403</h1>
    <h2 class="text-xl font-semibold mb-2">Unauthorized Access</h2>
    <p class="text-gray-600 mb-6">
      You don’t have permission to view this page.  
      Please contact your administrator if you believe this is a mistake.
    </p>
    <a href="{{ route('home') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold">
      Go Back Home
    </a>
  </div>

</body>
</html>

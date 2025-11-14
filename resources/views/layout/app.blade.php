<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Millsap Farm Dashboard' }}</title>

    @vite('resources/css/app.css')

    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <main class="min-h-screen">
        @yield('content')
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>

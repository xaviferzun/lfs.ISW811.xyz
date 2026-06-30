@props(['title' => 'Laracasts'])

<!DOCTYPE html>
<html lang="en" data-theme="night">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-primary">
    <x-nav />

    <main class = "max-w-3xl mx-auto mt-6">
        {{ $slot }}
    </main>
</body>
</html>   
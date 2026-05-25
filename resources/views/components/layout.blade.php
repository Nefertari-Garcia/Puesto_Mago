@props([
    'title' => 'Laracasts'
])

<!DOCTYPE html>
<html lang="en" data-theme="coffee">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    @vite(['resources/css/app.css', 'resource/js/app.js'])
</head>
<body class="text-primary">

    <x-nav />

    <main class="max-w-4xl mx-auto mt-6 px-4">
        {{$slot}}
    </main>
</body>
</html>
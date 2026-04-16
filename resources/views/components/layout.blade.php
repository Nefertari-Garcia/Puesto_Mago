@props([
    'title' => 'Laracasts'
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .max-w-400{
            max-width: 400px;
            margin:auto;
        }
        .card{
            background:#e3e3e3; 
            padding:1rem; 
            text-align:center;
        }
    </style>
</head>
<body class="bg-gray-700 p-6 max-w-xl mx-auto">
    <nav class="text-amber-50">
        <a href="/" class="p-1.5">Home</a>
        <a href="/about" class="p-1.5">About us</a>
        <a href="/contact" class="p-1.5">Contact</a>
        <a href="/ideas" class="p-1.5">Ideas</a>
    </nav>
    <main>
        {{$slot}}
    </main>
</body>
</html>
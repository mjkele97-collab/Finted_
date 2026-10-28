@props(['title' => 'Finted'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<x-navbar />

<div class="container-fluid px-0">
    {{ $slot }}
</div>

<x-footer />

</body>
</html>
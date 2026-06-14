<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- <link rel="icon" href="https://github.com/user-attachments/assets/d0b28a4e-fa73-4178-9bde-78e327a7c767" type="image/png"> --}}

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="bg-gradient-to-br from-orange-50 to-green-50 min-h-screen">
    {{ $slot }}

    @livewireScripts
</body>
</html>

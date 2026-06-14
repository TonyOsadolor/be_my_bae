<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Something went wrong</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #fff7ed 0%, #f0fdf4 100%);
        }

    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-6 font-sans">

    <div class="max-w-md w-full bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-orange-100 text-center">
        <div class="flex justify-center mb-6">
            @yield('illustration')
        </div>

        <span class="px-4 py-1.5 bg-orange-100 text-orange-700 font-bold rounded-full text-sm uppercase tracking-wider">
            Error @yield('code')
        </span>

        <h1 class="text-2xl font-extrabold text-gray-800 mt-4 mb-2 font-serif">
            @yield('heading')
        </h1>

        <p class="text-gray-600 leading-relaxed mb-8 text-sm">
            @yield('description')
        </p>

        <div class="flex flex-col gap-3">
            <a href="{{ url('/') }}" class="inline-block w-full py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-full shadow-lg transition transform hover:scale-[1.02] text-sm">
                Take Me Home 🏠
            </a>
            <button onclick="window.location.reload();" class="text-xs text-gray-400 hover:text-gray-600 underline transition cursor-pointer">
                Try Refreshing the Page
            </button>
        </div>
    </div>

</body>
</html>

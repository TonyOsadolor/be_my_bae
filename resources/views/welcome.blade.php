<!DOCTYPE html>
<html lang="en" class="h-full bg-[#faf9f6]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safe Harbor Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        /* Smooth, organic floating animations for the background decorative blobs */
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-20px) scale(1.05); }
        }
        @keyframes float-delayed {
            0%, 100% { transform: translateY(0px) scale(1.05); }
            50% { transform: translateY(20px) scale(0.95); }
        }
        
        /* Subtle fade-in up animation for the central structural card */
        @keyframes fade-in-up {
            0% { opacity: 0; transform: translateY(30px); filter: blur(4px); }
            100% { opacity: 1; transform: translateY(0); filter: blur(0); }
        }

        /* Applying custom utility classes */
        .animate-blob-1 { animation: float-slow 8s infinite ease-in-out; }
        .animate-blob-2 { animation: float-delayed 10s infinite ease-in-out; }
        .animate-card { animation: fade-in-up 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    </style>
</head>
<body class="h-full overflow-hidden flex items-center justify-center relative select-none antialiased">

    <div class="absolute inset-0 z-0 overflow-hidden">
        <div class="absolute -top-20 -left-20 w-96 h-96 bg-orange-200/40 rounded-full mix-blend-multiply filter blur-3xl animate-blob-1"></div>
        <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-green-200/30 rounded-full mix-blend-multiply filter blur-3xl animate-blob-2"></div>
    </div>

    <div class="z-10 w-full max-w-md mx-4 p-8 bg-white/70 backdrop-blur-md rounded-2xl border border-orange-100/80 shadow-xl shadow-stone-200/50 text-center animate-card opacity-0">
        
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-orange-50 text-orange-500 mb-6 relative group">
            <span class="text-2xl transition-transform duration-700 group-hover:rotate-[360deg]">✨</span>
            <div class="absolute inset-0 rounded-full border border-orange-400/30 animate-ping opacity-75"></div>
        </div>

        <h1 class="text-3xl font-bold text-stone-800 tracking-tight font-serif mb-3">
            Be My Bae
        </h1>
        
        <p class="text-sm tracking-widest text-green-700 font-semibold uppercase mb-6">
            ⚓ The Safe Harbor Portal
        </p>

        <p class="text-stone-500 text-sm leading-relaxed mb-8 max-w-xs mx-auto">
            A quiet space to drop all performance, silence the outside world, and lock in our collective rhythm. 
        </p>

        <div class="relative group">
            <div class="absolute -inset-0.5 bg-gradient-to-r from-orange-500 to-green-600 rounded-lg blur opacity-40 group-hover:opacity-70 transition duration-500"></div>
            
            <a 
                href="{{ url('/' . ($slug ?? '') . '?token=' . ($token ?? '')) }}" 
                class="relative w-full block py-3 bg-gradient-to-r from-orange-500 to-green-600 hover:from-orange-600 hover:to-green-700 text-white font-medium rounded-lg text-sm transition-all duration-300 shadow-md transform active:scale-[0.98] tracking-wide"
            >
                Step Into Our Space 🥂
            </a>
        </div>

        <div class="mt-8 text-[11px] text-stone-400 tracking-wider uppercase font-sans">
            Trueminds Innovations &copy; {{ now()->year }}
        </div>

    </div>

</body>
</html>
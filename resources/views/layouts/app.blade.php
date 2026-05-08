<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PyLearn — Belajar Python</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ink: {
                            950: '#04091a',
                            900: '#070f26',
                            800: '#0c1a3b',
                            700: '#122248',
                            600: '#1a2f5e',
                            500: '#243e7a',
                            400: '#3557a0',
                            300: '#4e70bc',
                            200: '#7a9ad4',
                            100: '#b0c8ec',
                            50: '#dce9f8',
                        },
                        brand: {
                            blue: '#3b7cf4',
                            'blue-light': '#6b9ff7',
                            green: '#1fb87a',
                            'green-light': '#4dcf9b',
                            amber: '#e8a022',
                            'amber-light': '#f0bc5e',
                            red: '#e05252',
                            purple: '#7b5ef5',
                        },
                        surface: {
                            1: '#0b1630',
                            2: '#0f1e3e',
                            3: '#13244a',
                        },
                        text: {
                            primary: '#dce9f8',
                            secondary: '#7a9ad4',
                            muted: '#4e70bc',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #04091a;
            color: #dce9f8;
            font-family: system-ui, sans-serif;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>

    @if(session('new_badges'))
    <div id="badgePopup" class="fixed inset-0 z-[999] flex items-center justify-center p-4" style="display:flex">
        <div class="absolute inset-0 bg-black/70" onclick="closeBadgePopup()"></div>
        <div class="relative bg-gradient-to-b from-slate-800 to-slate-900 rounded-2xl border border-amber-500/50 p-8 text-center max-w-sm w-full shadow-[0_0_60px_rgba(245,158,11,0.3)] animate-bounce-in">
            <div class="absolute -top-4 -right-4 w-12 h-12 rounded-full bg-amber-500 flex items-center justify-center cursor-pointer" onclick="closeBadgePopup()">
                <i class="fa-solid fa-xmark text-white"></i>
            </div>
            <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center shadow-lg">
                <i class="fa-solid fa-medal text-4xl text-white"></i>
            </div>
            <div class="text-sm text-amber-400 font-medium mb-2">BADGE DIRAI</div>
            <h3 class="text-2xl font-serif font-bold text-white mb-2">{{ session('new_badges')->first()->name }}</h3>
            <p class="text-sm text-gray-400 mb-4">{{ session('new_badges')->first()->description }}</p>
            <button onclick="closeBadgePopup()" class="px-6 py-2 rounded-lg bg-amber-500 text-white font-medium hover:bg-amber-400 transition-all">
                OK
            </button>
        </div>
    </div>
    <script>
        function closeBadgePopup() { 
            var popup = document.getElementById('badgePopup');
            popup.style.opacity = '0';
            setTimeout(() => popup.style.display = 'none', 300);
        }
    </script>
    <style>
        @keyframes bounce-in { 0% { transform: scale(0.5); opacity: 0; } 50% { transform: scale(1.1); } 100% { transform: scale(1); opacity: 1; } }
        .animate-bounce-in { animation: bounce-in 0.5s ease-out forwards; }
    </style>
    @endif

    <script src="{{ asset('assets/pylearn/js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
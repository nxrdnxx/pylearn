<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PyLearn — Belajar Python</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
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
                            'green-light': '#34d399',
                            amber: '#e8a022',
                            'amber-light': '#f5b84d',
                            red: '#e05252',
                            'red-light': '#f87171',
                            purple: '#7b5ef5',
                        },
                        surface: {
                            1: '#0a1025',
                            2: '#121a36',
                            3: '#1a244a',
                        },
                        text: {
                            primary: '#ffffff',
                            secondary: '#94a3b8',
                            muted: '#64748b',
                        }
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #04091a;
            color: #ffffff;
            font-family: 'Outfit', sans-serif;
            -webkit-font-smoothing: antialiased;
        }
        /* Removed font-serif helper */
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: #04091a; }
        ::-webkit-scrollbar-thumb { 
            background: #121a36; 
            border-radius: 10px;
            border: 3px solid #04091a;
        }
        ::-webkit-scrollbar-thumb:hover { background: #1a244a; }
    </style>
</head>
<body class="antialiased selection:bg-brand-blue/30 selection:text-white">
    @if(!isset($hideNavbar) || !$hideNavbar)
        @include('layouts.navbar')
    @endif

    <main>
        @yield('content')
    </main>

    @if(session('new_badges'))
    @php
        $badge = is_array(session('new_badges')) ? session('new_badges')[0] : session('new_badges')->first();
    @endphp
    <div id="badgePopup" class="fixed inset-0 z-[999] flex items-center justify-center p-4 bg-ink-950/90 backdrop-blur-xl animate-fade-in">
        <div class="relative max-w-sm w-full animate-premium-pop">
            <!-- Glow Background Effect -->
            <div class="absolute inset-0 bg-brand-blue/20 blur-[100px] rounded-full"></div>
            
            <div class="relative bg-surface-1 border border-white/10 rounded-[40px] p-10 text-center shadow-2xl overflow-hidden">
                <!-- Decorative Elements -->
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-brand-blue to-transparent"></div>
                
                <div class="relative z-10">
                    <div class="w-28 h-28 mx-auto mb-8 relative">
                        <div class="absolute inset-0 bg-brand-blue/40 blur-3xl rounded-full animate-pulse"></div>
                        <div class="relative w-full h-full rounded-3xl bg-gradient-to-br from-brand-blue to-brand-blue-light flex items-center justify-center text-white shadow-2xl rotate-3">
                            <i class="{{ $badge->icon ?? 'fa-solid fa-medal' }} text-5xl"></i>
                        </div>
                    </div>

                    <div class="text-brand-blue-light text-[10px] font-bold tracking-[0.3em] uppercase mb-4">Pencapaian Baru Dibuka</div>
                    <h3 class="text-3xl font-semibold text-white mb-4 tracking-tight">{{ $badge->name }}</h3>
                    <p class="text-sm text-text-secondary mb-10 leading-relaxed px-4">
                        {{ $badge->description }}
                    </p>

                    <button onclick="closeBadgePopup()" class="w-full py-5 rounded-[24px] bg-brand-blue text-white font-bold text-base hover:bg-brand-blue-light hover:shadow-[0_20px_40px_rgba(59,124,244,0.3)] transition-all duration-300 active:scale-[0.97]">
                        Luar Biasa!
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function closeBadgePopup() { 
            const popup = document.getElementById('badgePopup');
            popup.classList.add('animate-fade-out');
            setTimeout(() => popup.remove(), 400);
        }
    </script>
    <style>
        @keyframes premium-pop {
            0% { transform: scale(0.8) translateY(40px); opacity: 0; }
            100% { transform: scale(1) translateY(0); opacity: 1; }
        }
        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes fade-out {
            from { opacity: 1; transform: scale(1); }
            to { opacity: 0; transform: scale(0.9); }
        }
        .animate-premium-pop {
            animation: premium-pop 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .animate-fade-in {
            animation: fade-in 0.4s ease-out forwards;
        }
        .animate-fade-out {
            animation: fade-out 0.4s ease-in forwards;
        }
    </style>
    @endif

    <script src="{{ asset('assets/pylearn/js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
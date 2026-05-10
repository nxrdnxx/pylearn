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
    @php
        $badge = is_array(session('new_badges')) ? session('new_badges')[0] : session('new_badges')->first();
    @endphp
    <div id="badgePopup" class="fixed inset-0 z-[999] flex items-center justify-center p-4 bg-[#04091a]/80 backdrop-blur-md animate-fade-in">
        <div class="relative max-w-sm w-full animate-premium-pop">
            <!-- Glow Background Effect -->
            <div class="absolute inset-0 bg-brand-blue/20 blur-[100px] rounded-full"></div>
            
            <div class="relative bg-gradient-to-b from-surface-2 to-ink-950 rounded-[32px] border border-white/10 p-8 text-center shadow-[0_20px_50px_rgba(0,0,0,0.5)] overflow-hidden">
                <!-- Decorative Elements -->
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-brand-blue to-transparent"></div>
                
                <div class="relative z-10">
                    <div class="w-24 h-24 mx-auto mb-6 relative">
                        <div class="absolute inset-0 bg-brand-blue/30 blur-2xl rounded-full animate-pulse"></div>
                        <div class="relative w-full h-full rounded-full bg-gradient-to-br from-brand-blue to-brand-blue-light flex items-center justify-center text-white shadow-2xl">
                            <i class="{{ $badge->icon ?? 'fa-solid fa-medal' }} text-4xl"></i>
                        </div>
                    </div>

                    <div class="text-brand-blue-light text-xs font-bold tracking-[0.2em] uppercase mb-3">Achievement Unlocked</div>
                    <h3 class="text-2xl font-serif font-bold text-white mb-3 tracking-tight">{{ $badge->name }}</h3>
                    <p class="text-[15px] text-text-secondary mb-8 leading-relaxed px-2">
                        {{ $badge->description }}
                    </p>

                    <button onclick="closeBadgePopup()" class="w-full py-4 rounded-2xl bg-brand-blue text-white font-bold hover:bg-brand-blue-light hover:shadow-[0_0_25px_rgba(59,124,244,0.4)] transition-all duration-300 active:scale-[0.97]">
                        Terima Kasih!
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
            0% { transform: scale(0.8) translateY(20px); opacity: 0; }
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
            animation: premium-pop 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
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
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk ke PyLearn</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ink: { 950: '#04091a', 900: '#070f26' },
                        surface: { 1: '#0a1025', 2: '#121a36' },
                        brand: { 
                            blue: '#3b7cf4', 
                            'blue-light': '#6b9ff7',
                            green: '#1fb87a',
                            'green-light': '#34d399',
                            amber: '#e8a022',
                            'amber-light': '#f5b84d',
                            red: '#e05252',
                            'red-light': '#f87171',
                            purple: '#7b5ef5'
                        },
                        text: {
                            primary: '#ffffff',
                            secondary: '#94a3b8',
                            muted: '#64748b'
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
            font-family: 'Outfit', sans-serif;
            color: #ffffff;
        }
    </style>
</head>
<body class="antialiased">
<div class="min-h-screen flex items-center justify-center p-6 relative overflow-hidden bg-ink-950">
    <!-- Decorative Glows -->
    <div class="absolute w-[800px] h-[800px] rounded-full bg-brand-blue/10 blur-[150px] -top-52 -right-52 pointer-events-none"></div>
    <div class="absolute w-[600px] h-[600px] rounded-full bg-brand-purple/10 blur-[150px] -bottom-52 -left-52 pointer-events-none"></div>

    <div class="w-full max-w-[440px] relative z-10">
        <div class="text-center mb-10 animate-in fade-in slide-in-from-top-4 duration-700">
            <a href="{{ route('landing.index') }}" class="inline-flex items-center gap-3 font-semibold text-3xl text-white no-underline mb-8 group">
                <img src="{{ '/' . $pubDir . 'assets/favicon.svg' }}" alt="PyLearn" class="h-8 w-8 glow-python group-hover:glow-python transition-all duration-300">
                <span>PyLearn</span>
            </a>
            <h1 class="text-4xl font-semibold tracking-tight text-white mb-3">Selamat Datang</h1>
            <p class="text-text-secondary">Masuk dengan Google untuk memulai petualangan kodemu.</p>
        </div>

        <div class="bg-surface-1/50 backdrop-blur-2xl rounded-[32px] sm:rounded-[40px] border border-white/5 p-6 sm:p-10 shadow-2xl animate-in fade-in slide-in-from-bottom-8 duration-700 delay-200">
            @if(session('error'))
            <div class="bg-brand-red/10 border border-brand-red/20 px-5 py-4 rounded-2xl mb-8 text-sm text-brand-red-light flex items-center gap-3">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span>{{ session('error') }}</span>
            </div>
            @endif

            @if(session('success'))
            <div class="bg-brand-green/10 border border-brand-green/20 px-5 py-4 rounded-2xl mb-8 text-sm text-brand-green-light flex items-center gap-3">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('success') }}</span>
            </div>
            @endif

            <div class="text-center mb-8">
                <p class="text-text-secondary text-[15px]">Masuk dengan akun Google untuk melanjutkan.</p>
            </div>

            <a href="{{ route('auth.google') }}" class="w-full py-5 rounded-[24px] bg-white text-gray-900 font-bold text-base hover:bg-gray-100 hover:shadow-[0_20px_40px_rgba(255,255,255,0.15)] hover:-translate-y-1 transition-all active:scale-[0.98] shadow-xl flex items-center justify-center gap-3 group">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google Logo" class="w-6 h-6">
                <span>Masuk dengan Google</span>
            </a>

            <div class="relative flex py-6 items-center">
                <div class="flex-grow border-t border-white/5"></div>
                <span class="flex-shrink mx-4 text-text-muted text-[10px] font-bold uppercase tracking-[0.2em]">atau</span>
                <div class="flex-grow border-t border-white/5"></div>
            </div>

            <a href="{{ route('admin.login') }}" class="w-full py-4 rounded-[20px] border border-white/5 bg-ink-950/40 hover:bg-white/5 hover:border-white/10 text-brand-amber font-bold text-[15px] flex items-center justify-center gap-3 transition-all duration-300 active:scale-[0.98] shadow-lg group">
                <i class="fa-solid fa-shield-halved"></i>
                <span>Masuk sebagai Admin</span>
            </a>
        </div>
    </div>
</div>

<style>
    .animate-in {
        animation: animate-in 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    .delay-200 { animation-delay: 0.2s; }
    @keyframes animate-in {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
<script>
function togglePassword(btn) {
    const input = btn.parentElement.querySelector('input');
    const icon = btn.querySelector('i');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>
</body>
</html>
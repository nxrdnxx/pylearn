<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Masuk ke PyLearn</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
    <div class="absolute w-[800px] h-[800px] rounded-full bg-brand-amber/10 blur-[150px] -top-52 -right-52 pointer-events-none"></div>
    <div class="absolute w-[600px] h-[600px] rounded-full bg-brand-blue/10 blur-[150px] -bottom-52 -left-52 pointer-events-none"></div>

    <div class="w-full max-w-[440px] relative z-10">
        <div class="text-center mb-10 animate-in fade-in slide-in-from-top-4 duration-700">
            <a href="{{ route('landing.index') }}" class="inline-flex items-center gap-3 font-semibold text-3xl text-white no-underline mb-8 group">
                <i class="fa-solid fa-shield-halved text-brand-amber text-3xl drop-shadow-[0_0_10px_rgba(232,160,34,0.6)] group-hover:drop-shadow-[0_0_14px_rgba(232,160,34,0.9)] transition-all duration-300"></i>
                <span class="bg-gradient-to-r from-white to-amber-300 bg-clip-text text-transparent">Admin</span>
            </a>
            <h1 class="text-4xl font-semibold tracking-tight text-white mb-3">Panel Admin</h1>
            <p class="text-text-secondary">Masuk dengan akun admin untuk mengelola PyLearn.</p>
        </div>

                        <div class="bg-surface-1/50 backdrop-blur-2xl rounded-[32px] sm:rounded-[40px] border border-white/5 p-6 sm:p-10 shadow-2xl animate-in fade-in slide-in-from-bottom-8 duration-700 delay-200">
            @if(session('error'))
            <div class="bg-brand-red/10 border border-brand-red/20 px-5 py-4 rounded-2xl mb-8 text-sm text-brand-red-light flex items-center gap-3">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span>{{ session('error') }}</span>
            </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-text-muted uppercase tracking-[0.2em] ml-2">Alamat Email</label>
                    <div class="relative group">
                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-text-muted group-focus-within:text-brand-amber transition-colors">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <input class="w-full bg-ink-950/50 border border-white/5 rounded-[20px] pl-12 pr-6 py-4 text-[15px] text-white placeholder:text-text-muted outline-none focus:border-brand-amber/50 focus:ring-4 focus:ring-brand-amber/10 transition-all" type="email" name="email" placeholder="admin@email.com" required>
                    </div>
                    @error('email')
                    <p class="text-brand-red-light text-xs ml-2 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-text-muted uppercase tracking-[0.2em] ml-2">Password</label>
                    <div class="relative group">
                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-text-muted group-focus-within:text-brand-amber transition-colors">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <input class="w-full bg-ink-950/50 border border-white/5 rounded-[20px] pl-12 pr-14 py-4 text-[15px] text-white placeholder:text-text-muted outline-none focus:border-brand-amber/50 focus:ring-4 focus:ring-brand-amber/10 transition-all" type="password" name="password" placeholder="Masukkan password" required>
                        <button type="button" onclick="togglePassword(this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-text-muted hover:text-white transition-colors">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                    <p class="text-brand-red-light text-xs ml-2 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button class="w-full py-5 rounded-[24px] bg-brand-amber text-white font-bold text-base hover:bg-brand-amber-light hover:shadow-[0_20px_40px_rgba(232,160,34,0.3)] hover:-translate-y-1 transition-all active:scale-[0.98] shadow-xl shadow-brand-amber/10" type="submit">
                    Masuk sebagai Admin
                </button>
            </form>

            <p class="text-center text-[15px] text-text-secondary mt-8">
                Bukan admin?
                <a href="{{ route('login') }}" class="text-brand-blue-light font-bold hover:text-white transition-colors">
                    Masuk sebagai Pelajar
                </a>
            </p>
        </div>
        
        <div class="text-center mt-10 text-[10px] font-bold text-text-muted uppercase tracking-[0.2em] flex items-center justify-center gap-3">
            <div class="w-1 h-1 rounded-full bg-brand-amber"></div>
            Hanya untuk Admin
            <div class="w-1 h-1 rounded-full bg-brand-amber"></div>
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

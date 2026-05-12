<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar ke PyLearn</title>
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
                        serif: ['Playfair Display', 'serif'],
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
    <div class="absolute w-[800px] h-[800px] rounded-full bg-brand-purple/10 blur-[150px] -bottom-52 -left-52 pointer-events-none"></div>
    <div class="absolute w-[600px] h-[600px] rounded-full bg-brand-blue/10 blur-[150px] -top-52 -right-52 pointer-events-none"></div>

    <div class="w-full max-w-[480px] relative z-10 py-12">
        <div class="text-center mb-10 animate-in fade-in slide-in-from-top-4 duration-700">
            <a href="{{ route('landing.index') }}" class="inline-flex items-center gap-3 font-serif text-3xl text-white no-underline mb-8 group">
                <div class="w-12 h-12 rounded-2xl bg-brand-blue flex items-center justify-center shadow-2xl group-hover:scale-110 transition-transform">
                    <i class="fa-brands fa-python text-white text-xl"></i>
                </div>
                <span>Py<em class="italic text-brand-blue-light">Learn</em></span>
            </a>
            <h1 class="text-4xl font-serif font-bold tracking-tight text-white mb-3">Mulai Petualanganmu</h1>
            <p class="text-text-secondary">Daftar sekarang dan jadilah ahli Python secara gratis.</p>
        </div>

        <div class="bg-surface-1/50 backdrop-blur-2xl rounded-[40px] border border-white/5 p-10 shadow-2xl animate-in fade-in slide-in-from-bottom-8 duration-700 delay-200">
            @if ($errors->any())
            <div class="bg-brand-red/10 border border-brand-red/20 px-5 py-4 rounded-2xl mb-8 text-sm text-brand-red-light flex items-center gap-3">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span>{{ $errors->first() }}</span>
            </div>
            @endif

            <form method="POST" action="{{ route('register.post') }}" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-text-muted uppercase tracking-[0.2em] ml-2">Nama Lengkap</label>
                    <div class="relative group">
                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-text-muted group-focus-within:text-brand-blue-light transition-colors">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <input class="w-full bg-ink-950/50 border border-white/5 rounded-[20px] pl-12 pr-6 py-4 text-[15px] text-white placeholder:text-text-muted outline-none focus:border-brand-blue/50 focus:ring-4 focus:ring-brand-blue/10 transition-all" type="text" name="name" placeholder="Nama lengkap kamu" required>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-text-muted uppercase tracking-[0.2em] ml-2">Alamat Email</label>
                    <div class="relative group">
                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-text-muted group-focus-within:text-brand-blue-light transition-colors">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <input class="w-full bg-ink-950/50 border border-white/5 rounded-[20px] pl-12 pr-6 py-4 text-[15px] text-white placeholder:text-text-muted outline-none focus:border-brand-blue/50 focus:ring-4 focus:ring-brand-blue/10 transition-all" type="email" name="email" placeholder="nama@email.com" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold text-text-muted uppercase tracking-[0.2em] ml-2">Password</label>
                        <div class="relative group">
                            <div class="absolute left-5 top-1/2 -translate-y-1/2 text-text-muted group-focus-within:text-brand-blue-light transition-colors">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <input class="w-full bg-ink-950/50 border border-white/5 rounded-[20px] pl-12 pr-6 py-4 text-[15px] text-white placeholder:text-text-muted outline-none focus:border-brand-blue/50 focus:ring-4 focus:ring-brand-blue/10 transition-all" type="password" name="password" placeholder="••••••••" required>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold text-text-muted uppercase tracking-[0.2em] ml-2">Ulangi</label>
                        <div class="relative group">
                            <div class="absolute left-5 top-1/2 -translate-y-1/2 text-text-muted group-focus-within:text-brand-blue-light transition-colors">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <input class="w-full bg-ink-950/50 border border-white/5 rounded-[20px] pl-12 pr-6 py-4 text-[15px] text-white placeholder:text-text-muted outline-none focus:border-brand-blue/50 focus:ring-4 focus:ring-brand-blue/10 transition-all" type="password" name="password_confirmation" placeholder="••••••••" required>
                        </div>
                    </div>
                </div>

                <div class="flex items-start gap-3 px-2">
                    <label class="flex items-start gap-3 text-[13px] text-text-secondary cursor-pointer group">
                        <div class="relative flex items-center mt-0.5">
                            <input type="checkbox" required class="peer h-5 w-5 appearance-none rounded-lg bg-ink-950 border border-white/10 checked:bg-brand-blue checked:border-brand-blue transition-all cursor-pointer">
                            <i class="fa-solid fa-check absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-[10px] text-white opacity-0 peer-checked:opacity-100 transition-opacity"></i>
                        </div>
                        <span class="group-hover:text-white transition-colors leading-tight">Saya setuju dengan <a href="#" class="text-brand-blue-light font-bold hover:underline">Syarat & Ketentuan</a> serta <a href="#" class="text-brand-blue-light font-bold hover:underline">Privasi</a></span>
                    </label>
                </div>

                <button class="w-full py-5 rounded-[24px] bg-brand-blue text-white font-bold text-base hover:bg-brand-blue-light hover:shadow-[0_20px_40px_rgba(59,124,244,0.3)] hover:-translate-y-1 transition-all active:scale-[0.98] shadow-xl shadow-brand-blue/10" type="submit">
                    Daftar Sekarang
                </button>
            </form>

            <div class="relative my-10">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-white/5"></div>
                </div>
                <div class="relative flex justify-center text-[10px] font-bold text-text-muted uppercase tracking-[0.3em]">
                    <span class="bg-surface-1 px-4">Atau Daftar Dengan</span>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4">
                <button class="flex items-center justify-center gap-3 py-4 rounded-[20px] bg-white/5 border border-white/10 text-white text-sm font-bold hover:bg-white/10 transition-all">
                    <i class="fa-brands fa-google text-lg"></i>
                    Google
                </button>
            </div>

            <p class="text-center text-[15px] text-text-secondary mt-10">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-brand-blue-light font-bold hover:text-white transition-colors">
                    Masuk Sekarang
                </a>
            </p>
        </div>
        
        <div class="text-center mt-10 text-[10px] font-bold text-text-muted uppercase tracking-[0.2em] flex items-center justify-center gap-3">
            <div class="w-1 h-1 rounded-full bg-brand-green"></div>
            Data Anda Aman & Terlindungi
            <div class="w-1 h-1 rounded-full bg-brand-green"></div>
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
</body>
</html>
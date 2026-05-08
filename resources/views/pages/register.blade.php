<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — PyLearn</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ink: { 950: '#04091a', 900: '#070f26' },
                        brand: { blue: '#3b7cf4', 'blue-light': '#6b9ff7' }
                    }
                }
            }
        }
    </script>
    <style>
        body { background-color: #04091a; }
    </style>
</head>
<body>
<div class="min-h-screen flex items-center justify-center p-5 overflow-hidden" style="background: linear-gradient(135deg, #04091a 0%, #1a122e 100%);">
    <div class="absolute w-[600px] h-[600px] rounded-full bg-purple-500/10 blur-[120px] -bottom-28 -left-52 pointer-events-none"></div>
    <div class="absolute w-[400px] h-[400px] rounded-full bg-blue-500/10 blur-[120px] -top-28 -right-28 pointer-events-none"></div>

    <div class="w-full max-w-[420px] relative z-10">
        <a href="{{ route('landing.index') }}" class="inline-flex items-center px-3 py-1.5 rounded-lg text-gray-400 text-sm border border-gray-700 hover:bg-gray-800 hover:text-white transition-all duration-200 mb-8 no-underline">
            <i class="fa-solid fa-arrow-left mr-2"></i>Kembali
        </a>

        <div class="bg-slate-900/80 rounded-2xl border border-gray-800 p-8 backdrop-blur-xl">
            <div class="text-center mb-8">
                <div class="w-14 h-14 mx-auto mb-5 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-400 flex items-center justify-center shadow-lg">
                    <i class="fa-brands fa-python text-white text-2xl"></i>
                </div>
                <h1 class="font-serif text-[28px] tracking-tight mb-1.5 text-white">Buat akun baru</h1>
                <p class="text-sm text-gray-400">Mulai belajar Python hari ini, gratis.</p>
            </div>

            @if ($errors->any())
            <div class="bg-red-500/10 border border-red-500/30 px-4 py-3 rounded-xl mb-5 text-sm text-red-400 flex items-center">
                <i class="fa-solid fa-circle-exclamation mr-2"></i>{{ $errors->first() }}
            </div>
            @endif

            @if(session('error'))
            <div class="bg-red-500/10 border border-red-500/30 px-4 py-3 rounded-xl mb-5 text-sm text-red-400 flex items-center">
                <i class="fa-solid fa-circle-exclamation mr-2"></i>{{ session('error') }}
            </div>
            @endif

            <form method="POST" action="{{ route('register.post') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="text-xs font-medium text-gray-400 tracking-wide block mb-2">
                        <i class="fa-solid fa-user mr-1.5"></i>Nama Lengkap
                    </label>
                    <input class="w-full bg-slate-800 border border-gray-700 rounded-lg px-4 py-2.5 text-sm text-white placeholder-gray-500 transition-all duration-200 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20" type="text" name="name" placeholder="Nama kamu" required>
                </div>

                <div>
                    <label class="text-xs font-medium text-gray-400 tracking-wide block mb-2">
                        <i class="fa-solid fa-envelope mr-1.5"></i>Email
                    </label>
                    <input class="w-full bg-slate-800 border border-gray-700 rounded-lg px-4 py-2.5 text-sm text-white placeholder-gray-500 transition-all duration-200 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20" type="email" name="email" placeholder="kamu@email.com" required>
                </div>

                <div>
                    <label class="text-xs font-medium text-gray-400 tracking-wide block mb-2">
                        <i class="fa-solid fa-lock mr-1.5"></i>Password
                    </label>
                    <input class="w-full bg-slate-800 border border-gray-700 rounded-lg px-4 py-2.5 text-sm text-white placeholder-gray-500 transition-all duration-200 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20" type="password" name="password" placeholder="Minimal 8 karakter" required>
                </div>

                <div>
                    <label class="text-xs font-medium text-gray-400 tracking-wide block mb-2">
                        <i class="fa-solid fa-shield-halved mr-1.5"></i>Konfirmasi Password
                    </label>
                    <input class="w-full bg-slate-800 border border-gray-700 rounded-lg px-4 py-2.5 text-sm text-white placeholder-gray-500 transition-all duration-200 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20" type="password" name="password_confirmation" placeholder="Ulangi password" required>
                </div>

                <div class="flex items-start gap-2 text-xs text-gray-400 pt-1">
                    <input type="checkbox" class="w-4 h-4 mt-0.5 rounded bg-slate-800 border border-gray-700 text-blue-500" required>
                    <span>Saya setuju dengan <a href="#" class="text-blue-400 hover:underline">Syarat & Ketentuan</a></span>
                </div>

                <button type="submit" class="w-full px-5 py-2.5 rounded-lg bg-blue-500 text-white font-medium text-base hover:bg-blue-400 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center">
                    <i class="fa-solid fa-user-plus mr-2"></i>Buat Akun
                </button>
            </form>

            <div class="flex items-center gap-3 my-6 text-gray-500 text-xs">
                <div class="flex-1 h-px bg-gray-800"></div>
                <span>atau</span>
                <div class="flex-1 h-px bg-gray-800"></div>
            </div>

            <div class="flex gap-3">
                <button class="flex-1 px-3 py-2 rounded-lg bg-slate-800 text-gray-400 text-sm border border-gray-700 hover:bg-slate-700 hover:text-white hover:border-gray-600 hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center">
                    <i class="fa-brands fa-google mr-2"></i>Google
                </button>
                <button class="flex-1 px-3 py-2 rounded-lg bg-slate-800 text-gray-400 text-sm border border-gray-700 hover:bg-slate-700 hover:text-white hover:border-gray-600 hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center">
                    <i class="fa-brands fa-github mr-2"></i>GitHub
                </button>
            </div>

            <p class="text-center text-sm text-gray-400 mt-6">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-400 font-medium no-underline hover:underline">
                    Masuk <i class="fa-solid fa-arrow-right ml-1 text-xs"></i>
                </a>
            </p>
        </div>
        
        <div class="text-center mt-6 text-xs text-gray-500 flex items-center justify-center gap-2">
            <i class="fa-solid fa-user-shield"></i> Privasi data terjamin
        </div>
    </div>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — PyLearn</title>
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
<div class="min-h-screen flex items-center justify-center p-5 overflow-hidden" style="background: linear-gradient(135deg, #04091a 0%, #070f26 100%);">
    <div class="absolute w-[600px] h-[600px] rounded-full bg-blue-500/10 blur-[120px] -top-28 -right-52 pointer-events-none"></div>
    <div class="absolute w-[400px] h-[400px] rounded-full bg-purple-500/10 blur-[120px] -bottom-28 -left-28 pointer-events-none"></div>

    <div class="w-full max-w-[420px] relative z-10">
        <a href="{{ route('landing.index') }}" class="inline-flex items-center px-3 py-1.5 rounded-lg text-gray-400 text-sm border border-gray-700 hover:bg-gray-800 hover:text-white transition-all duration-200 mb-8 no-underline">
            <i class="fa-solid fa-arrow-left mr-2"></i>Kembali
        </a>

        <div class="bg-slate-900/80 rounded-2xl border border-gray-800 p-8 backdrop-blur-xl">
            <div class="text-center mb-8">
                <div class="w-14 h-14 mx-auto mb-5 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-400 flex items-center justify-center shadow-lg">
                    <i class="fa-brands fa-python text-white text-2xl"></i>
                </div>
                <h1 class="font-serif text-[28px] tracking-tight mb-1.5 text-white">Selamat datang kembali</h1>
                <p class="text-sm text-gray-400">Lanjutkan perjalanan belajarmu.</p>
            </div>

            @if(session('error'))
            <div class="bg-red-500/10 border border-red-500/30 px-4 py-3 rounded-xl mb-5 text-sm text-red-400 flex items-center">
                <i class="fa-solid fa-circle-exclamation mr-2"></i>{{ session('error') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                @csrf

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
                    <input class="w-full bg-slate-800 border border-gray-700 rounded-lg px-4 py-2.5 text-sm text-white placeholder-gray-500 transition-all duration-200 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20" type="password" name="password" placeholder="Masukkan password" required>
                </div>

                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 text-gray-400 cursor-pointer hover:text-white transition-colors">
                        <input type="checkbox" class="w-4 h-4 rounded bg-slate-800 border-gray-700 text-blue-500">
                        <span>Ingat saya</span>
                    </label>
                    <a href="#" class="text-blue-400 hover:underline">Lupa password?</a>
                </div>

                <button class="w-full px-5 py-2.5 rounded-lg bg-blue-500 text-white font-medium text-base hover:bg-blue-400 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center" type="submit">
                    <i class="fa-solid fa-right-to-bracket mr-2"></i>Masuk
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
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-blue-400 font-medium no-underline hover:underline">
                    Daftar sekarang <i class="fa-solid fa-arrow-right ml-1 text-xs"></i>
                </a>
            </p>
        </div>
        
        <div class="text-center mt-6 text-xs text-gray-500 flex items-center justify-center gap-2">
            <i class="fa-solid fa-shield-halved"></i> Aman & Terenkripsi
        </div>
    </div>
</div>
</body>
</html>
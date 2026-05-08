@extends('layouts.app')

@section('content')
<div class="min-h-screen overflow-hidden" style="background: linear-gradient(135deg, #04091a 0%, #070f26 100%);">
    <nav class="fixed top-0 left-0 right-0 z-[100] h-14 flex items-center px-7 gap-1.5 bg-slate-950/80 backdrop-blur-xl border-b border-gray-800">
        <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-blue-500/20 to-transparent"></div>
        <div class="flex items-center gap-3 font-serif text-xl text-white">
            <div class="w-7 h-7 rounded-lg bg-gradient-to-br from-blue-500 to-blue-400 flex items-center justify-center">
                <div class="w-2 h-2 rounded-full bg-white"></div>
            </div>
            <span class="font-serif text-xl">Py<em class="italic text-blue-400">Learn</em></span>
        </div>
        <div class="ml-auto flex gap-3">
            <a href="{{ route('login') }}" class="px-3 py-1.5 rounded-lg text-gray-400 text-sm border border-gray-700 hover:bg-gray-800 hover:text-white transition-all no-underline">
                <i class="fa-solid fa-right-to-bracket mr-1"></i>Masuk
            </a>
            <a href="{{ route('register') }}" class="px-3 py-1.5 rounded-lg bg-blue-500 text-white text-sm hover:bg-blue-400 transition-all no-underline">
                <i class="fa-solid fa-user-plus mr-1"></i>Daftar
            </a>
        </div>
    </nav>

    <div class="min-h-screen flex items-center overflow-hidden relative">
        <div class="absolute w-[700px] h-[700px] rounded-full bg-blue-500/10 blur-[120px] -top-52 -right-52 pointer-events-none"></div>
        <div class="absolute w-[500px] h-[500px] rounded-full bg-purple-500/10 blur-[120px] -bottom-40 -left-40 pointer-events-none"></div>

        <div class="max-w-[1100px] mx-auto px-7 pt-20 pb-20 relative z-10">
            <div class="max-w-[620px]">
                <div class="inline-flex items-center px-3 py-1 rounded-md bg-blue-500/15 text-blue-400 text-xs font-medium mb-6">
                    <i class="fa-solid fa-graduation-cap mr-1"></i>Belajar Python secara terstruktur
                </div>
                <h1 class="font-serif text-[clamp(44px,5.5vw,72px)] leading-[1.08] tracking-tight mb-6 text-white">
                    Belajar Python,<br>
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-500">dari nol hingga mahir.</span>
                </h1>
                <p class="text-lg text-gray-400 leading-relaxed mb-10 max-w-[480px]">
                    Platform belajar Python berbasis level dan gamifikasi. Kumpulkan XP, raih badge, dan lacak progresmu setiap hari.
                </p>
                <div class="flex gap-3 flex-wrap mb-16">
                    <button onclick="window.location.href='{{ route('register') }}'" class="px-5 py-2.5 rounded-lg bg-blue-500 text-white font-medium text-sm hover:bg-blue-400 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200">
                        <i class="fa-solid fa-rocket mr-2"></i>Mulai Gratis
                    </button>
                    <button onclick="window.location.href='{{ route('level.index') }}'" class="px-5 py-2.5 rounded-lg text-gray-400 text-sm border border-gray-700 hover:bg-gray-800 hover:text-white transition-all duration-200">
                        <i class="fa-solid fa-book-open mr-2"></i>Lihat Kurikulum
                    </button>
                </div>
                <div class="flex gap-10 flex-wrap pt-9 border-t border-gray-800">
                    <div>
                        <div class="font-serif text-3xl tracking-tight text-blue-400">12.4K</div>
                        <div class="text-sm text-gray-400 mt-1"><i class="fa-solid fa-users text-blue-500 mr-1.5"></i>Pelajar aktif</div>
                    </div>
                    <div>
                        <div class="font-serif text-3xl tracking-tight text-green-400">50+</div>
                        <div class="text-sm text-gray-400 mt-1"><i class="fa-solid fa-layer-group text-green-500 mr-1.5"></i>Level materi</div>
                    </div>
                    <div>
                        <div class="font-serif text-3xl tracking-tight text-amber-400">4.9</div>
                        <div class="text-sm text-gray-400 mt-1"><i class="fa-solid fa-star text-amber-500 mr-1.5"></i>Rating pengguna</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-slate-900/50 border-t border-gray-800 py-20">
        <div class="max-w-[1100px] mx-auto px-7">
            <div class="mb-14 text-center">
                <div class="inline-flex items-center px-3 py-1 rounded-md bg-gray-800 text-gray-400 text-xs font-medium mb-4">
                    <i class="fa-solid fa-sparkles mr-1"></i>Fitur
                </div>
                <h2 class="font-serif text-[40px] tracking-tight mb-3 text-white">Dirancang untuk hasil nyata</h2>
                <p class="text-gray-400 text-base max-w-[440px] mx-auto">Setiap fitur dibuat untuk membantu kamu belajar lebih efektif dan konsisten.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-slate-900 p-9 rounded-xl border border-gray-800 transition-all duration-300 hover:bg-gray-800 hover:border-gray-700">
                    <div class="w-10 h-10 rounded-xl bg-blue-500/20 flex items-center justify-center mb-5">
                        <i class="fa-solid fa-chart-line text-blue-400 text-lg"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2.5 text-white">Level System</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">Materi tersusun dari dasar hingga lanjutan. Setiap level membuka level berikutnya.</p>
                </div>
                <div class="bg-slate-900 p-9 rounded-xl border border-gray-800 transition-all duration-300 hover:bg-gray-800 hover:border-gray-700">
                    <div class="w-10 h-10 rounded-xl bg-purple-500/20 flex items-center justify-center mb-5">
                        <i class="fa-solid fa-clock text-purple-400 text-lg"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2.5 text-white">Quiz Interaktif</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">Uji pemahaman dengan soal pilihan ganda dan kode editor. Feedback langsung setelah menjawab.</p>
                </div>
                <div class="bg-slate-900 p-9 rounded-xl border border-gray-800 transition-all duration-300 hover:bg-gray-800 hover:border-gray-700">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/20 flex items-center justify-center mb-5">
                        <i class="fa-solid fa-star text-amber-400 text-lg"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2.5 text-white">XP & Badge</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">Dapatkan XP setiap menyelesaikan level. Kumpulkan badge dan bersaing di leaderboard.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-28 text-center relative overflow-hidden">
        <div class="absolute w-[500px] h-[500px] rounded-full bg-blue-500/10 blur-[120px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
        <div class="max-w-[1100px] mx-auto px-7 relative z-10">
            <h2 class="font-serif text-[clamp(32px,4vw,52px)] tracking-tight mb-4 text-white">Siap memulai?</h2>
            <p class="text-gray-400 text-base mb-9">Daftarkan diri dan mulai belajar Python hari ini, gratis.</p>
            <a href="{{ route('register') }}" class="px-5 py-2.5 rounded-lg bg-blue-500 text-white font-medium text-sm inline-flex hover:bg-blue-400 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200">
                <i class="fa-solid fa-rocket mr-2"></i>Buat Akun Gratis
            </a>
        </div>
    </div>

    <footer class="bg-slate-900/50 border-t border-gray-800 py-8">
        <div class="max-w-[1100px] mx-auto px-7 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2 text-gray-400 text-sm">
                <i class="fa-solid fa-code text-blue-500"></i>
                <span>Built with <span class="text-red-500">❤</span> for Python learners</span>
            </div>
            <div class="flex items-center gap-4">
                <a href="#" class="text-gray-500 hover:text-white transition-colors"><i class="fa-brands fa-github text-lg"></i></a>
                <a href="#" class="text-gray-500 hover:text-white transition-colors"><i class="fa-brands fa-twitter text-lg"></i></a>
                <a href="#" class="text-gray-500 hover:text-white transition-colors"><i class="fa-brands fa-discord text-lg"></i></a>
            </div>
        </div>
    </footer>
</div>
@endsection
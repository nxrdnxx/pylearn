<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - PyLearn</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #04091a 0%, #070f26 100%);
            color: #e2e8f0;
        }
        .glass-sidebar {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }
        .glass-card {
            background: rgba(30, 41, 59, 0.4);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .nav-link-active {
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.15) 0%, rgba(59, 130, 246, 0) 100%);
            border-left: 3px solid #3b82f6;
            color: #60a5fa;
        }
    </style>
</head>
<body class="min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-72 glass-sidebar flex flex-col sticky top-0 h-screen z-50">
            <div class="p-8 border-b border-white/5">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center shadow-lg shadow-blue-600/20">
                        <i class="fas fa-terminal text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white tracking-tight">PyLearn</h1>
                        <span class="text-[10px] text-blue-400 font-bold uppercase tracking-widest">Admin Control</span>
                    </div>
                </div>
            </div>
            
            <nav class="flex-1 p-6 space-y-2 overflow-y-auto">
                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4 px-4">Main Menu</p>
                
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'nav-link-active' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <i class="fas fa-grid-2 w-5 group-hover:scale-110 transition-transform"></i> 
                    <span class="font-medium">Dashboard</span>
                </a>
                
                <a href="{{ route('admin.students') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.students*') ? 'nav-link-active' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <i class="fas fa-user-graduate w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Mahasiswa</span>
                </a>

                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mt-8 mb-4 px-4">Content</p>

                <a href="{{ route('admin.levels') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.levels*') ? 'nav-link-active' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <i class="fas fa-layer-group w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Level Belajar</span>
                </a>

                <a href="{{ route('admin.materials') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.materials*') ? 'nav-link-active' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <i class="fas fa-book-open w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Materi</span>
                </a>

                <a href="{{ route('admin.quizzes') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.quizzes*') ? 'nav-link-active' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <i class="fas fa-vial w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Quiz & Soal</span>
                </a>

                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mt-8 mb-4 px-4">Rewards</p>

                <a href="{{ route('admin.badges') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.badges*') ? 'nav-link-active' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <i class="fas fa-medal w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Badges</span>
                </a>

                <a href="{{ route('admin.leaderboard') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.leaderboard*') ? 'nav-link-active' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <i class="fas fa-trophy w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Leaderboard</span>
                </a>

                <a href="{{ route('admin.quiz-results') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.quiz-results') ? 'nav-link-active' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <i class="fas fa-history w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Hasil Quiz</span>
                </a>
            </nav>

            <div class="p-6 border-t border-white/5">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 transition-all w-full text-left group">
                        <i class="fas fa-power-off w-5 group-hover:rotate-90 transition-transform duration-300"></i>
                        <span class="font-semibold">Sign Out</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 min-h-screen overflow-x-hidden">
            <!-- Header -->
            <header class="h-20 flex items-center justify-between px-8 border-b border-white/5 sticky top-0 z-40 bg-[#04091a]/80 backdrop-blur-md">
                <div class="flex items-center gap-4">
                    <h2 class="text-lg font-semibold text-white">
                        @yield('header_title', 'Dashboard')
                    </h2>
                </div>
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-3 px-4 py-2 rounded-full bg-white/5 border border-white/10">
                        <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-xs font-bold">AD</div>
                        <span class="text-sm font-medium text-slate-300">Administrator</span>
                    </div>
                </div>
            </header>

            <div class="p-8">
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center gap-3 animate-in fade-in slide-in-from-top-4 duration-500">
                        <i class="fas fa-check-circle"></i>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="mb-6 p-4 rounded-2xl bg-red-500/10 border border-red-500/20 text-red-400 flex items-center gap-3 animate-in fade-in slide-in-from-top-4 duration-500">
                        <i class="fas fa-exclamation-circle"></i>
                        <span class="text-sm font-medium">{{ session('error') }}</span>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>
</html>
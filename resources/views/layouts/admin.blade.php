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
    <!-- Sidebar Backdrop for Mobile -->
    <div id="admin-sidebar-overlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 hidden transition-opacity duration-300" onclick="toggleAdminSidebar()"></div>

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="admin-sidebar" class="fixed inset-y-0 left-0 -translate-x-full lg:translate-x-0 lg:static w-72 glass-sidebar flex flex-col h-screen z-50 transition-transform duration-300">
            <div class="p-8 border-b border-white/5 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center shadow-lg shadow-blue-600/20">
                        <i class="fas fa-terminal text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white tracking-tight">PyLearn</h1>
                        <span class="text-[10px] text-blue-400 font-bold uppercase tracking-widest">Admin Control</span>
                    </div>
                </div>
                <button onclick="toggleAdminSidebar()" class="lg:hidden w-8 h-8 flex items-center justify-center rounded-lg hover:bg-white/5 text-slate-400 hover:text-white transition-all">
                    <i class="fas fa-times"></i>
                </button>
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
            <header class="h-20 flex items-center justify-between px-4 sm:px-8 border-b border-white/5 sticky top-0 z-40 bg-[#04091a]/80 backdrop-blur-md">
                <div class="flex items-center gap-3 sm:gap-4">
                    <button onclick="toggleAdminSidebar()" class="lg:hidden w-10 h-10 flex items-center justify-center rounded-xl bg-white/5 border border-white/10 text-white hover:bg-white/10 transition-all">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 class="text-base sm:text-lg font-semibold text-white truncate">
                        @yield('header_title', 'Dashboard')
                    </h2>
                </div>
                <div class="flex items-center gap-4 sm:gap-6">
                    <div class="flex items-center gap-2 sm:gap-3 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full bg-white/5 border border-white/10">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-blue-600 flex items-center justify-center text-xs font-bold text-white">AD</div>
                        <span class="text-xs sm:text-sm font-medium text-slate-300 truncate max-w-[80px] sm:max-w-none">Administrator</span>
                    </div>
                </div>
            </header>

            <div class="p-4 sm:p-8">
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

    <script>
        function toggleAdminSidebar() {
            const sidebar = document.getElementById('admin-sidebar');
            const overlay = document.getElementById('admin-sidebar-overlay');
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            } else {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }
        }
    </script>
    @stack('scripts')
</body>
</html>
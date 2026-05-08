<nav class="fixed top-0 left-0 right-0 z-[100] h-16 flex items-center px-4 lg:px-7 gap-1.5 bg-slate-950/80 backdrop-blur-2xl border-b border-gray-800">
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-blue-500/0 via-blue-500/40 to-blue-500/0"></div>

    <a href="{{ route('dashboard.index') }}" class="flex items-center gap-2.5 font-serif text-xl text-white no-underline transition-all duration-300 group">
        <div class="relative w-9 h-9 rounded-lg bg-gradient-to-br from-blue-500 to-blue-400 flex items-center justify-center shadow-lg">
            <i class="fa-brands fa-python text-white text-base"></i>
        </div>
        <span class="font-serif text-xl hidden md:block">Py<em class="italic text-blue-400">Learn</em></span>
    </a>

    <div class="hidden lg:flex items-center gap-1 ml-8">
        <a href="{{ route('dashboard.index') }}" class="relative px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ Route::currentRouteName() == 'dashboard.index' ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}">
            <i class="fa-solid fa-house mr-1.5 text-xs"></i>Dashboard
        </a>
        <a href="{{ route('level.index') }}" class="relative px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ Route::currentRouteName() == 'level.index' ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}">
            <i class="fa-solid fa-layer-group mr-1.5 text-xs"></i>Level
        </a>
        <a href="{{ route('leaderboard.index') }}" class="relative px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ Route::currentRouteName() == 'leaderboard.index' ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}">
            <i class="fa-solid fa-trophy mr-1.5 text-xs"></i>Leaderboard
        </a>
        <a href="{{ route('badge.index') }}" class="relative px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ Route::currentRouteName() == 'badge.index' ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}">
            <i class="fa-solid fa-medal mr-1.5 text-xs"></i>Badge
        </a>
    </div>

    <div class="ml-auto flex items-center gap-2 lg:gap-3">
        @auth
        <div class="hidden sm:flex items-center gap-1 px-3 py-1.5 rounded-full bg-gray-800 border border-gray-700 transition-all duration-200 hover:border-amber-500/50 cursor-pointer group">
            <div class="w-5 h-5 rounded bg-amber-500/20 flex items-center justify-center">
                <i class="fa-solid fa-bolt text-amber-500 text-[8px]"></i>
            </div>
            <span class="text-sm font-semibold text-white">{{ number_format(auth()->user()->xp) }}</span>
        </div>

        @php
            $user = Auth::user();
            $loginStreak = $user->login_streak ?? 0;
        @endphp
        <div class="hidden sm:flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-gray-800 border border-gray-700 transition-all duration-200 hover:border-red-500/50">
            <div class="flex items-center gap-1">
                <i class="fa-solid fa-fire text-red-500 text-xs animate-pulse"></i>
                <span class="text-sm font-medium text-gray-400">Streak</span>
            </div>
            <span class="text-sm font-bold text-white">{{ $loginStreak }}</span>
        </div>
        @endauth

        @auth
        <div class="relative group/profile">
            <button class="w-9 h-9 rounded-full flex items-center justify-center text-xs font-semibold text-white flex-shrink-0 transition-all duration-200 hover:ring-2 hover:ring-blue-500 bg-gradient-to-br from-blue-600 to-blue-500">
                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            </button>
            <div class="absolute right-0 top-full mt-3 w-56 py-2 rounded-xl bg-gray-800 border border-gray-700 shadow-xl opacity-0 invisible group-hover/profile:opacity-100 group-hover/profile:visible transition-all duration-200 translate-y-2 group-hover/profile:translate-y-0 z-50">
                <div class="px-4 py-2 border-b border-gray-700 mb-1">
                    <div class="text-sm font-semibold text-white">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <a href="{{ route('profile.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all">
                    <i class="fa-solid fa-user w-4"></i>Profil
                </a>
                <div class="my-1.5 mx-3 border-t border-gray-700"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-400 hover:bg-red-500/10 transition-all">
                        <i class="fa-solid fa-right-from-bracket w-4"></i>Logout
                    </button>
                </form>
            </div>
        </div>
        @else
        <a href="{{ route('login') }}" class="hidden sm:flex px-3 py-1.5 rounded-lg text-gray-400 text-sm border border-gray-700 hover:bg-gray-800 hover:text-white transition-all no-underline">
            <i class="fa-solid fa-right-to-bracket mr-1.5"></i>Masuk
        </a>
        <a href="{{ route('register') }}" class="px-3 py-1.5 rounded-lg bg-blue-500 text-white text-sm hover:bg-blue-400 transition-all no-underline">
            <i class="fa-solid fa-user-plus mr-1.5"></i>
            <span class="hidden sm:inline">Daftar</span>
        </a>
        @endauth

        <button class="lg:hidden w-9 h-9 flex items-center justify-center rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>
</nav>

<div id="mobile-menu" class="fixed top-16 left-0 right-0 z-[99] bg-slate-950/95 backdrop-blur-xl border-b border-gray-800 p-4 hidden lg:hidden">
    <div class="flex flex-col gap-2">
        <a href="{{ route('dashboard.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors {{ Route::currentRouteName() == 'dashboard.index' ? 'bg-gray-800 text-white' : '' }}">
            <i class="fa-solid fa-house w-5"></i>Dashboard
        </a>
        <a href="{{ route('level.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors {{ Route::currentRouteName() == 'level.index' ? 'bg-gray-800 text-white' : '' }}">
            <i class="fa-solid fa-layer-group w-5"></i>Level
        </a>
        <a href="{{ route('leaderboard.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors {{ Route::currentRouteName() == 'leaderboard.index' ? 'bg-gray-800 text-white' : '' }}">
            <i class="fa-solid fa-trophy w-5"></i>Leaderboard
        </a>
        <a href="{{ route('badge.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors {{ Route::currentRouteName() == 'badge.index' ? 'bg-gray-800 text-white' : '' }}">
            <i class="fa-solid fa-medal w-5"></i>Badge
        </a>
    </div>
</div>
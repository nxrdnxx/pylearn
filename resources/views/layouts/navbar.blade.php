<!-- Top Navbar (logo centered on mobile with absolute positioning, desktop unchanged) -->
<nav class="flex fixed top-0 left-0 right-0 z-[100] h-16 items-center px-4 lg:px-7 bg-slate-950/80 backdrop-blur-2xl border-b border-gray-800">
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-blue-500/0 via-blue-500/40 to-blue-500/0"></div>

    <a href="{{ route('dashboard.index') }}" class="absolute lg:static left-1/2 lg:left-auto -translate-x-1/2 lg:translate-x-0 flex items-center gap-2 font-semibold text-xl text-white no-underline transition-all duration-300 group">
        <i class="fa-brands fa-python text-blue-400 text-xl drop-shadow-[0_0_8px_rgba(96,165,250,0.6)] group-hover:drop-shadow-[0_0_12px_rgba(96,165,250,0.9)] transition-all duration-300"></i>
        <span class="font-semibold text-xl bg-gradient-to-r from-white to-blue-300 bg-clip-text text-transparent">PyLearn</span>
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
        <a href="{{ route('playground.index') }}" class="relative px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ Route::currentRouteName() == 'playground.index' ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}">
            <i class="fa-solid fa-terminal mr-1.5 text-xs"></i>Playground
        </a>
    </div>

    <div class="ml-auto flex items-center gap-2 lg:gap-3">
        @auth
        <div class="relative" id="profile-dropdown">
            <button onclick="toggleProfileMenu()" class="w-9 h-9 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-200 hover:ring-2 hover:ring-brand-blue bg-ink-700 overflow-hidden">
                @if(Auth::user()->profile_picture)
                <img src="{{ '/' . $pubDir . 'storage/' . Auth::user()->profile_picture }}" alt="" class="w-full h-full object-cover">
                @else
                <i class="fa-solid fa-user text-white text-sm"></i>
                @endif
            </button>
            <div id="profile-menu" class="absolute right-0 top-full mt-3 w-56 py-2 rounded-xl bg-gray-800 border border-gray-700 shadow-xl z-50 hidden">
                <div class="px-4 py-3 border-b border-gray-700 mb-1 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-ink-700 flex items-center justify-center flex-shrink-0 overflow-hidden">
                        @if(Auth::user()->profile_picture)
                        <img src="{{ '/' . $pubDir . 'storage/' . Auth::user()->profile_picture }}" alt="" class="w-full h-full object-cover">
                        @else
                        <i class="fa-solid fa-user text-white text-base"></i>
                        @endif
                    </div>
                    <div class="min-w-0">
                        <div class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</div>
                    </div>
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
        <a href="{{ route('login') }}" class="px-3 py-1.5 rounded-lg bg-blue-500 text-white text-sm hover:bg-blue-400 transition-all no-underline">
            <i class="fa-brands fa-google mr-1.5"></i>
            <span class="hidden sm:inline">Masuk</span>
        </a>
        @endauth
    </div>
</nav>

<!-- Mobile Bottom Navbar (shown only on mobile) -->
<nav class="lg:hidden fixed bottom-0 left-0 right-0 z-[100] h-16 bg-slate-950/90 backdrop-blur-2xl border-t border-gray-800">
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-blue-500/0 via-blue-500/40 to-blue-500/0"></div>
    <div class="h-full flex items-center justify-around px-4">
        <a href="{{ route('dashboard.index') }}" class="flex flex-col items-center justify-center gap-0.5 w-12 h-12 rounded-xl transition-all duration-200 {{ Route::currentRouteName() == 'dashboard.index' ? 'text-brand-blue-light' : 'text-gray-400 hover:text-white' }}">
            <i class="fa-solid fa-house text-lg"></i>
        </a>
        <a href="{{ route('level.index') }}" class="flex flex-col items-center justify-center gap-0.5 w-12 h-12 rounded-xl transition-all duration-200 {{ Route::currentRouteName() == 'level.index' ? 'text-brand-blue-light' : 'text-gray-400 hover:text-white' }}">
            <i class="fa-solid fa-layer-group text-lg"></i>
        </a>
        <a href="{{ route('leaderboard.index') }}" class="flex flex-col items-center justify-center gap-0.5 w-12 h-12 rounded-xl transition-all duration-200 {{ Route::currentRouteName() == 'leaderboard.index' ? 'text-brand-blue-light' : 'text-gray-400 hover:text-white' }}">
            <i class="fa-solid fa-trophy text-lg"></i>
        </a>
        <a href="{{ route('badge.index') }}" class="flex flex-col items-center justify-center gap-0.5 w-12 h-12 rounded-xl transition-all duration-200 {{ Route::currentRouteName() == 'badge.index' ? 'text-brand-blue-light' : 'text-gray-400 hover:text-white' }}">
            <i class="fa-solid fa-medal text-lg"></i>
        </a>
        <a href="{{ route('playground.index') }}" class="flex flex-col items-center justify-center gap-0.5 w-12 h-12 rounded-xl transition-all duration-200 {{ Route::currentRouteName() == 'playground.index' ? 'text-brand-blue-light' : 'text-gray-400 hover:text-white' }}">
            <i class="fa-solid fa-terminal text-lg"></i>
        </a>
        @guest
        <a href="{{ route('login') }}" class="flex flex-col items-center justify-center gap-0.5 w-10 h-10 rounded-xl text-gray-400 hover:text-white transition-all">
            <i class="fa-solid fa-right-to-bracket text-lg"></i>
        </a>
        @endguest
    </div>
</nav>

<script>
function toggleProfileMenu() {
    const menu = document.getElementById('profile-menu');
    menu.classList.toggle('hidden');
}

document.addEventListener('click', function(e) {
    const dropdown = document.getElementById('profile-dropdown');
    const menu = document.getElementById('profile-menu');
    if (dropdown && menu && !dropdown.contains(e.target)) {
        menu.classList.add('hidden');
    }
});
</script>

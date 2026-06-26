<!-- Top Navbar (logo centered on mobile with absolute positioning, desktop unchanged) -->
<nav class="flex fixed top-0 left-0 right-0 z-[100] h-16 items-center px-4 lg:px-7 bg-nav backdrop-blur-md border-b border-nav">
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-blue-500/0 via-blue-500/40 to-blue-500/0"></div>

    <a href="{{ route('dashboard.index') }}" class="absolute lg:static left-1/2 lg:left-auto -translate-x-1/2 lg:translate-x-0 flex items-center gap-2 font-semibold text-xl text-nav-link-active no-underline transition-all duration-300 group">
        <img src="{{ '/' . $pubDir . 'assets/favicon.svg' }}" alt="PyLearn" class="h-8 w-8 glow-python group-hover:glow-python transition-all duration-300">
        <span class="font-semibold text-xl" style="color:var(--color-nav-link-active);">PyLearn</span>
    </a>

    <div class="hidden lg:flex items-center gap-1 ml-8">
        <a href="{{ route('dashboard.index') }}" class="relative px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ Route::currentRouteName() == 'dashboard.index' ? 'text-nav-link-active bg-nav-item' : 'text-nav-link hover:text-nav-link-active hover:bg-nav-item' }}">
            <i class="fa-solid fa-house mr-1.5 text-xs"></i>Dashboard
        </a>
        <a href="{{ route('level.index') }}" class="relative px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ Route::currentRouteName() == 'level.index' ? 'text-nav-link-active bg-nav-item' : 'text-nav-link hover:text-nav-link-active hover:bg-nav-item' }}">
            <i class="fa-solid fa-layer-group mr-1.5 text-xs"></i>Level
        </a>
        <a href="{{ route('leaderboard.index') }}" class="relative px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ Route::currentRouteName() == 'leaderboard.index' ? 'text-nav-link-active bg-nav-item' : 'text-nav-link hover:text-nav-link-active hover:bg-nav-item' }}">
            <i class="fa-solid fa-trophy mr-1.5 text-xs"></i>Leaderboard
        </a>
        <a href="{{ route('badge.index') }}" class="relative px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ Route::currentRouteName() == 'badge.index' ? 'text-nav-link-active bg-nav-item' : 'text-nav-link hover:text-nav-link-active hover:bg-nav-item' }}">
            <i class="fa-solid fa-medal mr-1.5 text-xs"></i>Badge
        </a>
        <a href="{{ route('playground.index') }}" class="relative px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ Route::currentRouteName() == 'playground.index' ? 'text-nav-link-active bg-nav-item' : 'text-nav-link hover:text-nav-link-active hover:bg-nav-item' }}">
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
                <i class="fa-solid fa-user text-nav-link-active text-sm"></i>
                @endif
            </button>
            <div id="profile-menu" class="absolute right-0 top-full mt-3 w-56 py-2 rounded-xl bg-dropdown border border-dropdown z-50 hidden" style="box-shadow:var(--shadow-dropdown);">
                <div class="px-4 py-3 border-b border-dropdown mb-1 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-hover flex items-center justify-center flex-shrink-0 overflow-hidden">
                        @if(Auth::user()->profile_picture)
                        <img src="{{ '/' . $pubDir . 'storage/' . Auth::user()->profile_picture }}" alt="" class="w-full h-full object-cover">
                        @else
                        <i class="fa-solid fa-user text-nav-link-active text-base"></i>
                        @endif
                    </div>
                    <div class="min-w-0">
                        <div class="text-sm font-semibold text-nav-link-active truncate">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-nav-link truncate">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <a href="{{ route('profile.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-nav-link hover:text-nav-link-active hover:bg-nav-item transition-all">
                    <i class="fa-solid fa-user w-4"></i>Profil
                </a>
                <button onclick="toggleTheme()" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-nav-link hover:text-nav-link-active hover:bg-nav-item transition-all">
                    <i id="profileThemeIcon" class="fa-solid fa-moon w-4"></i>
                    <span id="profileThemeLabel">Tema Terang</span>
                </button>
                <div class="my-1.5 mx-3 border-t border-dropdown"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-400 hover:bg-red-500/10 transition-all">
                        <i class="fa-solid fa-right-from-bracket w-4"></i>Logout
                    </button>
                </form>
            </div>
        </div>
        @else
        <a href="{{ route('login') }}" class="hidden sm:flex px-3 py-1.5 rounded-lg text-nav-link text-sm border border-dropdown hover:bg-hover hover:text-nav-link-active transition-all no-underline">
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
<nav class="lg:hidden fixed bottom-0 left-0 right-0 z-[100] bg-nav backdrop-blur-2xl border-t border-nav" style="padding-bottom:env(safe-area-inset-bottom,0px);">
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-blue-500/0 via-blue-500/40 to-blue-500/0"></div>
    <div class="flex items-center justify-around px-4 h-14">
        <a href="{{ route('dashboard.index') }}" class="flex flex-col items-center justify-center gap-0.5 w-12 h-12 rounded-xl transition-all duration-200 {{ Route::currentRouteName() == 'dashboard.index' ? 'text-nav-item-active' : 'text-nav-link hover:text-nav-item-active' }}">
            <i class="fa-solid fa-house text-lg"></i>
        </a>
        <a href="{{ route('level.index') }}" class="flex flex-col items-center justify-center gap-0.5 w-12 h-12 rounded-xl transition-all duration-200 {{ Route::currentRouteName() == 'level.index' ? 'text-nav-item-active' : 'text-nav-link hover:text-nav-item-active' }}">
            <i class="fa-solid fa-layer-group text-lg"></i>
        </a>
        <a href="{{ route('leaderboard.index') }}" class="flex flex-col items-center justify-center gap-0.5 w-12 h-12 rounded-xl transition-all duration-200 {{ Route::currentRouteName() == 'leaderboard.index' ? 'text-nav-item-active' : 'text-nav-link hover:text-nav-item-active' }}">
            <i class="fa-solid fa-trophy text-lg"></i>
        </a>
        <a href="{{ route('badge.index') }}" class="flex flex-col items-center justify-center gap-0.5 w-12 h-12 rounded-xl transition-all duration-200 {{ Route::currentRouteName() == 'badge.index' ? 'text-nav-item-active' : 'text-nav-link hover:text-nav-item-active' }}">
            <i class="fa-solid fa-medal text-lg"></i>
        </a>
        <a href="{{ route('playground.index') }}" class="flex flex-col items-center justify-center gap-0.5 w-12 h-12 rounded-xl transition-all duration-200 {{ Route::currentRouteName() == 'playground.index' ? 'text-nav-item-active' : 'text-nav-link hover:text-nav-item-active' }}">
            <i class="fa-solid fa-terminal text-lg"></i>
        </a>
        @guest
        <a href="{{ route('login') }}" class="flex flex-col items-center justify-center gap-0.5 w-10 h-10 rounded-xl text-nav-link hover:text-nav-item-active transition-all">
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

function setTheme(theme) {
    if (theme === 'light') {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
    } else {
        document.documentElement.removeAttribute('data-theme');
        localStorage.setItem('theme', 'dark');
    }
    updateThemeIcons();
}

function toggleTheme() {
    const current = document.documentElement.getAttribute('data-theme');
    setTheme(current === 'light' ? 'dark' : 'light');
}

function updateThemeIcons() {
    const isLight = document.documentElement.getAttribute('data-theme') === 'light';
    const icon = document.getElementById('themeIcon');
    const mobileIcon = document.getElementById('mobileThemeIcon');
    const profileIcon = document.getElementById('profileThemeIcon');
    const profileLabel = document.getElementById('profileThemeLabel');
    const sun = 'fa-sun';
    const moon = 'fa-moon';
    if (icon) {
        icon.className = `fa-solid ${isLight ? sun : moon} text-sm`;
    }
    if (mobileIcon) {
        mobileIcon.className = `fa-solid ${isLight ? sun : moon} text-lg`;
    }
    if (profileIcon) {
        profileIcon.className = `fa-solid ${isLight ? sun : moon} w-4`;
    }
    if (profileLabel) {
        profileLabel.textContent = isLight ? 'Tema Gelap' : 'Tema Terang';
    }
}

(function initTheme() {
    const saved = localStorage.getItem('theme');
    if (saved === 'light') {
        document.documentElement.setAttribute('data-theme', 'light');
    }
    updateThemeIcons();
})();
</script>

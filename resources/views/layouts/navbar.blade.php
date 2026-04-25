<nav class="nav">
    <div class="nav-brand" onclick="go('dashboard')">
      <div class="brand-mark"><div class="brand-dot"></div></div>
      <span class="brand-name">Py<em>Learn</em></span>
    </div>
    <div style="margin-left:auto;display:flex;align-items:center;gap:8px">
      <a href="{{ route('dashboard.index') }}" 
    class="nav-item {{ Route::currentRouteName() == 'dashboard.index' ? 'active' : '' }}">
    Dashboard
    </a>

    <a href="{{ route('level.index') }}" 
    class="nav-item {{ Route::currentRouteName() == 'level.index' ? 'active' : '' }}">
    Level
    </a>

    <a href="{{ route('leaderboard.index') }}" 
    class="nav-item {{ Route::currentRouteName() == 'leaderboard.index' ? 'active' : '' }}">
    Leaderboard
    </a>

    <a href="{{ route('badge.index') }}" 
    class="nav-item {{ Route::currentRouteName() == 'badge.index' ? 'active' : '' }}">
    Badge
    </a>
      <div style="width:1px;height:20px;background:var(--bd);margin:0 4px"></div>
      <div class="nav-stat"><strong>2.450</strong> XP</div>
      <div class="nav-stat">Streak <strong>7</strong></div>
      {{-- <div class="avatar" onclick="go('profile')">AR</div> --}}
    @auth
    <a href="{{ route('profile.index') }}" 
    class="avatar {{ Route::currentRouteName() == 'profile.index' ? 'active' : '' }}">
    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
    </a>
    @else
    GU
    @endauth
    </div>
  </nav>
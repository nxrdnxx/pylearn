@extends('layouts.app')

@section('title', 'Leaderboard Pelajar')

@section('content')
<div class="pt-16 min-h-screen bg-ink-950">
    <!-- Premium Header -->
    <div class="relative overflow-hidden pt-12 pb-14">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full max-w-[1200px] pointer-events-none">
            <div class="absolute top-[-100px] right-[-100px] w-[400px] h-[400px] bg-brand-amber/10 blur-[120px] rounded-full"></div>
            <div class="absolute bottom-[-50px] left-[-100px] w-[300px] h-[300px] bg-brand-blue/10 blur-[100px] rounded-full"></div>
        </div>

        <div class="max-w-[800px] mx-auto px-7 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-amber/10 border border-brand-amber/20 text-brand-amber text-[11px] font-bold uppercase tracking-wider mb-4">
                <i class="fa-solid fa-trophy text-[10px]"></i> Klasemen Global
            </div>
            <h1 class="font-semibold text-4xl md:text-5xl text-leaderboard-title mb-4 tracking-tight leading-tight">
                Para <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-amber to-brand-amber-light">Legenda Python</span>
            </h1>
            <p class="text-lg text-leaderboard-desc max-w-xl mx-auto">
                Lihat peringkatmu dan bersainglah dengan pelajar lainnya untuk menjadi yang terbaik.
            </p>
            
            <div class="mt-6 sm:mt-8 inline-flex items-center gap-2 sm:gap-4 px-3 sm:px-5 py-2 sm:py-2.5 rounded-2xl bg-surface-1/50 backdrop-blur-xl relative overflow-hidden" style="border:1px solid var(--color-leaderboard-card-border);">
                <div class="absolute inset-0 pointer-events-none" style="background:var(--color-leaderboard-card-glow);"></div>
                <span class="text-xs sm:text-sm relative" style="color:var(--color-leaderboard-pos-text);">Posisi Kamu</span>
                <div class="h-4 w-px bg-white/10 relative"></div>
                <span class="text-lg sm:text-xl font-semibold relative" style="color:var(--color-leaderboard-pos-text);">#{{ $myRank }}</span>
                <span class="text-[10px] sm:text-xs whitespace-nowrap relative" style="color:var(--color-leaderboard-pos-text);">dari {{ $users->count() }}</span>
            </div>
        </div>
    </div>

    <div class="max-w-[800px] mx-auto px-7 pb-24">
        <!-- Podium -->
        <div class="grid grid-cols-3 gap-2 sm:gap-3 md:gap-6 mb-12 items-end">
            @php
                $podium = collect([
                    $top3->where('rank', 2)->first(),
                    $top3->where('rank', 1)->first(),
                    $top3->where('rank', 3)->first()
                ]);
            @endphp

            @foreach($podium as $user)
            @if($user)
            @php
                $orderClass = $user->rank == 1 ? 'order-2' : ($user->rank == 2 ? 'order-1' : 'order-3');
                $rankIcon  = $user->rank == 1 ? 'fa-crown text-brand-amber' : ($user->rank == 2 ? 'fa-medal text-gray-400' : 'fa-medal text-[#cd7f32]');
            @endphp
            <div class="podium-card group relative {{ $orderClass }} @if($user->rank == 1) scale-105 md:scale-110 origin-bottom z-20 @endif transition-all duration-500">
                <div class="relative bg-surface-1 rounded-[28px] sm:rounded-[32px] p-5 sm:p-8 text-center overflow-hidden @if($user->rank == 1) pt-6 sm:pt-6 @endif" style="border:1px solid var(--color-leaderboard-card-border);@if($user->rank == 1) box-shadow:var(--shadow-leaderboard-podium); @endif">
                    
                    @if($user->rank == 1)
                        <div class="absolute inset-0 bg-gradient-to-b from-brand-amber/10 to-transparent"></div>
                    @endif

                    <div class="relative z-10">
                        <!-- Desktop icon (above photo) -->
                        <div class="hidden sm:block mb-2 sm:mb-4">
                            @if($user->rank == 1) 
                                <div class="w-10 h-10 sm:w-14 sm:h-14 mx-auto mb-1 sm:mb-2 flex items-center justify-center">
                                    <i class="fa-solid fa-crown text-brand-amber text-2xl sm:text-4xl animate-bounce-subtle" style="filter:var(--shadow-leaderboard-crown);"></i>
                                </div>
                            @elseif($user->rank == 2) 
                                <i class="fa-solid fa-medal text-gray-400 text-xl sm:text-3xl mb-2 sm:mb-3"></i>
                            @else 
                                <i class="fa-solid fa-medal text-[#cd7f32] text-xl sm:text-3xl mb-2 sm:mb-3"></i>
                            @endif
                        </div>

                        <div class="relative w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-3 sm:mb-4">
                            <div class="absolute inset-0 bg-ink-700/30 rounded-full blur-lg opacity-40 group-hover:opacity-60 transition-opacity"></div>
                            <div class="relative w-full h-full rounded-full bg-ink-700 border-2 @if($user->rank == 1) border-brand-amber @else border-ink-600 @endif flex items-center justify-center overflow-hidden" style="box-shadow:var(--shadow-leaderboard-avatar);">
                                @if($user->profile_picture)
                                <img src="{{ '/' . $pubDir . 'storage/' . $user->profile_picture }}" alt="" class="w-full h-full object-cover">
                                @else
                                <i class="fa-solid fa-user text-leaderboard-title text-lg sm:text-2xl"></i>
                                @endif
                            </div>
                            <!-- Mobile: Rank icon circle at top-right of profile photo (hidden on sm+) -->
                            <div class="sm:hidden absolute -top-1.5 -right-1.5 w-7 h-7 rounded-full bg-surface-1 border-2 border-surface-1 flex items-center justify-center z-20" style="box-shadow:var(--shadow-leaderboard-rank-badge);">
                                <i class="fa-solid {{ $rankIcon }} text-[12px]"></i>
                            </div>
                        </div>

                        <h3 class="text-[11px] sm:text-lg font-bold text-leaderboard-title mb-1 truncate cursor-pointer hover:opacity-80 transition-opacity" data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}">{{ $user->name }}</h3>
                        <div class="flex items-center justify-center gap-1.5 mb-3 sm:mb-4">
                            <span class="text-lg sm:text-2xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-brand-amber to-brand-amber-light">{{ number_format($user->xp) }}</span>
                            <span class="text-[8px] sm:text-[10px] font-bold uppercase tracking-widest" style="color:var(--color-leaderboard-xp-label);">XP</span>
                        </div>
                        
                        <div class="inline-flex items-center px-2.5 py-1 rounded-lg bg-white/5 text-[10px] font-medium" style="color:var(--color-leaderboard-accent-text);border:1px solid var(--color-leaderboard-card-border);">
                            {{ $user->tier_name }} {{ $user->tier_sub }}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

        <!-- Leaderboard Table -->
            <div class="rounded-[24px] sm:rounded-[32px] overflow-hidden" style="background-color:var(--color-leaderboard-table-bg);border:1px solid var(--color-leaderboard-card-border);box-shadow:var(--shadow-leaderboard-table);">
                <div class="px-4 sm:px-8 py-3 sm:py-5 border-b border-white/5 flex items-center justify-between">
                    <h3 class="text-[10px] sm:text-sm font-bold text-leaderboard-title uppercase tracking-widest">Peringkat Lainnya</h3>
                    <span class="text-[10px] sm:text-xs" style="color:var(--color-leaderboard-active-text);">{{ $users->count() }} Pelajar Aktif</span>
                </div>

                <div class="p-1 sm:p-2">
                    @foreach($users as $user)
                    <div class="flex items-center gap-2 sm:gap-4 py-2.5 sm:py-4 px-3 sm:px-6 rounded-2xl transition-all duration-300 hover:bg-white/[0.02] group @if($user->id == $me->id) bg-brand-blue/10 border border-brand-blue/20 @endif">
                        <div class="w-5 sm:w-8 text-[11px] sm:text-sm font-semibold group-hover:text-leaderboard-title transition-colors" style="color:var(--color-leaderboard-name-text);">
                            #{{ $user->rank }}
                        </div>
                        
                        <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-full bg-ink-700 flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-all overflow-hidden">
                            @if($user->profile_picture)
                            <img src="{{ '/' . $pubDir . 'storage/' . $user->profile_picture }}" alt="" class="w-full h-full object-cover">
                            @else
                            <i class="fa-solid fa-user text-leaderboard-title text-[10px] sm:text-sm"></i>
                            @endif
                        </div>
                        
                        <div class="flex-1 min-w-0">
                            <div class="text-[11px] sm:text-sm font-bold truncate flex items-center gap-1 sm:gap-2" style="color:var(--color-leaderboard-name-text);">
                                <span class="cursor-pointer hover:opacity-80 transition-opacity" data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}">{{ $user->name }}</span>
                                @if($user->id == $me->id)
                                    <span class="px-2.5 py-1 rounded-lg bg-brand-blue/20 text-[8px] sm:text-[9px] font-bold uppercase tracking-tighter" style="color:var(--color-leaderboard-kamu-text);">Kamu</span>
                                @endif
                            </div>
                            <div class="text-[9px] sm:text-[10px]" style="color:var(--color-leaderboard-name-text);">{{ $user->tier_name }} {{ $user->tier_sub }}</div>
                        </div>

                        <div class="text-right flex-shrink-0">
                            <div class="text-[11px] sm:text-sm font-semibold text-brand-amber">{{ number_format($user->xp) }}</div>
                            <div class="text-[8px] sm:text-[9px] font-bold uppercase tracking-tighter" style="color:var(--color-leaderboard-xp-label);">XP</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </div>
</div>

<style>
    .animate-bounce-subtle {
        animation: bounce-subtle 2s infinite ease-in-out;
    }
    @keyframes bounce-subtle {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    #profileModal::-webkit-scrollbar { width: 6px; }
    #profileModal::-webkit-scrollbar-track { background: transparent; }
    #profileModal::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }

    [data-theme="light"] #profileModalCard { border-color: #d1d5db !important; }
    [data-theme="light"] #profileModalCard .text-white { color: #744317 !important; }
    [data-theme="light"] #profileModalCard .text-text-secondary { color: #744317 !important; }
    [data-theme="light"] #profileModalCard .text-text-muted { color: #744317 !important; }
    [data-theme="light"] #profileModalCard .border-white\/10 { border-color: #d1d5db !important; }
    [data-theme="light"] #profileModalCard .border-white\/5 { border-color: #d1d5db !important; }
    [data-theme="light"] #profileModalCard .bg-ink-950\/50 { background: #f1f5f9 !important; }
    [data-theme="light"] #profileModalCard .bg-slate-800\/50 { background: #f8fafc !important; }
    [data-theme="light"] #profileModalCard .border-slate-700\/30 { border-color: #d1d5db !important; }
    [data-theme="light"] #profileModalCard .score-chip { background: #f1f5f9 !important; border-color: #d1d5db !important; }
    [data-theme="light"] #profileModalCard .score-chip.pass { color: #16a067 !important; }
    [data-theme="light"] #profileModalCard .score-chip.fail { color: #d63d3d !important; }
    [data-theme="light"] #profileModalCard .badge-item { border-color: #d1d5db !important; }
    [data-theme="light"] #profileModalCard .text-brand-blue-light { color: #EBB920 !important; }
    [data-theme="light"] #profileModalCard .text-brand-blue { color: #EBB920 !important; }
    [data-theme="light"] #profileModalCard .bg-brand-blue { background: #EBB920 !important; }
    [data-theme="light"] #profileModalCard .bg-brand-blue\/10 { background: rgba(235,185,32,0.1) !important; }
    [data-theme="light"] #profileModalCard .border-brand-blue { border-color: #EBB920 !important; }
    [data-theme="light"] #profileModalCard .bg-gradient-to-r.from-brand-blue\/0 { background: linear-gradient(90deg, transparent, #EBB920, transparent) !important; }

    [data-theme="light"] #userPopover .bg-surface-1 { background: #ffffff !important; }
    [data-theme="light"] #userPopover .border-white\/10 { border-color: #d1d5db !important; }
    [data-theme="light"] #userPopover .text-content { color: #744317 !important; }
    [data-theme="light"] #userPopover .text-text-muted { color: #744317 !important; }
    [data-theme="light"] #userPopover .hover\:bg-white\/10:hover { background: #f1f5f9 !important; }
    [data-theme="light"] #userPopover .bg-brand-blue { background: #EBB920 !important; }
    [data-theme="light"] #userPopover .bg-brand-blue:hover { background: #d4a018 !important; }
    [data-theme="light"] #userPopover .text-white { color: #744317 !important; }

    .score-chip {
        display: inline-flex;
        align-items: center;
        padding: 2px 10px;
        border-radius: 8px;
        font-size: 11px;
        font-weight: 600;
        border: 1px solid rgba(255,255,255,0.1);
    }
    .score-chip.pass { background: rgba(31,184,122,0.15); color: #1fb87a; }
    .score-chip.fail { background: rgba(224,82,82,0.15); color: #e05252; }
</style>

<!-- User Popover -->
<div id="userPopover" class="hidden fixed z-[60]" onclick="event.stopPropagation()">
    <div class="bg-surface-1 border border-white/10 rounded-xl shadow-2xl px-3 py-2 min-w-[140px]" style="backdrop-filter:blur(20px);">
        <button id="popoverViewBtn" onclick="openProfileModal(parseInt(this.dataset.userId))" class="w-full py-2 px-4 rounded-lg bg-brand-blue text-white text-[11px] font-bold hover:bg-brand-blue-light transition-all flex items-center justify-center">
            Lihat Profil
        </button>
    </div>
</div>

<!-- Profile Modal -->
<div id="profileModal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-ink-950/80 backdrop-blur-md hidden" onclick="closeProfileModal(event)">
    <div id="profileModalCard" class="relative bg-surface-1 border border-white/10 rounded-[28px] w-full max-w-lg max-h-[90vh] shadow-2xl flex flex-col overflow-y-auto" onclick="event.stopPropagation()">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brand-blue/0 via-brand-blue to-brand-blue/0"></div>
        
        <div class="p-6 border-b border-white/5 flex items-center justify-between flex-shrink-0">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-ink-700 flex items-center justify-center overflow-hidden" id="modalAvatar">
                    <i class="fa-solid fa-user text-white text-lg"></i>
                </div>
                <div>
                    <h3 id="modalUserName" class="text-lg font-bold text-white"></h3>
                    <p id="modalUserMeta" class="text-xs text-text-secondary"></p>
                </div>
            </div>
            <button onclick="closeProfileModal()" class="text-text-secondary hover:text-white hover:bg-white/10 rounded-full w-8 h-8 flex items-center justify-center transition-all">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- Loading -->
        <div id="modalLoader" class="flex items-center justify-center py-12">
            <div class="w-8 h-8 border-2 border-brand-blue/30 border-t-brand-blue rounded-full animate-spin"></div>
        </div>

        <!-- Content -->
        <div id="modalContent" class="hidden p-4 sm:p-6 space-y-4 sm:space-y-6">
            <!-- Stats -->
            <div class="grid grid-cols-3 gap-2 sm:gap-3">
                <div class="rounded-xl sm:rounded-2xl bg-ink-950/50 border border-white/5 p-3 sm:p-4 text-center">
                    <div class="text-sm sm:text-xl font-bold text-brand-blue-light" id="statXp">0</div>
                    <div class="text-[9px] sm:text-[10px] text-text-muted mt-0.5 sm:mt-1 uppercase tracking-wider">XP</div>
                </div>
                <div class="rounded-xl sm:rounded-2xl bg-ink-950/50 border border-white/5 p-3 sm:p-4 text-center">
                    <div class="text-sm sm:text-xl font-bold text-content" id="statLevel">0</div>
                    <div class="text-[9px] sm:text-[10px] text-text-muted mt-0.5 sm:mt-1 uppercase tracking-wider">Tier</div>
                </div>
                <div class="rounded-xl sm:rounded-2xl bg-ink-950/50 border border-white/5 p-3 sm:p-4 text-center">
                    <div class="text-sm sm:text-xl font-bold text-brand-amber" id="statStreak">0</div>
                    <div class="text-[9px] sm:text-[10px] text-text-muted mt-0.5 sm:mt-1 uppercase tracking-wider">Streak</div>
                </div>
            </div>

            <!-- Badges -->
            <div>
                <h4 class="text-xs font-bold text-content uppercase tracking-widest mb-3 flex items-center gap-2">
                    <i class="fa-solid fa-medal text-brand-amber"></i> Badge Diraih
                </h4>
                <div id="badgeGrid" class="grid grid-cols-3 sm:grid-cols-4 gap-2">
                </div>
            </div>

            <!-- Recent Activity -->
            <div>
                <h4 class="text-xs font-bold text-content uppercase tracking-widest mb-3 flex items-center gap-2">
                    <i class="fa-solid fa-clock-rotate-left text-text-secondary"></i> Aktivitas Terbaru
                </h4>
                <div id="activityList" class="space-y-2">
                </div>
            </div>
        </div>

        <!-- Error -->
        <div id="modalError" class="hidden flex items-center justify-center py-12">
            <div class="text-center">
                <i class="fa-solid fa-triangle-exclamation text-brand-red text-3xl mb-3"></i>
                <p class="text-sm text-text-secondary">Gagal memuat profil pengguna.</p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[data-user-name]').forEach(function(el) {
            el.addEventListener('click', function(e) {
                var userId = parseInt(this.dataset.userId);
                showPopover(e, userId);
            });
        });
    });

    var activePopoverUserId = null;

    function showPopover(event, userId) {
        event.stopPropagation();
        closePopover();
        
        var popover = document.getElementById('userPopover');
        var btn = document.getElementById('popoverViewBtn');
        var rect = event.currentTarget.getBoundingClientRect();
        
        btn.dataset.userId = userId;
        activePopoverUserId = userId;
        
        // Show first so offsetHeight is correct
        popover.classList.remove('hidden');
        
        var top = rect.bottom + 6;
        var left = rect.left;
        
        if (top + popover.offsetHeight > window.innerHeight) {
            top = rect.top - popover.offsetHeight - 6;
        }
        if (left + 220 > window.innerWidth) {
            left = window.innerWidth - 230;
        }
        if (left < 10) left = 10;
        
        popover.style.top = top + 'px';
        popover.style.left = left + 'px';
        
        setTimeout(function() {
            document.addEventListener('click', closePopover, { once: true });
        }, 10);
    }

    function closePopover() {
        document.getElementById('userPopover').classList.add('hidden');
        activePopoverUserId = null;
    }

    function openProfileModal(userId) {
        closePopover();
        
        var modal = document.getElementById('profileModal');
        var loader = document.getElementById('modalLoader');
        var content = document.getElementById('modalContent');
        var error = document.getElementById('modalError');
        
        modal.classList.remove('hidden');
        loader.classList.remove('hidden');
        content.classList.add('hidden');
        error.classList.add('hidden');
        
        fetch('/api/user/' + userId + '/profile')
            .then(function(res) { return res.json(); })
            .then(function(data) {
                loader.classList.add('hidden');
                if (data.success) {
                    renderProfile(data);
                    content.classList.remove('hidden');
                } else {
                    error.classList.remove('hidden');
                }
            })
            .catch(function() {
                loader.classList.add('hidden');
                error.classList.remove('hidden');
            });
    }

    function renderProfile(data) {
        var u = data.user;
        document.getElementById('modalUserName').textContent = u.name;
        document.getElementById('modalUserMeta').textContent = u.xp.toLocaleString() + ' XP · ' + u.tier_name + ' ' + u.tier_sub + ' · Streak ' + u.streak + ' hari';
        
        var avatarEl = document.getElementById('modalAvatar');
        if (u.profile_picture) {
            avatarEl.innerHTML = '<img src="/{{ $pubDir }}storage/' + u.profile_picture + '" alt="" class="w-full h-full object-cover">';
        } else {
            avatarEl.innerHTML = '<i class="fa-solid fa-user text-white text-lg"></i>';
        }
        
        document.getElementById('statXp').textContent = u.xp.toLocaleString();
        document.getElementById('statLevel').textContent = u.tier_name + ' ' + u.tier_sub;
        document.getElementById('statStreak').textContent = u.streak;
        
        // Badges
        var badgeGrid = document.getElementById('badgeGrid');
        badgeGrid.innerHTML = '';
        if (data.badges && data.badges.length > 0) {
            data.badges.forEach(function(badge) {
                var color = badge.color || '#3b7cf4';
                var icon = badge.icon || 'fa-medal';
                var wrapper = document.createElement('div');
                wrapper.className = 'group relative h-full';
                wrapper.innerHTML = '<div class="absolute inset-0 rounded-[20px] blur-xl opacity-0 group-hover:opacity-20 transition-opacity duration-500" style="background:linear-gradient(135deg,' + color + '33,' + color + '1a)"></div><div class="relative h-full bg-surface-1 rounded-[20px] p-3 sm:p-4 flex flex-col items-center text-center transition-all duration-500 hover:-translate-y-1" style="border:1px solid var(--color-badge-card-border);box-shadow:var(--color-badge-card-shadow);"><div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl flex items-center justify-center mb-2 group-hover:scale-110 transition-transform border border-white/5 flex-shrink-0" style="background:linear-gradient(135deg,' + color + '33,' + color + '1a);box-shadow:var(--color-badge-icon-shadow);"><i class="fa-solid ' + icon + ' text-base sm:text-lg" style="color:' + color + ';filter:drop-shadow(0 0 6px ' + color + '66)"></i></div><h4 class="text-[10px] sm:text-xs font-bold text-content truncate">' + badge.name + '</h4></div>';
                badgeGrid.appendChild(wrapper);
            });
        } else {
            badgeGrid.innerHTML = '<div class="col-span-4 text-center text-xs text-text-muted py-4">Belum ada badge</div>';
        }
        
        // Activities
        var activityList = document.getElementById('activityList');
        activityList.innerHTML = '';
        if (data.activities && data.activities.length > 0) {
            data.activities.forEach(function(act) {
                var div = document.createElement('div');
                div.className = 'flex items-center justify-between py-2 px-3 rounded-xl bg-slate-800/50 border border-slate-700/30';
                var statusClass = act.status === 'Lulus' ? 'pass' : 'fail';
                div.innerHTML = '<div class="min-w-0 flex-1"><div class="text-xs font-medium text-content truncate">' + act.level_name + '</div><div class="text-[10px] text-text-muted mt-0.5">' + act.date + '</div></div><div class="flex items-center gap-2 flex-shrink-0"><span class="score-chip ' + statusClass + '">' + act.score + '%</span><span class="text-[10px] font-bold text-brand-amber">+' + act.xp + '</span><span class="text-[10px] font-medium ' + (act.status === 'Lulus' ? 'text-brand-green' : 'text-brand-red') + '">' + act.status + '</span></div>';
                activityList.appendChild(div);
            });
        } else {
            activityList.innerHTML = '<div class="text-center text-xs text-text-muted py-4">Belum ada aktivitas</div>';
        }
    }

    function closeProfileModal(event) {
        if (event && event.target !== document.getElementById('profileModal')) return;
        document.getElementById('profileModal').classList.add('hidden');
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePopover();
            document.getElementById('profileModal').classList.add('hidden');
        }
    });
</script>
@endsection

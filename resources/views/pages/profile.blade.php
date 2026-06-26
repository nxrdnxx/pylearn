@extends('layouts.app')

@section('title', 'Profil Pelajar')

@section('content')
<div class="pt-16 min-h-screen bg-ink-950 profile-page">
    <!-- Premium Header -->
    <div class="relative overflow-hidden pt-12 pb-16">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full max-w-[1200px] pointer-events-none">
            <div class="absolute top-[-100px] left-[-100px] w-[400px] h-[400px] bg-brand-blue/10 blur-[120px] rounded-full"></div>
            <div class="absolute bottom-[-50px] right-[-100px] w-[300px] h-[300px] bg-brand-purple/10 blur-[100px] rounded-full"></div>
        </div>

        <div class="max-w-[1100px] mx-auto px-7 relative z-10">
            <div class="flex flex-col md:flex-row items-center md:items-end justify-between gap-8">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    @auth
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-br from-brand-blue to-brand-purple rounded-[32px] blur-xl opacity-40 group-hover:opacity-60 transition-opacity profile-avatar-glow"></div>
                        <div class="relative w-32 h-32 rounded-[32px] bg-ink-700 border-2 border-ink-600 flex items-center justify-center overflow-hidden profile-avatar-inner" style="box-shadow:var(--shadow-profile-card);">
                            @if(Auth::user()->profile_picture)
                            <img src="{{ '/' . $pubDir . 'storage/' . Auth::user()->profile_picture }}" alt="Foto Profil" class="w-full h-full object-cover">
                            @else
                            <i class="fa-solid fa-user text-5xl" style="color:var(--color-profile-text);"></i>
                            @endif
                        </div>
                    </div>
                    
                    <div class="text-center md:text-left">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-blue/10 border border-brand-blue/20 text-brand-blue-light text-[11px] font-bold uppercase tracking-wider mb-3">
                <i class="fa-solid fa-user-graduate text-[10px]"></i> Profil Pelajar
            </div>
            <h1 class="text-3xl sm:text-4xl font-semibold mb-2 tracking-tight break-all" style="color:var(--color-profile-text);">{{ Auth::user()->name }}</h1>
            <p class="text-text-secondary mb-5 break-all">{{ Auth::user()->email }}</p>
            
            <div class="flex items-center justify-center md:justify-start gap-3 flex-wrap">
<span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-white/5 border border-white/5 text-[11px] font-bold uppercase tracking-widest" style="color:var(--color-profile-level-text);">
    <i class="fa-solid fa-layer-group mr-2 text-brand-blue"></i>Level {{ $completedLevel }}
</span>
<span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-white/5 border border-white/5 text-[11px] font-bold uppercase tracking-widest" style="color:var(--color-profile-level-text);">
    <i class="fa-solid fa-fire mr-2 text-brand-amber"></i>Streak {{ $streak }} Hari
</span>
                        </div>
                    </div>
                    @endauth
                </div>

                <div class="flex gap-2 sm:gap-3">
                    <a href="{{ route('profile.edit') }}" class="px-4 sm:px-5 py-2.5 rounded-2xl bg-brand-blue/10 backdrop-blur-xl border border-brand-blue/20 text-brand-blue-light font-bold text-[10px] sm:text-xs hover:bg-brand-blue/20 transition-all" style="box-shadow:var(--shadow-profile-card);">
                        <i class="fa-solid fa-pen-to-square mr-1 sm:mr-2"></i>                        <span class="hidden sm:inline">Edit</span> Profil
                    </a>
                    <button class="px-4 sm:px-5 py-2.5 rounded-2xl bg-surface-1/50 backdrop-blur-xl border border-white/10 font-bold text-[10px] sm:text-xs hover:bg-surface-2 transition-all" style="color:var(--color-profile-text);box-shadow:var(--shadow-profile-card);" onclick="document.getElementById('logoutModal').style.display = 'flex'">
                        <i class="fa-solid fa-right-from-bracket mr-1 sm:mr-2"></i>Logout
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-[1100px] mx-auto px-7 pb-24">
        <!-- Stats Grid -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5 mb-10">
            <div class="bg-surface-1 rounded-[20px] sm:rounded-[28px] p-4 sm:p-6 hover:border-brand-blue/20 transition-all relative overflow-hidden group" style="border:1px solid var(--color-profile-card-border);">
                <i class="fa-solid fa-bolt text-brand-blue" style="position:absolute;bottom:-10px;right:-10px;font-size:5rem;opacity:var(--card-icon-opacity);pointer-events:none;"></i>
                <div class="relative" style="z-index:1;">
                    <div class="text-2xl sm:text-3xl font-semibold mb-1" style="color:var(--color-profile-text);">{{ number_format($xp) }}</div>
                    <div class="text-[10px] sm:text-xs font-bold text-text-muted uppercase tracking-widest">Total XP</div>
                </div>
            </div>
            
            <div class="bg-surface-1 rounded-[20px] sm:rounded-[28px] p-4 sm:p-6 hover:border-brand-green/20 transition-all relative overflow-hidden group" style="border:1px solid var(--color-profile-card-border);">
                <i class="fa-solid fa-layer-group text-brand-green" style="position:absolute;bottom:-10px;right:-10px;font-size:5rem;opacity:var(--card-icon-opacity);pointer-events:none;"></i>
                <div class="relative" style="z-index:1;">
                    <div class="text-2xl sm:text-3xl font-semibold mb-1" style="color:var(--color-profile-text);">
                        {{ $completedLevel }}<span class="text-base sm:text-lg text-text-muted">/{{ $totalLevel }}</span>
                    </div>
                    <div class="text-[10px] sm:text-xs font-bold text-text-muted uppercase tracking-widest">Level Selesai</div>
                </div>
            </div>
            
            <div class="bg-surface-1 rounded-[20px] sm:rounded-[28px] p-4 sm:p-6 hover:border-brand-purple/20 transition-all relative overflow-hidden group" style="border:1px solid var(--color-profile-card-border);">
                <i class="fa-solid fa-medal text-brand-purple" style="position:absolute;bottom:-10px;right:-10px;font-size:5rem;opacity:var(--card-icon-opacity);pointer-events:none;"></i>
                <div class="relative" style="z-index:1;">
                    <div class="text-2xl sm:text-3xl font-semibold mb-1" style="color:var(--color-profile-text);">{{ $badgeCount }}</div>
                    <div class="text-[10px] sm:text-xs font-bold text-text-muted uppercase tracking-widest">Badge Diraih</div>
                </div>
            </div>
            
            <div class="bg-surface-1 rounded-[20px] sm:rounded-[28px] p-4 sm:p-6 hover:border-brand-amber/20 transition-all relative overflow-hidden group" style="border:1px solid var(--color-profile-card-border);">
                <i class="fa-solid fa-fire text-brand-amber" style="position:absolute;bottom:-10px;right:-10px;font-size:5rem;opacity:var(--card-icon-opacity);pointer-events:none;"></i>
                <div class="relative" style="z-index:1;">
                    <div class="text-2xl sm:text-3xl font-semibold mb-1" style="color:var(--color-profile-text);">{{ $streak }}</div>
                    <div class="text-[10px] sm:text-xs font-bold text-text-muted uppercase tracking-widest">Hari Streak</div>
                </div>
            </div>
        </div>

        <!-- Activity History -->
        <div class="rounded-[32px] overflow-hidden" style="background-color:var(--color-profile-table-bg);border:1px solid var(--color-profile-card-border);box-shadow:var(--shadow-profile-card);">
            <div class="px-8 py-6 flex items-center justify-between" style="border-bottom:1px solid var(--color-profile-card-border);">
                <h3 class="text-sm font-bold uppercase tracking-widest flex items-center gap-3" style="color:var(--color-profile-text);">
                    <i class="fa-solid fa-history" style="color:var(--color-profile-history-icon);"></i> Riwayat Aktivitas
                </h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left activity-table">
                    <thead>
                        <tr class="bg-white/[0.02]">
                            <th class="px-2 sm:px-8 py-2 sm:py-4 text-[9px] sm:text-[10px] font-bold text-text-muted uppercase tracking-widest">Level</th>
                            <th class="px-2 sm:px-8 py-2 sm:py-4 text-[9px] sm:text-[10px] font-bold text-text-muted uppercase tracking-widest text-center">Skor</th>
                            <th class="px-2 sm:px-8 py-2 sm:py-4 text-[9px] sm:text-[10px] font-bold text-text-muted uppercase tracking-widest text-center">XP</th>
                            <th class="hidden sm:table-cell px-2 sm:px-8 py-2 sm:py-4 text-[9px] sm:text-[10px] font-bold text-text-muted uppercase tracking-widest">Tanggal</th>
                            <th class="px-2 sm:px-8 py-2 sm:py-4 text-[9px] sm:text-[10px] font-bold text-text-muted uppercase tracking-widest text-right">Status</th>
                        </tr>
                    </thead>
                     <tbody class="divide-y" style="border-color:var(--color-profile-card-border);">
                        @forelse($activities as $activity)
                        <tr class="hover:bg-white/[0.02] transition-colors group">
                            <td class="px-2 sm:px-8 py-2 sm:py-5">
                                <div class="text-[10px] sm:text-sm font-bold truncate max-w-[120px] sm:max-w-none" style="color:var(--color-profile-text);">{{ $activity['level_name'] }}</div>
                            </td>
                            <td class="px-2 sm:px-8 py-2 sm:py-5 text-center">
                                <div class="value-chip text-[10px] sm:text-sm font-semibold {{ $activity['score'] >= 80 ? 'text-brand-green' : ($activity['score'] >= 50 ? 'text-brand-amber' : 'text-brand-red') }}">
                                    {{ $activity['score'] }}
                                </div>
                            </td>
                            <td class="px-2 sm:px-8 py-2 sm:py-5 text-center">
                                <div class="value-chip text-[10px] sm:text-sm font-semibold text-brand-amber">+{{ $activity['xp'] }}</div>
                            </td>
                            <td class="hidden sm:table-cell px-2 sm:px-8 py-2 sm:py-5">
                                <div class="value-chip text-[10px] sm:text-xs text-text-secondary whitespace-nowrap">{{ $activity['date']->diffForHumans() }}</div>
                            </td>
                            <td class="px-2 sm:px-8 py-2 sm:py-5 text-right">
                                @if($activity['status'] === 'Lulus')
                                <span class="inline-flex items-center px-1 sm:px-2 py-0.5 rounded bg-brand-green/10 text-brand-green text-[8px] sm:text-[9px] font-bold uppercase tracking-tighter border border-brand-green/20">Lulus</span>
                                @else
                                <span class="inline-flex items-center px-1 sm:px-2 py-0.5 rounded bg-brand-red/10 text-brand-red text-[8px] sm:text-[9px] font-bold uppercase tracking-tighter border border-brand-red/20">Gagal</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-2 sm:px-8 py-6 sm:py-20 text-center">
                                <div class="w-10 h-10 sm:w-16 sm:h-16 rounded-full bg-white/5 flex items-center justify-center mx-auto mb-3 sm:mb-4">
                                    <i class="fa-solid fa-inbox text-text-muted text-sm sm:text-xl"></i>
                                </div>
                                <div class="text-[10px] sm:text-sm text-text-secondary">Belum ada aktivitas tercatat.</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal -->
<div id="logoutModal" class="fixed inset-0 bg-ink-950/80 backdrop-blur-md z-[999] hidden items-center justify-center p-5" onclick="if(event.target === this) this.style.display = 'none'">
    <div class="bg-surface-1 rounded-[32px] border border-white/10 p-8 w-full max-w-[360px] text-center animate-in zoom-in duration-300" style="box-shadow:var(--shadow-profile-card);">
        <div class="w-16 h-16 rounded-2xl bg-brand-red/10 flex items-center justify-center mx-auto mb-6">
            <i class="fa-solid fa-right-from-bracket text-brand-red text-2xl"></i>
        </div>
        <h3 class="text-xl font-bold mb-2" style="color:var(--color-profile-text);">Konfirmasi Logout</h3>
        <p class="text-[15px] text-text-secondary mb-8">Anda yakin ingin keluar dari sesi belajar saat ini?</p>
        <div class="flex gap-3">
            <button class="flex-1 py-3 rounded-2xl bg-white/5 text-text-secondary font-bold text-xs hover:bg-white/10 transition-all" onclick="document.getElementById('logoutModal').style.display = 'none'">Batal</button>
            <form action="{{ route('logout') }}" method="POST" class="flex-1">
                @csrf
                <button type="submit" class="w-full py-3 rounded-2xl bg-brand-red font-bold text-xs hover:bg-brand-red-light transition-all" style="color:var(--color-profile-text);">Ya, Logout</button>
            </form>
        </div>
    </div>
</div>

<style>
.profile-page { --color-profile-history-icon: var(--color-profile-accent); --color-profile-level-text: #5884D1; }

[data-theme="light"] .profile-page .text-brand-blue-light,
[data-theme="light"] .profile-page .text-brand-blue,
[data-theme="light"] .profile-page .group-hover\:text-brand-blue-light,
[data-theme="light"] .profile-page .fa-bolt { color: #EBB920 !important; }

[data-theme="light"] .profile-page .bg-brand-blue\/10 { background: rgba(235,185,32,0.1) !important; }
[data-theme="light"] .profile-page .border-brand-blue\/20 { border-color: rgba(235,185,32,0.2) !important; }

[data-theme="light"] .profile-page { --color-profile-history-icon: #744317; --color-profile-level-text: #EBB920; }

[data-theme="light"] .profile-page .activity-table thead th { color: #D8B134 !important; }

[data-theme="light"] .profile-page .profile-avatar-glow { display: none !important; }

[data-theme="light"] .profile-page .profile-avatar-inner { border-color: #000000 !important; }


[data-theme="light"] .profile-page .activity-table thead tr { background: #D8B134 !important; }
[data-theme="light"] .profile-page .activity-table thead tr th { color: #744317 !important; }

[data-theme="light"] .profile-page .value-chip {
    padding: 2px 12px;
    border-radius: 999px;
    display: inline-block;
}

[data-theme="light"] .profile-page .value-chip.text-brand-green { background: rgba(22, 160, 107, 0.15); }
[data-theme="light"] .profile-page .value-chip.text-brand-amber { background: rgba(201, 134, 15, 0.15); }
[data-theme="light"] .profile-page .value-chip.text-brand-red { background: rgba(214, 61, 61, 0.15); }
[data-theme="light"] .profile-page .value-chip.text-text-secondary { background: rgba(53, 89, 153, 0.15); }

[data-theme="light"] .profile-page .relative.group .bg-gradient-to-br { display: none; }

[data-theme="light"] .profile-page .relative.group .w-32.h-32 { border-color: #000000 !important; }


</style>
@endsection
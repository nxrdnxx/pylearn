@extends('layouts.app')

@section('title', 'Profil Pelajar')

@section('content')
<div class="pt-16 min-h-screen bg-ink-950">
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
                        <div class="absolute inset-0 bg-gradient-to-br from-brand-blue to-brand-purple rounded-[32px] blur-xl opacity-40 group-hover:opacity-60 transition-opacity"></div>
                        <div class="relative w-32 h-32 rounded-[32px] bg-surface-1 border-2 border-white/10 flex items-center justify-center text-4xl font-bold text-white shadow-2xl overflow-hidden">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                    </div>
                    
                    <div class="text-center md:text-left">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-blue/10 border border-brand-blue/20 text-brand-blue-light text-[11px] font-bold uppercase tracking-wider mb-3">
                            <i class="fa-solid fa-user-graduate text-[10px]"></i> Profil Pelajar
                        </div>
                        <h1 class="text-4xl font-serif font-bold text-white mb-2 tracking-tight">{{ Auth::user()->name }}</h1>
                        <p class="text-text-secondary mb-5">{{ Auth::user()->email }}</p>
                        
                        <div class="flex items-center justify-center md:justify-start gap-3">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-white/5 border border-white/5 text-[11px] font-bold text-text-muted uppercase tracking-widest">
                                <i class="fa-solid fa-layer-group mr-2 text-brand-blue"></i>Level {{ $completedLevel }}
                            </span>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-white/5 border border-white/5 text-[11px] font-bold text-text-muted uppercase tracking-widest">
                                <i class="fa-solid fa-fire mr-2 text-brand-amber"></i>Streak {{ $streak }} Hari
                            </span>
                        </div>
                    </div>
                    @endauth
                </div>

                <div class="flex gap-3">
                    <button class="px-5 py-2.5 rounded-2xl bg-surface-1/50 backdrop-blur-xl border border-white/10 text-white font-bold text-xs hover:bg-surface-2 transition-all shadow-xl" onclick="document.getElementById('logoutModal').style.display = 'flex'">
                        <i class="fa-solid fa-right-from-bracket mr-2"></i>Logout
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-[1100px] mx-auto px-7 pb-24">
        <!-- Stats Grid -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
            <div class="bg-surface-1 rounded-[28px] border border-white/5 p-6 hover:border-brand-blue/20 transition-all group">
                <div class="w-12 h-12 rounded-2xl bg-brand-blue/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-bolt text-brand-blue text-xl"></i>
                </div>
                <div class="text-3xl font-serif font-bold text-white mb-1">{{ number_format($xp) }}</div>
                <div class="text-xs font-bold text-text-muted uppercase tracking-widest">Total XP</div>
            </div>
            
            <div class="bg-surface-1 rounded-[28px] border border-white/5 p-6 hover:border-brand-green/20 transition-all group">
                <div class="w-12 h-12 rounded-2xl bg-brand-green/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-check-double text-brand-green text-xl"></i>
                </div>
                <div class="text-3xl font-serif font-bold text-white mb-1">
                    {{ $completedLevel }}<span class="text-lg text-text-muted">/{{ $totalLevel }}</span>
                </div>
                <div class="text-xs font-bold text-text-muted uppercase tracking-widest">Level Selesai</div>
            </div>
            
            <div class="bg-surface-1 rounded-[28px] border border-white/5 p-6 hover:border-brand-purple/20 transition-all group">
                <div class="w-12 h-12 rounded-2xl bg-brand-purple/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-medal text-brand-purple text-xl"></i>
                </div>
                <div class="text-3xl font-serif font-bold text-white mb-1">{{ $badgeCount }}</div>
                <div class="text-xs font-bold text-text-muted uppercase tracking-widest">Badge Diraih</div>
            </div>
            
            <div class="bg-surface-1 rounded-[28px] border border-white/5 p-6 hover:border-brand-amber/20 transition-all group">
                <div class="w-12 h-12 rounded-2xl bg-brand-amber/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-fire text-brand-amber text-xl"></i>
                </div>
                <div class="text-3xl font-serif font-bold text-white mb-1">{{ $streak }}</div>
                <div class="text-xs font-bold text-text-muted uppercase tracking-widest">Hari Streak</div>
            </div>
        </div>

        <!-- Activity History -->
        <div class="bg-surface-1 rounded-[32px] border border-white/5 overflow-hidden shadow-2xl">
            <div class="px-8 py-6 border-b border-white/5 flex items-center justify-between">
                <h3 class="text-sm font-bold text-white uppercase tracking-widest flex items-center gap-3">
                    <i class="fa-solid fa-history text-brand-blue"></i> Riwayat Aktivitas
                </h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-white/[0.02]">
                            <th class="px-8 py-4 text-[10px] font-bold text-text-muted uppercase tracking-widest">Level</th>
                            <th class="px-8 py-4 text-[10px] font-bold text-text-muted uppercase tracking-widest text-center">Skor</th>
                            <th class="px-8 py-4 text-[10px] font-bold text-text-muted uppercase tracking-widest text-center">XP</th>
                            <th class="px-8 py-4 text-[10px] font-bold text-text-muted uppercase tracking-widest">Tanggal</th>
                            <th class="px-8 py-4 text-[10px] font-bold text-text-muted uppercase tracking-widest text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($activities as $activity)
                        <tr class="hover:bg-white/[0.02] transition-colors group">
                            <td class="px-8 py-5">
                                <div class="text-sm font-bold text-white group-hover:text-brand-blue-light transition-colors">{{ $activity['level_name'] }}</div>
                            </td>
                            <td class="px-8 py-5 text-center">
                                <div class="text-sm font-serif font-bold {{ $activity['score'] >= 80 ? 'text-brand-green' : ($activity['score'] >= 50 ? 'text-brand-amber' : 'text-brand-red') }}">
                                    {{ $activity['score'] }}
                                </div>
                            </td>
                            <td class="px-8 py-5 text-center">
                                <div class="text-sm font-serif font-bold text-brand-amber">+{{ $activity['xp'] }}</div>
                            </td>
                            <td class="px-8 py-5">
                                <div class="text-xs text-text-secondary">{{ $activity['date']->diffForHumans() }}</div>
                            </td>
                            <td class="px-8 py-5 text-right">
                                @if($activity['status'] === 'Lulus')
                                <span class="inline-flex items-center px-2 py-0.5 rounded bg-brand-green/10 text-brand-green text-[9px] font-bold uppercase tracking-tighter border border-brand-green/20">Lulus</span>
                                @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded bg-brand-red/10 text-brand-red text-[9px] font-bold uppercase tracking-tighter border border-brand-red/20">Gagal</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-8 py-20 text-center">
                                <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center mx-auto mb-4">
                                    <i class="fa-solid fa-inbox text-text-muted text-xl"></i>
                                </div>
                                <div class="text-sm text-text-secondary">Belum ada aktivitas tercatat.</div>
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
    <div class="bg-surface-1 rounded-[32px] border border-white/10 p-8 w-full max-w-[360px] text-center shadow-2xl animate-in zoom-in duration-300">
        <div class="w-16 h-16 rounded-2xl bg-brand-red/10 flex items-center justify-center mx-auto mb-6">
            <i class="fa-solid fa-right-from-bracket text-brand-red text-2xl"></i>
        </div>
        <h3 class="text-xl font-bold text-white mb-2">Konfirmasi Logout</h3>
        <p class="text-[15px] text-text-secondary mb-8">Anda yakin ingin keluar dari sesi belajar saat ini?</p>
        <div class="flex gap-3">
            <button class="flex-1 py-3 rounded-2xl bg-white/5 text-text-secondary font-bold text-xs hover:bg-white/10 transition-all" onclick="document.getElementById('logoutModal').style.display = 'none'">Batal</button>
            <form action="{{ route('logout') }}" method="POST" class="flex-1">
                @csrf
                <button type="submit" class="w-full py-3 rounded-2xl bg-brand-red text-white font-bold text-xs hover:bg-brand-red-light transition-all shadow-lg shadow-brand-red/20">Ya, Logout</button>
            </form>
        </div>
    </div>
</div>
@endsection
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
            <h1 class="font-semibold text-4xl md:text-5xl text-white mb-4 tracking-tight leading-tight">
                Para <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-amber to-brand-amber-light">Legenda Python</span>
            </h1>
            <p class="text-lg text-text-secondary max-w-xl mx-auto">
                Lihat peringkatmu dan bersainglah dengan ribuan pelajar lainnya untuk menjadi yang terbaik.
            </p>
            
            <div class="mt-6 sm:mt-8 inline-flex items-center gap-2 sm:gap-4 px-3 sm:px-5 py-2 sm:py-2.5 rounded-2xl bg-surface-1/50 border border-white/5 backdrop-blur-xl">
                <span class="text-xs sm:text-sm text-text-secondary">Posisi Kamu</span>
                <div class="h-4 w-px bg-white/10"></div>
                <span class="text-lg sm:text-xl font-semibold text-brand-blue-light">#{{ $myRank }}</span>
                <span class="text-[10px] sm:text-xs text-text-muted whitespace-nowrap">dari {{ $users->count() }}</span>
            </div>
        </div>
    </div>

    <div class="max-w-[800px] mx-auto px-7 pb-24">
        <!-- Podium -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 items-end">
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
                $orderClass = $user->rank == 1 ? 'order-1 md:order-2' : ($user->rank == 2 ? 'order-2 md:order-1' : 'order-3 md:order-3');
            @endphp
            <div class="podium-card group relative {{ $orderClass }} @if($user->rank == 1) md:scale-110 md:-translate-y-4 z-20 @endif transition-all duration-500">
                <div class="relative bg-surface-1 rounded-[28px] sm:rounded-[32px] border @if($user->rank == 1) border-brand-amber/30 shadow-[0_20px_50px_rgba(232,160,34,0.15)] @else border-white/5 @endif p-5 sm:p-8 text-center overflow-hidden">
                    
                    @if($user->rank == 1)
                        <div class="absolute inset-0 bg-gradient-to-b from-brand-amber/10 to-transparent"></div>
                    @endif

                    <div class="relative z-10">
                        <div class="mb-2 sm:mb-4">
                            @if($user->rank == 1) 
                                <div class="w-10 h-10 sm:w-14 sm:h-14 mx-auto mb-1 sm:mb-2 flex items-center justify-center">
                                    <i class="fa-solid fa-crown text-brand-amber text-2xl sm:text-4xl drop-shadow-[0_0_15px_rgba(232,160,34,0.5)] animate-bounce-subtle"></i>
                                </div>
                            @elseif($user->rank == 2) 
                                <i class="fa-solid fa-medal text-gray-400 text-xl sm:text-3xl mb-2 sm:mb-3"></i>
                            @else 
                                <i class="fa-solid fa-medal text-[#cd7f32] text-xl sm:text-3xl mb-2 sm:mb-3"></i>
                            @endif
                        </div>

                        <div class="relative w-16 h-16 sm:w-20 sm:h-20 mx-auto mb-3 sm:mb-4">
                            <div class="absolute inset-0 bg-yellow-500/30 rounded-full blur-lg opacity-40 group-hover:opacity-60 transition-opacity"></div>
                            <div class="relative w-full h-full rounded-full bg-yellow-500 border-2 @if($user->rank == 1) border-brand-amber @else border-yellow-400/30 @endif flex items-center justify-center shadow-2xl overflow-hidden">
                                @if($user->profile_picture)
                                <img src="{{ '/' . $pubDir . 'storage/' . $user->profile_picture }}" alt="" class="w-full h-full object-cover">
                                @else
                                <i class="fa-solid fa-user text-white text-lg sm:text-2xl"></i>
                                @endif
                            </div>
                            @if($user->rank == 1)
                                <div class="absolute -bottom-1 -right-1 w-6 h-6 sm:w-8 sm:h-8 rounded-full bg-brand-amber flex items-center justify-center text-white text-[10px] sm:text-xs font-bold border-2 border-surface-1">1</div>
                            @endif
                        </div>

                        <h3 class="text-base sm:text-lg font-bold text-white mb-1 truncate">{{ $user->name }}</h3>
                        <div class="flex items-center justify-center gap-1.5 mb-3 sm:mb-4">
                            <span class="text-lg sm:text-2xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-brand-amber to-brand-amber-light">{{ number_format($user->xp) }}</span>
                            <span class="text-[8px] sm:text-[10px] font-bold text-text-muted uppercase tracking-widest">XP</span>
                        </div>
                        
                        <div class="inline-flex items-center px-2 py-0.5 rounded-md bg-white/5 text-[10px] font-medium text-text-muted">
                            Level {{ $user->level }}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

        <!-- Leaderboard Table -->
            <div class="bg-surface-1 rounded-[24px] sm:rounded-[32px] border border-white/5 overflow-hidden shadow-2xl">
                <div class="px-4 sm:px-8 py-3 sm:py-5 border-b border-white/5 flex items-center justify-between">
                    <h3 class="text-[10px] sm:text-sm font-bold text-white uppercase tracking-widest">Peringkat Lainnya</h3>
                    <span class="text-[10px] sm:text-xs text-text-muted">{{ $users->count() }} Pelajar Aktif</span>
                </div>

                <div class="p-1 sm:p-2">
                    @foreach($users as $user)
                    <div class="flex items-center gap-2 sm:gap-4 py-2.5 sm:py-4 px-3 sm:px-6 rounded-2xl transition-all duration-300 hover:bg-white/[0.02] group @if($user->id == $me->id) bg-brand-blue/10 border border-brand-blue/20 @endif">
                        <div class="w-5 sm:w-8 text-[11px] sm:text-sm font-semibold text-text-muted group-hover:text-white transition-colors">
                            #{{ $user->rank }}
                        </div>
                        
                        <div class="w-7 h-7 sm:w-10 sm:h-10 rounded-full bg-yellow-500 flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-all overflow-hidden">
                            @if($user->profile_picture)
                            <img src="{{ '/' . $pubDir . 'storage/' . $user->profile_picture }}" alt="" class="w-full h-full object-cover">
                            @else
                            <i class="fa-solid fa-user text-white text-[10px] sm:text-sm"></i>
                            @endif
                        </div>
                        
                        <div class="flex-1 min-w-0">
                            <div class="text-[11px] sm:text-sm font-bold text-white truncate flex items-center gap-1 sm:gap-2">
                                {{ $user->name }}
                                @if($user->id == $me->id)
                                    <span class="px-1 sm:px-1.5 py-0.5 rounded bg-brand-blue/20 text-brand-blue-light text-[8px] sm:text-[9px] font-bold uppercase tracking-tighter">Kamu</span>
                                @endif
                            </div>
                            <div class="text-[9px] sm:text-[10px] text-text-muted">Level {{ $user->level }}</div>
                        </div>

                        <div class="text-right flex-shrink-0">
                            <div class="text-[11px] sm:text-sm font-semibold text-brand-amber">{{ number_format($user->xp) }}</div>
                            <div class="text-[8px] sm:text-[9px] font-bold text-text-muted uppercase tracking-tighter">XP</div>
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
</style>
@endsection
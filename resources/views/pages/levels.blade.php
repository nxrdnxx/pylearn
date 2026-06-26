@extends('layouts.app')

@section('title', 'Kurikulum Pembelajaran')

@section('content')
<div class="pt-16 min-h-screen bg-ink-950">
    @php
        $totalLevel = count($levels);
        $completed = collect($levels)->where('status', 'completed')->count();
        $percent = $totalLevel > 0 ? ($completed / $totalLevel) * 100 : 0;
    @endphp

    <!-- Premium Header -->
    <div class="relative overflow-hidden pt-12 pb-16">
        <!-- Background Decorative Elements -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full max-w-[1200px] pointer-events-none">
            <div class="absolute top-[-100px] left-[-100px] w-[400px] h-[400px] bg-brand-blue/10 blur-[120px] rounded-full"></div>
            <div class="absolute bottom-[-50px] right-[-100px] w-[300px] h-[300px] bg-brand-purple/10 blur-[100px] rounded-full"></div>
        </div>

        <div class="max-w-[1100px] mx-auto px-7 relative z-10">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
                <div class="max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-level-badge text-[11px] font-bold uppercase tracking-wider mb-4" style="background-color:var(--color-level-badge-bg);border:1px solid var(--color-level-badge-border);">
                        <i class="fa-solid fa-book-bookmark text-[10px]"></i> Jalur Pembelajaran
                    </div>
                    <h1 class="font-semibold text-3xl sm:text-4xl md:text-5xl mb-3 sm:mb-4 tracking-tight leading-tight">
                        <span class="text-level-title">Kuasai Python dari</span> <span class="text-level-accent">Nol sampai Mahir</span>
                    </h1>
                    <p class="text-base sm:text-lg text-level-desc leading-relaxed">
                        Kurikulum terstruktur yang dirancang untuk membimbingmu langkah demi langkah dalam dunia pemrograman.
                    </p>
                </div>
                
                <div class="bg-surface-1/50 backdrop-blur-xl rounded-[24px] sm:rounded-[32px] p-5 sm:p-6 md:p-8 w-full sm:min-w-[280px]" style="box-shadow:var(--shadow-level-card);border:1px solid var(--color-level-card-border);">
                    <div class="flex items-center justify-between mb-3 sm:mb-4">
                        <span class="text-xs sm:text-sm font-bold text-level-progress-title">Progres Belajar</span>
                        <span class="text-xl sm:text-2xl font-bold text-brand-green-light">{{ round($percent) }}%</span>
                    </div>
                    <div class="w-full h-2 sm:h-2.5 bg-ink-950 rounded-full overflow-hidden mb-3 sm:mb-4" style="box-shadow:var(--shadow-level-progress-bar);">
                        <div class="h-full bg-gradient-to-r from-brand-green to-brand-green-light rounded-full transition-all duration-1000" style="width:{{ $percent }}%;box-shadow:var(--shadow-level-progress-glow);"></div>
                    </div>
                    <div class="flex items-center justify-between text-[10px] sm:text-xs font-medium text-level-progress-stat">
                        <span>{{ $completed }} Level Selesai</span>
                        <span>{{ $totalLevel }} Total Level</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-[1100px] mx-auto px-7 pb-24">
        <div class="grid grid-cols-1 gap-5">
            @foreach($levels as $index => $level)
            @php
                $isCompleted = $level['status'] == 'completed';
                $isUnlocked  = $level['status'] == 'unlocked';
                $isLocked    = $level['status'] == 'locked';
                $levelPercent = $level['total'] > 0 ? ($level['correct'] / $level['total']) * 100 : 0;
                
                // Determine if this is the "Next Level" (first unlocked but not completed)
                $isNext = $isUnlocked && $level['answered'] == 0;
                $needsRead = $level['has_content'] && !$level['has_read'];
            @endphp

            <div class="level-card group relative @if($isLocked) opacity-60 grayscale-[0.5] @endif" 
                 @if(!$isLocked)
                 onclick="window.location.href='{{ $level['has_content'] ? route('material.show', $level['id']) : route('quiz.show', $level['id']) }}'"
                 @endif>
                
                <!-- Card Container -->
                <div class="relative bg-surface-1 rounded-[28px] p-1 transition-all duration-500 hover:scale-[1.01] cursor-pointer overflow-hidden" style="border:1px solid var(--color-level-card-border);">
                    
                    <!-- Gradient Hover Effect -->
                    <div class="absolute inset-0 bg-gradient-to-br @if($isCompleted) from-brand-green/5 @elseif($isUnlocked) from-level-accent-subtle @else from-white/2 @endif to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="relative flex flex-row items-stretch md:items-center gap-3 p-4 sm:p-6 md:p-8">
                        <!-- Desktop: Big level number icon (hidden on mobile) -->
                        <div class="hidden md:flex w-12 h-12 sm:w-16 sm:h-16 rounded-2xl flex-shrink-0 items-center justify-center relative overflow-hidden group-hover:scale-110 transition-transform duration-500">
                            @if($isLocked)
                                <div class="absolute inset-0 bg-white/5 backdrop-blur-md"></div>
                                <i class="fa-solid fa-lock text-text-muted text-2xl relative z-10"></i>
                            @else
                                <div class="absolute inset-0 @if($isCompleted) bg-brand-green @else bg-level-accent-bg @endif opacity-10"></div>
                                <span class="text-lg sm:text-2xl font-semibold @if($isCompleted) text-brand-green-light @else text-level-accent-text @endif relative z-10">
                                    {{ $level['order'] }}
                                </span>
                            @endif
                        </div>

                        <!-- Content (number + title inline on mobile) -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 sm:gap-3 mb-1.5 flex-wrap">
                                <!-- Mobile level number inline with title -->
                                @if($isLocked)
                                    <span class="md:hidden w-7 h-7 rounded-lg bg-white/5 flex items-center justify-center flex-shrink-0">
                                        <i class="fa-solid fa-lock text-text-muted text-xs"></i>
                                    </span>
                                @else
                                    <span class="md:hidden inline-flex items-center justify-center w-7 h-7 rounded-lg flex-shrink-0 @if($isCompleted) bg-brand-green/10 text-brand-green-light @else bg-level-accent-subtle text-level-accent-text @endif text-base font-bold">
                                        {{ $level['order'] }}
                                    </span>
                                @endif
                                <h3 class="text-base sm:text-xl font-bold tracking-tight text-level-title group-hover:text-level-accent-text transition-colors">{{ $level['name'] }}</h3>
                                
                                @if($isCompleted)
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-brand-green/10 text-brand-green text-[10px] font-bold uppercase tracking-widest border border-brand-green/20">
                                        <i class="fa-solid fa-check-circle mr-1.5"></i>Lulus
                                    </span>
                                @elseif($isUnlocked)
                                    @if($needsRead)
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-amber-500/10 text-amber-400 text-[10px] font-bold uppercase tracking-widest border border-amber-500/20 animate-pulse">
                                            <i class="fa-solid fa-book-open mr-1.5"></i>Baca Materi
                                        </span>
                                    @elseif($isNext)
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-amber-500/10 text-amber-400 text-[10px] font-bold uppercase tracking-widest border border-amber-500/20 animate-pulse">
                                            <i class="fa-solid fa-play-circle mr-1.5"></i>Mulai Sekarang
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-level-accent-subtle text-level-accent-text text-[10px] font-bold uppercase tracking-widest border border-level-accent-border">
                                            <i class="fa-solid fa-spinner mr-1.5 animate-spin-slow"></i>Sedang Berjalan
                                        </span>
                                    @endif
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-white/5 text-text-muted text-[10px] font-bold uppercase tracking-widest border border-white/5">
                                        <i class="fa-solid fa-lock mr-1.5"></i>Terkunci
                                    </span>
                                @endif
                            </div>
                            
                            <p class="text-sm sm:text-[15px] text-level-muted leading-relaxed max-w-2xl mb-4 sm:mb-5">
                                {{ $level['description'] }}
                            </p>

                            @if($isUnlocked || $isCompleted)
                            <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-8">
                                <div class="flex-1 max-w-xs sm:max-w-sm">
                                    <div class="flex items-center justify-between mb-1.5 sm:mb-2">
                                        <span class="text-[10px] sm:text-[11px] font-bold text-level-muted uppercase tracking-wider">Penguasaan Materi</span>
                                        <span class="text-[10px] sm:text-[11px] font-mono font-bold @if($isCompleted) text-brand-green-light @else text-level-accent-text @endif">{{ round($levelPercent) }}%</span>
                                    </div>
                                    <div class="w-full h-1 sm:h-1.5 bg-ink-950 rounded-full overflow-hidden">
                                        <div class="h-full @if($isCompleted) bg-brand-green @else bg-level-accent-bg @endif rounded-full transition-all duration-1000" style="width:{{ $levelPercent }}%"></div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3 sm:gap-4 text-xs font-medium">
                                    <div class="flex flex-col">
                                        <span class="text-level-muted mb-0.5">Soal</span>
                                        <span class="text-level-correct">{{ $level['correct'] }}<span class="text-level-muted">/{{ $level['total'] }}</span></span>
                                    </div>
                                    <div class="h-6 w-px bg-white/5"></div>
                                    @if($level['answered'] > 0)
                                    <div class="flex flex-col">
                                        <span class="text-level-muted mb-0.5">Skor</span>
                                        <span class="font-bold @if($level['score'] >= 80) text-brand-green @elseif($level['score'] >= 50) text-amber-400 @else text-brand-red @endif">
                                            {{ $level['score'] }}
                                        </span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- Action Button (centered vertically on mobile, centered on desktop) -->
                        <div class="flex-shrink-0 flex items-center self-stretch md:self-auto justify-center">
                            @if($isLocked)
                                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full border border-white/5 flex items-center justify-center text-text-muted">
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                            @else
                                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full @if($isCompleted) bg-brand-green/10 border-brand-green/20 text-brand-green @else bg-level-accent-bg border-level-accent-border text-white @endif border flex items-center justify-center group-hover:scale-110 transition-all duration-300">
                                    <i class="fa-solid @if($isCompleted) fa-check @else fa-arrow-right @endif"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .animate-spin-slow {
        animation: spin 3s linear infinite;
    }
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .level-card {
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    .level-card:hover {
        transform: translateY(-4px);
    }
</style>
@endsection

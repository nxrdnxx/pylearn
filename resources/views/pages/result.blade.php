@extends('layouts.app')

@section('title', 'Hasil Kuis')

@section('content')
<!-- Simplified Premium Navbar -->
<nav class="fixed top-0 left-0 right-0 z-[100] h-20 flex items-center px-7 bg-ink-950/80 backdrop-blur-xl border-b border-white/5">
    <div class="max-w-[1100px] mx-auto w-full flex items-center justify-between">
        <a href="{{ route('dashboard.index') }}" class="flex items-center gap-3 font-serif text-2xl text-white no-underline group">
            <div class="w-10 h-10 rounded-xl bg-brand-blue flex items-center justify-center group-hover:scale-110 transition-transform">
                <i class="fa-brands fa-python text-white"></i>
            </div>
            <span>Py<em class="italic text-brand-blue-light">Learn</em></span>
        </a>
        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard.index') }}" class="px-5 py-2.5 rounded-xl bg-white/5 text-white font-bold text-xs border border-white/10 hover:bg-white/10 transition-all">
                <i class="fa-solid fa-house mr-2 text-[10px]"></i>Dashboard
            </a>
        </div>
    </div>
</nav>

<div class="pt-28 min-h-screen bg-ink-950 overflow-hidden relative">
    <!-- Decorative Glows -->
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-full h-full max-w-[800px] pointer-events-none">
        <div class="absolute top-0 left-1/4 w-[400px] h-[400px] {{ $percentage >= 80 ? 'bg-brand-green/10' : 'bg-brand-red/10' }} blur-[120px] rounded-full"></div>
    </div>

    <div class="max-w-[500px] mx-auto px-7 py-14 text-center relative z-10">
        <!-- Result Header -->
        <div class="mb-12 animate-in fade-in slide-in-from-top-4 duration-700">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 text-[10px] font-bold text-text-muted uppercase tracking-widest mb-4">
                <i class="fa-solid fa-flag-checkered"></i> Level Selesai
            </div>
            <h1 class="font-serif text-4xl text-white mb-8 tracking-tight">{{ $levelName ?? 'Level ' . $levelId }}</h1>

            <div class="relative inline-block">
                <!-- Score Circle/Value -->
                <div class="relative z-10">
                    <div class="text-[120px] font-serif font-bold tracking-tighter leading-none {{ $percentage >= 80 ? 'text-brand-green-light drop-shadow-[0_0_30px_rgba(31,184,122,0.3)]' : 'text-brand-red drop-shadow-[0_0_30px_rgba(224,82,82,0.3)]' }}">
                        {{ $percentage }}
                    </div>
                    <div class="text-sm font-bold text-text-muted uppercase tracking-[0.3em] mt-2">Skor Akhir</div>
                </div>
            </div>
        </div>

        <!-- Status Badge -->
        <div class="mb-12 animate-in fade-in slide-in-from-bottom-4 duration-700 delay-200">
            <div class="inline-flex items-center px-6 py-3 rounded-2xl text-base font-bold {{ $percentage >= 80 ? 'bg-brand-green/10 text-brand-green border border-brand-green/20' : 'bg-brand-red/10 text-brand-red border border-brand-red/20' }}">
                <i class="fa-solid {{ $percentage >= 80 ? 'fa-medal' : 'fa-circle-xmark' }} mr-3 text-xl"></i>
                {{ $percentage >= 80 ? 'Selamat! Kamu Lulus' : 'Yah, Kamu Belum Lulus' }}
            </div>
            @if($percentage < 80)
                <p class="text-sm text-text-secondary mt-4 max-w-[280px] mx-auto leading-relaxed">Kamu butuh skor minimal <span class="text-white font-bold">80</span> untuk membuka tantangan berikutnya.</p>
            @endif
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-3 gap-4 mb-12 animate-in fade-in slide-in-from-bottom-4 duration-700 delay-400">
            <div class="bg-surface-1 rounded-[24px] border border-white/5 p-5 transition-all hover:border-white/10">
                <div class="text-2xl font-serif font-bold text-brand-amber mb-1">+{{ $xp }}</div>
                <div class="text-[9px] font-bold text-text-muted uppercase tracking-widest">XP Diraih</div>
            </div>
            <div class="bg-surface-1 rounded-[24px] border border-white/5 p-5 transition-all hover:border-white/10">
                <div class="text-2xl font-serif font-bold text-brand-green-light mb-1">{{ $correct }}</div>
                <div class="text-[9px] font-bold text-text-muted uppercase tracking-widest">Benar</div>
            </div>
            <div class="bg-surface-1 rounded-[24px] border border-white/5 p-5 transition-all hover:border-white/10">
                <div class="text-2xl font-serif font-bold text-brand-red mb-1">{{ $wrong }}</div>
                <div class="text-[9px] font-bold text-text-muted uppercase tracking-widest">Salah</div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col gap-4 animate-in fade-in slide-in-from-bottom-4 duration-700 delay-500">
            @if($percentage >= 80)
                @php
                    $currentLevel = \App\Models\Level::find($levelId);
                    $nextLevel = \App\Models\Level::where('order_number', '>', $currentLevel->order_number)
                        ->orderBy('order_number')
                        ->first();
                @endphp
                
                @if($nextLevel)
                    <a href="{{ route('quiz.show', $nextLevel->id) }}" class="w-full py-5 rounded-[24px] bg-brand-blue text-white font-bold text-lg hover:bg-brand-blue-light hover:shadow-[0_20px_40px_rgba(59,124,244,0.3)] hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
                        Lanjut ke Level {{ $nextLevel->order_number }} <i class="fa-solid fa-arrow-right"></i>
                    </a>
                @endif
            @else
                <a href="{{ route('quiz.show', ['level' => $levelId, 'q' => 1]) }}" class="w-full py-5 rounded-[24px] bg-brand-red text-white font-bold text-lg hover:bg-brand-red-light hover:shadow-[0_20px_40px_rgba(224,82,82,0.3)] hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
                    <i class="fa-solid fa-rotate"></i> Coba Lagi Sekarang
                </a>
            @endif
            
            <div class="grid grid-cols-2 gap-4 mt-2">
                <a href="{{ route('quiz.show', ['level' => $levelId, 'q' => 1]) }}" class="py-4 rounded-[20px] bg-white/5 text-white font-bold text-xs border border-white/10 hover:bg-white/10 transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-rotate"></i> Ulangi Kuis
                </a>
                <a href="{{ route('level.index') }}" class="py-4 rounded-[20px] bg-white/5 text-white font-bold text-xs border border-white/10 hover:bg-white/10 transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-layer-group"></i> Daftar Level
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .animate-in {
        animation: animate-in 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    .delay-200 { animation-delay: 0.2s; }
    .delay-400 { animation-delay: 0.4s; }
    .delay-500 { animation-delay: 0.5s; }
    
    @keyframes animate-in {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
@extends('layouts.app')

@section('title', 'Koleksi Badge')

@section('content')
<div class="pt-16 min-h-screen bg-ink-950">
    <!-- Premium Header -->
    <div class="relative overflow-hidden pt-12 pb-16">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full max-w-[1200px] pointer-events-none">
            <div class="absolute top-[-100px] right-[-100px] w-[400px] h-[400px] bg-brand-amber/10 blur-[120px] rounded-full"></div>
            <div class="absolute bottom-[-50px] left-[-100px] w-[300px] h-[300px] bg-brand-blue/10 blur-[100px] rounded-full"></div>
        </div>

        <div class="max-w-[1100px] mx-auto px-7 relative z-10">
            <div class="flex flex-col md:flex-row items-center md:items-end justify-between gap-8">
                <div class="text-center md:text-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider mb-4" style="background-color:var(--color-badge-accent-bg);border:1px solid var(--color-badge-accent-border);color:var(--color-badge-accent-text);">
                        <i class="fa-solid fa-medal text-[10px]"></i> Pencapaian Terkumpul
                    </div>
                    <h1 class="text-4xl md:text-5xl font-semibold mb-3 tracking-tight"><span style="color:var(--color-badge-title);">Koleksi </span><span style="color:var(--color-badge-accent-text);">Badge</span></h1>
                    <p class="text-lg max-w-xl" style="color:var(--color-badge-muted-text);">
                        Kumpulkan semua badge spesial sebagai bukti dedikasi dan keahlianmu dalam menguasai Python.
                    </p>
                </div>

                <div class="bg-surface-1/50 backdrop-blur-xl rounded-[24px] sm:rounded-[32px] p-5 sm:p-6 w-full sm:min-w-[240px]" style="border:1px solid var(--color-badge-card-border);box-shadow:var(--color-badge-card-shadow);">
                    <div class="flex items-center justify-between mb-3 px-1">
                        <span class="text-[10px] sm:text-xs font-bold uppercase tracking-widest" style="color:var(--color-badge-muted-text);">Progress Koleksi</span>
                        <span class="text-xs sm:text-sm font-semibold" style="color:var(--color-badge-title);">{{ $owned }}/{{ $total }}</span>
                    </div>
                    <div class="h-2 w-full bg-white/5 rounded-full overflow-hidden mb-2">
                        <div class="h-full bg-gradient-to-r from-brand-amber to-brand-amber-light rounded-full transition-all duration-1000" style="width:{{ $percent }}%;box-shadow:var(--color-badge-progress-glow);"></div>
                    </div>
                    <div class="text-[10px] text-center italic" style="color:var(--color-badge-muted-text);">Terus belajar untuk mendapatkan semuanya!</div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-[1100px] mx-auto px-7 pb-24">
        <!-- Section: Earned -->
        <div class="mb-12 sm:mb-14">
            <div class="flex items-center gap-3 mb-6 sm:mb-8 px-2">
                <div class="w-2 h-2 rounded-full" style="background-color:var(--color-badge-dot-bg);box-shadow:var(--color-badge-dot-glow);"></div>
                <h3 class="text-[10px] sm:text-xs font-bold uppercase tracking-[0.2em]" style="color:var(--color-badge-title);">Badge Yang Telah Diraih</h3>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 sm:gap-6">
                @forelse($earned as $badge)
                @php $color = $badge->color ?? '#3b7cf4'; @endphp
                <div class="group relative h-full">
                    <div class="absolute inset-0 rounded-[32px] blur-xl opacity-0 group-hover:opacity-20 transition-opacity duration-500" style="background: linear-gradient(135deg, {{ $color }}33, {{ $color }}1a);"></div>
                    <div class="relative h-full bg-surface-1 rounded-[24px] sm:rounded-[32px] p-4 sm:p-6 flex flex-col items-center text-center transition-all duration-500 hover:-translate-y-2" style="border:1px solid var(--color-badge-card-border);box-shadow:var(--color-badge-card-shadow);">
                        <div class="w-12 h-12 sm:w-16 sm:h-16 rounded-2xl flex items-center justify-center mb-3 sm:mb-4 group-hover:scale-110 transition-transform border border-white/5 flex-shrink-0" style="background: linear-gradient(135deg, {{ $color }}33, {{ $color }}1a);box-shadow:var(--color-badge-icon-shadow);">
                            <i class="{{ $badge->icon ?? 'fa-solid fa-medal' }} text-xl sm:text-2xl" style="color: {{ $color }}; filter: drop-shadow(0 0 6px {{ $color }}66);"></i>
                        </div>
                        <h4 class="text-xs sm:text-sm font-bold mb-1 sm:mb-2 group-hover:transition-colors flex-shrink-0" style="color:var(--color-badge-name);" onmouseenter="this.style.color='var(--color-badge-accent-text)'" onmouseleave="this.style.color='var(--color-badge-name)'">{{ $badge->name }}</h4>
                        <p class="text-[9px] sm:text-[10px] leading-relaxed line-clamp-2 flex-1 flex items-center justify-center" style="color:var(--color-badge-muted-text);">{{ $badge->description }}</p>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-10 sm:py-16 bg-surface-1/30 border border-dashed rounded-[32px] sm:rounded-[40px] text-center" style="border-color:var(--color-badge-card-border);">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 rounded-full bg-white/5 flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-medal text-lg sm:text-xl" style="color:var(--color-badge-muted-text);"></i>
                    </div>
                    <p class="text-xs sm:text-sm" style="color:var(--color-badge-muted-text);">Belum ada badge yang diraih. Selesaikan tantangan pertama kamu!</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Section: Locked -->
        <div>
            <div class="flex items-center gap-3 mb-6 sm:mb-8 px-2">
                <div class="w-2 h-2 rounded-full bg-white/20"></div>
                <h3 class="text-[10px] sm:text-xs font-bold uppercase tracking-[0.2em]" style="color:var(--color-badge-muted-text);">Masih Terkunci</h3>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 sm:gap-6">
                @foreach($locked as $badge)
                <div class="relative h-full bg-surface-1/30 rounded-[24px] sm:rounded-[32px] p-4 sm:p-6 flex flex-col items-center text-center opacity-60 filter grayscale" style="border:1px solid var(--color-badge-card-border);">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 rounded-2xl bg-white/5 flex items-center justify-center mb-3 sm:mb-4 border border-white/5 flex-shrink-0">
                        <i class="fa-solid fa-lock text-lg sm:text-xl" style="color:var(--color-badge-muted-text);"></i>
                    </div>
                    <h4 class="text-xs sm:text-sm font-bold mb-1 sm:mb-2 flex-shrink-0" style="color:var(--color-badge-name);opacity:0.6;">{{ $badge->name }}</h4>
                    <p class="text-[9px] sm:text-[10px] leading-relaxed flex-1 flex items-center justify-center" style="color:var(--color-badge-muted-text);opacity:0.6;">{{ $badge->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
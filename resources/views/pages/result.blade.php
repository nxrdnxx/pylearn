@extends('layouts.app')
@section('title', 'Result')

@section('content')
<nav class="fixed top-0 left-0 right-0 z-[100] h-14 flex items-center px-7 gap-1.5 bg-ink-950/80 backdrop-blur-xl border-b border-ink-700/14">
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-brand-blue/20 to-transparent"></div>
    <a href="{{ route('dashboard.index') }}" class="flex items-center gap-2.5 font-serif text-xl text-text-primary no-underline">
        <span class="font-serif text-xl">Py<em class="italic text-brand-blue-light">Learn</em></span>
    </a>
    <div class="ml-auto">
        <a href="{{ route('dashboard.index') }}" class="px-3 py-1.5 rounded-lg bg-transparent text-text-secondary font-medium text-xs border border-ink-700/26 hover:bg-surface-2 hover:text-text-primary hover:border-ink-700/40 transition-all duration-200">
            <i class="fa-solid fa-house mr-1.5"></i>Dashboard
        </a>
    </div>
</nav>

<div class="pt-16">
    <div class="max-w-[440px] mx-auto px-5 pt-14 pb-14 text-center">
        <div class="mb-4">
            <span class="text-sm text-text-secondary mb-2 font-medium inline-flex items-center">
                <i class="fa-solid fa-circle-check text-brand-green mr-1.5"></i>Level selesai
            </span>
            <h1 class="font-serif text-3xl tracking-tight mt-2">{{ $levelName ?? 'Level ' . $levelId }}</h1>
        </div>

        <div class="mb-9">
            <div class="font-serif text-[96px] tracking-tighter leading-none text-text-primary {{ $percentage >= 70 ? 'text-brand-green-light' : 'text-brand-red' }}">
                {{ $percentage }}
            </div>
            <div class="text-[15px] text-text-secondary mt-2 mb-4">dari {{ $maxScore }} poin</div>
            <span class="inline-flex items-center px-4 py-1.5 rounded-lg text-sm font-medium {{ $percentage >= 70 ? 'bg-brand-green/15 text-brand-green-light' : 'bg-brand-red/15 text-brand-red' }}">
                <i class="fa-solid {{ $percentage >= 70 ? 'fa-check' : 'fa-xmark' }} mr-1.5"></i>
                {{ $percentage >= 70 ? 'Lulus' : 'Tidak Lulus' }}
            </span>
        </div>

        <div class="grid grid-cols-3 gap-3 mb-7">
            <div class="bg-surface-1 rounded-xl border border-ink-700/14 p-4 text-center">
                <div class="text-[28px] font-bold font-mono text-brand-amber">+{{ $xp }}</div>
                <div class="text-xs text-text-secondary mt-1"><i class="fa-solid fa-bolt mr-1"></i>XP diraih</div>
            </div>
            <div class="bg-surface-1 rounded-xl border border-ink-700/14 p-4 text-center">
                <div class="text-[28px] font-bold font-mono text-brand-green-light">{{ $correct }}</div>
                <div class="text-xs text-text-secondary mt-1"><i class="fa-solid fa-check mr-1"></i>Benar</div>
            </div>
            <div class="bg-surface-1 rounded-xl border border-ink-700/14 p-4 text-center">
                <div class="text-[28px] font-bold font-mono text-brand-red">{{ $wrong }}</div>
                <div class="text-xs text-text-secondary mt-1"><i class="fa-solid fa-xmark mr-1"></i>Salah</div>
            </div>
        </div>

        <div class="flex flex-col gap-3">
            <a href="{{ route('quiz.show', ['level' => $levelId + 1, 'q' => 1]) }}" class="px-5 py-2.5 rounded-lg bg-brand-blue text-white font-medium text-base hover:bg-brand-blue-light hover:shadow-[0_4px_20px_rgba(59,124,244,0.4)] hover:-translate-y-0.5 transition-all duration-200">
                Lanjut ke Level {{ $levelId + 1 }} <i class="fa-solid fa-arrow-right ml-2"></i>
            </a>
            <div class="flex gap-3">
                <a href="{{ route('quiz.show', ['level' => $levelId, 'q' => 1]) }}" class="flex-1 px-3 py-1.5 rounded-lg bg-transparent text-text-secondary font-medium text-xs border border-ink-700/26 hover:bg-surface-2 hover:text-text-primary hover:border-ink-700/40 transition-all duration-200 flex items-center justify-center">
                    <i class="fa-solid fa-rotate mr-1.5"></i>Ulangi Quiz
                </a>
                <a href="{{ route('level.index') }}" class="flex-1 px-3 py-1.5 rounded-lg bg-transparent text-text-secondary font-medium text-xs border border-ink-700/26 hover:bg-surface-2 hover:text-text-primary hover:border-ink-700/40 transition-all duration-200 flex items-center justify-center">
                    <i class="fa-solid fa-layer-group mr-1.5"></i>Level
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', $level->name)

@section('content')
<div class="pt-16 min-h-screen bg-ink-950">
    <div class="relative overflow-hidden pt-12 pb-16">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full max-w-[1200px] pointer-events-none">
            <div class="absolute top-[-100px] left-[-100px] w-[400px] h-[400px] bg-brand-blue/10 blur-[120px] rounded-full"></div>
            <div class="absolute bottom-[-50px] right-[-100px] w-[300px] h-[300px] bg-brand-purple/10 blur-[100px] rounded-full"></div>
        </div>

        <div class="max-w-[860px] mx-auto px-7 relative z-10">
            <div class="flex items-center gap-3 mb-6">
                <a href="{{ route('level.index') }}" class="px-3 py-1.5 rounded-lg bg-white/5 text-text-secondary text-xs font-bold hover:bg-white/10 hover:text-white transition-all" style="border:1px solid var(--color-material-border);">
                    <i class="fa-solid fa-arrow-left mr-1.5"></i>Kembali
                </a>
                <div class="h-4 w-px" style="background-color:var(--color-material-border);"></div>
                <span class="text-[11px] font-bold text-text-muted uppercase tracking-widest">Level {{ $level->order_number }}</span>
            </div>

            <div class="mb-8 sm:mb-10">
                <div class="material-badge inline-flex items-center gap-2 px-3 py-1 rounded-full text-[10px] sm:text-[11px] font-bold uppercase tracking-wider mb-3 sm:mb-4">
                    <i class="fa-solid fa-book-open text-[10px]"></i> Materi Pembelajaran
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-semibold mb-2 sm:mb-3 tracking-tight leading-tight" style="color:var(--color-material-text);">{{ $level->name }}</h1>
                <p class="text-sm sm:text-[15px] text-text-secondary max-w-2xl">{{ $level->description }}</p>
            </div>

            <div class="space-y-[2px]">
                <div class="bg-surface-1/50 rounded-t-[24px] px-4 sm:px-6 md:px-10 py-3 sm:py-4 flex items-center gap-3" style="border:1px solid var(--color-material-border);">
                    <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-brand-blue/10 flex items-center justify-center">
                        <i class="fa-solid fa-book text-[10px] sm:text-xs" style="color:var(--color-material-accent);"></i>
                    </div>
                    <span class="text-xs sm:text-sm font-bold uppercase tracking-widest" style="color:var(--color-material-text);">Belajar Python</span>
                </div>
                <div class="bg-surface-1 rounded-b-[24px] md:rounded-b-[32px] px-4 sm:px-6 md:px-10 py-5 sm:py-6 md:py-10" style="border-left:1px solid var(--color-material-border);border-right:1px solid var(--color-material-border);border-bottom:1px solid var(--color-material-border);">
                    <div class="material-content">
                        {!! $content !!}
                    </div>
                </div>
            </div>

            <div class="mt-8 sm:mt-10 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 sm:gap-4">
                <a href="{{ route('level.index') }}" class="sm:flex-1 text-center px-5 sm:px-6 py-3 sm:py-4 rounded-2xl bg-surface-1 text-text-secondary font-bold text-[10px] sm:text-xs hover:bg-surface-2 hover:text-white transition-all" style="border:1px solid var(--color-material-border);">
                    <i class="fa-solid fa-arrow-left mr-1 sm:mr-2"></i>Kembali ke Level
                </a>
                <a href="{{ route('quiz.show', $level->id) }}" class="sm:flex-[2] text-center px-6 sm:px-8 py-3 sm:py-4 rounded-2xl font-bold text-[10px] sm:text-xs transition-all duration-300 active:scale-[0.97]" style="background-color:var(--color-material-accent);color:var(--color-material-text);">
                    Mulai Quiz <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.material-content {
    color: rgba(255,255,255,0.88);
    font-size: 1rem;
    line-height: 1.85;
}

.material-content h1 {
    font-size: 1.65rem;
    font-weight: 700;
    color: #fff;
    margin-top: 2.5rem;
    margin-bottom: 1rem;
    letter-spacing: -0.02em;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid rgba(255,255,255,0.06);
}
.material-content h1:first-child {
    margin-top: 0;
}
.material-content h2 {
    font-size: 1.35rem;
    font-weight: 700;
    color: #6b9ff7;
    margin-top: 2.25rem;
    margin-bottom: 0.75rem;
    letter-spacing: -0.01em;
}
.material-content h2:first-of-type {
    margin-top: 0;
}
.material-content h3 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #e2e8f0;
    margin-top: 1.75rem;
    margin-bottom: 0.5rem;
}
.material-content p {
    margin-bottom: 1rem;
    line-height: 1.85;
}
.material-content ul, .material-content ol {
    margin-bottom: 1.25rem;
    padding-left: 1.5rem;
}
.material-content li {
    margin-bottom: 0.4rem;
    line-height: 1.75;
}
.material-content li::marker {
    color: #6b9ff7;
}
.material-content pre {
    background: #04091a;
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 16px;
    padding: 1.25rem 1.5rem;
    margin: 1.25rem 0;
    overflow-x: auto;
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.85rem;
    line-height: 1.75;
    color: #7a9ad4;
    box-shadow: inset 0 2px 12px rgba(0,0,0,0.4);
    position: relative;
}
.material-content code {
    font-family: 'JetBrains Mono', monospace;
}
.material-content p code,
.material-content li code {
    background: rgba(59,124,244,0.1);
    border: 1px solid rgba(59,124,244,0.15);
    border-radius: 6px;
    padding: 0.15rem 0.45rem;
    font-size: 0.85rem;
    color: #6b9ff7;
    white-space: nowrap;
}
.material-content pre code {
    background: none;
    border: none;
    padding: 0;
    color: inherit;
    white-space: pre;
    font-size: inherit;
}
.material-content table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin: 1.25rem 0;
    font-size: 0.9rem;
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 12px;
    overflow: hidden;
}
.material-content th, .material-content td {
    padding: 0.75rem 1rem;
    text-align: left;
    border-bottom: 1px solid rgba(255,255,255,0.04);
}
.material-content th {
    background: rgba(59,124,244,0.08);
    color: #94a3b8;
    font-weight: 700;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}
.material-content td {
    color: rgba(255,255,255,0.82);
}
.material-content tr:last-child td {
    border-bottom: none;
}
.material-content strong {
    color: #fff;
    font-weight: 600;
}
.material-content em {
    color: #f5b84d;
    font-style: italic;
}
.material-content hr {
    border: none;
    border-top: 1px solid rgba(255,255,255,0.06);
    margin: 2rem 0;
}
.material-content blockquote {
    border-left: 3px solid #6b9ff7;
    padding: 0.75rem 1.25rem;
    margin: 1.25rem 0;
    background: rgba(59,124,244,0.04);
    border-radius: 0 12px 12px 0;
    color: rgba(255,255,255,0.75);
    font-style: italic;
}

[data-theme="light"] .material-content { color: #744317; }
[data-theme="light"] .material-content h2 { color: #EBB920; }
[data-theme="light"] .material-content h3 { color: #744317; }
[data-theme="light"] .material-content li::marker { color: #EBB920; }
[data-theme="light"] .material-content pre {
    color: #1e293b;
    background: #F1F5F9;
    box-shadow: none;
    border-color: #d1d5db;
}
[data-theme="light"] .material-content p code,
[data-theme="light"] .material-content li code {
    color: #EBB920;
    background: rgba(235,185,32,0.1);
    border-color: rgba(235,185,32,0.2);
}
[data-theme="light"] .material-content td { color: #744317; }
[data-theme="light"] .material-content th { color: #744317; }
[data-theme="light"] .material-content strong { color: #744317; }
[data-theme="light"] .material-content blockquote {
    color: #744317;
    border-left-color: #EBB920;
    background: rgba(235,185,32,0.05);
}
[data-theme="light"] .material-content em { color: #EBB920; }
[data-theme="light"] .material-content table { border-color: #d1d5db; }
[data-theme="light"] .material-content th,
[data-theme="light"] .material-content td { border-bottom-color: #d1d5db; }
[data-theme="light"] .material-content th { background: rgba(235,185,32,0.08); }
[data-theme="light"] .material-content hr { border-top-color: #d1d5db; }
[data-theme="light"] .material-content h1 { color: #744317; border-bottom-color: #d1d5db; }

.material-badge {
    background: rgba(59,124,244,0.1);
    border: 1px solid rgba(59,124,244,0.2);
    color: #6b9ff7;
}
[data-theme="light"] .material-badge {
    background: rgba(235,185,32,0.1);
    border: 1px solid rgba(235,185,32,0.2);
    color: #EBB920;
}
</style>
@endsection

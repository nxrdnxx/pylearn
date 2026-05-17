@extends('layouts.admin')

@section('header_title', 'Hasil Quiz')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h3 class="text-xl font-bold text-white">Log Aktivitas Quiz</h3>
        <p class="text-sm text-slate-500">Rekaman jawaban dan perolehan XP mahasiswa secara real-time</p>
    </div>
</div>

<div class="glass-card rounded-3xl overflow-hidden border border-white/5">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-white/5">
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Mahasiswa</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Materi & Soal</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Jawaban</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5 text-center">Status</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Reward</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5 text-right">Waktu</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @foreach($results as $result)
                <tr class="hover:bg-white/[0.02] transition-colors group">
                    <td class="px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-[10px] font-bold text-slate-300">
                                {{ strtoupper(substr($result->user->name, 0, 2)) }}
                            </div>
                            <div class="text-sm font-bold text-white group-hover:text-blue-400 transition-colors">{{ $result->user->name }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-5">
                        <div class="text-[10px] font-bold text-blue-500 uppercase tracking-widest mb-1">{{ $result->question->level->name ?? '-' }}</div>
                        <div class="text-xs text-slate-400 max-w-[200px] truncate">{{ $result->question->question_text }}</div>
                    </td>
                    <td class="px-6 py-5">
                        <code class="text-xs text-slate-300 font-mono bg-white/5 px-2 py-1 rounded truncate max-w-[150px] inline-block">{{ $result->user_answer }}</code>
                    </td>
                    <td class="px-6 py-5 text-center">
                        @if($result->is_correct)
                        <span class="inline-flex items-center px-2 py-1 rounded bg-emerald-500/10 text-emerald-400 text-[10px] font-bold uppercase tracking-widest border border-emerald-500/20">
                            BENAR
                        </span>
                        @else
                        <span class="inline-flex items-center px-2 py-1 rounded bg-red-500/10 text-red-400 text-[10px] font-bold uppercase tracking-widest border border-red-500/20">
                            SALAH
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-5">
                        <div class="flex items-center gap-1.5">
                            <i class="fas fa-bolt text-amber-400 text-[10px]"></i>
                            <span class="text-xs font-bold text-white">+{{ $result->xp_earned }} <span class="text-slate-500 font-normal">XP</span></span>
                        </div>
                    </td>
                    <td class="px-6 py-5 text-right">
                        <div class="text-xs text-slate-500 font-medium">{{ $result->created_at->diffForHumans() }}</div>
                        <div class="text-[10px] text-slate-600">{{ $result->created_at->format('H:i') }}</div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-8">
    {{ $results->links() }}
</div>

<style>
    /* Pagination Styling */
    .pagination {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
    }
    .page-item .page-link {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.05);
        color: #94a3b8;
        padding: 0.5rem 1rem;
        border-radius: 0.75rem;
        font-size: 0.875rem;
        font-weight: 600;
        transition: all 0.2s;
    }
    .page-item.active .page-link {
        background: #3b82f6;
        color: white;
        border-color: #3b82f6;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }
    .page-item:hover .page-link {
        background: rgba(255, 255, 255, 0.1);
        color: white;
    }
</style>
@endsection
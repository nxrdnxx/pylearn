@extends('layouts.app')

@section('content')
<div class="pt-16 min-h-screen" style="background: linear-gradient(135deg, #04091a 0%, #070f26 100%);">
    <div class="max-w-[1100px] mx-auto px-7 pt-10 pb-6">
        <div class="flex items-end justify-between gap-4 flex-wrap">
            <div class="flex flex-col gap-1">
                <span class="text-sm text-gray-400 font-medium">
                    <i class="fa-solid fa-hand-wave text-amber-400 mr-2 animate-pulse"></i>Halo, {{ $user->name ?? 'User' }}
                </span>
                <h1 class="font-serif text-[36px] tracking-tight leading-[1.15] text-white">Lanjutkan dimana kamu berhenti</h1>
            </div>
            <a href="{{ route('level.index') }}" class="px-5 py-2.5 rounded-lg bg-blue-500 text-white font-medium text-base hover:bg-blue-400 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200">
                <i class="fa-solid fa-play mr-2 text-xs"></i>Lanjutkan Belajar
            </a>
        </div>
    </div>

    <div class="max-w-[1100px] mx-auto px-7 pb-6">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3.5">
            <div class="bg-slate-900 rounded-xl border border-gray-800 p-4 hover:border-gray-700 hover:bg-gray-800 transition-all duration-200">
                <div class="w-10 h-10 rounded-xl bg-blue-500/20 flex items-center justify-center mb-3">
                    <i class="fa-solid fa-bolt text-blue-400 text-lg"></i>
                </div>
                <div class="text-3xl font-bold text-white font-serif tracking-tight">{{ number_format($xp) }}</div>
                <div class="text-xs text-gray-400 mt-1">Total XP</div>
            </div>
            
            <div class="bg-slate-900 rounded-xl border border-gray-800 p-4 hover:border-gray-700 hover:bg-gray-800 transition-all duration-200">
                <div class="w-10 h-10 rounded-xl bg-green-500/20 flex items-center justify-center mb-3">
                    <i class="fa-solid fa-layer-group text-green-400 text-lg"></i>
                </div>
                <div class="text-3xl font-bold text-white font-serif tracking-tight">{{ $completedLevel }}<span class="text-lg text-gray-400">/{{ $totalLevel }}</span></div>
                <div class="text-xs text-gray-400 mt-1">Level selesai</div>
                <div class="mt-3">
                    <div class="w-full bg-gray-800 rounded-full h-1.5 overflow-hidden">
                        <div class="h-full bg-green-500 rounded-full" style="width:{{ $totalLevel > 0 ? ($completedLevel/$totalLevel)*100 : 0 }}%"></div>
                    </div>
                </div>
            </div>
            
            <div class="bg-slate-900 rounded-xl border border-gray-800 p-4 hover:border-gray-700 hover:bg-gray-800 transition-all duration-200">
                <div class="w-10 h-10 rounded-xl bg-amber-500/20 flex items-center justify-center mb-3">
                    <i class="fa-solid fa-fire text-amber-400 text-lg"></i>
                </div>
                <div class="text-3xl font-bold text-white font-serif tracking-tight">{{ $streak }}</div>
                <div class="text-xs text-gray-400 mt-1">Hari streak</div>
            </div>
            
            <div class="bg-slate-900 rounded-xl border border-gray-800 p-4 hover:border-gray-700 hover:bg-gray-800 transition-all duration-200">
                <div class="w-10 h-10 rounded-xl bg-purple-500/20 flex items-center justify-center mb-3">
                    <i class="fa-solid fa-medal text-purple-400 text-lg"></i>
                </div>
                <div class="text-3xl font-bold text-white font-serif tracking-tight">{{ $badgeCount }}</div>
                <div class="text-xs text-gray-400 mt-1">Badge diraih</div>
                <div class="mt-2 text-xs text-gray-500">
                    <i class="fa-solid fa-box-open text-purple-500 mr-1"></i>24 tersedia
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-[1100px] mx-auto px-7 pb-14 grid grid-cols-1 lg:grid-cols-[1fr_320px] gap-6 items-start">
        <div class="flex flex-col gap-5">
            @if($currentLevel && $currentLevel->id)
            <div class="bg-slate-800 rounded-2xl border border-gray-700 p-6 hover:border-gray-600 transition-all duration-300">
                <div class="flex justify-between items-start mb-5">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-blue-500/15 text-blue-400 text-xs font-medium">
                                <i class="fa-solid fa-book-open mr-1"></i>Level {{ $currentLevel->order_number }}
                            </span>
                            <span class="text-xs text-gray-500">Sedang berjalan</span>
                        </div>
                        <div class="text-xl font-semibold text-white">{{ $currentLevel->name }}</div>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold text-blue-400">{{ round($currentProgress) }}%</div>
                        <div class="text-xs text-gray-500">progres</div>
                    </div>
                </div>
                <div class="w-full h-2 bg-slate-900 rounded-full overflow-hidden mb-5">
                    <div class="h-full bg-blue-500 rounded-full transition-all duration-500" style="width:{{ $currentProgress }}%"></div>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-400">
                        <i class="fa-solid fa-check-double mr-1 text-green-400"></i>
                        {{ $currentAnswered }} dari {{ $currentTotal }} soal dijawab
                    </span>
                    <a href="{{ route('quiz.show', $currentLevel->id) }}" class="px-3 py-1.5 rounded-lg bg-blue-500 text-white font-medium text-xs hover:bg-blue-400 transition-all">
                        Lanjutkan <i class="fa-solid fa-arrow-right ml-1.5 text-xs"></i>
                    </a>
                </div>
            </div>
            @else
            <div class="bg-slate-800 rounded-3xl border border-gray-700 p-12 text-center shadow-2xl relative overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-b from-green-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="relative w-24 h-24 mx-auto mb-6">
                    <div class="w-full h-full rounded-full bg-green-500/20 flex items-center justify-center border-2 border-green-500/30 group-hover:border-green-500/50 shadow-[0_0_30px_rgba(34,197,94,0.15)] transition-all duration-500 animate-bounce-subtle">
                        <i class="fa-solid fa-thumbs-up text-green-400 text-[42px]"></i>
                    </div>
                </div>
                <div class="text-xl font-semibold text-white mb-2">Semua level sudah selesai!</div>
                <p class="text-sm text-gray-400 mb-4">Mantap! Kamu sudah menamatkan semua materi.</p>
                <a href="{{ route('level.index') }}" class="px-3 py-1.5 rounded-lg text-gray-400 text-xs border border-gray-700 hover:bg-gray-700 transition-all inline-flex">
                    <i class="fa-solid fa-rotate-right mr-2"></i>Coba Lagi
                </a>
            </div>
            @endif

            <div class="bg-slate-900 rounded-xl border border-gray-800 p-5">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold text-white"><i class="fa-solid fa-clock-rotate-left mr-2"></i>Aktivitas terbaru</h3>
                    @if($recentActivities->isNotEmpty())
                    <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($recentActivities->first()['date'])->diffForHumans() }}</span>
                    @endif
                </div>
                <div class="flex flex-col">
                    @forelse($recentActivities as $activity)
                    <div class="flex items-center gap-3.5 py-3.5 {{ !$loop->last ? 'border-b border-gray-800' : '' }}">
                        <div class="w-2 h-2 rounded-full {{ $activity['type'] === 'level' ? 'bg-green-500' : 'bg-amber-500' }} flex-shrink-0"></div>
                        <div class="flex-1">
                            <span class="text-sm font-medium text-white">{{ $activity['title'] }}</span>
                            <span class="text-xs text-gray-400 mt-0.5 block">{{ $activity['subtitle'] }}</span>
                        </div>
                        @if($activity['type'] === 'level')
                        <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-green-500/15 text-green-400 text-xs font-medium">
                            <i class="fa-solid fa-bolt mr-1"></i>+{{ $activity['xp'] }} XP
                        </span>
                        @else
                        <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-amber-500/15 text-amber-400 text-xs font-medium">
                            <i class="fa-solid fa-medal mr-1"></i>Badge
                        </span>
                        @endif
                    </div>
                    @empty
                    <div class="py-4 text-center text-gray-500 text-sm">Belum ada aktivitas</div>
                    @endforelse
                </div>
            </div>

            <div class="grid grid-cols-3 gap-3">
                <a href="{{ route('level.index') }}" class="bg-slate-900 rounded-xl border border-gray-800 p-4 flex items-center gap-3 hover:border-gray-700 hover:bg-gray-800 transition-all cursor-pointer">
                    <div class="w-10 h-10 rounded-lg bg-blue-500/20 flex items-center justify-center">
                        <i class="fa-solid fa-layer-group text-blue-400"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold text-white">Level</span>
                        <span class="text-xs text-gray-400">{{ $completedLevel }}/{{ $totalLevel }} selesai</span>
                    </div>
                </a>
                <a href="{{ route('leaderboard.index') }}" class="bg-slate-900 rounded-xl border border-gray-800 p-4 flex items-center gap-3 hover:border-gray-700 hover:bg-gray-800 transition-all cursor-pointer">
                    <div class="w-10 h-10 rounded-lg bg-amber-500/20 flex items-center justify-center">
                        <i class="fa-solid fa-trophy text-amber-400"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold text-white">Leaderboard</span>
                        <span class="text-xs text-gray-400">Posisi #{{ $rank }}</span>
                    </div>
                </a>
                <a href="{{ route('profile.index') }}" class="bg-slate-900 rounded-xl border border-gray-800 p-4 flex items-center gap-3 hover:border-gray-700 hover:bg-gray-800 transition-all cursor-pointer">
                    <div class="w-10 h-10 rounded-lg bg-purple-500/20 flex items-center justify-center">
                        <i class="fa-solid fa-user text-purple-400"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold text-white">Profil</span>
                        <span class="text-xs text-gray-400">Statistikmu</span>
                    </div>
                </a>
            </div>
        </div>

        <div class="flex flex-col gap-5">
            <div class="bg-slate-900 rounded-xl border border-gray-800 p-5">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold text-white"><i class="fa-solid fa-chart-column mr-2"></i>XP minggu ini</h3>
                    <span class="text-xs text-amber-400 font-medium">{{ number_format($totalWeeklyXp) }} XP</span>
                </div>
                <div class="flex items-end gap-1.5 h-24">
                    @php $days = ['Sen','Sel','Rab','Kam','Jum','Sab','Min']; @endphp
                    @foreach($days as $i => $day)
                    <div class="flex flex-col items-center gap-1 flex-1 group">
                        <div class="w-full rounded-t-lg transition-all duration-300 {{ $heights[$i] > 0 ? 'bg-blue-500' : 'bg-blue-500/20' }}" style="height:{{ $heights[$i] > 0 ? $heights[$i] : 5 }}%"></div>
                        <span class="text-[10px] text-gray-500">{{ $day }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-slate-900 rounded-xl border border-gray-800 p-5">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold text-white"><i class="fa-solid fa-ranking-star mr-2"></i>Top pelajar</h3>
                </div>
                <div class="flex flex-col">
                    @foreach($topUsers as $i => $u)
                    <div class="flex items-center gap-3 py-2.5 {{ !$loop->last ? 'border-b border-gray-800' : '' }}">
                        <span class="w-6 text-center text-sm font-mono {{ $i == 0 ? 'text-yellow-400' : ($i == 1 ? 'text-gray-400' : ($i == 2 ? 'text-orange-500' : 'text-gray-500')) }}">
                            @if($i == 0)<i class="fa-solid fa-crown"></i>@else{{ $i + 1 }}@endif
                        </span>
                        <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-600 to-blue-500 flex items-center justify-center text-xs font-semibold text-white flex-shrink-0">
                            {{ strtoupper(substr($u->name,0,2)) }}
                        </div>
                        <span class="flex-1 text-sm font-medium text-white truncate">{{ $u->id == auth()->id() ? 'Kamu' : $u->name }}</span>
                        <span class="text-sm font-semibold text-amber-400 font-mono">{{ number_format($u->xp) }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-slate-900 rounded-xl border border-gray-800 p-5">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold text-white"><i class="fa-solid fa-medal mr-2 text-purple-400"></i>Badge terbaru</h3>
                    <a href="{{ route('profile.index') }}" class="text-[11px] text-gray-500 hover:text-purple-400 transition-colors">Lihat semua</a>
                </div>
                <div class="flex flex-col gap-3">
                    @forelse($recentBadges->take(3) as $ub)
                    @php
                        $badgeTheme = [
                            'First Blood' => ['bg' => 'from-red-600/20 to-red-500/10', 'icon' => 'text-red-400', 'glow' => 'rgba(239, 68, 68, 0.3)'],
                            'Diamond Collector' => ['bg' => 'from-blue-600/20 to-blue-500/10', 'icon' => 'text-blue-400', 'glow' => 'rgba(59, 130, 246, 0.3)'],
                            'Streak Starter' => ['bg' => 'from-orange-600/20 to-orange-500/10', 'icon' => 'text-orange-400', 'glow' => 'rgba(249, 115, 22, 0.3)'],
                            'Python King' => ['bg' => 'from-amber-600/20 to-amber-500/10', 'icon' => 'text-amber-400', 'glow' => 'rgba(245, 158, 11, 0.3)'],
                            'Night Owl' => ['bg' => 'from-indigo-600/20 to-indigo-500/10', 'icon' => 'text-indigo-400', 'glow' => 'rgba(99, 102, 241, 0.3)'],
                            'Quiz Master' => ['bg' => 'from-emerald-600/20 to-emerald-500/10', 'icon' => 'text-emerald-400', 'glow' => 'rgba(16, 185, 129, 0.3)'],
                            'Early Bird' => ['bg' => 'from-yellow-600/20 to-orange-500/10', 'icon' => 'text-yellow-400', 'glow' => 'rgba(251, 191, 36, 0.3)'],
                            'Consistent Coder' => ['bg' => 'from-cyan-600/20 to-blue-500/10', 'icon' => 'text-cyan-400', 'glow' => 'rgba(34, 211, 238, 0.3)'],
                            'Problem Solver' => ['bg' => 'from-purple-600/20 to-pink-500/10', 'icon' => 'text-purple-400', 'glow' => 'rgba(192, 38, 211, 0.3)'],
                        ][$ub->badge->name] ?? ['bg' => 'from-brand-blue/20 to-brand-blue/10', 'icon' => 'text-brand-blue-light', 'glow' => 'rgba(59, 130, 246, 0.3)'];
                    @endphp
                    <div class="flex items-center gap-3.5 p-3 rounded-xl bg-slate-800/40 border border-gray-800/40 hover:bg-slate-800 hover:border-gray-700 transition-all group">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br {{ $badgeTheme['bg'] }} flex items-center justify-center border border-white/5 shadow-xl group-hover:scale-105 transition-all duration-300">
                            <i class="{{ $ub->badge->icon ?? 'fa-solid fa-medal' }} {{ $badgeTheme['icon'] }} text-xl drop-shadow-[0_0_8px_{{ $badgeTheme['glow'] }}]"></i>
                        </div>
                        <div class="flex flex-col overflow-hidden">
                            <span class="text-sm font-bold text-white truncate group-hover:{{ $badgeTheme['icon'] }} transition-colors">{{ $ub->badge->name }}</span>
                            <span class="text-[11px] text-gray-500 font-medium">{{ optional($ub->earned_at)->diffForHumans() ?? 'Baru saja' }}</span>
                        </div>
                    </div>
                    @empty
                    <div class="py-4 text-center text-gray-500 text-sm italic">Belum ada badge baru</div>
                    @endforelse
                </div>
            </div>

            <div class="bg-slate-900 rounded-xl border border-gray-800 p-5">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex flex-col gap-1">
                        <h3 class="text-sm font-semibold text-white"><i class="fa-solid fa-star mr-2 text-amber-400"></i>Daily Quest</h3>
                        <div class="flex gap-1.5 mt-1">
                            @for($i = 1; $i <= 5; $i++)
                                <div class="h-1.5 w-6 rounded-full {{ $i < ($dailyQuest ? $dailyQuest->current_step : 1) ? 'bg-green-500' : ($i == ($dailyQuest ? $dailyQuest->current_step : 1) && (!$dailyQuest || !$dailyQuest->completed) ? 'bg-amber-400 animate-pulse' : 'bg-gray-800') }}"></div>
                            @endfor
                        </div>
                    </div>
                    @if($dailyQuest && $dailyQuest->completed && $dailyQuest->current_step == $dailyQuest->total_steps)
                    <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-green-500/15 text-green-400 text-[10px] font-bold uppercase tracking-wider">
                        <i class="fa-solid fa-check mr-1"></i>Selesai
                    </span>
                    @endif
                </div>
                
                @if($dailyQuest && $dailyQuest->question)
                <div class="mb-3">
                    @if(session('quest_result'))
                        {{-- Result of the just submitted question --}}
                        <div class="p-4 rounded-xl mb-5 {{ session('is_correct') ? 'bg-green-500/10 border border-green-500/20' : 'bg-red-500/10 border border-red-500/20' }} animate-in fade-in slide-in-from-top-4 duration-500">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-8 h-8 rounded-full {{ session('is_correct') ? 'bg-green-500/20' : 'bg-red-500/20' }} flex items-center justify-center">
                                    <i class="fa-solid {{ session('is_correct') ? 'fa-check text-green-400' : 'fa-xmark text-red-400' }}"></i>
                                </div>
                                <span class="text-sm font-bold {{ session('is_correct') ? 'text-green-400' : 'text-red-400' }}">
                                    {{ session('is_correct') ? 'Jawaban Benar!' : 'Jawaban Salah' }}
                                </span>
                            </div>
                            @if(!session('is_correct'))
                            <p class="text-[11px] text-gray-400 mb-2">Jawaban yang benar: <span class="text-green-400 font-mono">{{ session('correct_answer') }}</span></p>
                            @endif
                            <div class="flex items-center justify-between">
                                <span class="text-[11px] text-amber-400 font-bold">+{{ session('xp_earned') }} XP</span>
                                @if(!$dailyQuest->completed || $dailyQuest->current_step < $dailyQuest->total_steps)
                                <a href="{{ route('dashboard.index') }}" class="text-[11px] font-bold text-white bg-white/10 px-3 py-1.5 rounded-lg hover:bg-white/20 transition-all">Soal Berikutnya <i class="fa-solid fa-arrow-right ml-1"></i></a>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if(!$dailyQuest->completed)
                        <p class="text-sm text-gray-200 mb-4 font-medium leading-relaxed">{{ $dailyQuest->question->question_text }}</p>
                        
                        @if($dailyQuest->question->code_snippet)
                        <div class="bg-slate-950 rounded-xl p-4 font-mono text-[11px] text-blue-300 mb-4 border border-white/5 overflow-x-auto shadow-inner">
                            <pre>{{ $dailyQuest->question->code_snippet }}</pre>
                        </div>
                        @endif
                        
                        <form method="POST" action="{{ route('daily-quest.submit') }}">
                            @csrf
                            <input type="hidden" name="quest_id" value="{{ $dailyQuest->id }}">
                            
                            @if($dailyQuest->question->options)
                                @php
                                    $options = json_decode($dailyQuest->question->options, true);
                                @endphp
                                <div class="flex flex-col gap-2.5 mb-2">
                                    @foreach($options as $opt)
                                        <button type="submit" name="answer" value="{{ $opt }}" class="text-left flex items-center gap-3 p-3.5 rounded-xl border border-gray-800 bg-slate-800/30 hover:border-brand-blue/50 hover:bg-slate-800 hover:scale-[1.02] transition-all duration-200 group relative overflow-hidden">
                                            <div class="absolute inset-0 bg-brand-blue/5 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-300"></div>
                                            <span class="text-sm text-gray-400 group-hover:text-white transition-colors relative z-10">{{ $opt }}</span>
                                        </button>
                                    @endforeach
                                </div>
                            @else
                                <input type="text" name="answer" required placeholder="Ketik jawaban kamu..." 
                                    class="w-full bg-slate-800 border border-gray-700 rounded-xl px-4 py-3.5 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-brand-blue mb-4 transition-all">
                                <button type="submit" class="w-full py-3.5 rounded-xl bg-brand-blue text-white text-sm font-bold hover:bg-brand-blue-light hover:shadow-[0_0_20px_rgba(59,124,244,0.3)] transition-all active:scale-[0.98]">
                                    Kirim Jawaban
                                </button>
                            @endif
                        </form>
                    @elseif($dailyQuest->current_step == $dailyQuest->total_steps && !session('quest_result'))
                        <div class="text-center py-8">
                            <div class="w-16 h-16 bg-green-500/10 rounded-full flex items-center justify-center mx-auto mb-5">
                                <i class="fa-solid fa-calendar-check text-green-400 text-2xl"></i>
                            </div>
                            <h4 class="text-white font-bold mb-1">Quest Hari Ini Selesai!</h4>
                            <p class="text-xs text-gray-500 mb-6">Kamu telah menyelesaikan 5 soal hari ini. Bagus!</p>
                            <div class="inline-flex items-center px-4 py-2 rounded-xl bg-slate-800/50 border border-gray-700 text-xs text-gray-300">
                                <i class="fa-solid fa-bolt text-amber-400 mr-2"></i> Total: <span class="text-white font-bold ml-1">{{ $dailyQuest->all_quests->sum('xp_earned') }} XP</span>
                            </div>
                        </div>
                    @endif
                </div>
                @else
                <div class="py-12 text-center">
                    <div class="w-12 h-12 bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-clock-rotate-left text-gray-600"></i>
                    </div>
                    <p class="text-sm text-gray-500">Quest belum tersedia untuk saat ini.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes bounce-subtle {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-4px); }
    }
    .animate-bounce-subtle {
        animation: bounce-subtle 2s infinite ease-in-out;
    }
</style>
@endsectioninite ease-in-out;
    }
</style>
@endsection
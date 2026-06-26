@extends('layouts.app')

@section('content')
<div class="pt-16 min-h-screen" style="background: var(--gradient-page);">
    <div class="max-w-[1100px] mx-auto px-7 pt-10 pb-6">
        <div class="flex items-end justify-between gap-4 flex-wrap">
            <div class="flex flex-col gap-1">
                <span class="text-sm text-gray-400 font-medium">
                    <i class="fa-solid fa-hand-wave text-amber-400 mr-2 animate-pulse"></i>Halo, {{ $user->name ?? 'User' }}
                </span>
                <h1 class="text-2xl sm:text-3xl lg:text-[36px] font-semibold text-content leading-tight">{{ $hasActivity ? 'Lanjutkan dimana kamu berhenti' : 'Ayo mulai belajar sekarang' }}</h1>
            </div>
            <a href="{{ route('level.index') }}" class="px-5 py-2.5 rounded-lg btn-primary font-medium text-base hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200">
                <i class="fa-solid fa-play mr-2 text-xs"></i>{{ $hasActivity ? 'Lanjutkan Belajar' : 'Mulai Sekarang' }}
            </a>
        </div>
    </div>

    <div class="max-w-[1100px] mx-auto px-7 pb-6">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-3.5">
            <div class="bg-content rounded-xl border border-content p-3 sm:p-4 hover:border-hover hover:bg-hover transition-all duration-200 relative overflow-hidden">
                <i class="fa-solid fa-bolt" style="position:absolute;bottom:-10px;right:-10px;font-size:5rem;color:#60a5fa;opacity:var(--card-icon-opacity);pointer-events:none;"></i>
                <div class="relative" style="z-index:1;">
                    <div class="text-base sm:text-xl font-semibold text-content">{{ number_format($xp) }}</div>
                    <div class="text-[10px] sm:text-xs text-gray-400 mt-1">Total XP</div>
                </div>
            </div>
            
            <div class="bg-content rounded-xl border border-content p-3 sm:p-4 hover:border-hover hover:bg-hover transition-all duration-200 relative overflow-hidden">
                <i class="fa-solid fa-layer-group" style="position:absolute;bottom:-10px;right:-10px;font-size:5rem;color:#4ade80;opacity:var(--card-icon-opacity);pointer-events:none;"></i>
                <div class="relative" style="z-index:1;">
                    <div class="text-base sm:text-xl font-semibold text-content">{{ $completedLevel }}<span class="text-sm sm:text-lg text-gray-400">/{{ $totalLevel }}</span></div>
                    <div class="text-[10px] sm:text-xs text-gray-400 mt-1">Level selesai</div>
                    <div class="mt-2 sm:mt-3">
                        <div class="w-full bg-gray-800 rounded-full h-1.5 overflow-hidden">
                            <div class="h-full bg-green-500 rounded-full" style="width:{{ $totalLevel > 0 ? ($completedLevel/$totalLevel)*100 : 0 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-content rounded-xl border border-content p-3 sm:p-4 hover:border-hover hover:bg-hover transition-all duration-200 relative overflow-hidden">
                <i class="fa-solid fa-fire" style="position:absolute;bottom:-10px;right:-10px;font-size:5rem;color:#fbbf24;opacity:var(--card-icon-opacity);pointer-events:none;"></i>
                <div class="relative" style="z-index:1;">
                    <div class="text-base sm:text-xl font-semibold text-content">{{ $streak }}</div>
                    <div class="text-[10px] sm:text-xs text-gray-400 mt-1">Hari streak</div>
                </div>
            </div>
            
            <div class="bg-content rounded-xl border border-content p-3 sm:p-4 hover:border-hover hover:bg-hover transition-all duration-200 relative overflow-hidden">
                <i class="fa-solid fa-medal" style="position:absolute;bottom:-10px;right:-10px;font-size:5rem;color:#c084fc;opacity:var(--card-icon-opacity);pointer-events:none;"></i>
                <div class="relative" style="z-index:1;">
                    <div class="text-base sm:text-xl font-semibold text-content">{{ $badgeCount }}</div>
                    <div class="text-[10px] sm:text-xs text-gray-400 mt-1">Badge diraih</div>
                    <div class="mt-2 text-[10px] sm:text-xs text-gray-500">
                        <i class="fa-solid fa-box-open text-purple-500 mr-1"></i>9 tersedia
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-[1100px] mx-auto px-7 pb-14 grid grid-cols-1 lg:grid-cols-[1fr_320px] gap-6 items-start">
        <div class="flex flex-col gap-5">
            @if($currentLevel && $currentLevel->id)
            <div class="bg-content rounded-2xl border border-content p-4 sm:p-6 hover:border-hover transition-all duration-300">
                <div class="flex justify-between items-start mb-4 sm:mb-5 gap-3">
                    <div class="min-w-0">
                        <div class="flex items-center gap-2 mb-2 flex-wrap">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-blue-500/15 text-blue-400 text-[10px] sm:text-xs font-medium">
                                <i class="fa-solid fa-book-open mr-1"></i>Level {{ $currentLevel->order_number }}
                            </span>
                            <span class="text-[10px] sm:text-xs text-gray-500">{{ $currentAnswered == 0 ? 'Belum dimulai' : 'Sedang berjalan' }}</span>
                        </div>
                        <div class="text-base sm:text-xl font-semibold text-content truncate">{{ $currentLevel->name }}</div>
                    </div>
                    <div class="text-right flex-shrink-0">
                        <div class="text-2xl sm:text-3xl font-bold text-blue-400">{{ round($currentProgress) }}%</div>
                        <div class="text-[10px] sm:text-xs text-gray-500">progres</div>
                    </div>
                </div>
                <div class="w-full h-2 bg-content rounded-full overflow-hidden mb-4 sm:mb-5">
                    <div class="h-full bg-blue-500 rounded-full transition-all duration-500" style="width:{{ $currentProgress }}%"></div>
                </div>
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                    <span class="text-xs sm:text-sm text-gray-400">
                        {{ $currentAnswered }} dari {{ $currentTotal }} soal dijawab
                    </span>
                    <a href="{{ route('quiz.show', $currentLevel->id) }}" class="w-full sm:w-auto text-center px-3 py-1.5 rounded-lg btn-primary font-medium text-xs transition-all">
                        {{ $currentAnswered == 0 ? 'Mulai' : 'Lanjutkan' }} <i class="fa-solid fa-arrow-right ml-1.5 text-xs"></i>
                    </a>
                </div>
            </div>
            @else
            <div class="bg-content rounded-3xl border border-content p-6 sm:p-12 text-center relative overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-b from-green-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="relative w-20 h-20 sm:w-24 sm:h-24 mx-auto mb-4 sm:mb-6">
                    <div class="w-full h-full rounded-full bg-green-500/20 flex items-center justify-center border-2 border-green-500/30 group-hover:border-green-500/50 shadow-[0_0_30px_rgba(34,197,94,0.15)] transition-all duration-500 animate-bounce-subtle">
                        <i class="fa-solid fa-thumbs-up text-green-400 text-3xl sm:text-[42px]"></i>
                    </div>
                </div>
                <div class="text-lg sm:text-xl font-semibold text-content mb-2">Semua level sudah selesai!</div>
                <p class="text-sm text-gray-400">Mantap! Kamu sudah menamatkan semua materi.</p>
            </div>
            @endif

            <div class="bg-content rounded-xl border border-content p-4 sm:p-5">
                <div class="flex items-center justify-between mb-4 gap-2">
                    <h3 class="text-xs sm:text-sm font-semibold text-content"><i class="fa-solid fa-clock-rotate-left mr-2"></i>Aktivitas terbaru</h3>
                    @if($recentActivities->isNotEmpty())
                    <span class="text-[10px] sm:text-xs text-gray-500 whitespace-nowrap">{{ \Carbon\Carbon::parse($recentActivities->first()['date'])->diffForHumans() }}</span>
                    @endif
                </div>
                <div class="flex flex-col">
                    @forelse($recentActivities as $activity)
                    <div class="flex items-center gap-2 sm:gap-3.5 py-2.5 sm:py-3.5 {{ !$loop->last ? 'border-b border-content' : '' }}">
                        <div class="w-2 h-2 rounded-full {{ $activity['type'] === 'level' ? 'bg-green-500' : 'bg-amber-500' }} flex-shrink-0"></div>
                        <div class="flex-1 min-w-0">
                            <span class="text-xs sm:text-sm font-medium text-content truncate block">{{ $activity['title'] }}</span>
                            <span class="text-[10px] sm:text-xs text-gray-400 mt-0.5 block truncate">{{ $activity['subtitle'] }}</span>
                        </div>
                        @if($activity['type'] === 'level')
                        <span class="inline-flex items-center px-1.5 sm:px-2 py-0.5 rounded-md bg-green-500/15 text-green-400 text-[10px] sm:text-xs font-medium whitespace-nowrap">
                            <i class="fa-solid fa-bolt mr-1"></i>+{{ $activity['xp'] }} XP
                        </span>
                        @else
                        <span class="inline-flex items-center px-1.5 sm:px-2 py-0.5 rounded-md bg-amber-500/15 text-amber-400 text-[10px] sm:text-xs font-medium whitespace-nowrap">
                            <i class="fa-solid fa-medal mr-1"></i>Badge
                        </span>
                        @endif
                    </div>
                    @empty
                    <div class="py-4 text-center text-gray-500 text-sm">Belum ada aktivitas</div>
                    @endforelse
                </div>
            </div>

            <div class="grid grid-cols-3 gap-2 sm:gap-3.5">
                <a href="{{ route('level.index') }}" class="bg-content rounded-xl border border-content p-3 sm:p-4 flex items-center gap-2 sm:gap-3 hover:border-hover hover:bg-hover transition-all cursor-pointer">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-lg bg-blue-500/20 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-layer-group text-blue-400 text-sm sm:text-base"></i>
                    </div>
                    <div class="flex flex-col min-w-0">
                        <span class="text-[10px] sm:text-sm font-semibold text-content truncate">Level</span>
                        <span class="text-[8px] sm:text-xs text-gray-400 truncate">{{ $completedLevel }}/{{ $totalLevel }} selesai</span>
                    </div>
                </a>
                <a href="{{ route('leaderboard.index') }}" class="bg-content rounded-xl border border-content p-3 sm:p-4 flex items-center gap-2 sm:gap-3 hover:border-hover hover:bg-hover transition-all cursor-pointer">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-lg bg-amber-500/20 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-trophy text-amber-400 text-sm sm:text-base"></i>
                    </div>
                    <div class="flex flex-col min-w-0">
                        <span class="text-[10px] sm:text-sm font-semibold text-content truncate">Leaderboard</span>
                        <span class="text-[8px] sm:text-xs text-gray-400 truncate">Posisi #{{ $rank }}</span>
                    </div>
                </a>
                <a href="{{ route('profile.index') }}" class="bg-content rounded-xl border border-content p-3 sm:p-4 flex items-center gap-2 sm:gap-3 hover:border-hover hover:bg-hover transition-all cursor-pointer">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-lg bg-purple-500/20 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-user text-purple-400 text-sm sm:text-base"></i>
                    </div>
                    <div class="flex flex-col min-w-0">
                        <span class="text-[10px] sm:text-sm font-semibold text-content truncate">Profil</span>
                        <span class="text-[8px] sm:text-xs text-gray-400 truncate">Statistikmu</span>
                    </div>
                </a>
            </div>
        </div>

        <div class="flex flex-col gap-5">

            <div class="bg-content rounded-xl border border-content p-4 sm:p-5">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xs sm:text-sm font-semibold text-content"><i class="fa-solid fa-ranking-star mr-2"></i>Top pelajar</h3>
                </div>
                <div class="flex flex-col">
                    @foreach($topUsers as $i => $u)
                    <div class="flex items-center gap-2 sm:gap-3 py-2 sm:py-2.5 {{ !$loop->last ? 'border-b border-content' : '' }}">
                        <span class="w-5 sm:w-6 text-center text-xs sm:text-sm font-mono {{ $i == 0 ? 'text-yellow-400' : ($i == 1 ? 'text-gray-400' : ($i == 2 ? 'text-orange-500' : 'text-gray-500')) }}">
                            @if($i == 0)<i class="fa-solid fa-crown text-xs sm:text-sm"></i>@else{{ $i + 1 }}@endif
                        </span>
                        <div class="w-7 h-7 sm:w-9 sm:h-9 rounded-full bg-ink-700 flex items-center justify-center flex-shrink-0 overflow-hidden">
                            @if($u->profile_picture)
                            <img src="{{ '/' . $pubDir . 'storage/' . $u->profile_picture }}" alt="" class="w-full h-full object-cover">
                            @else
                            <i class="fa-solid fa-user text-content text-[10px] sm:text-xs"></i>
                            @endif
                        </div>
                        <span class="flex-1 text-[11px] sm:text-sm font-medium text-content truncate">{{ $u->id == auth()->id() ? 'Kamu' : $u->name }}</span>
                        <span class="text-[11px] sm:text-sm font-semibold text-amber-400 font-mono">{{ number_format($u->xp) }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-content rounded-xl border border-content p-4 sm:p-5">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xs sm:text-sm font-semibold text-content"><i class="fa-solid fa-medal mr-2 text-purple-400"></i>Badge terbaru</h3>
                    <a href="{{ route('profile.index') }}" class="text-[10px] sm:text-[11px] text-gray-500 hover:text-purple-400 transition-colors">Lihat semua</a>
                </div>
                <div class="flex flex-col gap-2 sm:gap-3">
                    @forelse($recentBadges->take(3) as $ub)
                    @php $color = $ub->badge->color ?? '#3b7cf4'; @endphp
                    <div class="flex items-center gap-2 sm:gap-3.5 p-2 sm:p-3 rounded-xl bg-slate-800/40 border border-content">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl flex items-center justify-center border border-white/5 flex-shrink-0" style="background: linear-gradient(135deg, {{ $color }}33, {{ $color }}1a);box-shadow:var(--shadow-card);">
                            <i class="{{ $ub->badge->icon ?? 'fa-solid fa-medal' }} text-base sm:text-xl" style="color: {{ $color }}; filter: drop-shadow(0 0 8px {{ $color }}4d);"></i>
                        </div>
                        <div class="flex flex-col overflow-hidden min-w-0">
                            <span class="text-xs sm:text-sm font-bold text-content truncate transition-colors" style="--badge-color: {{ $color }};" onmouseenter="this.style.color=this.style.getPropertyValue('--badge-color')" onmouseleave="this.style.color=''">{{ $ub->badge->name }}</span>
                            <span class="text-[10px] sm:text-[11px] text-gray-500 font-medium">{{ optional($ub->earned_at)->diffForHumans() ?? 'Baru saja' }}</span>
                        </div>
                    </div>
                    @empty
                    <div class="py-4 text-center text-gray-500 text-sm italic">Belum ada badge baru</div>
                    @endforelse
                </div>
            </div>

            <div class="bg-content rounded-2xl border border-content p-4 sm:p-6 relative overflow-hidden group" id="daily-quest-container" style="box-shadow:var(--shadow-card);">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                
                <div class="relative flex items-center justify-between mb-4 sm:mb-6">
                    <div class="flex flex-col gap-1.5">
                        <h3 class="text-xs sm:text-sm font-bold text-content flex items-center">
                            <span class="w-2 h-2 rounded-full bg-amber-400 mr-2 shadow-[0_0_8px_rgba(251,191,36,0.5)]"></span>
                            Daily Quest
                        </h3>

                    </div>
                    <div id="quest-status-badge">
                        @if($dailyQuest && $dailyQuest->completed && $dailyQuest->current_step == $dailyQuest->total_steps)
                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-brand-green/10 text-brand-green text-[10px] font-bold uppercase tracking-widest border border-brand-green/20">
                            <i class="fa-solid fa-check-circle mr-1.5"></i>Selesai
                        </span>
                        @endif
                    </div>
                </div>
                
                <div id="quest-content" class="relative">
                    <div id="quest-loader" class="hidden absolute inset-0 z-20 bg-content/60 backdrop-blur-sm flex items-center justify-center rounded-xl">
                        <div class="w-8 h-8 border-2 border-amber-400/30 border-t-amber-400 rounded-full animate-spin"></div>
                    </div>

                    @if($dailyQuest && $dailyQuest->question)
                    <div class="mb-3">
                        <div id="quest-feedback" class="hidden p-5 rounded-2xl mb-6 animate-in fade-in slide-in-from-top-4 duration-500">
                            <!-- Feedback content will be injected by JS -->
                        </div>

                        @if(session('quest_result'))
                            <div class="p-5 rounded-2xl mb-6 {{ session('is_correct') ? 'bg-brand-green/10 border border-brand-green/20' : 'bg-brand-red/10 border border-brand-red/20' }} animate-in fade-in slide-in-from-top-4 duration-500">
                                <div class="flex items-center gap-3.5 mb-4">
                                    <div class="w-10 h-10 rounded-xl {{ session('is_correct') ? 'bg-brand-green/20' : 'bg-brand-red/20' }} flex items-center justify-center">
                                        <i class="fa-solid {{ session('is_correct') ? 'fa-check text-brand-green' : 'fa-xmark text-brand-red' }} text-lg"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold {{ session('is_correct') ? 'text-brand-green' : 'text-brand-red' }}">
                                            {{ session('is_correct') ? 'Jawaban Benar!' : 'Jawaban Salah' }}
                                        </div>
                                        @if(!session('is_correct'))
                                        <div class="text-[11px] text-gray-500">Terus coba lagi ya!</div>
                                        @endif
                                    </div>
                                </div>
                                @if(!session('is_correct'))
                                <div class="bg-black/20 rounded-xl p-3 mb-4">
                                    <p class="text-[11px] text-gray-400">Jawaban yang benar:</p>
                                    <p class="text-sm text-brand-green font-mono font-bold mt-1">{{ session('correct_answer') }}</p>
                                </div>
                                @endif
                                <div class="flex items-center justify-between pt-2">
                                    <span class="inline-flex items-center px-2 py-1 rounded-md bg-amber-500/10 text-amber-400 text-xs font-bold">
                                        <i class="fa-solid fa-bolt mr-1.5 text-[10px]"></i>+{{ session('xp_earned') }} XP
                                    </span>
                                    @if(!$dailyQuest->completed || $dailyQuest->current_step < $dailyQuest->total_steps)
                                    <button type="button" onclick="loadNextQuest()" class="px-4 py-2 rounded-xl bg-white/10 text-content text-xs font-bold hover:bg-white/20 transition-all flex items-center gap-2">
                                        Soal Berikutnya <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                    </button>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div id="quest-question-area" class="{{ $dailyQuest->completed ? 'hidden' : '' }}">
                            <p class="text-[15px] text-slate-200 mb-5 font-medium leading-relaxed">{{ $dailyQuest->question->question_text }}</p>
                            
                            @if($dailyQuest->question->code_snippet)
                            <div class="bg-slate-950 rounded-2xl p-5 font-mono text-[12px] text-blue-300 mb-6 border border-white/5 overflow-x-auto shadow-2xl relative">
                                <div class="absolute top-3 right-3 text-[10px] text-slate-600 font-sans uppercase tracking-widest">Python</div>
                                <pre>{{ $dailyQuest->question->code_snippet }}</pre>
                            </div>
                            @endif
                            
                            <form id="daily-quest-form" method="POST" action="{{ route('daily-quest.submit') }}">
                                @csrf
                                <input type="hidden" name="quest_id" value="{{ $dailyQuest->id }}">
                                
                                @if($dailyQuest->question->options)
                                    @php
                                        $options = json_decode($dailyQuest->question->options, true);
                                        shuffle($options);
                                    @endphp
                                    <div class="flex flex-col gap-3">
                                        @foreach($options as $opt)
                            <button type="button" onclick="submitQuestAnswer('{{ addslashes($opt) }}')" class="quest-option-btn text-left flex items-center gap-3 sm:gap-4 p-3 sm:p-4 rounded-xl sm:rounded-2xl border border-slate-800 bg-slate-800/40 hover:border-brand-blue/50 hover:bg-slate-800 transition-all duration-300 group relative overflow-hidden">
                                <div class="w-6 h-6 sm:w-8 sm:h-8 rounded-lg bg-content border border-slate-700 flex items-center justify-center text-[10px] text-slate-500 group-hover:border-slate-500 group-hover:text-content transition-all">
                                    {{ chr(65 + $loop->index) }}
                                </div>
                                <span class="text-xs sm:text-sm text-slate-400 group-hover:text-content transition-colors relative z-10">{{ $opt }}</span>
                            </button>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="relative group">
                                        <input type="text" id="quest-text-answer" name="answer" required placeholder="Ketik jawaban kamu..." 
                                            class="w-full bg-slate-800/50 border border-slate-700 rounded-2xl px-5 py-4 text-sm text-content placeholder-slate-500 focus:outline-none focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/10 mb-4 transition-all">
                                        <div class="absolute right-4 top-4 text-slate-600 group-focus-within:text-brand-blue transition-colors">
                                            <i class="fa-solid fa-keyboard"></i>
                                        </div>
                                    </div>
                                    <button type="submit" class="w-full py-4 rounded-2xl bg-brand-blue text-white text-sm font-bold hover:bg-brand-blue-light hover:shadow-[0_10px_25px_rgba(59,124,244,0.3)] transition-all active:scale-[0.98]">
                                        Kirim Jawaban
                                    </button>
                                @endif
                            </form>
                        </div>

                        <div id="quest-finished-area" class="{{ $dailyQuest->completed && $dailyQuest->current_step == $dailyQuest->total_steps && !session('quest_result') ? '' : 'hidden' }}">
                            <div class="text-center py-10 px-4">
                                <div class="relative w-20 h-20 mx-auto mb-6">
                                    <div class="absolute inset-0 bg-brand-green/20 blur-xl rounded-full"></div>
                                    <div class="relative w-full h-full bg-brand-green/10 rounded-3xl border border-brand-green/30 flex items-center justify-center">
                                        <i class="fa-solid fa-calendar-check text-brand-green text-3xl"></i>
                                    </div>
                                </div>
                                <h4 class="text-content text-lg font-bold mb-2">Semangat Pagi!</h4>
                                <p class="text-xs text-slate-500 mb-8 leading-relaxed">Kamu telah menyelesaikan target 5 soal hari ini. Kembali lagi besok ya!</p>
                                <div class="flex flex-col gap-3">
                                    <div class="flex items-center justify-between p-4 rounded-2xl bg-slate-800/30 border border-slate-700/50">
                                        <span class="text-xs text-slate-400">XP Hari Ini</span>
                                        <span class="text-sm font-bold text-amber-400">+{{ $dailyQuest->all_quests->sum('xp_earned') }} XP</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="py-16 text-center">
                        <div class="w-16 h-16 bg-slate-800/50 rounded-3xl flex items-center justify-center mx-auto mb-6 border border-slate-700/30">
                            <i class="fa-solid fa-mug-hot text-slate-600 text-2xl"></i>
                        </div>
                        <h4 class="text-content font-bold mb-2">Istirahat Sejenak</h4>
                        <p class="text-xs text-slate-500">Quest harian belum tersedia. Silakan cek beberapa saat lagi.</p>
                        <button onclick="window.location.reload()" class="mt-6 px-6 py-2.5 rounded-xl bg-slate-800 text-xs font-bold text-slate-300 hover:text-content transition-all">
                            Coba Refresh
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function playSound(isCorrect) {
        const src = isCorrect ? '{{ asset("assets/audio/correct.wav") }}' : '{{ asset("assets/audio/incorrect.wav") }}';
        try {
            new Audio(src).play();
        } catch (e) {}
    }

    function showLoader(show) {
        const loader = document.getElementById('quest-loader');
        if (show) {
            loader.classList.remove('hidden');
            loader.classList.add('animate-in', 'fade-in');
        } else {
            loader.classList.add('hidden');
        }
    }

    async function submitQuestAnswer(answerValue) {
        if (!answerValue) return;
        
        const form = document.getElementById('daily-quest-form');
        const questId = form.querySelector('input[name="quest_id"]').value;
        const feedbackEl = document.getElementById('quest-feedback');
        const questionArea = document.getElementById('quest-question-area');
        
        showLoader(true);
        
        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    quest_id: questId,
                    answer: answerValue
                })
            });
            
            const result = await response.json();
            
            if (result.success) {
                playSound(result.is_correct);
                // Update feedback
                feedbackEl.innerHTML = `
                    <div class="flex items-center gap-3.5 mb-4">
                        <div class="w-10 h-10 rounded-xl ${result.is_correct ? 'bg-brand-green/20' : 'bg-brand-red/20'} flex items-center justify-center">
                            <i class="fa-solid ${result.is_correct ? 'fa-check text-brand-green' : 'fa-xmark text-brand-red'} text-lg"></i>
                        </div>
                        <div>
                            <div class="text-sm font-bold ${result.is_correct ? 'text-brand-green' : 'text-brand-red'}">
                                ${result.is_correct ? 'Jawaban Benar!' : 'Jawaban Salah'}
                            </div>
                            ${!result.is_correct ? '<div class="text-[11px] text-gray-500">Jangan menyerah!</div>' : '<div class="text-[11px] text-gray-500">Kamu hebat!</div>'}
                        </div>
                    </div>
                    ${!result.is_correct ? `
                        <div class="bg-black/20 rounded-xl p-3 mb-4">
                            <p class="text-[11px] text-gray-400">Jawaban yang benar:</p>
                            <p class="text-sm text-brand-green font-mono font-bold mt-1">${result.correct_answer}</p>
                        </div>
                    ` : ''}
                    <div class="flex items-center justify-between pt-2">
                        <span class="inline-flex items-center px-2 py-1 rounded-md bg-amber-500/10 text-amber-400 text-xs font-bold">
                            <i class="fa-solid fa-bolt mr-1.5 text-[10px]"></i>+${result.xp_earned} XP
                        </span>
                        ${!result.completed_all ? 
                            `<button type="button" onclick="loadNextQuest()" class="px-5 py-2 rounded-xl bg-brand-blue text-white text-xs font-bold hover:bg-brand-blue-light transition-all flex items-center gap-2 shadow-lg shadow-brand-blue/20">Soal Berikutnya <i class="fa-solid fa-arrow-right text-[10px]"></i></button>` 
                            : `<button type="button" onclick="window.location.reload()" class="px-5 py-2 rounded-xl bg-brand-green text-white text-xs font-bold hover:bg-brand-green-light transition-all flex items-center gap-2 shadow-lg shadow-brand-green/20">Selesai <i class="fa-solid fa-check text-[10px]"></i></button>`
                        }
                    </div>
                `;
                feedbackEl.className = `p-5 rounded-2xl mb-6 ${result.is_correct ? 'bg-brand-green/10 border border-brand-green/20' : 'bg-brand-red/10 border border-brand-red/20'} animate-in fade-in slide-in-from-top-4 duration-500`;
                feedbackEl.classList.remove('hidden');
                
                // Hide question area
                questionArea.classList.add('hidden');
                
                if (result.completed_all) {
                    document.getElementById('quest-status-badge').innerHTML = `
                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-brand-green/10 text-brand-green text-[10px] font-bold uppercase tracking-widest border border-brand-green/20">
                            <i class="fa-solid fa-check-circle mr-1.5"></i>Selesai
                        </span>
                    `;
                }

                // Handle New Badges if any
                if (result.new_badges && result.new_badges.length > 0) {
                    // We can trigger a custom event or just let the page refresh handle it if they click "Selesai"
                    // But for premium feel, we should probably show a toast or something.
                    // For now, the user has to refresh or finish to see badges.
                }
            } else {
                alert(result.message || 'Terjadi kesalahan');
            }
        } catch (error) {
            console.error('Error submitting quest:', error);
            alert('Gagal mengirim jawaban. Silakan coba lagi.');
        } finally {
            showLoader(false);
        }
    }

    async function loadNextQuest() {
        const feedbackEl = document.getElementById('quest-feedback');
        const questionArea = document.getElementById('quest-question-area');
        
        showLoader(true);
        
        try {
            const response = await fetch('{{ route("daily-quest.data") }}');
            const result = await response.json();
            
            if (result.success) {
                const quest = result.quest;
                
                if (quest.completed && quest.current_step == quest.total_steps) {
                    // All finished
                    document.getElementById('quest-content').innerHTML = `
                        <div class="text-center py-10 px-4 animate-in fade-in scale-in duration-500">
                            <div class="relative w-20 h-20 mx-auto mb-6">
                                <div class="absolute inset-0 bg-brand-green/20 blur-xl rounded-full"></div>
                                <div class="relative w-full h-full bg-brand-green/10 rounded-3xl border border-brand-green/30 flex items-center justify-center">
                                    <i class="fa-solid fa-calendar-check text-brand-green text-3xl"></i>
                                </div>
                            </div>
                            <h4 class="text-content text-lg font-bold mb-2">Semangat Pagi!</h4>
                            <p class="text-xs text-slate-500 mb-8 leading-relaxed">Kamu telah menyelesaikan target 5 soal hari ini. Kembali lagi besok ya!</p>
                            <div class="flex flex-col gap-3">
                                <div class="flex items-center justify-between p-4 rounded-2xl bg-slate-800/30 border border-slate-700/50">
                                    <span class="text-xs text-slate-400">XP Hari Ini</span>
                                    <span class="text-sm font-bold text-amber-400">+${quest.total_xp_today} XP</span>
                                </div>
                                </div>
                            </div>
                        </div>
                    `;
                    return;
                }

                // Hide feedback
                feedbackEl.classList.add('hidden');
                
                // Update Question Content
                let optionsHtml = '';
                if (quest.question.options) {
                    const shuffled = [...quest.question.options];
                    for (let i = shuffled.length - 1; i > 0; i--) {
                        const j = Math.floor(Math.random() * (i + 1));
                        [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
                    }
                    optionsHtml = '<div class="flex flex-col gap-3">';
                    shuffled.forEach((opt, idx) => {
                        const letter = String.fromCharCode(65 + idx);
                        const attrSafe = opt.replace(/'/g, '&#039;').replace(/"/g, '&quot;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/&/g, '&amp;');
                        const textSafe = opt.replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/&/g, '&amp;');
                        optionsHtml += `
                            <button type="button" onclick="submitQuestAnswer('${attrSafe}')" class="quest-option-btn text-left flex items-center gap-4 p-4 rounded-2xl border border-slate-800 bg-slate-800/40 hover:border-brand-blue/50 hover:bg-slate-800 hover:translate-x-1 transition-all duration-300 group relative overflow-hidden">
                                <div class="w-8 h-8 rounded-lg bg-content border border-slate-700 flex items-center justify-center text-[10px] text-slate-500 group-hover:border-slate-500 group-hover:text-content transition-all">
                                    ${letter}
                                </div>
                                <span class="text-sm text-slate-400 group-hover:text-content transition-colors relative z-10">${textSafe}</span>
                            </button>
                        `;
                    });
                    optionsHtml += '</div>';
                } else {
                    optionsHtml = `
                        <div class="relative group">
                            <input type="text" id="quest-text-answer" name="answer" required placeholder="Ketik jawaban kamu..." 
                                class="w-full bg-slate-800/50 border border-slate-700 rounded-2xl px-5 py-4 text-sm text-content placeholder-slate-500 focus:outline-none focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/10 mb-4 transition-all">
                            <div class="absolute right-4 top-4 text-slate-600 group-focus-within:text-brand-blue transition-colors">
                                <i class="fa-solid fa-keyboard"></i>
                            </div>
                        </div>
                        <button type="submit" class="w-full py-4 rounded-2xl bg-brand-blue text-white text-sm font-bold hover:bg-brand-blue-light hover:shadow-[0_10px_25px_rgba(59,124,244,0.3)] transition-all active:scale-[0.98]">
                            Kirim Jawaban
                        </button>
                    `;
                }

                questionArea.innerHTML = `
                    <p class="text-[15px] text-slate-200 mb-5 font-medium leading-relaxed">${quest.question.question_text}</p>
                    ${quest.question.code_snippet ? `
                    <div class="bg-slate-950 rounded-2xl p-5 font-mono text-[12px] text-blue-300 mb-6 border border-white/5 overflow-x-auto shadow-2xl relative">
                        <div class="absolute top-3 right-3 text-[10px] text-slate-600 font-sans uppercase tracking-widest">Python</div>
                        <pre>${quest.question.code_snippet}</pre>
                    </div>` : ''}
                    <form id="daily-quest-form" method="POST" action="{{ route('daily-quest.submit') }}">
                        @csrf
                        <input type="hidden" name="quest_id" value="${quest.id}">
                        ${optionsHtml}
                    </form>
                `;
                
                questionArea.classList.remove('hidden');
                questionArea.classList.add('animate-in', 'fade-in', 'slide-in-from-bottom-4');

                // Re-bind form event listener if it was a text input
                const newForm = document.getElementById('daily-quest-form');
                newForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const input = document.getElementById('quest-text-answer');
                    if (input) submitQuestAnswer(input.value);
                });

            } else {
                alert('Gagal memuat soal berikutnya.');
            }
        } catch (error) {
            console.error('Error loading next quest:', error);
            alert('Terjadi kesalahan koneksi.');
        } finally {
            showLoader(false);
        }
    }

    // Initial binding
    document.getElementById('daily-quest-form')?.addEventListener('submit', function(e) {
        e.preventDefault();
        const input = document.getElementById('quest-text-answer');
        if (input) submitQuestAnswer(input.value);
    });
</script>

<style>
    @keyframes bounce-subtle {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-4px); }
    }
    .animate-bounce-subtle {
        animation: bounce-subtle 2s infinite ease-in-out;
    }
    
    /* Animation classes */
    .animate-in { animation: animate-in 0.5s cubic-bezier(0.16, 1, 0.3, 1); }
    .fade-in { opacity: 0; animation-name: fade-in; animation-fill-mode: forwards; }
    .slide-in-from-top-4 { transform: translateY(-1rem); animation-name: slide-in-from-top; animation-fill-mode: forwards; }
    .slide-in-from-bottom-4 { transform: translateY(1rem); animation-name: slide-in-from-bottom; animation-fill-mode: forwards; }
    .scale-in { transform: scale(0.95); animation-name: scale-in; animation-fill-mode: forwards; }
    
    @keyframes fade-in { from { opacity: 0; } to { opacity: 1; } }
    @keyframes slide-in-from-top { from { transform: translateY(-1rem); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    @keyframes slide-in-from-bottom { from { transform: translateY(1rem); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    @keyframes scale-in { from { transform: scale(0.95); opacity: 0; } to { transform: scale(1); opacity: 1; } }

    .quest-option-btn:active {
        transform: scale(0.98);
    }

    [data-theme="light"] #daily-quest-container .text-slate-200 { color: #744317 !important; }
    [data-theme="light"] #daily-quest-container .text-slate-400 { color: #744317 !important; }
    [data-theme="light"] #daily-quest-container .border-slate-800 { border-color: #d1d5db !important; }
    [data-theme="light"] #daily-quest-container .bg-slate-800\/40 { background: #f8fafc !important; }
    [data-theme="light"] #daily-quest-container .hover\:border-brand-blue\/50:hover { border-color: #d1d5db !important; }
    [data-theme="light"] #daily-quest-container .hover\:bg-slate-800:hover { background: #f1f5f9 !important; }
    [data-theme="light"] #daily-quest-container .bg-slate-800\/50 { background: #f8fafc !important; }
    [data-theme="light"] #daily-quest-container .border-slate-700 { border-color: #d1d5db !important; }
    [data-theme="light"] #daily-quest-container .border-slate-700\/50 { border-color: #d1d5db !important; }
    [data-theme="light"] #daily-quest-container .bg-slate-950 { background: #f1f5f9 !important; }
    [data-theme="light"] #daily-quest-container .text-blue-300 { color: #2563eb !important; }
    [data-theme="light"] #daily-quest-container .border-white\/5 { border-color: #d1d5db !important; }
    [data-theme="light"] #daily-quest-container .text-slate-600 { color: #744317 !important; }
    [data-theme="light"] #daily-quest-container .bg-slate-800\/30 { background: #f8fafc !important; }
    [data-theme="light"] #daily-quest-container .text-slate-500 { color: #744317 !important; }
    [data-theme="light"] #daily-quest-container .text-slate-300 { color: #744317 !important; }
    [data-theme="light"] #daily-quest-container .bg-brand-blue.text-white { background: #EBB920 !important; }
    [data-theme="light"] #daily-quest-container .bg-brand-blue.text-white:hover { background: #d4a018 !important; }
</style>
@endsection
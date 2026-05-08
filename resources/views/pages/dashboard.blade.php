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
            <div class="bg-slate-800 rounded-2xl border border-gray-700 p-10 text-center">
                <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-green-500/20 flex items-center justify-center">
                    <i class="fa-solid fa-party-horn text-green-400 text-4xl"></i>
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
                    <h3 class="text-sm font-semibold text-white"><i class="fa-solid fa-star mr-2 text-amber-400"></i>Daily Quest</h3>
                    @if($dailyQuest && $dailyQuest->completed)
                    <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-green-500/15 text-green-400 text-xs font-medium">
                        <i class="fa-solid fa-check mr-1"></i>Selesai
                    </span>
                    @endif
                </div>
                
                @if($dailyQuest && $dailyQuest->question)
                <div class="mb-3">
                    <p class="text-sm text-white mb-2">{{ $dailyQuest->question->question_text }}</p>
                    
                    @if($dailyQuest->question->code_snippet)
                    <div class="bg-slate-950 rounded-lg p-3 font-mono text-xs text-gray-300 mb-3 overflow-x-auto">
                        <pre>{{ $dailyQuest->question->code_snippet }}</pre>
                    </div>
                    @endif
                    
                    @if(session('quest_result'))
                    <div class="p-3 rounded-lg mb-3 {{ session('is_correct') ? 'bg-green-500/20 border border-green-500/30' : 'bg-red-500/20 border border-red-500/30' }}">
                        <div class="flex items-center gap-2 mb-2">
                            <i class="fa-solid {{ session('is_correct') ? 'fa-check-circle text-green-400' : 'fa-xmark-circle text-red-400' }}"></i>
                            <span class="text-sm font-medium {{ session('is_correct') ? 'text-green-400' : 'text-red-400' }}">
                                {{ session('is_correct') ? 'Benar!' : 'Salah' }}
                            </span>
                        </div>
                        @if(!session('is_correct'))
                        <div class="text-sm text-gray-300 mb-2">Jawaban benar: <span class="text-green-400 font-mono">{{ session('correct_answer') }}</span></div>
                        @endif
                        @if(session('xp_earned') > 0)
                        <div class="text-sm text-amber-400">+{{ session('xp_earned') }} XP</div>
                        @endif
                    </div>
                    @endif
                    
                    @if(!$dailyQuest->completed)
                    <form method="POST" action="{{ route('daily-quest.submit') }}">
                        @csrf
                        <input type="hidden" name="question_id" value="{{ $dailyQuest->question_id }}">
                        <input type="text" name="answer" class="w-full bg-slate-800 border border-gray-700 rounded-lg px-3 py-2 text-sm text-white placeholder-gray-500 focus:border-blue-500 focus:outline-none" placeholder="Ketik jawabanmu..." required>
                        <button type="submit" class="w-full mt-2 px-3 py-2 rounded-lg bg-blue-500 text-white text-sm font-medium hover:bg-blue-400 transition-all">
                            Kirim Jawaban
                        </button>
                    </form>
                    @else
                    <div class="p-3 rounded-lg bg-slate-800 text-center">
                        <span class="text-sm text-gray-400">Jawabanmu: </span>
                        <span class="text-sm text-white font-mono">{{ $dailyQuest->user_answer }}</span>
                    </div>
                    @endif
                </div>
                @else
                <div class="text-center py-4 text-gray-500 text-sm">
                    <i class="fa-solid fa-clock mr-2"></i>Menunggu quest...
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
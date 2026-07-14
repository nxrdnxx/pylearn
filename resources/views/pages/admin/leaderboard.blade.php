@extends('layouts.admin')

@section('header_title', 'Kelola Leaderboard')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h3 class="text-xl font-bold text-white">Klasemen User</h3>
        <p class="text-sm text-slate-500">Pantau persaingan dan progres belajar pelajar</p>
    </div>
    <form action="{{ route('admin.leaderboard.reset') }}" method="POST" onsubmit="return confirm('Yakin reset leaderboard?')">
        @csrf
        <button type="submit" class="px-5 py-3 bg-red-600/10 hover:bg-red-600 text-red-500 hover:text-white rounded-2xl text-xs font-bold transition-all border border-red-500/20 flex items-center gap-2">
            <i class="fas fa-redo-alt"></i> Reset Klasemen
        </button>
    </form>
</div>

<div class="glass-card rounded-3xl overflow-hidden border border-white/5">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-white/5">
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Rank</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">User</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Total XP</th>
                    <th class="hidden sm:table-cell px-3 sm:px-6 py-3 sm:py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Aktivitas</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @foreach($users as $user)
                <tr class="hover:bg-white/[0.02] transition-colors group">
                    <td class="px-3 sm:px-6 py-3 sm:py-5">
                        @if($loop->iteration == 1)
                            <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-amber-500/20 flex items-center justify-center text-amber-400 border border-amber-500/30">
                                <i class="fas fa-crown text-[10px] sm:text-sm"></i>
                            </div>
                        @elseif($loop->iteration == 2)
                            <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-slate-400/20 flex items-center justify-center text-slate-400 border border-slate-400/30">
                                <i class="fas fa-medal text-[10px] sm:text-sm"></i>
                            </div>
                        @elseif($loop->iteration == 3)
                            <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-orange-600/20 flex items-center justify-center text-orange-600 border border-orange-600/30">
                                <i class="fas fa-award text-[10px] sm:text-sm"></i>
                            </div>
                        @else
                            <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-white/5 flex items-center justify-center text-slate-500 font-mono text-[10px] sm:text-xs font-bold border border-white/5">
                                #{{ $loop->iteration }}
                            </div>
                        @endif
                    </td>
                    <td class="px-3 sm:px-6 py-3 sm:py-5">
                        <div class="flex items-center gap-2 sm:gap-3">
                            <div class="w-7 h-7 sm:w-9 sm:h-9 rounded-full bg-yellow-500 flex items-center justify-center text-[10px] font-bold text-white flex-shrink-0">
                                <i class="fa-solid fa-user text-white text-[10px] sm:text-xs"></i>
                            </div>
                            <div class="text-xs sm:text-sm font-bold text-white group-hover:text-blue-400 transition-colors truncate">{{ $user->name }}</div>
                        </div>
                    </td>
                    <td class="px-3 sm:px-6 py-3 sm:py-5">
                        <span class="text-xs sm:text-sm font-bold text-amber-400 font-mono">{{ number_format($user->xp) }}</span>
                    </td>
                    <td class="hidden sm:table-cell px-3 sm:px-6 py-3 sm:py-5">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-fire text-orange-500 text-xs"></i>
                            <span class="text-xs text-slate-400 font-medium">{{ $user->login_streak ?? 0 }} hari</span>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
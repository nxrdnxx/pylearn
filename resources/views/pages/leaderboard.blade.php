@extends('layouts.app')

@section('title', 'Leaderboard')

@section('content')
<div class="pt-16">
    <div class="bg-gradient-to-b from-surface-1 to-ink-950 border-b border-ink-700/14 py-8">
        <div class="max-w-[700px] mx-auto px-7">
            <h1 class="font-serif text-[32px] mb-2">
                <i class="fa-solid fa-trophy text-brand-amber mr-3"></i>Leaderboard
            </h1>
            <p class="text-[15px] text-text-secondary">
                Kamu di posisi
                <strong class="text-brand-blue-light font-mono">#{{ $myRank }}</strong> dari {{ $users->count() }} pelajar
            </p>
        </div>
    </div>

    <div class="max-w-[700px] mx-auto px-7 pt-8 pb-14">
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center gap-2">
                <button class="px-4 py-2 rounded-lg bg-surface-2 border border-brand-blue/30 text-sm font-medium text-text-primary">
                    <i class="fa-solid fa-infinity mr-1.5 text-xs"></i>All-time
                </button>
            </div>
            <span class="text-sm text-text-secondary">
                <i class="fa-solid fa-users mr-1.5 text-xs"></i>{{ $users->count() }} pelajar
            </span>
        </div>

        <div class="grid grid-cols-3 gap-4 mb-7 items-end">
            @php
                $podium = collect([
                    $top3->where('rank', 2)->first(),
                    $top3->where('rank', 1)->first(),
                    $top3->where('rank', 3)->first()
                ]);
            @endphp

            @foreach($podium as $user)
            @if($user)
            <div class="bg-surface-1 rounded-2xl border {{ $user->rank == 1 ? 'border-brand-amber/40 bg-gradient-to-b from-brand-amber/15 to-surface-1 p-8 shadow-[0_10px_40px_rgba(232,160,34,0.15)] z-10' : ($user->rank == 2 ? 'border-gray-400/20 bg-gradient-to-b from-gray-400/5 to-surface-1 p-6' : 'border-[#cd7f32]/20 bg-gradient-to-b from-[#cd7f32]/5 to-surface-1 p-6') }} text-center relative overflow-hidden transition-all duration-300 hover:-translate-y-1">
                @if($user->rank == 1)
                <div class="absolute top-0 left-0 right-0 h-[4px] bg-gradient-to-r from-brand-amber via-brand-amber-light to-brand-amber"></div>
                @elseif($user->rank == 2)
                <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-gray-400 to-gray-300"></div>
                @elseif($user->rank == 3)
                <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-[#cd7f32] to-[#d4976a]"></div>
                @endif

                <div class="{{ $user->rank == 1 ? 'text-4xl mb-4' : 'text-3xl mb-3' }}">
                    @if($user->rank == 1) <i class="fa-solid fa-crown text-brand-amber animate-bounce-subtle"></i>
                    @elseif($user->rank == 2) <i class="fa-solid fa-medal text-gray-400"></i>
                    @else <i class="fa-solid fa-medal text-[#cd7f32]"></i>
                    @endif
                </div>

                <div class="{{ $user->rank == 1 ? 'w-16 h-16 text-xl' : 'w-12 h-12 text-base' }} mx-auto mb-3 rounded-full bg-gradient-to-br from-brand-blue to-brand-blue-light flex items-center justify-center font-bold text-white shadow-lg {{ $user->rank == 1 ? 'border-2 border-brand-amber/50 ring-4 ring-brand-amber/10' : '' }}">
                    {{ strtoupper(substr($user->name, 0, 2)) }}
                </div>

                <div class="{{ $user->rank == 1 ? 'text-lg' : 'text-[15px]' }} font-bold mb-2 text-text-primary truncate">{{ $user->name }}</div>

                <div class="font-mono {{ $user->rank == 1 ? 'text-2xl' : 'text-xl' }} font-bold {{ $user->rank == 1 ? 'text-brand-amber' : ($user->rank == 2 ? 'text-gray-400' : 'text-[#cd7f32]') }}">
                    {{ number_format($user->xp) }}
                </div>
                <div class="text-[11px] text-text-muted mt-1 uppercase tracking-wider font-bold">XP</div>
            </div>
            @else
            <div class="h-20"></div> {{-- Spacer if rank doesn't exist --}}
            @endif
            @endforeach
        </div>

        <div class="bg-surface-1 rounded-xl border border-ink-700/14 p-5">
            <div class="flex items-center gap-4 pb-3 mb-2 border-b border-ink-700/14">
                <div class="text-[11px] text-text-muted w-7 text-center">No</div>
                <div class="text-[11px] text-text-muted flex-1">Nama</div>
                <div class="text-[11px] text-text-muted w-12">Level</div>
                <div class="text-[11px] text-text-muted w-16 text-right">XP</div>
            </div>

            <div class="flex flex-col gap-1">
                @foreach($users as $user)
                <div class="flex items-center gap-4 py-3 px-1 rounded-lg transition-all duration-200 hover:bg-surface-2 {{ $user->id == $me->id ? 'bg-brand-blue/10 border border-brand-blue/30' : '' }}">
                    <div class="w-7 text-sm font-semibold text-center flex-shrink-0 text-text-secondary">
                        {{ $user->rank }}
                    </div>
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-brand-blue to-brand-blue-light flex items-center justify-center text-xs font-semibold text-white flex-shrink-0">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>
                    <div class="flex-1 text-sm font-medium text-text-primary">
                        {{ $user->name }}
                        @if($user->id == $me->id)
                        <span class="text-brand-blue-light text-xs ml-1">(Kamu)</span>
                        @endif
                    </div>
                    <span class="w-12 text-[11px] text-text-secondary text-center">
                        <i class="fa-solid fa-layer-group mr-1"></i>Lv.{{ $user->level }}
                    </span>
                    <div class="w-16 text-sm font-semibold text-brand-amber font-mono text-right">
                        {{ number_format($user->xp) }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
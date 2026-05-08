@extends('layouts.app')

@section('title', 'Level')

@section('content')
<div class="pt-16">
    @php
        $totalLevel = count($levels);
        $completed = collect($levels)->where('status', 'completed')->count();
        $percent = $totalLevel > 0 ? ($completed / $totalLevel) * 100 : 0;
    @endphp

    <div class="bg-gradient-to-b from-surface-1 to-ink-950 border-b border-ink-700/14 py-8">
        <div class="max-w-[1100px] mx-auto px-7">
            <h1 class="font-serif text-[32px] mb-2">
                <i class="fa-solid fa-graduation-cap text-brand-blue mr-3"></i>Kurikulum
            </h1>
            <p class="text-[15px] text-text-secondary mb-5">
                Dari dasar hingga lanjutan, satu level demi satu level.
            </p>
            <div class="flex items-center gap-5">
                <div class="flex-1 max-w-[300px]">
                    <div class="w-full bg-surface-2 rounded-full h-1.5 overflow-hidden">
                        <div class="h-full bg-brand-green rounded-full transition-all duration-500" style="width:{{ $percent }}%"></div>
                    </div>
                </div>
                <span class="text-sm text-text-secondary">
                    <i class="fa-solid fa-check-circle text-brand-green mr-1.5"></i>{{ $completed }} dari {{ $totalLevel }} level selesai
                </span>
            </div>
        </div>
    </div>

    <div class="max-w-[1100px] mx-auto px-7 py-8 pb-14">
        <div class="flex flex-col gap-3">
            @foreach($levels as $index => $level)
            @php
                $isCompleted = $level['status'] == 'completed';
                $isUnlocked  = $level['status'] == 'unlocked';
                $isLocked    = $level['status'] == 'locked';
                $percent = $level['total'] > 0 ? ($level['answered'] / $level['total']) * 100 : 0;
            @endphp

            <div class="bg-surface-1 rounded-xl border {{ $isCompleted ? 'border-brand-green/30' : ($isUnlocked ? 'border-brand-blue/30' : 'border-ink-700/14') }} p-5 transition-all duration-200 {{ $isLocked ? 'opacity-50 cursor-not-allowed' : 'hover:border-ink-700/30 hover:bg-surface-2 cursor-pointer' }}"
                 onclick="@if(!$isLocked) window.location.href='{{ route('quiz.show', $level['id']) }}' @endif">

                <div class="flex items-center gap-5">
                    <div class="w-10 h-10 rounded-lg flex-shrink-0 flex items-center justify-center text-base font-bold font-mono {{ $isCompleted ? 'bg-brand-green/15 text-brand-green-light' : ($isUnlocked ? 'bg-brand-blue/15 text-brand-blue-light' : 'bg-surface-2 text-text-muted') }}">
                        {{ str_pad($level['order'], 2, '0', STR_PAD_LEFT) }}
                    </div>

                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="text-base font-semibold text-text-primary">{{ $level['name'] }}</span>
                            @if($isCompleted)
                                <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-brand-green/15 text-brand-green-light text-xs font-medium">
                                    <i class="fa-solid fa-circle-check mr-1"></i>Selesai
                                </span>
                            @elseif($isUnlocked)
                                <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-brand-blue/15 text-brand-blue-light text-xs font-medium">
                                    <i class="fa-solid fa-lock-open mr-1"></i>{{ $level['answered'] > 0 ? 'Berlangsung' : 'Terbuka' }}
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-surface-2 text-text-muted text-xs font-medium">
                                    <i class="fa-solid fa-lock mr-1"></i>Terkunci
                                </span>
                            @endif
                        </div>
                        <p class="text-sm text-text-secondary leading-relaxed">{{ $level['description'] }}</p>

                        @if($isUnlocked || $isCompleted)
                        <div class="mt-3 flex items-center gap-3">
                            <div class="flex-1 h-1 bg-surface-2 rounded-full overflow-hidden">
                                <div class="h-full {{ $isCompleted ? 'bg-brand-green' : 'bg-brand-blue' }} rounded-full transition-all duration-500" style="width:{{ $percent }}%"></div>
                            </div>
                            <span class="text-xs text-text-secondary font-mono">{{ $level['answered'] }}/{{ $level['total'] }}</span>
                        </div>
                        @endif
                    </div>

                    @if($level['answered'] > 0)
                    <div class="text-right flex-shrink-0">
                        <div class="text-[22px] font-bold font-mono {{ $level['score'] >= 60 ? 'text-green-400' : ($level['score'] >= 40 ? 'text-amber-400' : 'text-red-500') }}">
                            {{ $level['score'] }}
                        </div>
                        <div class="text-[11px] text-gray-500 mt-0.5">skor</div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
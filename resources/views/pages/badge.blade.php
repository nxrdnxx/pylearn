@extends('layouts.app')
@section('title', 'Badge')

@section('content')
<div class="pt-16 min-h-screen" style="background: linear-gradient(135deg, #04091a 0%, #070f26 100%);">
    <div class="max-w-[1100px] mx-auto px-7 pt-10 pb-14">
        <div class="flex items-center justify-between gap-4 flex-wrap mb-8">
            <h1 class="font-serif text-[32px] text-white">
                <i class="fa-solid fa-medal text-amber-400 mr-3"></i>Badge
            </h1>
            <div class="flex items-center gap-3">
                <div class="flex-1 max-w-[200px] h-2 bg-slate-800 rounded-full overflow-hidden">
                    <div class="h-full bg-amber-500 rounded-full transition-all duration-500" style="width:{{ $percent }}%"></div>
                </div>
                <span class="text-sm text-gray-400">{{ $owned }}/{{ $total }}</span>
            </div>
        </div>

        <div class="flex items-center gap-3 mb-5">
            <div class="w-2 h-2 rounded-full bg-green-500 shadow-[0_0_8px_rgba(34,197,94,0.5)]"></div>
            <span class="text-xs font-semibold text-green-400 uppercase tracking-wide">Diraih</span>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 mb-10">
            @forelse($earned as $badge)
            <div class="bg-slate-800 rounded-xl border border-gray-700 p-4 flex flex-col items-center text-center transition-all duration-200 hover:border-amber-500/50 hover:scale-105">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center mb-3 shadow-lg">
                    <i class="fa-solid {{ $badge->icon ?? 'fa-medal' }} text-xl text-white"></i>
                </div>
                <div class="text-sm font-semibold text-white mb-1">{{ $badge->name }}</div>
                <div class="text-[11px] text-gray-400">{{ $badge->description }}</div>
            </div>
            @empty
            <div class="col-span-full text-center py-10 text-gray-500">
                <div class="text-4xl mb-3">
                    <i class="fa-solid fa-medal"></i>
                </div>
                <div>Belum ada badge diraih. Terus belajar!</div>
            </div>
            @endforelse
        </div>

        <div class="flex items-center gap-3 mb-5">
            <div class="w-2 h-2 rounded-full bg-gray-600"></div>
            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Belum diraih</span>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
            @foreach($locked as $badge)
            <div class="bg-slate-900 rounded-xl border border-gray-800 p-4 flex flex-col items-center text-center opacity-50">
                <div class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center mb-3">
                    <i class="fa-solid fa-lock text-gray-600"></i>
                </div>
                <div class="text-sm font-semibold text-gray-400 mb-1">{{ $badge->name }}</div>
                <div class="text-[11px] text-gray-600">{{ $badge->description }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
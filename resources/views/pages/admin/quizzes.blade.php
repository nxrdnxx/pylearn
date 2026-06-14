@extends('layouts.admin')

@section('header_title', 'Pilih Level Quiz')

@section('content')
<div class="flex items-center justify-between mb-6 sm:mb-8">
    <div>
        <h3 class="text-lg sm:text-xl font-bold text-white">Bank Soal & Quiz</h3>
        <p class="text-xs sm:text-sm text-slate-500">Pilih level untuk mengelola pertanyaan evaluasi</p>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-5">
    @foreach($levels as $level)
    <a href="{{ route('admin.quizzes.level', $level) }}" 
       class="glass-card rounded-2xl sm:rounded-3xl p-4 sm:p-6 border border-white/5 hover:border-blue-500/30 transition-all group hover:-translate-y-1 hover:shadow-lg hover:shadow-blue-500/5 cursor-pointer">
        <div class="flex items-center justify-between mb-4 sm:mb-5">
            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-gradient-to-br from-blue-600/20 to-purple-600/20 flex items-center justify-center text-blue-400 group-hover:scale-110 transition-transform">
                <i class="fas fa-code text-sm sm:text-lg"></i>
            </div>
            <span class="inline-flex items-center px-2 py-1 rounded-lg bg-blue-500/10 text-blue-400 text-[10px] font-bold uppercase tracking-widest border border-blue-500/20">
                Level {{ $level->order_number }}
            </span>
        </div>

        <h4 class="text-base sm:text-lg font-bold text-white group-hover:text-blue-400 transition-colors mb-2 truncate">{{ $level->name }}</h4>
        
        @if($level->description)
        <p class="text-[10px] sm:text-xs text-slate-500 leading-relaxed mb-4 sm:mb-5 line-clamp-2">{{ $level->description }}</p>
        @else
        <p class="text-[10px] sm:text-xs text-slate-500 leading-relaxed mb-4 sm:mb-5 italic">Tidak ada deskripsi</p>
        @endif

        <div class="flex items-center justify-between pt-3 sm:pt-4 border-t border-white/5">
            <div class="flex items-center gap-2 text-[10px] sm:text-xs text-slate-400">
                <span>{{ $level->questions_count }} Soal</span>
            </div>
            <div class="text-blue-400 text-[10px] sm:text-xs font-bold group-hover:translate-x-1 transition-transform flex items-center gap-1">
                Kelola <i class="fas fa-arrow-right text-[10px]"></i>
            </div>
        </div>
    </a>
    @endforeach
</div>
@endsection
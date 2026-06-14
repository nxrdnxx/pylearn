@extends('layouts.admin')

@section('header_title', 'Dashboard Overview')

@section('content')
<div class="mb-6 sm:mb-10">
    <h3 class="text-lg sm:text-2xl font-bold text-white mb-1">Selamat Datang, Admin</h3>
    <p class="text-slate-400 text-xs sm:text-sm font-medium">Berikut adalah ringkasan statistik platform PyLearn saat ini.</p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
    <!-- Total Users -->
    <div class="glass-card p-4 sm:p-6 rounded-2xl sm:rounded-3xl hover:bg-white/5 transition-all duration-300 group">
        <div class="flex items-start justify-between mb-3 sm:mb-4">
            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-blue-500/20 flex items-center justify-center text-blue-400 group-hover:scale-110 transition-transform">
                <i class="fas fa-users text-base sm:text-xl"></i>
            </div>
            <span class="text-[10px] font-bold text-blue-500 uppercase tracking-widest bg-blue-500/10 px-2 py-1 rounded-lg">Users</span>
        </div>
        <div class="text-2xl sm:text-3xl font-bold text-white mb-1">{{ number_format($stats['total_users']) }}</div>
        <p class="text-[10px] sm:text-xs text-slate-500 font-medium">Total pelajar terdaftar</p>
    </div>

    <!-- Total Levels -->
    <div class="glass-card p-4 sm:p-6 rounded-2xl sm:rounded-3xl hover:bg-white/5 transition-all duration-300 group">
        <div class="flex items-start justify-between mb-3 sm:mb-4">
            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-emerald-500/20 flex items-center justify-center text-emerald-400 group-hover:scale-110 transition-transform">
                <i class="fas fa-layer-group text-base sm:text-xl"></i>
            </div>
            <span class="text-[10px] font-bold text-emerald-500 uppercase tracking-widest bg-emerald-500/10 px-2 py-1 rounded-lg">Levels</span>
        </div>
        <div class="text-2xl sm:text-3xl font-bold text-white mb-1">{{ number_format($stats['total_levels']) }}</div>
        <p class="text-[10px] sm:text-xs text-slate-500 font-medium">Modul pembelajaran aktif</p>
    </div>

    <!-- Total Questions -->
    <div class="glass-card p-4 sm:p-6 rounded-2xl sm:rounded-3xl hover:bg-white/5 transition-all duration-300 group">
        <div class="flex items-start justify-between mb-3 sm:mb-4">
            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-purple-500/20 flex items-center justify-center text-purple-400 group-hover:scale-110 transition-transform">
                <i class="fas fa-vial text-base sm:text-xl"></i>
            </div>
            <span class="text-[10px] font-bold text-purple-500 uppercase tracking-widest bg-purple-500/10 px-2 py-1 rounded-lg">Quizzes</span>
        </div>
        <div class="text-2xl sm:text-3xl font-bold text-white mb-1">{{ number_format($stats['total_questions']) }}</div>
        <p class="text-[10px] sm:text-xs text-slate-500 font-medium">Total bank soal tersedia</p>
    </div>

    <!-- Total Badges -->
    <div class="glass-card p-4 sm:p-6 rounded-2xl sm:rounded-3xl hover:bg-white/5 transition-all duration-300 group">
        <div class="flex items-start justify-between mb-3 sm:mb-4">
            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-amber-500/20 flex items-center justify-center text-amber-400 group-hover:scale-110 transition-transform">
                <i class="fas fa-medal text-base sm:text-xl"></i>
            </div>
            <span class="text-[10px] font-bold text-amber-500 uppercase tracking-widest bg-amber-500/10 px-2 py-1 rounded-lg">Badges</span>
        </div>
        <div class="text-2xl sm:text-3xl font-bold text-white mb-1">{{ number_format($stats['total_badges']) }}</div>
        <p class="text-[10px] sm:text-xs text-slate-500 font-medium">Achievement yang tersedia</p>
    </div>
</div>

<div class="mt-8 sm:mt-12">
    <div class="flex items-center justify-between mb-4 sm:mb-6">
        <h3 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
            <i class="fas fa-rocket text-blue-500"></i>
            Quick Actions
        </h3>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
        <a href="{{ route('admin.materials') }}" class="glass-card p-4 sm:p-5 rounded-2xl hover:bg-blue-600/10 hover:border-blue-500/30 transition-all group border-l-4 border-l-blue-600">
            <div class="flex items-center gap-3 sm:gap-4">
                <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-blue-600/10 flex items-center justify-center text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-all">
                    <i class="fas fa-book text-sm sm:text-base"></i>
                </div>
                <div class="min-w-0">
                    <p class="text-xs sm:text-sm font-bold text-white truncate">Kelola Materi</p>
                    <p class="text-[10px] text-slate-500 truncate">Update modul belajar</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.quizzes') }}" class="glass-card p-4 sm:p-5 rounded-2xl hover:bg-emerald-600/10 hover:border-emerald-500/30 transition-all group border-l-4 border-l-emerald-600">
            <div class="flex items-center gap-3 sm:gap-4">
                <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-emerald-600/10 flex items-center justify-center text-emerald-400 group-hover:bg-emerald-600 group-hover:text-white transition-all">
                    <i class="fas fa-question-circle text-sm sm:text-base"></i>
                </div>
                <div class="min-w-0">
                    <p class="text-xs sm:text-sm font-bold text-white truncate">Kelola Quiz</p>
                    <p class="text-[10px] text-slate-500 truncate">Tambah bank soal</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.badges') }}" class="glass-card p-4 sm:p-5 rounded-2xl hover:bg-amber-600/10 hover:border-amber-500/30 transition-all group border-l-4 border-l-amber-600">
            <div class="flex items-center gap-3 sm:gap-4">
                <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-amber-600/10 flex items-center justify-center text-amber-400 group-hover:bg-amber-600 group-hover:text-white transition-all">
                    <i class="fas fa-medal text-sm sm:text-base"></i>
                </div>
                <div class="min-w-0">
                    <p class="text-xs sm:text-sm font-bold text-white truncate">Kelola Badge</p>
                    <p class="text-[10px] text-slate-500 truncate">Atur achievement</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.students') }}" class="glass-card p-4 sm:p-5 rounded-2xl hover:bg-purple-600/10 hover:border-purple-500/30 transition-all group border-l-4 border-l-purple-600">
            <div class="flex items-center gap-3 sm:gap-4">
                <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-purple-600/10 flex items-center justify-center text-purple-400 group-hover:bg-purple-600 group-hover:text-white transition-all">
                    <i class="fas fa-users text-sm sm:text-base"></i>
                </div>
                <div class="min-w-0">
                    <p class="text-xs sm:text-sm font-bold text-white truncate">Data Mahasiswa</p>
                    <p class="text-[10px] text-slate-500 truncate">Monitoring progres</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
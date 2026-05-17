@extends('layouts.admin')

@section('header_title', 'Dashboard Overview')

@section('content')
<div class="mb-10">
    <h3 class="text-2xl font-bold text-white mb-1">Selamat Datang, Admin</h3>
    <p class="text-slate-400 text-sm font-medium">Berikut adalah ringkasan statistik platform PyLearn saat ini.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Total Users -->
    <div class="glass-card p-6 rounded-3xl hover:bg-white/5 transition-all duration-300 group">
        <div class="flex items-start justify-between mb-4">
            <div class="w-12 h-12 rounded-2xl bg-blue-500/20 flex items-center justify-center text-blue-400 group-hover:scale-110 transition-transform">
                <i class="fas fa-users text-xl"></i>
            </div>
            <span class="text-[10px] font-bold text-blue-500 uppercase tracking-widest bg-blue-500/10 px-2 py-1 rounded-lg">Users</span>
        </div>
        <div class="text-3xl font-bold text-white mb-1">{{ number_format($stats['total_users']) }}</div>
        <p class="text-xs text-slate-500 font-medium">Total mahasiswa terdaftar</p>
    </div>

    <!-- Total Levels -->
    <div class="glass-card p-6 rounded-3xl hover:bg-white/5 transition-all duration-300 group">
        <div class="flex items-start justify-between mb-4">
            <div class="w-12 h-12 rounded-2xl bg-emerald-500/20 flex items-center justify-center text-emerald-400 group-hover:scale-110 transition-transform">
                <i class="fas fa-layer-group text-xl"></i>
            </div>
            <span class="text-[10px] font-bold text-emerald-500 uppercase tracking-widest bg-emerald-500/10 px-2 py-1 rounded-lg">Levels</span>
        </div>
        <div class="text-3xl font-bold text-white mb-1">{{ number_format($stats['total_levels']) }}</div>
        <p class="text-xs text-slate-500 font-medium">Modul pembelajaran aktif</p>
    </div>

    <!-- Total Questions -->
    <div class="glass-card p-6 rounded-3xl hover:bg-white/5 transition-all duration-300 group">
        <div class="flex items-start justify-between mb-4">
            <div class="w-12 h-12 rounded-2xl bg-purple-500/20 flex items-center justify-center text-purple-400 group-hover:scale-110 transition-transform">
                <i class="fas fa-vial text-xl"></i>
            </div>
            <span class="text-[10px] font-bold text-purple-500 uppercase tracking-widest bg-purple-500/10 px-2 py-1 rounded-lg">Quizzes</span>
        </div>
        <div class="text-3xl font-bold text-white mb-1">{{ number_format($stats['total_questions']) }}</div>
        <p class="text-xs text-slate-500 font-medium">Total bank soal tersedia</p>
    </div>

    <!-- Total Badges -->
    <div class="glass-card p-6 rounded-3xl hover:bg-white/5 transition-all duration-300 group">
        <div class="flex items-start justify-between mb-4">
            <div class="w-12 h-12 rounded-2xl bg-amber-500/20 flex items-center justify-center text-amber-400 group-hover:scale-110 transition-transform">
                <i class="fas fa-medal text-xl"></i>
            </div>
            <span class="text-[10px] font-bold text-amber-500 uppercase tracking-widest bg-amber-500/10 px-2 py-1 rounded-lg">Badges</span>
        </div>
        <div class="text-3xl font-bold text-white mb-1">{{ number_format($stats['total_badges']) }}</div>
        <p class="text-xs text-slate-500 font-medium">Achievement yang tersedia</p>
    </div>
</div>

<div class="mt-12">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-bold text-white flex items-center gap-2">
            <i class="fas fa-rocket text-blue-500"></i>
            Quick Actions
        </h3>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ route('admin.materials') }}" class="glass-card p-5 rounded-2xl hover:bg-blue-600/10 hover:border-blue-500/30 transition-all group border-l-4 border-l-blue-600">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-blue-600/10 flex items-center justify-center text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-all">
                    <i class="fas fa-book"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-white">Kelola Materi</p>
                    <p class="text-[10px] text-slate-500">Update modul belajar</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.quizzes') }}" class="glass-card p-5 rounded-2xl hover:bg-emerald-600/10 hover:border-emerald-500/30 transition-all group border-l-4 border-l-emerald-600">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-emerald-600/10 flex items-center justify-center text-emerald-400 group-hover:bg-emerald-600 group-hover:text-white transition-all">
                    <i class="fas fa-question-circle"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-white">Kelola Quiz</p>
                    <p class="text-[10px] text-slate-500">Tambah bank soal</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.badges') }}" class="glass-card p-5 rounded-2xl hover:bg-amber-600/10 hover:border-amber-500/30 transition-all group border-l-4 border-l-amber-600">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-amber-600/10 flex items-center justify-center text-amber-400 group-hover:bg-amber-600 group-hover:text-white transition-all">
                    <i class="fas fa-medal"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-white">Kelola Badge</p>
                    <p class="text-[10px] text-slate-500">Atur achievement</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.students') }}" class="glass-card p-5 rounded-2xl hover:bg-purple-600/10 hover:border-purple-500/30 transition-all group border-l-4 border-l-purple-600">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-purple-600/10 flex items-center justify-center text-purple-400 group-hover:bg-purple-600 group-hover:text-white transition-all">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-white">Data Mahasiswa</p>
                    <p class="text-[10px] text-slate-500">Monitoring progres</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
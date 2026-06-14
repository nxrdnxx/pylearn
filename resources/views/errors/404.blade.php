@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan')

@section('content')
<div class="min-h-screen flex items-center justify-center px-6">
    <div class="text-center max-w-md">
        <div class="w-24 h-24 mx-auto mb-8 rounded-[32px] bg-brand-blue/10 flex items-center justify-center border border-brand-blue/20">
            <i class="fa-solid fa-compass text-brand-blue text-5xl"></i>
        </div>
        <h1 class="text-5xl sm:text-7xl font-bold text-white mb-4">404</h1>
        <p class="text-lg sm:text-xl font-semibold text-white mb-2">Halaman Tidak Ditemukan</p>
        <p class="text-sm sm:text-base text-text-secondary mb-8 sm:mb-10 leading-relaxed">Halaman yang kamu cari mungkin telah dipindah, dihapus, atau tidak tersedia.</p>
        <a href="{{ route('dashboard.index') }}" class="inline-flex items-center gap-3 px-6 sm:px-8 py-3 sm:py-4 rounded-xl sm:rounded-2xl bg-brand-blue text-white font-bold text-sm sm:text-base hover:bg-brand-blue-light transition-all shadow-xl shadow-brand-blue/20">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection

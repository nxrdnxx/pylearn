@extends('layouts.app')
@section('title', 'Profile')

@section('content')
<div class="pt-16 min-h-screen" style="background: linear-gradient(135deg, #04091a 0%, #070f26 100%);">
    <div class="max-w-[800px] mx-auto px-7 pt-10 pb-14">
        <div class="bg-slate-800 rounded-2xl border border-gray-700 p-6 mb-6">
            <div class="flex items-center gap-5 flex-wrap">
                @auth
                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-600 to-blue-500 flex items-center justify-center text-2xl font-bold text-white flex-shrink-0">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
                <div class="flex-1 min-w-[180px]">
                    <h1 class="text-xl font-semibold text-white mb-1">{{ Auth::user()->name }}</h1>
                    <p class="text-sm text-gray-400 mb-4">{{ Auth::user()->email }}</p>
                    <div class="flex gap-2 flex-wrap">
                        <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-blue-500/15 text-blue-400 text-xs font-medium">
                            <i class="fa-solid fa-layer-group mr-1"></i>Level {{ $completedLevel }}
                        </span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-amber-500/15 text-amber-400 text-xs font-medium">
                            <i class="fa-solid fa-fire mr-1"></i>Streak {{ $streak }} hari
                        </span>
                    </div>
                </div>
                <div class="flex gap-2 ml-auto">
                    <button class="px-3 py-1.5 rounded-lg bg-transparent text-gray-400 font-medium text-xs border border-gray-700 hover:bg-gray-700 hover:text-white transition-all duration-200" onclick="document.getElementById('logoutModal').style.display = 'flex'">
                        Logout
                    </button>
                </div>
                @endauth
            </div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3.5 mb-6">
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
            </div>
            <div class="bg-slate-900 rounded-xl border border-gray-800 p-4 hover:border-gray-700 hover:bg-gray-800 transition-all duration-200">
                <div class="w-10 h-10 rounded-xl bg-purple-500/20 flex items-center justify-center mb-3">
                    <i class="fa-solid fa-medal text-purple-400 text-lg"></i>
                </div>
                <div class="text-3xl font-bold text-white font-serif tracking-tight">{{ $badgeCount }}</div>
                <div class="text-xs text-gray-400 mt-1">Badge diraih</div>
            </div>
            <div class="bg-slate-900 rounded-xl border border-gray-800 p-4 hover:border-gray-700 hover:bg-gray-800 transition-all duration-200">
                <div class="w-10 h-10 rounded-xl bg-amber-500/20 flex items-center justify-center mb-3">
                    <i class="fa-solid fa-fire text-amber-400 text-lg"></i>
                </div>
                <div class="text-3xl font-bold text-white font-serif tracking-tight">{{ $streak }}</div>
                <div class="text-xs text-gray-400 mt-1">Hari streak</div>
            </div>
        </div>

        <div class="bg-slate-900 rounded-xl border border-gray-800 overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-800">
                <h3 class="text-sm font-semibold text-white"><i class="fa-solid fa-clock-rotate-left mr-2"></i>Riwayat aktivitas</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-800">
                            <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wide">Level</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wide">Skor</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wide">XP</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wide">Tanggal</th>
                            <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wide">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($activities as $activity)
                        <tr class="border-b border-gray-800">
                            <td class="px-5 py-3 text-sm font-medium text-white">{{ $activity['level_name'] }}</td>
                            <td class="px-5 py-3 text-sm font-mono {{ $activity['score'] >= 60 ? 'text-green-400' : 'text-amber-400' }}">{{ $activity['score'] }}</td>
                            <td class="px-5 py-3 text-sm font-mono text-amber-400">+{{ $activity['xp'] }}</td>
                            <td class="px-5 py-3 text-sm text-gray-400">{{ $activity['date']->diffForHumans() }}</td>
                            <td class="px-5 py-3">
                                @if($activity['status'] === 'Lulus')
                                <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-green-500/15 text-green-400 text-xs font-medium">Lulus</span>
                                @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-red-500/15 text-red-400 text-xs font-medium">Gagal</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-5 py-8 text-center text-gray-500">Belum ada aktivitas</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="logoutModal" class="fixed inset-0 bg-black/60 z-[999] hidden items-center justify-center" onclick="if(event.target === this) this.style.display = 'none'">
    <div class="bg-slate-800 rounded-xl border border-gray-700 p-6 w-full max-w-[320px] text-center">
        <h3 class="text-lg font-semibold text-white mb-2">Konfirmasi Logout</h3>
        <p class="text-sm text-gray-400 mb-5">Anda yakin ingin keluar dari akun?</p>
        <div class="flex gap-3 justify-center">
            <button class="px-3 py-1.5 rounded-lg bg-transparent text-gray-400 font-medium text-xs border border-gray-700 hover:bg-gray-700 hover:text-white transition-all duration-200" onclick="document.getElementById('logoutModal').style.display = 'none'">Batal</button>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-500 text-white font-medium text-xs hover:bg-red-400 transition-all duration-200">Ya, Logout</button>
            </form>
        </div>
    </div>
</div>
@endsection
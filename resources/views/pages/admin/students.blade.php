@extends('layouts.admin')

@section('header_title', 'Data Mahasiswa')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h3 class="text-xl font-bold text-white">Daftar Pelajar</h3>
        <p class="text-sm text-slate-500">Monitoring dan kelola data mahasiswa PyLearn</p>
    </div>
</div>

<div class="glass-card rounded-3xl overflow-hidden border border-white/5">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-white/5">
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">No</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Mahasiswa</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">XP Progress</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Stats</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @foreach($users as $user)
                <tr class="hover:bg-white/[0.02] transition-colors group">
                    <td class="px-6 py-5 text-sm text-slate-500 font-mono">
                        {{ $loop->iteration + (($users->currentPage() - 1) * 20) }}
                    </td>
                    <td class="px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-xs font-bold text-white shadow-lg shadow-blue-600/20">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                            <div>
                                <div class="text-sm font-bold text-white group-hover:text-blue-400 transition-colors">{{ $user->name }}</div>
                                <div class="text-[11px] text-slate-500">{{ $user->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-5">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-sm font-bold text-amber-400 font-mono">{{ number_format($user->xp) }}</span>
                            <span class="text-[10px] text-slate-500 font-bold uppercase tracking-tighter">XP</span>
                        </div>
                        <div class="w-32 h-1.5 bg-white/5 rounded-full overflow-hidden">
                            <div class="h-full bg-blue-500 rounded-full" style="width: {{ min(($user->xp / 10000) * 100, 100) }}%"></div>
                        </div>
                    </td>
                    <td class="px-6 py-5">
                        <div class="flex items-center gap-4">
                            <div class="flex flex-col">
                                <span class="text-[10px] text-slate-500 uppercase font-bold tracking-widest">Streak</span>
                                <span class="text-xs font-bold text-orange-400 flex items-center gap-1">
                                    <i class="fas fa-fire text-[10px]"></i> {{ $user->login_streak ?? 0 }}
                                </span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-[10px] text-slate-500 uppercase font-bold tracking-widest">Levels</span>
                                <span class="text-xs font-bold text-emerald-400 flex items-center gap-1">
                                    <i class="fas fa-check-circle text-[10px]"></i> {{ $user->progress->count() }}
                                </span>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-5 text-right">
                        <button onclick="editStudent({{ $user->id }})" class="w-8 h-8 rounded-lg bg-blue-600/10 text-blue-400 hover:bg-blue-600 hover:text-white transition-all">
                            <i class="fas fa-edit text-xs"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-8">
    {{ $users->links() }}
</div>

<!-- Edit Modal -->
<div id="editModal" class="hidden fixed inset-0 bg-[#04091a]/80 backdrop-blur-sm flex items-center justify-center z-[100] p-4">
    <div class="glass-card bg-slate-900/90 rounded-3xl p-8 w-full max-w-md border border-white/10 shadow-2xl animate-in zoom-in duration-300">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 rounded-2xl bg-blue-600/20 flex items-center justify-center text-blue-400">
                <i class="fas fa-user-edit text-xl"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-white">Edit Mahasiswa</h2>
                <p class="text-xs text-slate-500 font-medium">Perbarui informasi profil mahasiswa</p>
            </div>
        </div>

        <form id="editForm" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Nama Lengkap</label>
                <input type="text" name="name" id="editName" required 
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 focus:ring-4 focus:ring-blue-500/10 transition-all placeholder-slate-600">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Email Edukasi</label>
                <input type="email" name="email" id="editEmail" required 
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 focus:ring-4 focus:ring-blue-500/10 transition-all placeholder-slate-600">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Total Experience (XP)</label>
                <input type="number" name="xp" id="editXp" 
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 focus:ring-4 focus:ring-blue-500/10 transition-all placeholder-slate-600 font-mono">
            </div>
            
            <div class="flex gap-3 pt-4">
                <button type="button" onclick="document.getElementById('editModal').classList.add('hidden')" 
                    class="flex-1 px-4 py-3.5 bg-white/5 hover:bg-white/10 text-white rounded-2xl text-xs font-bold transition-all border border-white/5">
                    Batalkan
                </button>
                <button type="submit" 
                    class="flex-[2] px-4 py-3.5 bg-blue-600 hover:bg-blue-500 text-white rounded-2xl text-xs font-bold transition-all shadow-lg shadow-blue-600/20">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
const users = @json($users->items());

function editStudent(id) {
    const u = users.find(x => x.id === id);
    if (!u) return;
    document.getElementById('editName').value = u.name;
    document.getElementById('editEmail').value = u.email;
    document.getElementById('editXp').value = u.xp || 0;
    document.getElementById('editForm').action = '/admin/students/' + id;
    document.getElementById('editModal').classList.remove('hidden');
}
</script>

<style>
    /* Pagination Styling */
    .pagination {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
    }
    .page-item .page-link {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.05);
        color: #94a3b8;
        padding: 0.5rem 1rem;
        border-radius: 0.75rem;
        font-size: 0.875rem;
        font-weight: 600;
        transition: all 0.2s;
    }
    .page-item.active .page-link {
        background: #3b82f6;
        color: white;
        border-color: #3b82f6;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }
    .page-item:hover .page-link {
        background: rgba(255, 255, 255, 0.1);
        color: white;
    }
</style>
@endsection
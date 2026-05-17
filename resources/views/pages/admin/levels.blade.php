@extends('layouts.admin')

@section('header_title', 'Kelola Level')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h3 class="text-xl font-bold text-white">Konfigurasi Level</h3>
        <p class="text-sm text-slate-500">Atur kurikulum dan urutan materi pembelajaran</p>
    </div>
</div>

<div class="glass-card rounded-3xl overflow-hidden border border-white/5">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-white/5">
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Urutan</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Nama Level</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Deskripsi</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Soal</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Status</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @foreach($levels as $level)
                <tr class="hover:bg-white/[0.02] transition-colors group">
                    <td class="px-6 py-5 text-sm text-slate-500 font-mono">
                        #{{ $level->order_number }}
                    </td>
                    <td class="px-6 py-5">
                        <div class="text-sm font-bold text-white group-hover:text-blue-400 transition-colors">{{ $level->name }}</div>
                    </td>
                    <td class="px-6 py-5">
                        <div class="text-xs text-slate-500 max-w-[250px] line-clamp-2">{{ $level->description ?? '-' }}</div>
                    </td>
                    <td class="px-6 py-5">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-[10px] font-bold text-slate-400 border border-white/5">
                                {{ $level->questions->count() }}
                            </div>
                            <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Soal</span>
                        </div>
                    </td>
                    <td class="px-6 py-5">
                        @if($level->is_active)
                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-emerald-500/10 text-emerald-400 text-[10px] font-bold uppercase tracking-widest border border-emerald-500/20">
                            <i class="fas fa-check-circle mr-1.5"></i>Aktif
                        </span>
                        @else
                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-red-500/10 text-red-400 text-[10px] font-bold uppercase tracking-widest border border-red-500/20">
                            <i class="fas fa-times-circle mr-1.5"></i>Nonaktif
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-5 text-right">
                        <button onclick="editLevel({{ $level->id }})" class="w-8 h-8 rounded-lg bg-blue-600/10 text-blue-400 hover:bg-blue-600 hover:text-white transition-all">
                            <i class="fas fa-edit text-xs"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="hidden fixed inset-0 bg-[#04091a]/80 backdrop-blur-sm flex items-center justify-center z-[100] p-4">
    <div class="glass-card bg-slate-900/90 rounded-3xl p-8 w-full max-w-md border border-white/10 shadow-2xl animate-in zoom-in duration-300">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 rounded-2xl bg-emerald-600/20 flex items-center justify-center text-emerald-400">
                <i class="fas fa-layer-group text-xl"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-white">Edit Level</h2>
                <p class="text-xs text-slate-500 font-medium">Atur properti dan status level</p>
            </div>
        </div>

        <form id="editForm" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Nama Level</label>
                <input type="text" name="name" id="editName" required 
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 focus:ring-4 focus:ring-blue-500/10 transition-all placeholder-slate-600">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Deskripsi Singkat</label>
                <textarea name="description" id="editDescription" rows="3"
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 focus:ring-4 focus:ring-blue-500/10 transition-all placeholder-slate-600"></textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Urutan</label>
                    <input type="number" name="order_number" id="editOrder" required 
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 focus:ring-4 focus:ring-blue-500/10 transition-all font-mono">
                </div>
                <div class="flex items-end pb-3 pl-2">
                    <label class="flex items-center cursor-pointer group">
                        <div class="relative">
                            <input type="checkbox" name="is_active" id="editActive" class="sr-only peer">
                            <div class="w-10 h-5 bg-white/10 rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-slate-400 after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-emerald-500 peer-checked:after:bg-white"></div>
                        </div>
                        <span class="ml-3 text-[10px] font-bold text-slate-500 uppercase tracking-widest group-hover:text-slate-300 transition-colors">Aktif</span>
                    </label>
                </div>
            </div>
            
            <div class="flex gap-3 pt-4">
                <button type="button" onclick="document.getElementById('editModal').classList.add('hidden')" 
                    class="flex-1 px-4 py-3.5 bg-white/5 hover:bg-white/10 text-white rounded-2xl text-xs font-bold transition-all border border-white/5">
                    Batalkan
                </button>
                <button type="submit" 
                    class="flex-[2] px-4 py-3.5 bg-emerald-600 hover:bg-emerald-500 text-white rounded-2xl text-xs font-bold transition-all shadow-lg shadow-emerald-600/20">
                    Update Level
                </button>
            </div>
        </form>
    </div>
</div>

<script>
const levels = @json($levels);

function editLevel(id) {
    const l = levels.find(x => x.id === id);
    if (!l) return;
    document.getElementById('editName').value = l.name;
    document.getElementById('editDescription').value = l.description || '';
    document.getElementById('editOrder').value = l.order_number;
    document.getElementById('editActive').checked = l.is_active;
    document.getElementById('editForm').action = '/admin/levels/' + id;
    document.getElementById('editModal').classList.remove('hidden');
}
</script>
@endsection
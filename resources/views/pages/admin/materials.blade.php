@extends('layouts.admin')

@section('header_title', 'Kelola Materi')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h3 class="text-xl font-bold text-white">Kurikulum Materi</h3>
        <p class="text-sm text-slate-500">Kelola modul pembelajaran dan urutan materi</p>
    </div>
    <button onclick="document.getElementById('addModal').classList.remove('hidden')" 
        class="px-5 py-3 bg-blue-600 hover:bg-blue-500 text-white rounded-2xl text-xs font-bold transition-all shadow-lg shadow-blue-600/20 flex items-center gap-2">
        <i class="fas fa-plus"></i> Tambah Materi Baru
    </button>
</div>

<div class="glass-card rounded-3xl overflow-hidden border border-white/5">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-white/5">
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Urutan</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Nama Materi</th>
                    <th class="hidden md:table-cell px-3 sm:px-6 py-3 sm:py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Deskripsi</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Quiz</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @foreach($levels as $level)
                <tr class="hover:bg-white/[0.02] transition-colors group">
                    <td class="px-3 sm:px-6 py-3 sm:py-5 text-xs sm:text-sm text-slate-500 font-mono">
                        #{{ $level->order_number }}
                    </td>
                    <td class="px-3 sm:px-6 py-3 sm:py-5">
                        <div class="text-xs sm:text-sm font-bold text-white group-hover:text-blue-400 transition-colors">{{ $level->name }}</div>
                    </td>
                    <td class="hidden md:table-cell px-3 sm:px-6 py-3 sm:py-5">
                        <div class="text-xs text-slate-500 max-w-[200px] line-clamp-2 leading-relaxed">{{ $level->description ?? '-' }}</div>
                    </td>
                    <td class="px-3 sm:px-6 py-3 sm:py-5">
                        <div class="flex items-center gap-1 sm:gap-2">
                            <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-lg bg-white/5 flex items-center justify-center text-[10px] font-bold text-slate-400 border border-white/5">
                                {{ $level->questions->count() }}
                            </div>
                        </div>
                    </td>
                    <td class="px-3 sm:px-6 py-3 sm:py-5 text-right">
                        <div class="flex justify-end gap-1 sm:gap-2">
                            <button onclick="editMaterial({{ $level->id }}, '{{ addslashes($level->name) }}', '{{ addslashes($level->description) }}', {{ $level->order_number }}, '{{ addslashes($level->content ?? '') }}')" 
                                class="w-7 h-7 sm:w-8 sm:h-8 rounded-lg bg-blue-600/10 text-blue-400 hover:bg-blue-600 hover:text-white transition-all">
                                <i class="fas fa-edit text-[10px] sm:text-xs"></i>
                            </button>
                            <form action="{{ route('admin.materials.destroy', $level) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-7 h-7 sm:w-8 sm:h-8 rounded-lg bg-red-600/10 text-red-400 hover:bg-red-600 hover:text-white transition-all" onclick="return confirm('Yakin hapus materi ini?')">
                                    <i class="fas fa-trash text-[10px] sm:text-xs"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div id="addModal" class="hidden fixed inset-0 bg-[#04091a]/80 backdrop-blur-sm flex items-center justify-center z-[100] p-4">
    <div class="glass-card bg-slate-900/90 rounded-3xl p-8 w-full max-w-md border border-white/10 shadow-2xl animate-in zoom-in duration-300">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 rounded-2xl bg-blue-600/20 flex items-center justify-center text-blue-400">
                <i class="fas fa-plus text-xl"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-white">Tambah Materi</h2>
                <p class="text-xs text-slate-500 font-medium">Buat modul pembelajaran baru</p>
            </div>
        </div>

        <form action="{{ route('admin.materials.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Nama Materi</label>
                <input type="text" name="name" required placeholder="Contoh: Dasar-dasar Python"
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 focus:ring-4 focus:ring-blue-500/10 transition-all placeholder-slate-600">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Deskripsi Materi</label>
                <textarea name="description" rows="3" placeholder="Jelaskan apa yang akan dipelajari..."
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 focus:ring-4 focus:ring-blue-500/10 transition-all placeholder-slate-600"></textarea>
            </div>
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Konten Materi <span class="text-slate-600 font-normal normal-case tracking-normal">(Markdown/HTML)</span></label>
                <textarea name="content" rows="8" placeholder="Tulis materi pembelajaran di sini..."
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white font-mono focus:outline-none focus:border-blue-500/50 focus:ring-4 focus:ring-blue-500/10 transition-all placeholder-slate-600"></textarea>
            </div>
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Urutan (Order Number)</label>
                <input type="number" name="order_number" required 
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 focus:ring-4 focus:ring-blue-500/10 transition-all font-mono">
            </div>
            
            <div class="flex gap-3 pt-4">
                <button type="button" onclick="document.getElementById('addModal').classList.add('hidden')" 
                    class="flex-1 px-4 py-3.5 bg-white/5 hover:bg-white/10 text-white rounded-2xl text-xs font-bold transition-all border border-white/5">
                    Batalkan
                </button>
                <button type="submit" 
                    class="flex-[2] px-4 py-3.5 bg-blue-600 hover:bg-blue-500 text-white rounded-2xl text-xs font-bold transition-all shadow-lg shadow-blue-600/20">
                    Simpan Materi
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="hidden fixed inset-0 bg-[#04091a]/80 backdrop-blur-sm flex items-center justify-center z-[100] p-4">
    <div class="glass-card bg-slate-900/90 rounded-3xl p-8 w-full max-w-md border border-white/10 shadow-2xl animate-in zoom-in duration-300">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 rounded-2xl bg-amber-500/20 flex items-center justify-center text-amber-400">
                <i class="fas fa-edit text-xl"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-white">Edit Materi</h2>
                <p class="text-xs text-slate-500 font-medium">Perbarui informasi modul belajar</p>
            </div>
        </div>

        <form id="editForm" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Nama Materi</label>
                <input type="text" name="name" id="editName" required 
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 focus:ring-4 focus:ring-blue-500/10 transition-all placeholder-slate-600">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Deskripsi Materi</label>
                <textarea name="description" id="editDescription" rows="3"
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 focus:ring-4 focus:ring-blue-500/10 transition-all placeholder-slate-600"></textarea>
            </div>
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Konten Materi <span class="text-slate-600 font-normal normal-case tracking-normal">(Markdown/HTML)</span></label>
                <textarea name="content" id="editContent" rows="8"
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white font-mono focus:outline-none focus:border-blue-500/50 focus:ring-4 focus:ring-blue-500/10 transition-all placeholder-slate-600"></textarea>
            </div>
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Urutan (Order Number)</label>
                <input type="number" name="order_number" id="editOrder" required 
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 focus:ring-4 focus:ring-blue-500/10 transition-all font-mono">
            </div>
            
            <div class="flex gap-3 pt-4">
                <button type="button" onclick="document.getElementById('editModal').classList.add('hidden')" 
                    class="flex-1 px-4 py-3.5 bg-white/5 hover:bg-white/10 text-white rounded-2xl text-xs font-bold transition-all border border-white/5">
                    Batalkan
                </button>
                <button type="submit" 
                    class="flex-[2] px-4 py-3.5 bg-amber-600 hover:bg-amber-500 text-white rounded-2xl text-xs font-bold transition-all shadow-lg shadow-amber-600/20">
                    Update Materi
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function editMaterial(id, name, description, order, content) {
    document.getElementById('editName').value = name;
    document.getElementById('editDescription').value = description || '';
    document.getElementById('editOrder').value = order;
    document.getElementById('editContent').value = content || '';
    document.getElementById('editForm').action = '/admin/materials/' + id;
    document.getElementById('editModal').classList.remove('hidden');
}
</script>
@endsection
@extends('layouts.admin')

@section('header_title', 'Kelola Badge')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h3 class="text-xl font-bold text-white">Sistem Achievement</h3>
        <p class="text-sm text-slate-500">Atur hadiah dan badge untuk memotivasi pelajar</p>
    </div>
    <button onclick="document.getElementById('addModal').classList.remove('hidden')" 
        class="px-4 sm:px-5 py-2.5 sm:py-3 bg-amber-600 hover:bg-amber-500 text-white rounded-2xl text-[10px] sm:text-xs font-bold transition-all shadow-lg shadow-amber-600/20 flex items-center gap-2">
        <i class="fas fa-plus"></i> Tambah Badge
    </button>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($badges as $badge)
    <div class="glass-card rounded-3xl p-6 hover:bg-white/5 transition-all duration-300 group relative overflow-hidden">
        <div class="absolute top-0 right-0 w-24 h-24 blur-3xl -mr-12 -mt-12 transition-colors" style="background: {{ $badge->color ?? '#f59e0b' }}0d;"></div>
        
        <div class="flex items-center gap-5 mb-6">
            <div class="w-16 h-16 rounded-2xl flex items-center justify-center border border-white/5 shadow-xl group-hover:scale-110 transition-transform duration-500" style="background: linear-gradient(135deg, {{ $badge->color ?? '#f59e0b' }}33, {{ $badge->color ?? '#f59e0b' }}1a);">
                <i class="{{ $badge->icon ?? 'fa-solid fa-medal' }} text-2xl" style="color: {{ $badge->color ?? '#f59e0b' }}; filter: drop-shadow(0 0 6px {{ $badge->color ?? '#f59e0b' }}66);"></i>
            </div>
            <div>
                <h3 class="text-lg font-bold text-white transition-colors" style="--badge-color: {{ $badge->color ?? '#f59e0b' }};" onmouseenter="this.style.color=this.style.getPropertyValue('--badge-color')" onmouseleave="this.style.color=''">{{ $badge->name }}</h3>
                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest bg-white/5 px-2 py-1 rounded-md">{{ $badge->condition ?? 'Manual' }}</span>
            </div>
        </div>

        <p class="text-sm text-slate-400 mb-6 leading-relaxed min-h-[40px]">
            {{ $badge->description ?? 'Tidak ada deskripsi tersedia untuk badge ini.' }}
        </p>

        <div class="pt-6 border-t border-white/5 flex items-center justify-between">
            <div class="flex gap-2">
                <button onclick="editBadge({{ $badge->id }})" 
                    class="px-4 py-2 bg-blue-600/10 text-blue-400 hover:bg-blue-600 hover:text-white rounded-xl text-xs font-bold transition-all">
                    <i class="fas fa-edit mr-1.5"></i> Edit
                </button>
                <form action="{{ route('admin.badges.destroy', $badge) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600/10 text-red-400 hover:bg-red-600 hover:text-white rounded-xl text-xs font-bold transition-all" onclick="return confirm('Yakin hapus badge ini?')">
                        <i class="fas fa-trash mr-1.5"></i>
                    </button>
                </form>
            </div>
            <span class="text-[10px] font-bold text-slate-600 uppercase tracking-tighter">Achievement ID: #{{ $badge->id }}</span>
        </div>
    </div>
    @endforeach
</div>

<!-- Add Modal -->
<div id="addModal" class="hidden fixed inset-0 bg-[#04091a]/80 backdrop-blur-sm flex items-center justify-center z-[100] p-4">
    <div class="glass-card bg-slate-900/90 rounded-3xl p-8 w-full max-w-md border border-white/10 shadow-2xl animate-in zoom-in duration-300">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 rounded-2xl bg-amber-600/20 flex items-center justify-center text-amber-400">
                <i class="fas fa-medal text-xl"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-white">Tambah Badge</h2>
                <p class="text-xs text-slate-500 font-medium">Buat achievement baru</p>
            </div>
        </div>

        <form action="{{ route('admin.badges.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Nama Badge</label>
                <input type="text" name="name" required placeholder="Contoh: Master Python"
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-amber-500/50 transition-all placeholder-slate-600">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Deskripsi</label>
                <textarea name="description" rows="2" placeholder="Dapatkan badge ini dengan cara..."
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-amber-500/50 transition-all placeholder-slate-600"></textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Ikon (FontAwesome)</label>
                    <input type="text" name="icon" placeholder="fa-medal"
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-amber-500/50 transition-all font-mono">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Kondisi (Code)</label>
                    <input type="text" name="condition" placeholder="streak_7"
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-amber-500/50 transition-all font-mono">
                </div>
            </div>
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Warna Badge</label>
                <div class="flex items-center gap-3">
                    <input type="color" name="color" id="addColor" value="#f59e0b"
                        class="w-12 h-12 rounded-xl border border-white/10 cursor-pointer bg-transparent">
                    <input type="text" id="addColorText" value="#f59e0b" maxlength="7"
                        class="flex-1 bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-amber-500/50 transition-all font-mono"
                        oninput="document.getElementById('addColor').value=this.value">
                </div>
            </div>
            
            <div class="flex gap-3 pt-4">
                <button type="button" onclick="document.getElementById('addModal').classList.add('hidden')" 
                    class="flex-1 px-4 py-3.5 bg-white/5 hover:bg-white/10 text-white rounded-2xl text-xs font-bold transition-all border border-white/5">
                    Batalkan
                </button>
                <button type="submit" 
                    class="flex-[2] px-4 py-3.5 bg-amber-600 hover:bg-amber-500 text-white rounded-2xl text-xs font-bold transition-all shadow-lg shadow-amber-600/20">
                    Simpan Badge
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="hidden fixed inset-0 bg-[#04091a]/80 backdrop-blur-sm flex items-center justify-center z-[100] p-4">
    <div class="glass-card bg-slate-900/90 rounded-3xl p-8 w-full max-w-md border border-white/10 shadow-2xl animate-in zoom-in duration-300">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 rounded-2xl bg-blue-600/20 flex items-center justify-center text-blue-400">
                <i class="fas fa-edit text-xl"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-white">Edit Badge</h2>
                <p class="text-xs text-slate-500 font-medium">Perbarui informasi achievement</p>
            </div>
        </div>

        <form id="editForm" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Nama Badge</label>
                <input type="text" name="name" id="editName" required 
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 transition-all">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Deskripsi</label>
                <textarea name="description" id="editDescription" rows="2"
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 transition-all"></textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Ikon</label>
                    <input type="text" name="icon" id="editIcon" 
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 transition-all font-mono">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Kondisi</label>
                    <input type="text" name="condition" id="editCondition" 
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 transition-all font-mono">
                </div>
            </div>
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Warna Badge</label>
                <div class="flex items-center gap-3">
                    <input type="color" name="color" id="editColor" value="#f59e0b"
                        class="w-12 h-12 rounded-xl border border-white/10 cursor-pointer bg-transparent">
                    <input type="text" id="editColorText" value="#f59e0b" maxlength="7"
                        class="flex-1 bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 transition-all font-mono"
                        oninput="document.getElementById('editColor').value=this.value">
                </div>
            </div>
            
            <div class="flex gap-3 pt-4">
                <button type="button" onclick="document.getElementById('editModal').classList.add('hidden')" 
                    class="flex-1 px-4 py-3.5 bg-white/5 hover:bg-white/10 text-white rounded-2xl text-xs font-bold transition-all border border-white/5">
                    Batalkan
                </button>
                <button type="submit" 
                    class="flex-[2] px-4 py-3.5 bg-blue-600 hover:bg-blue-500 text-white rounded-2xl text-xs font-bold transition-all shadow-lg shadow-blue-600/20">
                    Update Badge
                </button>
            </div>
        </form>
    </div>
</div>

<script>
const badges = @json($badges);

function editBadge(id) {
    const b = badges.find(x => x.id === id);
    if (!b) return;
    document.getElementById('editName').value = b.name;
    document.getElementById('editDescription').value = b.description || '';
    document.getElementById('editIcon').value = b.icon || '';
    document.getElementById('editCondition').value = b.condition || '';
    const color = b.color || '#f59e0b';
    document.getElementById('editColor').value = color;
    document.getElementById('editColorText').value = color;
    document.getElementById('editForm').action = '/admin/badges/' + id;
    document.getElementById('editModal').classList.remove('hidden');
}
</script>
@endsection
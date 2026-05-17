@extends('layouts.admin')

@section('header_title', 'Kelola Quiz')

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <h3 class="text-xl font-bold text-white">Bank Soal & Quiz</h3>
        <p class="text-sm text-slate-500">Kelola pertanyaan evaluasi untuk setiap level</p>
    </div>
    <button onclick="document.getElementById('addModal').classList.remove('hidden')" 
        class="px-5 py-3 bg-emerald-600 hover:bg-emerald-500 text-white rounded-2xl text-xs font-bold transition-all shadow-lg shadow-emerald-600/20 flex items-center gap-2">
        <i class="fas fa-plus"></i> Tambah Soal Baru
    </button>
</div>

<div class="glass-card rounded-3xl overflow-hidden border border-white/5">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-white/5">
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Level</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Pertanyaan</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Tipe</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Jawaban Benar</th>
                    <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @foreach($questions as $question)
                <tr class="hover:bg-white/[0.02] transition-colors group">
                    <td class="px-6 py-5">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-blue-500/10 text-blue-400 text-[10px] font-bold uppercase tracking-widest border border-blue-500/20">
                            {{ $question->level->name }}
                        </span>
                    </td>
                    <td class="px-6 py-5">
                        <div class="text-sm font-medium text-white group-hover:text-blue-400 transition-colors max-w-[300px] truncate">{{ $question->question_text }}</div>
                    </td>
                    <td class="px-6 py-5">
                        @if($question->type === 'coding')
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-purple-400 text-[10px] font-bold bg-purple-500/10 border border-purple-500/20">
                            <i class="fas fa-code mr-1.5"></i>CODING
                        </span>
                        @else
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-blue-400 text-[10px] font-bold bg-blue-500/10 border border-blue-500/20">
                            <i class="fas fa-list-ul mr-1.5"></i>CHOICE
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-5">
                        <code class="text-xs text-emerald-400 font-mono bg-emerald-500/5 px-2 py-1 rounded border border-emerald-500/10">{{ $question->correct_answer }}</code>
                    </td>
                    <td class="px-6 py-5 text-right">
                        <div class="flex justify-end gap-2">
                            <button onclick="editQuiz({{ $question->id }})" 
                                class="w-8 h-8 rounded-lg bg-blue-600/10 text-blue-400 hover:bg-blue-600 hover:text-white transition-all">
                                <i class="fas fa-edit text-xs"></i>
                            </button>
                            <form action="{{ route('admin.quizzes.destroy', $question) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-8 h-8 rounded-lg bg-red-600/10 text-red-400 hover:bg-red-600 hover:text-white transition-all" onclick="return confirm('Yakin hapus quiz ini?')">
                                    <i class="fas fa-trash text-xs"></i>
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
    <div class="glass-card bg-slate-900/90 rounded-3xl p-8 w-full max-w-2xl max-h-[90vh] overflow-y-auto border border-white/10 shadow-2xl animate-in zoom-in duration-300">
        <div class="flex items-center gap-4 mb-8">
            <div class="w-12 h-12 rounded-2xl bg-emerald-600/20 flex items-center justify-center text-emerald-400">
                <i class="fas fa-plus text-xl"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-white">Tambah Soal Baru</h2>
                <p class="text-xs text-slate-500 font-medium">Buat tantangan baru untuk mahasiswa</p>
            </div>
        </div>

        <form action="{{ route('admin.quizzes.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Pilih Level</label>
                    <select name="level_id" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 transition-all appearance-none">
                        @foreach($levels as $level)
                        <option value="{{ $level->id }}" class="bg-slate-900">{{ $level->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Tipe Soal</label>
                    <select name="type" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 transition-all appearance-none">
                        <option value="multiple_choice" class="bg-slate-900">Multiple Choice</option>
                        <option value="coding" class="bg-slate-900">Coding Question</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Pertanyaan</label>
                <textarea name="question_text" required rows="3" placeholder="Apa yang ingin kamu tanyakan?"
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 transition-all placeholder-slate-600"></textarea>
            </div>

            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Kode Snippet (Opsional)</label>
                <div class="relative group">
                    <div class="absolute top-3 right-4 text-[10px] font-bold text-blue-500 uppercase tracking-widest bg-blue-500/10 px-2 py-1 rounded">Python</div>
                    <textarea name="code_snippet" rows="5" placeholder="# Tulis kode python di sini..."
                        class="w-full bg-black/40 border border-white/5 rounded-2xl px-5 py-6 text-sm text-blue-300 font-mono focus:outline-none focus:border-blue-500/30 transition-all"></textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Jawaban Benar</label>
                    <input type="text" name="correct_answer" required placeholder="Gunakan koma untuk pilihan ganda"
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-emerald-400 font-mono focus:outline-none focus:border-emerald-500/50 transition-all placeholder-slate-600">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Penjelasan (Opsional)</label>
                    <input type="text" name="explanation" placeholder="Kenapa jawaban ini benar?"
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 transition-all placeholder-slate-600">
                </div>
            </div>

            <div class="flex gap-4 pt-4">
                <button type="button" onclick="document.getElementById('addModal').classList.add('hidden')" 
                    class="flex-1 px-4 py-4 bg-white/5 hover:bg-white/10 text-white rounded-2xl text-xs font-bold transition-all border border-white/5">
                    Batal
                </button>
                <button type="submit" 
                    class="flex-[2] px-4 py-4 bg-emerald-600 hover:bg-emerald-500 text-white rounded-2xl text-xs font-bold transition-all shadow-lg shadow-emerald-600/20">
                    Simpan Pertanyaan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="hidden fixed inset-0 bg-[#04091a]/80 backdrop-blur-sm flex items-center justify-center z-[100] p-4">
    <div class="glass-card bg-slate-900/90 rounded-3xl p-8 w-full max-w-2xl max-h-[90vh] overflow-y-auto border border-white/10 shadow-2xl animate-in zoom-in duration-300">
        <div class="flex items-center gap-4 mb-8">
            <div class="w-12 h-12 rounded-2xl bg-blue-600/20 flex items-center justify-center text-blue-400">
                <i class="fas fa-edit text-xl"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-white">Edit Pertanyaan</h2>
                <p class="text-xs text-slate-500 font-medium">Perbarui detail soal dan jawaban</p>
            </div>
        </div>

        <form id="editForm" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Pilih Level</label>
                    <select name="level_id" id="editLevel" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 transition-all appearance-none">
                        @foreach($levels as $level)
                        <option value="{{ $level->id }}" class="bg-slate-900">{{ $level->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Tipe Soal</label>
                    <select name="type" id="editType" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 transition-all appearance-none">
                        <option value="multiple_choice" class="bg-slate-900">Multiple Choice</option>
                        <option value="coding" class="bg-slate-900">Coding Question</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Pertanyaan</label>
                <textarea name="question_text" id="editQuestion" required rows="3"
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 transition-all placeholder-slate-600"></textarea>
            </div>

            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Kode Snippet (Opsional)</label>
                <div class="relative group">
                    <div class="absolute top-3 right-4 text-[10px] font-bold text-blue-500 uppercase tracking-widest bg-blue-500/10 px-2 py-1 rounded">Python</div>
                    <textarea name="code_snippet" id="editCode" rows="5"
                        class="w-full bg-black/40 border border-white/5 rounded-2xl px-5 py-6 text-sm text-blue-300 font-mono focus:outline-none focus:border-blue-500/30 transition-all"></textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Jawaban Benar</label>
                    <input type="text" name="correct_answer" id="editAnswer" required 
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-emerald-400 font-mono focus:outline-none focus:border-emerald-500/50 transition-all">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Penjelasan (Opsional)</label>
                    <input type="text" name="explanation" id="editExplanation" 
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 transition-all">
                </div>
            </div>

            <div class="flex gap-4 pt-4">
                <button type="button" onclick="document.getElementById('editModal').classList.add('hidden')" 
                    class="flex-1 px-4 py-4 bg-white/5 hover:bg-white/10 text-white rounded-2xl text-xs font-bold transition-all border border-white/5">
                    Batal
                </button>
                <button type="submit" 
                    class="flex-[2] px-4 py-4 bg-blue-600 hover:bg-blue-500 text-white rounded-2xl text-xs font-bold transition-all shadow-lg shadow-blue-600/20">
                    Update Pertanyaan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
const questions = @json($questions);

function editQuiz(id) {
    const q = questions.find(x => x.id === id);
    if (!q) return;
    document.getElementById('editLevel').value = q.level_id;
    document.getElementById('editType').value = q.type;
    document.getElementById('editQuestion').value = q.question_text;
    document.getElementById('editCode').value = q.code_snippet || '';
    document.getElementById('editAnswer').value = q.correct_answer;
    document.getElementById('editExplanation').value = q.explanation || '';
    document.getElementById('editForm').action = '/admin/quizzes/' + id;
    document.getElementById('editModal').classList.remove('hidden');
}
</script>
@endsection
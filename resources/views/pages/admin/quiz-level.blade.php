@extends('layouts.admin')

@section('header_title', 'Quiz Level: ' . $level->name)

@section('content')
<div class="flex items-center justify-between mb-8">
    <div>
        <div class="flex items-center gap-2 sm:gap-3 mb-2">
            <a href="{{ route('admin.quizzes') }}" class="text-slate-400 hover:text-white transition-all">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h3 class="text-lg sm:text-xl font-bold text-white truncate">Soal {{ $level->name }}</h3>
            <span class="inline-flex items-center px-2 py-1 rounded-lg bg-blue-500/10 text-blue-400 text-[10px] font-bold uppercase tracking-widest border border-blue-500/20 shrink-0">
                {{ $questions->count() }} Soal
            </span>
        </div>
        <p class="text-xs sm:text-sm text-slate-500">Kelola pertanyaan evaluasi untuk level ini</p>
    </div>
    <button onclick="document.getElementById('addModal').classList.remove('hidden')" 
        class="px-3 sm:px-5 py-2 sm:py-3 bg-emerald-600 hover:bg-emerald-500 text-white rounded-xl sm:rounded-2xl text-[10px] sm:text-xs font-bold transition-all shadow-lg shadow-emerald-600/20 flex items-center gap-1 sm:gap-2 shrink-0">
        <i class="fas fa-plus"></i> <span class="hidden sm:inline">Tambah Soal Baru</span><span class="sm:hidden">Tambah</span>
    </button>
</div>

<div class="glass-card rounded-3xl overflow-hidden border border-white/5">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-white/5">
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">#</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Pertanyaan</th>
                    <th class="hidden md:table-cell px-3 sm:px-6 py-3 sm:py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Kode</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Tipe</th>
                    <th class="hidden sm:table-cell px-3 sm:px-6 py-3 sm:py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5">Jawaban</th>
                    <th class="px-3 sm:px-6 py-3 sm:py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-white/5 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($questions as $i => $question)
                <tr class="hover:bg-white/[0.02] transition-colors group">
                    <td class="px-3 sm:px-6 py-3 sm:py-5">
                        <span class="text-xs sm:text-sm text-slate-500 font-mono">{{ $i + 1 }}</span>
                    </td>
                    <td class="px-3 sm:px-6 py-3 sm:py-5">
                        <div class="text-xs sm:text-sm font-medium text-white group-hover:text-blue-400 transition-colors max-w-[200px] truncate">{{ $question->question_text }}</div>
                    </td>
                    <td class="hidden md:table-cell px-3 sm:px-6 py-3 sm:py-5">
                        @if($question->code_snippet)
                        <div onclick="previewCode({{ $question->id }})" class="cursor-pointer group">
                            <pre class="text-[11px] text-cyan-300 font-mono leading-relaxed overflow-y-auto max-h-[60px] bg-black/30 rounded-lg p-2 border border-white/5 group-hover:border-cyan-500/30 transition-all"><code>{{ \Illuminate\Support\Str::limit($question->code_snippet, 80) }}</code></pre>
                        </div>
                        @else
                        <span class="text-slate-600 text-[10px]">—</span>
                        @endif
                    </td>
                    <td class="px-3 sm:px-6 py-3 sm:py-5">
                        @if($question->type === 'coding')
                        <span class="inline-flex items-center px-1.5 sm:px-2 py-0.5 rounded text-purple-400 text-[10px] font-bold bg-purple-500/10 border border-purple-500/20">
                            <i class="fas fa-code mr-1"></i>CODING
                        </span>
                        @else
                        <span class="inline-flex items-center px-1.5 sm:px-2 py-0.5 rounded text-blue-400 text-[10px] font-bold bg-blue-500/10 border border-blue-500/20">
                            <i class="fas fa-list-ul mr-1"></i>PILIHAN
                        </span>
                        @endif
                    </td>
                    <td class="hidden sm:table-cell px-3 sm:px-6 py-3 sm:py-5">
                        <code class="text-[10px] sm:text-xs text-emerald-400 font-mono bg-emerald-500/5 px-2 py-1 rounded border border-emerald-500/10">{{ $question->correct_answer }}</code>
                    </td>
                    <td class="px-3 sm:px-6 py-3 sm:py-5 text-right">
                        <div class="flex justify-end gap-1 sm:gap-2">
                            <button onclick="editQuiz({{ $question->id }})" 
                                class="w-7 h-7 sm:w-8 sm:h-8 rounded-lg bg-blue-600/10 text-blue-400 hover:bg-blue-600 hover:text-white transition-all">
                                <i class="fas fa-edit text-[10px] sm:text-xs"></i>
                            </button>
                            <form action="{{ route('admin.quizzes.destroy', $question) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-7 h-7 sm:w-8 sm:h-8 rounded-lg bg-red-600/10 text-red-400 hover:bg-red-600 hover:text-white transition-all" onclick="return confirm('Yakin hapus quiz ini?')">
                                    <i class="fas fa-trash text-[10px] sm:text-xs"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-16 text-center">
                        <div class="flex flex-col items-center gap-3">
                            <div class="w-14 h-14 rounded-2xl bg-slate-700/30 flex items-center justify-center">
                                <i class="fas fa-question text-slate-500 text-xl"></i>
                            </div>
                            <p class="text-slate-500 text-sm font-medium">Belum ada soal untuk level ini</p>
                            <button onclick="document.getElementById('addModal').classList.remove('hidden')" class="px-4 py-2 bg-emerald-600/20 text-emerald-400 rounded-xl text-xs font-bold hover:bg-emerald-600/30 transition-all">
                                Tambah Soal Pertama
                            </button>
                        </div>
                    </td>
                </tr>
                @endforelse
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
                <p class="text-xs text-slate-500 font-medium">{{ $level->name }}</p>
            </div>
        </div>

        <form action="{{ route('admin.quizzes.store') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="level_id" value="{{ $level->id }}">

            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Tipe Soal</label>
                <select name="type" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 transition-all appearance-none">
                    <option value="multiple_choice" class="bg-slate-900">Multiple Choice</option>
                    <option value="coding" class="bg-slate-900">Coding Question</option>
                </select>
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

            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Opsi Jawaban (Opsional — satu baris per opsi)</label>
                <textarea name="options" rows="4" placeholder="Opsi A&#10;Opsi B&#10;Opsi C&#10;Opsi D"
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white font-mono focus:outline-none focus:border-blue-500/50 transition-all placeholder-slate-600"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Jawaban Benar</label>
                    <input type="text" name="correct_answer" required placeholder="Tulis jawaban yang benar"
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
            <input type="hidden" name="level_id" id="editLevel" value="{{ $level->id }}">
            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Tipe Soal</label>
                <select name="type" id="editType" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white focus:outline-none focus:border-blue-500/50 transition-all appearance-none">
                    <option value="multiple_choice" class="bg-slate-900">Multiple Choice</option>
                    <option value="coding" class="bg-slate-900">Coding Question</option>
                </select>
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

            <div>
                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Opsi Jawaban (Opsional — satu baris per opsi)</label>
                <textarea name="options" id="editOptions" rows="4"
                    class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-sm text-white font-mono focus:outline-none focus:border-blue-500/50 transition-all placeholder-slate-600"></textarea>
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

<!-- Code Preview Modal -->
<div id="codePreviewModal" class="hidden fixed inset-0 bg-[#04091a]/80 backdrop-blur-sm flex items-center justify-center z-[100] p-4">
    <div class="glass-card bg-slate-900/90 rounded-3xl p-8 w-full max-w-3xl max-h-[90vh] overflow-y-auto border border-white/10 shadow-2xl animate-in zoom-in duration-300">
        <div class="flex items-center gap-4 mb-8">
            <div class="w-12 h-12 rounded-2xl bg-cyan-600/20 flex items-center justify-center text-cyan-400">
                <i class="fas fa-code text-xl"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-white">Kode Snippet</h2>
                <p class="text-xs text-slate-500 font-medium" id="codePreviewQuestion">Pratinjau kode Python</p>
            </div>
            <button onclick="document.getElementById('codePreviewModal').classList.add('hidden')" class="ml-auto w-10 h-10 rounded-xl bg-white/5 hover:bg-white/10 text-white transition-all">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="bg-black/60 border border-white/5 rounded-2xl p-6 overflow-x-auto">
            <pre><code id="codePreviewContent" class="text-sm text-blue-300 font-mono leading-relaxed whitespace-pre-wrap"></code></pre>
        </div>
        <div class="flex justify-end mt-6">
            <button onclick="document.getElementById('codePreviewModal').classList.add('hidden')" class="px-6 py-3 bg-white/5 hover:bg-white/10 text-white rounded-2xl text-xs font-bold transition-all border border-white/5">
                Tutup
            </button>
        </div>
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
    document.getElementById('editOptions').value = Array.isArray(q.options) ? q.options.join('\n') : '';
    document.getElementById('editAnswer').value = q.correct_answer;
    document.getElementById('editExplanation').value = q.explanation || '';
    document.getElementById('editForm').action = '/admin/quizzes/' + id;
    document.getElementById('editModal').classList.remove('hidden');
}

function previewCode(id) {
    const q = questions.find(x => x.id === id);
    if (!q || !q.code_snippet) return;
    document.getElementById('codePreviewContent').textContent = q.code_snippet;
    document.getElementById('codePreviewQuestion').textContent = 'Pratinjau kode untuk: ' + q.question_text.substring(0, 60) + (q.question_text.length > 60 ? '...' : '');
    document.getElementById('codePreviewModal').classList.remove('hidden');
}
</script>
@endsection
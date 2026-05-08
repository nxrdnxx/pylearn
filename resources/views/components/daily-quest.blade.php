<div class="bg-slate-900 rounded-xl border border-gray-800 p-5">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-sm font-semibold text-white"><i class="fa-solid fa-star mr-2 text-amber-400"></i>Daily Quest</h3>
        @if($dailyQuest && $dailyQuest->completed)
        <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-green-500/15 text-green-400 text-xs font-medium">
            <i class="fa-solid fa-check mr-1"></i>Selesai
        </span>
        @endif
    </div>
    
    @if($dailyQuest && $dailyQuest->question)
    <div class="mb-4">
        <p class="text-sm text-white mb-3">{{ $dailyQuest->question->question_text }}</p>
        
        @if($dailyQuest->question->code_snippet)
        <div class="bg-slate-950 rounded-lg p-3 font-mono text-xs text-gray-300 mb-3 overflow-x-auto">
            <pre>{{ $dailyQuest->question->code_snippet }}</pre>
        </div>
        @endif
        
        @if(session('quest_result'))
        <div class="p-3 rounded-lg mb-3 {{ session('is_correct') ? 'bg-green-500/20 border border-green-500/30' : 'bg-red-500/20 border border-red-500/30' }}">
            <div class="flex items-center gap-2 mb-2">
                <i class="fa-solid {{ session('is_correct') ? 'fa-check-circle text-green-400' : 'fa-xmark-circle text-red-400' }}"></i>
                <span class="text-sm font-medium {{ session('is_correct') ? 'text-green-400' : 'text-red-400' }}">
                    {{ session('is_correct') ? 'Benar!' : 'Salah' }}
                </span>
            </div>
            @if(!session('is_correct'))
            <div class="text-sm text-gray-300 mb-2">Jawaban benar: <span class="text-green-400 font-mono">{{ session('correct_answer') }}</span></div>
            @endif
            @if(session('xp_earned') > 0)
            <div class="text-sm text-amber-400">+{{ session('xp_earned') }} XP</div>
            @endif
        </div>
        @endif
        
        @if(!$dailyQuest->completed)
        <form method="POST" action="{{ route('daily-quest.submit') }}">
            @csrf
            <input type="hidden" name="question_id" value="{{ $dailyQuest->question_id }}">
            <input type="text" name="answer" class="w-full bg-slate-800 border border-gray-700 rounded-lg px-3 py-2 text-sm text-white placeholder-gray-500 focus:border-blue-500 focus:outline-none" placeholder="Ketik jawabanmu..." required>
            <button type="submit" class="w-full mt-2 px-3 py-2 rounded-lg bg-blue-500 text-white text-sm font-medium hover:bg-blue-400 transition-all">
                Kirim Jawaban
            </button>
        </form>
        @else
        <div class="p-3 rounded-lg bg-slate-800 text-center">
            <span class="text-sm text-gray-400">Jawabanmu: </span>
            <span class="text-sm text-white font-mono">{{ $dailyQuest->user_answer }}</span>
        </div>
        @endif
    </div>
    @else
    <div class="text-center py-4 text-gray-500 text-sm">
        <i class="fa-solid fa-clock mr-2"></i>Menunggu quest...
    </div>
    @endif
</div>
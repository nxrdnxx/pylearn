@extends('layouts.app')

@section('title', 'Kuis Python')

@section('content')
@php
    $question = $question ?? null;
    $total = $questions->count() ?? 0;
    $current = request()->get('q', 1);
    $percent = $total > 0 ? ($current / $total) * 100 : 0;
@endphp

<!-- Fixed Premium Quiz Navbar -->
<nav class="fixed top-0 left-0 right-0 z-[100] h-20 flex items-center px-4 sm:px-7 bg-ink-950/80 backdrop-blur-xl border-b border-white/5">
    <div class="max-w-[1100px] mx-auto w-full flex items-center justify-between gap-4 sm:gap-8">
        <a href="{{ route('level.index') }}" class="hidden md:flex items-center gap-3 font-semibold text-2xl text-white no-underline group">
            <div class="w-10 h-10 rounded-xl bg-brand-blue flex items-center justify-center group-hover:scale-110 transition-transform">
                <i class="fa-brands fa-python text-white"></i>
            </div>
            <span>Py<em class="italic text-brand-blue-light">Learn</em></span>
        </a>

        <div class="flex-1 flex items-center gap-3 sm:gap-6 max-w-2xl">
            <div class="flex-1 h-2 bg-white/5 rounded-full overflow-hidden shadow-inner">
                <div class="h-full bg-gradient-to-r from-brand-blue to-brand-blue-light rounded-full transition-all duration-1000 shadow-[0_0_10px_rgba(59,124,244,0.4)]" style="width:{{ $percent }}%"></div>
            </div>
            <div class="flex items-center gap-1.5 font-semibold text-white whitespace-nowrap">
                <span class="text-lg sm:text-xl">{{ $current }}</span>
                <span class="text-xs text-text-muted mt-1">/ {{ $total }}</span>
            </div>
        </div>

        <a href="{{ route('level.index') }}" class="px-4 sm:px-5 py-2 rounded-xl bg-white/5 text-white font-bold text-xs border border-white/10 hover:bg-white/10 transition-all">
            <i class="fa-solid fa-xmark mr-1.5 sm:mr-2 text-[10px]"></i>Keluar
        </a>
    </div>
</nav>

<div class="pt-28 min-h-screen bg-ink-950">
    <div class="max-w-[800px] mx-auto px-7 pb-24">

    @if($question)
        <!-- Quiz Info Bar -->
        <div class="flex justify-between items-center mb-8">
            <div class="flex gap-3 items-center">
                <span class="inline-flex items-center px-3 py-1 rounded-lg bg-brand-blue/10 text-brand-blue text-[10px] font-bold uppercase tracking-widest border border-brand-blue/20">
                    Soal {{ $current }}
                </span>
                <div class="h-4 w-px bg-white/10"></div>
                <span class="text-sm font-bold text-white">{{ $level->name }}</span>
            </div>
            <div class="hidden sm:flex items-center gap-2 text-xs font-bold text-text-muted uppercase tracking-tighter">
                <i class="fa-solid fa-clock-rotate-left"></i> {{ round($percent) }}% Selesai
            </div>
        </div>

        <!-- Question Card -->
        <div class="bg-surface-1 rounded-[32px] border border-white/10 p-8 md:p-10 mb-8 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 left-0 w-2 h-full bg-brand-blue opacity-20"></div>
            
            <p class="text-xl md:text-2xl font-bold text-white mb-8 leading-relaxed">
                {{ $question->question_text }}
            </p>

            @if($question->code_snippet)
                <div class="relative group mt-4">
                    <div class="absolute top-4 right-4 text-[10px] font-bold text-text-muted uppercase tracking-widest bg-ink-950/50 backdrop-blur-md px-2 py-1 rounded">Python</div>
                    <div class="bg-ink-950 rounded-2xl p-6 font-mono text-sm text-brand-blue-light border border-white/5 overflow-x-auto shadow-inner">
                        <pre><code>{{ $question->code_snippet }}</code></pre>
                    </div>
                </div>
            @endif
        </div>

        @if(session('feedback_question_id') == $question->id)
            <div id="feedback-container" class="mb-10 animate-in fade-in slide-in-from-top-4 duration-500">
                <div class="p-8 rounded-[32px] {{ session('is_correct') ? 'bg-brand-green/10 border border-brand-green/20' : 'bg-brand-red/10 border border-brand-red/20' }}">
                    <div class="flex items-start gap-6">
                        <div class="w-14 h-14 rounded-2xl flex-shrink-0 flex items-center justify-center text-2xl {{ session('is_correct') ? 'bg-brand-green/20 text-brand-green' : 'bg-brand-red/20 text-brand-red' }}">
                            <i class="fa-solid {{ session('is_correct') ? 'fa-check' : 'fa-xmark' }}"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-xl font-bold {{ session('is_correct') ? 'text-brand-green' : 'text-brand-red' }} mb-2">
                                {{ session('is_correct') ? 'Jawaban Benar!' : 'Jawaban Kurang Tepat' }}
                            </h4>

                            @if(!session('is_correct'))
                                <div class="bg-ink-950/50 rounded-2xl p-4 mb-4 border border-white/5">
                                    <span class="text-[10px] font-bold text-text-muted uppercase tracking-widest block mb-1">Jawaban Benar:</span>
                                    <div class="text-lg font-bold text-brand-green">{{ session('correct_answer') }}</div>
                                </div>
                            @endif

                            <p class="text-text-secondary leading-relaxed text-[15px]">
                                {{ session('explanation') }}
                            </p>
                        </div>
                    </div>
                </div>

                @php
                    $next = \App\Models\Question::where('level_id', $level->id)
                        ->where('id', '>', $question->id)
                        ->orderBy('id')
                        ->first();
                @endphp

                <div class="mt-8 flex justify-end">
                    @if($next)
                        <a href="{{ route('quiz.show', ['level'=>$level->id, 'q'=>$current+1]) }}" class="px-8 py-4 rounded-2xl bg-brand-blue text-white font-bold text-base hover:bg-brand-blue-light hover:shadow-[0_15px_30px_rgba(59,124,244,0.3)] hover:-translate-y-1 transition-all flex items-center gap-3">
                            Lanjut ke Soal Berikutnya <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    @else
                        <a href="{{ route('quiz.result', $level->id) }}" class="px-8 py-4 rounded-2xl bg-brand-blue text-white font-bold text-base hover:bg-brand-blue-light hover:shadow-[0_15px_30px_rgba(59,124,244,0.3)] hover:-translate-y-1 transition-all flex items-center gap-3">
                            Selesaikan Kuis & Lihat Hasil <i class="fa-solid fa-bullseye"></i>
                        </a>
                    @endif
                </div>
            </div>

            <audio id="sound-correct" src="https://cdn.pixabay.com/audio/2022/03/15/audio_276037000d.mp3" preload="auto"></audio>
            <audio id="sound-incorrect" src="https://cdn.pixabay.com/audio/2022/03/10/audio_c3527054eb.mp3" preload="auto"></audio>

            <script>
                window.addEventListener('load', function() {
                    const isCorrect = {{ session('is_correct') ? 'true' : 'false' }};
                    const sound = document.getElementById(isCorrect ? 'sound-correct' : 'sound-incorrect');
                    if (sound) {
                        sound.volume = 0.5;
                        sound.play().catch(e => console.log('Autoplay blocked'));
                    }
                });
            </script>
        @else
            <!-- Answer Area -->
            <form method="POST" action="{{ route('quiz.answer') }}" id="quiz-form">
                @csrf
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <input type="hidden" name="level_id" value="{{ $level->id }}">
                <input type="hidden" name="current" value="{{ $current }}">

                @if($question->answer_type === 'mcq' && $question->options)
                    @php
                        $optionsData = json_decode($question->options, true);
                        $correctAnswer = $question->correct_answer;
                        $optionsWithKeys = [];
                        
                        if ($optionsData && is_array($optionsData)) {
                            foreach ($optionsData as $opt) {
                                $optionsWithKeys[] = ['key' => $opt, 'is_correct' => $opt === $correctAnswer];
                            }
                            shuffle($optionsWithKeys);
                        }
                        
                        $keys = ['A', 'B', 'C', 'D', 'E'];
                    @endphp

                    @if(count($optionsWithKeys) > 0)
                    <div class="grid grid-cols-1 gap-4 mb-10">
                        @foreach($optionsWithKeys as $i => $opt)
                            <label class="option-label group relative flex items-center gap-5 p-6 rounded-[24px] bg-surface-1 border-2 border-white/5 cursor-pointer transition-all duration-300 hover:border-brand-blue/30 hover:bg-surface-2 overflow-hidden">
                                <input type="radio" name="answer" value="{{ $opt['key'] }}" required class="hidden option-input">
                                
                                <div class="option-indicator w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-xs font-semibold text-text-muted group-hover:text-brand-blue-light transition-all">
                                    {{ $keys[$i] }}
                                </div>
                                
                                <span class="text-base text-slate-200 font-medium z-10 flex-1 leading-relaxed">{{ $opt['key'] }}</span>
                                
                                <div class="check-icon opacity-0 scale-50 transition-all duration-300">
                                    <i class="fa-solid fa-circle-check text-brand-blue text-xl"></i>
                                </div>
                            </label>
                        @endforeach
                    </div>
                    @endif
                @else
                    <div class="mb-10">
                        <div class="bg-surface-1 rounded-[32px] border border-white/5 p-6 focus-within:border-brand-blue/30 transition-all shadow-inner shadow-black/20">
                            <label class="text-[10px] font-bold text-text-muted uppercase tracking-widest block mb-3 px-2">
                                <i class="fa-solid fa-terminal mr-2 text-brand-blue"></i> Jawaban Kamu
                            </label>
                            <textarea name="answer" class="w-full bg-transparent border-none rounded-xl px-2 py-2 text-lg text-white placeholder:text-text-muted outline-none font-mono min-h-[160px] resize-none" placeholder="Ketik kode atau jawabanmu di sini..." required></textarea>
                        </div>
                    </div>
                @endif

                <button type="submit" class="w-full py-5 rounded-[24px] bg-brand-blue text-white font-bold text-lg hover:bg-brand-blue-light hover:shadow-[0_20px_40px_rgba(59,124,244,0.3)] hover:-translate-y-1 transition-all active:scale-[0.98]">
                    Konfirmasi Jawaban
                </button>
            </form>

            <script>
                document.querySelectorAll('.option-input').forEach(input => {
                    input.addEventListener('change', function() {
                        document.querySelectorAll('.option-label').forEach(label => {
                            label.classList.remove('selected', 'border-brand-blue', 'bg-brand-blue/5');
                            label.querySelector('.option-indicator').classList.remove('bg-brand-blue', 'text-white', 'border-brand-blue');
                            label.querySelector('.check-icon').classList.add('opacity-0', 'scale-50');
                        });
                        
                        if (this.checked) {
                            const label = this.closest('.option-label');
                            label.classList.add('selected', 'border-brand-blue', 'bg-brand-blue/5');
                            label.querySelector('.option-indicator').classList.add('bg-brand-blue', 'text-white', 'border-brand-blue');
                            label.querySelector('.check-icon').classList.remove('opacity-0', 'scale-50');
                            
                            label.style.transform = 'scale(1.02)';
                            setTimeout(() => {
                                label.style.transform = 'scale(1)';
                            }, 200);
                        }
                    });
                });
            </script>
        @endif
    @else
        <div class="text-center py-20 px-10">
            <div class="w-24 h-24 rounded-[40px] bg-brand-green/10 flex items-center justify-center mx-auto mb-8 border border-brand-green/20">
                <i class="fa-solid fa-check-double text-brand-green text-4xl"></i>
            </div>
            <h2 class="font-semibold text-3xl mb-4 text-white">Selesai Berhasil!</h2>
            <p class="text-text-secondary text-lg mb-10 max-w-sm mx-auto">Kamu sudah menamatkan semua soal di level ini. Siap untuk tantangan berikutnya?</p>
            <a href="{{ route('level.index') }}" class="inline-flex items-center gap-3 px-8 py-4 rounded-2xl bg-brand-blue text-white font-bold text-base hover:bg-brand-blue-light transition-all shadow-xl shadow-brand-blue/20">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Kurikulum
            </a>
        </div>
    @endif

    </div>
</div>

<style>
    .option-label.selected {
        border-color: #3b7cf4 !important;
        background-color: rgba(59, 124, 244, 0.05) !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }
    
    .animate-in {
        animation: animate-in 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    
    @keyframes animate-in {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
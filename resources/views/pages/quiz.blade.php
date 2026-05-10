@extends('layouts.app')

@section('title', 'Quiz')

@section('content')
@php
    $question = $question ?? null;
    $total = $questions->count() ?? 0;
    $current = request()->get('q', 1);
    $percent = $total > 0 ? ($current / $total) * 100 : 0;
@endphp

<nav class="fixed top-0 left-0 right-0 z-[100] h-14 flex items-center px-7 gap-1.5 bg-ink-950/80 backdrop-blur-xl border-b border-ink-700/14">
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-brand-blue/20 to-transparent"></div>
    <a href="{{ route('level.index') }}" class="flex items-center gap-2.5 font-serif text-xl text-text-primary no-underline">
        <span class="font-serif text-xl">Py<em class="italic text-brand-blue-light">Learn</em></span>
    </a>
    <div class="flex-1 flex items-center gap-4 px-6">
        <div class="flex-1 max-w-[360px] h-1.5 bg-surface-2 rounded-full overflow-hidden">
            <div class="h-full bg-brand-blue rounded-full transition-all duration-500" style="width:{{ $percent }}%"></div>
        </div>
        <span class="text-sm text-text-secondary font-mono">{{ $current }}/{{ $total }}</span>
    </div>
    <a href="{{ route('level.index') }}" class="px-3 py-1.5 rounded-lg bg-transparent text-text-secondary font-medium text-xs border border-ink-700/26 hover:bg-surface-2 hover:text-text-primary hover:border-ink-700/40 transition-all duration-200">
        <i class="fa-solid fa-xmark mr-1.5"></i>Keluar
    </a>
</nav>

<div class="pt-16">
<div class="max-w-[680px] mx-auto px-7 pt-10 pb-14">

@if($question)
    <div class="flex justify-between items-center mb-7">
        <div class="flex gap-3 flex-wrap">
            <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-brand-blue/15 text-brand-blue-light text-xs font-medium">
                Soal {{ $current }}
            </span>
            <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-surface-2 text-text-muted text-xs font-medium">
                {{ $level->name }}
            </span>
        </div>
        <span class="text-xs text-text-muted">
            <i class="fa-solid fa-spinner mr-1"></i>Progress {{ round($percent) }}%
        </span>
    </div>

    <div class="bg-surface-2 rounded-2xl border border-ink-700/14 p-7 mb-6">
        <p class="text-lg font-semibold mb-5 leading-relaxed text-text-primary">
            {{ $question->question_text }}
        </p>

        @if($question->code_snippet)
            <div class="mt-4 bg-ink-950 rounded-lg p-4 font-mono text-sm text-text-secondary overflow-x-auto">
                <pre>{{ $question->code_snippet }}</pre>
            </div>
        @endif
    </div>

    @if(session('feedback_question_id') == $question->id)
        <div id="feedback-container" class="flex items-start gap-4 mb-6 p-4 rounded-xl {{ session('is_correct') ? 'bg-brand-green/10 border border-brand-green/30 animate-success' : 'bg-brand-red/10 border border-brand-red/30 animate-shake' }}">
            <div class="w-7 h-7 rounded-full flex items-center justify-center text-sm flex-shrink-0 {{ session('is_correct') ? 'bg-brand-green/20' : 'bg-brand-red/20' }}">
                <i class="fa-solid {{ session('is_correct') ? 'fa-check text-brand-green-light' : 'fa-xmark text-red-400' }}"></i>
            </div>
            <div class="flex-1">
                <div class="font-semibold text-[15px] mb-2 text-text-primary">
                    {{ session('is_correct') ? 'Jawaban Benar!' : 'Jawaban Salah' }}
                </div>

                @if(!session('is_correct'))
                    <div class="text-sm mb-3 p-3 bg-ink-950 rounded-lg text-text-primary">
                        Jawaban benar: <b class="text-brand-green-light">{{ session('correct_answer') }}</b>
                    </div>
                @endif

                <div class="text-sm text-text-secondary leading-relaxed">
                    {{ session('explanation') }}
                </div>
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

        @php
            $next = \App\Models\Question::where('level_id', $level->id)
                ->where('id', '>', $question->id)
                ->orderBy('id')
                ->first();
        @endphp

        <div class="flex justify-between items-center mt-6">
            <span class="text-sm text-text-muted">
                {{ $current }} dari {{ $total }} soal
            </span>
            @if($next)
                <a href="{{ route('quiz.show', ['level'=>$level->id, 'q'=>$current+1]) }}" class="px-5 py-2.5 rounded-lg bg-brand-blue text-white font-medium text-base hover:bg-brand-blue-light hover:shadow-[0_4px_20px_rgba(59,124,244,0.4)] hover:-translate-y-0.5 transition-all duration-200">
                    Soal Berikutnya <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            @else
                <a href="{{ route('quiz.result', $level->id) }}" class="px-5 py-2.5 rounded-lg bg-brand-blue text-white font-medium text-base hover:bg-brand-blue-light hover:shadow-[0_4px_20px_rgba(59,124,244,0.4)] hover:-translate-y-0.5 transition-all duration-200">
                    Lihat Hasil <i class="fa-solid fa-bullseye ml-2"></i>
                </a>
            @endif
        </div>

    @else
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
                <div class="flex flex-col gap-3 mb-7">
                    @foreach($optionsWithKeys as $i => $opt)
                        <label class="option-label flex items-center gap-4 p-4 rounded-xl border border-ink-700/26 bg-surface-1 cursor-pointer transition-all duration-300 hover:border-brand-blue/50 hover:bg-surface-2 group relative overflow-hidden">
                            <div class="absolute inset-0 bg-brand-blue/5 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-500 pointer-events-none"></div>
                            <span class="option-key w-7 h-7 rounded-lg bg-surface-2 border border-ink-700/26 flex items-center justify-center text-xs font-semibold text-text-secondary font-mono flex-shrink-0 transition-all duration-300">{{ $keys[$i] }}</span>
                            <span class="text-sm leading-relaxed text-text-primary z-10">{{ $opt['key'] }}</span>
                            <input type="radio" name="answer" value="{{ $opt['key'] }}" required class="hidden option-input">
                            <div class="ml-auto opacity-0 group-[.selected]:opacity-100 transition-opacity duration-300">
                                <i class="fa-solid fa-circle-check text-brand-blue"></i>
                            </div>
                        </label>
                    @endforeach
                </div>
                @endif
            @else
                <div class="mb-7">
                    <label class="text-xs font-medium text-text-secondary tracking-wide block mb-2">
                        <i class="fa-solid fa-pen mr-1.5"></i>Jawaban kamu
                    </label>
                    <textarea name="answer" class="w-full bg-surface-1 border border-ink-700/26 rounded-lg px-4 py-3 text-sm text-text-primary placeholder:text-text-muted transition-all duration-200 outline-none focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/20 font-mono min-h-[120px] resize-y" placeholder="Tulis jawaban kamu di sini..." required rows="5"></textarea>
                </div>
            @endif

            <button type="submit" class="w-full px-5 py-2.5 rounded-lg bg-brand-blue text-white font-medium text-base hover:bg-brand-blue-light hover:shadow-[0_4px_20px_rgba(59,124,244,0.4)] hover:-translate-y-0.5 transition-all duration-200 active:scale-[0.98]">
                Kirim Jawaban
            </button>
        </form>

        <script>
            document.querySelectorAll('.option-input').forEach(input => {
                input.addEventListener('change', function() {
                    document.querySelectorAll('.option-label').forEach(label => {
                        label.classList.remove('selected', 'border-brand-blue', 'bg-brand-blue/5', 'ring-2', 'ring-brand-blue/20');
                        label.querySelector('.option-key').classList.remove('bg-brand-blue', 'text-white', 'border-brand-blue');
                    });
                    
                    if (this.checked) {
                        const label = this.closest('.option-label');
                        label.classList.add('selected', 'border-brand-blue', 'bg-brand-blue/5', 'ring-2', 'ring-brand-blue/20');
                        label.querySelector('.option-key').classList.add('bg-brand-blue', 'text-white', 'border-brand-blue');
                        
                        label.style.transform = 'scale(1.02)';
                        setTimeout(() => {
                            label.style.transform = 'scale(1)';
                        }, 200);
                    }
                });
            });
        </script>
    @endif

    <style>
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-8px); }
            50% { transform: translateX(8px); }
            75% { transform: translateX(-8px); }
        }
        
        @keyframes success-pop {
            0% { transform: scale(0.95); opacity: 0; }
            50% { transform: scale(1.02); }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .animate-shake {
            animation: shake 0.4s cubic-bezier(.36,.07,.19,.97) both;
        }
        
        .animate-success {
            animation: success-pop 0.5s ease-out forwards;
        }

        .animate-fade-in {
            animation: fade-in 0.3s ease-out forwards;
        }
        
        .option-label {
            transform: translateZ(0);
            backface-visibility: hidden;
        }
    </style>
@else
    <div class="text-center py-10">
        <div class="text-5xl mb-4 text-brand-green">
            <i class="fa-solid fa-face-smile-beam"></i>
        </div>
        <h2 class="font-serif text-[28px] mb-2 text-text-primary">Quiz selesai!</h2>
        <p class="text-text-secondary mb-7">Kamu sudah menyelesaikan semua soal di level ini.</p>
        <a href="{{ route('level.index') }}" class="px-5 py-2.5 rounded-lg bg-brand-blue text-white font-medium text-base hover:bg-brand-blue-light hover:shadow-[0_4px_20px_rgba(59,124,244,0.4)] hover:-translate-y-0.5 transition-all duration-200">
            <i class="fa-solid fa-arrow-left mr-2"></i>Kembali ke Level
        </a>
    </div>
@endif

</div>
</div>
@endsection
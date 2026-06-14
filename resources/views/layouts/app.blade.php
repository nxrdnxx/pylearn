<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PyLearn — Belajar Python</title>
    @php
        $manifestPath = public_path('build/manifest.json');
        $cssFile = 'build/assets/app.css';
        if (file_exists($manifestPath)) {
            $manifest = json_decode(file_get_contents($manifestPath), true);
            $cssFile = 'build/' . ($manifest['resources/css/app.css']['file'] ?? 'assets/app.css');
        }
    @endphp
    <link rel="icon" type="image/svg+xml" href="/{{ $pubDir }}assets/favicon.svg">
    <link rel="stylesheet" href="/{{ $pubDir }}{{ $cssFile }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    @stack('styles')
</head>
<body class="antialiased selection:bg-brand-blue/30 selection:text-white">
    @if(!isset($hideNavbar) || !$hideNavbar)
        @include('layouts.navbar')
    @endif

    <main>
        @yield('content')
    </main>

    @if(session('new_badges'))
    @php
        $badge = is_array(session('new_badges')) ? session('new_badges')[0] : session('new_badges')->first();
        $color = $badge->color ?? '#3b7cf4';
    @endphp
    <div id="badgePopup" class="fixed inset-0 z-[999] flex items-center justify-center p-4 bg-ink-950/90 backdrop-blur-xl animate-fade-in">
        <div class="relative max-w-sm w-full animate-premium-pop">
            <!-- Glow Background Effect -->
            <div class="absolute inset-0 blur-[100px] rounded-full" style="background: {{ $color }}33;"></div>
            
            <div class="relative bg-surface-1 border border-white/10 rounded-[40px] p-10 text-center shadow-2xl overflow-hidden">
                <!-- Decorative Elements -->
                <div class="absolute top-0 left-0 w-full h-1" style="background: linear-gradient(90deg, transparent, {{ $color }}, transparent);"></div>
                
                <div class="relative z-10">
                    <div class="w-28 h-28 mx-auto mb-8 relative">
                        <div class="absolute inset-0 blur-3xl rounded-full animate-pulse" style="background: {{ $color }}66;"></div>
                        <div class="relative w-full h-full rounded-3xl flex items-center justify-center text-white shadow-2xl rotate-3" style="background: linear-gradient(135deg, {{ $color }}, {{ $color }}dd);">
                            <i class="{{ $badge->icon ?? 'fa-solid fa-medal' }} text-5xl"></i>
                        </div>
                    </div>

                    <div class="text-[10px] font-bold tracking-[0.3em] uppercase mb-4" style="color: {{ $color }};">Pencapaian Baru Dibuka</div>
                    <h3 class="text-3xl font-semibold text-white mb-4 tracking-tight">{{ $badge->name }}</h3>
                    <p class="text-sm text-text-secondary mb-10 leading-relaxed px-4">
                        {{ $badge->description }}
                    </p>

                    <button onclick="closeBadgePopup()" class="close-badge-btn w-full py-5 rounded-[24px] text-white font-bold text-base transition-all duration-300 active:scale-[0.97]" style="background: {{ $color }}; box-shadow: 0 4px 20px {{ $color }}4d;">
                        Luar Biasa!
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function closeBadgePopup() { 
            const popup = document.getElementById('badgePopup');
            popup.classList.add('animate-fade-out');
            setTimeout(() => popup.remove(), 400);
        }
    </script>
    <style>
        @keyframes premium-pop {
            0% { transform: scale(0.8) translateY(40px); opacity: 0; }
            100% { transform: scale(1) translateY(0); opacity: 1; }
        }
        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes fade-out {
            from { opacity: 1; transform: scale(1); }
            to { opacity: 0; transform: scale(0.9); }
        }
        .animate-premium-pop {
            animation: premium-pop 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .close-badge-btn:hover {
            filter: brightness(1.15);
        }
        .animate-fade-in {
            animation: fade-in 0.4s ease-out forwards;
        }
        .animate-fade-out {
            animation: fade-out 0.4s ease-in forwards;
        }
    </style>
    @endif

    @auth
    @if(!isset($hideNavbar) || !$hideNavbar)
    <button id="questionnaireBtn" onclick="openQuestionnaire()" class="fixed bottom-6 right-6 z-[40] w-14 h-14 rounded-full bg-brand-blue hover:bg-brand-blue-light text-white flex items-center justify-center shadow-[0_8px_30px_rgba(59,124,244,0.4)] hover:shadow-[0_8px_30px_rgba(59,124,244,0.6)] cursor-pointer transition-all duration-300 hover:scale-110 active:scale-95 group" title="Isi Kuesioner">
        <i class="fa-solid fa-comment-dots text-xl group-hover:rotate-12 transition-transform duration-300"></i>
        <!-- Pulse effect badge -->
        <span class="absolute -top-1 -right-1 flex h-4 w-4">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-4 w-4 bg-amber-500 text-[9px] font-bold text-slate-950 items-center justify-center">!</span>
        </span>
    </button>

    <!-- Questionnaire Modal -->
    <div id="questionnaireModal" class="fixed inset-0 z-[50] flex items-center justify-center p-4 bg-ink-950/80 backdrop-blur-md opacity-0 pointer-events-none transition-all duration-300">
        <!-- Glow effect behind modal -->
        <div class="absolute w-72 h-72 bg-brand-blue/10 blur-[100px] rounded-full pointer-events-none"></div>

        <div id="questionnaireCard" class="relative bg-surface-1 border border-white/10 rounded-[28px] w-full max-w-md shadow-2xl overflow-hidden transform scale-95 transition-all duration-300 flex flex-col">
            
            <!-- Header (Progress & Close) -->
            <div class="p-5 border-b border-white/5 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-brand-blue/10 flex items-center justify-center text-brand-blue">
                        <i class="fa-solid fa-clipboard-question"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white">Evaluasi PyLearn</h4>
                        <span id="questionnaireCounter" class="text-[10px] text-text-secondary">Memuat...</span>
                    </div>
                </div>
                <button onclick="closeQuestionnaire()" class="text-text-secondary hover:text-white hover:bg-white/10 rounded-full w-7 h-7 flex items-center justify-center transition-all">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Progress Bar -->
            <div class="w-full h-1 bg-slate-950 overflow-hidden">
                <div id="questionnaireProgress" class="h-full bg-brand-blue w-0 transition-all duration-300"></div>
            </div>

            <!-- Body -->
            <div class="p-6">
                <!-- Loader -->
                <div id="questionnaireLoader" class="flex flex-col items-center justify-center py-8 gap-3">
                    <div class="w-8 h-8 border-3 border-brand-blue/30 border-t-brand-blue rounded-full animate-spin"></div>
                    <span class="text-xs text-text-secondary">Memuat pertanyaan...</span>
                </div>

                <!-- Form Wizard -->
                <div id="questionnaireWizard" class="hidden space-y-6">
                    <!-- Question Area with transition -->
                    <div id="questionArea" class="min-h-[90px] flex items-center justify-center transition-all duration-200">
                        <p id="questionText" class="text-sm font-medium text-white text-center leading-relaxed"></p>
                    </div>

                    <!-- Likert Scale Option Row -->
                    <div class="space-y-4">
                        <div class="flex justify-between items-center px-1">
                            <button onclick="selectScore(1)" class="score-btn w-11 h-11 rounded-full border border-slate-800 bg-slate-800/30 hover:border-brand-blue hover:bg-brand-blue/10 text-white font-bold text-sm flex items-center justify-center cursor-pointer transition-all duration-150 active:scale-90">1</button>
                            <button onclick="selectScore(2)" class="score-btn w-11 h-11 rounded-full border border-slate-800 bg-slate-800/30 hover:border-brand-blue hover:bg-brand-blue/10 text-white font-bold text-sm flex items-center justify-center cursor-pointer transition-all duration-150 active:scale-90">2</button>
                            <button onclick="selectScore(3)" class="score-btn w-11 h-11 rounded-full border border-slate-800 bg-slate-800/30 hover:border-brand-blue hover:bg-brand-blue/10 text-white font-bold text-sm flex items-center justify-center cursor-pointer transition-all duration-150 active:scale-90">3</button>
                            <button onclick="selectScore(4)" class="score-btn w-11 h-11 rounded-full border border-slate-800 bg-slate-800/30 hover:border-brand-blue hover:bg-brand-blue/10 text-white font-bold text-sm flex items-center justify-center cursor-pointer transition-all duration-150 active:scale-90">4</button>
                            <button onclick="selectScore(5)" class="score-btn w-11 h-11 rounded-full border border-slate-800 bg-slate-800/30 hover:border-brand-blue hover:bg-brand-blue/10 text-white font-bold text-sm flex items-center justify-center cursor-pointer transition-all duration-150 active:scale-90">5</button>
                        </div>
                        <div class="flex justify-between text-[10px] text-text-secondary px-1 select-none">
                            <span>Sangat Tidak Setuju (STS)</span>
                            <span>Sangat Setuju (SS)</span>
                        </div>
                    </div>

                    <!-- Footer Controls -->
                    <div class="pt-4 border-t border-white/5 flex items-center justify-between">
                        <button id="prevBtn" onclick="prevQuestion()" class="text-xs font-semibold text-text-secondary hover:text-white transition-colors flex items-center gap-1.5 opacity-0 pointer-events-none">
                            <i class="fa-solid fa-arrow-left"></i> Kembali
                        </button>
                        <span class="text-[10px] text-text-muted">Klik angka untuk lanjut</span>
                    </div>
                </div>

                <!-- Success State -->
                <div id="questionnaireSuccess" class="hidden flex-col items-center justify-center py-6 text-center space-y-4">
                    <div class="w-16 h-16 bg-brand-green/20 rounded-full flex items-center justify-center border border-brand-green/30">
                        <i class="fa-solid fa-check text-brand-green text-3xl animate-bounce-subtle"></i>
                    </div>
                    <div>
                        <h4 class="text-white text-base font-bold mb-1">Tanggapan Dikirim!</h4>
                        <p class="text-xs text-text-secondary px-4">Terima kasih atas partisipasi Anda dalam evaluasi kegunaan PyLearn.</p>
                    </div>
                    <button onclick="closeQuestionnaire()" class="px-6 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold transition-all">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let questionnaireQuestions = [];
        let currentQuestionIndex = 0;
        let questionnaireAnswers = {};
        let questionnaireLoaded = false;

        // Check submission status on page load to hide or pre-cache questionnaire
        document.addEventListener('DOMContentLoaded', async () => {
            try {
                const response = await fetch("{{ route('questionnaire.questions') }}");
                const result = await response.json();
                if (result.success) {
                    if (result.has_submitted) {
                        document.getElementById('questionnaireBtn')?.remove();
                    } else {
                        questionnaireQuestions = result.questions;
                        questionnaireLoaded = true;
                        
                        // Pre-render the first question in background so it's ready instantly
                        const loader = document.getElementById('questionnaireLoader');
                        const wizard = document.getElementById('questionnaireWizard');
                        if (loader && wizard) {
                            loader.classList.add('hidden');
                            wizard.classList.remove('hidden');
                            showQuestion(0);
                        }
                    }
                }
            } catch (error) {
                console.error("Gagal memeriksa status kuesioner:", error);
            }
        });

        async function openQuestionnaire() {
            const modal = document.getElementById('questionnaireModal');
            const card = document.getElementById('questionnaireCard');
            
            modal.classList.remove('opacity-0', 'pointer-events-none');
            card.classList.remove('scale-95');
            card.classList.add('scale-100');
            
            if (!questionnaireLoaded) {
                await loadQuestionnaire();
            }
        }

        function closeQuestionnaire() {
            const modal = document.getElementById('questionnaireModal');
            const card = document.getElementById('questionnaireCard');
            
            modal.classList.add('opacity-0', 'pointer-events-none');
            card.classList.remove('scale-100');
            card.classList.add('scale-95');
        }

        async function loadQuestionnaire() {
            const loader = document.getElementById('questionnaireLoader');
            const wizard = document.getElementById('questionnaireWizard');
            const success = document.getElementById('questionnaireSuccess');
            
            loader.classList.remove('hidden');
            wizard.classList.add('hidden');
            success.classList.add('hidden');
            
            try {
                const response = await fetch("{{ route('questionnaire.questions') }}");
                const result = await response.json();
                
                if (result.success) {
                    if (result.has_submitted) {
                        document.getElementById('questionnaireBtn')?.remove();
                        closeQuestionnaire();
                        alert("Anda sudah mengisi kuesioner ini sebelumnya. Terima kasih!");
                        return;
                    }
                    
                    if (result.questions.length > 0) {
                        questionnaireQuestions = result.questions;
                        currentQuestionIndex = 0;
                        questionnaireAnswers = {};
                        showQuestion(0);
                        
                        loader.classList.add('hidden');
                        wizard.classList.remove('hidden');
                        questionnaireLoaded = true;
                    }
                } else {
                    loader.innerHTML = `
                        <i class="fa-solid fa-triangle-exclamation text-brand-red text-2xl mb-2"></i>
                        <span class="text-xs text-text-secondary text-center">Gagal memuat pertanyaan.</span>
                    `;
                }
            } catch (error) {
                console.error("Gagal memuat kuesioner:", error);
                loader.innerHTML = `
                    <i class="fa-solid fa-triangle-exclamation text-brand-red text-2xl mb-2"></i>
                    <span class="text-xs text-text-secondary">Terjadi kesalahan koneksi.</span>
                `;
            }
        }

        function showQuestion(index) {
            const q = questionnaireQuestions[index];
            const qArea = document.getElementById('questionArea');
            const qText = document.getElementById('questionText');
            const counter = document.getElementById('questionnaireCounter');
            const progress = document.getElementById('questionnaireProgress');
            const prevBtn = document.getElementById('prevBtn');
            
            if (!q) return;

            // Fade out transition
            qArea.style.opacity = 0;
            qArea.style.transform = 'translateY(-4px)';
            
            setTimeout(() => {
                // Update text
                qText.innerText = q.text;
                
                // Update progress tracker
                const total = questionnaireQuestions.length;
                counter.innerText = `Pertanyaan ${index + 1} dari ${total}`;
                progress.style.width = `${((index + 1) / total) * 100}%`;
                
                // Back button visibility
                if (index > 0) {
                    prevBtn.classList.remove('opacity-0', 'pointer-events-none');
                } else {
                    prevBtn.classList.add('opacity-0', 'pointer-events-none');
                }
                
                // Highlight previously selected answer if any
                const prevAnswer = questionnaireAnswers[q.id];
                document.querySelectorAll('.score-btn').forEach(btn => {
                    const btnVal = parseInt(btn.innerText);
                    if (prevAnswer === btnVal) {
                        btn.className = 'score-btn w-11 h-11 rounded-full border border-brand-blue bg-brand-blue/20 text-brand-blue-light shadow-[0_0_15px_rgba(59,124,244,0.2)] font-bold text-sm flex items-center justify-center cursor-pointer transition-all duration-150 active:scale-90';
                    } else {
                        btn.className = 'score-btn w-11 h-11 rounded-full border border-slate-800 bg-slate-800/30 hover:border-brand-blue hover:bg-brand-blue/10 text-white font-bold text-sm flex items-center justify-center cursor-pointer transition-all duration-150 active:scale-90';
                    }
                });

                // Fade in transition
                qArea.style.opacity = 1;
                qArea.style.transform = 'translateY(0)';
            }, 150);
        }

        async function selectScore(score) {
            const q = questionnaireQuestions[currentQuestionIndex];
            questionnaireAnswers[q.id] = score;
            
            // Highlight selected button immediately for nice feedback
            const btns = document.querySelectorAll('.score-btn');
            btns.forEach(btn => {
                if (parseInt(btn.innerText) === score) {
                    btn.className = 'score-btn w-11 h-11 rounded-full border border-brand-blue bg-brand-blue text-white font-bold text-sm flex items-center justify-center cursor-pointer transition-all duration-150 scale-95';
                }
            });

            setTimeout(async () => {
                if (currentQuestionIndex < questionnaireQuestions.length - 1) {
                    currentQuestionIndex++;
                    showQuestion(currentQuestionIndex);
                } else {
                    // Last question answered, submit answers!
                    await submitQuestionnaire();
                }
            }, 200);
        }

        function prevQuestion() {
            if (currentQuestionIndex > 0) {
                currentQuestionIndex--;
                showQuestion(currentQuestionIndex);
            }
        }

        async function submitQuestionnaire() {
            const wizard = document.getElementById('questionnaireWizard');
            const loader = document.getElementById('questionnaireLoader');
            const success = document.getElementById('questionnaireSuccess');
            
            wizard.classList.add('hidden');
            loader.classList.remove('hidden');
            loader.querySelector('span').innerText = 'Mengirim tanggapan...';
            
            try {
                const response = await fetch("{{ route('questionnaire.submit') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({ answers: questionnaireAnswers })
                });
                
                const result = await response.json();
                
                if (result.success) {
                    loader.classList.add('hidden');
                    success.classList.remove('hidden');
                    success.classList.add('flex');
                    
                    // Remove floating button entirely on success
                    document.getElementById('questionnaireBtn')?.remove();
                } else {
                    alert(result.message || "Gagal mengirim kuesioner.");
                    loader.classList.add('hidden');
                    wizard.classList.remove('hidden');
                }
            } catch (error) {
                console.error("Gagal mengirim kuesioner:", error);
                alert("Terjadi kesalahan koneksi saat mengirim jawaban.");
                loader.classList.add('hidden');
                wizard.classList.remove('hidden');
            }
        }
    </script>
    <style>
        /* Fade transition styling */
        #questionArea {
            transition: opacity 0.15s ease-out, transform 0.15s ease-out;
        }
    </style>
    @endif
    @endauth

    @stack('scripts')
</body>
</html>
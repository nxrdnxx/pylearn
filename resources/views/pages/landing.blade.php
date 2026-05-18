@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-ink-950 overflow-x-hidden">
    <!-- Premium Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-[100] h-20 flex items-center px-4 sm:px-7 bg-ink-950/80 backdrop-blur-xl border-b border-white/5">
        <div class="max-w-[1200px] mx-auto w-full flex items-center justify-between">
            <div class="flex items-center gap-3 font-semibold text-2xl text-white">
                <div class="w-10 h-10 rounded-xl bg-brand-blue flex items-center justify-center shadow-[0_0_20px_rgba(59,124,244,0.3)]">
                    <i class="fa-brands fa-python text-white"></i>
                </div>
                <span class="font-semibold text-2xl">Py<em class="italic text-brand-blue-light">Learn</em></span>
            </div>
            
            <div class="hidden md:flex items-center gap-8 ml-12">
                <a href="#fitur" class="text-sm font-bold text-text-muted hover:text-white transition-colors uppercase tracking-widest">Fitur</a>
                <a href="{{ route('level.index') }}" class="text-sm font-bold text-text-muted hover:text-white transition-colors uppercase tracking-widest">Kurikulum</a>
                <a href="{{ route('leaderboard.index') }}" class="text-sm font-bold text-text-muted hover:text-white transition-colors uppercase tracking-widest">Klasemen</a>
            </div>
            
            <div class="hidden sm:flex items-center gap-4 ml-auto">
                <a href="{{ route('login') }}" class="px-5 py-2.5 rounded-xl text-text-secondary text-xs font-bold hover:text-white transition-all">
                    Masuk
                </a>
                <a href="{{ route('register') }}" class="px-6 py-2.5 rounded-xl bg-brand-blue text-white text-xs font-bold hover:bg-brand-blue-light hover:shadow-[0_10px_20px_rgba(59,124,244,0.3)] transition-all">
                    Daftar Sekarang
                </a>
            </div>

            <!-- Mobile Toggle -->
            <button onclick="toggleMobileMenu()" class="sm:hidden w-10 h-10 flex items-center justify-center rounded-xl bg-white/5 border border-white/10 text-white hover:bg-white/10 transition-all ml-auto">
                <i id="menu-icon" class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Navigation Drawer -->
    <div id="mobile-menu" class="fixed inset-x-0 top-20 bg-ink-950/95 backdrop-blur-2xl border-b border-white/5 z-[99] p-6 space-y-6 hidden sm:hidden transition-all duration-300 animate-in fade-in slide-in-from-top-4">
        <div class="flex flex-col gap-5">
            <a href="#fitur" onclick="toggleMobileMenu()" class="text-sm font-bold text-text-secondary hover:text-white transition-colors uppercase tracking-widest">Fitur</a>
            <a href="{{ route('level.index') }}" class="text-sm font-bold text-text-secondary hover:text-white transition-colors uppercase tracking-widest">Kurikulum</a>
            <a href="{{ route('leaderboard.index') }}" class="text-sm font-bold text-text-secondary hover:text-white transition-colors uppercase tracking-widest">Klasemen</a>
        </div>
        <div class="h-px bg-white/5"></div>
        <div class="flex flex-col gap-4">
            <a href="{{ route('login') }}" class="w-full py-3.5 rounded-xl text-center text-text-secondary text-sm font-bold hover:text-white transition-all bg-white/5 border border-white/5">
                Masuk
            </a>
            <a href="{{ route('register') }}" class="w-full py-3.5 rounded-xl bg-brand-blue text-center text-white text-sm font-bold hover:bg-brand-blue-light hover:shadow-[0_10px_20px_rgba(59,124,244,0.3)] transition-all">
                Daftar Sekarang
            </a>
        </div>
    </div>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const icon = document.getElementById('menu-icon');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                menu.classList.add('hidden');
                icon.classList.add('fa-bars');
                icon.classList.remove('fa-times');
            }
        }
    </script>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center pt-20">
        <!-- Decorative Background -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="absolute top-[-10%] right-[-10%] w-[800px] h-[800px] bg-brand-blue/10 blur-[150px] rounded-full"></div>
            <div class="absolute bottom-[-10%] left-[-10%] w-[600px] h-[600px] bg-brand-purple/10 blur-[150px] rounded-full"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-[0.03]"></div>
        </div>

        <div class="max-w-[1200px] mx-auto px-7 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="animate-in fade-in slide-in-from-left-8 duration-1000">
                    <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-brand-blue/10 border border-brand-blue/20 text-brand-blue-light text-xs font-bold uppercase tracking-widest mb-8">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-blue opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-brand-blue"></span>
                        </span>
                        Edisi Terbaru 2024 Telah Hadir
                    </div>
                    <h1 class="font-semibold text-6xl md:text-8xl text-white mb-8 tracking-tighter leading-[0.95]">
                        Kuasai <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-blue to-brand-blue-light">Python</span><br>
                        Dengan Gaya.
                    </h1>
                    <p class="text-xl text-text-secondary leading-relaxed mb-12 max-w-[520px]">
                        Platform belajar Python tercanggih dengan sistem gamifikasi yang membuat belajar menjadi adiktif. Dari nol hingga siap kerja.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-5 mb-16">
                        <a href="{{ route('register') }}" class="px-10 py-5 rounded-2xl bg-brand-blue text-white font-bold text-lg hover:bg-brand-blue-light hover:shadow-[0_20px_40px_rgba(59,124,244,0.4)] hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
                            Mulai Belajar Gratis <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        <a href="{{ route('level.index') }}" class="px-10 py-5 rounded-2xl bg-white/5 text-white font-bold text-lg border border-white/10 hover:bg-white/10 transition-all flex items-center justify-center gap-3">
                            Lihat Kurikulum
                        </a>
                    </div>
                    
                    <div class="flex items-center gap-8">
                        <div class="flex -space-x-4">
                            @foreach([1,2,3,4] as $i)
                                <div class="w-12 h-12 rounded-full border-4 border-ink-950 bg-surface-2 flex items-center justify-center text-xs font-bold text-white overflow-hidden shadow-xl">
                                    <img src="https://i.pravatar.cc/100?img={{ $i+10 }}" alt="User">
                                </div>
                            @endforeach
                            <div class="w-12 h-12 rounded-full border-4 border-ink-950 bg-brand-blue flex items-center justify-center text-[10px] font-bold text-white shadow-xl">
                                12K+
                            </div>
                        </div>
                        <div>
                            <div class="flex text-brand-amber text-xs mb-1">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="text-xs text-text-muted font-bold uppercase tracking-widest">Dipercaya 12,000+ Pelajar</p>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:block animate-in fade-in zoom-in duration-1000 delay-300">
                    <div class="relative">
                        <div class="absolute inset-0 bg-brand-blue/20 blur-[100px] rounded-full"></div>
                        <div class="relative bg-surface-1 rounded-[40px] border border-white/10 p-4 shadow-2xl group">
                            <div class="bg-ink-950 rounded-[32px] p-8 font-mono text-sm leading-relaxed border border-white/5">
                                <div class="flex gap-2 mb-6">
                                    <div class="w-3 h-3 rounded-full bg-brand-red/50"></div>
                                    <div class="w-3 h-3 rounded-full bg-brand-amber/50"></div>
                                    <div class="w-3 h-3 rounded-full bg-brand-green/50"></div>
                                </div>
                                <div class="space-y-2">
                                    <p class="text-text-muted"><span class="text-brand-purple">class</span> <span class="text-brand-blue-light">PyLearner</span>:</p>
                                    <p class="pl-4 text-text-muted"><span class="text-brand-purple">def</span> <span class="text-brand-blue-light">__init__</span>(self, name):</p>
                                    <p class="pl-8 text-white">self.name = name</p>
                                    <p class="pl-8 text-white">self.xp = <span class="text-brand-amber">0</span></p>
                                    <p class="pl-8 text-white">self.skills = []</p>
                                    <p class="pl-4 mt-4 text-text-muted"><span class="text-brand-purple">def</span> <span class="text-brand-blue-light">level_up</span>(self):</p>
                                    <p class="pl-8 text-white">self.xp += <span class="text-brand-amber">100</span></p>
                                    <p class="pl-8 text-brand-green-light">print(f"{self.name} is evolving!")</p>
                                    <p class="mt-6 text-text-muted">student = <span class="text-brand-blue-light">PyLearner</span>(<span class="text-brand-amber">"You"</span>)</p>
                                    <p class="text-text-muted">student.<span class="text-brand-blue-light">level_up</span>()</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Floating Card -->
                        <div class="absolute bottom-10 -left-10 bg-surface-2 border border-white/10 rounded-2xl p-5 shadow-2xl animate-bounce-subtle z-20">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-brand-green/20 flex items-center justify-center">
                                    <i class="fa-solid fa-check text-brand-green"></i>
                                </div>
                                <div>
                                    <div class="text-[10px] font-bold text-text-muted uppercase tracking-widest">Level 1 Selesai</div>
                                    <div class="text-sm font-bold text-white">+100 XP Didapat</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-32 relative bg-ink-950">
        <div class="max-w-[1200px] mx-auto px-7">
            <div class="text-center mb-20 animate-in fade-in slide-in-from-bottom-8 duration-1000">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 text-[10px] font-bold text-text-muted uppercase tracking-widest mb-6">
                    Masa Depan Pembelajaran
                </div>
                <h2 class="font-semibold text-5xl md:text-6xl text-white mb-6 tracking-tight">Lebih Dari Sekedar Kursus</h2>
                <p class="text-lg text-text-secondary max-w-2xl mx-auto">Kami menggabungkan kurikulum industri dengan mekanisme permainan untuk memastikan kamu tidak pernah bosan saat belajar.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group relative">
                    <div class="absolute inset-0 bg-brand-blue/5 rounded-[40px] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative bg-surface-1 border border-white/5 rounded-[40px] p-10 transition-all duration-500 hover:-translate-y-2">
                        <div class="w-16 h-16 rounded-2xl bg-brand-blue/10 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-layer-group text-brand-blue text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Level Berjenjang</h3>
                        <p class="text-text-secondary leading-relaxed">Sistem materi yang terstruktur rapi. Buka level baru setelah kamu menguasai materi sebelumnya dengan nilai minimal 80%.</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group relative">
                    <div class="absolute inset-0 bg-brand-purple/5 rounded-[40px] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative bg-surface-1 border border-white/5 rounded-[40px] p-10 transition-all duration-500 hover:-translate-y-2">
                        <div class="w-16 h-16 rounded-2xl bg-brand-purple/10 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-code text-brand-purple text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Daily Quest</h3>
                        <p class="text-text-secondary leading-relaxed">Tantangan harian cepat untuk melatih insting kodingmu. Jaga streak-mu dan kumpulkan XP ekstra setiap hari.</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group relative">
                    <div class="absolute inset-0 bg-brand-amber/5 rounded-[40px] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative bg-surface-1 border border-white/5 rounded-[40px] p-10 transition-all duration-500 hover:-translate-y-2">
                        <div class="w-16 h-16 rounded-2xl bg-brand-amber/10 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-trophy text-brand-amber text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Achievement</h3>
                        <p class="text-text-secondary leading-relaxed">Dapatkan badge eksklusif dan bersaing di Klasemen Global. Jadilah legenda Python yang diakui oleh komunitas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-32 relative overflow-hidden">
        <div class="absolute inset-0 bg-brand-blue/5"></div>
        <div class="max-w-[1200px] mx-auto px-7 relative z-10 text-center">
            <h2 class="font-semibold text-5xl md:text-7xl text-white mb-8 tracking-tighter">Sudah Siap Menjadi<br><span class="text-brand-blue-light italic">Python Master?</span></h2>
            <p class="text-xl text-text-secondary mb-12 max-w-xl mx-auto">Gabung bersama 12,000+ pelajar lainnya dan mulai perjalanan kodemu hari ini secara gratis.</p>
            <div class="flex flex-col sm:flex-row gap-5 justify-center">
                <a href="{{ route('register') }}" class="px-12 py-5 rounded-2xl bg-brand-blue text-white font-bold text-lg hover:bg-brand-blue-light hover:shadow-[0_20px_40px_rgba(59,124,244,0.4)] transition-all">
                    Buat Akun Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 border-t border-white/5">
        <div class="max-w-[1200px] mx-auto px-7 flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="flex items-center gap-3 font-semibold text-xl text-white opacity-50">
                <div class="w-7 h-7 rounded-lg bg-white flex items-center justify-center">
                    <i class="fa-brands fa-python text-ink-950 text-sm"></i>
                </div>
                <span>PyLearn</span>
            </div>
            
            <p class="text-sm text-text-muted">© 2024 PyLearn. Didorong oleh rasa ingin tahu dan segelas kopi.</p>
            
            <div class="flex items-center gap-6">
                <a href="#" class="text-text-muted hover:text-white transition-colors"><i class="fa-brands fa-github text-xl"></i></a>
                <a href="#" class="text-text-muted hover:text-white transition-colors"><i class="fa-brands fa-twitter text-xl"></i></a>
                <a href="#" class="text-text-muted hover:text-white transition-colors"><i class="fa-brands fa-discord text-xl"></i></a>
            </div>
        </div>
    </footer>
</div>

<style>
    @keyframes bounce-subtle {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    .animate-bounce-subtle {
        animation: bounce-subtle 3s infinite ease-in-out;
    }
    
    .animate-in {
        animation: animate-in 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    
    @keyframes animate-in {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
<link rel="stylesheet" href="{{ asset('assets/pylearn/css/style.css') }}">
<div id="page-landing" class="page active">
  <nav class="nav">
    <div class="nav-brand" onclick="go('landing')">
      <div class="brand-mark"><div class="brand-dot"></div></div>
      <span class="brand-name">Py<em>Learn</em></span>
    </div>
    <a href="{{ route('login') }}" class="btn btn-ghost btn-sm">
    Masuk
</a>
    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Daftar</a>
  </nav>

  <div style="position:relative;min-height:100vh;display:flex;align-items:center;overflow:hidden">
    <div class="bg-glow" style="width:700px;height:700px;background:var(--blue);opacity:0.07;top:-200px;right:-200px"></div>
    <div class="bg-glow" style="width:500px;height:500px;background:var(--purple);opacity:0.06;bottom:-150px;left:-150px"></div>

    <div class="wrap" style="padding-top:80px;padding-bottom:80px;position:relative;z-index:1">
      <div style="max-width:620px">
        <div class="tag tag-blue" style="margin-bottom:22px">Belajar Python secara terstruktur</div>
        <h1 style="font-family:var(--f-serif);font-size:clamp(44px,5.5vw,72px);line-height:1.08;letter-spacing:-0.02em;margin-bottom:20px">
          Belajar Python,<br>
          <span style="color:var(--blue-light);font-style:italic">dari nol hingga mahir.</span>
        </h1>
        <p style="font-size:17px;color:var(--t2);line-height:1.75;margin-bottom:36px;max-width:480px;font-weight:300">
          Platform belajar Python berbasis level dan gamifikasi. Kumpulkan XP, raih badge, dan lacak progresmu setiap hari.
        </p>
        <div style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:56px">
          <button class="btn btn-primary btn-lg" onclick="go('register')">Mulai Gratis</button>
          <button class="btn btn-ghost btn-lg" onclick="go('levels')">Lihat Kurikulum</button>
        </div>
        <div style="display:flex;gap:36px;flex-wrap:wrap;padding-top:32px;border-top:1px solid var(--bd)">
          <div>
            <div style="font-family:var(--f-serif);font-size:28px;letter-spacing:-0.02em">12.4K</div>
            <div style="font-size:13px;color:var(--t2);margin-top:2px">Pelajar aktif</div>
          </div>
          <div>
            <div style="font-family:var(--f-serif);font-size:28px;letter-spacing:-0.02em">50+</div>
            <div style="font-size:13px;color:var(--t2);margin-top:2px">Level materi</div>
          </div>
          <div>
            <div style="font-family:var(--f-serif);font-size:28px;letter-spacing:-0.02em">4.9</div>
            <div style="font-size:13px;color:var(--t2);margin-top:2px">Rating pengguna</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Features -->
  <div style="background:var(--s1);border-top:1px solid var(--bd);padding:80px 0">
    <div class="wrap">
      <div style="margin-bottom:52px">
        <div class="tag tag-muted" style="margin-bottom:14px">Fitur</div>
        <h2 style="font-family:var(--f-serif);font-size:36px;letter-spacing:-0.02em;margin-bottom:10px">Dirancang untuk hasil nyata</h2>
        <p style="color:var(--t2);font-size:15px;max-width:420px">Setiap fitur dibuat untuk membantu kamu belajar lebih efektif dan konsisten.</p>
      </div>
      <div class="g3" style="gap:1px;background:var(--bd);border-radius:var(--r3);overflow:hidden">
        <div style="background:var(--ink-950);padding:32px">
          <div style="width:36px;height:36px;border-radius:var(--r1);background:var(--blue-dim);display:flex;align-items:center;justify-content:center;margin-bottom:18px">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--blue-light)" stroke-width="2" stroke-linecap="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
          </div>
          <h3 style="font-size:16px;font-weight:600;margin-bottom:8px">Level System</h3>
          <p style="font-size:14px;color:var(--t2);line-height:1.7;font-weight:300">Materi tersusun dari dasar hingga lanjutan. Setiap level membuka level berikutnya.</p>
        </div>
        <div style="background:var(--ink-950);padding:32px">
          <div style="width:36px;height:36px;border-radius:var(--r1);background:var(--purple-dim);display:flex;align-items:center;justify-content:center;margin-bottom:18px">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#a78bfa" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <h3 style="font-size:16px;font-weight:600;margin-bottom:8px">Quiz Interaktif</h3>
          <p style="font-size:14px;color:var(--t2);line-height:1.7;font-weight:300">Uji pemahaman dengan soal pilihan ganda dan kode editor. Feedback langsung setelah menjawab.</p>
        </div>
        <div style="background:var(--ink-950);padding:32px">
          <div style="width:36px;height:36px;border-radius:var(--r1);background:var(--amber-dim);display:flex;align-items:center;justify-content:center;margin-bottom:18px">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--amber-light)" stroke-width="2" stroke-linecap="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          </div>
          <h3 style="font-size:16px;font-weight:600;margin-bottom:8px">XP & Badge</h3>
          <p style="font-size:14px;color:var(--t2);line-height:1.7;font-weight:300">Dapatkan XP setiap menyelesaikan level. Kumpulkan badge dan bersaing di leaderboard.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- CTA -->
  <div style="padding:90px 0;text-align:center;position:relative;overflow:hidden">
    <div class="bg-glow" style="width:400px;height:400px;background:var(--blue);opacity:0.07;top:50%;left:50%;transform:translate(-50%,-50%)"></div>
    <div class="wrap" style="position:relative;z-index:1">
      <h2 style="font-family:var(--f-serif);font-size:clamp(28px,4vw,48px);letter-spacing:-0.02em;margin-bottom:14px">Siap memulai?</h2>
      <p style="color:var(--t2);font-size:15px;margin-bottom:32px;font-weight:300">Daftarkan diri dan mulai belajar Python hari ini, gratis.</p>
      <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
        Buat Akun Gratis
    </a>
    </div>
  </div>
</div>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PyLearn — Belajar Python</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root {
  --ink-950: #04091a;
  --ink-900: #070f26;
  --ink-800: #0c1a3b;
  --ink-700: #122248;
  --ink-600: #1a2f5e;
  --ink-500: #243e7a;
  --ink-400: #3557a0;
  --ink-300: #4e70bc;
  --ink-200: #7a9ad4;
  --ink-100: #b0c8ec;
  --ink-50: #dce9f8;

  --blue: #3b7cf4;
  --blue-light: #6b9ff7;
  --blue-dim: rgba(59,124,244,0.12);

  --green: #1fb87a;
  --green-light: #4dcf9b;
  --green-dim: rgba(31,184,122,0.12);

  --amber: #e8a022;
  --amber-light: #f0bc5e;
  --amber-dim: rgba(232,160,34,0.12);

  --red: #e05252;
  --red-dim: rgba(224,82,82,0.1);

  --purple: #7b5ef5;
  --purple-dim: rgba(123,94,245,0.12);

  --s1: #0b1630;
  --s2: #0f1e3e;
  --s3: #13244a;
  --s-hover: #162a54;

  --bd: rgba(74,118,210,0.14);
  --bd2: rgba(74,118,210,0.26);
  --bd3: rgba(74,118,210,0.42);

  --t1: #dce9f8;
  --t2: #7a9ad4;
  --t3: #4e70bc;

  --f-serif: 'Instrument Serif', Georgia, serif;
  --f-sans: 'DM Sans', system-ui, sans-serif;
  --f-mono: 'JetBrains Mono', monospace;

  --r1: 6px;
  --r2: 10px;
  --r3: 14px;
  --r4: 20px;
}

*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

html { scroll-behavior: smooth; }

body {
  font-family: var(--f-sans);
  background: var(--ink-950);
  color: var(--t1);
  min-height: 100vh;
  font-size: 15px;
  line-height: 1.6;
  -webkit-font-smoothing: antialiased;
}

::-webkit-scrollbar { width: 5px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: var(--ink-600); border-radius: 99px; }

/* PAGE SYSTEM */
.page { display: none; min-height: 100vh; }
.page.active { display: block; }

/* NAVBAR */
.nav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 100;
  height: 56px;
  display: flex; align-items: center; padding: 0 28px; gap: 6px;
  background: rgba(4,9,26,0.8);
  backdrop-filter: blur(20px) saturate(1.4);
  border-bottom: 1px solid var(--bd);
}
.nav-brand {
  display: flex; align-items: center; gap: 10px;
  font-family: var(--f-serif); font-size: 20px;
  color: var(--t1); cursor: pointer;
  margin-right: auto; text-decoration: none;
  letter-spacing: -0.01em;
}
.brand-mark {
  width: 28px; height: 28px; border-radius: var(--r1);
  background: var(--blue);
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}
.brand-dot {
  width: 8px; height: 8px; border-radius: 50%;
  background: white;
}
.brand-name em { font-style: italic; color: var(--blue-light); }

.nav-item {
  padding: 6px 14px; border-radius: var(--r1);
  color: var(--t2); font-size: 14px; font-weight: 400;
  cursor: pointer; transition: all 0.15s;
  border: none; background: none; font-family: var(--f-sans);
}
.nav-item:hover { color: var(--t1); background: var(--s2); }
.nav-item.on { color: var(--t1); background: var(--s2); }

.nav-stat {
  display: flex; align-items: center; gap: 5px;
  padding: 5px 12px; border-radius: 99px;
  background: var(--s2); border: 1px solid var(--bd);
  font-size: 13px; font-weight: 500; color: var(--t2);
  font-family: var(--f-sans);
}
.nav-stat strong { color: var(--t1); font-weight: 600; }

.avatar {
  width: 32px; height: 32px; border-radius: 50%;
  background: linear-gradient(135deg, var(--ink-500), var(--blue));
  display: flex; align-items: center; justify-content: center;
  font-size: 12px; font-weight: 600; cursor: pointer;
  border: 1.5px solid var(--bd2); color: var(--t1);
  flex-shrink: 0; font-family: var(--f-sans);
}

/* LAYOUT */
.wrap { max-width: 1100px; margin: 0 auto; padding: 0 28px; }
.wrap-sm { max-width: 680px; margin: 0 auto; padding: 0 28px; }
.wrap-xs { max-width: 440px; margin: 0 auto; padding: 0 20px; }
.pt { padding-top: 56px; }

/* BUTTONS */
.btn {
  display: inline-flex; align-items: center; justify-content: center; gap: 8px;
  padding: 11px 22px; border-radius: var(--r2);
  font-family: var(--f-sans); font-size: 14px; font-weight: 500;
  cursor: pointer; border: none; transition: all 0.18s;
  letter-spacing: -0.01em; text-decoration: none; white-space: nowrap;
}
.btn-primary { background: var(--blue); color: #fff; }
.btn-primary:hover { background: #4a8bf5; }
.btn-primary:active { transform: scale(0.98); }
.btn-ghost {
  background: transparent; color: var(--t2);
  border: 1px solid var(--bd2);
}
.btn-ghost:hover { background: var(--s2); color: var(--t1); border-color: var(--bd3); }
.btn-muted {
  background: var(--s2); color: var(--t2);
  border: 1px solid var(--bd);
}
.btn-muted:hover { background: var(--s3); color: var(--t1); }
.btn-success { background: var(--green); color: #fff; }
.btn-success:hover { background: #23ce8b; }
.btn-sm { padding: 7px 14px; font-size: 13px; border-radius: var(--r1); }
.btn-lg { padding: 14px 28px; font-size: 15px; }
.btn-full { width: 100%; }

/* CARDS */
.card {
  background: var(--s1);
  border: 1px solid var(--bd);
  border-radius: var(--r3);
  padding: 22px;
}
.card-elevated {
  background: var(--s2);
  border: 1px solid var(--bd2);
  border-radius: var(--r3);
  padding: 28px;
}

/* TAGS / PILLS */
.tag {
  display: inline-flex; align-items: center; gap: 4px;
  padding: 3px 10px; border-radius: 99px;
  font-size: 12px; font-weight: 500; font-family: var(--f-sans);
}
.tag-blue { background: var(--blue-dim); color: var(--blue-light); border: 1px solid rgba(59,124,244,0.22); }
.tag-green { background: var(--green-dim); color: var(--green-light); border: 1px solid rgba(31,184,122,0.22); }
.tag-amber { background: var(--amber-dim); color: var(--amber-light); border: 1px solid rgba(232,160,34,0.22); }
.tag-red { background: var(--red-dim); color: #f87171; border: 1px solid rgba(224,82,82,0.2); }
.tag-purple { background: var(--purple-dim); color: #a78bfa; border: 1px solid rgba(123,94,245,0.22); }
.tag-muted { background: var(--s2); color: var(--t2); border: 1px solid var(--bd); }

/* PROGRESS */
.track {
  height: 6px; background: var(--ink-700);
  border-radius: 99px; overflow: hidden;
}
.fill {
  height: 100%; border-radius: 99px;
  background: var(--blue);
  transition: width 0.7s cubic-bezier(.4,0,.2,1);
}
.fill-green { background: var(--green); }
.fill-amber { background: var(--amber); }

/* INPUT */
.field { display: flex; flex-direction: column; gap: 7px; }
.label { font-size: 12px; font-weight: 500; color: var(--t2); letter-spacing: 0.03em; }
.input {
  background: var(--s2); border: 1px solid var(--bd2);
  border-radius: var(--r2); padding: 11px 15px;
  color: var(--t1); font-family: var(--f-sans); font-size: 14px;
  outline: none; transition: border-color 0.15s, box-shadow 0.15s; width: 100%;
}
.input:focus { border-color: var(--blue); box-shadow: 0 0 0 3px rgba(59,124,244,0.13); }
.input::placeholder { color: var(--t3); }
.input-code {
  font-family: var(--f-mono); font-size: 13px;
  background: var(--ink-900); min-height: 90px; resize: vertical; line-height: 1.7;
}

/* DIVIDER */
.hr { height: 1px; background: var(--bd); margin: 20px 0; }

/* TOAST */
.toast-wrap {
  position: fixed; bottom: 24px; right: 24px; z-index: 999;
  display: flex; flex-direction: column; gap: 8px;
}
.toast {
  display: flex; align-items: center; gap: 10px;
  background: var(--s3); border: 1px solid var(--bd2);
  border-radius: var(--r2); padding: 13px 16px;
  box-shadow: 0 8px 32px rgba(0,0,0,0.4);
  min-width: 260px; max-width: 320px;
  font-size: 13px; font-weight: 400; color: var(--t1);
  animation: tIn .25s ease;
}
.toast-ok { border-color: rgba(31,184,122,0.35); }
.toast-err { border-color: rgba(224,82,82,0.35); }
.t-dot { width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0; }
.t-dot-ok { background: var(--green); }
.t-dot-err { background: var(--red); }
@keyframes tIn { from { opacity:0; transform:translateY(8px); } to { opacity:1; transform:translateY(0); } }

/* MODAL */
.overlay {
  position: fixed; inset: 0; z-index: 200;
  background: rgba(4,9,26,0.75);
  backdrop-filter: blur(6px);
  display: none; align-items: center; justify-content: center;
  padding: 20px;
}
.overlay.open { display: flex; }
.modal {
  background: var(--s2); border: 1px solid var(--bd2);
  border-radius: var(--r4); padding: 36px 32px;
  max-width: 400px; width: 100%; text-align: center;
  box-shadow: 0 20px 60px rgba(0,0,0,0.5);
  animation: mIn .22s cubic-bezier(.34,1.56,.64,1);
}
@keyframes mIn { from { opacity:0; transform:scale(0.94); } to { opacity:1; transform:scale(1); } }

/* CODE BLOCK */
.code-block {
  background: var(--ink-900); border: 1px solid var(--bd);
  border-radius: var(--r2); padding: 16px 18px;
  font-family: var(--f-mono); font-size: 13px; line-height: 1.75;
  color: var(--ink-100); overflow-x: auto;
}
.kw { color: #7aa3f5; }
.fn { color: #9ecbff; }
.st { color: #9fd9a0; }
.nm { color: #d4a574; }
.cm { color: var(--ink-400); }

/* QUIZ OPTION */
.opt {
  width: 100%; background: var(--s1); border: 1px solid var(--bd);
  border-radius: var(--r2); padding: 15px 18px;
  cursor: pointer; transition: all 0.15s;
  font-size: 14px; font-weight: 400; text-align: left;
  color: var(--t1); font-family: var(--f-sans);
  display: flex; align-items: flex-start; gap: 14px;
}
.opt:hover { border-color: var(--bd3); background: var(--s-hover); }
.opt.sel { border-color: var(--blue); background: rgba(59,124,244,0.08); }
.opt.ok { border-color: var(--green); background: var(--green-dim); color: var(--green-light); }
.opt.ng { border-color: var(--red); background: var(--red-dim); color: #f87171; }
.opt-key {
  width: 26px; height: 26px; flex-shrink: 0;
  border-radius: var(--r1); background: var(--s3);
  border: 1px solid var(--bd); font-size: 12px; font-weight: 600;
  display: flex; align-items: center; justify-content: center; color: var(--t2);
  font-family: var(--f-mono);
}
.opt.ok .opt-key { background: rgba(31,184,122,0.2); border-color: rgba(31,184,122,0.4); color: var(--green-light); }
.opt.ng .opt-key { background: rgba(224,82,82,0.15); border-color: rgba(224,82,82,0.35); color: #f87171; }
.opt.sel .opt-key { background: rgba(59,124,244,0.2); border-color: rgba(59,124,244,0.4); color: var(--blue-light); }

/* FEEDBACK */
.feedback {
  border-radius: var(--r3); padding: 16px 20px;
  border: 1px solid; display: flex; gap: 14px; align-items: flex-start;
}
.fb-ok { background: var(--green-dim); border-color: rgba(31,184,122,0.3); }
.fb-ng { background: var(--red-dim); border-color: rgba(224,82,82,0.25); }

/* LEADERBOARD */
.lb-row {
  display: flex; align-items: center; gap: 14px;
  padding: 12px 16px; border-radius: var(--r2);
  transition: background 0.12s;
}
.lb-row:hover { background: var(--s2); }
.lb-row.me { background: rgba(59,124,244,0.08); border: 1px solid rgba(59,124,244,0.2); }
.lb-num { width: 28px; font-size: 14px; font-weight: 600; text-align: center; flex-shrink: 0; color: var(--t2); }
.lb-av {
  width: 36px; height: 36px; border-radius: 50%; flex-shrink: 0;
  display: flex; align-items: center; justify-content: center;
  font-size: 13px; font-weight: 600; color: var(--t1);
}
.lb-name { flex: 1; font-size: 14px; font-weight: 500; }
.lb-xp { font-size: 14px; font-weight: 600; color: var(--amber); font-family: var(--f-mono); }

/* LEVEL CARD */
.lv-card {
  background: var(--s1); border: 1px solid var(--bd);
  border-radius: var(--r3); padding: 20px 22px;
  cursor: pointer; transition: all 0.15s; position: relative;
}
.lv-card:hover { border-color: var(--bd3); }
.lv-card.done { border-color: rgba(31,184,122,0.25); }
.lv-card.done::after {
  content: ''; position: absolute; left: 0; top: 0; bottom: 0;
  width: 3px; border-radius: 3px 0 0 3px;
  background: var(--green);
}
.lv-card.open { border-color: rgba(59,124,244,0.3); }
.lv-card.open::after {
  content: ''; position: absolute; left: 0; top: 0; bottom: 0;
  width: 3px; border-radius: 3px 0 0 3px;
  background: var(--blue);
}
.lv-card.locked { opacity: 0.45; cursor: not-allowed; }
.lv-card.locked:hover { border-color: var(--bd); }
.lv-num {
  width: 38px; height: 38px; border-radius: var(--r1); flex-shrink: 0;
  display: flex; align-items: center; justify-content: center;
  font-size: 16px; font-weight: 700; font-family: var(--f-mono);
}
.lv-num-blue { background: rgba(59,124,244,0.15); color: var(--blue-light); }
.lv-num-green { background: rgba(31,184,122,0.15); color: var(--green-light); }
.lv-num-dim { background: var(--s2); color: var(--t3); }

/* BADGE GRID */
.bdg-item {
  background: var(--s1); border: 1px solid var(--bd);
  border-radius: var(--r3); padding: 22px 16px;
  text-align: center; cursor: default; transition: all 0.15s;
}
.bdg-item:hover { border-color: var(--bd3); }
.bdg-item.off { opacity: 0.35; }
.bdg-ico { font-size: 36px; display: block; margin-bottom: 10px; }
.bdg-name { font-size: 13px; font-weight: 600; color: var(--t1); margin-bottom: 3px; }
.bdg-desc { font-size: 11px; color: var(--t2); }

/* TABLE */
.tbl { width: 100%; border-collapse: collapse; font-size: 14px; }
.tbl th { padding: 10px 14px; text-align: left; font-size: 11px; font-weight: 500; color: var(--t3); text-transform: uppercase; letter-spacing: 0.06em; border-bottom: 1px solid var(--bd); }
.tbl td { padding: 13px 14px; border-bottom: 1px solid var(--bd); color: var(--t1); }
.tbl tr:last-child td { border-bottom: none; }

/* HERO BG */
.bg-glow { position: absolute; border-radius: 50%; filter: blur(100px); pointer-events: none; }

/* STAT CARD */
.sc {
  background: var(--s1); border: 1px solid var(--bd);
  border-radius: var(--r3); padding: 20px;
}
.sc-val { font-size: 30px; font-weight: 700; color: var(--t1); font-family: var(--f-serif); letter-spacing: -0.02em; }
.sc-lbl { font-size: 12px; color: var(--t2); margin-top: 3px; font-weight: 400; }

/* FILTER */
.ftabs { display: flex; gap: 3px; background: var(--s2); padding: 3px; border-radius: var(--r2); border: 1px solid var(--bd); }
.ftab {
  padding: 6px 16px; border-radius: var(--r1);
  font-size: 13px; font-weight: 500; cursor: pointer;
  border: none; background: none; color: var(--t2);
  font-family: var(--f-sans); transition: all 0.15s;
}
.ftab.on { background: var(--s3); color: var(--t1); }

/* SECTION HEADER */
.sh { font-size: 11px; font-weight: 500; color: var(--t3); text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 14px; }

/* GRID */
.g2 { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
.g3 { display: grid; grid-template-columns: repeat(3,1fr); gap: 14px; }
.g4 { display: grid; grid-template-columns: repeat(4,1fr); gap: 14px; }
.ga { display: grid; grid-template-columns: repeat(auto-fill,minmax(150px,1fr)); gap: 12px; }

/* AVATAR COLORS */
.av1 { background: linear-gradient(135deg, #1a3a8a, #3b7cf4); }
.av2 { background: linear-gradient(135deg, #1a4a3a, #1fb87a); }
.av3 { background: linear-gradient(135deg, #4a2a1a, #e8a022); }
.av4 { background: linear-gradient(135deg, #3a1a6a, #7b5ef5); }
.av5 { background: linear-gradient(135deg, #4a1a1a, #e05252); }
.av6 { background: linear-gradient(135deg, #0e4a5a, #06b6d4); }

@media(max-width:800px){
  .g2,.g3,.g4{grid-template-columns:1fr;}
  .ga{grid-template-columns:1fr 1fr;}
  .nav-item{display:none;}
  .wrap,.wrap-sm{padding:0 16px;}
}
@media(max-width:480px){
  .ga{grid-template-columns:1fr;}
}
</style>
</head>
<body>

<!-- TOAST -->
<div class="toast-wrap" id="toasts"></div>

<!-- MODAL: Badge -->
<div class="overlay" id="m-badge">
  <div class="modal">
    <div style="width:56px;height:56px;border-radius:50%;background:var(--amber-dim);border:1px solid rgba(232,160,34,0.3);margin:0 auto 16px;display:flex;align-items:center;justify-content:center;font-size:26px" id="m-badge-ico">🏆</div>
    <div style="font-size:11px;font-weight:500;color:var(--amber);letter-spacing:0.08em;text-transform:uppercase;margin-bottom:8px">Badge Baru</div>
    <div style="font-family:var(--f-serif);font-size:22px;margin-bottom:6px" id="m-badge-name">—</div>
    <div style="font-size:14px;color:var(--t2);margin-bottom:24px" id="m-badge-desc">—</div>
    <button class="btn btn-primary btn-full" onclick="closeModal('m-badge')">Lanjutkan</button>
  </div>
</div>

<!-- MODAL: Locked -->
<div class="overlay" id="m-lock">
  <div class="modal">
    <div style="width:48px;height:48px;border-radius:50%;background:var(--s3);margin:0 auto 16px;display:flex;align-items:center;justify-content:center">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--t2)" stroke-width="2" stroke-linecap="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
    </div>
    <div style="font-size:18px;font-weight:600;margin-bottom:8px">Level Terkunci</div>
    <div style="font-size:14px;color:var(--t2);margin-bottom:24px">Selesaikan level sebelumnya terlebih dahulu.</div>
    <button class="btn btn-ghost btn-full" onclick="closeModal('m-lock')">Mengerti</button>
  </div>
</div>


<!-- ==================== LANDING ==================== -->
<div id="page-landing" class="page active">
  <nav class="nav">
    <div class="nav-brand" onclick="go('landing')">
      <div class="brand-mark"><div class="brand-dot"></div></div>
      <span class="brand-name">Py<em>Learn</em></span>
    </div>
    <button class="btn btn-ghost btn-sm" onclick="go('login')">Masuk</button>
    <button class="btn btn-primary btn-sm" onclick="go('register')">Daftar</button>
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
      <button class="btn btn-primary btn-lg" onclick="go('register')">Buat Akun Gratis</button>
    </div>
  </div>
</div>


<!-- ==================== LOGIN ==================== -->
<div id="page-login" class="page">
  <div style="min-height:100vh;display:flex;align-items:center;justify-content:center;padding:80px 16px;position:relative;overflow:hidden">
    <div class="bg-glow" style="width:600px;height:600px;background:var(--blue);opacity:0.06;top:-100px;right:-200px"></div>
    <div style="width:100%;max-width:380px;position:relative;z-index:1">
      <button class="btn btn-ghost btn-sm" style="margin-bottom:28px" onclick="go('landing')">← Kembali</button>
      <div class="card-elevated">
        <div style="margin-bottom:28px">
          <div class="nav-brand" style="margin-bottom:20px;cursor:default">
            <div class="brand-mark"><div class="brand-dot"></div></div>
            <span class="brand-name">Py<em>Learn</em></span>
          </div>
          <h1 style="font-family:var(--f-serif);font-size:26px;letter-spacing:-0.02em;margin-bottom:5px">Selamat datang kembali</h1>
          <p style="font-size:14px;color:var(--t2);font-weight:300">Lanjutkan perjalanan belajarmu.</p>
        </div>
        <div id="login-err" style="display:none;background:var(--red-dim);border:1px solid rgba(224,82,82,0.3);border-radius:var(--r2);padding:11px 14px;margin-bottom:16px;font-size:13px;color:#f87171">
          Email atau password tidak sesuai.
        </div>
        <div style="display:flex;flex-direction:column;gap:14px">
          <div class="field">
            <label class="label">Email</label>
            <input class="input" type="email" id="le" placeholder="kamu@email.com">
          </div>
          <div class="field">
            <label class="label">Password</label>
            <input class="input" type="password" id="lp" placeholder="••••••••">
          </div>
          <button class="btn btn-primary btn-full" style="margin-top:4px" onclick="doLogin()">Masuk</button>
        </div>
        <div class="hr"></div>
        <p style="text-align:center;font-size:13px;color:var(--t2)">Belum punya akun? <span style="color:var(--blue-light);cursor:pointer;font-weight:500" onclick="go('register')">Daftar</span></p>
      </div>
    </div>
  </div>
</div>


<!-- ==================== REGISTER ==================== -->
<div id="page-register" class="page">
  <div style="min-height:100vh;display:flex;align-items:center;justify-content:center;padding:80px 16px;position:relative;overflow:hidden">
    <div class="bg-glow" style="width:600px;height:600px;background:var(--purple);opacity:0.06;bottom:-100px;left:-200px"></div>
    <div style="width:100%;max-width:380px;position:relative;z-index:1">
      <button class="btn btn-ghost btn-sm" style="margin-bottom:28px" onclick="go('landing')">← Kembali</button>
      <div class="card-elevated">
        <div style="margin-bottom:28px">
          <div class="nav-brand" style="margin-bottom:20px;cursor:default">
            <div class="brand-mark"><div class="brand-dot"></div></div>
            <span class="brand-name">Py<em>Learn</em></span>
          </div>
          <h1 style="font-family:var(--f-serif);font-size:26px;letter-spacing:-0.02em;margin-bottom:5px">Buat akun baru</h1>
          <p style="font-size:14px;color:var(--t2);font-weight:300">Mulai belajar Python hari ini, gratis.</p>
        </div>
        <div style="display:flex;flex-direction:column;gap:13px">
          <div class="field">
            <label class="label">Nama Lengkap</label>
            <input class="input" type="text" placeholder="Nama kamu">
          </div>
          <div class="field">
            <label class="label">Email</label>
            <input class="input" type="email" placeholder="kamu@email.com">
          </div>
          <div class="field">
            <label class="label">Password</label>
            <input class="input" type="password" placeholder="Minimal 8 karakter">
          </div>
          <div class="field">
            <label class="label">Konfirmasi Password</label>
            <input class="input" type="password" placeholder="Ulangi password">
          </div>
          <button class="btn btn-primary btn-full" style="margin-top:4px" onclick="doRegister()">Buat Akun</button>
        </div>
        <div class="hr"></div>
        <p style="text-align:center;font-size:13px;color:var(--t2)">Sudah punya akun? <span style="color:var(--blue-light);cursor:pointer;font-weight:500" onclick="go('login')">Masuk</span></p>
      </div>
    </div>
  </div>
</div>


<!-- ==================== DASHBOARD ==================== -->
<div id="page-dashboard" class="page">
  <nav class="nav">
    <div class="nav-brand" onclick="go('dashboard')">
      <div class="brand-mark"><div class="brand-dot"></div></div>
      <span class="brand-name">Py<em>Learn</em></span>
    </div>
    <div style="margin-left:auto;display:flex;align-items:center;gap:8px">
      <button class="nav-item" onclick="go('dashboard')">Dashboard</button>
      <button class="nav-item" onclick="go('levels')">Level</button>
      <button class="nav-item" onclick="go('leaderboard')">Leaderboard</button>
      <button class="nav-item" onclick="go('badges')">Badge</button>
      <div style="width:1px;height:20px;background:var(--bd);margin:0 4px"></div>
      <div class="nav-stat"><strong>2.450</strong> XP</div>
      <div class="nav-stat">Streak <strong>7</strong></div>
      <div class="avatar" onclick="go('profile')">AR</div>
    </div>
  </nav>

  <div class="pt">
    <div class="wrap" style="padding-top:36px;padding-bottom:56px">

      <!-- Header -->
      <div style="display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:32px;gap:16px;flex-wrap:wrap">
        <div>
          <div style="font-size:12px;color:var(--t3);margin-bottom:6px">Halo, Arya</div>
          <h1 style="font-family:var(--f-serif);font-size:32px;letter-spacing:-0.02em">Lanjutkan di mana kamu berhenti.</h1>
        </div>
        <button class="btn btn-primary" onclick="go('quiz')">Lanjutkan Belajar</button>
      </div>

      <!-- Stats -->
      <div class="g4" style="margin-bottom:24px">
        <div class="sc">
          <div class="sc-val">2.450</div>
          <div class="sc-lbl">Total XP</div>
          <div style="margin-top:12px;display:flex;align-items:center;gap:6px;font-size:12px;color:var(--green);font-weight:500">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
            +120 hari ini
          </div>
        </div>
        <div class="sc">
          <div class="sc-val">5 <span style="font-size:18px;color:var(--t2)">/12</span></div>
          <div class="sc-lbl">Level selesai</div>
          <div style="margin-top:12px">
            <div class="track" style="height:4px">
              <div class="fill" style="width:41%"></div>
            </div>
          </div>
        </div>
        <div class="sc">
          <div class="sc-val">7</div>
          <div class="sc-lbl">Hari streak</div>
          <div style="margin-top:12px;font-size:12px;color:var(--t3)">Rekor terbaik: 14 hari</div>
        </div>
        <div class="sc">
          <div class="sc-val">8</div>
          <div class="sc-lbl">Badge diraih</div>
          <div style="margin-top:12px;font-size:12px;color:var(--t3)">dari 24 tersedia</div>
        </div>
      </div>

      <!-- Main 2-col -->
      <div style="display:grid;grid-template-columns:1fr 300px;gap:20px;align-items:start">
        <div style="display:flex;flex-direction:column;gap:16px">

          <!-- Current Level -->
          <div class="card-elevated">
            <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:18px">
              <div>
                <div class="sh" style="margin-bottom:4px">Level 5 — Sedang berjalan</div>
                <div style="font-size:18px;font-weight:600">Functions & Modules</div>
              </div>
              <div class="tag tag-blue">65%</div>
            </div>
            <div class="track" style="margin-bottom:20px">
              <div class="fill" style="width:65%"></div>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center">
              <span style="font-size:13px;color:var(--t2)">6 dari 10 soal dijawab</span>
              <button class="btn btn-primary btn-sm" onclick="go('quiz')">Lanjutkan</button>
            </div>
          </div>

          <!-- Activity -->
          <div class="card">
            <div class="sh">Aktivitas terbaru</div>
            <div style="display:flex;flex-direction:column">
              <div style="display:flex;align-items:center;gap:14px;padding:13px 0;border-bottom:1px solid var(--bd)">
                <div style="width:8px;height:8px;border-radius:50%;background:var(--green);flex-shrink:0;margin-top:1px"></div>
                <div style="flex:1">
                  <div style="font-size:14px;font-weight:500">Level 4: Loops selesai</div>
                  <div style="font-size:12px;color:var(--t2);margin-top:2px">Skor 90 · 2 jam lalu</div>
                </div>
                <div class="tag tag-green">+200 XP</div>
              </div>
              <div style="display:flex;align-items:center;gap:14px;padding:13px 0;border-bottom:1px solid var(--bd)">
                <div style="width:8px;height:8px;border-radius:50%;background:var(--amber);flex-shrink:0;margin-top:1px"></div>
                <div style="flex:1">
                  <div style="font-size:14px;font-weight:500">Badge "Loop Master" diraih</div>
                  <div style="font-size:12px;color:var(--t2);margin-top:2px">Kemarin</div>
                </div>
                <div class="tag tag-amber">Badge</div>
              </div>
              <div style="display:flex;align-items:center;gap:14px;padding:13px 0">
                <div style="width:8px;height:8px;border-radius:50%;background:var(--blue);flex-shrink:0;margin-top:1px"></div>
                <div style="flex:1">
                  <div style="font-size:14px;font-weight:500">Level 3: Conditionals selesai</div>
                  <div style="font-size:12px;color:var(--t2);margin-top:2px">Skor 80 · 3 hari lalu</div>
                </div>
                <div class="tag tag-blue">+150 XP</div>
              </div>
            </div>
          </div>

          <!-- Shortcuts -->
          <div class="g3" style="gap:10px">
            <button class="card" style="text-align:left;cursor:pointer;border:none;font-family:var(--f-sans)" onclick="go('levels')">
              <div style="font-size:13px;font-weight:500;color:var(--t1);margin-bottom:3px">Level</div>
              <div style="font-size:12px;color:var(--t2)">5 dari 12 selesai</div>
            </button>
            <button class="card" style="text-align:left;cursor:pointer;border:none;font-family:var(--f-sans)" onclick="go('leaderboard')">
              <div style="font-size:13px;font-weight:500;color:var(--t1);margin-bottom:3px">Leaderboard</div>
              <div style="font-size:12px;color:var(--t2)">Posisi #4 global</div>
            </button>
            <button class="card" style="text-align:left;cursor:pointer;border:none;font-family:var(--f-sans)" onclick="go('profile')">
              <div style="font-size:13px;font-weight:500;color:var(--t1);margin-bottom:3px">Profil</div>
              <div style="font-size:12px;color:var(--t2)">Lihat statistikmu</div>
            </button>
          </div>
        </div>

        <!-- Right col -->
        <div style="display:flex;flex-direction:column;gap:16px">
          <!-- XP Chart -->
          <div class="card">
            <div class="sh">XP minggu ini</div>
            <div style="display:flex;align-items:flex-end;gap:5px;height:72px;margin-bottom:10px">
              <div style="display:flex;flex-direction:column;align-items:center;gap:3px;flex:1">
                <div style="background:var(--ink-700);border-radius:3px;width:100%;height:30%"></div>
                <div style="font-size:9px;color:var(--t3)">Sen</div>
              </div>
              <div style="display:flex;flex-direction:column;align-items:center;gap:3px;flex:1">
                <div style="background:var(--blue);border-radius:3px;width:100%;height:70%;opacity:0.7"></div>
                <div style="font-size:9px;color:var(--t3)">Sel</div>
              </div>
              <div style="display:flex;flex-direction:column;align-items:center;gap:3px;flex:1">
                <div style="background:var(--blue);border-radius:3px;width:100%;height:50%;opacity:0.7"></div>
                <div style="font-size:9px;color:var(--t3)">Rab</div>
              </div>
              <div style="display:flex;flex-direction:column;align-items:center;gap:3px;flex:1">
                <div style="background:var(--blue);border-radius:3px;width:100%;height:90%;opacity:0.85"></div>
                <div style="font-size:9px;color:var(--t3)">Kam</div>
              </div>
              <div style="display:flex;flex-direction:column;align-items:center;gap:3px;flex:1">
                <div style="background:var(--blue);border-radius:3px;width:100%;height:60%;opacity:0.75"></div>
                <div style="font-size:9px;color:var(--t3)">Jum</div>
              </div>
              <div style="display:flex;flex-direction:column;align-items:center;gap:3px;flex:1">
                <div style="background:var(--blue);border-radius:3px;width:100%;height:100%"></div>
                <div style="font-size:9px;color:var(--t3)">Sab</div>
              </div>
              <div style="display:flex;flex-direction:column;align-items:center;gap:3px;flex:1">
                <div style="background:var(--s3);border-radius:3px;width:100%;height:15%;border:1px dashed var(--bd2)"></div>
                <div style="font-size:9px;color:var(--t3)">Min</div>
              </div>
            </div>
            <div style="display:flex;justify-content:space-between;font-size:12px">
              <span style="color:var(--t2)">Total</span>
              <span style="font-weight:600;color:var(--amber);font-family:var(--f-mono)">840 XP</span>
            </div>
          </div>

          <!-- Leaderboard preview -->
          <div class="card">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px">
              <div class="sh" style="margin:0">Top pelajar</div>
              <span style="font-size:12px;color:var(--blue-light);cursor:pointer" onclick="go('leaderboard')">Lihat semua</span>
            </div>
            <div style="display:flex;flex-direction:column;gap:2px">
              <div style="display:flex;align-items:center;gap:10px;padding:8px 0">
                <span style="font-size:12px;width:20px;text-align:center;color:var(--amber);font-weight:700">1</span>
                <div class="avatar av4" style="width:28px;height:28px;font-size:11px">BW</div>
                <span style="font-size:13px;flex:1">Budi W.</span>
                <span style="font-size:12px;color:var(--amber);font-family:var(--f-mono)">5.2K</span>
              </div>
              <div style="display:flex;align-items:center;gap:10px;padding:8px 0">
                <span style="font-size:12px;width:20px;text-align:center;color:var(--t2)">2</span>
                <div class="avatar av2" style="width:28px;height:28px;font-size:11px">SR</div>
                <span style="font-size:13px;flex:1">Siti R.</span>
                <span style="font-size:12px;color:var(--amber);font-family:var(--f-mono)">4.8K</span>
              </div>
              <div style="display:flex;align-items:center;gap:10px;padding:8px;border-radius:var(--r1);background:rgba(59,124,244,0.08)">
                <span style="font-size:12px;width:20px;text-align:center;color:var(--blue-light)">#4</span>
                <div class="avatar av1" style="width:28px;height:28px;font-size:11px">AR</div>
                <span style="font-size:13px;flex:1;color:var(--blue-light)">Kamu</span>
                <span style="font-size:12px;color:var(--amber);font-family:var(--f-mono)">2.4K</span>
              </div>
            </div>
          </div>

          <!-- Badges preview -->
          <div class="card">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px">
              <div class="sh" style="margin:0">Badge terbaru</div>
              <span style="font-size:12px;color:var(--blue-light);cursor:pointer" onclick="go('badges')">Lihat semua</span>
            </div>
            <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:6px">
              <div style="aspect-ratio:1;background:var(--s2);border-radius:var(--r2);display:flex;align-items:center;justify-content:center;font-size:22px">🏆</div>
              <div style="aspect-ratio:1;background:var(--s2);border-radius:var(--r2);display:flex;align-items:center;justify-content:center;font-size:22px">🎯</div>
              <div style="aspect-ratio:1;background:var(--s2);border-radius:var(--r2);display:flex;align-items:center;justify-content:center;font-size:22px">🔄</div>
              <div style="aspect-ratio:1;background:var(--s2);border-radius:var(--r2);display:flex;align-items:center;justify-content:center;font-size:22px;opacity:0.3">🌟</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- ==================== LEVELS ==================== -->
<div id="page-levels" class="page">
  <nav class="nav">
    <div class="nav-brand" onclick="go('dashboard')">
      <div class="brand-mark"><div class="brand-dot"></div></div>
      <span class="brand-name">Py<em>Learn</em></span>
    </div>
    <div style="margin-left:auto;display:flex;align-items:center;gap:8px">
      <button class="nav-item" onclick="go('dashboard')">Dashboard</button>
      <button class="nav-item on" onclick="go('levels')">Level</button>
      <button class="nav-item" onclick="go('leaderboard')">Leaderboard</button>
      <button class="nav-item" onclick="go('badges')">Badge</button>
      <div style="width:1px;height:20px;background:var(--bd);margin:0 4px"></div>
      <div class="nav-stat"><strong>2.450</strong> XP</div>
      <div class="avatar" onclick="go('profile')">AR</div>
    </div>
  </nav>
  <div class="pt">
    <div style="background:var(--s1);border-bottom:1px solid var(--bd);padding:28px 0">
      <div class="wrap">
        <h1 style="font-family:var(--f-serif);font-size:28px;letter-spacing:-0.02em;margin-bottom:6px">Kurikulum</h1>
        <p style="font-size:14px;color:var(--t2);margin-bottom:16px">Dari dasar hingga lanjutan, satu level demi satu level.</p>
        <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap">
          <div style="flex:1;max-width:280px">
            <div class="track" style="height:5px">
              <div class="fill fill-green" style="width:41%"></div>
            </div>
          </div>
          <span style="font-size:13px;color:var(--t2)">5 dari 12 level selesai</span>
        </div>
      </div>
    </div>
    <div class="wrap" style="padding-top:28px;padding-bottom:56px">
      <div style="display:flex;flex-direction:column;gap:8px">

        <div class="lv-card done" onclick="go('result')">
          <div style="display:flex;align-items:center;gap:16px">
            <div class="lv-num lv-num-green">01</div>
            <div style="flex:1">
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:3px">
                <span style="font-size:15px;font-weight:600">Python Dasar</span>
                <div class="tag tag-green">Selesai</div>
              </div>
              <p style="font-size:13px;color:var(--t2)">Variabel, tipe data, dan operasi dasar</p>
            </div>
            <div style="text-align:right;flex-shrink:0">
              <div style="font-size:20px;font-weight:700;font-family:var(--f-mono);color:var(--green-light)">95</div>
              <div style="font-size:11px;color:var(--t2)">skor</div>
            </div>
          </div>
        </div>

        <div class="lv-card done" onclick="go('result')">
          <div style="display:flex;align-items:center;gap:16px">
            <div class="lv-num lv-num-green">02</div>
            <div style="flex:1">
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:3px">
                <span style="font-size:15px;font-weight:600">String & Input</span>
                <div class="tag tag-green">Selesai</div>
              </div>
              <p style="font-size:13px;color:var(--t2)">Manipulasi string dan interaksi pengguna</p>
            </div>
            <div style="text-align:right;flex-shrink:0">
              <div style="font-size:20px;font-weight:700;font-family:var(--f-mono);color:var(--green-light)">80</div>
              <div style="font-size:11px;color:var(--t2)">skor</div>
            </div>
          </div>
        </div>

        <div class="lv-card done" onclick="go('result')">
          <div style="display:flex;align-items:center;gap:16px">
            <div class="lv-num lv-num-green">03</div>
            <div style="flex:1">
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:3px">
                <span style="font-size:15px;font-weight:600">Conditionals</span>
                <div class="tag tag-green">Selesai</div>
              </div>
              <p style="font-size:13px;color:var(--t2)">Percabangan if, elif, dan else</p>
            </div>
            <div style="text-align:right;flex-shrink:0">
              <div style="font-size:20px;font-weight:700;font-family:var(--f-mono);color:var(--green-light)">70</div>
              <div style="font-size:11px;color:var(--t2)">skor</div>
            </div>
          </div>
        </div>

        <div class="lv-card done" onclick="go('result')">
          <div style="display:flex;align-items:center;gap:16px">
            <div class="lv-num lv-num-green">04</div>
            <div style="flex:1">
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:3px">
                <span style="font-size:15px;font-weight:600">Loops</span>
                <div class="tag tag-green">Selesai</div>
              </div>
              <p style="font-size:13px;color:var(--t2)">Perulangan for dan while</p>
            </div>
            <div style="text-align:right;flex-shrink:0">
              <div style="font-size:20px;font-weight:700;font-family:var(--f-mono);color:var(--green-light)">90</div>
              <div style="font-size:11px;color:var(--t2)">skor</div>
            </div>
          </div>
        </div>

        <div class="lv-card open" onclick="go('quiz')">
          <div style="display:flex;align-items:center;gap:16px">
            <div class="lv-num lv-num-blue">05</div>
            <div style="flex:1">
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:3px">
                <span style="font-size:15px;font-weight:600">Functions & Modules</span>
                <div class="tag tag-blue">Berlangsung</div>
              </div>
              <p style="font-size:13px;color:var(--t2)">Membuat fungsi dan menggunakan modul</p>
              <div style="margin-top:10px;display:flex;align-items:center;gap:10px">
                <div class="track" style="flex:1;height:4px">
                  <div class="fill" style="width:60%"></div>
                </div>
                <span style="font-size:12px;color:var(--t2)">6/10</span>
              </div>
            </div>
          </div>
        </div>

        <div class="lv-card open" onclick="go('quiz')">
          <div style="display:flex;align-items:center;gap:16px">
            <div class="lv-num lv-num-blue">06</div>
            <div style="flex:1">
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:3px">
                <span style="font-size:15px;font-weight:600">List & Dictionary</span>
                <div class="tag tag-blue">Terbuka</div>
              </div>
              <p style="font-size:13px;color:var(--t2)">Struktur data list, tuple, dan dictionary</p>
            </div>
          </div>
        </div>

        <div class="lv-card locked" onclick="showLock()">
          <div style="display:flex;align-items:center;gap:16px">
            <div class="lv-num lv-num-dim">07</div>
            <div style="flex:1">
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:3px">
                <span style="font-size:15px;font-weight:600">File I/O</span>
                <div class="tag tag-muted">Terkunci</div>
              </div>
              <p style="font-size:13px;color:var(--t2)">Membaca dan menulis file</p>
            </div>
          </div>
        </div>

        <div class="lv-card locked" onclick="showLock()">
          <div style="display:flex;align-items:center;gap:16px">
            <div class="lv-num lv-num-dim">08</div>
            <div style="flex:1">
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:3px">
                <span style="font-size:15px;font-weight:600">Exception Handling</span>
                <div class="tag tag-muted">Terkunci</div>
              </div>
              <p style="font-size:13px;color:var(--t2)">Menangani error dengan try/except</p>
            </div>
          </div>
        </div>

        <div class="lv-card locked" onclick="showLock()">
          <div style="display:flex;align-items:center;gap:16px">
            <div class="lv-num lv-num-dim">09</div>
            <div style="flex:1">
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:3px">
                <span style="font-size:15px;font-weight:600">OOP — Kelas & Objek</span>
                <div class="tag tag-muted">Terkunci</div>
              </div>
              <p style="font-size:13px;color:var(--t2)">Pemrograman berorientasi objek</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- ==================== QUIZ ==================== -->
<div id="page-quiz" class="page">
  <nav class="nav">
    <div class="nav-brand" onclick="go('levels')">
      <div class="brand-mark"><div class="brand-dot"></div></div>
      <span class="brand-name">Py<em>Learn</em></span>
    </div>
    <div style="flex:1;display:flex;align-items:center;gap:14px;padding:0 24px">
      <div class="track" style="flex:1;max-width:360px;height:5px">
        <div class="fill" style="width:60%"></div>
      </div>
      <span style="font-size:13px;color:var(--t2);font-family:var(--f-mono)">6 / 10</span>
    </div>
    <div style="display:flex;align-items:center;gap:10px">
      <span style="font-size:13px;color:var(--t2)">3 nyawa tersisa</span>
      <button class="btn btn-ghost btn-sm" onclick="go('levels')">Keluar</button>
    </div>
  </nav>
  <div class="pt">
    <div class="wrap-sm" style="padding-top:40px;padding-bottom:56px">

      <div style="display:flex;gap:8px;margin-bottom:28px">
        <div class="tag tag-blue">Soal 7</div>
        <div class="tag tag-muted">Functions</div>
      </div>

      <div class="card-elevated" style="margin-bottom:18px">
        <p style="font-size:17px;font-weight:500;line-height:1.6;margin-bottom:20px">Apa output dari kode berikut?</p>
        <div class="code-block">
<span class="kw">def</span> <span class="fn">greet</span>(name, greeting=<span class="st">"Halo"</span>):
    <span class="kw">return</span> <span class="st">f"{greeting}, {name}!"</span>

<span class="fn">print</span>(greet(<span class="st">"Arya"</span>))
<span class="fn">print</span>(greet(<span class="st">"Budi"</span>, <span class="st">"Selamat pagi"</span>))
        </div>
      </div>

      <div style="display:flex;flex-direction:column;gap:8px;margin-bottom:20px">
        <button class="opt" onclick="pick(this,false)">
          <div class="opt-key">A</div>
          <span>Halo, Arya!<br>Halo, Budi!</span>
        </button>
        <button class="opt ok" onclick="pick(this,true)">
          <div class="opt-key">B</div>
          <span>Halo, Arya!<br>Selamat pagi, Budi!</span>
        </button>
        <button class="opt" onclick="pick(this,false)">
          <div class="opt-key">C</div>
          <span>Error: missing argument</span>
        </button>
        <button class="opt" onclick="pick(this,false)">
          <div class="opt-key">D</div>
          <span>Selamat pagi, Arya!<br>Halo, Budi!</span>
        </button>
      </div>

      <div class="feedback fb-ok" style="margin-bottom:24px">
        <div>
          <div style="font-size:14px;font-weight:600;color:var(--green-light);margin-bottom:5px">Benar — +15 XP</div>
          <div style="font-size:13px;color:var(--t2);line-height:1.65">Parameter <code style="font-family:var(--f-mono);font-size:12px;color:var(--ink-100)">greeting</code> memiliki nilai default <code style="font-family:var(--f-mono);font-size:12px;color:var(--ink-100)">"Halo"</code>. Jika argumen tidak diberikan, nilai default digunakan.</div>
        </div>
      </div>

      <div style="display:flex;justify-content:space-between">
        <button class="btn btn-ghost">Sebelumnya</button>
        <button class="btn btn-primary" onclick="go('result')">Selanjutnya</button>
      </div>
    </div>
  </div>
</div>


<!-- ==================== RESULT ==================== -->
<div id="page-result" class="page">
  <nav class="nav">
    <div class="nav-brand" onclick="go('dashboard')">
      <div class="brand-mark"><div class="brand-dot"></div></div>
      <span class="brand-name">Py<em>Learn</em></span>
    </div>
    <div style="margin-left:auto">
      <button class="btn btn-ghost btn-sm" onclick="go('dashboard')">Dashboard</button>
    </div>
  </nav>
  <div class="pt">
    <div class="wrap-xs" style="padding-top:52px;padding-bottom:56px;text-align:center">
      <div style="font-size:12px;color:var(--t3);margin-bottom:6px;letter-spacing:0.05em">Level 5 selesai</div>
      <h1 style="font-family:var(--f-serif);font-size:28px;letter-spacing:-0.02em;margin-bottom:32px">Functions & Modules</h1>

      <div style="margin-bottom:32px">
        <div style="font-family:var(--f-serif);font-size:88px;letter-spacing:-0.04em;line-height:1;color:var(--t1)">85</div>
        <div style="font-size:14px;color:var(--t2);margin-top:6px;margin-bottom:14px">dari 100 poin</div>
        <div class="tag tag-green" style="font-size:13px;padding:5px 16px">Lulus</div>
      </div>

      <div class="g3" style="margin-bottom:24px;gap:10px">
        <div class="sc" style="text-align:center">
          <div style="font-family:var(--f-mono);font-size:26px;font-weight:700;color:var(--amber)">+250</div>
          <div class="sc-lbl">XP diraih</div>
        </div>
        <div class="sc" style="text-align:center">
          <div style="font-family:var(--f-mono);font-size:26px;font-weight:700;color:var(--green-light)">8</div>
          <div class="sc-lbl">Benar</div>
        </div>
        <div class="sc" style="text-align:center">
          <div style="font-family:var(--f-mono);font-size:26px;font-weight:700;color:var(--red)">2</div>
          <div class="sc-lbl">Salah</div>
        </div>
      </div>

      <!-- Badge Earned -->
      <div class="card" style="margin-bottom:20px;text-align:center;border-color:rgba(232,160,34,0.25)">
        <div style="font-size:11px;font-weight:500;color:var(--amber);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:10px">Badge diraih</div>
        <div style="font-size:40px;margin-bottom:8px">🧩</div>
        <div style="font-size:15px;font-weight:600;margin-bottom:3px">Function Wizard</div>
        <div style="font-size:12px;color:var(--t2)">Selesaikan Level 5 dengan skor di atas 80</div>
      </div>

      <!-- Summary -->
      <div class="card" style="text-align:left;margin-bottom:22px">
        <div class="sh">Ringkasan</div>
        <div style="display:flex;flex-direction:column;gap:10px">
          <div style="display:flex;align-items:center;gap:10px;font-size:13px">
            <div style="width:6px;height:6px;border-radius:50%;background:var(--green);flex-shrink:0"></div>
            Apa itu fungsi di Python?
          </div>
          <div style="display:flex;align-items:center;gap:10px;font-size:13px">
            <div style="width:6px;height:6px;border-radius:50%;background:var(--green);flex-shrink:0"></div>
            Mendefinisikan fungsi dengan <code style="font-family:var(--f-mono);font-size:11px">def</code>
          </div>
          <div style="display:flex;align-items:center;gap:10px;font-size:13px;color:var(--t2)">
            <div style="width:6px;height:6px;border-radius:50%;background:var(--red);flex-shrink:0"></div>
            Parameter default dalam fungsi
          </div>
          <div style="display:flex;align-items:center;gap:10px;font-size:13px">
            <div style="width:6px;height:6px;border-radius:50%;background:var(--green);flex-shrink:0"></div>
            Return value dari fungsi
          </div>
          <div style="display:flex;align-items:center;gap:10px;font-size:13px;color:var(--t2)">
            <div style="width:6px;height:6px;border-radius:50%;background:var(--red);flex-shrink:0"></div>
            Import modul Python
          </div>
        </div>
      </div>

      <div style="display:flex;flex-direction:column;gap:8px">
        <button class="btn btn-primary btn-full btn-lg" onclick="go('quiz')">Lanjut ke Level 6</button>
        <div style="display:flex;gap:8px">
          <button class="btn btn-ghost btn-full" onclick="go('quiz')">Ulangi</button>
          <button class="btn btn-muted btn-full" onclick="go('dashboard')">Dashboard</button>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- ==================== LEADERBOARD ==================== -->
<div id="page-leaderboard" class="page">
  <nav class="nav">
    <div class="nav-brand" onclick="go('dashboard')">
      <div class="brand-mark"><div class="brand-dot"></div></div>
      <span class="brand-name">Py<em>Learn</em></span>
    </div>
    <div style="margin-left:auto;display:flex;align-items:center;gap:8px">
      <button class="nav-item" onclick="go('dashboard')">Dashboard</button>
      <button class="nav-item" onclick="go('levels')">Level</button>
      <button class="nav-item on" onclick="go('leaderboard')">Leaderboard</button>
      <button class="nav-item" onclick="go('badges')">Badge</button>
      <div style="width:1px;height:20px;background:var(--bd);margin:0 4px"></div>
      <div class="nav-stat"><strong>2.450</strong> XP</div>
      <div class="avatar" onclick="go('profile')">AR</div>
    </div>
  </nav>
  <div class="pt">
    <div style="background:var(--s1);border-bottom:1px solid var(--bd);padding:28px 0">
      <div class="wrap" style="max-width:700px">
        <h1 style="font-family:var(--f-serif);font-size:28px;letter-spacing:-0.02em;margin-bottom:6px">Leaderboard</h1>
        <p style="font-size:14px;color:var(--t2)">Kamu di posisi <strong style="color:var(--blue-light)">#4</strong> dari 1.240 pelajar</p>
      </div>
    </div>
    <div class="wrap" style="max-width:700px;padding-top:28px;padding-bottom:56px">
      <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px">
        <div class="ftabs">
          <button class="ftab on" onclick="ftab(this)">Mingguan</button>
          <button class="ftab" onclick="ftab(this)">All-time</button>
        </div>
        <span style="font-size:13px;color:var(--t2)">1.240 pelajar</span>
      </div>

      <!-- Podium -->
      <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px;margin-bottom:24px">
        <div class="card" style="text-align:center;padding:20px">
          <div style="font-size:11px;font-weight:600;color:var(--t2);margin-bottom:10px;letter-spacing:0.06em">#2</div>
          <div class="avatar av2" style="width:44px;height:44px;font-size:16px;margin:0 auto 10px">SR</div>
          <div style="font-size:14px;font-weight:600;margin-bottom:6px">Siti R.</div>
          <div style="font-family:var(--f-mono);font-size:16px;font-weight:700;color:var(--amber)">4.820</div>
          <div style="font-size:11px;color:var(--t3);margin-top:2px">XP</div>
        </div>
        <div class="card" style="text-align:center;padding:20px;border-color:rgba(232,160,34,0.3)">
          <div style="font-size:11px;font-weight:600;color:var(--amber);margin-bottom:10px;letter-spacing:0.06em">#1</div>
          <div class="avatar av4" style="width:52px;height:52px;font-size:18px;margin:0 auto 10px">BW</div>
          <div style="font-size:15px;font-weight:700;margin-bottom:6px">Budi W.</div>
          <div style="font-family:var(--f-mono);font-size:18px;font-weight:700;color:var(--amber)">5.240</div>
          <div style="font-size:11px;color:var(--t3);margin-top:2px">XP</div>
        </div>
        <div class="card" style="text-align:center;padding:20px">
          <div style="font-size:11px;font-weight:600;color:var(--t2);margin-bottom:10px;letter-spacing:0.06em">#3</div>
          <div class="avatar av3" style="width:44px;height:44px;font-size:16px;margin:0 auto 10px">DP</div>
          <div style="font-size:14px;font-weight:600;margin-bottom:6px">Dewi P.</div>
          <div style="font-family:var(--f-mono);font-size:16px;font-weight:700;color:var(--amber)">4.100</div>
          <div style="font-size:11px;color:var(--t3);margin-top:2px">XP</div>
        </div>
      </div>

      <!-- List -->
      <div class="card">
        <div style="display:flex;align-items:center;gap:14px;padding:10px 14px;border-radius:var(--r1);margin-bottom:4px">
          <div style="font-size:11px;font-weight:500;color:var(--t3);width:28px;text-align:center">No</div>
          <div style="font-size:11px;font-weight:500;color:var(--t3);flex:1">Nama</div>
          <div style="font-size:11px;font-weight:500;color:var(--t3)">Level</div>
          <div style="font-size:11px;font-weight:500;color:var(--t3)">XP</div>
        </div>
        <div style="display:flex;flex-direction:column;gap:2px">
          <div class="lb-row">
            <div class="lb-num" style="color:var(--amber)">1</div>
            <div class="lb-av av4">BW</div>
            <div class="lb-name">Budi Wicaksono</div>
            <div class="tag tag-purple" style="font-size:11px">Lv.12</div>
            <div class="lb-xp">5.240</div>
          </div>
          <div class="lb-row">
            <div class="lb-num">2</div>
            <div class="lb-av av2">SR</div>
            <div class="lb-name">Siti Rahayu</div>
            <div class="tag tag-green" style="font-size:11px">Lv.11</div>
            <div class="lb-xp">4.820</div>
          </div>
          <div class="lb-row">
            <div class="lb-num">3</div>
            <div class="lb-av av3">DP</div>
            <div class="lb-name">Dewi Pratiwi</div>
            <div class="tag tag-amber" style="font-size:11px">Lv.10</div>
            <div class="lb-xp">4.100</div>
          </div>
          <div class="lb-row me">
            <div class="lb-num" style="color:var(--blue-light)">4</div>
            <div class="lb-av av1">AR</div>
            <div class="lb-name" style="color:var(--blue-light)">Arya (Kamu)</div>
            <div class="tag tag-blue" style="font-size:11px">Lv.5</div>
            <div class="lb-xp">2.450</div>
          </div>
          <div class="lb-row">
            <div class="lb-num">5</div>
            <div class="lb-av av5">RK</div>
            <div class="lb-name">Rizky K.</div>
            <div class="tag tag-muted" style="font-size:11px">Lv.5</div>
            <div class="lb-xp">2.200</div>
          </div>
          <div class="lb-row">
            <div class="lb-num">6</div>
            <div class="lb-av av6">NF</div>
            <div class="lb-name">Nadia F.</div>
            <div class="tag tag-muted" style="font-size:11px">Lv.4</div>
            <div class="lb-xp">1.980</div>
          </div>
          <div class="lb-row">
            <div class="lb-num">7</div>
            <div class="lb-av" style="background:var(--s3)">AH</div>
            <div class="lb-name">Ahmad H.</div>
            <div class="tag tag-muted" style="font-size:11px">Lv.4</div>
            <div class="lb-xp">1.750</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- ==================== BADGES ==================== -->
<div id="page-badges" class="page">
  <nav class="nav">
    <div class="nav-brand" onclick="go('dashboard')">
      <div class="brand-mark"><div class="brand-dot"></div></div>
      <span class="brand-name">Py<em>Learn</em></span>
    </div>
    <div style="margin-left:auto;display:flex;align-items:center;gap:8px">
      <button class="nav-item" onclick="go('dashboard')">Dashboard</button>
      <button class="nav-item" onclick="go('levels')">Level</button>
      <button class="nav-item" onclick="go('leaderboard')">Leaderboard</button>
      <button class="nav-item on" onclick="go('badges')">Badge</button>
      <div style="width:1px;height:20px;background:var(--bd);margin:0 4px"></div>
      <div class="nav-stat"><strong>2.450</strong> XP</div>
      <div class="avatar" onclick="go('profile')">AR</div>
    </div>
  </nav>
  <div class="pt">
    <div style="background:var(--s1);border-bottom:1px solid var(--bd);padding:28px 0">
      <div class="wrap">
        <h1 style="font-family:var(--f-serif);font-size:28px;letter-spacing:-0.02em;margin-bottom:6px">Badge</h1>
        <div style="display:flex;align-items:center;gap:14px;flex-wrap:wrap">
          <div style="flex:1;max-width:200px">
            <div class="track" style="height:4px">
              <div class="fill fill-amber" style="width:33%"></div>
            </div>
          </div>
          <span style="font-size:13px;color:var(--t2)">8 dari 24 diraih</span>
        </div>
      </div>
    </div>
    <div class="wrap" style="padding-top:28px;padding-bottom:56px">
      <div style="font-size:11px;font-weight:500;color:var(--green);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:14px">Diraih</div>
      <div class="ga" style="margin-bottom:36px">
        <div class="bdg-item" onclick="showBadge('🏆','First Blood','Selesaikan level pertamamu')">
          <span class="bdg-ico">🏆</span>
          <div class="bdg-name">First Blood</div>
          <div class="bdg-desc">Selesaikan level 1</div>
        </div>
        <div class="bdg-item" onclick="showBadge('🎯','Quiz Master','Skor sempurna di satu level')">
          <span class="bdg-ico">🎯</span>
          <div class="bdg-name">Quiz Master</div>
          <div class="bdg-desc">Skor 100%</div>
        </div>
        <div class="bdg-item" onclick="showBadge('🔄','Loop Master','Kuasai perulangan Python')">
          <span class="bdg-ico">🔄</span>
          <div class="bdg-name">Loop Master</div>
          <div class="bdg-desc">Selesaikan Level 4</div>
        </div>
        <div class="bdg-item" onclick="showBadge('🧩','Function Wizard','Kuasai fungsi Python')">
          <span class="bdg-ico">🧩</span>
          <div class="bdg-name">Function Wizard</div>
          <div class="bdg-desc">Selesaikan Level 5</div>
        </div>
        <div class="bdg-item" onclick="showBadge('⚡','Speed Coder','Selesaikan quiz dalam 5 menit')">
          <span class="bdg-ico">⚡</span>
          <div class="bdg-name">Speed Coder</div>
          <div class="bdg-desc">Quiz &lt; 5 menit</div>
        </div>
        <div class="bdg-item" onclick="showBadge('🔡','String Slayer','Kuasai manipulasi string')">
          <span class="bdg-ico">🔡</span>
          <div class="bdg-name">String Slayer</div>
          <div class="bdg-desc">Selesaikan Level 2</div>
        </div>
        <div class="bdg-item" onclick="showBadge('🏅','Top 10','Masuk 10 besar leaderboard')">
          <span class="bdg-ico">🏅</span>
          <div class="bdg-name">Top 10</div>
          <div class="bdg-desc">Leaderboard top 10</div>
        </div>
        <div class="bdg-item" onclick="showBadge('🔥','Streak Starter','Belajar 3 hari berturut-turut')">
          <span class="bdg-ico">🔥</span>
          <div class="bdg-name">Streak Starter</div>
          <div class="bdg-desc">Streak 3 hari</div>
        </div>
      </div>

      <div style="font-size:11px;font-weight:500;color:var(--t3);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:14px">Belum diraih</div>
      <div class="ga">
        <div class="bdg-item off"><span class="bdg-ico">🐉</span><div class="bdg-name">Dragon Coder</div><div class="bdg-desc">Semua level selesai</div></div>
        <div class="bdg-item off"><span class="bdg-ico">🌟</span><div class="bdg-name">Perfectionist</div><div class="bdg-desc">3 skor sempurna</div></div>
        <div class="bdg-item off"><span class="bdg-ico">🗓️</span><div class="bdg-name">Month Warrior</div><div class="bdg-desc">Streak 30 hari</div></div>
        <div class="bdg-item off"><span class="bdg-ico">👑</span><div class="bdg-name">Python King</div><div class="bdg-desc">Rank #1</div></div>
        <div class="bdg-item off"><span class="bdg-ico">💎</span><div class="bdg-name">Diamond</div><div class="bdg-desc">5.000 XP</div></div>
        <div class="bdg-item off"><span class="bdg-ico">🦉</span><div class="bdg-name">Night Owl</div><div class="bdg-desc">Belajar jam 23.00+</div></div>
      </div>
    </div>
  </div>
</div>


<!-- ==================== PROFILE ==================== -->
<div id="page-profile" class="page">
  <nav class="nav">
    <div class="nav-brand" onclick="go('dashboard')">
      <div class="brand-mark"><div class="brand-dot"></div></div>
      <span class="brand-name">Py<em>Learn</em></span>
    </div>
    <div style="margin-left:auto;display:flex;align-items:center;gap:8px">
      <button class="nav-item" onclick="go('dashboard')">Dashboard</button>
      <button class="nav-item" onclick="go('levels')">Level</button>
      <button class="nav-item" onclick="go('leaderboard')">Leaderboard</button>
      <button class="nav-item" onclick="go('badges')">Badge</button>
      <div style="width:1px;height:20px;background:var(--bd);margin:0 4px"></div>
      <div class="nav-stat"><strong>2.450</strong> XP</div>
      <div class="avatar" onclick="go('profile')">AR</div>
    </div>
  </nav>
  <div class="pt">
    <div class="wrap" style="max-width:800px;padding-top:36px;padding-bottom:56px">

      <!-- Profile Header -->
      <div class="card-elevated" style="display:flex;align-items:center;gap:22px;margin-bottom:22px;flex-wrap:wrap">
        <div class="avatar av1" style="width:64px;height:64px;font-size:22px;font-weight:700;flex-shrink:0">AR</div>
        <div style="flex:1;min-width:180px">
          <h1 style="font-size:22px;font-weight:600;margin-bottom:3px">Arya Ramadhan</h1>
          <p style="font-size:13px;color:var(--t2);margin-bottom:12px">arya.ramadhan@email.com</p>
          <div style="display:flex;gap:6px;flex-wrap:wrap">
            <div class="tag tag-blue">Level 5</div>
            <div class="tag tag-amber">Rank #4</div>
            <div class="tag tag-muted">Streak 7 hari</div>
          </div>
        </div>
        <button class="btn btn-ghost btn-sm">Edit Profil</button>
      </div>

      <div class="g4" style="margin-bottom:22px">
        <div class="sc">
          <div class="sc-val" style="font-family:var(--f-mono);font-size:26px">2.450</div>
          <div class="sc-lbl">Total XP</div>
        </div>
        <div class="sc">
          <div class="sc-val" style="font-family:var(--f-mono);font-size:26px">5</div>
          <div class="sc-lbl">Level selesai</div>
        </div>
        <div class="sc">
          <div class="sc-val" style="font-family:var(--f-mono);font-size:26px">8</div>
          <div class="sc-lbl">Badge diraih</div>
        </div>
        <div class="sc">
          <div class="sc-val" style="font-family:var(--f-mono);font-size:26px">7</div>
          <div class="sc-lbl">Hari streak</div>
        </div>
      </div>

      <div class="card">
        <div class="sh">Riwayat aktivitas</div>
        <table class="tbl">
          <thead>
            <tr>
              <th>Level</th>
              <th>Skor</th>
              <th>XP</th>
              <th>Tanggal</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="font-weight:500">Lv.5 — Functions</td>
              <td style="font-family:var(--f-mono);color:var(--green-light)">85</td>
              <td style="font-family:var(--f-mono);color:var(--amber)">+250</td>
              <td style="color:var(--t2);font-size:13px">Hari ini</td>
              <td><div class="tag tag-green">Lulus</div></td>
            </tr>
            <tr>
              <td style="font-weight:500">Lv.4 — Loops</td>
              <td style="font-family:var(--f-mono);color:var(--green-light)">90</td>
              <td style="font-family:var(--f-mono);color:var(--amber)">+200</td>
              <td style="color:var(--t2);font-size:13px">2 hari lalu</td>
              <td><div class="tag tag-green">Lulus</div></td>
            </tr>
            <tr>
              <td style="font-weight:500">Lv.3 — Conditionals</td>
              <td style="font-family:var(--f-mono);color:var(--amber-light)">70</td>
              <td style="font-family:var(--f-mono);color:var(--amber)">+140</td>
              <td style="color:var(--t2);font-size:13px">5 hari lalu</td>
              <td><div class="tag tag-amber">Lulus</div></td>
            </tr>
            <tr>
              <td style="font-weight:500">Lv.2 — Strings</td>
              <td style="font-family:var(--f-mono);color:var(--green-light)">80</td>
              <td style="font-family:var(--f-mono);color:var(--amber)">+160</td>
              <td style="color:var(--t2);font-size:13px">1 minggu lalu</td>
              <td><div class="tag tag-green">Lulus</div></td>
            </tr>
            <tr>
              <td style="font-weight:500">Lv.1 — Dasar</td>
              <td style="font-family:var(--f-mono);color:var(--green-light)">95</td>
              <td style="font-family:var(--f-mono);color:var(--amber)">+200</td>
              <td style="color:var(--t2);font-size:13px">2 minggu lalu</td>
              <td><div class="tag tag-green">Lulus</div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<script>
function go(p) {
  document.querySelectorAll('.page').forEach(x => x.classList.remove('active'));
  const t = document.getElementById('page-' + p);
  if (t) { t.classList.add('active'); window.scrollTo(0,0); }
}

function doLogin() {
  const e = document.getElementById('le').value;
  const p = document.getElementById('lp').value;
  const err = document.getElementById('login-err');
  if (!e || !p) { err.style.display = 'block'; return; }
  err.style.display = 'none';
  go('dashboard');
  toast('ok', 'Selamat datang kembali, Arya.');
}

function doRegister() {
  go('dashboard');
  toast('ok', 'Akun berhasil dibuat. Selamat belajar!');
  setTimeout(() => showBadge('🏆','First Blood','Selesaikan level pertamamu'), 1400);
}

function pick(el, ok) {
  document.querySelectorAll('.opt').forEach(o => {
    o.classList.remove('sel','ok','ng');
    o.disabled = true;
  });
  if (ok) el.classList.add('ok');
  else { el.classList.add('ng'); document.querySelectorAll('.opt')[1].classList.add('ok'); }
}

function toast(type, msg) {
  const w = document.getElementById('toasts');
  const d = document.createElement('div');
  d.className = 'toast toast-' + type;
  d.innerHTML = `<div class="t-dot t-dot-${type}"></div><span>${msg}</span>`;
  w.appendChild(d);
  setTimeout(() => { d.style.opacity='0'; d.style.transform='translateY(4px)'; d.style.transition='all .2s'; setTimeout(()=>d.remove(),200); }, 3200);
}

function showBadge(ico, name, desc) {
  document.getElementById('m-badge-ico').textContent = ico;
  document.getElementById('m-badge-name').textContent = name;
  document.getElementById('m-badge-desc').textContent = desc;
  document.getElementById('m-badge').classList.add('open');
}

function showLock() { document.getElementById('m-lock').classList.add('open'); }

function closeModal(id) { document.getElementById(id).classList.remove('open'); }

document.querySelectorAll('.overlay').forEach(o => {
  o.addEventListener('click', e => { if (e.target === o) o.classList.remove('open'); });
});

function ftab(el) {
  el.closest('.ftabs').querySelectorAll('.ftab').forEach(t => t.classList.remove('on'));
  el.classList.add('on');
}

window.addEventListener('load', () => {
  setTimeout(() => toast('ok', 'Streak 7 hari berjalan. Pertahankan!'), 700);
});
</script>
</body>
</html>

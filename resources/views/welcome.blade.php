<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PyQuest — Belajar Python dengan Gamifikasi</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
  :root {
    --navy-950: #050d1a;
    --navy-900: #0a1628;
    --navy-800: #0f2040;
    --navy-700: #162d57;
    --navy-600: #1e3d72;
    --navy-500: #2952a0;
    --navy-400: #3668c8;
    --navy-300: #5a86d8;
    --navy-200: #8fb3e8;
    --navy-100: #c4d9f5;
    --navy-50: #e8f1fd;
    --blue-accent: #3b82f6;
    --blue-bright: #60a5fa;
    --purple: #8b5cf6;
    --purple-bright: #a78bfa;
    --green: #10b981;
    --green-bright: #34d399;
    --amber: #f59e0b;
    --amber-bright: #fbbf24;
    --red: #ef4444;
    --red-bright: #f87171;
    --cyan: #06b6d4;
    --surface-1: #0f1f3d;
    --surface-2: #142847;
    --surface-3: #1a3255;
    --surface-hover: #1e3a62;
    --border: rgba(90,134,216,0.18);
    --border-bright: rgba(90,134,216,0.35);
    --text-primary: #e8f1fd;
    --text-secondary: #8fb3e8;
    --text-muted: #5a86d8;
    --font-main: 'Space Grotesk', sans-serif;
    --font-mono: 'JetBrains Mono', monospace;
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --radius-xl: 24px;
    --glow-blue: 0 0 20px rgba(59,130,246,0.25);
    --glow-purple: 0 0 20px rgba(139,92,246,0.25);
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: var(--font-main);
    background: var(--navy-950);
    color: var(--text-primary);
    min-height: 100vh;
    overflow-x: hidden;
  }

  /* ===== SCROLLBAR ===== */
  ::-webkit-scrollbar { width: 6px; }
  ::-webkit-scrollbar-track { background: var(--navy-900); }
  ::-webkit-scrollbar-thumb { background: var(--navy-600); border-radius: 99px; }

  /* ===== PAGE SYSTEM ===== */
  .page { display: none; min-height: 100vh; }
  .page.active { display: block; }

  /* ===== NAVBAR ===== */
  .navbar {
    position: fixed; top: 0; left: 0; right: 0; z-index: 100;
    background: rgba(5,13,26,0.85);
    backdrop-filter: blur(16px);
    border-bottom: 1px solid var(--border);
    height: 60px;
    display: flex; align-items: center;
    padding: 0 24px;
    gap: 8px;
  }
  .navbar-logo {
    display: flex; align-items: center; gap: 10px;
    font-weight: 700; font-size: 18px; color: var(--text-primary);
    cursor: pointer; margin-right: auto; text-decoration: none;
    flex-shrink: 0;
  }
  .logo-icon {
    width: 32px; height: 32px;
    background: linear-gradient(135deg, var(--blue-accent), var(--purple));
    border-radius: var(--radius-sm);
    display: flex; align-items: center; justify-content: center;
    font-size: 16px;
  }
  .logo-text span { color: var(--blue-bright); }
  .nav-links { display: flex; align-items: center; gap: 4px; }
  .nav-link {
    padding: 7px 14px; border-radius: var(--radius-sm);
    color: var(--text-secondary); font-size: 14px; font-weight: 500;
    cursor: pointer; transition: all 0.2s; border: none; background: none;
    white-space: nowrap;
  }
  .nav-link:hover { background: var(--surface-2); color: var(--text-primary); }
  .nav-link.active { background: var(--surface-2); color: var(--blue-bright); }
  .nav-avatar {
    width: 34px; height: 34px; border-radius: 50%;
    background: linear-gradient(135deg, var(--navy-600), var(--purple));
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; font-weight: 700; cursor: pointer;
    border: 2px solid var(--border-bright); color: var(--text-primary);
    flex-shrink: 0;
  }
  .nav-xp-badge {
    display: flex; align-items: center; gap: 6px;
    background: var(--surface-2); border: 1px solid var(--border);
    border-radius: 99px; padding: 5px 12px;
    font-size: 13px; font-weight: 600; color: var(--amber-bright);
    flex-shrink: 0;
  }
  .streak-badge {
    display: flex; align-items: center; gap: 5px;
    background: var(--surface-2); border: 1px solid var(--border);
    border-radius: 99px; padding: 5px 12px;
    font-size: 13px; font-weight: 600; color: var(--red-bright);
    flex-shrink: 0;
  }

  /* ===== BUTTONS ===== */
  .btn {
    display: inline-flex; align-items: center; justify-content: center;
    gap: 8px; padding: 12px 24px; border-radius: var(--radius-md);
    font-family: var(--font-main); font-size: 15px; font-weight: 600;
    cursor: pointer; border: none; transition: all 0.2s; text-decoration: none;
  }
  .btn-primary {
    background: var(--blue-accent);
    color: white;
    box-shadow: 0 4px 0 #1d4ed8;
  }
  .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 5px 0 #1d4ed8; }
  .btn-primary:active { transform: translateY(2px); box-shadow: 0 1px 0 #1d4ed8; }
  .btn-secondary {
    background: var(--surface-2);
    color: var(--text-primary);
    border: 1.5px solid var(--border-bright);
    box-shadow: 0 4px 0 rgba(0,0,0,0.3);
  }
  .btn-secondary:hover { background: var(--surface-hover); }
  .btn-secondary:active { transform: translateY(2px); box-shadow: 0 1px 0 rgba(0,0,0,0.3); }
  .btn-purple {
    background: var(--purple);
    color: white;
    box-shadow: 0 4px 0 #5b21b6;
  }
  .btn-purple:hover { transform: translateY(-1px); box-shadow: 0 5px 0 #5b21b6; }
  .btn-success {
    background: var(--green);
    color: white;
    box-shadow: 0 4px 0 #065f46;
  }
  .btn-danger {
    background: var(--red);
    color: white;
    box-shadow: 0 4px 0 #7f1d1d;
  }
  .btn-sm { padding: 8px 16px; font-size: 13px; border-radius: var(--radius-sm); }
  .btn-lg { padding: 16px 32px; font-size: 17px; border-radius: var(--radius-lg); }
  .btn-full { width: 100%; }

  /* ===== CARDS ===== */
  .card {
    background: var(--surface-1);
    border: 1.5px solid var(--border);
    border-radius: var(--radius-lg);
    padding: 20px;
    transition: border-color 0.2s;
  }
  .card:hover { border-color: var(--border-bright); }
  .card-elevated {
    background: var(--surface-2);
    border: 1.5px solid var(--border-bright);
    border-radius: var(--radius-lg);
    padding: 24px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.3);
  }

  /* ===== PROGRESS BAR ===== */
  .progress-track {
    height: 12px; background: var(--navy-800);
    border-radius: 99px; overflow: hidden;
  }
  .progress-fill {
    height: 100%; border-radius: 99px;
    background: linear-gradient(90deg, var(--blue-accent), var(--blue-bright));
    transition: width 0.8s cubic-bezier(.4,0,.2,1);
    position: relative;
  }
  .progress-fill::after {
    content: ''; position: absolute; inset: 0;
    background: linear-gradient(90deg, transparent 60%, rgba(255,255,255,0.25));
    border-radius: 99px;
  }
  .progress-fill-green {
    background: linear-gradient(90deg, var(--green), var(--green-bright));
  }
  .progress-fill-purple {
    background: linear-gradient(90deg, var(--purple), var(--purple-bright));
  }
  .progress-fill-amber {
    background: linear-gradient(90deg, var(--amber), var(--amber-bright));
  }

  /* ===== BADGE PILL ===== */
  .badge {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 4px 10px; border-radius: 99px;
    font-size: 12px; font-weight: 600;
  }
  .badge-blue { background: rgba(59,130,246,0.2); color: var(--blue-bright); border: 1px solid rgba(59,130,246,0.3); }
  .badge-purple { background: rgba(139,92,246,0.2); color: var(--purple-bright); border: 1px solid rgba(139,92,246,0.3); }
  .badge-green { background: rgba(16,185,129,0.2); color: var(--green-bright); border: 1px solid rgba(16,185,129,0.3); }
  .badge-amber { background: rgba(245,158,11,0.2); color: var(--amber-bright); border: 1px solid rgba(245,158,11,0.3); }
  .badge-red { background: rgba(239,68,68,0.2); color: var(--red-bright); border: 1px solid rgba(239,68,68,0.3); }
  .badge-gray { background: rgba(90,134,216,0.1); color: var(--text-secondary); border: 1px solid var(--border); }

  /* ===== DIVIDER ===== */
  .divider { height: 1px; background: var(--border); margin: 20px 0; }

  /* ===== INPUT ===== */
  .input-group { display: flex; flex-direction: column; gap: 8px; }
  .input-label { font-size: 13px; font-weight: 600; color: var(--text-secondary); }
  .input {
    background: var(--surface-2); border: 1.5px solid var(--border);
    border-radius: var(--radius-md); padding: 12px 16px;
    color: var(--text-primary); font-family: var(--font-main); font-size: 15px;
    outline: none; transition: border-color 0.2s, box-shadow 0.2s;
    width: 100%;
  }
  .input:focus { border-color: var(--blue-accent); box-shadow: 0 0 0 3px rgba(59,130,246,0.15); }
  .input::placeholder { color: var(--text-muted); }
  .input-code {
    font-family: var(--font-mono); font-size: 14px;
    background: var(--navy-900); border-color: var(--border);
    line-height: 1.6; min-height: 100px; resize: vertical;
  }

  /* ===== LAYOUT ===== */
  .main-layout {
    padding-top: 60px;
    min-height: 100vh;
  }
  .container { max-width: 1140px; margin: 0 auto; padding: 0 24px; }
  .grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
  .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
  .grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
  .grid-auto { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 16px; }
  .flex { display: flex; }
  .flex-col { display: flex; flex-direction: column; }
  .items-center { align-items: center; }
  .justify-between { justify-content: space-between; }
  .gap-2 { gap: 8px; }
  .gap-3 { gap: 12px; }
  .gap-4 { gap: 16px; }
  .gap-6 { gap: 24px; }

  /* ===== SECTION HEADER ===== */
  .section-title { font-size: 22px; font-weight: 700; color: var(--text-primary); }
  .section-sub { font-size: 14px; color: var(--text-secondary); margin-top: 4px; }

  /* ===== TOAST ===== */
  .toast-container {
    position: fixed; bottom: 24px; right: 24px; z-index: 999;
    display: flex; flex-direction: column; gap: 10px;
  }
  .toast {
    display: flex; align-items: center; gap: 12px;
    background: var(--surface-2); border: 1.5px solid var(--border-bright);
    border-radius: var(--radius-md); padding: 14px 18px;
    box-shadow: 0 12px 40px rgba(0,0,0,0.5);
    min-width: 280px; animation: toastIn 0.3s ease;
    font-size: 14px; font-weight: 500;
  }
  .toast-success { border-color: rgba(16,185,129,0.5); }
  .toast-error { border-color: rgba(239,68,68,0.5); }
  .toast-icon { font-size: 20px; flex-shrink: 0; }
  @keyframes toastIn {
    from { transform: translateX(100%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
  }

  /* ===== MODAL ===== */
  .modal-overlay {
    position: fixed; inset: 0; z-index: 200;
    background: rgba(5,13,26,0.85);
    display: none; align-items: center; justify-content: center;
    backdrop-filter: blur(4px);
  }
  .modal-overlay.open { display: flex; }
  .modal {
    background: var(--surface-2); border: 1.5px solid var(--border-bright);
    border-radius: var(--radius-xl); padding: 36px;
    max-width: 440px; width: 90%; text-align: center;
    box-shadow: 0 24px 80px rgba(0,0,0,0.6);
    animation: modalIn 0.3s cubic-bezier(.34,1.56,.64,1);
  }
  @keyframes modalIn {
    from { transform: scale(0.85); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
  }

  /* ===== STAT CARD ===== */
  .stat-card {
    background: var(--surface-1);
    border: 1.5px solid var(--border);
    border-radius: var(--radius-lg);
    padding: 20px;
    display: flex; flex-direction: column; gap: 12px;
  }
  .stat-icon {
    width: 44px; height: 44px; border-radius: var(--radius-md);
    display: flex; align-items: center; justify-content: center;
    font-size: 22px;
  }
  .stat-value { font-size: 28px; font-weight: 700; color: var(--text-primary); }
  .stat-label { font-size: 13px; color: var(--text-secondary); font-weight: 500; }

  /* ===== LEVEL CARD ===== */
  .level-card {
    background: var(--surface-1); border: 1.5px solid var(--border);
    border-radius: var(--radius-lg); padding: 20px;
    cursor: pointer; transition: all 0.2s; position: relative; overflow: hidden;
  }
  .level-card:hover { border-color: var(--border-bright); transform: translateY(-2px); }
  .level-card.locked { opacity: 0.55; cursor: not-allowed; }
  .level-card.locked:hover { transform: none; }
  .level-card.completed { border-color: rgba(16,185,129,0.4); }
  .level-card.completed::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
    background: var(--green);
  }
  .level-card.unlocked { border-color: rgba(59,130,246,0.4); }
  .level-card.unlocked::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
    background: var(--blue-accent);
  }
  .level-number {
    width: 44px; height: 44px; border-radius: var(--radius-md);
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; font-weight: 800; flex-shrink: 0;
  }
  .level-number-blue { background: rgba(59,130,246,0.2); color: var(--blue-bright); }
  .level-number-green { background: rgba(16,185,129,0.2); color: var(--green-bright); }
  .level-number-locked { background: var(--surface-2); color: var(--text-muted); }

  /* ===== QUIZ ===== */
  .quiz-option {
    background: var(--surface-1); border: 2px solid var(--border);
    border-radius: var(--radius-md); padding: 16px 20px;
    cursor: pointer; transition: all 0.18s; font-size: 15px; font-weight: 500;
    text-align: left; color: var(--text-primary);
    display: flex; align-items: center; gap: 14px;
  }
  .quiz-option:hover { border-color: var(--blue-accent); background: var(--surface-hover); }
  .quiz-option.selected { border-color: var(--blue-accent); background: rgba(59,130,246,0.12); }
  .quiz-option.correct { border-color: var(--green); background: rgba(16,185,129,0.12); color: var(--green-bright); }
  .quiz-option.wrong { border-color: var(--red); background: rgba(239,68,68,0.12); color: var(--red-bright); }
  .option-letter {
    width: 32px; height: 32px; border-radius: var(--radius-sm);
    background: var(--surface-2); border: 1.5px solid var(--border);
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; font-weight: 700; flex-shrink: 0; color: var(--text-secondary);
  }
  .quiz-option.correct .option-letter { background: rgba(16,185,129,0.25); border-color: var(--green); color: var(--green-bright); }
  .quiz-option.wrong .option-letter { background: rgba(239,68,68,0.25); border-color: var(--red); color: var(--red-bright); }
  .quiz-option.selected .option-letter { background: rgba(59,130,246,0.25); border-color: var(--blue-accent); color: var(--blue-bright); }

  /* ===== CODE BLOCK ===== */
  .code-block {
    background: var(--navy-900); border: 1px solid var(--border);
    border-radius: var(--radius-md); padding: 16px 20px;
    font-family: var(--font-mono); font-size: 14px; line-height: 1.7;
    color: var(--navy-100); overflow-x: auto;
  }
  .code-keyword { color: #c792ea; }
  .code-function { color: #82aaff; }
  .code-string { color: #c3e88d; }
  .code-number { color: #f78c6c; }
  .code-comment { color: #546e7a; }

  /* ===== LEADERBOARD ===== */
  .lb-row {
    display: flex; align-items: center; gap: 16px;
    padding: 14px 20px; border-radius: var(--radius-md);
    transition: background 0.15s;
  }
  .lb-row:hover { background: var(--surface-2); }
  .lb-row.me { background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.3); }
  .lb-rank { width: 36px; font-size: 16px; font-weight: 700; text-align: center; flex-shrink: 0; }
  .lb-avatar {
    width: 40px; height: 40px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 15px; font-weight: 700; flex-shrink: 0;
  }
  .lb-name { flex: 1; font-weight: 600; font-size: 15px; }
  .lb-xp { font-size: 15px; font-weight: 700; color: var(--amber-bright); }

  /* ===== BADGE GRID ===== */
  .badge-item {
    background: var(--surface-1); border: 1.5px solid var(--border);
    border-radius: var(--radius-lg); padding: 24px 16px;
    text-align: center; cursor: default; transition: all 0.2s;
    position: relative;
  }
  .badge-item:hover { border-color: var(--border-bright); transform: translateY(-2px); }
  .badge-item.locked { opacity: 0.4; }
  .badge-icon { font-size: 44px; display: block; margin-bottom: 12px; }
  .badge-name { font-size: 13px; font-weight: 700; color: var(--text-primary); margin-bottom: 4px; }
  .badge-desc { font-size: 11px; color: var(--text-secondary); }

  /* ===== FEEDBACK BAR ===== */
  .feedback-bar {
    border-radius: var(--radius-lg); padding: 18px 24px;
    display: flex; align-items: center; gap: 16px;
    border: 2px solid;
  }
  .feedback-bar.correct { background: rgba(16,185,129,0.12); border-color: rgba(16,185,129,0.5); }
  .feedback-bar.wrong { background: rgba(239,68,68,0.1); border-color: rgba(239,68,68,0.4); }

  /* ===== HERO BG ===== */
  .hero-bg {
    position: absolute; inset: 0; overflow: hidden; z-index: 0;
    pointer-events: none;
  }
  .hero-orb {
    position: absolute; border-radius: 50%;
    filter: blur(80px); opacity: 0.25;
  }
  .hero-orb-1 { width: 600px; height: 600px; background: var(--blue-accent); top: -200px; right: -100px; }
  .hero-orb-2 { width: 400px; height: 400px; background: var(--purple); bottom: -100px; left: -100px; }

  /* ===== FEATURE ICON ===== */
  .feature-icon {
    width: 56px; height: 56px; border-radius: var(--radius-lg);
    display: flex; align-items: center; justify-content: center;
    font-size: 28px; margin-bottom: 14px;
  }

  /* ===== RESULT ===== */
  .result-score {
    font-size: 80px; font-weight: 800;
    background: linear-gradient(135deg, var(--blue-bright), var(--purple-bright));
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    line-height: 1;
  }

  /* ===== SIDEBAR LAYOUT ===== */
  .sidebar-layout {
    display: grid; grid-template-columns: 240px 1fr; gap: 24px;
    align-items: start;
  }
  .sidebar {
    background: var(--surface-1); border: 1.5px solid var(--border);
    border-radius: var(--radius-lg); padding: 16px; position: sticky; top: 80px;
  }
  .sidebar-link {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 14px; border-radius: var(--radius-md);
    font-size: 14px; font-weight: 500; cursor: pointer;
    color: var(--text-secondary); transition: all 0.15s;
    border: none; background: none; width: 100%;
  }
  .sidebar-link:hover { background: var(--surface-2); color: var(--text-primary); }
  .sidebar-link.active { background: rgba(59,130,246,0.15); color: var(--blue-bright); }

  /* ===== TABLE ===== */
  .table { width: 100%; border-collapse: collapse; }
  .table th, .table td { padding: 14px 16px; text-align: left; border-bottom: 1px solid var(--border); }
  .table th { font-size: 12px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em; }
  .table td { font-size: 14px; color: var(--text-primary); }
  .table tr:last-child td { border-bottom: none; }

  /* ===== NOTIFICATION ===== */
  .notif {
    display: flex; align-items: flex-start; gap: 12px;
    padding: 14px 16px; border-radius: var(--radius-md);
    background: var(--surface-2); border: 1px solid var(--border);
    font-size: 13px;
  }
  .notif-dot { width: 8px; height: 8px; border-radius: 50%; background: var(--blue-accent); margin-top: 3px; flex-shrink: 0; }

  /* ===== FILTER TABS ===== */
  .filter-tabs { display: flex; gap: 4px; background: var(--surface-2); padding: 4px; border-radius: var(--radius-md); }
  .filter-tab {
    padding: 7px 18px; border-radius: var(--radius-sm);
    font-size: 13px; font-weight: 600; cursor: pointer; border: none;
    background: none; color: var(--text-secondary); transition: all 0.18s;
  }
  .filter-tab.active { background: var(--navy-700); color: var(--text-primary); }

  /* ===== PAGE HERO ===== */
  .page-hero { background: var(--surface-1); border-bottom: 1px solid var(--border); padding: 32px 0; }

  /* ===== AVATAR COLORS ===== */
  .av-blue { background: linear-gradient(135deg, #1d4ed8, #3b82f6); }
  .av-purple { background: linear-gradient(135deg, #6d28d9, #8b5cf6); }
  .av-green { background: linear-gradient(135deg, #065f46, #10b981); }
  .av-amber { background: linear-gradient(135deg, #92400e, #f59e0b); }
  .av-red { background: linear-gradient(135deg, #7f1d1d, #ef4444); }
  .av-cyan { background: linear-gradient(135deg, #0e7490, #06b6d4); }

  /* ===== RESPONSIVE ===== */
  @media (max-width: 768px) {
    .grid-2, .grid-3, .grid-4 { grid-template-columns: 1fr; }
    .grid-auto { grid-template-columns: 1fr 1fr; }
    .sidebar-layout { grid-template-columns: 1fr; }
    .sidebar { display: none; }
    .nav-links { display: none; }
    .hero-section { padding: 60px 0 40px; }
  }
  @media (max-width: 480px) {
    .grid-auto { grid-template-columns: 1fr; }
    .container { padding: 0 16px; }
    .result-score { font-size: 60px; }
  }
</style>
</head>
<body>

<!-- ===== TOAST CONTAINER ===== -->
<div class="toast-container" id="toastContainer"></div>

<!-- ===== BADGE MODAL ===== -->
<div class="modal-overlay" id="badgeModal">
  <div class="modal">
    <div style="font-size:64px;margin-bottom:16px">🏆</div>
    <div style="font-size:12px;font-weight:600;color:var(--amber-bright);letter-spacing:0.1em;text-transform:uppercase;margin-bottom:8px">Badge Baru!</div>
    <div style="font-size:22px;font-weight:700;margin-bottom:8px" id="badgeModalName">First Blood</div>
    <div style="font-size:14px;color:var(--text-secondary);margin-bottom:24px" id="badgeModalDesc">Selesaikan level pertamamu!</div>
    <button class="btn btn-primary btn-full" onclick="closeBadgeModal()">Keren! ⚡</button>
  </div>
</div>

<!-- ===== LEVEL LOCKED MODAL ===== -->
<div class="modal-overlay" id="lockedModal">
  <div class="modal">
    <div style="font-size:56px;margin-bottom:16px">🔒</div>
    <div style="font-size:20px;font-weight:700;margin-bottom:10px">Level Terkunci</div>
    <div style="font-size:14px;color:var(--text-secondary);margin-bottom:24px">Selesaikan level sebelumnya terlebih dahulu untuk membuka level ini.</div>
    <button class="btn btn-secondary btn-full" onclick="closeLockedModal()">Mengerti</button>
  </div>
</div>


<!-- ============================== -->
<!--        LANDING PAGE            -->
<!-- ============================== -->
<div id="page-landing" class="page active">
  <!-- Navbar Landing -->
  <nav style="position:fixed;top:0;left:0;right:0;z-index:100;background:rgba(5,13,26,0.85);backdrop-filter:blur(16px);border-bottom:1px solid var(--border);height:60px;display:flex;align-items:center;padding:0 24px;gap:12px">
    <div class="navbar-logo" onclick="showPage('landing')">
      <div class="logo-icon">🐍</div>
      <span class="logo-text">Py<span>Quest</span></span>
    </div>
    <div style="margin-left:auto;display:flex;gap:8px">
      <button class="btn btn-secondary btn-sm" onclick="showPage('login')">Masuk</button>
      <button class="btn btn-primary btn-sm" onclick="showPage('register')">Daftar</button>
    </div>
  </nav>

  <!-- Hero -->
  <section style="position:relative;min-height:100vh;display:flex;align-items:center;padding-top:60px">
    <div class="hero-bg">
      <div class="hero-orb hero-orb-1"></div>
      <div class="hero-orb hero-orb-2"></div>
    </div>
    <div class="container" style="position:relative;z-index:1;padding:80px 24px">
      <div style="max-width:680px">
        <div class="badge badge-blue" style="margin-bottom:20px;font-size:13px;padding:6px 14px">
          🐍 Belajar Python dengan cara yang menyenangkan
        </div>
        <h1 style="font-size:clamp(40px,6vw,72px);font-weight:800;line-height:1.1;margin-bottom:20px">
          Kuasai Python<br>
          <span style="background:linear-gradient(135deg,var(--blue-bright),var(--purple-bright));-webkit-background-clip:text;-webkit-text-fill-color:transparent">
            Level demi Level
          </span>
        </h1>
        <p style="font-size:18px;color:var(--text-secondary);line-height:1.7;margin-bottom:36px;max-width:520px">
          Platform belajar Python yang mengubah coding menjadi petualangan epik. Kumpulkan XP, raih badge, dan bersaing di leaderboard!
        </p>
        <div style="display:flex;gap:12px;flex-wrap:wrap">
          <button class="btn btn-primary btn-lg" onclick="showPage('register')">
            🚀 Mulai Belajar Gratis
          </button>
          <button class="btn btn-secondary btn-lg" onclick="showPage('levels')">
            Lihat Kurikulum
          </button>
        </div>
        <!-- Stats bar -->
        <div style="display:flex;gap:32px;margin-top:48px;flex-wrap:wrap">
          <div>
            <div style="font-size:24px;font-weight:800;color:var(--text-primary)">12K+</div>
            <div style="font-size:13px;color:var(--text-secondary)">Pelajar Aktif</div>
          </div>
          <div style="width:1px;background:var(--border)"></div>
          <div>
            <div style="font-size:24px;font-weight:800;color:var(--text-primary)">50+</div>
            <div style="font-size:13px;color:var(--text-secondary)">Level Materi</div>
          </div>
          <div style="width:1px;background:var(--border)"></div>
          <div>
            <div style="font-size:24px;font-weight:800;color:var(--text-primary)">4.9★</div>
            <div style="font-size:13px;color:var(--text-secondary)">Rating Pengguna</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Features -->
  <section style="padding:80px 0;background:var(--surface-1);border-top:1px solid var(--border)">
    <div class="container">
      <div style="text-align:center;margin-bottom:56px">
        <div class="badge badge-purple" style="margin-bottom:16px;font-size:13px">✨ Fitur Unggulan</div>
        <h2 style="font-size:36px;font-weight:800;margin-bottom:12px">Belajar yang Berbeda</h2>
        <p style="color:var(--text-secondary);font-size:16px">Kami mengubah cara belajar coding agar lebih engaging</p>
      </div>
      <div class="grid-3" style="gap:24px">
        <div class="card" style="padding:32px">
          <div class="feature-icon" style="background:rgba(59,130,246,0.15)">🎯</div>
          <h3 style="font-size:18px;font-weight:700;margin-bottom:10px">Level System</h3>
          <p style="color:var(--text-secondary);font-size:14px;line-height:1.7">Belajar secara bertahap dengan sistem level yang terstruktur. Dari dasar hingga mahir, satu langkah demi langkah.</p>
        </div>
        <div class="card" style="padding:32px">
          <div class="feature-icon" style="background:rgba(139,92,246,0.15)">⚡</div>
          <h3 style="font-size:18px;font-weight:700;margin-bottom:10px">Quiz Interaktif</h3>
          <p style="color:var(--text-secondary);font-size:14px;line-height:1.7">Uji pemahaman dengan soal pilihan ganda, kode interaktif, dan feedback instan yang membantu kamu belajar lebih cepat.</p>
        </div>
        <div class="card" style="padding:32px">
          <div class="feature-icon" style="background:rgba(16,185,129,0.15)">🏆</div>
          <h3 style="font-size:18px;font-weight:700;margin-bottom:10px">Badge & Leaderboard</h3>
          <p style="color:var(--text-secondary);font-size:14px;line-height:1.7">Kumpulkan badge eksklusif dan bersaing dengan pelajar lain di leaderboard global. Jadilah yang terbaik!</p>
        </div>
        <div class="card" style="padding:32px">
          <div class="feature-icon" style="background:rgba(245,158,11,0.15)">🔥</div>
          <h3 style="font-size:18px;font-weight:700;margin-bottom:10px">Streak Harian</h3>
          <p style="color:var(--text-secondary);font-size:14px;line-height:1.7">Bangun kebiasaan belajar yang konsisten dengan sistem streak. Semakin panjang streak, semakin besar bonus XP!</p>
        </div>
        <div class="card" style="padding:32px">
          <div class="feature-icon" style="background:rgba(6,182,212,0.15)">💻</div>
          <h3 style="font-size:18px;font-weight:700;margin-bottom:10px">Code Editor</h3>
          <p style="color:var(--text-secondary);font-size:14px;line-height:1.7">Tulis dan jalankan kode Python langsung di browser. Tidak perlu install apapun, langsung coding!</p>
        </div>
        <div class="card" style="padding:32px">
          <div class="feature-icon" style="background:rgba(239,68,68,0.15)">📊</div>
          <h3 style="font-size:18px;font-weight:700;margin-bottom:10px">Progress Tracking</h3>
          <p style="color:var(--text-secondary);font-size:14px;line-height:1.7">Pantau perkembangan belajarmu dengan dashboard yang detail. Lihat statistik dan riwayat aktivitasmu.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section style="padding:100px 0;text-align:center;position:relative;overflow:hidden">
    <div class="hero-bg">
      <div class="hero-orb" style="width:500px;height:500px;background:var(--blue-accent);top:50%;left:50%;transform:translate(-50%,-50%);opacity:0.12"></div>
    </div>
    <div class="container" style="position:relative;z-index:1">
      <h2 style="font-size:clamp(28px,4vw,52px);font-weight:800;margin-bottom:16px">
        Siap Jadi Python Master?
      </h2>
      <p style="font-size:16px;color:var(--text-secondary);margin-bottom:36px">Bergabung dengan ribuan pelajar yang sudah memulai perjalanan coding mereka.</p>
      <button class="btn btn-primary btn-lg" onclick="showPage('register')">
        🎯 Daftar Sekarang — Gratis!
      </button>
    </div>
  </section>
</div>


<!-- ============================== -->
<!--         LOGIN PAGE             -->
<!-- ============================== -->
<div id="page-login" class="page">
  <div style="min-height:100vh;display:flex;align-items:center;justify-content:center;padding:80px 16px;position:relative">
    <div class="hero-bg">
      <div class="hero-orb hero-orb-1" style="opacity:0.12"></div>
      <div class="hero-orb hero-orb-2" style="opacity:0.12"></div>
    </div>
    <div style="width:100%;max-width:400px;position:relative;z-index:1">
      <!-- Back -->
      <button class="btn btn-secondary btn-sm" style="margin-bottom:24px" onclick="showPage('landing')">← Kembali</button>
      
      <div class="card-elevated">
        <div style="text-align:center;margin-bottom:28px">
          <div class="logo-icon" style="width:48px;height:48px;margin:0 auto 14px;font-size:24px">🐍</div>
          <h1 style="font-size:24px;font-weight:800;margin-bottom:6px">Selamat Datang Kembali!</h1>
          <p style="font-size:14px;color:var(--text-secondary)">Lanjutkan perjalanan belajarmu</p>
        </div>
        
        <div id="loginError" style="display:none;background:rgba(239,68,68,0.12);border:1px solid rgba(239,68,68,0.4);border-radius:var(--radius-md);padding:12px 16px;margin-bottom:16px;font-size:13px;color:var(--red-bright)">
          ⚠️ Email atau password salah. Coba lagi.
        </div>

        <div style="display:flex;flex-direction:column;gap:16px">
          <div class="input-group">
            <label class="input-label">Email</label>
            <input class="input" type="email" id="loginEmail" placeholder="kamu@email.com">
          </div>
          <div class="input-group">
            <label class="input-label">Password</label>
            <input class="input" type="password" id="loginPass" placeholder="••••••••">
          </div>
          <button class="btn btn-primary btn-full" style="margin-top:4px" onclick="doLogin()">
            🚀 Masuk
          </button>
        </div>
        
        <div class="divider"></div>
        <p style="text-align:center;font-size:14px;color:var(--text-secondary)">
          Belum punya akun? <span style="color:var(--blue-bright);cursor:pointer;font-weight:600" onclick="showPage('register')">Daftar sekarang</span>
        </p>
      </div>
    </div>
  </div>
</div>


<!-- ============================== -->
<!--       REGISTER PAGE            -->
<!-- ============================== -->
<div id="page-register" class="page">
  <div style="min-height:100vh;display:flex;align-items:center;justify-content:center;padding:80px 16px;position:relative">
    <div class="hero-bg">
      <div class="hero-orb hero-orb-1" style="opacity:0.12"></div>
      <div class="hero-orb hero-orb-2" style="opacity:0.12"></div>
    </div>
    <div style="width:100%;max-width:420px;position:relative;z-index:1">
      <button class="btn btn-secondary btn-sm" style="margin-bottom:24px" onclick="showPage('landing')">← Kembali</button>
      <div class="card-elevated">
        <div style="text-align:center;margin-bottom:28px">
          <div class="logo-icon" style="width:48px;height:48px;margin:0 auto 14px;font-size:24px">🐍</div>
          <h1 style="font-size:24px;font-weight:800;margin-bottom:6px">Mulai Perjalananmu!</h1>
          <p style="font-size:14px;color:var(--text-secondary)">Buat akun gratis dan mulai belajar</p>
        </div>
        <div style="display:flex;flex-direction:column;gap:14px">
          <div class="input-group">
            <label class="input-label">Nama Lengkap</label>
            <input class="input" type="text" placeholder="Nama kamu">
          </div>
          <div class="input-group">
            <label class="input-label">Email</label>
            <input class="input" type="email" placeholder="kamu@email.com">
          </div>
          <div class="input-group">
            <label class="input-label">Password</label>
            <input class="input" type="password" placeholder="Min. 8 karakter">
          </div>
          <div class="input-group">
            <label class="input-label">Konfirmasi Password</label>
            <input class="input" type="password" placeholder="Ulangi password">
          </div>
          <button class="btn btn-primary btn-full" style="margin-top:4px" onclick="doRegister()">
            🎯 Buat Akun
          </button>
        </div>
        <div class="divider"></div>
        <p style="text-align:center;font-size:14px;color:var(--text-secondary)">
          Sudah punya akun? <span style="color:var(--blue-bright);cursor:pointer;font-weight:600" onclick="showPage('login')">Masuk sekarang</span>
        </p>
      </div>
    </div>
  </div>
</div>


<!-- ============================== -->
<!--       DASHBOARD PAGE           -->
<!-- ============================== -->
<div id="page-dashboard" class="page">
  <!-- Navbar App -->
  <nav class="navbar">
    <div class="navbar-logo" onclick="showPage('dashboard')">
      <div class="logo-icon">🐍</div>
      <span class="logo-text">Py<span>Quest</span></span>
    </div>
    <div class="nav-links">
      <button class="nav-link active" onclick="showPage('dashboard')">Dashboard</button>
      <button class="nav-link" onclick="showPage('levels')">Levels</button>
      <button class="nav-link" onclick="showPage('leaderboard')">Leaderboard</button>
      <button class="nav-link" onclick="showPage('badges')">Badges</button>
    </div>
    <div style="margin-left:auto;display:flex;align-items:center;gap:10px">
      <div class="streak-badge">🔥 7</div>
      <div class="nav-xp-badge">⚡ 2,450 XP</div>
      <div class="nav-avatar" onclick="showPage('profile')">AR</div>
    </div>
  </nav>

  <div class="main-layout">
    <div class="container" style="padding-top:32px;padding-bottom:48px">
      <!-- Welcome -->
      <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:28px;flex-wrap:gap">
        <div>
          <h1 style="font-size:26px;font-weight:800;margin-bottom:4px">Halo, Arya! 👋</h1>
          <p style="color:var(--text-secondary);font-size:15px">Streak kamu sedang panas! Lanjutkan belajar hari ini.</p>
        </div>
        <button class="btn btn-primary" onclick="showPage('quiz')">⚡ Lanjutkan Belajar</button>
      </div>

      <!-- Stats Grid -->
      <div class="grid-4" style="margin-bottom:24px">
        <div class="stat-card">
          <div style="display:flex;align-items:center;justify-content:space-between">
            <div class="stat-icon" style="background:rgba(59,130,246,0.15)">⚡</div>
            <span class="badge badge-blue">+120 hari ini</span>
          </div>
          <div>
            <div class="stat-value">2,450</div>
            <div class="stat-label">Total XP</div>
          </div>
        </div>
        <div class="stat-card">
          <div style="display:flex;align-items:center;justify-content:space-between">
            <div class="stat-icon" style="background:rgba(16,185,129,0.15)">📊</div>
            <span class="badge badge-green">Level 5</span>
          </div>
          <div>
            <div class="stat-value">5/12</div>
            <div class="stat-label">Level Selesai</div>
          </div>
        </div>
        <div class="stat-card">
          <div style="display:flex;align-items:center;justify-content:space-between">
            <div class="stat-icon" style="background:rgba(239,68,68,0.15)">🔥</div>
            <span class="badge badge-red">Rekor: 14</span>
          </div>
          <div>
            <div class="stat-value">7</div>
            <div class="stat-label">Streak Hari</div>
          </div>
        </div>
        <div class="stat-card">
          <div style="display:flex;align-items:center;justify-content:space-between">
            <div class="stat-icon" style="background:rgba(245,158,11,0.15)">🏆</div>
            <span class="badge badge-amber">3 baru</span>
          </div>
          <div>
            <div class="stat-value">8</div>
            <div class="stat-label">Badge Diraih</div>
          </div>
        </div>
      </div>

      <!-- Main Grid -->
      <div style="display:grid;grid-template-columns:1fr 340px;gap:24px;align-items:start">
        <!-- Left -->
        <div style="display:flex;flex-direction:column;gap:20px">
          <!-- Progress Card -->
          <div class="card-elevated">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px">
              <div>
                <div style="font-size:13px;color:var(--text-secondary);font-weight:600;margin-bottom:4px">PROGRESS LEVEL 5</div>
                <div style="font-size:18px;font-weight:700">Functions & Modules</div>
              </div>
              <div style="text-align:right">
                <div style="font-size:24px;font-weight:800;color:var(--blue-bright)">65%</div>
                <div style="font-size:12px;color:var(--text-muted)">6/10 soal</div>
              </div>
            </div>
            <div class="progress-track" style="height:16px;margin-bottom:20px">
              <div class="progress-fill" style="width:65%"></div>
            </div>
            <button class="btn btn-primary btn-full" onclick="showPage('quiz')">
              ⚡ Lanjutkan Quiz — Level 5
            </button>
          </div>

          <!-- Quick Nav -->
          <div class="card">
            <div style="font-size:14px;font-weight:700;color:var(--text-secondary);margin-bottom:16px;text-transform:uppercase;letter-spacing:0.06em">Navigasi Cepat</div>
            <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px">
              <button class="btn btn-secondary" style="flex-direction:column;gap:6px;padding:16px 12px" onclick="showPage('levels')">
                <span style="font-size:22px">🗺️</span>
                <span style="font-size:12px">Levels</span>
              </button>
              <button class="btn btn-secondary" style="flex-direction:column;gap:6px;padding:16px 12px" onclick="showPage('leaderboard')">
                <span style="font-size:22px">🏆</span>
                <span style="font-size:12px">Leaderboard</span>
              </button>
              <button class="btn btn-secondary" style="flex-direction:column;gap:6px;padding:16px 12px" onclick="showPage('profile')">
                <span style="font-size:22px">👤</span>
                <span style="font-size:12px">Profile</span>
              </button>
            </div>
          </div>

          <!-- Recent Activity -->
          <div class="card">
            <div style="font-size:14px;font-weight:700;color:var(--text-secondary);margin-bottom:16px;text-transform:uppercase;letter-spacing:0.06em">Aktivitas Terbaru</div>
            <div style="display:flex;flex-direction:column;gap:0">
              <div style="display:flex;align-items:center;gap:14px;padding:12px 0;border-bottom:1px solid var(--border)">
                <div style="width:36px;height:36px;border-radius:var(--radius-sm);background:rgba(16,185,129,0.15);display:flex;align-items:center;justify-content:center;font-size:18px">✅</div>
                <div style="flex:1">
                  <div style="font-size:14px;font-weight:600">Level 4: Loops selesai</div>
                  <div style="font-size:12px;color:var(--text-secondary)">Skor: 90/100 · 2 jam lalu</div>
                </div>
                <span class="badge badge-green">+200 XP</span>
              </div>
              <div style="display:flex;align-items:center;gap:14px;padding:12px 0;border-bottom:1px solid var(--border)">
                <div style="width:36px;height:36px;border-radius:var(--radius-sm);background:rgba(245,158,11,0.15);display:flex;align-items:center;justify-content:center;font-size:18px">🏆</div>
                <div style="flex:1">
                  <div style="font-size:14px;font-weight:600">Badge "Loop Master" diraih</div>
                  <div style="font-size:12px;color:var(--text-secondary)">Kemarin</div>
                </div>
                <span class="badge badge-amber">Badge</span>
              </div>
              <div style="display:flex;align-items:center;gap:14px;padding:12px 0">
                <div style="width:36px;height:36px;border-radius:var(--radius-sm);background:rgba(59,130,246,0.15);display:flex;align-items:center;justify-content:center;font-size:18px">⚡</div>
                <div style="flex:1">
                  <div style="font-size:14px;font-weight:600">Level 3: Conditionals selesai</div>
                  <div style="font-size:12px;color:var(--text-secondary)">Skor: 80/100 · 3 hari lalu</div>
                </div>
                <span class="badge badge-blue">+150 XP</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Sidebar -->
        <div style="display:flex;flex-direction:column;gap:20px">
          <!-- Badge Preview -->
          <div class="card">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px">
              <div style="font-size:14px;font-weight:700;color:var(--text-secondary);text-transform:uppercase;letter-spacing:0.06em">Badge Terbaru</div>
              <span style="font-size:12px;color:var(--blue-bright);cursor:pointer;font-weight:600" onclick="showPage('badges')">Lihat semua →</span>
            </div>
            <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:8px">
              <div style="text-align:center;padding:10px 4px;background:var(--surface-2);border-radius:var(--radius-md)"><div style="font-size:28px">🏆</div></div>
              <div style="text-align:center;padding:10px 4px;background:var(--surface-2);border-radius:var(--radius-md)"><div style="font-size:28px">🔥</div></div>
              <div style="text-align:center;padding:10px 4px;background:var(--surface-2);border-radius:var(--radius-md)"><div style="font-size:28px">⚡</div></div>
              <div style="text-align:center;padding:10px 4px;background:var(--surface-2);border-radius:var(--radius-md);opacity:0.35"><div style="font-size:28px">🌟</div></div>
            </div>
          </div>

          <!-- Weekly XP -->
          <div class="card">
            <div style="font-size:14px;font-weight:700;color:var(--text-secondary);margin-bottom:16px;text-transform:uppercase;letter-spacing:0.06em">XP Minggu Ini</div>
            <div style="display:flex;align-items:flex-end;gap:6px;height:80px">
              <div style="display:flex;flex-direction:column;align-items:center;gap:4px;flex:1">
                <div style="background:var(--navy-700);border-radius:4px;width:100%;height:30%"></div>
                <div style="font-size:10px;color:var(--text-muted)">Sen</div>
              </div>
              <div style="display:flex;flex-direction:column;align-items:center;gap:4px;flex:1">
                <div style="background:var(--blue-accent);border-radius:4px;width:100%;height:70%"></div>
                <div style="font-size:10px;color:var(--text-muted)">Sel</div>
              </div>
              <div style="display:flex;flex-direction:column;align-items:center;gap:4px;flex:1">
                <div style="background:var(--blue-accent);border-radius:4px;width:100%;height:50%"></div>
                <div style="font-size:10px;color:var(--text-muted)">Rab</div>
              </div>
              <div style="display:flex;flex-direction:column;align-items:center;gap:4px;flex:1">
                <div style="background:var(--blue-accent);border-radius:4px;width:100%;height:90%"></div>
                <div style="font-size:10px;color:var(--text-muted)">Kam</div>
              </div>
              <div style="display:flex;flex-direction:column;align-items:center;gap:4px;flex:1">
                <div style="background:var(--blue-accent);border-radius:4px;width:100%;height:60%"></div>
                <div style="font-size:10px;color:var(--text-muted)">Jum</div>
              </div>
              <div style="display:flex;flex-direction:column;align-items:center;gap:4px;flex:1">
                <div style="background:var(--purple);border-radius:4px;width:100%;height:100%"></div>
                <div style="font-size:10px;color:var(--text-muted)">Sab</div>
              </div>
              <div style="display:flex;flex-direction:column;align-items:center;gap:4px;flex:1">
                <div style="background:var(--navy-700);border-radius:4px 4px 0 0;width:100%;height:20%;border:1.5px dashed var(--border-bright)"></div>
                <div style="font-size:10px;color:var(--text-muted)">Min</div>
              </div>
            </div>
            <div style="margin-top:12px;display:flex;justify-content:space-between;font-size:12px">
              <span style="color:var(--text-secondary)">Total minggu ini</span>
              <span style="font-weight:700;color:var(--amber-bright)">840 XP</span>
            </div>
          </div>

          <!-- Leaderboard Preview -->
          <div class="card">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px">
              <div style="font-size:14px;font-weight:700;color:var(--text-secondary);text-transform:uppercase;letter-spacing:0.06em">Top Pelajar</div>
              <span style="font-size:12px;color:var(--blue-bright);cursor:pointer;font-weight:600" onclick="showPage('leaderboard')">Lihat semua →</span>
            </div>
            <div style="display:flex;flex-direction:column;gap:4px">
              <div style="display:flex;align-items:center;gap:10px;padding:8px;border-radius:var(--radius-sm)">
                <span style="font-size:16px;width:24px;text-align:center">🥇</span>
                <div class="nav-avatar av-purple" style="width:30px;height:30px;font-size:11px">BW</div>
                <span style="font-size:13px;font-weight:600;flex:1">Budi W.</span>
                <span style="font-size:12px;font-weight:700;color:var(--amber-bright)">5.2K</span>
              </div>
              <div style="display:flex;align-items:center;gap:10px;padding:8px;border-radius:var(--radius-sm)">
                <span style="font-size:16px;width:24px;text-align:center">🥈</span>
                <div class="nav-avatar av-green" style="width:30px;height:30px;font-size:11px">SR</div>
                <span style="font-size:13px;font-weight:600;flex:1">Siti R.</span>
                <span style="font-size:12px;font-weight:700;color:var(--amber-bright)">4.8K</span>
              </div>
              <div style="display:flex;align-items:center;gap:10px;padding:8px;border-radius:var(--radius-sm);background:rgba(59,130,246,0.1)">
                <span style="font-size:14px;width:24px;text-align:center;font-weight:700;color:var(--text-secondary)">#4</span>
                <div class="nav-avatar av-blue" style="width:30px;height:30px;font-size:11px">AR</div>
                <span style="font-size:13px;font-weight:600;flex:1;color:var(--blue-bright)">Kamu</span>
                <span style="font-size:12px;font-weight:700;color:var(--amber-bright)">2.4K</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- ============================== -->
<!--         LEVELS PAGE            -->
<!-- ============================== -->
<div id="page-levels" class="page">
  <nav class="navbar">
    <div class="navbar-logo" onclick="showPage('dashboard')">
      <div class="logo-icon">🐍</div>
      <span class="logo-text">Py<span>Quest</span></span>
    </div>
    <div class="nav-links">
      <button class="nav-link" onclick="showPage('dashboard')">Dashboard</button>
      <button class="nav-link active" onclick="showPage('levels')">Levels</button>
      <button class="nav-link" onclick="showPage('leaderboard')">Leaderboard</button>
      <button class="nav-link" onclick="showPage('badges')">Badges</button>
    </div>
    <div style="margin-left:auto;display:flex;align-items:center;gap:10px">
      <div class="streak-badge">🔥 7</div>
      <div class="nav-xp-badge">⚡ 2,450 XP</div>
      <div class="nav-avatar" onclick="showPage('profile')">AR</div>
    </div>
  </nav>
  <div class="main-layout">
    <div class="page-hero">
      <div class="container">
        <div class="badge badge-blue" style="margin-bottom:12px">🗺️ Kurikulum</div>
        <h1 style="font-size:28px;font-weight:800;margin-bottom:6px">Level Pembelajaran</h1>
        <p style="color:var(--text-secondary)">Perjalananmu dari Python pemula hingga mahir</p>
        <div style="margin-top:16px;display:flex;gap:8px;flex-wrap:wrap">
          <span class="badge badge-green">✅ 5 Selesai</span>
          <span class="badge badge-blue">🔓 2 Terbuka</span>
          <span class="badge badge-gray">🔒 5 Terkunci</span>
        </div>
      </div>
    </div>
    <div class="container" style="padding-top:28px;padding-bottom:48px">
      <!-- Overall Progress -->
      <div class="card" style="margin-bottom:24px">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
          <span style="font-size:14px;font-weight:600;color:var(--text-secondary)">Progress Keseluruhan</span>
          <span style="font-size:14px;font-weight:700">5 / 12 Level</span>
        </div>
        <div class="progress-track">
          <div class="progress-fill progress-fill-green" style="width:41%"></div>
        </div>
      </div>

      <div style="display:flex;flex-direction:column;gap:12px">
        <!-- Level 1 - Completed -->
        <div class="level-card completed" onclick="showPage('result')">
          <div style="display:flex;align-items:center;gap:16px">
            <div class="level-number level-number-green">1</div>
            <div style="flex:1">
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:4px">
                <span style="font-size:16px;font-weight:700">Python Dasar</span>
                <span class="badge badge-green">✅ Selesai</span>
              </div>
              <p style="font-size:13px;color:var(--text-secondary)">Variabel, tipe data, dan operasi dasar Python</p>
            </div>
            <div style="text-align:right;flex-shrink:0">
              <div style="font-size:18px;font-weight:800;color:var(--green-bright)">95</div>
              <div style="font-size:12px;color:var(--text-secondary)">Skor</div>
            </div>
          </div>
          <div style="margin-top:14px">
            <div style="display:flex;justify-content:space-between;font-size:12px;color:var(--text-muted);margin-bottom:6px">
              <span>10/10 soal benar</span><span>+200 XP</span>
            </div>
            <div class="progress-track" style="height:8px">
              <div class="progress-fill progress-fill-green" style="width:100%"></div>
            </div>
          </div>
        </div>

        <!-- Level 2 - Completed -->
        <div class="level-card completed" onclick="showPage('result')">
          <div style="display:flex;align-items:center;gap:16px">
            <div class="level-number level-number-green">2</div>
            <div style="flex:1">
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:4px">
                <span style="font-size:16px;font-weight:700">String & Input</span>
                <span class="badge badge-green">✅ Selesai</span>
              </div>
              <p style="font-size:13px;color:var(--text-secondary)">Manipulasi string dan interaksi dengan pengguna</p>
            </div>
            <div style="text-align:right;flex-shrink:0">
              <div style="font-size:18px;font-weight:800;color:var(--green-bright)">80</div>
              <div style="font-size:12px;color:var(--text-secondary)">Skor</div>
            </div>
          </div>
          <div style="margin-top:14px">
            <div style="display:flex;justify-content:space-between;font-size:12px;color:var(--text-muted);margin-bottom:6px">
              <span>8/10 soal benar</span><span>+160 XP</span>
            </div>
            <div class="progress-track" style="height:8px">
              <div class="progress-fill progress-fill-green" style="width:80%"></div>
            </div>
          </div>
        </div>

        <!-- Level 5 - Unlocked/Current -->
        <div class="level-card unlocked" onclick="showPage('quiz')">
          <div style="display:flex;align-items:center;gap:16px">
            <div class="level-number level-number-blue">5</div>
            <div style="flex:1">
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:4px">
                <span style="font-size:16px;font-weight:700">Functions & Modules</span>
                <span class="badge badge-blue">▶ Lanjutkan</span>
              </div>
              <p style="font-size:13px;color:var(--text-secondary)">Membuat fungsi reusable dan menggunakan modul</p>
            </div>
            <div style="text-align:right;flex-shrink:0">
              <div style="font-size:18px;font-weight:800;color:var(--blue-bright)">—</div>
              <div style="font-size:12px;color:var(--text-secondary)">Skor</div>
            </div>
          </div>
          <div style="margin-top:14px">
            <div style="display:flex;justify-content:space-between;font-size:12px;color:var(--text-muted);margin-bottom:6px">
              <span>6/10 soal dijawab</span><span>+250 XP</span>
            </div>
            <div class="progress-track" style="height:8px">
              <div class="progress-fill" style="width:60%"></div>
            </div>
          </div>
        </div>

        <!-- Level 6 - Unlocked -->
        <div class="level-card unlocked" onclick="showPage('quiz')">
          <div style="display:flex;align-items:center;gap:16px">
            <div class="level-number level-number-blue">6</div>
            <div style="flex:1">
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:4px">
                <span style="font-size:16px;font-weight:700">List & Dictionary</span>
                <span class="badge badge-blue">🔓 Terbuka</span>
              </div>
              <p style="font-size:13px;color:var(--text-secondary)">Struktur data list, tuple, dan dictionary di Python</p>
            </div>
            <div style="text-align:right;flex-shrink:0">
              <div style="font-size:18px;font-weight:800;color:var(--text-muted)">—</div>
              <div style="font-size:12px;color:var(--text-secondary)">Skor</div>
            </div>
          </div>
          <div style="margin-top:14px">
            <div style="display:flex;justify-content:space-between;font-size:12px;color:var(--text-muted);margin-bottom:6px">
              <span>0/10 soal</span><span>+250 XP</span>
            </div>
            <div class="progress-track" style="height:8px">
              <div class="progress-fill" style="width:0%"></div>
            </div>
          </div>
        </div>

        <!-- Level 7 - Locked -->
        <div class="level-card locked" onclick="showLockedModal()">
          <div style="display:flex;align-items:center;gap:16px">
            <div class="level-number level-number-locked">7</div>
            <div style="flex:1">
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:4px">
                <span style="font-size:16px;font-weight:700">File I/O</span>
                <span class="badge badge-gray">🔒 Terkunci</span>
              </div>
              <p style="font-size:13px;color:var(--text-secondary)">Membaca dan menulis file di Python</p>
            </div>
            <div style="text-align:right;flex-shrink:0">
              <div style="font-size:18px;font-weight:800;color:var(--text-muted)">🔒</div>
              <div style="font-size:12px;color:var(--text-secondary)">Skor</div>
            </div>
          </div>
          <div style="margin-top:14px">
            <div style="display:flex;justify-content:space-between;font-size:12px;color:var(--text-muted);margin-bottom:6px">
              <span>Selesaikan Level 6 dulu</span><span>+300 XP</span>
            </div>
            <div class="progress-track" style="height:8px">
              <div class="progress-fill" style="width:0%"></div>
            </div>
          </div>
        </div>

        <!-- Level 8 - Locked -->
        <div class="level-card locked" onclick="showLockedModal()">
          <div style="display:flex;align-items:center;gap:16px">
            <div class="level-number level-number-locked">8</div>
            <div style="flex:1">
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:4px">
                <span style="font-size:16px;font-weight:700">Exception Handling</span>
                <span class="badge badge-gray">🔒 Terkunci</span>
              </div>
              <p style="font-size:13px;color:var(--text-secondary)">Menangani error dan exception dengan try/except</p>
            </div>
          </div>
        </div>

        <div class="level-card locked" onclick="showLockedModal()">
          <div style="display:flex;align-items:center;gap:16px">
            <div class="level-number level-number-locked">9</div>
            <div style="flex:1">
              <div style="display:flex;align-items:center;gap:8px;margin-bottom:4px">
                <span style="font-size:16px;font-weight:700">OOP — Kelas & Objek</span>
                <span class="badge badge-gray">🔒 Terkunci</span>
              </div>
              <p style="font-size:13px;color:var(--text-secondary)">Konsep pemrograman berorientasi objek di Python</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- ============================== -->
<!--          QUIZ PAGE             -->
<!-- ============================== -->
<div id="page-quiz" class="page">
  <nav class="navbar">
    <div class="navbar-logo" onclick="showPage('levels')">
      <div class="logo-icon">🐍</div>
      <span class="logo-text">Py<span>Quest</span></span>
    </div>
    <div style="flex:1;display:flex;align-items:center;gap:16px;padding:0 24px">
      <div class="progress-track" style="flex:1;max-width:400px;height:10px">
        <div class="progress-fill" id="quizProgress" style="width:60%"></div>
      </div>
      <span style="font-size:13px;font-weight:600;color:var(--text-secondary)" id="quizProgressLabel">6 / 10</span>
    </div>
    <div style="display:flex;align-items:center;gap:12px">
      <div style="display:flex;align-items:center;gap:6px;font-size:13px;font-weight:700;color:var(--green-bright)">❤️ 3</div>
      <button class="btn btn-secondary btn-sm" onclick="showPage('levels')">✕ Keluar</button>
    </div>
  </nav>
  <div class="main-layout">
    <div class="container" style="max-width:720px;padding-top:40px;padding-bottom:48px">
      <!-- Question Header -->
      <div style="display:flex;align-items:center;gap:12px;margin-bottom:28px">
        <span class="badge badge-blue" style="font-size:13px;padding:6px 14px">Soal 7 dari 10</span>
        <span class="badge badge-purple" style="font-size:13px">⚡ Functions</span>
      </div>

      <!-- Question -->
      <div class="card-elevated" style="margin-bottom:20px">
        <div style="font-size:18px;font-weight:700;line-height:1.5;margin-bottom:20px">
          Apa output dari kode Python berikut ini?
        </div>
        <!-- Code Snippet -->
        <div class="code-block">
<span class="code-keyword">def</span> <span class="code-function">greet</span>(name, greeting<span class="code-keyword">=</span><span class="code-string">"Halo"</span>):
    <span class="code-keyword">return</span> <span class="code-string">f"{greeting}, {name}!"</span>

<span class="code-function">print</span>(greet(<span class="code-string">"Arya"</span>))
<span class="code-function">print</span>(greet(<span class="code-string">"Budi"</span>, <span class="code-string">"Selamat pagi"</span>))
        </div>
      </div>

      <!-- Options -->
      <div style="display:flex;flex-direction:column;gap:10px;margin-bottom:24px">
        <button class="quiz-option" onclick="selectOption(this, false)">
          <div class="option-letter">A</div>
          <span>Halo, Arya!<br>Halo, Budi!</span>
        </button>
        <button class="quiz-option correct" onclick="selectOption(this, true)">
          <div class="option-letter">B</div>
          <span>Halo, Arya!<br>Selamat pagi, Budi!</span>
        </button>
        <button class="quiz-option" onclick="selectOption(this, false)">
          <div class="option-letter">C</div>
          <span>Error: missing argument</span>
        </button>
        <button class="quiz-option" onclick="selectOption(this, false)">
          <div class="option-letter">D</div>
          <span>Selamat pagi, Arya!<br>Halo, Budi!</span>
        </button>
      </div>

      <!-- Feedback Bar -->
      <div class="feedback-bar correct" style="margin-bottom:24px">
        <div style="font-size:28px">🎉</div>
        <div>
          <div style="font-weight:700;color:var(--green-bright);margin-bottom:4px">Benar! +15 XP</div>
          <div style="font-size:13px;color:var(--text-secondary)">Parameter <code style="font-family:var(--font-mono);color:var(--navy-100);font-size:12px">greeting</code> memiliki nilai default <code style="font-family:var(--font-mono);color:var(--navy-100);font-size:12px">"Halo"</code> yang digunakan jika argumen tidak diberikan.</div>
        </div>
      </div>

      <!-- Actions -->
      <div style="display:flex;justify-content:space-between;align-items:center">
        <button class="btn btn-secondary">← Sebelumnya</button>
        <button class="btn btn-primary btn-lg" onclick="showPage('result')">Selanjutnya →</button>
      </div>
    </div>
  </div>
</div>


<!-- ============================== -->
<!--         RESULT PAGE            -->
<!-- ============================== -->
<div id="page-result" class="page">
  <nav class="navbar">
    <div class="navbar-logo" onclick="showPage('dashboard')">
      <div class="logo-icon">🐍</div>
      <span class="logo-text">Py<span>Quest</span></span>
    </div>
    <div style="margin-left:auto">
      <button class="btn btn-secondary btn-sm" onclick="showPage('dashboard')">Dashboard</button>
    </div>
  </nav>
  <div class="main-layout">
    <div class="container" style="max-width:640px;padding-top:48px;padding-bottom:48px;text-align:center">
      <div style="font-size:64px;margin-bottom:12px">🎊</div>
      <div style="font-size:13px;font-weight:600;color:var(--text-secondary);letter-spacing:0.1em;text-transform:uppercase;margin-bottom:8px">Level 5 Selesai!</div>
      <h1 style="font-size:32px;font-weight:800;margin-bottom:4px">Functions & Modules</h1>
      
      <!-- Score -->
      <div style="margin:32px 0">
        <div class="result-score">85</div>
        <div style="font-size:16px;color:var(--text-secondary);margin-top:8px">dari 100 poin</div>
        <div class="badge badge-green" style="margin-top:12px;font-size:14px;padding:8px 20px">✅ LULUS</div>
      </div>

      <!-- Stats Row -->
      <div class="grid-3" style="margin-bottom:28px;gap:12px">
        <div class="stat-card" style="text-align:center;padding:16px">
          <div style="font-size:28px;font-weight:800;color:var(--amber-bright)">+250</div>
          <div style="font-size:12px;color:var(--text-secondary);margin-top:4px">XP Diraih</div>
        </div>
        <div class="stat-card" style="text-align:center;padding:16px">
          <div style="font-size:28px;font-weight:800;color:var(--green-bright)">8</div>
          <div style="font-size:12px;color:var(--text-secondary);margin-top:4px">Jawaban Benar</div>
        </div>
        <div class="stat-card" style="text-align:center;padding:16px">
          <div style="font-size:28px;font-weight:800;color:var(--red-bright)">2</div>
          <div style="font-size:12px;color:var(--text-secondary);margin-top:4px">Jawaban Salah</div>
        </div>
      </div>

      <!-- Badge Earned -->
      <div class="card" style="margin-bottom:28px;background:rgba(245,158,11,0.08);border-color:rgba(245,158,11,0.3)">
        <div style="font-size:12px;font-weight:600;color:var(--amber-bright);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:12px">🎖️ Badge Baru Diraih!</div>
        <div style="font-size:48px;margin-bottom:8px">🧩</div>
        <div style="font-weight:700;margin-bottom:4px">Function Wizard</div>
        <div style="font-size:13px;color:var(--text-secondary)">Selesaikan Level 5 dengan skor di atas 80</div>
      </div>

      <!-- Summary -->
      <div class="card" style="text-align:left;margin-bottom:28px">
        <div style="font-size:14px;font-weight:700;color:var(--text-secondary);margin-bottom:14px;text-transform:uppercase;letter-spacing:0.06em">Ringkasan Jawaban</div>
        <div style="display:flex;flex-direction:column;gap:8px">
          <div style="display:flex;align-items:center;gap:10px;font-size:13px">
            <span style="color:var(--green-bright)">✅</span>
            <span>Apa itu fungsi di Python?</span>
          </div>
          <div style="display:flex;align-items:center;gap:10px;font-size:13px">
            <span style="color:var(--green-bright)">✅</span>
            <span>Cara mendefinisikan fungsi dengan <code style="font-family:var(--font-mono);font-size:11px">def</code></span>
          </div>
          <div style="display:flex;align-items:center;gap:10px;font-size:13px">
            <span style="color:var(--red-bright)">❌</span>
            <span>Parameter default dalam fungsi</span>
          </div>
          <div style="display:flex;align-items:center;gap:10px;font-size:13px">
            <span style="color:var(--green-bright)">✅</span>
            <span>Return value dari fungsi</span>
          </div>
          <div style="display:flex;align-items:center;gap:10px;font-size:13px">
            <span style="color:var(--red-bright)">❌</span>
            <span>Import modul Python</span>
          </div>
        </div>
      </div>

      <!-- Action Buttons -->
      <div style="display:flex;flex-direction:column;gap:10px">
        <button class="btn btn-primary btn-full btn-lg" onclick="showPage('quiz')">
          ▶ Lanjut ke Level 6
        </button>
        <div style="display:flex;gap:10px">
          <button class="btn btn-secondary btn-full" onclick="showPage('quiz')">🔁 Ulangi Level</button>
          <button class="btn btn-secondary btn-full" onclick="showPage('dashboard')">🏠 Dashboard</button>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- ============================== -->
<!--       LEADERBOARD PAGE         -->
<!-- ============================== -->
<div id="page-leaderboard" class="page">
  <nav class="navbar">
    <div class="navbar-logo" onclick="showPage('dashboard')">
      <div class="logo-icon">🐍</div>
      <span class="logo-text">Py<span>Quest</span></span>
    </div>
    <div class="nav-links">
      <button class="nav-link" onclick="showPage('dashboard')">Dashboard</button>
      <button class="nav-link" onclick="showPage('levels')">Levels</button>
      <button class="nav-link active" onclick="showPage('leaderboard')">Leaderboard</button>
      <button class="nav-link" onclick="showPage('badges')">Badges</button>
    </div>
    <div style="margin-left:auto;display:flex;align-items:center;gap:10px">
      <div class="streak-badge">🔥 7</div>
      <div class="nav-xp-badge">⚡ 2,450 XP</div>
      <div class="nav-avatar" onclick="showPage('profile')">AR</div>
    </div>
  </nav>
  <div class="main-layout">
    <div class="page-hero">
      <div class="container">
        <div class="badge badge-amber" style="margin-bottom:12px">🏆 Kompetisi</div>
        <h1 style="font-size:28px;font-weight:800;margin-bottom:6px">Leaderboard</h1>
        <p style="color:var(--text-secondary)">Kamu ada di posisi <strong style="color:var(--blue-bright)">#4</strong> dari 1.240 pelajar</p>
      </div>
    </div>
    <div class="container" style="padding-top:28px;padding-bottom:48px;max-width:720px">
      <!-- Filter -->
      <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px">
        <div class="filter-tabs">
          <button class="filter-tab active" onclick="setTab(this)">Mingguan</button>
          <button class="filter-tab" onclick="setTab(this)">All-time</button>
        </div>
        <span class="badge badge-blue">1,240 pelajar</span>
      </div>

      <!-- Top 3 Podium -->
      <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:12px;margin-bottom:24px">
        <div class="card" style="text-align:center;padding:20px;order:1">
          <div style="font-size:28px;margin-bottom:8px">🥈</div>
          <div class="nav-avatar av-green" style="width:48px;height:48px;margin:0 auto 10px;font-size:17px">SR</div>
          <div style="font-weight:700;font-size:14px">Siti R.</div>
          <div style="color:var(--amber-bright);font-weight:800;font-size:18px;margin-top:6px">4,820</div>
          <div style="font-size:11px;color:var(--text-muted)">XP</div>
        </div>
        <div class="card" style="text-align:center;padding:20px;background:rgba(245,158,11,0.08);border-color:rgba(245,158,11,0.4);order:0">
          <div style="font-size:32px;margin-bottom:8px">🥇</div>
          <div class="nav-avatar av-purple" style="width:56px;height:56px;margin:0 auto 10px;font-size:20px">BW</div>
          <div style="font-weight:800;font-size:16px">Budi W.</div>
          <div style="color:var(--amber-bright);font-weight:800;font-size:22px;margin-top:6px">5,240</div>
          <div style="font-size:11px;color:var(--text-muted)">XP</div>
        </div>
        <div class="card" style="text-align:center;padding:20px;order:2">
          <div style="font-size:28px;margin-bottom:8px">🥉</div>
          <div class="nav-avatar av-amber" style="width:48px;height:48px;margin:0 auto 10px;font-size:17px">DP</div>
          <div style="font-weight:700;font-size:14px">Dewi P.</div>
          <div style="color:var(--amber-bright);font-weight:800;font-size:18px;margin-top:6px">4,100</div>
          <div style="font-size:11px;color:var(--text-muted)">XP</div>
        </div>
      </div>

      <!-- List -->
      <div class="card">
        <div style="display:flex;flex-direction:column;gap:4px">
          <div class="lb-row">
            <div class="lb-rank">🥇</div>
            <div class="lb-avatar av-purple">BW</div>
            <div class="lb-name">Budi Wicaksono</div>
            <span class="badge badge-purple">Lv.12</span>
            <div class="lb-xp">5,240 XP</div>
          </div>
          <div class="lb-row">
            <div class="lb-rank">🥈</div>
            <div class="lb-avatar av-green">SR</div>
            <div class="lb-name">Siti Rahayu</div>
            <span class="badge badge-green">Lv.11</span>
            <div class="lb-xp">4,820 XP</div>
          </div>
          <div class="lb-row">
            <div class="lb-rank">🥉</div>
            <div class="lb-avatar av-amber">DP</div>
            <div class="lb-name">Dewi Pratiwi</div>
            <span class="badge badge-amber">Lv.10</span>
            <div class="lb-xp">4,100 XP</div>
          </div>
          <div class="lb-row me">
            <div class="lb-rank" style="color:var(--blue-bright)">4</div>
            <div class="lb-avatar av-blue">AR</div>
            <div class="lb-name" style="color:var(--blue-bright)">Arya (Kamu) ✨</div>
            <span class="badge badge-blue">Lv.5</span>
            <div class="lb-xp">2,450 XP</div>
          </div>
          <div class="lb-row">
            <div class="lb-rank" style="color:var(--text-muted)">5</div>
            <div class="lb-avatar av-red">RK</div>
            <div class="lb-name">Rizky K.</div>
            <span class="badge badge-gray">Lv.5</span>
            <div class="lb-xp">2,200 XP</div>
          </div>
          <div class="lb-row">
            <div class="lb-rank" style="color:var(--text-muted)">6</div>
            <div class="lb-avatar av-cyan">NF</div>
            <div class="lb-name">Nadia F.</div>
            <span class="badge badge-gray">Lv.4</span>
            <div class="lb-xp">1,980 XP</div>
          </div>
          <div class="lb-row">
            <div class="lb-rank" style="color:var(--text-muted)">7</div>
            <div class="lb-avatar" style="background:linear-gradient(135deg,#0f2040,#1e3d72)">AH</div>
            <div class="lb-name">Ahmad H.</div>
            <span class="badge badge-gray">Lv.4</span>
            <div class="lb-xp">1,750 XP</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- ============================== -->
<!--         BADGES PAGE            -->
<!-- ============================== -->
<div id="page-badges" class="page">
  <nav class="navbar">
    <div class="navbar-logo" onclick="showPage('dashboard')">
      <div class="logo-icon">🐍</div>
      <span class="logo-text">Py<span>Quest</span></span>
    </div>
    <div class="nav-links">
      <button class="nav-link" onclick="showPage('dashboard')">Dashboard</button>
      <button class="nav-link" onclick="showPage('levels')">Levels</button>
      <button class="nav-link" onclick="showPage('leaderboard')">Leaderboard</button>
      <button class="nav-link active" onclick="showPage('badges')">Badges</button>
    </div>
    <div style="margin-left:auto;display:flex;align-items:center;gap:10px">
      <div class="streak-badge">🔥 7</div>
      <div class="nav-xp-badge">⚡ 2,450 XP</div>
      <div class="nav-avatar" onclick="showPage('profile')">AR</div>
    </div>
  </nav>
  <div class="main-layout">
    <div class="page-hero">
      <div class="container">
        <div class="badge badge-amber" style="margin-bottom:12px">🎖️ Koleksi</div>
        <h1 style="font-size:28px;font-weight:800;margin-bottom:6px">Badge Saya</h1>
        <p style="color:var(--text-secondary)">8 dari 24 badge diraih</p>
        <div style="margin-top:16px;max-width:300px">
          <div class="progress-track" style="height:8px">
            <div class="progress-fill progress-fill-amber" style="width:33%"></div>
          </div>
          <div style="font-size:12px;color:var(--text-muted);margin-top:6px">33% lengkap</div>
        </div>
      </div>
    </div>
    <div class="container" style="padding-top:28px;padding-bottom:48px">
      <!-- Diraih -->
      <div style="font-size:14px;font-weight:700;color:var(--amber-bright);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:14px">✅ Sudah Diraih (8)</div>
      <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));gap:12px;margin-bottom:32px">
        <div class="badge-item" onclick="showBadgeModal('First Blood','Selesaikan level pertamamu!')">
          <span class="badge-icon">⚔️</span>
          <div class="badge-name">First Blood</div>
          <div class="badge-desc">Selesaikan level 1</div>
        </div>
        <div class="badge-item" onclick="showBadgeModal('Streak Starter','Belajar 3 hari berturut-turut!')">
          <span class="badge-icon">🔥</span>
          <div class="badge-name">Streak Starter</div>
          <div class="badge-desc">Streak 3 hari</div>
        </div>
        <div class="badge-item" onclick="showBadgeModal('Quiz Master','Skor sempurna di satu level!')">
          <span class="badge-icon">🎯</span>
          <div class="badge-name">Quiz Master</div>
          <div class="badge-desc">Skor 100%</div>
        </div>
        <div class="badge-item" onclick="showBadgeModal('Loop Master','Kuasai perulangan Python!')">
          <span class="badge-icon">🔄</span>
          <div class="badge-name">Loop Master</div>
          <div class="badge-desc">Selesaikan Level 4</div>
        </div>
        <div class="badge-item" onclick="showBadgeModal('Speed Coder','Selesaikan quiz dalam 5 menit!')">
          <span class="badge-icon">⚡</span>
          <div class="badge-name">Speed Coder</div>
          <div class="badge-desc">Quiz &lt; 5 menit</div>
        </div>
        <div class="badge-item" onclick="showBadgeModal('Top 10','Masuk 10 besar leaderboard!')">
          <span class="badge-icon">🏆</span>
          <div class="badge-name">Top 10</div>
          <div class="badge-desc">Leaderboard top 10</div>
        </div>
        <div class="badge-item" onclick="showBadgeModal('String Slayer','Kuasai manipulasi string!')">
          <span class="badge-icon">🔡</span>
          <div class="badge-name">String Slayer</div>
          <div class="badge-desc">Selesaikan Level 2</div>
        </div>
        <div class="badge-item" onclick="showBadgeModal('Function Wizard','Kuasai fungsi Python!')">
          <span class="badge-icon">🧩</span>
          <div class="badge-name">Function Wizard</div>
          <div class="badge-desc">Selesaikan Level 5</div>
        </div>
      </div>

      <!-- Belum diraih -->
      <div style="font-size:14px;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:14px">🔒 Belum Diraih (16)</div>
      <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));gap:12px">
        <div class="badge-item locked"><span class="badge-icon">🐉</span><div class="badge-name">Dragon Coder</div><div class="badge-desc">Selesaikan semua level</div></div>
        <div class="badge-item locked"><span class="badge-icon">🌟</span><div class="badge-name">Perfectionist</div><div class="badge-desc">3 skor sempurna berturut</div></div>
        <div class="badge-item locked"><span class="badge-icon">🗓️</span><div class="badge-name">Month Warrior</div><div class="badge-desc">Streak 30 hari</div></div>
        <div class="badge-item locked"><span class="badge-icon">👑</span><div class="badge-name">Python King</div><div class="badge-desc">Rank #1 leaderboard</div></div>
        <div class="badge-item locked"><span class="badge-icon">🦉</span><div class="badge-name">Night Owl</div><div class="badge-desc">Belajar jam 23.00+</div></div>
        <div class="badge-item locked"><span class="badge-icon">💎</span><div class="badge-name">Diamond</div><div class="badge-desc">5000 XP terkumpul</div></div>
      </div>
    </div>
  </div>
</div>


<!-- ============================== -->
<!--         PROFILE PAGE           -->
<!-- ============================== -->
<div id="page-profile" class="page">
  <nav class="navbar">
    <div class="navbar-logo" onclick="showPage('dashboard')">
      <div class="logo-icon">🐍</div>
      <span class="logo-text">Py<span>Quest</span></span>
    </div>
    <div class="nav-links">
      <button class="nav-link" onclick="showPage('dashboard')">Dashboard</button>
      <button class="nav-link" onclick="showPage('levels')">Levels</button>
      <button class="nav-link" onclick="showPage('leaderboard')">Leaderboard</button>
      <button class="nav-link" onclick="showPage('badges')">Badges</button>
    </div>
    <div style="margin-left:auto;display:flex;align-items:center;gap:10px">
      <div class="streak-badge">🔥 7</div>
      <div class="nav-xp-badge">⚡ 2,450 XP</div>
      <div class="nav-avatar" onclick="showPage('profile')">AR</div>
    </div>
  </nav>
  <div class="main-layout">
    <div class="container" style="padding-top:32px;padding-bottom:48px;max-width:840px">
      <!-- Profile Header -->
      <div class="card-elevated" style="display:flex;align-items:center;gap:24px;margin-bottom:24px;flex-wrap:wrap">
        <div class="nav-avatar av-blue" style="width:80px;height:80px;font-size:28px;font-weight:800;flex-shrink:0">AR</div>
        <div style="flex:1;min-width:200px">
          <h1 style="font-size:24px;font-weight:800;margin-bottom:4px">Arya Ramadhan</h1>
          <p style="color:var(--text-secondary);font-size:14px;margin-bottom:12px">arya.ramadhan@email.com</p>
          <div style="display:flex;gap:8px;flex-wrap:wrap">
            <span class="badge badge-blue">Level 5</span>
            <span class="badge badge-amber">🏆 Rank #4</span>
            <span class="badge badge-red">🔥 Streak 7</span>
          </div>
        </div>
        <button class="btn btn-secondary btn-sm" style="flex-shrink:0">✏️ Edit Profil</button>
      </div>

      <!-- Stats -->
      <div class="grid-4" style="margin-bottom:24px">
        <div class="stat-card">
          <div class="stat-icon" style="background:rgba(59,130,246,0.15)">⚡</div>
          <div class="stat-value">2,450</div>
          <div class="stat-label">Total XP</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon" style="background:rgba(16,185,129,0.15)">📊</div>
          <div class="stat-value">5</div>
          <div class="stat-label">Level Selesai</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon" style="background:rgba(245,158,11,0.15)">🏆</div>
          <div class="stat-value">8</div>
          <div class="stat-label">Badge Diraih</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon" style="background:rgba(239,68,68,0.15)">🔥</div>
          <div class="stat-value">7</div>
          <div class="stat-label">Hari Streak</div>
        </div>
      </div>

      <!-- Activity History -->
      <div class="card">
        <div style="font-size:14px;font-weight:700;color:var(--text-secondary);margin-bottom:16px;text-transform:uppercase;letter-spacing:0.06em">Riwayat Aktivitas</div>
        <table class="table">
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
              <td><span style="font-weight:600">Lv.5 · Functions</span></td>
              <td><span style="color:var(--green-bright);font-weight:700">85</span></td>
              <td><span style="color:var(--amber-bright);font-weight:700">+250</span></td>
              <td style="color:var(--text-secondary);font-size:13px">Hari ini</td>
              <td><span class="badge badge-green">Lulus</span></td>
            </tr>
            <tr>
              <td><span style="font-weight:600">Lv.4 · Loops</span></td>
              <td><span style="color:var(--green-bright);font-weight:700">90</span></td>
              <td><span style="color:var(--amber-bright);font-weight:700">+200</span></td>
              <td style="color:var(--text-secondary);font-size:13px">2 hari lalu</td>
              <td><span class="badge badge-green">Lulus</span></td>
            </tr>
            <tr>
              <td><span style="font-weight:600">Lv.3 · Conditionals</span></td>
              <td><span style="color:var(--amber-bright);font-weight:700">70</span></td>
              <td><span style="color:var(--amber-bright);font-weight:700">+140</span></td>
              <td style="color:var(--text-secondary);font-size:13px">5 hari lalu</td>
              <td><span class="badge badge-amber">Lulus</span></td>
            </tr>
            <tr>
              <td><span style="font-weight:600">Lv.2 · Strings</span></td>
              <td><span style="color:var(--green-bright);font-weight:700">80</span></td>
              <td><span style="color:var(--amber-bright);font-weight:700">+160</span></td>
              <td style="color:var(--text-secondary);font-size:13px">1 minggu lalu</td>
              <td><span class="badge badge-green">Lulus</span></td>
            </tr>
            <tr>
              <td><span style="font-weight:600">Lv.1 · Dasar</span></td>
              <td><span style="color:var(--green-bright);font-weight:700">95</span></td>
              <td><span style="color:var(--amber-bright);font-weight:700">+200</span></td>
              <td style="color:var(--text-secondary);font-size:13px">2 minggu lalu</td>
              <td><span class="badge badge-green">Lulus</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<script>
  // ===== PAGE NAVIGATION =====
  function showPage(name) {
    document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
    const target = document.getElementById('page-' + name);
    if (target) {
      target.classList.add('active');
      window.scrollTo(0, 0);
    }
  }

  // ===== LOGIN =====
  function doLogin() {
    const email = document.getElementById('loginEmail').value;
    const pass = document.getElementById('loginPass').value;
    if (!email || !pass) {
      document.getElementById('loginError').style.display = 'block';
      return;
    }
    if (email === 'test@test.com' && pass === 'wrong') {
      document.getElementById('loginError').style.display = 'block';
      return;
    }
    document.getElementById('loginError').style.display = 'none';
    showPage('dashboard');
    showToast('success', '👋 Selamat datang kembali, Arya!');
  }

  // ===== REGISTER =====
  function doRegister() {
    showPage('dashboard');
    showToast('success', '🎉 Akun berhasil dibuat! Selamat belajar!');
    setTimeout(() => showBadgeModal('First Blood', 'Selamat datang di PyQuest!'), 1500);
  }

  // ===== QUIZ =====
  function selectOption(el, isCorrect) {
    const options = document.querySelectorAll('.quiz-option');
    options.forEach(o => {
      o.classList.remove('selected', 'correct', 'wrong');
      o.disabled = true;
    });
    if (isCorrect) {
      el.classList.add('correct');
    } else {
      el.classList.add('wrong');
      // Highlight correct
      options[1].classList.add('correct');
    }
  }

  // ===== TOASTS =====
  function showToast(type, msg) {
    const container = document.getElementById('toastContainer');
    const toast = document.createElement('div');
    toast.className = 'toast toast-' + type;
    const icon = type === 'success' ? '✅' : type === 'error' ? '❌' : 'ℹ️';
    toast.innerHTML = `<span class="toast-icon">${icon}</span><span>${msg}</span>`;
    container.appendChild(toast);
    setTimeout(() => { toast.style.opacity = '0'; toast.style.transform = 'translateX(100%)'; toast.style.transition = 'all 0.3s'; setTimeout(() => toast.remove(), 300); }, 3000);
  }

  // ===== MODALS =====
  function showBadgeModal(name, desc) {
    document.getElementById('badgeModalName').textContent = name;
    document.getElementById('badgeModalDesc').textContent = desc;
    document.getElementById('badgeModal').classList.add('open');
  }
  function closeBadgeModal() {
    document.getElementById('badgeModal').classList.remove('open');
    showToast('success', '🏆 Badge "' + document.getElementById('badgeModalName').textContent + '" diraih!');
  }
  function showLockedModal() {
    document.getElementById('lockedModal').classList.add('open');
  }
  function closeLockedModal() {
    document.getElementById('lockedModal').classList.remove('open');
  }

  // Close modal on overlay click
  document.querySelectorAll('.modal-overlay').forEach(overlay => {
    overlay.addEventListener('click', function(e) {
      if (e.target === this) {
        this.classList.remove('open');
      }
    });
  });

  // ===== FILTER TABS =====
  function setTab(el) {
    el.closest('.filter-tabs').querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
    el.classList.add('active');
  }

  // ===== DEMO: Show toast on first load =====
  window.addEventListener('load', () => {
    setTimeout(() => showToast('success', '🔥 Streak 7 hari! Terus semangat!'), 800);
  });
</script>
</body>
</html>

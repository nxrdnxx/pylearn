@extends('layouts.app')
@section('title')
@push('style')
    
@endpush
@section('content')
    <div class="pt">
    <div class="wrap" style="padding-top:36px;padding-bottom:56px">

      <!-- Header -->
      <div style="display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:32px;gap:16px;flex-wrap:wrap">
        <div>
          <div style="font-size:12px;color:var(--t3);margin-bottom:6px">Halo, Arya</div>
          <h1 style="font-family:var(--f-serif);font-size:32px;letter-spacing:-0.02em">Lanjutkan di mana kamu berhenti.</h1>
        </div>
        {{-- <button class="btn btn-primary" onclick="go('quiz')">Lanjutkan Belajar</button> --}}
        <a href="{{ route('quiz') }}" class="btn btn-primary">
            Lanjutkan Belajar
        </a>
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
@endsection
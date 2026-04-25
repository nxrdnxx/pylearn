@extends('layouts.app')
@section('title', 'Leaderboard')
@push('style')
    
@endpush
@section('content')
    <div id="page-leaderboard" class="page">
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
@endsection
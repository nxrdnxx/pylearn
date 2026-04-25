@extends('layouts.app')
@section('title', 'Badge')
@push('style')
    
@endpush
@section('content')
    <div id="page-badges" class="page">
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
@endsection
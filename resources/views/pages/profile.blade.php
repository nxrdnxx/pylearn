@extends('layouts.app')
@section('title', 'Profile')
@push('style')
    
@endpush
@section('content')
    <div id="page-profile" class="page">
  <div class="pt">
    <div class="wrap" style="max-width:800px;padding-top:36px;padding-bottom:56px">

      <!-- Profile Header -->
      <div class="card-elevated" style="display:flex;align-items:center;gap:22px;margin-bottom:22px;flex-wrap:wrap">
        @auth
        <div class="avatar av1" style="width:64px;height:64px;font-size:22px;font-weight:700;flex-shrink:0">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
        <div style="flex:1;min-width:180px">
            <h1 style="font-size:22px;font-weight:600;margin-bottom:3px">
                {{ Auth::user()->name }}
            </h1>
            <p style="font-size:13px;color:var(--t2);margin-bottom:12px">
                {{ Auth::user()->email }}
            </p>
            @endauth
          <div style="display:flex;gap:6px;flex-wrap:wrap">
            <div class="tag tag-blue">Level 5</div>
            <div class="tag tag-amber">Rank #4</div>
            <div class="tag tag-muted">Streak 7 hari</div>
          </div>
        </div>
        <button class="btn btn-ghost btn-sm">Edit Profil</button>
        <button class="btn btn-ghost btn-sm">Logout</button>
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
@endsection
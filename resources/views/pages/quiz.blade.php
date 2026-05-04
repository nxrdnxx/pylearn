@extends('layouts.app')
@section('title')
@push('style')
    
@endpush
@section('content')
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
@endsection
@extends('layouts.app')
@section('title', 'Level')
@push('style')
    
@endpush
@section('content')
    <div id="page-levels" class="page">
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
@endsection
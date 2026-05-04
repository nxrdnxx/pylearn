@extends('layouts.app')

@section('title', 'Leaderboard')

@section('content')
<div id="page-leaderboard" class="page">
  <div class="pt">

    {{-- ================= HEADER ================= --}}
    <div style="background:var(--s1);border-bottom:1px solid var(--bd);padding:28px 0">
      <div class="wrap" style="max-width:700px">
        <h1 style="font-family:var(--f-serif);font-size:28px;margin-bottom:6px">
          Leaderboard
        </h1>

        <p style="font-size:14px;color:var(--t2)">
          Kamu di posisi 
          <strong style="color:var(--blue-light)">
            #{{ $myRank }}
          </strong> dari {{ $users->count() }} pelajar
        </p>
      </div>
    </div>

    <div class="wrap" style="max-width:700px;padding-top:28px;padding-bottom:56px">

      {{-- ================= FILTER ================= --}}
      <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px">
        <div class="ftabs">
          <button class="ftab on">All-time</button>
        </div>

        <span style="font-size:13px;color:var(--t2)">
          {{ $users->count() }} pelajar
        </span>
      </div>

      {{-- ================= PODIUM ================= --}}
      <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px;margin-bottom:24px">

        @foreach($top3 as $user)
        <div class="card" style="text-align:center;padding:20px;
            {{ $user->rank == 1 ? 'border-color:rgba(232,160,34,0.3)' : '' }}
        ">

          <div style="
              font-size:11px;
              font-weight:600;
              margin-bottom:10px;
              {{ $user->rank == 1 ? 'color:var(--amber)' : 'color:var(--t2)' }}
          ">
            #{{ $user->rank }}
          </div>

          <div class="avatar" style="width:44px;height:44px;margin:0 auto 10px">
            {{ strtoupper(substr($user->name, 0, 2)) }}
          </div>

          <div style="font-size:14px;font-weight:600;margin-bottom:6px">
            {{ $user->name }}
          </div>

          <div style="font-family:var(--f-mono);font-size:16px;font-weight:700;color:var(--amber)">
            {{ number_format($user->xp) }}
          </div>

          <div style="font-size:11px;color:var(--t3)">XP</div>
        </div>
        @endforeach

      </div>

      {{-- ================= LIST ================= --}}
      <div class="card">

        {{-- HEADER --}}
        <div style="display:flex;align-items:center;gap:14px;padding:10px 14px;margin-bottom:4px">
          <div style="font-size:11px;color:var(--t3);width:28px;text-align:center">No</div>
          <div style="font-size:11px;color:var(--t3);flex:1">Nama</div>
          <div style="font-size:11px;color:var(--t3)">Level</div>
          <div style="font-size:11px;color:var(--t3)">XP</div>
        </div>

        <div style="display:flex;flex-direction:column;gap:2px">

          @foreach($users as $user)

          <div class="lb-row {{ $user->id == $me->id ? 'me' : '' }}">

            {{-- RANK --}}
            <div class="lb-num
                {{ $user->rank == 1 ? 'text-amber' : '' }}
                {{ $user->id == $me->id ? 'text-blue' : '' }}
            ">
              {{ $user->rank }}
            </div>

            {{-- AVATAR --}}
            <div class="lb-av">
              {{ strtoupper(substr($user->name, 0, 2)) }}
            </div>

            {{-- NAMA --}}
            <div class="lb-name
                {{ $user->id == $me->id ? 'text-blue' : '' }}
            ">
              {{ $user->name }}
              @if($user->id == $me->id)
                (Kamu)
              @endif
            </div>

            {{-- LEVEL --}}
            <div class="tag tag-blue" style="font-size:11px">
              Lv.{{ $user->level }}
            </div>

            {{-- XP --}}
            <div class="lb-xp">
              {{ number_format($user->xp) }}
            </div>

          </div>

          @endforeach

        </div>
      </div>

    </div>
  </div>
</div>
@endsection
@extends('layouts.app')
@section('title', 'Badge')

@section('content')
<div id="page-badges" class="page">
  <div class="pt">

    {{-- HEADER --}}
    <div style="background:var(--s1);border-bottom:1px solid var(--bd);padding:28px 0">
      <div class="wrap">
        <h1 style="font-family:var(--f-serif);font-size:28px;margin-bottom:6px">
            Badge
        </h1>

        <div style="display:flex;align-items:center;gap:14px;flex-wrap:wrap">
          <div style="flex:1;max-width:200px">
            <div class="track" style="height:4px">
              <div class="fill fill-amber" style="width:{{ $percent }}%"></div>
            </div>
          </div>

          <span style="font-size:13px;color:var(--t2)">
              {{ $owned }} dari {{ $total }} diraih
          </span>
        </div>
      </div>
    </div>

    <div class="wrap" style="padding-top:28px;padding-bottom:56px">

      {{-- ================= BADGE DIDAPAT ================= --}}
      <div style="font-size:11px;font-weight:500;color:var(--green);margin-bottom:14px">
        Diraih
      </div>

      <div class="ga" style="margin-bottom:36px">

        @forelse($earned as $badge)
        <div class="bdg-item"
             onclick="showBadge('{{ $badge->icon }}','{{ $badge->name }}','{{ $badge->description }}')">

          <span class="bdg-ico">🏆</span>

          <div class="bdg-name">{{ $badge->name }}</div>
          <div class="bdg-desc">{{ $badge->description }}</div>
        </div>
        @empty
        <p style="color:var(--t2)">Belum ada badge</p>
        @endforelse

      </div>

      {{-- ================= BADGE BELUM ================= --}}
      <div style="font-size:11px;font-weight:500;color:var(--t3);margin-bottom:14px">
        Belum diraih
      </div>

      <div class="ga">

        @foreach($locked as $badge)
        <div class="bdg-item off">

          <span class="bdg-ico">🔒</span>

          <div class="bdg-name">{{ $badge->name }}</div>
          <div class="bdg-desc">{{ $badge->description }}</div>
        </div>
        @endforeach

      </div>

    </div>
  </div>
</div>
@endsection
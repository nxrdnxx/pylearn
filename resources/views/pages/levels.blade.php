@extends('layouts.app')

@section('title', 'Level')

@section('content')
<div id="page-levels" class="page">
  <div class="pt">

    {{-- ================= HEADER ================= --}}
    @php
        $totalLevel = count($levels);
        $completed = collect($levels)->where('status', 'completed')->count();
        $percent = $totalLevel > 0 ? ($completed / $totalLevel) * 100 : 0;
    @endphp

    <div style="background:var(--s1);border-bottom:1px solid var(--bd);padding:28px 0">
      <div class="wrap">
        <h1 style="font-family:var(--f-serif);font-size:28px;margin-bottom:6px">
            Kurikulum
        </h1>

        <p style="font-size:14px;color:var(--t2);margin-bottom:16px">
            Dari dasar hingga lanjutan, satu level demi satu level.
        </p>

        <div style="display:flex;align-items:center;gap:16px">
          <div style="flex:1;max-width:280px">
            <div class="track" style="height:5px">
              <div class="fill fill-green" style="width:{{ $percent }}%"></div>
            </div>
          </div>

          <span style="font-size:13px;color:var(--t2)">
              {{ $completed }} dari {{ $totalLevel }} level selesai
          </span>
        </div>
      </div>
    </div>

    {{-- ================= LIST LEVEL ================= --}}
    <div class="wrap" style="padding:28px 0 56px">
      <div style="display:flex;flex-direction:column;gap:8px">

        @foreach($levels as $level)

        @php
            $isCompleted = $level['status'] == 'completed';
            $isUnlocked  = $level['status'] == 'unlocked';
            $isLocked    = $level['status'] == 'locked';

            $percent = $level['total'] > 0 
                ? ($level['answered'] / $level['total']) * 100 
                : 0;
        @endphp

        <div 
            class="lv-card 
                {{ $isCompleted ? 'done' : '' }} 
                {{ $isUnlocked ? 'open' : '' }} 
                {{ $isLocked ? 'locked' : '' }}"

            onclick="
            @if($isLocked)
                showLock()
            @else
                window.location.href='{{ route('quiz.show', $level['id']) }}'
            @endif
            "
        >

        <div style="display:flex;align-items:center;gap:16px">

            {{-- NOMOR --}}
            <div class="lv-num 
                {{ $isCompleted ? 'lv-num-green' : '' }}
                {{ $isUnlocked ? 'lv-num-blue' : '' }}
                {{ $isLocked ? 'lv-num-dim' : '' }}">
                {{ str_pad($level['order'], 2, '0', STR_PAD_LEFT) }}
            </div>

            {{-- INFO --}}
            <div style="flex:1">

                <div style="display:flex;align-items:center;gap:8px;margin-bottom:3px">
                    <span style="font-size:15px;font-weight:600">
                        {{ $level['name'] }}
                    </span>

                    @if($isCompleted)
                        <div class="tag tag-green">Selesai</div>
                    @elseif($isUnlocked)
                        <div class="tag tag-blue">
                            {{ $level['answered'] > 0 ? 'Berlangsung' : 'Terbuka' }}
                        </div>
                    @else
                        <div class="tag tag-muted">Terkunci</div>
                    @endif
                </div>

                <p style="font-size:13px;color:var(--t2)">
                    {{ $level['description'] }}
                </p>

                {{-- PROGRESS --}}
                @if($isUnlocked || $isCompleted)
                <div style="margin-top:10px;display:flex;align-items:center;gap:10px">
                    <div class="track" style="flex:1;height:4px">
                        <div class="fill" style="width: {{ $percent }}%"></div>
                    </div>

                    <span style="font-size:12px;color:var(--t2)">
                        {{ $level['answered'] }}/{{ $level['total'] }}
                    </span>
                </div>
                @endif

            </div>

            {{-- ✅ SCORE (FIX DI SINI) --}}
            @if($level['answered'] > 0)
            <div style="text-align:right;flex-shrink:0">
                <div style="
                    font-size:20px;
                    font-weight:700;
                    font-family:var(--f-mono);
                    color:
                    {{ 
                        $level['score'] == 0 
                        ? '#ef4444' 
                        : ($isCompleted ? 'var(--green-light)' : 'var(--t2)') 
                    }}
                ">
                    {{ $level['score'] }}
                </div>
                <div style="font-size:11px;color:var(--t2)">
                    skor
                </div>
            </div>
            @endif

        </div>
        </div>

        @endforeach

      </div>
    </div>

  </div>
</div>
@endsection
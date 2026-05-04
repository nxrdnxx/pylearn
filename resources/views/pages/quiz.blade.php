@extends('layouts.app')

@section('title', 'Quiz')

@section('content')
<div id="page-quiz" class="page">

@php
    $total = count($questions);
    $current = request()->get('q', 1);
    $question = $questions[$current - 1] ?? null;

    $percent = $total > 0 ? ($current / $total) * 100 : 0;
@endphp

{{-- ================= NAV ================= --}}
<nav class="nav">
    <div class="nav-brand">
        <a href="{{ route('level.index') }}">
            <span class="brand-name">Py<em>Learn</em></span>
        </a>
    </div>

    <div style="flex:1;display:flex;align-items:center;gap:14px;padding:0 24px">
        <div class="track" style="flex:1;max-width:360px;height:5px">
            <div class="fill" style="width:{{ $percent }}%"></div>
        </div>
        <span style="font-size:13px;color:var(--t2)">
            {{ $current }} / {{ $total }}
        </span>
    </div>

    <div>
        <a href="{{ route('level.index') }}" class="btn btn-ghost btn-sm">
            Keluar
        </a>
    </div>
</nav>

{{-- ================= CONTENT ================= --}}
<div class="pt">
<div class="wrap-sm" style="padding-top:40px;padding-bottom:56px">

@if($question)

    {{-- TAG --}}
    <div style="display:flex;gap:8px;margin-bottom:28px">
        <div class="tag tag-blue">Soal {{ $current }}</div>
        <div class="tag tag-muted">{{ $level->name }}</div>
    </div>

    {{-- PERTANYAAN --}}
    <div class="card-elevated" style="margin-bottom:18px">
        <p style="font-size:17px;font-weight:500;margin-bottom:20px">
            {{ $question->question_text }}
        </p>

        @if($question->code_snippet)
        <div class="code-block">
            <pre>{{ $question->code_snippet }}</pre>
        </div>
        @endif
    </div>

    {{-- ================= FEEDBACK ================= --}}
    @if(session('is_correct') !== null)

        <div class="feedback {{ session('is_correct') ? 'fb-ok' : 'fb-wrong' }}" style="margin-bottom:20px">

            <div style="font-weight:600; margin-bottom:6px">
                {{ session('is_correct') ? 'Benar ✅' : 'Salah ❌' }}
            </div>

            @if(!session('is_correct'))
                <div style="font-size:13px;margin-bottom:6px">
                    Jawaban benar: <b>{{ session('correct_answer') }}</b>
                </div>
            @endif

            <div style="font-size:13px;color:var(--t2)">
                {{ session('explanation') }}
            </div>

        </div>

    @endif

    {{-- ================= FORM / NEXT ================= --}}
    @if(session('is_correct') === null)

        {{-- FORM JAWAB --}}
        <form method="POST" action="{{ route('quiz.answer') }}">
            @csrf

            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <input type="hidden" name="level_id" value="{{ $level->id }}">
            <input type="hidden" name="current" value="{{ $current }}">

            <input 
                type="text" 
                name="answer"
                placeholder="Jawaban kamu..."
                class="input"
                required
                style="width:100%;margin-bottom:20px"
            >

            <div style="display:flex;justify-content:space-between">
                <a 
                    href="{{ $current > 1 ? route('quiz.show', ['level'=>$level->id, 'q'=>$current-1]) : '#' }}"
                    class="btn btn-ghost"
                >
                    Sebelumnya
                </a>

                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </form>

    @else

        {{-- TOMBOL LANJUT --}}
        <div style="display:flex;justify-content:flex-end">
            <a href="{{ route('quiz.show', ['level'=>$level->id, 'q'=>$current+1]) }}" class="btn btn-primary">
                {{ $current == $total ? 'Selesai' : 'Lanjut' }}
            </a>
        </div>

    @endif

@else

    {{-- ================= SELESAI ================= --}}
    <div style="text-align:center">
        <h2>Quiz selesai 🎉</h2>
        <a href="{{ route('level.index') }}" class="btn btn-primary">
            Kembali ke Level
        </a>
    </div>

@endif

</div>
</div>
</div>
@endsection
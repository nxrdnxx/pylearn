@extends('layouts.app')

@section('title','Landing')

@section('content')
<section class="hero-section">
    <div class="container">

        <h1>Kuasai Python Level demi Level</h1>

        <p>
            Platform belajar Python berbasis gamifikasi
        </p>

        <div style="display:flex;gap:12px">
            <a href="" class="btn btn-primary">
                🚀 Mulai Belajar
            </a>

            <a href="" class="btn btn-secondary">
                Lihat Kurikulum
            </a>
        </div>

    </div>
</section>

<section class="features">
    <div class="container grid-3">

        <div class="card">
            <h3>🎯 Level System</h3>
            <p>Belajar bertahap</p>
        </div>

        <div class="card">
            <h3>⚡ Quiz Interaktif</h3>
            <p>Latihan real</p>
        </div>

        <div class="card">
            <h3>🏆 Leaderboard</h3>
            <p>Bersaing global</p>
        </div>

    </div>
</section>
@endsection
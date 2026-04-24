@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<div class="container">

    <h1>Halo, User 👋</h1>

    <div class="grid-4">

        @include('components.stat-card',[
            'bg'=>'rgba(59,130,246,0.15)',
            'icon'=>'⚡',
            'value'=>'2450',
            'label'=>'XP'
        ])

        @include('components.stat-card',[
            'bg'=>'rgba(16,185,129,0.15)',
            'icon'=>'📊',
            'value'=>'5',
            'label'=>'Level'
        ])

        @include('components.stat-card',[
            'bg'=>'rgba(239,68,68,0.15)',
            'icon'=>'🔥',
            'value'=>'7',
            'label'=>'Streak'
        ])

        @include('components.stat-card',[
            'bg'=>'rgba(245,158,11,0.15)',
            'icon'=>'🏆',
            'value'=>'8',
            'label'=>'Badge'
        ])

    </div>

</div>
@endsection
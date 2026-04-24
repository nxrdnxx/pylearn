@extends('layouts.app')

@section('title','Levels')

@section('content')
<div class="container">

    <h1>Level Pembelajaran</h1>

    <div class="progress-track">
        <div class="progress-fill" style="width:40%"></div>
    </div>

    <div class="flex-col gap-4">

        @include('components.level-card',[
            'level'=>1,
            'title'=>'Python Dasar',
            'desc'=>'Variabel & tipe data',
            'status'=>'completed',
            'numberClass'=>'level-number-green',
            'badge'=>'Selesai',
            'link'=>'/result'
        ])

        @include('components.level-card',[
            'level'=>2,
            'title'=>'String',
            'desc'=>'Manipulasi string',
            'status'=>'completed',
            'numberClass'=>'level-number-green',
            'badge'=>'Selesai',
            'link'=>'/result'
        ])

        @include('components.level-card',[
            'level'=>3,
            'title'=>'Condition',
            'desc'=>'If Else',
            'status'=>'unlocked',
            'numberClass'=>'level-number-blue',
            'badge'=>'Lanjutkan',
            'link'=>'/quiz'
        ])

    </div>

</div>
@endsection
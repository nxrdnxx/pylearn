@extends('layouts.app')

@section('title','Quiz')

@section('content')
<div class="container">

    <h2>Apa hasil dari:</h2>

    <div class="code-block">
        print(2 + 3)
    </div>

    <div class="flex-col gap-3">

        <div class="quiz-option">5</div>
        <div class="quiz-option">23</div>
        <div class="quiz-option">Error</div>

    </div>

    <button class="btn btn-primary">
        Submit
    </button>

</div>
@endsection
@extends('layouts.app')

@section('title','Register')

@section('content')
<div class="auth-container">
    <div class="card-elevated">

        <h1>Register</h1>

        <form method="POST" action="#">
            @csrf

            <input class="input" name="name" placeholder="Nama">
            <input class="input" name="email" placeholder="Email">
            <input class="input" type="password" name="password" placeholder="Password">

            <button class="btn btn-primary btn-full">
                Daftar
            </button>
        </form>

    </div>
</div>
@endsection
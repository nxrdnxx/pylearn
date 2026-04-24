@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="auth-container">
    <div class="card-elevated">
        <h1>Login</h1>

        <form method="POST" action="#">
            @csrf

            <input class="input" type="email" name="email" placeholder="Email">
            <input class="input" type="password" name="password" placeholder="Password">

            <button class="btn btn-primary btn-full">
                Masuk
            </button>
        </form>
    </div>
</div>
@endsection
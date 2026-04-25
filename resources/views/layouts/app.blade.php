<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PyLearn — Belajar Python</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="{{ asset('assets/pylearn/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
    {{-- navbar --}}
    @include('layouts.navbar')

    {{-- main content --}}
    <main>
        @yield('content')
    </main>
    <script src="{{ asset('assets/pylearn/js/script.js') }}"></script>
    @stack('scripts')
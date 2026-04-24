<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PyQuest')</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/pylearn/css/style.css') }}">

    @stack('styles')
</head>

<body>
    {{-- Toast --}}
    @include('components.toast')

    {{-- Modal --}}
    @include('components.modal-badge')
    @include('components.modal-locked')

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Content --}}
    <main class="main-layout">
        @yield('content')
    </main>

    {{-- JS --}}
    <script src="{{ asset('assets/pylearn/js/script.js') }}"></script>

    @stack('scripts')
</body>
</html>
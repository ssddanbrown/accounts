<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ implode(' | ', array_filter([$attributes->get('title'), config('app.name')])) }}  @stack('titles')</title>

        <!-- CSS only -->
        <link href="/libs/bootstrap.min.css" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">

        <!-- JavaScript Bundle with Popper -->
        <script src="/libs/bootstrap.bundle.min.js"></script>

        @stack('head')
    </head>
    <body class="bg-light">
    @include('layouts.navigation')

    @if(session()->has('success'))
        <div class="container pt-8 -mb-4">
            <x-notification-success>{{ session()->get('success') }}</x-notification-success>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="container pt-8 -mb-4">
            <x-notification-success>{{ session()->get('error') }}</x-notification-success>
        </div>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    </body>
</html>

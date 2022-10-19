<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csfr-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        @livewireStyles()

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <body class="antialiased">

        <nav class="bg-slate-700 text-white flex">
            <a href="/counter" class="py-4 px-6 hover:bg-slate-800 {{ (request()->routeIs('counter')) ? 'bg-slate-800' : '' }}">Counter</a>
            <a href="/calculator" class="py-4 px-6 hover:bg-slate-800 {{ (request()->routeIs('calculator')) ? 'bg-slate-800' : '' }}">Calculator</a>
            <a href="/todo-list" class="py-4 px-6 hover:bg-slate-800 {{ (request()->routeIs('todo-list')) ? 'bg-slate-800' : '' }}">TodoList</a>
        </nav>

        {{ $slot }}

        @livewireScripts()
    </body>
</html>

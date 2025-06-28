<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="bg-[url('/public/backgrounds/watermark_unj.png')] bg-cover min-h-screen flex justify-center items-center">
        {{ $slot }}
        @livewireScriptss
    </body>
</html>

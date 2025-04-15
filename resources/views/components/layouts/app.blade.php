<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-[url('/public/backgrounds/homepage.png')] bg-cover">
    <div class="navbar bg-[#006569] shadow-sm">
        <div class="navbar-start">
            <img src="logos/unj.png" alt="Logo UNJ" class="w-14">
            <h1 class="ml-4 font-semibold text-xl cursor-default">UNIVERSITAS NEGERI JAKARTA</h1>
        </div>
        <div class="navbar-end">
            <button class="btn {{request()->routeIs('homepage') ? 'btn-active bg-[#006569] brightness-150 border-none' : 'btn-ghost'}}">
                Home
            </button>
            <button class="btn {{request()->routeIs('') ? 'btn-active bg-[#006569] brightness-150 border-none' : 'btn-ghost'}}">
                Manage User
            </button>
            <button class="btn {{request()->routeIs('') ? 'btn-active bg-[#006569] brightness-150 border-none' : 'btn-ghost'}}">
                Fasilitas
            </button>
            <button class="btn {{request()->routeIs('') ? 'btn-active bg-[#006569] brightness-150 border-none' : 'btn-ghost'}}">
                Layanan
            </button>
            <button class="btn {{request()->routeIs('') ? 'btn-active bg-[#006569] brightness-150 border-none' : 'btn-ghost'}}">
                Feedback
            </button>
            <button class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="badge badge-xs badge-primary indicator-item"></span>
                </div>
            </button>
            <button class="btn btn-ghost btn-circle">
                <img src="/logos/user.svg" alt="User" class="w-6 invert">
            </button>
        </div>
    </div>
    {{ $slot }}
</body>

</html>

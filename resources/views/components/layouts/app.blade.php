<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-[#e7decc] bg-cover">
    <div class="drawer drawer-end">
        <input id="profile-drawer" type="checkbox" class="drawer-toggle">
        <div class="drawer-content">
            <div class="navbar bg-[#006569] shadow-sm w-full sticky top-0 z-50 px-40">
                <div class="navbar-start">
                    <img src="logos/unj.png" alt="Logo UNJ" class="w-14">
                    <h1 class="ml-4 font-semibold text-xl">UNIVERSITAS NEGERI JAKARTA</h1>
                </div>
                <div class="navbar-end">
                    <div class="">
                        <button class="btn btn-ghost">
                            Home
                        </button>
                        <button class="btn btn-ghost">
                            Manage User
                        </button>
                        <button class="btn btn-ghost">
                            Fasilitas
                        </button>
                        <button class="btn btn-ghost">
                            Layanan
                        </button>
                        <button class="btn btn-ghost">
                            Feedback
                        </button>
                    </div>
                    <div class="dropdown">
                        <button tabindex="0" class="btn btn-ghost btn-circle static">
                            <div class="indicator">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                <span class="badge badge-xs badge-primary indicator-item"></span>
                            </div>
                        </button>
                        <div tabindex="0" class="menu dropdown-content w-96 h-50 bg-white absolute right-1 shadow rounded-box">

                        </div>
                    </div>
                    <label for="profile-drawer" class="btn btn-ghost btn-circle">
                        <img src="{{ asset('logos/user.svg') }}" alt="User" class="w-6 invert">
                    </label>
                </div>
            </div>
            {{ $slot }}
        </div>
        <div class="drawer-side z-60">
            <label for="profile-drawer" aria-label="close-sidebar" class="drawer-overlay"></label>
            <ul class="menu bg-[#006569] text-white min-h-full w-80 p-4 pt-20">
                <div class="btn btn-ghost btn-circle btn-xl mb-3">
                    <img class="invert" src="{{ asset('logos/user.svg') }}" alt="">
                </div>
                <li class="menu-title"><a>username</a></li>
                <li><a>Profile</a></li>
                <li><a>Change Password</a></li>
                <li><a>Logout</a></li>
            </ul>
        </div>
    </div>
</body>

</html>

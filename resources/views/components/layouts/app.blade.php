<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/logos/unj.png" type="image/x-icon">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen overflow-x-hidden text-balance bg-fixed bg-white bg-cover">
    <div class="drawer min-h-screen">
        {{-- TOGGLE DRAWER (drawer buat responsive) --}}
        <input id="profile-drawer" type="checkbox" class="drawer-toggle">
        <div class="drawer-content">
            {{-- NAVBAR --}}
            <div class="navbar w-full bg-base-200 h-10 sticky transition-all top-0 z-50 px-5 lg:px-50" id="navbar">
                <div class="navbar-start">
                        <label for="profile-drawer" class="btn btn-ghost btn-circle lg:hidden">
                            <img src="{{ asset('logos/peminjaman.png') }}" alt="sidebar" class="w-5 mr-5 lg:hidden">
                        </label>
                        <img src="{{ asset('logos/unj2.png') }}" alt="Logo UNJ" class="w-3 sm:w-6 lg:w-10">
                        <a href="/" class="font-semibold ml-3 not-lg:text-xs">
                            Sistem Informasi Gedung dan Ruang
                        </a>
                </div>
                <div class="navbar-end">
                    <div class="not-lg:hidden">
                        <button id="jadwall" class="btn btn-ghost hover:bg-[#fddc00] hover:text-unj border-none" onClick="document.getElementById('jadwal').scrollIntoView();">
                            Jadwal Ruangan
                        </button>
                        <button id="kampuss" class="btn btn-ghost hover:bg-[#fddc00] hover:text-unj border-none" onClick="document.getElementById('kampus').scrollIntoView();">
                            Kampus
                        </button>
                        <button id="gedungg" class="btn btn-ghost hover:bg-[#fddc00] hover:text-unj border-none" onClick="document.getElementById('gedung').scrollIntoView();">
                            Gedung
                        </button>
                        <button id="ruangg" class="btn btn-ghost hover:bg-[#fddc00] hover:text-unj border-none" onClick="document.getElementById('ruang').scrollIntoView();">
                            Ruang
                        </button>
                        <button id="statistikk" class="btn btn-ghost hover:bg-[#fddc00] hover:text-unj border-none" onClick="document.getElementById('statistik').scrollIntoView();">
                            Statistik
                        </button>
                    </div>
                    {{-- notification and profile --}}
                    {{-- <div class="dropdown dropdown-end">
                        <button tabindex="0" class="btn btn-ghost btn-circle static">
                            <div class="indicator">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                <span class="badge badge-xs badge-primary indicator-item"></span>
                            </div>
                        </button>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content w-40 lg:w-96 h-full bg-white absolute shadow-sm rounded-box outline outline-gray-200">
                            <div class="flex justify-between items-center px-2">
                                <p class="text-black font-medium">Notifikasi</p>
                            </div>
                        </ul>
                    </div>
                    <div class="dropdown dropdown-end">
                        <button tabindex="1" class="btn btn-ghost btn-circle static">
                            <img src="/logos/user.svg" alt="User" class="w-6 invert">
                        </button>
                        <ul tabindex="1"
                            class="menu menu-sm dropdown-content w-40 bg-white absolute shadow-sm rounded-box outline outline-gray-200 text-black">
                            <li class="hover:bg-gray-200 rounded-sm"><a>ubah password</a></li>
                            <hr class="my-1 -mx-2 border-gray-200">
                            <li class="hover:bg-gray-200 rounded-sm"><a>logout</a></li>
                        </ul>
                    </div> --}}
                    {{-- <label for="profile-drawer" class="btn btn-ghost btn-circle sm:hidden md:hidden lg:hidden">
                    </label> --}}
                </div>
            </div>
            {{ $slot }}

        </div>
        {{-- Drawer for mobile view --}}
        <div class="drawer-side z-60">
            <label for="profile-drawer" aria-label="close-sidebar" class="drawer-overlay"></label>
            <ul class="menu bg-unj text-white min-h-full min-w-60 p-4 pt-20">
                <div class="btn btn-ghost btn-circle btn-xl mb-3">
                    <img class="invert" src="{{ asset('logos/user.svg') }}" alt="">
                </div>
                <li><button onClick="document.getElementById('kampus').scrollIntoView();">Kampus</button></li>
                <li><button onClick="document.getElementById('kampus').scrollIntoView();">Gedung</button></li>
                <li><button onClick="document.getElementById('kampus').scrollIntoView();">Ruang</button></li>
                <li><button onClick="document.getElementById('kampus').scrollIntoView();">Statistik</button></li>
                <li><button onClick="document.getElementById('kampus').scrollIntoView();">Jadwal Ruangan</button></li>
            </ul>
        </div>
    </div>
    <footer class="footer sm:footer-horizontal bg-unj text-white mt-5 p-10 lg:px-70">
        <aside>
            <img src="{{ asset('logos/UNJ22.png') }}" alt="logo unj" class="w-20 lg:w-50">
        </aside>
        <nav>
            <h6 class="footer-title">Tautan Cepat</h6>
            <a class="link link-hover">Beranda</a>
            <a class="link link-hover">Panduan</a>
            <a class="link link-hover">Fasilitas</a>
            <a class="link link-hover">Pemesanan</a>
            <a class="link link-hover">Kalender</a>
            <a class="link link-hover">Kontak</a>
        </nav>
        <nav>
            <h6 class="footer-title">Gedung & Ruangan</h6>
            <a class="link link-hover">Gedung Rektorat</a>
            <a class="link link-hover">Fakultas Ilmu Pendidikan</a>
            <a class="link link-hover">Fakultas Teknik</a>
            <a class="link link-hover">Fakultas Ekonomi</a>
            <a class="link link-hover">Gedung Serba Guna</a>
            <a class="link link-hover">Laboratorium</a>
        </nav>
        <nav>
            <h6 class="footer-title">Legal</h6>
            <a class="link link-hover">Terms of use</a>
            <a class="link link-hover">Privacy policy</a>
            <a class="link link-hover">Cookie policy</a>
        </nav>
    </footer>
    <div class="text-center bg-unj">Copyright 2025 Pustikom</div>
</body>

</html>

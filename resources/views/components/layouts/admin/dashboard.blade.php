<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: true, initialLoad: true }" x-init="setTimeout(() => initialLoad = false, 50)" data-theme="">

<head>
    <title>Sistem Informasi Manajemen Gedung dan Ruang</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="icon" type="image" href="/logos/unj.png">
    <script src="https://kit.fontawesome.com/803b706a8d.js" crossorigin="anonymous"></script>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100 min-h-screen flex">

    {{-- Sidebar --}}
    <livewire:sidebar />

    {{-- Navbar dan Main Content --}}
    <div class="flex flex-col flex-grow min-h-screen overflow-auto" :style="{
        marginLeft: sidebarOpen ? '16rem' : '4rem',
        transition: initialLoad ? 'none' : 'margin-left 0.3s ease-in-out'
    }">
        {{-- Navbar --}}
        <livewire:navbar />

        {{-- Main content --}}
        <main class="flex-grow p-6 overflow-auto">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: true, initialLoad: true }" x-init="setTimeout(() => initialLoad = false, 50)">
<head>
    <title>Sistem Informasi Manajemen Gedung dan Ruang</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100 min-h-screen flex">

    {{-- Sidebar --}}
    <livewire:sidebar />

    {{-- Navbar dan Main Content --}}
    <div
        class="flex flex-col flex-grow min-h-screen overflow-auto"
        :style="{
            marginLeft: sidebarOpen ? '16rem' : '4rem',
            transition: initialLoad ? 'none' : 'margin-left 0.3s ease-in-out'
        }"
    >
        {{-- Navbar --}}
        <livewire:navbar />

        {{-- Main content --}}
        <main class="flex-grow p-6 overflow-auto">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
    @stack('scripts')

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <!-- Apexchart JS -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>

</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'SIMGURU' }}</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-gray-100">
    <!-- Navbar -->
    <nav id="navbar" class="fixed top-0 left-0 z-50 w-full h-16 bg-teal-700 border-b border-gray-200 transition-all duration-300">
        <div class="px-3 py-3 lg:px-5">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <!-- Tombol toggle sidebar -->
                    <button id="toggleSidebar" class="p-2 text-white rounded-lg hover:bg-gray-100 hover:text-teal-700 me-3" type="button" aria-label="Toggle sidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 6H6m12 4H6m12 4H6m12 4H6"/>
                        </svg>
                    </button>
                    <!-- Logo dan judul -->
                    <div class="flex items-center">
                        <img src="/logos/unj.png" class="h-10 me-3" alt="Logo" />
                        <span class="text-white text-lg font-extrabold m-0 leading-none">
                            Sistem Managemen Gedung dan Ruang <br>
                            <span class="text-white text-sm font-semibold m-0">
                                Universitas Negeri Jakarta
                            </span>
                        </span>
                    </div>
                </div>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button" class="relative inline-flex items-center p-3 text-sm font-medium text-center text-white bg-teal-700 rounded-lg hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 mr-4">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                            <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                            <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                        </svg>
                        <span class="sr-only">Notifikasi</span>
                        <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">5</div>
                    </button>
                    <div class="flex items-center">
                        <div class="relative">
                            <div id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full cursor-pointer">
                                <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div id="userDropdown" class="z-10 hidden bg-gray-100 divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                                <div class="px-4 py-3 text-sm text-gray-900">
                                    <div>Admin</div>
                                    <div class="font-medium truncate">admin@email.com</div>
                                </div>
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed top-16 left-0 w-64 h-[calc(100vh-64px)] bg-white border-r border-gray-200 shadow-lg -translate-x-64">
        <div class="h-full px-3 pb-4 pt-3 overflow-y-auto">
            <!-- Menu sidebar -->
            <ul class="space-y-2">
                <li>
                    <a href="/" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                        <svg class="w-6 h-6 text-teal-700" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M4.857 3A1.857 1.857 0 0 0 3 4.857v4.286C3 10.169 3.831 11 4.857 11h4.286A1.857 1.857 0 0 0 11 9.143V4.857A1.857 1.857 0 0 0 9.143 3H4.857Zm10 0A1.857 1.857 0 0 0 13 4.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 9.143V4.857A1.857 1.857 0 0 0 19.143 3h-4.286Zm-10 10A1.857 1.857 0 0 0 3 14.857v4.286C3 20.169 3.831 21 4.857 21h4.286A1.857 1.857 0 0 0 11 19.143v-4.286A1.857 1.857 0 0 0 9.143 13H4.857Zm10 0A1.857 1.857 0 0 0 13 14.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 19.143v-4.286A1.857 1.857 0 0 0 19.143 13h-4.286Z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-teal-700 text-sm font-semibold ms-3">Dashboard</span>
                    </a>
                </li>
                <!-- Judul sebelum menu -->
                <div class="flex items-center p-2 mt-4">
                    <h3 class="text-sm font-semibold text-gray-700">Penambahan</h3>
                </div>
                <li>
                    <a href="/tambah-kampus" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                        <svg class="w-6 h-6 text-teal-700" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M10.915 2.345a2 2 0 0 1 2.17 0l7 4.52A2 2 0 0 1 21 8.544V9.5a1.5 1.5 0 0 1-1.5 1.5H19v6h1a1 1 0 1 1 0 2H4a1 1 0 1 1 0-2h1v-6h-.5A1.5 1.5 0 0 1 3 9.5v-.955a2 2 0 0 1 .915-1.68l7-4.52ZM17 17v-6h-2v6h2Zm-6-6h2v6h-2v-6Zm-2 6v-6H7v6h2Z" clip-rule="evenodd"/>
                            <path d="M2 21a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1Z"/>
                        </svg>
                        <span class="text-teal-700 text-sm font-semibold ms-3">Tambah Kampus</span>
                    </a>
                </li>
                <li>
                    <a href="/tambah-gedung" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                        <svg class="w-6 h-6 text-teal-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2v14a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2V5a1 1 0 0 1-1-1Zm5 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1Zm-5 4a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Zm-3 4a2 2 0 0 0-2 2v3h2v-3h2v3h2v-3a2 2 0 0 0-2-2h-2Z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-teal-700 text-sm font-semibold ms-3">Tambah Gedung</span>
                    </a>
                </li>
                <li>
                    <a href="/tambah-ruang" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                        <svg class="w-6 h-6 text-teal-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14 19V5h4a1 1 0 0 1 1 1v11h1a1 1 0 0 1 0 2h-6Z"/>
                            <path fill-rule="evenodd" d="M12 4.571a1 1 0 0 0-1.275-.961l-5 1.428A1 1 0 0 0 5 6v11H4a1 1 0 0 0 0 2h1.86l4.865 1.39A1 1 0 0 0 12 19.43V4.57ZM10 11a1 1 0 0 1 1 1v.5a1 1 0 0 1-2 0V12a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-teal-700 text-sm font-semibold ms-3">Tambah Ruang</span>
                    </a>
                </li>
                <div class="flex items-center p-2 mt-4">
                    <h3 class="text-sm font-semibold text-gray-700">Detail</h3>
                </div>
                <li>
                    <a href="" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                        <span class="text-teal-700 text-sm font-semibold ms-3">Lihat Kampus/Gedung/Ruang</span>
                    </a>
                </li>
                <div class="flex items-center p-2 mt-4">
                    <h3 class="text-sm font-semibold text-gray-700">Perubahan Data</h3>
                </div>
                <li>
                    <a href="" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                        <span class="text-teal-700 text-sm font-semibold ms-3">Lihat Perubahan Data</span>
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center p-2 rounded-lg hover:bg-gray-100">
                        <span class="text-teal-700 text-sm font-semibold ms-3">Log Perubahan Data</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div id="main-content" class="transition-all duration-300 pt-7 ml-0">
        <div class="p-8">
            {{ $slot }}
        </div>
    </div>

    <script>
        // Toggle sidebar khusus desktop
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const toggleBtn = document.getElementById('toggleSidebar');

        let sidebarOpen = true; // status awal sidebar terbuka

        // Fungsi untuk menambahkan kelas animasi saat toggle
        function addSidebarTransition() {
            sidebar.classList.add('transition-transform', 'duration-300');
            mainContent.classList.add('transition-all', 'duration-300');
        }

        // Fungsi untuk menghapus kelas animasi (dipakai saat load/resize)
        function removeSidebarTransition() {
            sidebar.classList.remove('transition-transform', 'duration-300');
            mainContent.classList.remove('transition-all', 'duration-300');
        }

        // Toggle sidebar saat tombol diklik
        toggleBtn.addEventListener('click', () => {
            addSidebarTransition(); // aktifkan animasi saat toggle
            sidebarOpen = !sidebarOpen;
            if (sidebarOpen) {
                sidebar.classList.remove('-translate-x-64');
                mainContent.classList.add('ml-64');
            } else {
                sidebar.classList.add('-translate-x-64');
                mainContent.classList.remove('ml-64');
            }
        });

        // Fungsi handle resize untuk set posisi sidebar tanpa animasi
        function handleResize() {
            removeSidebarTransition(); // nonaktifkan animasi saat resize/load
            if (window.innerWidth < 1024) {
                sidebar.classList.add('-translate-x-64');
                mainContent.classList.remove('ml-64');
                sidebarOpen = false;
            } else {
                sidebar.classList.remove('-translate-x-64');
                mainContent.classList.add('ml-64');
                sidebarOpen = true;
            }
        }

        // Pasang event listener resize dan panggil sekali saat load
        window.addEventListener('resize', handleResize);
        handleResize();
    </script>

    {{-- <!-- Main Content Area -->
    <main class="p-4 sm:ml-64 mt-14">
        {{ $slot }}
    </main> --}}

    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <!-- Apexchart JS -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>
</body>

</html>

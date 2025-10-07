<nav :class="sidebarOpen ? 'w-64' : 'w-16'" class="bg-white dark:bg-surface-a10 shadow-md flex flex-col fixed left-0 top-0 h-screen z-30 overflow-hidden transition-width duration-300 ease-in-out" style="min-width:64px;">
    <div class="flex items-center p-4 space-x-2">
        <img src="/logos/unj.png" alt="logo" class="w-10 h-auto" />
        <span class="text-teal-800 dark:text-primary-a0 font-bold text-3xl truncate ml-3" :class="sidebarOpen ? 'inline' : 'hidden'">SIMGURU</span>
    </div>

    @php $currentRouteName = Route::currentRouteName(); @endphp
    <ul class="mt-4 flex flex-col space-y-1 px-2">
        <li>
            <a wire:navigate href="{{ route('dashboard') }}" class="transition-all flex items-center p-2 text-gray-700 {{ $currentRouteName == 'dashboard' ? 'bg-active-side text-teal-800 font-medium border-r-[3px]' : 'hover:text-gray-950' }} text-center overflow-hidden">
                <span class="text-xl ml-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE -->
                        <path fill="currentColor" d="M16 20q-.425 0-.712-.288T15 19v-5q0-.425.288-.712T16 13h5q.425 0 .713.288T22 14v5q0 .425-.288.713T21 20zm-4-9q-.425 0-.712-.288T11 10V5q0-.425.288-.712T12 4h9q.425 0 .713.288T22 5v5q0 .425-.288.713T21 11zm-9 9q-.425 0-.712-.288T2 19v-5q0-.425.288-.712T3 13h9q.425 0 .713.288T13 14v5q0 .425-.288.713T12 20zm0-9q-.425 0-.712-.288T2 10V5q0-.425.288-.712T3 4h5q.425 0 .713.288T9 5v5q0 .425-.288.713T8 11zm10-2h7V6h-7zm-9 9h7v-3H4zm13 0h3v-3h-3zM4 9h3V6H4zm3 0" />
                    </svg>
                </span>
                <span :class="sidebarOpen ? 'inline' : 'hidden'" class="whitespace-nowrap">Dashboard</span>
            </a>
        </li>
        <li class="mt-6 mb-2 px-2 text-xs font-semibold text-gray-500 uppercase tracking-wide whitespace-nowrap" :class="sidebarOpen ? 'block' : 'hidden'">Menu Universitas</li>
        {{-- <li>
            <a wire:navigate href="{{ route('tambah-kampus') }}" class="transition-all flex items-center p-2 text-gray-700 {{ $currentRouteName == url('admin/tambah-kampus') ? 'bg-active-side text-teal-800 font-medium border-r-[3px]' : 'hover:text-gray-950' }}">
                <span class="text-xl ml-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                    </svg>
                </span>
                <span :class="sidebarOpen ? 'inline' : 'hidden'" class="whitespace-nowrap">Tambah Kampus</span>
            </a>
        </li> --}}
        <li>
            <a wire:navigate href="{{ route('daftar-kampus') }}" class="transition-all flex items-center p-2 text-gray-700 overflow-hidden {{ $currentRouteName == 'daftar-kampus' || $currentRouteName == 'edit-kampus' ? 'bg-active-side text-teal-800 font-medium border-r-[3px]' : 'hover:text-gray-950' }}">
                <span class="text-xl ml-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE -->
                        <path fill="currentColor" d="M5 16v-5q0-.425.288-.712T6 10t.713.288T7 11v5q0 .425-.288.713T6 17t-.712-.288T5 16m6 0v-5q0-.425.288-.712T12 10t.713.288T13 11v5q0 .425-.288.713T12 17t-.712-.288T11 16m-8 5q-.425 0-.712-.288T2 20t.288-.712T3 19h18q.425 0 .713.288T22 20t-.288.713T21 21zm14-5v-5q0-.425.288-.712T18 10t.713.288T19 11v5q0 .425-.288.713T18 17t-.712-.288T17 16m4-8H2.9q-.375 0-.638-.262T2 7.1v-.55q0-.275.138-.475T2.5 5.75l8.6-4.3q.425-.2.9-.2t.9.2l8.55 4.275q.275.125.413.375t.137.525V7q0 .425-.287.713T21 8" />
                    </svg>
                </span>
                <span :class="sidebarOpen ? 'inline' : 'hidden'" class="whitespace-nowrap">Daftar Kampus</span>
            </a>
        </li>
        {{-- <li>
            <a wire:navigate href="{{ route('tambah-gedung') }}" class="transition-all flex items-center p-2 text-gray-700 {{ $currentRouteName == url('admin/tambah-gedung') ? 'bg-active-side text-teal-800 font-medium border-r-[3px]' : 'hover:text-gray-950' }}">
                <span class="text-xl ml-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                    </svg>
                </span>
                <span :class="sidebarOpen ? 'inline' : 'hidden'" class="whitespace-nowrap">Tambah Gedung</span>
            </a>
        </li> --}}
        <li>
            <a wire:navigate href="{{ route('daftar-gedung') }}" class="transition-all flex items-center p-2 text-gray-700 {{ $currentRouteName == 'daftar-gedung' || $currentRouteName == 'edit-gedung' ? 'bg-active-side text-teal-800 font-medium border-r-[3px]' : 'hover:text-gray-950' }}">
                <span class="text-xl ml-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE -->
                        <path fill="currentColor" d="M2 19V5q0-.825.588-1.412T4 3h6q.825 0 1.413.588T12 5v2h8q.825 0 1.413.588T22 9v10q0 .825-.587 1.413T20 21H4q-.825 0-1.412-.587T2 19m2 0h2v-2H4zm0-4h2v-2H4zm0-4h2V9H4zm0-4h2V5H4zm4 12h2v-2H8zm0-4h2v-2H8zm0-4h2V9H8zm0-4h2V5H8zm4 12h8V9h-8v2h2v2h-2v2h2v2h-2zm4-6v-2h2v2zm0 4v-2h2v2z" />
                    </svg>
                </span>
                <span :class="sidebarOpen ? 'inline' : 'hidden'" class="whitespace-nowrap">Daftar Gedung</span>
            </a>
        </li>
        {{-- <li>
            <a wire:navigate href="{{ route('tambah-ruang') }}" class="transition-all flex items-center p-2 text-gray-700 {{ $currentRouteName == url('admin/tambah-ruang') ? 'bg-active-side text-teal-800 font-medium border-r-[3px]' : 'hover:text-gray-950' }}">
                <span class="text-xl ml-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                    </svg>
                </span>
                <span :class="sidebarOpen ? 'inline' : 'hidden'" class="whitespace-nowrap">Tambah Ruang</span>
            </a>
        </li> --}}
        <li>
            <a wire:navigate href="{{ route('daftar-ruang') }}" class="transition-all flex items-center p-2 text-gray-700 {{ $currentRouteName == 'daftar-ruang' || $currentRouteName == 'edit-ruang' ? 'bg-active-side text-teal-800 font-medium border-r-[3px]' : 'hover:text-gray-950' }}">
                <span class="text-xl ml-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE -->
                        <path fill="currentColor" d="M11 13q.425 0 .713-.288T12 12t-.288-.712T11 11t-.712.288T10 12t.288.713T11 13m-4 8v-2l6-1V6.875q0-.375-.225-.675t-.575-.35L7 5V3l5.5.9q1.1.2 1.8 1.025T15 6.85v11.1q0 .725-.475 1.288t-1.2.687zm0-2h10V5H7zm-3 2q-.425 0-.712-.288T3 20t.288-.712T4 19h1V5q0-.825.588-1.412T7 3h10q.825 0 1.413.588T19 5v14h1q.425 0 .713.288T21 20t-.288.713T20 21z" />
                    </svg>
                </span>
                <span :class="sidebarOpen ? 'inline' : 'hidden'" class="whitespace-nowrap">Daftar Ruang</span>
            </a>
        </li>

        <li class="mt-6 mb-2 px-2 text-xs font-semibold text-gray-500 uppercase tracking-wide whitespace-nowrap" :class="sidebarOpen ? 'block' : 'hidden'">Menu Peminjaman Ruang</li>

        <li>
            <a wire:navigate href="{{ route('peminjaman-ruang') }}" class="transition-all flex items-center p-2 text-gray-700 {{ $currentRouteName == 'peminjaman-ruang' || $currentRouteName == 'reservasi-ruang' ? 'bg-active-side text-teal-800 font-medium border-r-[3px]' : 'hover:text-gray-950' }}">
                <span class="text-xl ml-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE -->
                        <path fill="currentColor" d="M7 18q-2.5 0-4.25-1.75T1 12t1.75-4.25T7 6q1.65 0 3.025.825T12.2 9H21q.825 0 1.413.588T23 11v2q0 .825-.587 1.413T21 15v1q0 .825-.587 1.413T19 18h-2q-.825 0-1.412-.587T15 16v-1h-2.8q-.8 1.35-2.175 2.175T7 18m0-2q1.65 0 2.65-1.012T10.85 13H17v3h2v-3h2v-2H10.85q-.2-.975-1.2-1.987T7 8T4.175 9.175T3 12t1.175 2.825T7 16m0-2q.825 0 1.413-.587T9 12t-.587-1.412T7 10t-1.412.588T5 12t.588 1.413T7 14m0-2" />
                    </svg>
                </span>
                <span :class="sidebarOpen ? 'inline' : 'hidden'" class="whitespace-nowrap">Peminjaman Ruang</span>
            </a>
        </li>

        <li class="hidden">
            <a wire:navigate href="{{ route('detail-all') }}" class="transition-all flex items-center p-2 text-gray-700 {{ $currentRouteName == 'detail-all' ? 'bg-active-side text-teal-800 font-medium border-r-[3px]' : 'hover:text-gray-950' }}">
                <span class="text-xl ml-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                    </svg>
                </span>
                <span :class="sidebarOpen ? 'inline' : 'hidden'" class="whitespace-nowrap">Detail Universitas</span>
            </a>
        </li>
        <li class="hidden">
            <a wire:navigate href="{{ route('rekapitulasi') }}" class="transition-all flex items-center p-2 text-gray-700 {{ $currentRouteName == 'rekapitulasi' ? 'bg-active-side text-teal-800 font-medium border-r-[3px]' : 'hover:text-gray-950' }}">
                <span class="text-xl ml-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                    </svg>
                </span>
                <span :class="sidebarOpen ? 'inline' : 'hidden'" class="whitespace-nowrap">Rekapitulasi Gedung</span>
            </a>
        </li>

        <li class="mt-6 mb-2 px-2 text-xs font-semibold text-gray-500 uppercase tracking-wide whitespace-nowrap" :class="sidebarOpen ? 'block' : 'hidden'">Menu Perubahan Data</li>

        @if (Auth::user()->role == 1)
            <li>
                <a wire:navigate href="{{ route('verifikasi-data') }}" class="transition-all flex items-center p-2 text-gray-700 {{ $currentRouteName == 'verifikasi-data' ? 'bg-active-side text-teal-800 font-medium border-r-[3px]' : 'hover:text-gray-950' }}">
                    <span class="text-xl ml-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE -->
                            <path fill="currentColor" d="m10.95 12.7l-1.4-1.4q-.3-.3-.7-.3t-.7.3t-.3.713t.3.712l2.1 2.125q.3.3.7.3t.7-.3l4.25-4.25q.3-.3.3-.712t-.3-.713t-.712-.3t-.713.3zM12 21.9q-.175 0-.325-.025t-.3-.075Q8 20.675 6 17.638T4 11.1V6.375q0-.625.363-1.125t.937-.725l6-2.25q.35-.125.7-.125t.7.125l6 2.25q.575.225.938.725T20 6.375V11.1q0 3.5-2 6.538T12.625 21.8q-.15.05-.3.075T12 21.9m0-2q2.6-.825 4.3-3.3t1.7-5.5V6.375l-6-2.25l-6 2.25V11.1q0 3.025 1.7 5.5t4.3 3.3m0-7.9" />
                        </svg>
                    </span>
                    <span :class="sidebarOpen ? 'inline' : 'hidden'" class="whitespace-nowrap">Verifikasi Data</span>
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('verifikasi-jadwal') }}" class="transition-all flex items-center p-2 text-gray-700 {{ $currentRouteName == 'verifikasi-jadwal' ? 'bg-active-side text-teal-800 font-medium border-r-[3px]' : 'hover:text-gray-950' }}">
                    <span class="text-xl ml-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE -->
                            <path fill="currentColor" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6zm7 6q-.425 0-.712-.288T11 13t.288-.712T12 12t.713.288T13 13t-.288.713T12 14m-4 0q-.425 0-.712-.288T7 13t.288-.712T8 12t.713.288T9 13t-.288.713T8 14m8 0q-.425 0-.712-.288T15 13t.288-.712T16 12t.713.288T17 13t-.288.713T16 14m-4 4q-.425 0-.712-.288T11 17t.288-.712T12 16t.713.288T13 17t-.288.713T12 18m-4 0q-.425 0-.712-.288T7 17t.288-.712T8 16t.713.288T9 17t-.288.713T8 18m8 0q-.425 0-.712-.288T15 17t.288-.712T16 16t.713.288T17 17t-.288.713T16 18" />
                        </svg>
                    </span>
                    <span :class="sidebarOpen ? 'inline' : 'hidden'" class="whitespace-nowrap">Verifikasi Jadwal</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('verifikasi-new') }}" class="transition-all flex items-center p-2 text-gray-700 {{ $currentRouteName == url('admin/verifikasi/new') ? 'bg-active-side text-teal-800 font-medium border-r-[3px]' : 'hover:text-gray-950' }}">
                    <span class="text-xl ml-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>
                    </span>
                    <span :class="sidebarOpen ? 'inline' : 'hidden'">Verifikasi Data New</span>
                </a>
            </li> --}}

            <li class="mt-6 mb-2 px-2 text-xs font-semibold text-gray-500 uppercase tracking-wide whitespace-nowrap" :class="sidebarOpen ? 'block' : 'hidden'">Menu Manajemen User</li>

            <li>
                <a wire:navigate href="{{ route('manajemen-user') }}" class="transition-all flex items-center p-2 text-gray-700 {{ $currentRouteName == 'manajemen-user' ? 'bg-active-side text-teal-800 font-medium border-r-[3px]' : 'hover:text-gray-950' }}">
                    <span class="text-xl ml-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE -->
                            <path fill="currentColor" d="M5.85 17.1q1.275-.975 2.85-1.537T12 15t3.3.563t2.85 1.537q.875-1.025 1.363-2.325T20 12q0-3.325-2.337-5.663T12 4T6.337 6.338T4 12q0 1.475.488 2.775T5.85 17.1M12 13q-1.475 0-2.488-1.012T8.5 9.5t1.013-2.488T12 6t2.488 1.013T15.5 9.5t-1.012 2.488T12 13m0 9q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q1.325 0 2.5-.387t2.15-1.113q-.975-.725-2.15-1.112T12 17t-2.5.388T7.35 18.5q.975.725 2.15 1.113T12 20m0-9q.65 0 1.075-.425T13.5 9.5t-.425-1.075T12 8t-1.075.425T10.5 9.5t.425 1.075T12 11m0 7.5" />
                        </svg>
                    </span>
                    <span :class="sidebarOpen ? 'inline' : 'hidden'" class="whitespace-nowrap">Manajemen User</span>
                </a>
            </li>
        @elseif (Auth::user()->role == 2)
            <li>
                <a wire:navigate href="{{ route('perubahan-data') }}" class="transition-all flex items-center p-2 text-gray-700 {{ $currentRouteName == 'perubahan-data' ? 'bg-active-side text-teal-800 font-medium border-r-[3px]' : 'hover:text-gray-950' }}">
                    <span class="text-xl ml-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                        </svg>
                    </span>
                    <span :class="sidebarOpen ? 'inline' : 'hidden'">Daftar Perubahan Data</span>
                </a>
            </li>
        @endif
    </ul>
</nav>

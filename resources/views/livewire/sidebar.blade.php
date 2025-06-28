<nav :class="sidebarOpen ? 'w-64' : 'w-16'" class="bg-white shadow-md flex flex-col fixed left-0 top-0 h-screen z-30 overflow-hidden transition-width duration-300 ease-in-out" style="min-width:64px;">
    <div class="flex items-center p-4 space-x-2">
        <img src="/logos/unj.png" alt="logo" class="w-10 h-auto" />
        <span class="text-teal-800 font-bold text-3xl truncate ml-3" :class="sidebarOpen ? 'inline' : 'hidden'">SIMGURU</span>
    </div>

    @php $currentUrl = url()->current(); @endphp
    <ul class="mt-4 flex flex-col space-y-1 px-2">
        <li>
            <a href="{{ route('dashboard') }}" class="transition-all hover:font-semibold flex items-center p-2 text-gray-700 rounded hover:bg-teal-700 hover:text-white {{ $currentUrl == url('/') ? 'bg-teal-700 text-white font-semibold' : '' }} text-center">
                <span class="text-xl ml-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                    </svg>
                </span>
                <span :class="sidebarOpen ? 'inline' : 'hidden'">Dashboard</span>
            </a>
        </li>
        <li class="mt-6 mb-2 px-2 text-xs font-semibold text-gray-500 uppercase tracking-wide" :class="sidebarOpen ? 'block' : 'hidden'">Menu Universitas</li>
        <li>
            <a href="{{ route('tambah-kampus') }}" class="transition-all hover:font-semibold flex items-center p-2 text-gray-700 rounded hover:bg-teal-700 hover:text-white {{ $currentUrl == url('tambah-kampus') ? 'bg-teal-700 text-white font-semibold' : '' }}">
                <span class="text-xl ml-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                    </svg>
                </span>
                <span :class="sidebarOpen ? 'inline' : 'hidden'">Tambah Kampus</span>
            </a>
        </li>
        <li>
            <a href="{{ route('tambah-gedung') }}" class="transition-all hover:font-semibold flex items-center p-2 text-gray-700 rounded hover:bg-teal-700 hover:text-white {{ $currentUrl == url('tambah-gedung') ? 'bg-teal-700 text-white font-semibold' : '' }}">
                <span class="text-xl ml-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                    </svg>
                </span>
                <span :class="sidebarOpen ? 'inline' : 'hidden'">Tambah Gedung</span>
            </a>
        </li>
        <li>
            <a href="{{ route('tambah-ruang') }}" class="transition-all hover:font-semibold flex items-center p-2 text-gray-700 rounded hover:bg-teal-700 hover:text-white {{ $currentUrl == url('tambah-ruang') ? 'bg-teal-700 text-white font-semibold' : '' }}">
                <span class="text-xl ml-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                    </svg>
                </span>
                <span :class="sidebarOpen ? 'inline' : 'hidden'">Tambah Ruang</span>
            </a>
        </li>
        <li>
            <a href="{{ route('detail-all') }}" class="transition-all hover:font-semibold flex items-center p-2 text-gray-700 rounded hover:bg-teal-700 hover:text-white {{ $currentUrl == url('detail-all') ? 'bg-teal-700 text-white font-semibold' : '' }}">
                <span class="text-xl ml-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                    </svg>
                </span>
                <span :class="sidebarOpen ? 'inline' : 'hidden'">Detail Universitas</span>
            </a>
        </li>
        <li>
            <a href="{{ route('rekapitulasi') }}" class="transition-all hover:font-semibold flex items-center p-2 text-gray-700 rounded hover:bg-teal-700 hover:text-white {{ $currentUrl == url('rekapitulasi') ? 'bg-teal-700 text-white font-semibold' : '' }}">
                <span class="text-xl ml-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                    </svg>
                </span>
                <span :class="sidebarOpen ? 'inline' : 'hidden'">Rekapitulasi Gedung</span>
            </a>
        </li>

        <li class="mt-6 mb-2 px-2 text-xs font-semibold text-gray-500 uppercase tracking-wide" :class="sidebarOpen ? 'block' : 'hidden'">Menu Perubahan Data</li>

        @if (Auth::user()->role == 1)
            <li>
                <a href="{{ route('verifikasi-data') }}" class="transition-all hover:font-semibold flex items-center p-2 text-gray-700 rounded hover:bg-teal-700 hover:text-white {{ $currentUrl == url('perubahan-data') ? 'bg-teal-700 text-white font-semibold' : '' }}">
                    <span class="text-xl ml-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>
                    </span>
                    <span :class="sidebarOpen ? 'inline' : 'hidden'">Verifikasi Data</span>
                </a>
            </li>
        @else
            <li>
                <a href="" class="transition-all hover:font-semibold flex items-center p-2 text-gray-700 rounded hover:bg-teal-700 hover:text-white {{ $currentUrl == url('perubahan-data') ? 'bg-teal-700 text-white font-semibold' : '' }}">
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

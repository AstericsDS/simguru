<div id="body-ko" class="flex flex-col min-w-full">
    {{-- Hero --}}
    <div
        class="flex flex-col bg-[url(/public/backgrounds/unj_bersih.jpeg)] bg-primary bg-blend-multiply bg-cover bg-fixed min-h-screen bg-center justify-center items-center gap-5">
        <img src="{{ asset('logos/UNJ22.png') }}" alt="logo unj" class="w-50">
        <h1 class=" text-xl lg:text-5xl text-white text-wrap w-3/7 text-center font-semibold">
            Sistem Informasi Gedung dan Ruang
        </h1>
        {{-- login button --}}
        <a href="/login" class="btn btn-xl w-34 bg-[#FDDC00] text-primary border-none shadow-none">
            {{-- <img src="{{ asset('logos/login.svg') }}" alt="" class="w-10 "> --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="#006569" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-key-round-icon lucide-key-round">
                <path
                    d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z" />
                <circle cx="16.5" cy="7.5" r=".5" fill="currentColor" />
            </svg>
            Login
        </a>
    </div>

    {{-- <div class="card card-side bg-primary w-2/3 self-center shadow-sm mt-30 p-5">
        <figure class="w-150">
            <img src="{{ asset('backgrounds/unj_bersih.jpeg') }}" alt="kampus" />
        </figure>
        <div class="card-body">
            <h2 class="card-title">SISTEM INFORMASI GEDUNG DAN RUANG</h2>
            <p>SISTEM INFORMASI GEDUNG DAN RUANG adalah platform yang menyediakan informasi lengkap mengenai gedung dan
                ruang yang ada di Universitas Negeri Jakarta.</p>
        </div>
    </div> --}}

    <div class="hero bg-white text-black min-h-screen">
        <div class="hero-content flex-col lg:flex-row">
            <img src="{{ asset('backgrounds/unj_bersih.jpeg') }}" class="max-w-xs lg:max-w-2xl rounded-lg shadow-2xl" />
            <div class="max-w-xl">
                <h1 class="text-2xl lg:text-5xl font-bold">Sistem Informasi Gedung dan Ruang</h1>
                <p class="py-6 text-justify">
                    Sistem Informasi Gedung dan Ruang adalah platform yang menyediakan informasi lengkap mengenai gedung
                    dan
                    ruang di Universitas Negeri Jakarta.
                </p>
                <div class="grid grid-cols-1 lg:grid-cols-2 text-sm text-center gap-3">
                    <p class="flex gap-4"><svg xmlns="http://www.w3.org/2000/svg" class="stroke-primary" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-building2-icon lucide-building-2 stroke-primary">
                            <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z" />
                            <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2" />
                            <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2" />
                            <path d="M10 6h4" />
                            <path d="M10 10h4" />
                            <path d="M10 14h4" />
                            <path d="M10 18h4" />
                        </svg>Manajemen Gedung dan Ruang</p>
                    <p class="flex gap-4"><svg xmlns="http://www.w3.org/2000/svg" class="stroke-primary" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-building2-icon lucide-building-2 stroke-primary">
                            <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z" />
                            <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2" />
                            <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2" />
                            <path d="M10 6h4" />
                            <path d="M10 10h4" />
                            <path d="M10 14h4" />
                            <path d="M10 18h4" />
                        </svg>Manajemen Gedung dan Ruang</p>
                    <p class="flex gap-4"><svg xmlns="http://www.w3.org/2000/svg" class="stroke-primary" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-building2-icon lucide-building-2 stroke-primary">
                            <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z" />
                            <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2" />
                            <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2" />
                            <path d="M10 6h4" />
                            <path d="M10 10h4" />
                            <path d="M10 14h4" />
                            <path d="M10 18h4" />
                        </svg>Manajemen Gedung dan Ruang</p>
                    <p class="flex gap-4"><svg xmlns="http://www.w3.org/2000/svg" class="stroke-primary" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-building2-icon lucide-building-2 stroke-primary">
                            <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z" />
                            <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2" />
                            <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2" />
                            <path d="M10 6h4" />
                            <path d="M10 10h4" />
                            <path d="M10 14h4" />
                            <path d="M10 18h4" />
                        </svg>Manajemen Gedung dan Ruang</p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-black text-center flex flex-col gap-3 pt-20" id="jadwal">
        <h1 class="text-3xl lg:text-4xl font-semibold">Jadwal Ruangan</h1>
        <hr class="w-15 font-bold mx-auto border-gray-500 border">
        {{-- <p class="text-gray-500">Kampus-Kampus UNJ</p> --}}
    </div>

    @livewire('component.jadwalruangan')
    <h5 id="alert" class="hidden alert text-base-content bg-base-200 font-bold text-center">Gunakan Landscape Untuk
        Melihat Jadwal Kelas!</h5>

    {{-- judul container --}}
    <div class="text-black text-center flex flex-col gap-3 pt-20" id="kampus">
        <h1 class="text-2xl lg:text-4xl font-semibold">Universitas Negeri Jakarta Multi Kampus</h1>
        <hr class="w-15 font-bold mx-auto border-gray-500 border">
        <p class="text-gray-500">Kampus-Kampus UNJ</p>
    </div>
    {{-- card container for campus --}}
    <div class="flex flex-wrap justify-center mt-3 gap-3 lg:px-50">
        @foreach ($campuses as $campus)
            <div
                class="card text-black bg-white border border-gray-300 shadow-sm card-md p-3 max-w-sm hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                <figure class="max-h-60 self-center">
                    <img src="{{ isset($campus->images_path) ? asset('storage/' . $campus->images_path[0]) : asset('backgrounds/DUMMY.png') }}"
                        alt="Kampus_A_UNJ" />
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">{{ $campus->name }}</h2>
                    <p class="text-xs not-lg:hidden">{{ $campus->address }}</p>
                    <div class="card-actions">
                        <a href="/kampus/{{ $campus->slug }}"
                            class="btn bg-white text-black w-full hover:bg-gray-200 rounded-lg outline-none">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <button class="btn border-none shadow-none mt-5 self-center rounded-full bg-primary"><a href="/kampus">LIHAT
            KAMPUS</a></button>
    {{-- list beberapa gedung di UNJ --}}
    <div class="text-black text-center flex flex-col gap-3 pt-20" id="gedung">
        <h1 class="text-2xl lg:text-4xl font-semibold">Gedung - Gedung Universitas Negeri Jakarta</h1>
        <hr class="w-15 font-bold mx-auto border-gray-500 border">
    </div>
    {{-- card container for buildings --}}
    <div class="flex flex-wrap justify-center mt-3 gap-3 lg:px-50">
        @foreach ($buildings as $building)
            <div
                class="card text-black bg-white border border-gray-300 shadow-sm card-md p-3 max-w-sm hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                <figure class="max-h-60 self-center">
                    <img src="{{ isset($building->images_path) ? asset('storage/' . $building->images_path[0]) : asset('backgrounds/DUMMY.png') }}"
                        alt="{{ $building->name }}" />
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">{{ $building->name }}</h2>
                    <p class="text-xs not-lg:hidden">{{ $building->address }}</p>
                    <div class="card-actions">
                        <a href="/gedung/{{ $building->slug }}"
                            class="btn bg-white text-black w-full hover:bg-gray-200 rounded-lg outline-none">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <button class="btn border-none shadow-none mt-5 self-center rounded-full bg-primary"><a href="/gedung">LIHAT
            GEDUNG</a></button>
    {{-- Ruangan container --}}
    <div class="text-black text-center flex flex-col gap-3 pt-20" id="ruang">
        <h1 class="text-2xl lg:text-4xl font-semibold" id="ruang">Ruangan Universitas Negeri Jakarta</h1>
        <hr class="w-15 font-bold mx-auto border-gray-500 border">
    </div>
    <div class="flex flex-wrap justify-center mt-3 gap-3 lg:mx-50">
        @foreach ($rooms as $room)
            <div
                class="card text-black bg-white border border-gray-300 shadow-sm card-md p-3 max-w-sm hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                <figure class="max-h-60 self-center">
                    <img src="{{ isset($room->images_path) ? asset('storage/' . $room->images_path[0]) : asset('backgrounds/DUMMY.png') }}"
                        alt="Kampus_A_UNJ" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $room->name }}</h2>
                    <h1>{{ $room->building->name }}</h1>
                    <h1>{{ $room->description }}</h1>
                    <ul>
                        <li class="flex gap-2"><svg class="stroke-primary" xmlns="http://www.w3.org/2000/svg"
                                width="18" height="18" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-building2-icon lucide-building-2 stroke-primary">
                                <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z" />
                                <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2" />
                                <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2" />
                                <path d="M10 6h4" />
                                <path d="M10 10h4" />
                                <path d="M10 14h4" />
                                <path d="M10 18h4" />
                            </svg> Lantai :
                            {{ $room->floor }}</li>
                        <li class="flex gap-2"><svg class="stroke-primary" xmlns="http://www.w3.org/2000/svg"
                                width="18" height="18" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-users-icon lucide-users stroke-primary">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <path d="M16 3.128a4 4 0 0 1 0 7.744" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                <circle cx="9" cy="7" r="4" />
                            </svg>Kapasitas :
                            {{ $room->capacity }}</li>
                    </ul>
                    <div class="card-actions">
                        <a href="/ruang/{{ $room->slug }}"
                            class="btn bg-white text-black w-full hover:bg-gray-200 rounded-lg outline-none">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-black text-center flex flex-col gap-3 pt-20" id="statistik">
        <h1 class="text-4xl font-semibold">Grafik Statistik Informasi Manajemen Gedung dan Ruang</h1>
        <hr class="w-15 font-bold mx-auto border-gray-500 border">
        <p class="text-gray-500">Berikut adalah Grafik Statistik Informasi Manajemen Gedung dan Ruang Universitas
            Negeri
            Jakarta 2025</p>
        <div class="homepagechart w-1/2 self-center" id="homepagechart"></div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/scrollhandler.js') }}"></script>
@endpush

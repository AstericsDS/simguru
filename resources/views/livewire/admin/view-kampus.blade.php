<div>
    <a wire:navigate href="{{ route("daftar-kampus") }}"> < Kembali ke daftar kampus</a>
    {{-- Detail Kampus --}}
    <div class="flex gap-8">

        {{-- Slider --}}
        <div class="viewUnit w-lg relative rounded-md overflow-hidden">
            <div class="swiper-wrapper">
                @foreach ($campus->images_path ?? $pending->new_data['images_path'] as $image)
                    <div class="swiper-slide"><img src="{{ asset('storage/' . $image) }}" class="h-full"></div>
                @endforeach

            </div>

            {{-- Navigation --}}
            <div class="swiper-pagination absolute bottom-1"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        {{-- Data Kampus --}}
        <div class="flex-1">
            <h1 class="text-4xl">{{ $campus->name ?? $pending->new_data['name'] }}</h1>
            <div class="mt-4 flex flex-col gap-3">
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Nama</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $campus->name ?? $pending->new_data['name'] }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Alamat</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $campus->address ?? $pending->new_data['address'] }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Nomor Telepon</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $campus->contact ?? $pending->new_data['contact'] }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Email</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $campus->email ?? $pending->new_data['email'] }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Deskripsi</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $campus->description ?? $pending->new_data['description'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if (isset($campus))
        {{-- Gedung Kampus --}}
        <h1 class="text-3xl mt-12">Daftar Gedung</h1>
        <div class="grid grid-cols-4 gap-3 mt-4">
            @foreach ($buildings as $building)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('view-gedung', $building->slug) }}">
                        <img class="rounded-t-lg h-48 w-full object-cover" src="{{ asset('storage/' . $building->images_path[0]) }}" alt="Gambar Gedung" />
                    </a>
                    <div class="p-5">
                        <a href="{{ route('view-gedung', $building->slug) }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $building->name }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $building->description }}</p>
                        <a href="{{ route('view-gedung', $building->slug) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all">
                            Lihat Detail
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

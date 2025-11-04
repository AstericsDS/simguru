<div>
    <a wire:navigate href="{{ route('daftar-gedung') }}" class="flex items-center gap-2 mb-4 hover:text-primary transition-all">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Kembali ke daftar gedung</span>
    </a>
    {{-- Detail Kampus --}}
    <div class="flex gap-8">

        {{-- Media --}}
        <div class="flex flex-col gap-4">

            {{-- Slider --}}
            <div class="viewUnit w-lg relative rounded-md overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($building->images_path ?? $pending->new_data['images_path'] as $image)
                        <div class="swiper-slide"><img src="{{ asset('storage/' . $image) }}" class="h-full"></div>
                    @endforeach

                </div>

                {{-- Navigation --}}
                <div class="swiper-pagination absolute bottom-1"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            {{-- Documents --}}
            <div class="text-end">
                <i class="fa-regular fa-file hover:text-primary text-xl transition-all cursor-pointer" @click="$dispatch('modal')"></i>
            </div>

            {{-- View Documents Modal --}}
            <div x-data="{ state: false }" @modal.window="state = !state" @keydown.window.escape="state = false">
                <div x-show="state" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="opacity-0">
                    <div x-show="state" @click.outside="state = false" class="relative bg-white max-h-[90%] overflow-y-auto rounded-lg shadow-sm w-xl p-2 opacity-100 z-50" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="scale-50" x-transition:enter-end="scale-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="scale-50">

                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-5 border-b rounded-t border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">
                                Dokumen
                            </h3>
                            <button @click="state = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center transition-all hover:cursor-pointer">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>

                        {{-- Modal Body --}}
                        <div class="p-5 pt-0">
                            <ul class="mt-3 space-y-1 list-disc list-inside marker:text-primary">
                                @foreach ($building->documents_path ?? $pending->new_data['documents_path'] as $document)
                                    <li>
                                        <a target="_blank" href="{{ asset('storage/' . $document) }}" class="border-b-1 border-transparent hover:border-gray-500 transition-all duration-300"> {{ basename($document) }} ({{ number_format(Storage::disk('public')->size($document) / 1024, 2) }} KB)</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Data Kampus --}}
        <div class="flex-1">
            <h1 class="text-4xl">{{ $building->name ?? $pending->new_data['name'] }}</h1>
            <div class="mt-4 flex flex-col gap-3">
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Nama</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $building->name ?? $pending->new_data['name'] }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Alamat</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $building->address ?? $pending->new_data['address'] }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Luas Bangunan</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $building->building_area ?? $pending->new_data['building_area'] }} m<sup>2</sup></span>
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Luas tanah</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $building->land_area ?? $pending->new_data['land_area'] }} m<sup>2</sup></span>
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Jumlah Lantai</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $building->floor ?? $pending->new_data['floor'] }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-[200px_1fr]">
                    <span>Deskripsi</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $building->description ?? $pending->new_data['description'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (isset($building))
        {{-- Ruang Gedung --}}
        <h1 class="text-3xl mt-12">Daftar Ruang</h1>
        <div class="grid grid-cols-4 gap-3 mt-4">
            @foreach ($rooms as $room)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('view-ruang', $room->slug) }}">
                        <img class="rounded-t-lg h-48 w-full object-cover" src="{{ asset('storage/' . $room->images_path[0]) }}" alt="Gambar Gedung" />
                    </a>
                    <div class="p-5">
                        <a href="{{ route('view-ruang', $room->slug) }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $room->name }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $room->description }}</p>
                        <a href="{{ route('view-ruang', $room->slug) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all">
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

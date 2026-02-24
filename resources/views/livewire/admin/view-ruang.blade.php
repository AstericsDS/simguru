<div>
    <a wire:navigate href="{{ route('daftar-ruang') }}"
        class="flex items-center gap-2 mb-4 hover:text-primary transition-all">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Kembali ke daftar ruang</span>
    </a>

    {{-- Detail Kampus --}}
    <div x-data="{ state: true }" x-show="state" @toggle-inventory.window="state = !state" class="flex gap-8 xl:flex-row flex-col"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100">

        {{-- Media --}}
        <div class="flex flex-col gap-4 xl:flex-3">
            {{-- Slider --}}
            <div class="w-full xl:w-fit relative rounded-md overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($room->images_path ?? $pending->new_data['images_path'] as $image)
                        <div class="swiper-slide"><img src="{{ asset('storage/' . $image) }}" class="h-full"></div>
                    @endforeach

                </div>

                {{-- Navigation --}}
                <div class="swiper-pagination absolute bottom-1"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            {{-- Toggle --}}
            <div class="flex justify-end space-x-4 items-center">

                {{-- Documents Toggle --}}
                <i class="fa-regular fa-file hover:text-primary text-xl transition-all cursor-pointer"
                    @click="$dispatch('modal')"></i>

                {{-- Inventory Toggle --}}
                <div class="hover:text-primary transition-all cursor-pointer" @click="$dispatch('toggle-inventory')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>
                </div>

            </div>

            {{-- View Documents Modal --}}
            <div x-data="{ state: false }" @modal.window="state = !state" @keydown.window.escape="state = false">
                <div x-show="state"
                    class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center"
                    x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-250"
                    x-transition:leave-end="opacity-0">
                    <div x-show="state" @click.outside="state = false"
                        class="relative bg-white max-h-[90%] overflow-y-auto rounded-lg shadow-sm w-xl p-2 opacity-100 z-50 mx-4"
                        x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="scale-50"
                        x-transition:enter-end="scale-100" x-transition:leave="transition ease-in-out duration-250"
                        x-transition:leave-end="scale-50">

                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-5 border-b rounded-t border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">
                                Dokumen
                            </h3>
                            <button @click="state = false" type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center transition-all hover:cursor-pointer">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>

                        {{-- Modal Body --}}
                        <div class="p-5 pt-0">
                            <ul class="mt-3 space-y-1 list-disc list-inside marker:text-primary">
                                @foreach ($room->documents_path ?? $pending->new_data['documents_path'] as $document)
                                    <li>
                                        <a target="_blank" href="{{ asset('storage/' . $document) }}"
                                            class="border-b-1 border-transparent hover:border-gray-500 transition-all duration-300">
                                            {{ basename($document) }}
                                            ({{ number_format(Storage::disk('public')->size($document) / 1024, 2) }}
                                            KB)</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Data Kampus --}}
        <div class="flex-4">
            <h1 class="text-4xl">{{ $room->name ?? $pending->new_data['name'] }}</h1>
            <div class="mt-4 flex flex-col gap-3">
                <div class="grid grid-cols-[23%_1fr] lg:grid-cols-[25%_1fr]">
                    <span>Nama</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->name ?? $pending->new_data['name'] }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-[23%_1fr] lg:grid-cols-[25%_1fr]">
                    <span>Kampus</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->campus->name ?? $pending->new_data['campus'] }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-[23%_1fr] lg:grid-cols-[25%_1fr]">
                    <span>Gedung</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->building->name ?? $pending->new_data['building'] }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-[23%_1fr] lg:grid-cols-[25%_1fr]">
                    <span>Lantai</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->floor ?? $pending->new_data['floor'] }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-[23%_1fr] lg:grid-cols-[25%_1fr]">
                    <span>Kapasitas</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->capacity ?? $pending->new_data['capacity'] }} orang</span>
                    </div>
                </div>
                <div class="grid grid-cols-[23%_1fr] lg:grid-cols-[25%_1fr]">
                    <span>Panjang</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->length ?? $pending->new_data['length'] }} m</span>
                    </div>
                </div>
                <div class="grid grid-cols-[23%_1fr] lg:grid-cols-[25%_1fr]">
                    <span>Lebar</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->width ?? $pending->new_data['width'] }} m</span>
                    </div>
                </div>
                <div class="grid grid-cols-[23%_1fr] lg:grid-cols-[25%_1fr]">
                    <span>Tinggi</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->height ?? $pending->new_data['height'] }} m</span>
                    </div>
                </div>
                <div class="grid grid-cols-[23%_1fr] lg:grid-cols-[25%_1fr]">
                    <span>Jenis Ruang</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        @if ($room->category === 'class')
                            <span class="px-2 py-1 rounded-lg bg-[#007BFF] text-white">Kelas</span>
                        @elseif ($room->category === 'office')
                            <span class="px-2 py-1 rounded-lg bg-[#17A2B8] text-white">Kantor</span>
                        @elseif ($room->category === 'laboratory')
                            <span class="px-2 py-1 rounded-lg bg-[#6F42C1] text-white">Laboratorium</span>
                        @elseif ($room->category === 'open_space')
                            <span class="px-2 py-1 rounded-lg bg-[#01a2ff] text-white">Ruang Terbuka</span>
                        @elseif ($room->category === 'internal_unj')
                            <span class="px-2 py-1 rounded-lg bg-[#006569] text-white">Internal UNJ</span>
                        @elseif ($room->category === 'general')
                            <span class="px-2 py-1 rounded-lg bg-[#28A745] text-white">Umum</span>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2 xl:gap-3 mt-4">
                    <span>Disewakan</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ ($room->rentable ? 'Disewakan' : 'Tidak Disewakan') ?? $pending->new_data['rentable']}}</span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2 xl:gap-3 mt-4">
                    <span>Visibilitas</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ ($room->show ? 'Publik' : 'Privat') ?? $pending->new_data['show'] }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2 xl:gap-3 mt-4">
                    <span>Deskripsi</span>
                    <div class="flex gap-3">
                        <span>:</span>
                        <span>{{ $room->description ?? $pending->new_data['description'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Inventory --}}
    <div x-data="{ state: false }" x-show="state" @toggle-inventory.window="state = !state"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100">
        <div class="rounded-md mt-4">

            <div class="flex justify-between items-center">
                <span class="text-3xl">Inventaris</span>

                {{-- Inventory Toggle --}}
                <div class="flex items-center justify-center size-8  hover:text-primary transition-all cursor-pointer text-xl"
                    @click="$dispatch('toggle-inventory')">
                    <i class="fa-solid fa-info"></i>
                </div>
            </div>

            <table class="w-full border border-gray-400 mt-4">
                <thead>
                    <tr>
                        <th class="text-left font-normal border border-gray-400 p-2 px-4">Nama Barang</th>
                        <th class="text-left font-normal border border-gray-400 p-2 px-4">Kuantitas</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Inventory --}}
                    @foreach ($room->inventory ?? [] as $item)
                        <tr>
                            <td class="border border-gray-400 p-2 px-4">{{ $item['name'] }}</td>
                            <td class="border border-gray-400 p-2 px-4">{{ $item['quantity'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

<div>
    <a wire:navigate href="{{ route('daftar-ruang') }}">
        < Kembali ke daftar ruang</a>
            {{-- Detail Kampus --}}
            <div class="flex gap-8">

                {{-- Media --}}
                <div class="flex flex-col gap-4">
                    {{-- Slider --}}
                    <div class="viewUnit w-lg relative rounded-md overflow-hidden">
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

                    {{-- Documents --}}
                    <div class="text-end">
                        <i class="fa-regular fa-file hover:text-primary text-xl transition-all cursor-pointer" @click="$dispatch('modal')"></i>
                    </div>

                    {{-- View Documents Modal --}}
                    <div x-data="{ state: false }" @modal.window="state = !state" @keydown.window.escape="state = false">
                        <div x-show="state" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="opacity-0">
                            <div x-show="state" @click.outside="state = false" class="relative bg-white max-h-[90%] overflow-y-auto rounded-lg shadow-sm w-xl p-2 opacity-100 z-50" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="scale-50" x-transition:enter-end="scale-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="scale-50">

                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
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
                                        @foreach ($room->documents_path ?? $pending->new_data['documents_path'] as $document)
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
                    <h1 class="text-4xl">{{ $room->name ?? $pending->new_data['name'] }}</h1>
                    <div class="mt-4 flex flex-col gap-3">
                        <div class="grid grid-cols-[200px_1fr]">
                            <span>Nama</span>
                            <div class="flex gap-3">
                                <span>:</span>
                                <span>{{ $room->name ?? $pending->new_data['name'] }}</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-[200px_1fr]">
                            <span>Kampus</span>
                            <div class="flex gap-3">
                                <span>:</span>
                                <span>{{ $room->campus->name ?? $pending->new_data['campus'] }}</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-[200px_1fr]">
                            <span>Gedung</span>
                            <div class="flex gap-3">
                                <span>:</span>
                                <span>{{ $room->building->name ?? $pending->new_data['building'] }}</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-[200px_1fr]">
                            <span>Lantai</span>
                            <div class="flex gap-3">
                                <span>:</span>
                                <span>{{ $room->floor ?? $pending->new_data['floor'] }}</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-[200px_1fr]">
                            <span>Kapasitas</span>
                            <div class="flex gap-3">
                                <span>:</span>
                                <span>{{ $room->capacity ?? $pending->new_data['capacity'] }}
                            </div>
                        </div>
                        <div class="grid grid-cols-[200px_1fr]">
                            <span>Luas</span>
                            <div class="flex gap-3">
                                <span>:</span>
                                <span>{{ $room->area ?? $pending->new_data['area'] }}m<sup>2</sup></span>
                            </div>
                        </div>
                        <div class="grid grid-cols-[200px_1fr]">
                            <span>Jenis Ruang</span>
                            <div class="flex gap-3">
                                <span>:</span>
                                @if (($room->category ?? $pending->new_data['category']) === 'class')
                                    <span>Kelas</span>
                                @else
                                    <span>Bukan Kelas</span>
                                @endif
                            </div>
                        </div>
                        <div class="grid grid-cols-[200px_1fr]">
                            <span>Deskripsi</span>
                            <div class="flex gap-3">
                                <span>:</span>
                                <span>{{ $room->description ?? $pending->new_data['description'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

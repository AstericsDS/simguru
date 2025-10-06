<div>
    {{-- Title --}}
    <h1 class="text-2xl font-medium">Reservasi Ruang</h1>

    {{-- Content --}}
    <div class="mt-6">

        {{-- Informasi --}}
        <div x-data="{ show: true }" x-show="show" @toggle-calendar.window="show = !show"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100" class="flex gap-4">
            <div class="flex-1 flex flex-col gap-3">
                {{-- Informasi Gedung --}}
                <div>
                    <span class="text-3xl text-primary italic">Informasi Ruang</span>
                    <hr class="mt-2 text-primary">
                </div>
                <div class="grid grid-cols-2 mt-2">
                    <span>Nama Ruang</span>
                    <div class="flex gap-4">
                        <span>:</span>
                        <span>{{ $room->name }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <span>Kampus</span>
                    <div class="flex gap-4">
                        <span>:</span>
                        <span>{{ $room->campus->name }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <span>Gedung</span>
                    <div class="flex gap-4">
                        <span>:</span>
                        <span>{{ $room->building->name }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <span>Lantai</span>
                    <div class="flex gap-4">
                        <span>:</span>
                        <span>{{ $room->floor }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <span>Kapasitas</span>
                    <div class="flex gap-4">
                        <span>:</span>
                        <span>{{ $room->capacity }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <span>Luas</span>
                    <div class="flex gap-4">
                        <span>:</span>
                        <span>{{ $room->area }}m<sup>2</sup></span>
                    </div>
                </div>

                {{-- Informasi Jadwal --}}
                <div class="mt-4">
                    <span class="text-3xl italic text-primary">Jadwal</span>
                    <hr class="mt-2 text-primary">
                </div>
                <div class="grid grid-cols-2 mt-2">
                    <span>Hari dan Tanggal</span>
                    <div class="flex gap-4">
                        <span>:</span>
                        <span>{{ $startDate ?? '-' }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <span>Waktu</span>
                    <div class="flex gap-4">
                        <span>:</span>
                        <span>{{ $startTime . ' - ' . $endTime ?? '-' }}</span>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <span>Nama Acara</span>
                    <div class="flex gap-4">
                        <span>:</span>
                        <span>{{ $event_name ?? '-' }}</span>
                    </div>
                </div>

                {{-- Button --}}
                <div class="flex gap-4 mt-4">
                    <button @click="$dispatch('toggle-calendar')"
                        class="flex flex-1 justify-center items-center gap-3 rounded-md border-2 border-primary px-2 py-2 mx-auto cursor-pointer hover:bg-primary hover:text-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                        <span>Tambah Jadwal</span>
                    </button>
                    <button
                        @click="$wire.event !== null && $wire.startRaw !== null && $wire.endRaw !== null ? $dispatch('confirm-modal') : null"
                        class="flex flex-1 justify-center items-center p-2 border-2 border-sapphire rounded-md transition-all hover:text-white hover:bg-sapphire cursor-pointer gap-3">
                        <i class="fa-regular fa-floppy-disk text-lg"></i>
                        <span>Simpan</span>
                    </button>
                </div>
            </div>

            {{-- Slider --}}
            <div class="viewUnit w-lg relative rounded-md overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($room->images_path as $image)
                        <div class="swiper-slide"><img src="{{ asset('storage/' . $image) }}" class="h-full"></div>
                    @endforeach

                </div>

                {{-- Navigation --}}
                <div class="swiper-pagination absolute bottom-1"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>

        {{-- Kalender --}}
        <div x-data="{ show: false }" x-show="show" @toggle-calendar.window="show = !show"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-init="$watch('show', value => { if (value) { $nextTick(() => { calendar2.render(); }); } })">
            <div id="selectable" wire:ignore></div>
            {{-- <full-calendar wire:ignore/> --}}
            <div class="mt-4 flex gap-4 justify-end">
                <button @click="$dispatch('toggle-calendar')"
                    class="p-2 text-red-600 cursor-pointer hover:text-red-800 rounded-md px-4 transition-all">Kembali</button>
            </div>
        </div>
    </div>


    {{-- Modal --}}
    <div
        x-data="{
            state: false,
            startRaw: '',
            endRaw: '',
            startDate: '',
            startTime: '',
            endTime: '',
            tab: 'biasa',
            prevTab: 'biasa',
            direction: 'right',
            changeTab(newTab) {
                this.direction = (newTab === 'kuliah' && this.tab === 'biasa') ? 'right' : 'left';
                this.prevTab = this.tab;
                this.tab = newTab;
            }
        }"
        @event-modal.window="state = !state; startRaw = $event.detail.startRaw; endRaw = $event.detail.endRaw; startDate = $event.detail.startDate; startTime = $event.detail.startTime; endTime = $event.detail.endTime"
        @keydown.window.escape="state = false"
    >
        <div x-show="state" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center"
            x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-250"
            x-transition:leave-end="opacity-0">
            <div x-show="state" @click.outside="state = false"
                class="relative bg-white max-h-screen overflow-y-auto rounded-lg shadow-sm w-[52%] opacity-100 z-50"
                x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="scale-50"
                x-transition:enter-end="scale-100" x-transition:leave="transition ease-in-out duration-250"
                x-transition:leave-end="scale-50">

                <!-- Modal header -->
                <div class="flex items-center justify-between border-b rounded-t border-gray-200 p-8 pb-6">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Tambah Acara
                    </h3>
                    <button @click="state = false" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center transition-all hover:cursor-pointer">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                {{-- Modal Switch Tab --}}
                <div class="grid grid-cols-2 text-center">
                    <button
                        @click="changeTab('biasa')"
                        :class="tab === 'biasa' ? 'border-b-2 border-primary text-primary font-medium' : 'border-b-2 border-gray-200 text-gray-400 font-medium'"
                        class="p-4 transition-all"
                    >
                        Jadwal Biasa
                    </button>
                    <button
                        @click="changeTab('kuliah')"
                        :class="tab === 'kuliah' ? 'border-b-2 border-primary text-primary font-medium' : 'border-b-2 border-gray-200 text-gray-400 font-medium'"
                        class="p-4 transition-all"
                    >
                        Jadwal Kuliah
                    </button>
                </div>

                {{-- Modal content --}}
                <div class="relative flex flex-col gap-5 p-8 pt-0 mt-8 min-h-[400px] overflow-hidden">
                    <template x-if="tab === 'biasa'">
                        <div
                            x-transition:enter="transition transform ease-in duration-300"
                            :x-transition:enter-start="direction === 'right' ? 'translate-x-full opacity-0' : '-translate-x-full opacity-0'"
                            x-transition:enter-end="translate-x-0 opacity-100"
                            x-transition:leave="transition transform ease-out duration-200"
                            x-transition:leave-start="translate-x-0 opacity-100"
                            :x-transition:leave-end="direction === 'right' ? '-translate-x-full opacity-0' : 'translate-x-full opacity-0'"
                            class="absolute w-full gap-5"
                        >
                            <div class="grid grid-cols-[275px_1fr]">
                                <span>Hari dan Tanggal</span>
                                <div class="flex gap-4">
                                    <span>:</span>
                                    <span x-text="startDate"></span>
                                </div>
                            </div>
                            <div class="grid grid-cols-[275px_1fr]">
                                <span>Waktu</span>
                                <div class="flex gap-4">
                                    <span>:</span>
                                    <span x-text="startTime + ' - ' + endTime"></span>
                                </div>
                            </div>
                            <div class="grid grid-cols-[275px_1fr]">
                                <span>Nama Acara</span>
                                <div class="flex gap-4">
                                    <span>:</span>
                                    <div class="flex flex-col">
                                        <input wire:model="event_name" type="text"
                                            class="bg-gray-50 flex-1 border focus:outline-none focus:ring-primary transition-all text-gray-900 text-sm rounded-lg w-full {{ $errors->has('event') ? 'border-red-500' : 'border-gray-300' }}">
                                        @error('event')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-[275px_1fr]">
                                <span>Deskripsi</span>
                                <div class="flex gap-4">
                                    <span>:</span>
                                    <div class="flex flex-col">
                                        <input wire:model="description" type="text"
                                            class="bg-gray-50 flex-1 border focus:outline-none focus:ring-primary transition-all text-gray-900 text-sm rounded-lg w-full {{ $errors->has('event') ? 'border-red-500' : 'border-gray-300' }}">
                                        @error('event')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template x-if="tab === 'kuliah'">
                        <div
                            x-transition:enter="transition transform ease-in duration-300"
                            :x-transition:enter-start="direction === 'right' ? 'translate-x-full opacity-0' : '-translate-x-full opacity-0'"
                            x-transition:enter-end="translate-x-0 opacity-100"
                            x-transition:leave="transition transform ease-out duration-200"
                            x-transition:leave-start="translate-x-0 opacity-100"
                            :x-transition:leave-end="direction === 'right' ? '-translate-x-full opacity-0' : 'translate-x-full opacity-0'"
                            class="absolute w-full"
                        >
                            <div class="grid grid-cols-[275px_1fr]">
                                <span>Hari dan Tanggal</span>
                                <div class="flex gap-4">
                                    <span>:</span>
                                    <span x-text="startDate"></span>
                                </div>
                            </div>
                            <div class="grid grid-cols-[275px_1fr]">
                                <span>Waktu</span>
                                <div class="flex gap-4">
                                    <span>:</span>
                                    <span x-text="startTime + ' - ' + endTime"></span>
                                </div>
                            </div>
                            <div class="grid grid-cols-[275px_1fr]">
                                <span>Nama Acara</span>
                                <div class="flex gap-4">
                                    <span>:</span>
                                    <div class="flex flex-col">
                                        <input wire:model="event_name" type="text"
                                            class="bg-gray-50 flex-1 border focus:outline-none focus:ring-primary transition-all text-gray-900 text-sm rounded-lg w-full {{ $errors->has('event') ? 'border-red-500' : 'border-gray-300' }}">
                                        @error('event')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-[275px_1fr]">
                                <span>Nama Dosen</span>
                                <div class="flex gap-4">
                                    <span>:</span>
                                    <div class="flex flex-col">
                                        <input wire:model="lecturer" type="text"
                                            class="bg-gray-50 flex-1 border focus:outline-none focus:ring-primary transition-all text-gray-900 text-sm rounded-lg w-full {{ $errors->has('event') ? 'border-red-500' : 'border-gray-300' }}">
                                        @error('event')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-[275px_1fr]">
                                <span>Nama Prodi</span>
                                <div class="flex gap-4">
                                    <span>:</span>
                                    <div class="flex flex-col">
                                        <input wire:model="major" type="text"
                                            class="bg-gray-50 flex-1 border focus:outline-none focus:ring-primary transition-all text-gray-900 text-sm rounded-lg w-full {{ $errors->has('event') ? 'border-red-500' : 'border-gray-300' }}">
                                        @error('event')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-[275px_1fr]">
                                <span>Angkatan</span>
                                <div class="flex gap-4">
                                    <span>:</span>
                                    <div class="flex flex-col">
                                        <input wire:model="class_of" type="number"
                                            class="bg-gray-50 flex-1 border focus:outline-none focus:ring-primary transition-all text-gray-900 text-sm rounded-lg w-full {{ $errors->has('event') ? 'border-red-500' : 'border-gray-300' }}">
                                        @error('event')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-[275px_1fr]">
                                <span>Tanggal Awal Perkuliahan</span>
                                <div class="flex gap-4">
                                    <span>:</span>
                                    <div class="flex flex-col">
                                        <input wire:model="dtstart" type="date"
                                            class="bg-gray-50 flex-1 border focus:outline-none focus:ring-primary transition-all text-gray-900 text-sm rounded-lg w-full {{ $errors->has('event') ? 'border-red-500' : 'border-gray-300' }}">
                                        @error('event')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-[275px_1fr]">
                                <span>Tanggal Akhir Perkuliahan</span>
                                <div class="flex gap-4">
                                    <span>:</span>
                                    <div class="flex flex-col">
                                        <input wire:model="dtend" type="date"
                                            class="bg-gray-50 flex-1 border focus:outline-none focus:ring-primary transition-all text-gray-900 text-sm rounded-lg w-full {{ $errors->has('event') ? 'border-red-500' : 'border-gray-300' }}">
                                        @error('event')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-[275px_1fr]">
                                <span>Deskripsi</span>
                                <div class="flex gap-4">
                                    <span>:</span>
                                    <div class="flex flex-col">
                                        <input wire:model="description" type="text"
                                            class="bg-gray-50 flex-1 border focus:outline-none focus:ring-primary transition-all text-gray-900 text-sm rounded-lg w-full {{ $errors->has('event') ? 'border-red-500' : 'border-gray-300' }}">
                                        @error('event')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <div class="self-end mt-4 relative z-10">
                        <button
                            @click="$dispatch('saveDate', { payload: [startRaw, endRaw, startDate, startTime, endTime, tab] })"
                            class="px-4 py-2 rounded-md  hover:bg-primary transition-all cursor-pointer text-primary text-lg border-2 border-primary hover:text-white">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Toast --}}
    <div x-data="{ state: false, 'status': '', 'message': '' }" x-show="state"
        @toast.window="state = true; status = $event.detail.status; message = $event.detail.message; setTimeout( () => state = false, 3000 )"
        :class="{ 'bg-green-100': status === 'success', 'bg-red-100': status === 'fail', 'bg-red-100': status === 'nochanges' }"
        x-transition:enter="transform transition ease-in-out duration-1000"
        x-transition:enter-start="-translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
        x-transition:leave="transform transition ease-in-out duration-1000" x-transition:leave-start="opacity-100"
        x-transition:leave-end="-translate-x-5/4 opacity-0"
        class="fixed bottom-5 left-5 flex w-fit z-30 p-4 rounded-md shadow-lg items-center gap-4">

        {{-- Success Logo --}}
        <div :class="status === 'success' ? 'inline-flex' : 'hidden'"
            class="items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
            </svg>
            <span class="sr-only">Check icon</span>
        </div>

        {{-- Failed Logo --}}
        <div :class="status === 'fail' || status === 'nochanges' ? 'inline-flex' : 'hidden'"
            class="items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
            </svg>
            <span class="sr-only">Error icon</span>
        </div>

        {{-- Message --}}
        <div x-text="message"></div>

        {{-- Close Button --}}
        <button @click="state = false" type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700 cursor-pointer transition-all">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>

    </div>

    {{-- Confirm Modal --}}
    <div x-data="{ state: false }" @confirm-modal.window="state = !state" @keydown.window.escape="state = false">
        <div x-show="state" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center"
            x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-250"
            x-transition:leave-end="opacity-0">
            <div x-show="state" @click.outside="state = false"
                class="relative bg-white max-h-screen overflow-y-auto rounded-lg shadow-sm w-2xl p-2 opacity-100 z-50"
                x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="scale-50"
                x-transition:enter-end="scale-100" x-transition:leave="transition ease-in-out duration-250"
                x-transition:leave-end="scale-50">

                <div class="flex flex-col items-center py-8">
                    <i class="fa-solid fa-circle-exclamation text-gray-500 text-8xl"></i>
                    <p class="pt-6 pb-12 text-2xl text-gray-600">Apakah anda yakin?</p>
                    <div class="flex gap-6">
                        <button wire:click='save'
                            class="px-8 py-2 rounded-md bg-primary hover:bg-primary-dark transition-all cursor-pointer text-white text-xl">Iya</button>
                        <button @click="$dispatch('confirm-modal')"
                            class="px-8 py-2 rounded-md border-2 border-red-300  hover:bg-red-400 hover:border-red-400 transition-all cursor-pointer text-xl hover:text-white">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    @vite(['resources/js/peminjaman-ruang.js'])
@endpush

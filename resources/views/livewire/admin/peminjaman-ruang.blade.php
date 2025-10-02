<div class="text-black">
    {{-- Title --}}
    <h1 class="text-2xl font-medium">Peminjaman Ruang</h1>

    {{-- Content --}}
    <div class="mt-6">
        <div class="flex gap-4 w-fit">

            {{-- Search --}}
            <div x-data @keyup.window="if ($event.ctrlKey && $event.key === '/') {$refs.searchInput.focus()}" class="relative w-96">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 cursor-pointer">
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                </span>

                <input wire:model.live="search" x-ref="searchInput" @keydown.escape="$refs.searchInput.blur()" type="text" class="border border-gray-300 rounded-lg px-3 py-2 w-full pl-12 pr-[88px] focus:outline-none focus:ring-primary text-black transition-all" placeholder="Cari gedung">

                <div class="absolute right-4 text-gray-500 top-1/2 -translate-y-1/2 flex gap-1">
                    <div class="border px-2 py-1 border-gray-500 rounded-md flex items-center justify-center">
                        <span class="text-xs">CTRL</span>
                    </div>
                    <div class="border p-2 py-1 border-gray-500 rounded-md flex items-center justify-center">
                        <span class="text-xs">/</span>
                    </div>
                </div>
            </div>

            {{-- Filter --}}
            <select wire:model.change="campus_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-[200px] p-2.5 truncate">
                <option selected hidden>Pilih Kampus</option>
                @foreach ($campuses as $campus)
                    <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                @endforeach
            </select>
            <select {{ $campus_id ? '' : 'disabled' }} wire:model.change="building_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-[200px] p-2.5 truncate">
                <option selected hidden>Pilih Gedung</option>
                @foreach ($buildings ?? [] as $building)
                    @if (is_object($building))
                        <option value="{{ $building->id }}">{{ $building->name }}</option>
                    @endif
                @endforeach
            </select>
            <button wire:click='clearFilter' class="flex justify-center items-center hover:text-red-500 cursor-pointer transition-all" data-tip="Bersihkan Filter">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
            </button>
        </div>

        <div class="grid grid-cols-4 gap-2 mt-8">
            @foreach ($rooms as $room)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <img class="rounded-t-lg h-48 w-full object-cover" src="{{ asset('storage/' . $room->images_path[0]) }}" alt="Gambar Ruang" />
                    <div class="p-5">
                        <div class="flex gap-4">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $room->name }}</h5>
                            @switch($room->category)
                                @case('class')
                                    <span class="px-2 py-1 rounded-lg bg-[#007BFF] text-white">Kelas</span>

                                    @break
                                @case('not_class')
                                    <span class="px-2 py-1 rounded-lg bg-[#6C757D] text-white">Bukan Kelas</span>

                                @break
                                @case('office')
                                    <span class="px-2 py-1 rounded-lg bg-[#17A2B8] text-white">Kantor</span>

                                @break
                                @case('laboratory')
                                    <span class="px-2 py-1 rounded-lg bg-[#6F42C1] text-white">Laboratorium</span>

                                @break
                                @case('rentable')
                                    <span class="px-2 py-1 rounded-lg bg-[#28A745] text-white">Umum (disewakan)</span>

                                @break
                                @default
                                <span class="px-2 py-1 rounded-lg bg-[#28A745] text-white">nonis</span>
                            @endswitch
                        </div>
                        <div class="flex gap-2 items-center mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                            </svg>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $room->campus->name }}</p>
                        </div>
                        <div class="flex gap-2 items-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                            </svg>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $room->building->name }}</p>
                        </div>
                        <a href="{{ route('reservasi-ruang', $room->slug) }}" wire:navigate class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-primary rounded-lg hover:bg-primary-dark transition-all focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Reservasi
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

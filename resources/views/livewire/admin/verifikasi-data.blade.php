<div class="text-black">
    <h1 class="text-2xl font-medium">Daftar Pengajuan</h1>
    <div class="p-4 rounded-md mt-4">

        {{-- Filter --}}
        @php
            $statuses = [
                'all' => 'Semua',
                'pending' => 'Pending',
                'approved' => 'Diterima',
                'rejected' => 'Ditolak',
            ];
        @endphp

        <div class="flex gap-2 text-">
            @foreach ($statuses as $value => $label)
                <button wire:click="setFilter('{{ $value }}')" class="btn-filter p-2 cursor-pointer transition-all {{ $filter === $value ? 'text-unj border-b-[2px] border-unj font-medium' : 'text-gray-500 hover:text-gray-800' }}">
                    {{ $label }}
                </button>
            @endforeach
        </div>

        {{-- Table --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Unit
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Admin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Waktu Pengajuan
                                <a href="#">
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 w-1">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($updates as $update)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $update->parsed_new_data['Nama'] }}</th>
                            <td class="px-6 py-4">
                                @switch($update->table)
                                    @case('campuses')
                                        Kampus
                                    @break

                                    @case('buildings')
                                        Gedung
                                    @break

                                    @case('rooms')
                                        Ruang
                                    @break
                                @endswitch
                            </td>
                            <td class="px-6 py-4">{{ $update->admin->name }}</td>
                            <td class="px-6 py-4">{{ $update->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4">
                                @switch($update->status)
                                    @case('pending')
                                        <span class="rounded-xl bg-yellow-400 text-white px-2 py-1">
                                            Pending
                                        </span>
                                    @break

                                    @case('approved')
                                        <span class="rounded-xl bg-[#40a02b] text-white px-2 py-1">
                                            Disetujui
                                        </span>
                                    @break

                                    @case('rejected')
                                        <span class="rounded-xl bg-[#d20f39] text-white px-2 py-1">
                                            Ditolak
                                        </span>
                                    @break
                                @endswitch
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2 items-center">
                                    <button type="button" class="transition-all cursor-pointer hover:text-blue-500 hover:bg-gray-300 rounded-xl p-2" data-modal-target="default-modal-{{ $update->id }}" data-modal-toggle="default-modal-{{ $update->id }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    @if ($update->status === 'pending')
                                        <button data-modal-target="popup-accept-{{ $update->id }}" data-modal-toggle="popup-accept-{{ $update->id }}" class="border border-green-500 size-8 rounded-xl cursor-pointer hover:bg-green-500 hover:text-white transition-all">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                        <button data-modal-target="popup-reject-{{ $update->id }}" data-modal-toggle="popup-reject-{{ $update->id }}" class="border border-red-500 size-8 rounded-xl cursor-pointer hover:bg-red-500 hover:text-white transition-all">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>

                                        {{-- Accept popup --}}
                                        <div id="popup-accept-{{ $update->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white transition-all cursor-pointer" data-modal-hide="popup-accept-{{ $update->id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-4 md:p-5 text-center">
                                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin menerima entry ini?</h3>
                                                        <button wire:click='accept({{ $update->id }})' data-modal-hide="popup-accept-{{ $update->id }}" type="button" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center cursor-pointer transition-all">
                                                            Iya
                                                        </button>
                                                        <button data-modal-hide="popup-accept-{{ $update->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white transition-all cursor-pointer dark:hover:bg-gray-700">Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Reject popup --}}
                                        <div id="popup-reject-{{ $update->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white transition-all cursor-pointer" data-modal-hide="popup-reject-{{ $update->id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-4 md:p-5 text-center">
                                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin ingin menolak entry ini?</h3>
                                                        <button wire:click='reject({{ $update->id }})' data-modal-hide="popup-reject-{{ $update->id }}" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center cursor-pointer transition-all">
                                                            Iya
                                                        </button>
                                                        <button data-modal-hide="popup-reject-{{ $update->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 cursor-pointer transition-all">Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>

                        {{-- Main modal --}}
                        <div id="default-modal-{{ $update->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-7xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                        <h3 class="text-xl text-gray-900 dark:text-white">
                                            Detail Data
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white transition-all cursor-pointer" data-modal-hide="default-modal-{{ $update->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    {{-- Modal body --}}
                                    @switch($update->table)
                                        @case('rooms')
                                            @if (isset($update->old_data))
                                                <div>

                                                </div>
                                            @endif
                                            <div class="p-5">
                                                <h1 class="text-gray-900 text-xl font-semibold">Data Baru</h1>

                                                {{-- Grid --}}
                                                <div class="grid grid-cols-2 mt-4">

                                                    {{-- Left Side --}}
                                                    <div class="flex flex-col gap-4">
                                                        <div class="grid grid-cols-2">
                                                            <span>Nama</span>
                                                            <pre>:  {{ $update->parsed_new_data['Nama'] }}</pre>
                                                        </div>
                                                        <div class="grid grid-cols-2">
                                                            <span>Gedung</span>
                                                            <pre>:  {{ $update->parsed_new_data['Gedung'] }}</pre>
                                                        </div>
                                                        <div class="grid grid-cols-2">
                                                            <span>Lantai</span>
                                                            <pre>:  {{ $update->parsed_new_data['Lantai'] }}</pre>
                                                        </div>
                                                        <div class="grid grid-cols-2">
                                                            <span>Kapasitas</span>
                                                            <pre>:  {{ $update->parsed_new_data['Kapasitas'] }}</pre>
                                                        </div>
                                                        <div class="grid grid-cols-2">
                                                            <span>Status</span>
                                                            <pre>:  {{ $update->parsed_new_data['Status'] }}</pre>
                                                        </div>
                                                        <div class="">
                                                            <span>Deskripsi</span>
                                                            {{-- <pre class="whitespace-pre-wrap">:  {{ $update->parsed_new_data['Deskripsi'] }}</pre> --}}
                                                        </div>
                                                        <div class="rounded-md bg-gray-200 p-4 border border-dashed border-gray-900 mr-4 h-full">
                                                            {{ $update->parsed_new_data['Deskripsi'] }}
                                                        </div>
                                                    </div>

                                                    {{-- Carousel --}}
                                                    <div id="indicators-carousel-{{ $update->id }}" class="relative w-full" data-carousel="static">
                                                        <!-- Carousel wrapper -->
                                                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                                            @php
                                                                $data = json_decode($update->new_data, true);
                                                            @endphp

                                                            @foreach ($data['images_path'] as $image)
                                                                <div class="hidden duration-700 ease-in-out" data-carousel-item="{{ $loop->index === 0 ? 'active' : '' }}">
                                                                    <img src="{{ asset('storage/' . $image) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <!-- Slider indicators -->
                                                        <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                                                            @foreach ($data['images_path'] as $image)
                                                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide {{ $loop->iteration }}" data-carousel-slide-to="{{ $loop->index }}"></button>
                                                            @endforeach
                                                        </div>
                                                        <!-- Slider controls -->
                                                        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                                                </svg>
                                                                <span class="sr-only">Previous</span>
                                                            </span>
                                                        </button>
                                                        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                                                </svg>
                                                                <span class="sr-only">Next</span>
                                                            </span>
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        @break

                                        @case('campuses')
                                            @if (isset($update->old_data))
                                                <div>

                                                </div>
                                            @endif
                                            <div class="p-5">
                                                <h1 class="text-gray-900 text-xl font-semibold">Data Baru</h1>

                                                {{-- Grid --}}
                                                <div class="grid grid-cols-2 mt-4">

                                                    {{-- Left Side --}}
                                                    <div class="flex flex-col gap-4">
                                                        <div class="grid grid-cols-2">
                                                            <span>Nama</span>
                                                            <pre>:  {{ $update->parsed_new_data['Nama'] }}</pre>
                                                        </div>
                                                        <div class="grid grid-cols-2">
                                                            <span>Alamat</span>
                                                            <pre>:  {{ $update->parsed_new_data['Alamat'] }}</pre>
                                                        </div>
                                                        <div class="grid grid-cols-2">
                                                            <span>Kontak</span>
                                                            <pre>:  {{ $update->parsed_new_data['Kontak'] }}</pre>
                                                        </div>
                                                        <div class="grid grid-cols-2">
                                                            <span>Email</span>
                                                            <pre>:  {{ $update->parsed_new_data['Email'] }}</pre>
                                                        </div>
                                                        <div class="">
                                                            <span>Deskripsi</span>
                                                            {{-- <pre class="whitespace-pre-wrap">:  {{ $update->parsed_new_data['Deskripsi'] }}</pre> --}}
                                                        </div>
                                                        <div class="rounded-md bg-gray-200 p-4 border border-dashed border-gray-900 mr-4 h-full">
                                                            {{ $update->parsed_new_data['Deskripsi'] }}
                                                        </div>
                                                    </div>

                                                    {{-- Carousel --}}
                                                    <div id="indicators-carousel-{{ $update->id }}" class="relative w-full" data-carousel="static">
                                                        <!-- Carousel wrapper -->
                                                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                                            @php
                                                                $data = json_decode($update->new_data, true);
                                                            @endphp

                                                            @foreach ($data['images_path'] as $image)
                                                                <div class="hidden duration-700 ease-in-out" data-carousel-item="{{ $loop->index === 0 ? 'active' : '' }}">
                                                                    <img src="{{ asset('storage/' . $image) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <!-- Slider indicators -->
                                                        <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                                                            @foreach ($data['images_path'] as $image)
                                                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide {{ $loop->iteration }}" data-carousel-slide-to="{{ $loop->index }}"></button>
                                                            @endforeach
                                                        </div>
                                                        <!-- Slider controls -->
                                                        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                                                </svg>
                                                                <span class="sr-only">Previous</span>
                                                            </span>
                                                        </button>
                                                        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                                                </svg>
                                                                <span class="sr-only">Next</span>
                                                            </span>
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        @break

                                        @case('buildings')
                                            @if (isset($update->old_data))
                                            @endif
                                            <div class="p-5">
                                                <h1 class="text-gray-900 text-xl font-semibold">Data Baru</h1>

                                                {{-- Grid --}}
                                                <div class="grid grid-cols-2 mt-4">

                                                    {{-- Left Side --}}
                                                    <div class="flex flex-col gap-4">
                                                        <div class="grid grid-cols-2">
                                                            <span>Nama</span>
                                                            <pre>:  {{ $update->parsed_new_data['Nama'] }}</pre>
                                                        </div>
                                                        <div class="grid grid-cols-2">
                                                            <span>Kampus</span>
                                                            <pre>:  {{ $update->parsed_new_data['Kampus'] }}</pre>
                                                        </div>
                                                        <div class="grid grid-cols-2">
                                                            <span>Alamat</span>
                                                            <pre>:  {{ $update->parsed_new_data['Alamat'] }}</pre>
                                                        </div>
                                                        <div class="grid grid-cols-2">
                                                            <span>Luas</span>
                                                            <pre>:  {{ $update->parsed_new_data['Luas'] }}</pre>
                                                        </div>
                                                        <div class="grid grid-cols-2">
                                                            <span>Lantai</span>
                                                            <pre>:  {{ $update->parsed_new_data['Lantai'] }}</pre>
                                                        </div>
                                                        <div class="">
                                                            <span>Deskripsi</span>
                                                            {{-- <pre class="whitespace-pre-wrap">:  {{ $update->parsed_new_data['Deskripsi'] }}</pre> --}}
                                                        </div>
                                                        <div class="rounded-md bg-gray-200 p-4 border border-dashed border-gray-900 mr-4 h-full">
                                                            {{ $update->parsed_new_data['Deskripsi'] }}
                                                        </div>
                                                    </div>

                                                    {{-- Carousel --}}
                                                    <div id="indicators-carousel-{{ $update->id }}" class="relative w-full" data-carousel="static">
                                                        <!-- Carousel wrapper -->
                                                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                                            @php
                                                                $data = json_decode($update->new_data, true);
                                                            @endphp

                                                            @foreach ($data['images_path'] as $image)
                                                                <div class="hidden duration-700 ease-in-out" data-carousel-item="{{ $loop->index === 0 ? 'active' : '' }}">
                                                                    <img src="{{ asset('storage/' . $image) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <!-- Slider indicators -->
                                                        <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                                                            @foreach ($data['images_path'] as $image)
                                                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide {{ $loop->iteration }}" data-carousel-slide-to="{{ $loop->index }}"></button>
                                                            @endforeach
                                                        </div>
                                                        <!-- Slider controls -->
                                                        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                                                </svg>
                                                                <span class="sr-only">Previous</span>
                                                            </span>
                                                        </button>
                                                        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                                                </svg>
                                                                <span class="sr-only">Next</span>
                                                            </span>
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        @break
                                    @endswitch
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@script
    {{-- <script>
        Livewire.hook('component.init', ({ component, el }) => {
            initFlowbite();
        });
    </script> --}}

    {{-- <script>
        document.addEventListener("livewire:load", () => {
            Livewire.hook('message.processed', (message, component) => {
                // Re-initialize modals here
                // Example if using Flowbite:
                const modalToggles = document.querySelectorAll('[data-modal-toggle]');
                modalToggles.forEach(toggle => {
                    // Manually add click event or re-init library if needed
                    // Example for Flowbite: no need if using Flowbite’s auto-bind
                });
            });
        });
    </script> --}}
@endscript

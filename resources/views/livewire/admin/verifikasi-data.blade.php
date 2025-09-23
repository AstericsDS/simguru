<div class="text-black">

    {{-- Title --}}
    <h1 class="text-2xl font-medium">Daftar Pengajuan</h1>

    {{-- Content --}}
    <div class="rounded-md mt-4">

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
        <div class="relative overflow-x-auto shadow-md rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 table-auto">
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
                                <button wire:click='sortDate' class="cursor-pointer">
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </button>
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
                            <td class="px-6 py-4">{{ $update->created_at->locale('id')->translatedFormat('l, d F Y') }}</td>
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
                                    <button wire:click='view({{ $update->id }})' type="button" class="transition-all cursor-pointer hover:text-blue-500 hover:bg-gray-300 rounded-xl p-2 mx-auto">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    @if ($update->status === 'pending')
                                        <button @click="$dispatch('confirm', {id: {{ $update->id }}, action: 'accept'})" class="border border-green-500 size-8 rounded-xl cursor-pointer hover:bg-green-500 hover:text-white transition-all">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                        <button @click="$dispatch('confirm', {id: {{ $update->id }}, action: 'reject'})" class="border border-red-500 size-8 rounded-xl cursor-pointer hover:bg-red-500 hover:text-white transition-all">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- View Modal -->
        <div x-data="{ state: false, active: 'new' }" @view.window="state = !state" @keydown.window.escape="state = false">
            <div x-show="state" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="opacity-0">
                <div x-show="state" @click.outside="state = false" class="relative bg-white max-h-screen overflow-y-auto rounded-lg shadow-sm w-5xl opacity-100 z-50" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="scale-50" x-transition:enter-end="scale-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="scale-50">

                    {{-- Content --}}
                    <div class="px-8 py-6">

                        {{-- Header --}}
                        <div class="flex items-center justify-between border-b rounded-t border-gray-200">
                            <div class="flex gap-12">
                                <button @click="active = 'new'" :class="active === 'new' ? 'text-gray-900' : 'text-gray-500'" class="text-lg font-semibold cursor-pointer transition-all">Data Baru</button>
                                @if (isset($selectedUpdate->old_data))
                                    <button @click="active = 'old'" :class="active === 'old' ? 'text-gray-900' : 'text-gray-500'" class="text-lg font-semibold cursor-pointer transition-all">Data Lama</button>
                                @endif
                            </div>
                            <button @click="state = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center transition-all hover:cursor-pointer">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>

                        @if (isset($selectedUpdate))

                            {{-- Data --}}
                            <div class="mt-6 gap-x-6" :class="active == 'new' ? 'grid grid-cols-2' : ''">
                                <div x-show="active === 'new'" x-transition:enter.duration.250ms>
                                    @foreach ($selectedUpdate->parsed_new_data ?? [] as $key => $value)
                                        @if ($key !== 'Deskripsi')
                                            <div class="grid grid-cols-2 mb-2">
                                                <span>{{ $key }}</span>
                                                <div class="flex gap-4">
                                                    <span>:</span>
                                                    <span>{{ $value }}</span>
                                                </div>
                                            </div>
                                        @else
                                            <div>{{ $key }}</div>
                                            <div class="rounded-md bg-gray-200 p-4 border border-gray-900 mt-4">{{ $value }}</div>
                                        @endif
                                    @endforeach
                                </div>

                                @if (isset($selectedUpdate->old_data))
                                    <div x-show="active === 'old'" x-transition:enter.duration.250ms>
                                        @foreach ($selectedUpdate->parsed_old_data ?? [] as $key => $value)
                                            @if ($key !== 'Deskripsi')
                                                <div class="grid grid-cols-2 mb-2">
                                                    <span>{{ $key }}</span>
                                                    <div class="flex gap-4">
                                                        <span>:</span>
                                                        <span>{{ $value }}</span>
                                                    </div>
                                                </div>
                                            @else
                                                <div>{{ $key }}</div>
                                                <div class="rounded-md bg-gray-200 p-4 border border-gray-900 mt-4">{{ $value }}</div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif

                                {{-- Images --}}
                                <div x-show="active === 'new'" x-transition:enter.duration.250ms>
                                    <div class="carousel w-full rounded-md">
                                        @foreach ($new_data['images_path'] as $image)
                                            <div id="item{{ $loop->iteration }}" class="carousel-item w-full">
                                                <img src="{{ asset('storage/' . $image) }}" class="w-full" />
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="flex w-full justify-center gap-2 py-2">
                                        @foreach ($new_data['images_path'] as $image)
                                            <a href="#item{{ $loop->iteration }}" class="btn btn-md">{{ $loop->iteration }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        {{-- Confirm Modal --}}
        <div x-data="{ state: false, confirmData: { id: null, action: null } }" @confirm.window="state = !state; confirmData = $event.detail" @keydown.window.escape="state = false">
            <div x-show="state" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="opacity-0">
                <div x-show="state" @click.outside="state = false" class="relative bg-white max-h-screen overflow-y-auto rounded-lg shadow-sm w-2xl p-2 opacity-100 z-50" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="scale-50" x-transition:enter-end="scale-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="scale-50">


                    <div x-show="confirmData.action === 'accept'" class="flex flex-col items-center py-8">
                        <i class="fa-solid fa-circle-exclamation text-gray-500 text-8xl"></i>
                        <p class="pt-6 pb-12 text-2xl text-gray-600">Apakah anda yakin?</p>
                        <div class="flex gap-6">
                            <button @click="$wire.confirm(confirmData.id, confirmData.action); state = false" class="px-8 py-2 rounded-md bg-green-400 hover:bg-green-500 transition-all cursor-pointer text-white text-xl">Iya</button>
                            <button @click="$dispatch('confirm')" class="px-8 py-2 rounded-md border-2 border-red-300  hover:bg-red-400 hover:border-red-400 transition-all cursor-pointer text-xl hover:text-white">Tidak</button>
                        </div>
                    </div>

                    <div x-show="confirmData.action === 'reject'" class="flex flex-col items-center py-8">
                        <i class="fa-solid fa-circle-exclamation text-gray-500 text-8xl"></i>
                        <p class="pt-6 pb-12 text-2xl text-gray-600">Apakah anda yakin?</p>
                        <div class="flex gap-6">
                            <button @click="$wire.confirm(confirmData.id, confirmData.action)" class="px-8 py-2 rounded-md bg-green-400 hover:bg-green-500 transition-all cursor-pointer text-white text-xl">Iya</button>
                            <button @click="$dispatch('confirm')" class="px-8 py-2 rounded-md border-2 border-red-300  hover:bg-red-400 hover:border-red-400 transition-all cursor-pointer text-xl hover:text-white">Tidak</button>
                        </div>
                        <div class="w-3/4">
                            <form class="w-full text-center mt-8">
                                <textarea wire:model.live='reject_reason' class="w-full rounded-md p-4 {{$errors->has('reject_reason') ? 'border-red-500' : ''}}" placeholder="Tulis alasan penolakan"></textarea>
                            </form>
                            @error('reject_reason')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="mt-4">
            {{ $updates->links() }}
        </div>

    </div>

</div>

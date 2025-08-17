<div class="text-black">
    {{-- Title --}}
    <h1 class="text-2xl font-medium">Daftar Gedung</h1>

    {{-- Content --}}
    <div class="mt-4">

        <div class="flex justify-between items-center">

            {{-- Search --}}
            <div x-data @keyup.window="if ($event.ctrlKey && $event.key === '/') {$refs.searchInput.focus()}" class="relative w-96">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 cursor-pointer">
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                </span>

                <input wire:model.live="search" x-ref="searchInput" @keydown.escape="$refs.searchInput.blur()" type="text" class="border border-gray-300 rounded-lg px-3 py-2 w-full pl-12 pr-[88px] focus:outline-none focus:ring-unj text-black transition-all" placeholder="Cari gedung">

                <div class="absolute right-4 text-gray-500 top-1/2 -translate-y-1/2 flex gap-1">
                    <div class="border px-2 py-1 border-gray-500 rounded-md flex items-center justify-center">
                        <span class="text-xs">CTRL</span>
                    </div>
                    <div class="border p-2 py-1 border-gray-500 rounded-md flex items-center justify-center">
                        <span class="text-xs">/</span>
                    </div>
                </div>
            </div>

            {{-- Add --}}
            <button @click="$dispatch('modal')" class="rounded-xl border border-gray-300 size-10 flex items-center justify-center group hover:px-2 hover:w-[100px] transition-all cursor-pointer hover:bg-unj hover:border-unj hover:text-white hover:rounded-lg overflow-hidden duration-200">
                <i class="fa-solid fa-plus"></i>
                <span class="hidden group-hover:inline transition-all font-semibold ml-2">Tambah</span>
            </button>

        </div>

        <!-- Main modal -->
        <div x-data="{ state: false }" @modal.window="state = !state" @keydown.window.escape="state = false">
            <div x-show="state" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="opacity-0">
                <div x-show="state" @click.outside="state = false" class="relative bg-white max-h-screen overflow-y-auto rounded-lg shadow-sm w-2xl p-2 opacity-100 z-50" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="scale-50" x-transition:enter-end="scale-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="scale-50">

                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Tambah Gedung
                        </h3>
                        <button @click="state = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center transition-all hover:cursor-pointer">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <form wire:submit.prevent='save' class="p-4 md:p-5">

                        {{-- Input --}}
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium">Nama</label>
                                <input wire:model.live="name" type="text" id="name" class="bg-gray-50 border focus:outline-none focus:ring-unj transition-all text-gray-900 text-sm rounded-lg block w-full p-2.5 {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}">
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="campus" class="block mb-2 text-sm font-medium {{ $errors->has('campus_id') ? 'text-red-700' : 'text-gray-900' }}">Lokasi Kampus</label>
                                <select wire:model="campus_id" id="campus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 {{ $errors->has('campus_id') ? 'border-red-500' : 'border-gray-300' }}">
                                    <option disabled>Pilih Kampus</option>
                                    @foreach ($campuses as $campus)
                                        <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                    @endforeach
                                </select>
                                @error('campus_id')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="address" class="block mb-2 text-sm font-medium">Alamat</label>
                                <input wire:model="address" type="text" id="address" class="bg-gray-50 border focus:outline-none focus:ring-unj transition-all text-gray-900 text-sm rounded-lg block w-full p-2.5 {{ $errors->has('address') ? 'border-red-500' : 'border-gray-300' }}">
                                @error('address')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="floor" class="block mb-2 text-sm font-medium">Jumlah Lantai</label>
                                <input wire:model="floor" type="text" id="floor" class="bg-gray-50 border focus:outline-none focus:ring-unj transition-all text-gray-900 text-sm rounded-lg block w-full p-2.5 {{ $errors->has('floor') ? 'border-red-500' : 'border-gray-300' }} }}">
                                @error('floor')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="area" class="block mb-2 text-sm font-medium">Luas</label>
                                <input wire:model="area" type="text" id="area" class="bg-gray-50 border focus:outline-none focus:ring-unj transition-all text-gray-900 text-sm rounded-lg block w-full p-2.5 {{ $errors->has('area') ? 'border-red-500' : 'border-gray-300' }} }}">
                                @error('area')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900" for="images">Upload Foto</label>
                                <input wire:model='images_path' id="images" multiple class="block w-full text-sm text-gray-900 border rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-unj transition-all {{ $errors->has('images_path') ? 'border-red-500' : 'border-gray-300' }}" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                @error('images_path')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium">Deskripsi</label>
                                <textarea wire:model="description" id="description" rows="4" class="bg-gray-50 border focus:outline-none focus:ring-unj transition-all text-gray-900 text-sm rounded-lg block w-full p-2.5 {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}"></textarea>
                                @error('description')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div @close-modal.window="state = false" class="flex justify-end mt-8">
                            <button type="submit" class="px-4 py-2 text-gray-900 font-semibold border-3 border-unj rounded-lg cursor-pointer hover:bg-unj hover:text-white transition-all focus:outline-none focus:bg-unj focus:text-white">
                                Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        {{-- Classic --}}
                        {{-- <th scope="col" class="px-6 py-3">
                            Product name
                        </th> --}}

                        {{-- Sortable --}}
                        {{-- <th scope="col" class="px-6 py-3"> --}}
                        {{-- <div class="flex items-center"> --}}
                        {{-- Color --}}
                        {{-- <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th> --}}

                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lokasi Kampus
                        </th>
                        <th scope="col" class="px-6 py-3 w-[500px]">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Lantai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Luas
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buildings as $building)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if (in_array($building->id, $rejected_buildings))
                                    <div class="flex items-center gap-2">
                                        <span class="text-red-500">{{ $building->name }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#F44336" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                        </svg>
                                    </div>
                                @else
                                    {{ $building->name }}
                                @endif
                            </th>
                            <td class="px-6 py-4">
                                {{ $building->campus->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $building->address }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $building->floor }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $building->area }}
                            </td>
                            <td class="px-6 py-4">
                                <button wire:click='view({{ $building->id }})' type="button" class="transition-all cursor-pointer hover:text-blue-500 hover:bg-gray-300 rounded-xl p-2 mx-auto" data-tip="Gambar">
                                    <i class="fa-solid fa-images"></i>
                                </button>
                                @if ($building->admin_id === Auth::id())
                                    <a href="{{ route('edit-gedung', $building->id) }}" wire:navigate class="transition-all cursor-pointer rounded-xl p-2 mx-auto {{ in_array($building->id, $rejected_buildings) ? 'text-red-500 hover:bg-red-200 tooltip tooltip-error' : 'hover:text-yellow-900 hover:bg-yellow-200' }}" data-tip="Perubahan ditolak">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- View modal -->
    <div x-data="{ state: false }" @view.window="state = !state" @keydown.window.escape="state = false">
        <div x-show="state" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="opacity-0">
            <div x-show="state" @click.outside="state = false" class="relative bg-white max-h-screen overflow-y-auto rounded-lg shadow-sm w-5xl opacity-100 z-50" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="scale-50" x-transition:enter-end="scale-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="scale-50">

                <!-- Modal header -->
                <div class="flex items-center justify-between border-b rounded-t border-gray-200 p-8 pb-6">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Gambar Gedung
                    </h3>
                    <button @click="state = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center transition-all hover:cursor-pointer">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-8 pt-0 tooltip tooltip-accent w-full" data-tip="Scroll untuk melihat">
                    <div class="carousel carousel-vertical rounded-box h-[500px] w-full">
                        @foreach ($buildingImages as $image)
                            <div class="carousel-item h-full">
                                <img src="{{ asset('storage/' . $image) }}" alt="campus" class="w-full object-cover rounded-md">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Toast --}}
    <div x-data="{ state: false, 'status': '', 'message': '' }" x-show="state" @toast.window="state = true; status = $event.detail.status; message = $event.detail.message; setTimeout( () => state = false, 3000 )" :class="{ 'bg-green-100': status === 'success', 'bg-red-100': status === 'fail' }" x-transition:enter="transform transition ease-in-out duration-1000" x-transition:enter-start="-translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100" x-transition:leave="transform transition ease-in-out duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="-translate-x-5/4 opacity-0" class="fixed bottom-5 left-5 flex w-fit z-30 p-4 rounded-md shadow-lg items-center gap-4">

        {{-- Success Logo --}}
        <div :class="status === 'success' ? 'inline-flex' : 'hidden'" class="items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
            </svg>
            <span class="sr-only">Check icon</span>
        </div>

        {{-- Failed Logo --}}
        <div :class="status === 'fail' ? 'inline-flex' : 'hidden'" class="items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
            </svg>
            <span class="sr-only">Error icon</span>
        </div>

        {{-- Message --}}
        <div x-text="message"></div>

        {{-- Close Button --}}
        <button @click="state = false" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700 cursor-pointer transition-all">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>

    </div>
</div>

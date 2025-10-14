<div class="text-black">
    {{-- Title --}}
    <h1 class="text-2xl font-medium">Daftar Ruang</h1>

    {{-- Content --}}
    <div class="mt-4">

        <div class="flex justify-between items-center">

            <div class="flex gap-3 items-center">
                {{-- Search --}}
                <div x-data @keyup.window="if ($event.ctrlKey && $event.key === '/') {$refs.searchInput.focus()}" class="relative w-96">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 cursor-pointer">
                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    </span>

                    <input wire:model.live="search" x-ref="searchInput" @keydown.escape="$refs.searchInput.blur()" type="text" class="border border-gray-300 rounded-lg px-3 py-2 w-full pl-12 pr-[88px] focus:outline-none focus:ring-primary text-black transition-all" placeholder="Cari ruang">

                    <div class="absolute right-4 text-gray-500 top-1/2 -translate-y-1/2 flex gap-1">
                        <div class="border px-2 py-1 border-gray-500 rounded-md flex items-center justify-center">
                            <span class="text-xs">CTRL</span>
                        </div>
                        <div class="border p-2 py-1 border-gray-500 rounded-md flex items-center justify-center">
                            <span class="text-xs">/</span>
                        </div>
                    </div>
                </div>

                {{-- Pending Toggle --}}
                <div x-data="{ state: false }" @click="state = !state; $dispatch('pending-toggle', state)" :class="state == true ? 'bg-yellow-300 border-yellow-300 text-white' : 'border-gray-300 text-gray-500'" class="border py-2 px-3 rounded-md hover:bg-yellow-300 active:bg-yellow-400 hover:border-yellow-300 transition-all hover:text-white cursor-pointer">
                    <i class="fa-regular fa-clock"></i>
                </div>
            </div>

            {{-- Add --}}
            <button @click="$dispatch('modal')" class="rounded-xl border border-gray-300 size-10 flex items-center justify-center group hover:px-2 hover:w-[100px] transition-all cursor-pointer hover:bg-primary hover:border-primary hover:text-white hover:rounded-lg overflow-hidden duration-200">
                <i class="fa-solid fa-plus"></i>
                <span class="hidden group-hover:inline transition-all font-semibold ml-2">Tambah</span>
            </button>

        </div>

        <!-- Main modal -->
        <div x-data="{ state: false, toggle: 'form', switchView() { this.toggle = (this.toggle === 'form' ? 'inventory' : 'form') } }" @modal.window="state = !state" @keydown.window.escape="state = false">
            <div x-show="state" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="opacity-0">
                <div x-show="state" @click.outside="state = false" class="relative bg-white max-h-[90%] overflow-y-auto rounded-lg shadow-sm w-3xl p-2 opacity-100 z-50" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="scale-50" x-transition:enter-end="scale-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="scale-50">

                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-5 border-b rounded-t border-gray-200">
                        <div class="flex space-x-4 items-center">
                            <h3 class="text-lg font-semibold text-gray-900">Tambah Ruang</h3>
                            <div @click="switchView()" class="px-3 py-1 border-2 border-primary hover:bg-primary hover:text-white rounded-md cursor-pointer flex items-center gap-2 transition-all" :class="toggle === 'inventory' ? 'bg-primary text-white' : ''">
                                <i class="fa-solid fa-boxes-stacked"></i>
                                <div class="flex space-x-2 items-center">
                                    <span class="font-semibold">Inventaris</span>
                                    @error('inventory.*.name')
                                        <i class="fa-solid fa-exclamation text-red-500 text-lg"></i>
                                    @enderror
                                    @error('inventory.*.quantity')
                                        <i class="fa-solid fa-exclamation text-red-500 text-lg"></i>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button @click="state = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center transition-all hover:cursor-pointer">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Form Input -->
                    <form x-show="toggle === 'form'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" wire:submit.prevent='save' class="p-5">

                        {{-- Input --}}
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium">Nama Ruang</label>
                                <input wire:model.live="name" type="text" id="name" class="bg-gray-50 border focus:outline-none focus:ring-primary transition-all text-gray-900 text-sm rounded-lg block w-full p-2.5 {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}">
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="campus" class="block mb-2 text-sm font-medium text-gray-900">Lokasi
                                    Kampus</label>
                                <select wire:model.change='campus_id' id="campus" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 {{ $errors->has('campus_id') ? 'border-red-500' : 'border-gray-300' }}">
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
                                <label for="building" class="block mb-2 text-sm font-medium text-gray-900">Lokasi
                                    Gedung</label>
                                <select wire:model.change='building_id' id="building" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 {{ $errors->has('building_id') ? 'border-red-500' : 'border-gray-300' }}">
                                    <option disabled>Pilih Gedung</option>
                                    @foreach ($buildings as $building)
                                        <option value="{{ $building->id }}">{{ $building->name }}</option>
                                    @endforeach
                                </select>
                                @error('building_id')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Lokasi
                                    Lantai</label>
                                <select wire:model='floor' id="category" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 {{ $errors->has('floor') ? 'border-red-500' : 'border-gray-300' }}">
                                    <option disabled>Pilih Lantai</option>
                                    @for ($i = 1; $i <= $floor; $i++)
                                        <option value="{{ $i }}">Lantai {{ $i }}</option>
                                    @endfor
                                </select>
                                @error('floor')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="area" class="block mb-2 text-sm font-medium">Luas</label>
                                <input wire:model="area" type="text" id="area" class="bg-gray-50 border focus:outline-none focus:ring-primary transition-all text-gray-900 text-sm rounded-lg block w-full p-2.5 {{ $errors->has('area') ? 'border-red-500' : 'border-gray-300' }} }}">
                                @error('area')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="capacity" class="block mb-2 text-sm font-medium">Kapasitas</label>
                                <input wire:model="capacity" type="text" id="capacity" class="bg-gray-50 border focus:outline-none focus:ring-primary transition-all text-gray-900 text-sm rounded-lg block w-full p-2.5 {{ $errors->has('capacity') ? 'border-red-500' : 'border-gray-300' }} }}">
                                @error('capacity')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                                <select wire:model='category' class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 {{ $errors->has('category') ? 'border-red-500' : 'border-gray-300' }}">
                                    <option disabled>Pilih Kategori</option>
                                    <option value="class">Kelas</option>
                                    <option value="office">Kantor</option>
                                    <option value="laboratory">Laboratorium</option>
                                    <option value="rentable">Umum (disewakan)</option>
                                    <option value="non_rentable">Umum (tidak disewakan)</option>
                                </select>
                                @error('category')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload
                                    Foto</label>
                                <input wire:model='images_path' multiple class="block w-full text-sm text-gray-900 border rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-primary transition-all {{ $errors->has('images_path') || $errors->has('images_path.*') ? 'border-red-500' : 'border-gray-300' }}" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                @error('images_path')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                                @error('images_path.*')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload Dokumen</label>
                                <input wire:model='documents_path' multiple class="block w-full text-sm text-gray-900 border rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-primary transition-all {{ $errors->has('documents_path') || $errors->has('documents_path.*') ? 'border-red-500' : 'border-gray-300' }}" type="file">
                                @error('documents_path')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                                @error('documents_path.*')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium">Deskripsi</label>
                                <textarea wire:model="description" id="description" rows="4" class="bg-gray-50 border focus:outline-none focus:ring-primary transition-all text-gray-900 text-sm rounded-lg block w-full p-2.5 {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}"></textarea>
                                @error('description')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div @close-modal.window="state = false" class="flex justify-end mt-8">
                            <button type="submit" wire:loading.attr="disabled" wire:target="images_path,documents_path,save" class="px-4 py-2 text-gray-900 font-semibold border-2 border-primary rounded-lg cursor-pointer hover:bg-primary hover:text-white transition-all focus:outline-none focus:bg-primary focus:text-white">
                                <span wire:loading.remove wire:target="images_path,documents_path,save">
                                    Simpan
                                </span>
                                <span wire:loading wire:target="images_path,documents_path,save">
                                    Mengupload...
                                </span>
                            </button>
                        </div>
                    </form>

                    {{-- Inventory Input --}}
                    <div x-data="{ items: @entangle('inventory'), addItem() { this.items.push({ name: '', quantity: 1 }) } }" class="p-5" x-show="toggle === 'inventory'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                        <h2 class="text-xl font-semibold mb-4 text-gray-900">Inventaris Ruangan</h2>

                        <div class="flex flex-col space-y-2">

                            <div class="text-red-500 mb-2 flex flex-col">
                                @error('inventory.*.name')
                                    <span>{{ $message }}</span>
                                @enderror
                                @error('inventory.*.quantity')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <template x-for="(item, index) in items" :key="index">
                                <div class="flex space-x-4 mb-3 items-center">
                                    <input type="text" x-model="item.name" placeholder="Nama Barang" class="flex-1 p-2 border border-primary rounded-md focus:outline-none focus:ring-primary transition-all">

                                    <input type="number" min="1" x-model.number="item.quantity" placeholder="Kuantitas" class="w-24 p-2 border border-primary rounded-md text-center focus:outline-none focus:ring-primary transition-all">

                                    <button @click="items.splice(index, 1)" class="p-2 text-red-600 hover:text-red-800 transition duration-150 cursor-pointer" title="Remove Item" x-show="items.length > 1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </template>
                            {{-- <pre class="mt-4 p-2 bg-gray-200 rounded-md text-sm">Data: <span x-text="JSON.stringify(items, null, 2)"></span></pre> --}}
                        </div>

                        <hr class="my-4 border-gray-300">

                        <button @click="addItem()" class="flex space-x-1 items-center px-4 py-2 bg-primary text-white font-semibold rounded-md hover:bg-unj-dark transition duration-150 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            <span>Tambah</span>
                        </button>

                    </div>

                </div>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Ruang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lokasi Kampus
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lokasi Gedung
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lantai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kapasitas
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Luas
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Ruang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Files
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody x-data="{ state: true }" x-show="state" @pending-toggle.window="state = !$event.detail">
                    @foreach ($rooms as $room)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if (in_array($room->id, $rejected_rooms))
                                    <div class="flex items-center gap-2">
                                        <span class="text-red-500">{{ $room->name }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#F44336" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                        </svg>
                                    </div>
                                @else
                                    {{ $room->name }}
                                @endif
                            </th>
                            <td class="px-6 py-4">
                                {{ $room->building->campus->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $room->building->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $room->floor }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $room->capacity }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $room->area }}m<sup>2</sup>
                            </td>
                            <td class="px-6 py-4">
                                @if ($room->category === 'class')
                                    <span class="px-2 py-1 rounded-lg bg-[#007BFF] text-white">Kelas</span>
                                @elseif ($room->category === 'office')
                                    <span class="px-2 py-1 rounded-lg bg-[#17A2B8] text-white">Kantor</span>
                                @elseif ($room->category === 'laboratory')
                                    <span class="px-2 py-1 rounded-lg bg-[#6F42C1] text-white">Laboratorium</span>
                                @elseif ($room->category === 'rentable')
                                    <span class="px-2 py-1 rounded-lg bg-[#28A745] text-white">Umum (disewakan)</span>
                                @elseif ($room->category === 'non_rentable')
                                    <span class="px-2 py-1 rounded-lg bg-[#FFC107] text-white">Umum (tidak disewakan)</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <button wire:click='view({{ $room->id }})' type="button" class="transition-all cursor-pointer hover:text-primary hover:bg-primary-light rounded-xl p-2 mx-auto" data-tip="Gambar">
                                    <i class="fa-solid fa-images"></i>
                                </button>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('view-ruang', $room->slug) }}" wire:navigate>
                                        <button class="transition-all cursor-pointer hover:text-blue-500 hover:bg-gray-300 rounded-xl p-2 mx-auto">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </a>
                                    @if ($room->admin_id === Auth::id())
                                        <a href="{{ route('edit-ruang', $room->slug) }}" wire:navigate class="transition-all cursor-pointer rounded-xl p-2 mx-auto {{ in_array($room->id, $rejected_rooms) ? 'text-red-500 hover:bg-red-200 tooltip tooltip-error' : 'hover:text-yellow-900 hover:bg-yellow-200' }}" data-tip="Perubahan ditolak">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <button wire:click='deleteModal({{ $room->id }})' class="hover:text-red-500 hover:bg-red-200 p-2 rounded-xl transition-all cursor-pointer">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tbody x-data="{ state: false }" x-show="state" @pending-toggle.window="state = $event.detail">
                    {{-- Pending Entry --}}
                    @foreach ($updates as $update)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($update->status === 'rejected')
                                    <div class="flex items-center gap-2">
                                        <span class="text-red-500">{{ $update->new_data['name'] }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#F44336" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                        </svg>
                                    </div>
                                @else
                                    <div class="flex gap-2 items-center">
                                        <span class="text-yellow-500">{{ $update->new_data['name'] }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#EAB308" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </div>
                                @endif
                            </th>
                            <td class="px-6 py-4">
                                {{ $update->new_data['campus'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $update->new_data['building'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $update->new_data['floor'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $update->new_data['capacity'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $update->new_data['area'] }}m<sup>2</sup>
                            </td>
                            <td class="px-6 py-4">
                                @if ($update->new_data['category'] === 'class')
                                    <span class="px-2 py-1 rounded-lg bg-primary text-white">Kelas</span>
                                @elseif ($update->new_data['category'] === 'not_class')
                                    <span class="px-2 py-1 rounded-lg bg-[#690000] text-white">Bukan Kelas</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <button wire:click='viewPending({{ $update->id }})' type="button" class="transition-all cursor-pointer hover:text-primary hover:bg-primary-light rounded-xl p-2 mx-auto" data-tip="Gambar">
                                    <i class="fa-solid fa-images"></i>
                                </button>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2 items-center">
                                    <a href="{{ route('view-ruang', $update->id) }}" wire:navigate>
                                        <button class="transition-all cursor-pointer hover:text-blue-500 hover:bg-gray-300 rounded-xl p-2 mx-auto">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </a>
                                    @if ($update->admin_id === Auth::id())
                                        <a href="{{ route('edit-ruang', $update->id) }}" wire:navigate class="transition-all cursor-pointer rounded-xl p-2 mx-auto {{ $update->status == 'rejected' ? 'text-red-500 hover:bg-red-200 tooltip tooltip-error' : 'hover:text-yellow-900 hover:bg-yellow-200' }}" data-tip="Perubahan ditolak">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    @endif
                                </div>
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
                        Gambar Ruang
                    </h3>
                    <button @click="state = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center transition-all hover:cursor-pointer">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-8 pt-0 tooltip tooltip-accent w-full" data-tip="Scroll untuk melihat gambar">
                    <div class="carousel carousel-vertical rounded-box h-[500px] w-full">
                        @foreach ($room_images as $image)
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

    <!-- Confirm modal -->
    <div x-data="{ state: false }" @confirm-delete.window="state = !state" @keydown.window.escape="state = false">
        <div x-show="state" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="opacity-0">
            <div x-show="state" @click.outside="state = false" class="relative bg-white max-h-screen overflow-y-auto rounded-lg shadow-sm w-2xl p-2 opacity-100 z-50" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="scale-50" x-transition:enter-end="scale-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="scale-50">

                <div class="flex flex-col items-center py-8">
                    <i class="fa-solid fa-circle-exclamation text-gray-500 text-8xl"></i>
                    <p class="pt-6 pb-12 text-2xl text-gray-600">Apakah anda yakin?</p>
                    <div class="flex gap-6">
                        <button wire:click='deleteRoom' class="px-8 py-2 rounded-md bg-primary hover:bg-unj-dark transition-all cursor-pointer text-white text-xl">Iya</button>
                        <button @click="$dispatch('confirm-delete')" class="px-8 py-2 rounded-md border-2 border-red-600  hover:bg-red-700 hover:border-red-700 transition-all cursor-pointer text-xl hover:text-white">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

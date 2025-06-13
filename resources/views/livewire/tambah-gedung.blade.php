{{-- Tambah Gedung --}}

<div class="container mt-4">
    {{-- Judul halaman --}}
    <div class="flex flex-col gap-4 justify-center text-center items-center mb-6 mt-6">
        <span class="text-2xl font-bold text-gray-800 leading-none">
            Daftar Gedung UNJ <br>
            <span class="text-sm font-semibold text-gray-800">
                Daftar gedung yang terdaftar di UNJ (Klik "Tambah" untuk menambah gedung)
            </span>
        </span>
        @if (session()->has('message'))
            <span class="bg-green-200 text-green-700 p-4 rounded-md">
                {{ session('message') }}
            </span>
        @endif
    </div>
    <div class="flex justify-between items-center mb-3">
        <div class="relative w-64">
            <input wire:model.live="searchBar" type="text" class="border border-gray-300 rounded-lg px-3 py-2 w-full pr-10 focus:outline-none focus:ring-2 focus:ring-teal-700 text-black" placeholder="Cari gedung">
            <span class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-500 cursor-pointer">
                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                </svg>
            </span>
        </div>
        <!-- Modal toggle -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="btn text-white bg-teal-700 px-4 py-2 rounded-md flex items-center gap-2 hover:bg-teal-800 focus:ring-4 focus:outline-none font-bold text-sm text-center shadow-none border-none" type="button">
            Tambah
        </button>
        <!-- Main modal -->
        <div wire:ignore.self id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm p-2">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Tambah Gedung
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:cursor-pointer hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center transition-all" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Gedung</label>
                                <input wire:model="name" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="category" class="block mb-2 text-sm font-medium {{ $errors->has('floor') ? 'text-red-700' : 'text-gray-900' }}">Lokasi Kampus</label>
                                <select wire:model="campus_id" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 {{ $errors->has('floor') ? 'border-red-500' : 'border-gray-300' }}">
                                    <option selected="" disabled>Pilih Kampus</option>
                                    @foreach ($campuses as $campus)
                                        <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                    @endforeach
                                </select>
                                @error('campus_id')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Alamat Gedung</label>
                                <input wire:model="address" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium {{ $errors->has('floor') ? 'text-red-700' : 'text-gray-900' }}">Jumlah Lantai</label>
                                <input wire:model="floor" type="text" name="name" id="name" class="bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 {{ $errors->has('floor') ? 'border-red-500' : 'border-gray-300' }}" placeholder="" required="">
                                @error('floor')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium {{ $errors->has('area') ? 'text-red-700' : 'text-gray-900' }}">Luas Gedung (m2)</label>
                                <input wire:model="area" type="text" name="name" id="name" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 {{ $errors->has('area') ? 'border-red-500' : 'border-gray-300' }}" placeholder="" required="">
                                @error('area')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload Foto Gedung</label>
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                            </div>
                            <div class="col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Gedung</label>
                                <textarea wire:model="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" wire:click.prevent="store" class="text-white inline-flex items-center bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer transition-all">
                                Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="bg-white text-black border border-gray-300 table table-bordered rounded-md">
            <thead class="bg-teal-700 text-white text-center table-success">
                <tr>
                    <th width="70px">No</th>
                    <th width="200px">Nama Gedung</th>
                    <th>Lokasi Kampus</th>
                    <th width="500px">Alamat Gedung</th>
                    <th width="100px">Jumlah Lantai</th>
                    <th width="100px">Area</th>
                    <th width="100px">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white text-black text-center">
                @foreach ($buildings as $index => $building)
                    <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-green-100' : 'bg-white' }}">
                        <td>{{ $buildings->firstItem() + $index }}</td>
                        <td>{{ $building->name }}</td>
                        <td>{{ $building->campus->name }}</td>
                        <td>{{ $building->address }}</td>
                        <td>{{ $building->floor }}</td>
                        <td>{{ $building->area }}</td>
                        <td class="flex gap-2 justify-center">
                            <a href="" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 font-medium rounded-lg text-sm size-12 flex justify-center items-center transition-all">
                                <span class="material-symbols-rounded" style="font-size: 20px; font-weight: bold;">
                                    edit
                                </span>
                            </a>
                            <a href="" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 font-medium rounded-lg text-sm size-12 flex justify-center items-center transition-all">
                                <span class="material-symbols-rounded" style="font-size: 20px; font-weight: bold;">
                                    visibility
                                </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                <div class="bg-white">
                    {{ $buildings->links('pagination::tailwind') }}
                </div>
            </tbody>
        </table>
    </div>
</div>

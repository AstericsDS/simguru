{{-- Tambah Kampus --}}

<div class="mt-4">
    {{-- Judul halaman --}}
    <div class="flex flex-col justify-center text-center items-center mt-6">
        <span class="text-2xl font-bold text-gray-800 leading-none">
            Daftar Kampus UNJ <br>
            <span class="text-sm font-semibold text-gray-800">
                Daftar kampus yang terdaftar di UNJ (Klik "Tambah" untuk menambah kampus)
            </span>
        </span>
        {{-- @if (session()->has('success'))
            <span class="bg-green-200 text-green-700 p-4 rounded-md mt-4">
                {{ $message }}
            </span>
        @elseif (session()->has('fail'))
            <span class="bg-red-200 text-red-700 p-4 rounded-md mt-4">
                {{ $message }}
            </span>
        @endif --}}
    </div>
    <div class="flex justify-between items-center mb-3">
        <div class="relative w-64">
            <input wire:model.live="search" type="text" class="border border-gray-300 rounded-lg px-3 py-2 w-full pr-10 focus:outline-none focus:ring-2 focus:ring-teal-700 text-black" placeholder="Cari kampus">
            <span class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-500 cursor-pointer">
                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                </svg>
            </span>
        </div>
        <!-- Modal toggle -->
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="inline-flex items-center btn text-white bg-teal-700 px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-teal-800 focus:ring-4 focus:outline-none font-bold text-sm text-center shadow-none border-none" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah
        </button>
        <!-- Main modal -->
        <div wire:ignore.self id="crud-modal" id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm w-2xl p-2">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Tambah Kampus
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center transition-all hover:cursor-pointer" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form wire:submit.prevent='save' class="p-4 md:p-5">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium {{ $errors->has('name') ? 'text-red-700' : 'text-gray-900' }}">Nama Kampus</label>
                                <input wire:model="name" type="text" name="name" id="name" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}" placeholder="">
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium {{ $errors->has('address') ? 'text-red-700' : 'text-gray-900' }}">Alamat Kampus</label>
                                <input wire:model="address" type="text" name="address" id="address" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 {{ $errors->has('address') ? 'border-red-500' : 'border-gray-300' }}" placeholder="">
                                @error('address')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium {{ $errors->has('contact') ? 'text-red-700' : 'text-gray-900' }}">No Telp Kampus</label>
                                <input wire:model="contact" type="text" name="contact" id="contact" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 {{ $errors->has('contact') ? 'border-red-500' : 'border-gray-300' }}" placeholder="">
                                @error('contact')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium {{ $errors->has('email') ? 'text-red-700' : 'text-gray-900' }}">Email Kampus</label>
                                <input wire:model="email" type="text" name="email" id="email" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}" placeholder="">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Gedung</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="">
                            </div>
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Unit</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="">
                            </div> --}}
                            {{-- <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Luas Kampus (m2)</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="">
                            </div> --}}
                            {{-- <div class="col-span-2 sm:col-span-1">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                                <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="">
                            </div> --}}
                            {{-- <div class="col-span-2 sm:col-span-1">
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                                <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                    <option selected="">Select category</option>
                                    <option value="TV">TV/Monitors</option>
                                    <option value="PC">PC</option>
                                    <option value="GA">Gaming/Console</option>
                                    <option value="PH">Phones</option>
                                </select>
                            </div> --}}
                            <div class="col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload Foto Kampus</label>
                                <input wire:model='images_path' multiple class="block w-full text-sm text-gray-900 border rounded-lg cursor-pointer bg-gray-50 {{ $errors->has('images_path') ? 'border-red-500' : 'border-gray-300' }}" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                @error('images_path')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium {{ $errors->has('description') ? 'text-red-700' : 'text-gray-900' }}">Deskripsi Kampus</label>
                                <textarea wire:model="description" name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border focus:ring-teal-500 focus:border-teal-500 bg-gray-50 {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}" placeholder=""></textarea>
                                @error('description')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="text-white inline-flex items-center bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer transition-all focus:bg-teal-800 font-semibold">
                                Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="bg-white text-black border border-gray-300 table table-bordered">
        <thead class="bg-teal-700 text-white text-center table-success">
            <tr>
                <th>No</th>
                <th>Nama Kampus</th>
                <th>Alamat Kampus</th>
                <th>No Telp Kampus</th>
                <th>Email Kampus</th>
                <th>Jumlah Gedung</th>
                {{-- <th>Jumlah Unit</th> --}}
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white text-black text-center">
            @foreach ($campuses as $campus)
                <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-[#DDF6D2]' : 'bg-white' }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $campus->name }}</td>
                    <td>{{ $campus->address }}</td>
                    <td>{{ $campus->contact }}</td>
                    <td>{{ $campus->email }}</td>
                    <td>{{ $campus->building->count() }}</td>
                    <td class="flex flex-col gap-2">
                        <a href="/kampus" type="button" class="inline-flex items-center gap-2 px-3 py-1.5 text-xs font-medium text-center text-white bg-green-700 rounded-sm hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            Detail
                        </a>
                        <a href="edit-kampus" type="button" class="transition-all inline-flex items-center gap-2 px-3 py-1.5 text-xs font-medium text-center text-white bg-yellow-500 rounded-sm hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            Edit
                        </a>
                        <a href="" type="button" class="transition-all inline-flex items-center gap-2 px-3 py-1.5 text-xs font-medium text-center text-white bg-red-700 rounded-sm hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            Hapus
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Toast --}}
    <div id="toast-slide" class="fixed bottom-5 -left-full z-50 transition-all duration-[1s] flex items-center w-full max-w-sm p-4 mb-4 text-gray-500 rounded-lg shadow-sm" role="alert">
        <div id="toast-success-logo" class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-900 rounded-lg">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div id="toast-error-logo" class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-200 bg-red-800 rounded-lg">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
            </svg>
            <span class="sr-only">Error icon</span>
        </div>
        <div id="toast-message" class="ms-3 text-sm font-medium cursor-default mr-2 text-black"></div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 px-2.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 hover:cursor-pointer transition-all" data-dismiss-target="#toast-slide" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>

    {{-- <button class="p-2 bg-blue-200 rounded-md text-black" wire:click='test'>
        SUCCESS
    </button>
    <button class="p-2 bg-red-200 rounded-md text-black" wire:click='test2'>
        FAIL
    </button> --}}
</div>

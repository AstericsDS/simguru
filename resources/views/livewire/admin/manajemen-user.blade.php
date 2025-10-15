<div>

    <div class="flex justify-between">
        {{-- Title --}}
        <h1 class="text-2xl font-medium">Manajemen User</h1>

        {{-- Add --}}
        <button @click="$dispatch('add-modal')" class="rounded-xl border border-gray-300 size-10 flex items-center justify-center group hover:px-2 hover:w-[100px] transition-all cursor-pointer hover:bg-primary hover:border-primary hover:text-white hover:rounded-lg overflow-hidden duration-200">
            <i class="fa-solid fa-plus"></i>
            <span class="hidden group-hover:inline transition-all font-semibold ml-2">Tambah</span>
        </button>
    </div>

    {{-- Table --}}
    <div class="relative overflow-x-auto shadow-md rounded-lg mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($user->name)
                                {{$user->name}}
                            @else
                                <span class="italic text-gray-500">Menunggu user login</span>
                            @endif
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($user->role === 1)
                                <span>Super Admin</span>
                            @else
                                <span>Admin</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                {{-- <button wire:click='view({{ $user->id }})' type="button" class="transition-all cursor-pointer hover:text-primary hover:bg-primary-light rounded-xl p-2 mx-auto" data-tip="Gambar">
                                    <i class="fa-solid fa-images"></i>
                                </button> --}}
                                @if ($user->role === 1)
                                    <button wire:click='deleteModal({{ $user->id }})' class="hover:text-red-500 transition-all cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE -->
                                            <path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6q-.425 0-.712-.288T4 5t.288-.712T5 4h4q0-.425.288-.712T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5t-.288.713T19 6v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zm-7 11q.425 0 .713-.288T11 16V9q0-.425-.288-.712T10 8t-.712.288T9 9v7q0 .425.288.713T10 17m4 0q.425 0 .713-.288T15 16V9q0-.425-.288-.712T14 8t-.712.288T13 9v7q0 .425.288.713T14 17M7 6v13z" />
                                        </svg>
                                    </button>
                                @endif
                                {{-- <a href="{{ route('view-kampus', $campus->slug) }}" wire:navigate>
                                    <button class="transition-all cursor-pointer hover:text-blue-500 hover:bg-gray-300 rounded-xl p-2 mx-auto">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </a>
                                @if ($campus->admin_id === Auth::id())
                                    <a href="{{ route('edit-kampus', $campus->slug) }}" wire:navigate class="transition-all cursor-pointer rounded-xl p-2 mx-auto {{ in_array($campus->id, $rejected_campuses) ? 'text-red-500 hover:bg-red-200 tooltip tooltip-error' : 'hover:text-yellow-900 hover:bg-yellow-200' }}" data-tip="Perubahan ditolak">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                @endif --}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    {{-- Add Modal --}}
    <div x-data="{ state: false }" @add-modal.window="state = !state" @keydown.window.escape="state = false">
        <div x-show="state" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="opacity-0">
            <div x-show="state" @click.outside="state = false" class="relative bg-white max-h-screen overflow-y-auto rounded-lg shadow-sm w-2xl p-2 opacity-100 z-50" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="scale-50" x-transition:enter-end="scale-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="scale-50">

                <!-- Modal header -->
                <div class="flex items-center justify-between p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Tambah User
                    </h3>
                    <button @click="state = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center transition-all hover:cursor-pointer">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <form wire:submit.prevent='save' class="p-5">

                    {{-- Input --}}
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium">Email User</label>
                            <input wire:model="email" type="text" id="name" class="bg-gray-50 border focus:outline-none focus:ring-primary transition-all text-gray-900 text-sm rounded-lg block w-full p-2.5 {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}">
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="campus" class="block mb-2 text-sm font-medium {{ $errors->has('role') ? 'text-red-700' : 'text-gray-900' }}">Role User</label>
                            <select wire:model="role" id="campus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 {{ $errors->has('role') ? 'border-red-500' : 'border-gray-300' }}">
                                <option disabled>Pilih Role</option>
                                {{-- <option value="1">Super Admin</option> --}}
                                <option value="2">Admin</option>
                            </select>
                            @error('role')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div @close-modal.window="state = false" class="flex justify-end mt-8">
                        <button type="submit" class="px-4 py-2 text-gray-900 font-semibold border-2 border-primary rounded-lg cursor-pointer hover:bg-primary hover:text-white transition-all focus:outline-none focus:bg-primary focus:text-white">
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Confirm modal -->
    <div x-data="{ state: false }" @confirm-delete.window="state = !state" @keydown.window.escape="state = false">
        <div x-show="state" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="opacity-0">
            <div x-show="state" @click.outside="state = false" class="relative bg-white max-h-screen overflow-y-auto rounded-lg shadow-sm w-2xl p-2 opacity-100 z-50" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="scale-50" x-transition:enter-end="scale-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="scale-50">

                <div class="flex flex-col items-center py-8">
                    <i class="fa-solid fa-circle-exclamation text-gray-500 text-8xl"></i>
                    <p class="pt-6 pb-12 text-2xl text-gray-600">Apakah anda yakin?</p>
                    <div class="flex gap-6">
                        <button wire:click='deleteUser' class="px-8 py-2 rounded-md bg-primary hover:bg-unj-dark transition-all cursor-pointer text-white text-xl">Iya</button>
                        <button @click="$dispatch('confirm-delete')" class="px-8 py-2 rounded-md border-2 border-red-600  hover:bg-red-700 hover:border-red-700 transition-all cursor-pointer text-xl hover:text-white">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Toast --}}
    <div x-data="{ state: false, 'status': '', 'message': '' }" x-show="state" @toast.window="state = true; status = $event.detail.status; message = $event.detail.message; setTimeout( () => state = false, 3000 )" :class="{ 'bg-green-100': status === 'success', 'bg-red-100': status === 'fail', 'bg-red-100': status === 'nochanges' }" x-transition:enter="transform transition ease-in-out duration-1000" x-transition:enter-start="-translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100" x-transition:leave="transform transition ease-in-out duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="-translate-x-5/4 opacity-0" class="fixed bottom-5 left-5 flex w-fit z-30 p-4 rounded-md shadow-lg items-center gap-4">

        {{-- Success Logo --}}
        <div :class="status === 'success' ? 'inline-flex' : 'hidden'" class="items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
            </svg>
            <span class="sr-only">Check icon</span>
        </div>

        {{-- Failed Logo --}}
        <div :class="status === 'fail' || status === 'nochanges' ? 'inline-flex' : 'hidden'" class="items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
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

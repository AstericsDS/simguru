<div class="text-black">

    {{-- Title --}}
    <a wire:navigate href="{{ route('daftar-kampus') }}" class="flex items-center gap-2 mb-4 hover:text-primary transition-all">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Kembali ke daftar kampus</span>
    </a>
    <h1 class="text-2xl font-medium">Edit Kampus</h1>

    {{-- Reject Reason --}}
    @if ($update->status === 'rejected')
        <div class="p-4 bg-red-200 rounded-sm mt-4">
            <div class="flex gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>
                <h1>Alasan Penolakan: {{ $update->reject_reason }}</h1>
            </div>
        </div>
    @endif

    {{-- Content --}}
    <div class="mt-8">
        <form wire:submit.prevent='showModal'>
            <div class="grid grid-cols-2 gap-8 items-start">
                <div class="w-full flex flex-col gap-5">
                    <div class="{{ $is_pending ? 'tooltip tooltip-accent' : '' }}" data-tip="Mohon tunggu verifikasi super admin">
                        <label for="name">Nama</label>
                        <input wire:model.live='name' type="text" id="name" class="bg-gray-50 border focus:outline-none focus:ring-primary transition-all {{ $is_pending ? 'text-gray-500' : 'text-gray-900' }} text-sm rounded-lg block w-full p-2.5 {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }} my-2" {{ $is_pending ? 'disabled' : '' }}>
                        @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="{{ $is_pending ? 'tooltip tooltip-accent' : '' }}" data-tip="Mohon tunggu verifikasi super admin">
                        <label for="address">Alamat</label>
                        <input wire:model.live='address' type="text" id="address" class="bg-gray-50 border focus:outline-none focus:ring-primary transition-all {{ $is_pending ? 'text-gray-500' : 'text-gray-900' }} text-sm rounded-lg block w-full p-2.5 {{ $errors->has('address') ? 'border-red-500' : 'border-gray-300' }} my-2" {{ $is_pending ? 'disabled' : '' }}>
                        @error('address')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="{{ $is_pending ? 'tooltip tooltip-accent' : '' }}" data-tip="Mohon tunggu verifikasi super admin">
                        <label for="contact">Nomor Telepon</label>
                        <input wire:model.live='contact' type="text" id="contact" class="bg-gray-50 border focus:outline-none focus:ring-primary transition-all {{ $is_pending ? 'text-gray-500' : 'text-gray-900' }} text-sm rounded-lg block w-full p-2.5 {{ $errors->has('contact') ? 'border-red-500' : 'border-gray-300' }} my-2" {{ $is_pending ? 'disabled' : '' }}>
                        @error('contact')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="{{ $is_pending ? 'tooltip tooltip-accent' : '' }}" data-tip="Mohon tunggu verifikasi super admin">
                        <label for="email">Email</label>
                        <input wire:model.live='email' type="text" id="email" class="bg-gray-50 border focus:outline-none focus:ring-primary transition-all {{ $is_pending ? 'text-gray-500' : 'text-gray-900' }} text-sm rounded-lg block w-full p-2.5 {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} my-2" {{ $is_pending ? 'disabled' : '' }}>
                        @error('email')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="{{ $is_pending ? 'tooltip tooltip-accent' : '' }}" data-tip="Mohon tunggu verifikasi super admin">
                        <label for="description">Deskripsi</label>
                        <textarea wire:model.live='description' id="description" class="bg-gray-50 border focus:outline-none focus:ring-primary transition-all {{ $is_pending ? 'text-gray-500' : 'text-gray-900' }} text-sm rounded-lg block w-full p-2.5 {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }} my-2 h-36" {{ $is_pending ? 'disabled' : '' }}></textarea>
                        @error('description')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="w-full flex flex-col gap-2 my-auto">
                    @error('new_images.*')
                        <span class="text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="carousel w-full max-h-150 rounded-md">
                        @foreach ($images_path as $image)
                            <div id="item{{ $loop->iteration }}" class="carousel-item w-full hover:brightness-75 transition-all duration-300 group relative {{ count($images_path) <= 1 ? 'cursor-not-allowed' : 'cursor-pointer' }}" {{ count($images_path) > 1 ? "wire:click=removeImage($loop->index)" : '' }}>
                                @if ($image instanceof \Illuminate\Http\UploadedFile)
                                    <img src="{{ $image->temporaryUrl() }}" class="w-full object-contain" />
                                    <div class="hidden group-hover:inline absolute left-1/2 top-1/2 text-white text-6xl -translate-x-1/2 -translate-y-1/2 transition-none">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </div>
                                @else
                                    <img src="{{ asset('storage/' . $image) }}" class="w-full object-contain" />
                                    <div class="hidden group-hover:inline absolute left-1/2 top-1/2 text-white text-6xl -translate-x-1/2 -translate-y-1/2 transition-none">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="flex w-full justify-center gap-2 py-2">
                        @foreach ($images_path as $image)
                            <a href="#item{{ $loop->iteration }}" class="btn btn-md">{{ $loop->iteration }}</a>
                        @endforeach
                        <div class="{{ $is_pending ? 'tooltip tooltip-accent' : '' }}" data-tip="Mohon tunggu verifikasi super admin">
                            <label class="btn btn-md font-semibold {{ $is_pending ? 'btn-disabled' : '' }}">
                                +
                                <input wire:model='new_images' type="file" multiple accept="image/*" class="hidden">
                            </label>
                        </div>

                    </div>

                    {{-- Documents --}}
                    <div class="bg-gray-300 p-5 rounded-md max-h-[200px] overflow-y-auto">

                        {{-- Header --}}
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex gap-3 items-center">
                                <i class="fa-regular fa-file text-xl"></i>
                                <h1 class="text-xl">Dokumen</h1>
                            </div>

                            {{-- Add Document --}}
                            <div class="flex gap-2">
                                <span class="text-red-500">
                                    @error('new_documents.*')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <label for="document" class="hover:text-primary transition-all {{ $is_pending ? 'cursor-not-allowed' : 'cursor-pointer' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12-3-3m0 0-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                    <input id="document" wire:model='new_documents' type="file" multiple class="hidden" {{ $is_pending ? 'disabled' : '' }}>
                                </label>
                            </div>
                        </div>

                        {{-- Body --}}
                        <ul class="mt-3 space-y-2 list-disc list-inside marker:text-primary">
                            @foreach ($documents_path as $document)
                                <div class="flex justify-between">
                                    @if ($document instanceof \Illuminate\Http\UploadedFile)
                                        <li>
                                            <span class="border-b-1 border-transparent hover:border-gray-500 transition-all duration-300"> {{ basename($document->getClientOriginalName()) }} </span>
                                        </li>
                                    @else
                                        <li>
                                            <a target="_blank" href="{{ asset('storage/' . $document) }}" class="border-b-1 border-transparent hover:border-gray-500 transition-all duration-300"> {{ basename($document) }} </a>
                                        </li>
                                    @endif
                                    <button type="button" {{ $is_pending ? 'disabled' : '' }} wire:click="removeDocument({{ $loop->index }})" class="hover:text-red-600 transition-all {{ $is_pending ? 'cursor-not-allowed' : 'cursor-pointer' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-8">
                <button type="submit" class="p-2 border-[2px] border-primary rounded-md px-8 transition-all font-semibold {{ $is_pending ? 'cursor-not-allowed' : 'hover:bg-primary hover:text-white cursor-pointer' }}">Simpan</button>
            </div>
        </form>
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

    {{-- Modal --}}
    <div x-data="{ state: false }" @modal.window="state = !state" @keydown.window.escape="state = false">
        <div x-show="state" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="opacity-0">
            <div x-show="state" @click.outside="state = false" class="relative bg-white max-h-screen overflow-y-auto rounded-lg shadow-sm w-2xl p-2 opacity-100 z-50" x-transition:enter="transition ease-in-out duration-250" x-transition:enter-start="scale-50" x-transition:enter-end="scale-100" x-transition:leave="transition ease-in-out duration-250" x-transition:leave-end="scale-50">

                <div class="flex flex-col items-center py-8">
                    <i class="fa-solid fa-circle-exclamation text-gray-500 text-8xl"></i>
                    <p class="pt-6 pb-12 text-2xl text-gray-600">Apakah anda yakin?</p>
                    <div class="flex gap-6">
                        <button wire:click='save' class="px-8 py-2 rounded-md bg-green-400 hover:bg-green-500 transition-all cursor-pointer text-white text-xl">Iya</button>
                        <button @click="$dispatch('modal')" class="px-8 py-2 rounded-md border-2 border-red-300  hover:bg-red-400 hover:border-red-400 transition-all cursor-pointer text-xl hover:text-white">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

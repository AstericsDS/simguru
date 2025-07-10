<div class="container mt-4">
    <div class="flex justify-center text-center items-center mb-6 mt-6">
        <span class="text-2xl font-bold text-gray-800">
            Daftar Pengajuan Perubahan Data
        </span>
    </div>

    <div class="flex justify-between gap-4">
        <div class="px-6 py-4 bg-blue-200 rounded-md flex-1 flex items-center gap-8">
            <i class="fa-solid fa-list-ul text-purple-500 text-4xl"></i>
            <div>
                <h1 class="text-slate-500 text-2xl">Total Pengajuan</h1>
                <span class="text-black text-4xl">{{ $datas->count() }}</span>
            </div>
        </div>
        <div class="px-6 py-4 bg-green-200 rounded-md flex-1 flex items-center gap-8">
            <i class="fa-solid fa-clipboard-check text-green-500 text-4xl"></i>
            <div>
                <h1 class="text-slate-500 text-2xl">Diterima</h1>
                <span class="text-black text-4xl">{{ $datas->where('status', 'approved')->count() }}</span>
            </div>
        </div>
        <div class="px-6 py-4 bg-red-200 rounded-md flex-1 flex items-center gap-8">
            <i class="fa-solid fa-square-xmark text-red-700 text-4xl"></i>
            <div>
                <h1 class="text-slate-500 text-2xl">Ditolak</h1>
                <span class="text-black text-4xl">{{ $datas->where('status', 'rejected')->count() }}</span>
            </div>
        </div>
        <div class="px-6 py-4 bg-yellow-200 rounded-md flex-1 flex items-center gap-8">
            <i class="fa-solid fa-clock text-yellow-500 text-4xl"></i>
            <div>
                <h1 class="text-slate-500 text-2xl">Pending</h1>
                <span class="text-black text-4xl">{{ $datas->where('status', 'pending')->count() }}</span>
            </div>
        </div>
    </div>

    <table class="table table-fixed mt-4 text-center">
        <thead class="bg-teal-700">
            <tr class="text-white">
                <th class="w-[50px]">No</th>
                <th class="">Unit</th>
                <th>Jenis Perubahan</th>
                <th>Admin</th>
                <th>Waktu Pengajuan</th>
                <th>Data</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $index => $data)
                <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-[#DDF6D2]' : 'bg-white' }} text-black">
                    <td>{{ $datas->firstItem() + $index }}</td>
                    <td>
                        @switch ($data->table)
                            @case('campuses')
                                <span class="p-2 bg-green-200 rounded-md">Kampus</span>
                            @break

                            @case('buildings')
                                <span class="p-2 bg-blue-200 rounded-md">Gedung</span>
                            @break

                            @case('rooms')
                                <span class="p-2 bg-purple-200 rounded-md">Ruang</span>
                            @break
                        @endswitch
                    </td>
                    <td>
                        @switch($data->type)
                            @case('new')
                                <span class="p-2 bg-cyan-200 font-normal">Baru</span>
                            @break

                            @case('modify')
                                <span class="p-2 bg-yellow-200 font-normal">Edit</span>
                            @break
                        @endswitch
                    </td>
                    <td>
                        <span>{{ $data->admin->name }}</span>
                    </td>
                    <td>
                        <span>{{ $data->created_at }}</span>
                    </td>
                    <td>
                        <ul class="text-sm space-y-1">
                            @foreach ($data->parsed_new_data as $key => $value)
                                <li><strong>{{ ucfirst($key) }}:</strong> {{ is_array($value) ? json_encode($value) : $value }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <div class="flex gap-2 justify-center">

                            @if ($data->status == 'pending')
                                <button data-modal-target="popup-accept" data-modal-toggle="popup-accept" class="p-2 bg-green-200 text-green-500 rounded-md cursor-pointer font-semibold hover:bg-green-300 transition-all" type="button">
                                    Setuju
                                </button>

                                <div id="popup-accept" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white transition-all cursor-pointer" data-modal-hide="popup-accept">
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
                                                <button wire:click='accept({{ $data->id }})' data-modal-hide="popup-accept" type="button" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center cursor-pointer transition-all">
                                                    Iya
                                                </button>
                                                <button data-modal-hide="popup-accept" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white transition-all cursor-pointer dark:hover:bg-gray-700 cursor-pointer transition-all">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button data-modal-target="popup-reject" data-modal-toggle="popup-reject" class="p-2 bg-red-200 text-red-500 rounded-md cursor-pointer font-semibold hover:bg-red-300 transition-all" type="button">
                                    Tolak
                                </button>

                                <div id="popup-reject" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-reject">
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
                                                <button wire:click='reject({{ $data->id }})' data-modal-hide="popup-reject" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center cursor-pointer transition-all">
                                                    Iya
                                                </button>
                                                <button data-modal-hide="popup-reject" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 cursor-pointer transition-all">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($data->status == 'approved')
                                <div class="p-2 font-semibold bg-green-200 text-green-800">Disetujui</div>
                            @elseif ($data->status == 'rejected')
                                <div class="p-2 font-semibold bg-red-200 text-red-800">Ditolak</div>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

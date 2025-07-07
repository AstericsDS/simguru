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
                                <button wire:click='accept({{ $data->id }})' class="p-2 bg-green-200 text-green-500 rounded-md cursor-pointer font-semibold">
                                    Setuju
                                </button>
                                <button wire:click='reject({{ $data->id }})' class="p-2 bg-red-200 text-red-500 rounded-md cursor-pointer font-semibold">
                                    Tolak
                                </button>
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

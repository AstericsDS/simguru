{{-- Tambah Gedung --}}

<div class="container mt-4">
    {{-- Judul halaman --}}
    <div class="flex flex-col gap-4 justify-center text-center items-center mb-6 mt-6">
        <div class="text-2xl font-bold text-gray-800 leading-none">
            <h1>Daftar Perubahan Data</h1>
        </div>
    </div>
    <div class="flex justify-end items-center mb-3">
        <div class="overflow-x-auto">
            <table class="w-full table-fixed border border-gray-300 bg-white text-black rounded-md">
                <thead class="bg-teal-700 text-white text-center">
                    <tr>
                        <th class="w-[70px] py-[10.5px]">No</th>
                        <th class="w-[350px] py-[10.5px]">Nama</th>
                        <th class="w-auto py-[10.5px]">Data</th>
                        <th class="w-[200px] py-[10.5px]">Admin</th>
                        <th class="w-[150px] py-[10.5px]">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-black text-center">
                    @foreach ($updates as $index => $update)
                        <tr>
                            <td class="">
                                {{ $updates->firstItem() + $index }}
                            </td>
                            <td>
                                <span class="mr-2">{{ $update->parsed_new_data['Nama'] }}</span>
                                @if ($update->table == 'campuses')
                                    <span class="p-2 bg-green-200 text-green-800 rounded-md font-medium">Kampus</span>
                                @elseif ($update->table == 'buildings')
                                    <span class="p-2 bg-blue-200 text-blue-800 rounded-md font-medium">Gedung</span>
                                @elseif ($update->table == 'rooms')
                                    <span class="p-2 bg-purple-200 text-purple-800 rounded-md font-medium">Ruang</span>
                                @endif
                            </td>
                            <td class="py-6">
                                <ul class="text-sm space-y-1">
                                    @foreach ($update->parsed_new_data as $key => $value)
                                        <li><strong>{{ ucfirst($key) }}:</strong> {{ is_array($value) ? json_encode($value) : $value }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                {{ $update->admin->name }}
                            </td>
                            <td>
                                @if ($update->status == 'pending')
                                    <span class="p-2 bg-orange-200 text-orange-800 rounded-md">Pending</span>
                                @elseif ($update->status == 'approved')
                                    <span class="p-2 bg-green-200 text-green-800 rounded-md">Disetujui</span>
                                @elseif ($update->status == 'rejected')
                                    <span class="p-2 bg-red-200 text-red-800 rounded-md">Ditolak</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <div class="bg-white">
                        {{ $updates->links('pagination::tailwind') }}
                    </div>
                </tbody>
            </table>
        </div>
    </div>

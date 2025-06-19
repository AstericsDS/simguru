{{-- Tambah Kampus --}}

<div class="container mt-4">
    {{-- Judul halaman --}}
    <div class="flex justify-center text-center items-center mb-6 mt-6">
        <span class="text-2xl font-bold text-gray-800 leading-none">
            Daftar Perubahan Data <br>
            <span class="text-sm font-semibold text-gray-800">
                Daftar perubahan data
            </span>
        </span>
    </div>
    <div class="flex justify-end items-center mb-3">
        {{-- <div class="relative w-64">
            <input type="text" class="border border-gray-300 rounded-full px-3 py-2 w-full pr-10 focus:outline-none focus:ring-2 focus:ring-teal-700" placeholder="Search...">
            <span class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-500 cursor-pointer">
                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                </svg>
            </span>
        </div> --}}
        <!-- Modal toggle -->
        {{-- <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="btn text-white bg-teal-700 px-4 py-2 rounded-full flex items-center gap-2 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm px-5 py-2.5 text-center" type="button">
            Tambah --}}
        </button>
        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Tambah Ruang
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Ruang</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Lokasi Kampus</label>
                                <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                    <option selected="">Pilih Kampus</option>
                                    <option value="TV">Rawamangun Muka</option>
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Lokasi Gedung</label>
                                <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                    <option selected="">Pilih Gedung</option>
                                    <option value="TV">Raden Dewi Sartika</option>
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Lokasi Lantai</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Kapasitas</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Luas Ruang (m2)</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                            </div>
                            {{-- <div class="col-span-2 sm:col-span-1">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                                <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                            </div> --}}
                            <div class="col-span-2">          
                                <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload Foto Ruang</label>
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                            </div>
                            <div class="col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Ruang</label>
                                <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500" placeholder=""></textarea>                    
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="text-white inline-flex items-center bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                                Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="border border-gray-300 table table-bordered">
        <thead class="bg-teal-700 text-white text-center table-success">
            <tr>
                <th>No</th>
                <th>Klasifikasi</th>
                <th>Jenis Data</th>
                <th>Data Pengajuan Perubahan</th>
                <th>Data Disetujui</th>
                <th>Status Perubahan Data</th>
                <th>Keterangan</th>
                <th>Nama Petugas</th>
                <th>Petugas Approval</th>
                <th>Tanggal Perubahan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white text-black text-center">
            <tr>
                <td>1</td>
                <td>Data</td>
                <td>Fakultas/Unit</td>
                <td>FMIPA, FBS, FIK, FIS, FE, FPP, FIKK, FIKTI, FPPM, FMIPA</td>
                <td>FMIPA, FBS, FIK, FIS, FE, FPP, FIKK, FIKTI, FPPM, FMIPA, PUSTIKOM, KEUANGAN</td>
                <td>
                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">Disetujui</span>
                </td>
                <td>-</td>
                <td>Admin</td>
                <td>Superadmin</td>
                <td>11-06-2025 Pukul 13.17</td>
                <td></td>
                {{-- <td class="flex flex-col gap-2">
                    <a href="" type="button" class="px-1 py-1 text-xs font-medium text-center text-white bg-blue-700 rounded-sm hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Edit
                    </a>
                    <a href="" type="button" class="px-1 py-1 text-xs font-medium text-center text-white bg-green-700 rounded-sm hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">
                        Detail
                    </a>
                </td> --}}
            </tr>
            <tr>
                <td>2</td>
                <td>Dokumen</td>
                <td>Dokumen Denah Lokasi Gedung</td>
                <td>Denah Lokasi Gedung 2021.pdf</td>
                <td>Denah Lokasi Gedung 2025.pdf</td>
                <td>
                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">Pending</span>
                </td>
                <td>-</td>
                <td>Admin</td>
                <td>Superadmin</td>
                <td>12-06-2025 Pukul 13.17</td>
                <td class="text-center">
                    <a href="#" class="btn btn-danger btn-sm mb-2">
                        Tolak
                    </a>
                    <a href="#" class="btn btn-success btn-sm">
                        Setujui
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

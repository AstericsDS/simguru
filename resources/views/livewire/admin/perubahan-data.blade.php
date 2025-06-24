{{-- Tambah Kampus --}}

<div class="container mt-4">
    {{-- Judul halaman --}}
    <div class="flex justify-center text-center items-center mb-6 mt-6">
        <span class="text-2xl font-bold text-gray-800">
            Daftar Pengajuan Perubahan Data
        </span>
    </div>
    <div class="overflow-x-auto bg-white rounded shadow mt-8 max-h-[70vh] overflow-y-auto">
        <table class="min-w-full text-xs md:text-sm border-collapse border border-gray-300 table table-bordered">
        {{-- <table class="border border-gray-300 table table-bordered"> --}}
            {{-- <thead class="bg-teal-700 text-white text-center table-success"> --}}
            <thead class="bg-teal-700 text-white text-center table-success sticky top-0 z-10">
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
                        <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg"fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1 text-green-500">
                                <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                            </svg>
                            Disetujui
                        </span>
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
                        <span class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1 text-yellow-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Pending
                        </span>
                    </td>
                    <td>-</td>
                    <td>Admin</td>
                    <td>Superadmin</td>
                    <td>12-06-2025 Pukul 13.17</td>
                    <td class="text-center">
                        <a href="" class="inline-flex items-center gap-2 bg-red-100 text-red-700 border border-red-400 hover:bg-red-200 transition px-3 py-1.5 rounded text-sm font-medium mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-500">
                                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                            <span>Tolak</span>
                        </a>
                        <a href="" class="inline-flex items-center gap-2 bg-green-100 text-green-700 border border-green-400 hover:bg-green-200 transition px-3 py-1.5 rounded text-sm font-medium mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-green-500">
                                <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                            </svg>
                            <span>Setujui</span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Data</td>
                    <td>Deskripsi Kampus</td>
                    <td>Kampus A Universitas Negeri Jakarta (UNJ) merupakan kampus utama di UNJ.</td>
                    <td>Kampus A Universitas Negeri Jakarta (UNJ) merupakan kampus utama yang berlokasi di Jalan Rawamangun Muka, Jakarta Timur.</td>
                    <td class="text-center">
                        <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1 text-red-500">
                                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                            Ditolak
                        </span>
                    </td>
                    <td>-</td>
                    <td>Admin</td>
                    <td>Superadmin</td>
                    <td>10-06-2025 Pukul 13.17</td>
                    <td class="text-center">
                    </td>
                </tr>
            </tbody>
        </table>
</div>

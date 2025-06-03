<div class="container mt-4">
    <div class="flex justify-between items-center mb-3">
        <div class="relative w-64">
            <input 
                type="text" 
                class="border border-gray-300 rounded-full px-3 py-2 w-full pr-10 focus:outline-none focus:ring-2 focus:ring-teal-700" 
                placeholder="Search...">
            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                </svg>
            </span>
        </div>
        <a href="/tambahkampus" 
        class="bg-teal-700 text-white btn px-4 py-2 rounded-full flex items-center gap-2 hover:bg-teal-800">
            + Tambah
        </a>
    </div>
    <table class="bg-white text-black border border-gray-300 table table-bordered">
        <thead class="bg-teal-700 text-white text-center table-success">
            <tr>
                <th>NO</th>
                <th>NAMA KAMPUS</th>
                <th>ALAMAT</th>
                <th>JUMLAH GEDUNG</th>
                <th>LUAS KAMPUS</th>
                <th>FAKULTAS</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Kampus A</td>
                <td>Jl. R.Mangun Muka Raya, RT.11/RW.14, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</td>
                <td>10</td>
                <td>1.000 hektar</td>
                <td>FMIPA, FT, FBS, FE, FIP, FISH</td>
                <td>
                    <a href="/kampus" class="btn rounded-full">
                        <svg class="w-6 h-6 text-teal-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                        </svg>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

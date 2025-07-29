<<<<<<< HEAD
<div class="mt-4">
    <!-- Statistik Card -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow p-5">
            <h6 class="text-gray-500 mb-2 font-normal">Total Kampus UNJ</h6>
            <h4 class="text-2xl font-semibold mb-3 flex items-center gap-2 text-slate-500">
                {{ $campusCount }}
                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-blue-100 text-blue-700 rounded border border-blue-700">
                    <i class="ti ti-trending-up"></i> Kampus UNJ
                </span>
            </h4>
            <p class="text-sm text-gray-500">
                Sebanyak <span class="text-blue-600">{{ $campusCount }}</span> Kampus yang terdaftar di UNJ
            </p>
        </div>

        <div class="bg-white rounded-lg shadow p-5">
            <h6 class="text-gray-500 mb-2 font-normal">Total Gedung</h6>
            <h4 class="text-2xl font-semibold mb-3 flex items-center gap-2 text-slate-500">
                {{ $buildingCount }}
                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-green-100 text-green-700 rounded border border-green-700">
                    <i class="ti ti-trending-up"></i> 70.5%
                </span>
            </h4>
            <p class="text-sm text-gray-500">
                Sebanyak <span class="text-green-600">{{ $buildingCount }}</span> Gedung yang terdaftar di UNJ
            </p>
        </div>

        <div class="bg-white rounded-lg shadow p-5">
            <h6 class="text-gray-500 mb-2 font-normal">Total Ruang</h6>
            <h4 class="text-2xl font-semibold mb-3 flex items-center gap-2 text-slate-500">
                {{ $roomCount }}
                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-700 rounded border border-yellow-700">
                    <i class="ti ti-trending-down"></i> 27.4%
                </span>
            </h4>
            <p class="text-sm text-gray-500">
                Sebanyak <span class="text-yellow-600">{{ $roomCount }}</span> Ruang yang terdaftar di UNJ
            </p>
        </div>

        <div class="bg-white rounded-lg shadow p-5">
            <h6 class="text-gray-500 mb-2 font-normal">Total Kelas</h6>
            <h4 class="text-2xl font-semibold mb-3 flex items-center gap-2 text-slate-500">
                {{ $classCount }}
                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-red-100 text-red-700 rounded border border-red-700">
                    <i class="ti ti-trending-down"></i> 27.4%
                </span>
            </h4>
            <p class="text-sm text-gray-500">
                Sebanyak <span class="text-red-600">{{ $classCount }}</span> Ruang yang terdaftar sebagai Kelas
            </p>
        </div>
    </div>

    <!-- Jumlah Kampus dan Ruang -->
    <div class="bg-white rounded-lg shadow p-5 mb-6">
        <h5 class="text-lg font-semibold mb-4">Jumlah Kampus dan Ruang</h5>
        <div id="sales-report-chart"></div>
    </div>

    <!-- Statistik Penggunaan Gedung dan Ruang -->
    <div class="bg-white rounded-lg shadow p-5 mb-6">
        <div class="flex justify-between items-center mb-4">
            <h5 class="text-lg font-semibold">Statistik Penggunaan Gedung dan Ruang</h5>
            <div class="space-x-2">
                <button id="btn-bulan" class="bg-gray-200 text-gray-700 px-3 py-1 rounded">Bulan</button>
                <button id="btn-minggu" class="bg-blue-600 text-white px-3 py-1 rounded">Minggu</button>
            </div>
        </div>
        <div>
            <div id="visitor-chart-1" style="display:none;"></div>
            <div id="visitor-chart"></div>
        </div>
    </div>

    <!-- Status Penggunaan Gedung dan Ruang -->
    <div class="bg-white rounded-lg shadow p-5">
        <h5 class="text-lg font-semibold mb-4">Status Penggunaan Gedung dan Ruang</h5>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left font-medium text-gray-700">KAMPUS</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-700">GEDUNG</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-700">LANTAI</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-700">RUANG</th>
                        <th class="px-4 py-2 text-right font-medium text-gray-700">STATUS</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr>
                        <td class="px-4 py-2 text-gray-600"><a href="#" class="hover:underline">KAMPUS A</a></td>
                        <td class="px-4 py-2">GEDUNG SFD TOWER A</td>
                        <td class="px-4 py-2">9</td>
                        <td class="px-4 py-2 flex items-center gap-2">
                            <i class="fas fa-circle text-gray-500 text-xs"></i> CLASS ROOM TYPE-1 (905)
                        </td>
                        <td class="px-4 py-2 text-right">RUANG KELAS</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-gray-600"><a href="#" class="hover:underline">KAMPUS B</a></td>
                        <td class="px-4 py-2">GEDUNG B</td>
                        <td class="px-4 py-2">3</td>
                        <td class="px-4 py-2 flex items-center gap-2">
                            <i class="fas fa-circle text-yellow-500 text-xs"></i> Pending
                        </td>
                        <td class="px-4 py-2 text-right">-</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-gray-600"><a href="#" class="hover:underline">KAMPUS D</a></td>
                        <td class="px-4 py-2">GEDUNG C</td>
                        <td class="px-4 py-2">5</td>
                        <td class="px-4 py-2 flex items-center gap-2">
                            <i class="fas fa-circle text-green-500 text-xs"></i> Approved
                        </td>
                        <td class="px-4 py-2 text-right">-</td>
=======
<div class="w-full p-5 lg:px-40">
    {{-- <h1 class="text-center mt-4 font-bold text-3xl">CONTENT</h1> --}}
    <div class="flex justify-between mt-15">
        <div class="card card-side bg-[#117074] card-sm w-1/6">
            <figure class="bg-[#124F52] w-20">
                <img src="logos/peminjaman.png" class="size-10" alt="peminjaman">
            </figure>
            <div class="card-body">
                <h2 class="card-title">Peminjaman</h2>
                <p>0</p>
            </div>
        </div>
        <div class="card card-side bg-[#CBB631] card-sm w-1/6">
            <figure class="bg-[#847517] w-20">
                <img src="logos/dibatalkan.png" class="size-10" alt="peminjaman">
            </figure>
            <div class="card-body">
                <h2 class="card-title">Dibatalkan</h2>
                <p>0</p>
            </div>
        </div>
        <div class="card card-side bg-[#AF1A1A] card-sm w-1/6">
            <figure class="bg-[#7D1818] w-20">
                <img src="logos/ditolak.png" class="size-10" alt="peminjaman">
            </figure>
            <div class="card-body">
                <h2 class="card-title">Ditolak</h2>
                <p>0</p>
            </div>
        </div>
        <div class="card card-side bg-[#4E8546] card-sm w-1/6">
            <figure class="bg-[#2A4825] w-20">
                <img src="logos/disetujui.png" class="size-10" alt="peminjaman">
            </figure>
            <div class="card-body">
                <h2 class="card-title">Disetujui</h2>
                <p>0</p>
            </div>
        </div>
    </div>
    <div class="bg-unj-500 rounded-2xl my-4 p-3">
        <label class="input m-4 bg-white">
            <svg class="h-[1em] opacity-50 text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                    stroke="currentColor">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </g>
            </svg>
            <input type="search" class="grow text-black" placeholder="Search" />
        </label>
        <div class="overflow-x-auto rounded-t-box m-3 text-black odd:bg-white even:bg-gray-100">
            <table class="table table-pin-rows">
                <!-- head -->
                <thead>
                    <tr class="bg-gray-500 text-black">
                        <th>NO</th>
                        <th>KAMPUS</th>
                        <th>GEDUNG/RUANGAN</th>
                        <th>WAKTU</th>
                        <th>KEPERLUAN</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr>
                        <th>1</th>
                        <td>Kampus A</td>
                        <td>Gedung Dewi Sartika</td>
                        <td>08:00 - 12:00</td>
                        <td>Pembelajaran</td>
                        <td>Aktif</td>
                        <td>
                            <button class="btn btn-outline bg-green-500 text-white">Yes</button>
                            <button class="btn btn-outline bg-red-600 text-white">No</button>
                        </td>
                    </tr>
                    <!-- row 2 -->
                    <tr>
                        <th>2</th>
                        <td>Kampus A</td>
                        <td>Gedung Hasyim Asy'ari</td>
                        <td>08:00-13:00</td>
                        <td>Acara</td>
                        <td>Aktif</td>
                        <td>
                            <button class="btn btn-outline bg-green-500 text-white">Yes</button>
                            <button class="btn btn-outline bg-red-600 text-white">No</button>
                        </td>
                    </tr>
                    <!-- row 3 -->
                    <tr>
                        <th>3</th>
                        <td>Kampus B</td>
                        <td>Gedung Serbaguna</td>
                        <td>08:00-09:00</td>
                        <td>Bersih-Bersih</td>
                        <td>Aktif</td>
                        <td>
                            <button class="btn btn-outline bg-green-500 text-white">Yes</button>
                            <button class="btn btn-outline bg-red-600 text-white">No</button>
                        </td>
>>>>>>> public_view
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<<<<<<< HEAD

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Chart Minggu (default tampil)
            var optionsMinggu = {
                chart: {
                    type: 'bar',
                    height: 350
                },
                series: [{
                    name: 'Penggunaan',
                    data: [50, 80, 65, 90, 70, 100, 85]
                }], // data disesuaikan
                xaxis: {
                    categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min']
                }
            };
            var chartMinggu = new ApexCharts(document.querySelector("#visitor-chart"), optionsMinggu);
            chartMinggu.render();

            // Chart Bulan (disembunyikan)
            var optionsBulan = {
                chart: {
                    type: 'line',
                    height: 350
                },
                series: [{
                    name: 'Penggunaan',
                    data: [300, 400, 350, 450, 420, 480, 460]
                }], // data disesuaikan
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul']
                }
            };
            var chartBulan = new ApexCharts(document.querySelector("#visitor-chart-1"), optionsBulan);
            chartBulan.render();

            // Chart Sales Report (Jumlah Kampus dan Ruang)
            var optionsSales = {
                chart: {
                    type: 'area',
                    height: 350
                },
                series: [{
                    name: 'Jumlah',
                    data: [4, 150, 1500, 400]
                }], // data sesuai total kampus, gedung, ruang, kelas
                xaxis: {
                    categories: ['Kampus', 'Gedung', 'Ruang', 'Kelas']
                }
            };
            var chartSales = new ApexCharts(document.querySelector("#sales-report-chart"), optionsSales);
            chartSales.render();

            // Tombol switch chart bulan/minggu
            const btnBulan = document.getElementById('btn-bulan');
            const btnMinggu = document.getElementById('btn-minggu');
            const chartBulanDiv = document.getElementById('visitor-chart-1');
            const chartMingguDiv = document.getElementById('visitor-chart');

            btnBulan.addEventListener('click', function() {
                btnBulan.classList.add('bg-blue-600', 'text-white');
                btnBulan.classList.remove('bg-gray-200', 'text-gray-700');
                btnMinggu.classList.remove('bg-blue-600', 'text-white');
                btnMinggu.classList.add('bg-gray-200', 'text-gray-700');

                chartBulanDiv.style.display = 'block';
                chartMingguDiv.style.display = 'none';
            });

            btnMinggu.addEventListener('click', function() {
                btnMinggu.classList.add('bg-blue-600', 'text-white');
                btnMinggu.classList.remove('bg-gray-200', 'text-gray-700');
                btnBulan.classList.remove('bg-blue-600', 'text-white');
                btnBulan.classList.add('bg-gray-200', 'text-gray-700');

                chartMingguDiv.style.display = 'block';
                chartBulanDiv.style.display = 'none';
            });
        });
    </script>
@endpush
=======
>>>>>>> public_view

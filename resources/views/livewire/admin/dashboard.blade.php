<div class="mt-4">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow p-5">
            <h6 class="text-gray-500 mb-2 font-normal">Total Kampus</h6>
            <h4 class="text-2xl font-semibold mb-3 flex items-center gap-2 text-slate-500">
                <span class="inline-flex items-center px-2 py-1 text-s font-medium bg-blue-100 text-blue-700 rounded border border-blue-700">
                    <i class="ti ti-trending-up"></i> {{ $campusCount }}
                </span>
            </h4>
            <p class="text-sm text-gray-500">
                Sebanyak <span class="text-blue-600">{{ $campusCount }}</span> Kampus yang terdaftar di UNJ
            </p>
        </div>

        <div class="bg-white rounded-lg shadow p-5">
            <h6 class="text-gray-500 mb-2 font-normal">Total Gedung</h6>
            <h4 class="text-2xl font-semibold mb-3 flex items-center gap-2 text-slate-500">
                <span class="inline-flex items-center px-2 py-1 text-s font-medium bg-green-100 text-green-700 rounded border border-green-700">
                    <i class="ti ti-trending-up"></i> {{ $buildingCount }}
                </span>
            </h4>
            <p class="text-sm text-gray-500">
                Sebanyak <span class="text-green-600">{{ $buildingCount }}</span> Gedung yang terdaftar di UNJ
            </p>
        </div>

        <div class="bg-white rounded-lg shadow p-5">
            <h6 class="text-gray-500 mb-2 font-normal">Total Ruang</h6>
            <h4 class="text-2xl font-semibold mb-3 flex items-center gap-2 text-slate-500">
                <span class="inline-flex items-center px-2 py-1 text-s font-medium bg-yellow-100 text-yellow-700 rounded border border-yellow-700">
                    <i class="ti ti-trending-down"></i> {{ $roomCount }}
                </span>
            </h4>
            <p class="text-sm text-gray-500">
                Sebanyak <span class="text-yellow-600">{{ $roomCount }}</span> Ruang yang terdaftar di UNJ
            </p>
        </div>

        <div class="bg-white rounded-lg shadow p-5">
            <h6 class="text-gray-500 mb-2 font-normal">Total Kelas</h6>
            <h4 class="text-2xl font-semibold mb-3 flex items-center gap-2 text-slate-500">
                <span class="inline-flex items-center px-2 py-1 text-s font-medium bg-red-100 text-red-700 rounded border border-red-700">
                    <i class="ti ti-trending-down"></i> {{ $classCount }}
                </span>
            </h4>
            <p class="text-sm text-gray-500">
                Sebanyak <span class="text-red-600">{{ $classCount }}</span> Ruang yang terdaftar sebagai Kelas
            </p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-5 mb-6">
        <h5 class="text-lg font-semibold mb-4">Statistik Total Gedung dan Ruang</h5>
        <div id="sales-report-chart"></div>
    </div>

    <div class="bg-white rounded-lg shadow p-5 mb-6">
        <div class="flex justify-between items-center mb-4">
            <h5 class="text-lg font-semibold">Statistik Penggunaan Gedung dan Ruang (BLOM SINKRON)</h5>
            <div class="space-x-2">
                <button id="btn-bulan" class="bg-blue-600 text-white px-3 py-1 rounded">Bulan</button>
                <button id="btn-minggu" class="bg-gray-200 text-gray-700 px-3 py-1 rounded">Minggu</button>
                <button id="btn-hari" class="bg-gray-200 text-gray-700 px-3 py-1 rounded">Hari</button>
            </div>
        </div>
        <div>
            <div id="usage-chart"></div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-5">
        <h5 class="text-lg font-semibold mb-4">Status Penggunaan Gedung dan Ruang (BLOM SINKRON)</h5>
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
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Nyimpen instance chart di luar fungsi agar bisa diakses dan dihancurkan
        let salesChartInstance = null;
        let usageChartInstance = null;

        const initDashboardCharts = () => {
            // Hancurkan chart yang sudah ada sebelum membuat yang baru
            if (salesChartInstance) {
                salesChartInstance.destroy();
            }
            if (usageChartInstance) {
                usageChartInstance.destroy();
            }

            const salesChartEl = document.querySelector("#sales-report-chart");
            const usageChartEl = document.querySelector("#usage-chart");

            // Pastikan elemennya ada di halaman sebelum mencoba membuat chart
            if (!salesChartEl || !usageChartEl) {
                return; 
            }

            // Chart Total 
            var optionsSales = {
                chart: { type: 'area', height: 350 },
                series: [{ name: 'Jumlah', data: [{{ $campusCount }}, {{ $buildingCount }}, {{ $roomCount }}, {{ $classCount }}] }],
                xaxis: { categories: ['Kampus', 'Gedung', 'Ruang', 'Kelas'] }
            };
            salesChartInstance = new ApexCharts(salesChartEl, optionsSales);
            salesChartInstance.render();
            
            // Chart Penggunaan (Bulan, Minggu, Hari)
            var optionsBulan = {
                chart: { type: 'line', height: 350 },
                series: [{ name: 'Penggunaan', data: [300, 400, 350, 450, 420, 480, 460, 500, 480, 510, 530, 520] }],
                xaxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'] },
            };

            var optionsMinggu = {
                chart: { type: 'bar', height: 350 },
                series: [{ name: 'Penggunaan', data: [50, 80, 65, 90, 70, 100, 85] }],
                xaxis: { categories: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] },
            };

            var optionsHari = {
                chart: { type: 'area', height: 350 },
                series: [{ name: 'Penggunaan', data: [2, 3, 5, 8, 15, 25, 30, 32, 35, 33, 28, 20, 18, 15, 12, 10, 8, 5, 4, 3, 2, 1, 1, 0] }],
                xaxis: { categories: ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'] },
            };

            usageChartInstance = new ApexCharts(usageChartEl, optionsBulan);
            usageChartInstance.render();

            const btnBulan = document.getElementById('btn-bulan');
            const btnMinggu = document.getElementById('btn-minggu');
            const btnHari = document.getElementById('btn-hari');

            btnBulan.addEventListener('click', () => {
                btnBulan.classList.remove('bg-gray-200', 'text-gray-700');
                btnBulan.classList.add('bg-blue-600', 'text-white');
                btnMinggu.classList.remove('bg-blue-600', 'text-white');
                btnHari.classList.remove('bg-blue-600', 'text-white');
                btnMinggu.classList.add('bg-gray-200', 'text-gray-700');
                btnHari.classList.add('bg-gray-200', 'text-gray-700');
                usageChartInstance.updateOptions(optionsBulan);
            });

            btnMinggu.addEventListener('click', () => {
                btnMinggu.classList.remove('bg-gray-200', 'text-gray-700');
                btnMinggu.classList.add('bg-blue-600', 'text-white');
                btnBulan.classList.remove('bg-blue-600', 'text-white');
                btnHari.classList.remove('bg-blue-600', 'text-white');
                btnBulan.classList.add('bg-gray-200', 'text-gray-700');
                btnHari.classList.add('bg-gray-200', 'text-gray-700');
                usageChartInstance.updateOptions(optionsMinggu);
            });

            btnHari.addEventListener('click', () => {
                btnHari.classList.remove('bg-gray-200', 'text-gray-700');
                btnHari.classList.add('bg-blue-600', 'text-white');
                btnBulan.classList.remove('bg-blue-600', 'text-white');
                btnMinggu.classList.remove('bg-blue-600', 'text-white');
                btnBulan.classList.add('bg-gray-200', 'text-gray-700');
                btnMinggu.classList.add('bg-gray-200', 'text-gray-700');
                usageChartInstance.updateOptions(optionsHari);
            });
        };

        // Event listener untuk Livewire dan juga Turbo sebagai fallback
        document.addEventListener('DOMContentLoaded', initDashboardCharts);
        document.addEventListener('livewire:navigated', initDashboardCharts);
        document.addEventListener('turbo:load', initDashboardCharts);
    </script>
@endpush
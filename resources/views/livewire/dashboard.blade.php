<div class="min-h-screen w-full flex flex-col items-center justify-center bg-gray-50 p-0 m-0" style="background-image:url('/bg-pattern.png');background-repeat:repeat;">
    {{-- Baris atas: Card --}}
    <div class="w-full flex flex-row justify-center items-stretch gap-8 mt-8 max-w-6xl">
        {{-- Card Total --}}
        <div class="flex-1 bg-white border-4 border-teal-800 rounded-lg shadow flex flex-col justify-between px-6 py-6 min-w-[220px] relative">
            <button
                class="absolute top-4 right-4 bg-white border-2 border-teal-800 text-teal-800 px-3 py-1 rounded font-semibold text-sm shadow hover:bg-teal-800 hover:text-white transition"
                wire:click="viewTotal">
                View
            </button>
            <div class="flex items-center gap-3 mb-1">
                <span class="text-3xl text-teal-800">&#9776;</span>
                <span class="text-teal-800 font-semibold text-lg">In Total</span>
            </div>
            <div class="text-4xl text-teal-800 font-bold">{{ $total }}</div>
        </div>
        {{-- Card Available --}}
        <div class="flex-1 bg-white border-4 border-teal-800 rounded-lg shadow flex flex-col justify-between px-6 py-6 min-w-[220px] relative">
            <button
                class="absolute top-4 right-4 bg-white border-2 border-teal-800 text-teal-800 px-3 py-1 rounded font-semibold text-sm shadow hover:bg-teal-800 hover:text-white transition"
                wire:click="viewAvailable">
                View
            </button>
            <div class="flex items-center gap-3 mb-1">
                <span class="text-3xl text-teal-800">&#128221;</span>
                <span class="text-teal-800 font-semibold text-lg">Available</span>
            </div>
            <div class="text-4xl text-teal-800 font-bold">{{ $available }}</div>
        </div>
    </div>

    {{-- Tombol aksi di bawah card --}}
    <div class="w-full flex flex-row justify-center gap-6 mt-8 max-w-6xl">
        <button wire:click="create"
            class="flex-1 bg-white border-2 border-teal-800 text-teal-800 font-bold py-3 rounded-lg shadow transition hover:bg-teal-800 hover:text-white hover:shadow-lg text-lg">
            Tambah
        </button>
        <button wire:click="edit"
            class="flex-1 bg-white border-2 border-teal-800 text-teal-800 font-bold py-3 rounded-lg shadow transition hover:bg-teal-800 hover:text-white hover:shadow-lg text-lg">
            Edit
        </button>
        <button wire:click="delete"
            class="flex-1 bg-white border-2 border-teal-800 text-teal-800 font-bold py-3 rounded-lg shadow transition hover:bg-teal-800 hover:text-white hover:shadow-lg text-lg">
            Hapus
        </button>
    </div>

    {{-- Chart di bawah tombol --}}
    <div class="w-full flex justify-center items-center mt-8 max-w-6xl flex-1">
        <div class="bg-white border-4 border-teal-800 rounded-lg shadow flex flex-col items-center justify-center w-full py-8" style="min-height:350px;">
            <span class="text-2xl font-semibold text-teal-800 mb-4">Chart</span>
            <div class="flex justify-center items-center w-full">
                <canvas id="donutChart" width="350" height="350"></canvas>
            </div>
        </div>
    </div>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('livewire:load', function () {
            const ctx = document.getElementById('donutChart').getContext('2d');
            if(window.donutChart) window.donutChart.destroy();
            window.donutChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($chartLabels) !!},
                    datasets: [{
                        data: {!! json_encode($chartData) !!},
                        backgroundColor: [
                            '#36A2EB', '#FFCE56', '#FF6384', '#4BC0C0', '#9966FF', '#FF9F40'
                        ],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    cutout: '65%',
                    plugins: {
                        legend: { display: true, position: 'bottom', labels: { color: '#166534', font: { size: 15 } } }
                    }
                }
            });
        });
    </script>
</div>
